<?php
require_once __DIR__ . '/../jwt.php';
require_once __DIR__ . '/post_controller.php'; // Para getAuthenticatedUser()

function handleUsers($method) {
  global $connection;

  $user = getAuthenticatedUser();

  switch ($method) {
    case 'GET':
      getCurrentUser($connection, $user['id']);
      break;
    case 'PUT':
      updateCurrentUser($connection, $user['id']);
      break;
    default:
      http_response_code(405);
      echo json_encode(['error' => 'Method Not Allowed']);
      break;
  }
}

function getCurrentUser($connection, $userId) {
  $stmt = $connection->prepare("SELECT id, name, email, profile_image_url, user_role FROM users WHERE id = ?");
  $stmt->bind_param('i', $userId);
  $stmt->execute();
  $result = $stmt->get_result();
  $userData = $result->fetch_assoc();

  if (!$userData) {
    http_response_code(404);
    echo json_encode(['error' => 'User not found']);
    return;
  }

  echo json_encode($userData);
}

function updateCurrentUser($connection, $userId) {
  $data = json_decode(file_get_contents('php://input'), true);

  $fields = [];
  $params = [];
  $param_types = '';

  if (isset($data['name']) && !empty($data['name'])) {
    $fields[] = 'name = ?';
    $params[] = $data['name'];
    $param_types .= 's';
  }

  if (isset($data['profile_image_url'])) {
    $fields[] = 'profile_image_url = ?';
    $params[] = $data['profile_image_url'];
    $param_types .= 's';
  }

  if (isset($data['password']) && !empty($data['password'])) {
    $fields[] = 'password_hash = ?';
    $params[] = password_hash($data['password'], PASSWORD_BCRYPT);
    $param_types .= 's';
  }

  if (empty($fields)) {
    http_response_code(400);
    echo json_encode(['error' => 'No fields to update']);
    return;
  }

  $query = "UPDATE users SET " . implode(', ', $fields) . " WHERE id = ?";
  $params[] = $userId;
  $param_types .= 'i';

  $stmt = $connection->prepare($query);
  $stmt->bind_param($param_types, ...$params);

  if ($stmt->execute()) {
    getCurrentUser($connection, $userId);
  } else {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to update user profile']);
  }
}
?>