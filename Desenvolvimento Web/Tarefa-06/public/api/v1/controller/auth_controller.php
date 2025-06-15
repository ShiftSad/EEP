<?php
function handleRegister($method) {
  global $connection;

  if ($method !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method Not Allowed']);
    return;
  }

  $data = json_decode(file_get_contents('php://input'), true);

  if (
    empty($data['name']) ||
    empty($data['email']) ||
    empty($data['password'])
  ) {
    http_response_code(400);
    echo json_encode([
      'error' => 'Missing required fields: name, email, password',
    ]);
    return;
  }

  $name = $data['name'];
  $email = $data['email'];
  $password = $data['password'];

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid email format']);
    return;
  }

  // Check if user already exists
  $stmt = $connection->prepare("SELECT id FROM users WHERE email = ?");
  $stmt->bind_param('s', $email);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows > 0) {
    http_response_code(409); // Conflict
    echo json_encode(['error' => 'User with this email already exists']);
    $stmt->close();
    return;
  }
  $stmt->close();

  $password_hash = password_hash($password, PASSWORD_BCRYPT);
  $stmt = $connection->prepare(
    "INSERT INTO users (name, email, password_hash) VALUES (?, ?, ?)"
  );
  $stmt->bind_param('sss', $name, $email, $password_hash);

  if ($stmt->execute()) {
    http_response_code(201);
    echo json_encode(['message' => 'User registered successfully']);
  } else {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to register user']);
  }
  $stmt->close();
}

function handleLogin($method) {
  global $connection, $jwt_secret;

  if ($method !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method Not Allowed']);
    return;
  }

  $data = json_decode(file_get_contents('php://input'), true);

  if (empty($data['email']) || empty($data['password'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Email and password are required']);
    return;
  }

  $email = $data['email'];
  $password = $data['password'];

  $stmt = $connection->prepare(
    "SELECT id, name, user_role, password_hash FROM users WHERE email = ?"
  );
  $stmt->bind_param('s', $email);
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();
  $stmt->close();

  if (!$user || !password_verify($password, $user['password_hash'])) {
    http_response_code(401);
    echo json_encode(['error' => 'Invalid credentials']);
    return;
  }

  $payload = [
    'iss' => 'main',
    'iat' => time(),
    'exp' => time() + 3600, // 1 hora
    'id' => $user['id'],
    'name' => $user['name'],
    'role' => $user['user_role'],
  ];

  $jwt = generateJWT($payload, $jwt_secret);

  http_response_code(200);
  echo json_encode(['token' => $jwt]);
}
?>