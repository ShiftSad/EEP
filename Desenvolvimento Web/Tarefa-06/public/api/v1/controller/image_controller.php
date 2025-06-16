<?php
function handleImages($method, $identifier) {
  global $connection;
  switch ($method) {
    case 'GET':
      if (!$identifier) {
        http_response_code(400);
        echo json_encode(['error' => 'Image identifier is required.']);
        exit;
      }
      getImageByUrl($connection, $identifier);
      break;
    case 'POST':
      uploadImage($connection);
      break;
    case 'DELETE':
      if (!$identifier) {
        http_response_code(400);
        echo json_encode(['error' => 'Image identifier is required for deletion.']);
        exit;
      }
      deleteImageByUrl($connection, $identifier);
      break;
    default:
      http_response_code(405);
      echo json_encode(['error' => 'Method Not Allowed']);
      break;
  }
}

function uploadImage($connection) {
  $user = getAuthenticatedUser();

  if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
    http_response_code(400);
    echo json_encode(['error' => 'No image uploaded or upload error.']);
    return;
  }

  $file = $_FILES['image'];
  $max_size = 10 * 1024 * 1024; // 10 MB
  $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];

  if ($file['size'] > $max_size) {
    http_response_code(413);
    echo json_encode(['error' => 'Image file is too large. Max 10MB.']);
    return;
  }

  $finfo = finfo_open(FILEINFO_MIME_TYPE);
  $mime_type = finfo_file($finfo, $file['tmp_name']);
  finfo_close($finfo);

  if (!in_array($mime_type, $allowed_types)) {
    http_response_code(415);
    echo json_encode(['error' => 'Invalid image file type.']);
    return;
  }

  $imageData = file_get_contents($file['tmp_name']);
  $imageTitle = basename($file['name']);
  $userId = $user['id'];

  $extension = pathinfo($imageTitle, PATHINFO_EXTENSION);
  $randomFilename = bin2hex(random_bytes(16)) . '.' . $extension;
  $apiUrl = "/api/v1/images/{$randomFilename}";

  $connection->begin_transaction();
  try {
    $stmt = $connection->prepare("INSERT INTO images (user_id, title, data, url) VALUES (?, ?, ?, ?)");

    $null = null;
    $stmt->bind_param('isbs', $userId, $imageTitle, $null, $apiUrl);
    $stmt->send_long_data(2, $imageData);

    $stmt->execute();
    $imageId = $connection->insert_id;

    $connection->commit();

    http_response_code(201);
    echo json_encode(['id' => $imageId, 'url' => $apiUrl]);

  } catch (Exception $e) {
    $connection->rollback();
    http_response_code(500);
    echo json_encode(['error' => 'Failed to save image to database.', 'details' => $e->getMessage()]);
  }
}

function getImageByUrl($connection, $urlIdentifier) {
  $apiUrl = "/api/v1/images/{$urlIdentifier}";
  $stmt = $connection->prepare("SELECT data FROM images WHERE url = ?");
  $stmt->bind_param('s', $apiUrl);
  $stmt->execute();
  $result = $stmt->get_result();
  $image = $result->fetch_assoc();

  if (!$image) {
    http_response_code(404);
    echo json_encode(['error' => 'Image not found.']);
    return;
  }

  $finfo = finfo_open();
  $contentType = finfo_buffer($finfo, $image['data'], FILEINFO_MIME_TYPE);
  finfo_close($finfo);

  header("Content-Type: {$contentType}");
  echo $image['data'];
}

function deleteImageByUrl($connection, $urlIdentifier) {
  $user = getAuthenticatedUser();

  $apiUrl = "/api/v1/images/{$urlIdentifier}";
  $stmt = $connection->prepare("SELECT user_id FROM images WHERE url = ?");
  $stmt->bind_param('s', $apiUrl);
  $stmt->execute();
  $result = $stmt->get_result();
  $image = $result->fetch_assoc();

  if (!$image) {
    http_response_code(404);
    echo json_encode(['error' => 'Image not found']);
    return;
  }

  if ($user['role'] !== 'admin' && $image['user_id'] != $user['id']) {
    http_response_code(403);
    echo json_encode(['error' => 'You do not have permission to delete this image.']);
    return;
  }

  $deleteStmt = $connection->prepare("DELETE FROM images WHERE url = ?");
  $deleteStmt->bind_param('s', $apiUrl);
  if ($deleteStmt->execute()) {
    http_response_code(204);
  } else {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to delete image.']);
  }
}
?>