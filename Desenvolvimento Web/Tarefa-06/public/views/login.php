<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login do Usuário</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="container mt-5">
  <h2 class="mb-4">Login do Usuário</h2>
  <form method="post" id="loginForm">
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control email" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Senha</label>
      <input type="password" name="password" class="form-control password" placeholder="Senha" required>
    </div>
    <button type="submit" class="btn btn-secondary">Entrar</button>
    <a href="register.html" class="ms-3">Cadastre-se</a>
  </form>

  <script>
    document.querySelector('#loginForm').addEventListener('submit', function(event) {
      event.preventDefault();

      const email = document.querySelector('.email').value;
      const password = document.querySelector('.password').value;

      fetch('http://localhost:8080/api/api.php/login', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ email, password })
      })
      .then(response => {
        if (!response.ok) throw new Error('Erro na requisição: ' + response.status);
        return response.json();
      })
      .then(data => {
        if (data.token) {
          localStorage.setItem('token', data.token);
          console.log('Login bem-sucedido');
          // window.location.href = "dashboard.html";
        } else {
          alert('Login falhou: ' + (data.error || 'Credenciais inválidas'));
        }
      })
      .catch(error => {
        console.error('Erro ao fazer login:', error);
        alert('Erro ao conectar ao servidor.');
      });
    });
  </script>
</body>
</html>
