<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login do Usuário</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      background-image: linear-gradient(100deg, orange, white, blue);
    }

    div {
      background-color: rgba(0, 0, 0, 0.8);
      position: absolute;
      color: aliceblue;
      font-family: "Bebas Neue", sans-serif;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      padding: 3%;
      border-radius: 10%;
    }

    input {
      padding: 15px;
      border-radius: 15px;
      outline: none;
    }

    button {
      padding: 13px;
      border-radius: 13px;
      width: 100%;
    }

    /* Custom CSS for the Registrar button */
    #register-btn {
      background-color: #007bff;
      color: #fff;
      border: none;
      margin-top: 10px;
      transition: background 0.2s;
    }
    #register-btn:hover {
      background-color: #0056b3;
      color: #fff;
    }
  </style>
</head>
<body class="container mt-5">
  <div>
    <h1>Login</h1>
    <form id="loginForm">
      <input type="text" placeholder="Usuário" id="email" name="email">
      <br><br>
      <input type="password" placeholder="Senha" id="password" name="password">
      <br><br>
      <button type="submit" id="submit">Enviar</button>
    </form>
    <br>
    <button type="button" id="register-btn" onclick="window.location.href='/register'">Registrar</button>
  </div>

  <script>
    document.querySelector('#loginForm').addEventListener('submit', function(event) {
      event.preventDefault();

      const email = document.querySelector('#email').value;
      const password = document.querySelector('#password').value;

      fetch('http://localhost:8080/api/v1/login', {
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
          window.location.href = "/";
        } else {
          alert('Login falhou: ' + (data.error || 'Credenciais inválidas'));
        }
      })
      .catch(error => {
        if (error.status === 401) alert('Credenciais inválidas. Por favor, tente novamente.');
        else if (error.status === 404) alert('Endpoint não encontrado. Verifique a URL do servidor.');
        else if (error.status === 500) alert('Erro interno do servidor. Tente novamente mais tarde.');
        else alert('Erro desconhecido: ' + error.message);
      });
    });
  </script>
</body>
</html>
