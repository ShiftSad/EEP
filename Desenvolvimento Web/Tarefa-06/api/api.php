<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

require '../config.php';

$method = $_SERVER['REQUEST_METHOD'];
$request_uri_parts = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
$api_index = array_search('api.php', $request_uri_parts);
$resource = isset($request_uri_parts[$api_index + 1]) ? $request_uri_parts[$api_index + 1] : '';
$id = isset($request_uri_parts[$api_index + 2]) ? $request_uri_parts[$api_index + 2] : null;

$_TOKENS = [];

function generateToken($user_id) {
    global $_TOKENS;
    $token = bin2hex(random_bytes(32));
    $timestamp = time() * 1000;
    $_TOKENS[$token] = [
        'user_id' => $user_id,
        'timestamp' => $timestamp,
        'expires_at' => $timestamp + (3600 * 1000) // 1 hour expiry
    ];

    return $token;
}

function validateToken($token) {
    global $_TOKENS;
    if (!isset($_TOKENS[$token])) return false;
    
    $current_time = time() * 1000;
    if ($current_time > $_TOKENS[$token]['expires_at']) {
        unset($_TOKENS[$token]);
        return false;
    }
    
    return $_TOKENS[$token];
}

function verifyToken($request) {
    $auth_header = isset($request['headers']['Authorization']) ? $request['headers']['Authorization'] : '';
    if (strpos($auth_header, 'Bearer ') === 0) {
        $token = substr($auth_header, 7);
        return validateToken($token);
    }

    return false;
}

switch ($resource) {
    case 'users':
        // Verify if the request is authorized
        $token_data = verifyToken($_SERVER);
        if (!$token_data) {
            http_response_code(401);
            echo json_encode(['error' => 'Unauthorized']);
            exit;
        }

        switch ($method) {
            case 'GET':
                if ($id) {
                    $stmt = $connection->prepare("SELECT * FROM users WHERE id = ?");
                    $stmt->bind_param("i", $id);
                    $stmt->execute();

                    $result = $stmt->get_result();
                    $user = $result->fetch_assoc();
                    if ($user) echo json_encode(['error' => 'User not found']);
                    else echo json_encode($user);
                } 
                else {
                    $result = $connection->query("SELECT * FROM users");
                    $users = [];
                    while ($row = $result->fetch_assoc()) {
                        $users[] = $row;
                    }
                    echo json_encode($users);
                }
                break;
            
            case 'POST':
                $data = json_decode(file_get_contents('php://input'), true);
                if (isset($data['email'], $data['password'], $data['name'])) {
                    $hashed_password = password_hash($data['password'], PASSWORD_BCRYPT);

                    $stmt = $connection->prepare("INSERT INTO users (email, password_hash, name) VALUES (?, ?, ?)");
                    $stmt->bind_param("sss", $data['email'], $hashed_password, $data['name']);
                    if ($stmt->execute()) {
                        $user_id = $connection->insert_id;
                        echo json_encode(['message' => 'User created successfully', 'user_id' => $user_id]);
                    }
                    else echo json_encode(['error' => 'Failed to create user']);
                } else echo json_encode(['error' => 'Invalid input']);
                break;
            
            case 'DELETE':
                if ($id) {
                    $stmt = $connection->prepare("DELETE FROM users WHERE id = ?");
                    $stmt->bind_param("i", $id);
                    if ($stmt->execute()) echo json_encode(['message' => 'User deleted successfully']);
                    else echo json_encode(['error' => 'Failed to delete user']);
                } else echo json_encode(['error' => 'User ID is required']);
                break;
        }

    case 'login':
        if ($method === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
            if (!isset($data['email'], $data['password'])) {
                echo json_encode(['error' => 'Email and password are required']);
                exit;
            }
            $stmt = $connection->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->bind_param("s", $data['email']);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();

            if (!($user && password_verify($data['password'], $user['password_hash']))) echo json_encode(['error' => 'Invalid email or password']);
            else {
                $token = generateToken($user['id']);
                echo json_encode(['message' => 'Login successful', 'token' => $token]);
            }
        } else echo json_encode(['error' => 'Method not allowed']);
        
        break;

    case 'register':
      if ($method === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        if (!isset($data['email'], $data['password'], $data['name'])) {
            echo json_encode(['error' => 'Email, password, and name are required']);
            exit;
        }

        // Search for existing user
        $stmt = $connection->prepare("SELECT * FROM public.users WHERE email = ?");
        $stmt->bind_param("s", $data['email']);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        if (isset($user)) {
            echo json_encode(['error' => 'User already exists']);
            exit;
        }

        $stmt = $connection->prepare("INSERT INTO public.users (email, password_hash, name) VALUES (?, ?, ?)");
        $hashed_password = password_hash($data['password'], PASSWORD_BCRYPT);
        $stmt->bind_param("sss", $data['email'], $hashed_password, $data['name']);
        $stmt->execute();

        echo json_encode(['message' => 'User registered successfully']);
      }
}
?>
