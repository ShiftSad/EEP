<?php
function base64url_encode($data) {
  return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

function base64url_decode($data) {
  $remainder = strlen($data) % 4;
  if ($remainder) {
  $data .= str_repeat('=', 4 - $remainder);
  }
  return base64_decode(strtr($data, '-_', '+/'));
}

function generateJWT($payload, $secret) {
  $header = [ 'alg' => 'HS256', 'typ' => 'JWT' ];
  $segments = [];
  $segments[] = base64url_encode(json_encode($header));
  $segments[] = base64url_encode(json_encode($payload));
  $signature = hash_hmac('sha256', implode('.', $segments), $secret, true);
  $segments[] = base64url_encode($signature);
  return implode('.', $segments);
}

function validadeJWT($token, $jwt_secret) {
  $parts = explode('.', $token);
  if (count($parts) !== 3) return false;

  list($header_b64, $payload_b64, $signature_b64) = $parts;
  $header = json_decode(base64url_decode($header_b64), true);
  $payload = json_decode(base64url_decode($payload_b64), true);

  if (empty($header['alg']) || $header['alg'] !== 'HS256') return false; // Algoritmo inválido

  $signature_input = $header_b64 . '.' . $payload_b64;
  $expected_signature = base64url_encode(hash_hmac('sha256', $signature_input, $jwt_secret, true));
  if (!hash_equals($expected_signature, $signature_b64)) return false;

  if (isset($payload['exp']) && time() > $payload['exp']) return false;
  return $payload;
}
?>
