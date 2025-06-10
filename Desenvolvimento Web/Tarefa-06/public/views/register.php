<?php

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Novo Usuário</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</head>
<!--desafio do Zé  COMUNISTAS!!!! -->
<body class="container mt-5">
  <h2>Cadastro do Usuário</h2>
  <form method="post">
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input class="email" name="email" class="form-control" required>
      <input class="username" name="username" class="form-control" placeholder="Nome de usuário" required>
      <input class="password" name="password" type="password" class="form-control" placeholder="Senha" required>
    </div>
    <button type="submit" class="btn btn-secondary">Salvar</button>
    <a href="login">Login</a>
  </form>

  <script>
    document.querySelector('form').addEventListener('submit', function(event) {
      event.preventDefault();

      const email = document.querySelector('.email').value;
      const username = document.querySelector('.username').value;
      const password = document.querySelector('.password').value;

      fetch('http://localhost:8080/api/api.php/users', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ email: email, password: password, username: username })
      })
      .then(res => res.text())
      .then(raw => {
        console.log(raw); // print raw output
        return JSON.parse(raw);
      })
      .then(data => {
        if (data.token) {
        console.log('User created:', data);
        } else console.error('Registration failed:', data.error);
      });

      // Move to login
      window.location.href = 'login.php';
    });
  </script>
</body>
</html>
