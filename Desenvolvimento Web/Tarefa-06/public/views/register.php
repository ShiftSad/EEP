<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Registro do Usuário</title>
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

    /* Custom CSS for the Login button */
    #login-btn {
      background-color: #007bff;
      color: #fff;
      border: none;
      margin-top: 10px;
      transition: background 0.2s;
    }
    #login-btn:hover {
      background-color: #0056b3;
      color: #fff;
    }
  </style>
</head>
<body class="container mt-5">
  <div>
    <h1>Cadastro</h1>
    <form id="registerForm">
      <input type="email" placeholder="Email" id="email" name="email" required>
      <br><br>
      <input type="text" placeholder="Nome de usuário" id="username" name="username" required>
      <br><br>
      <input type="password" placeholder="Senha" id="password" name="password" required>
      <br><br>
      <button type="submit" id="submit">Enviar</button>
    </form>
    <br>
    <button type="button" id="login-btn" onclick="window.location.href='/login'">Login</button>
  </div>

  <script>
    document.querySelector('#registerForm').addEventListener('submit', function(event) {
      event.preventDefault();

      const email = document.querySelector('#email').value;
      const name = document.querySelector('#username').value;
      const password = document.querySelector('#password').value;

      fetch('http://localhost:8080/api/v1/register', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ email, name, password })
      })
      .then(async response => {
        if (response.status === 201) {
          console.log('Usuário criado com sucesso');
          alert('Cadastro realizado com sucesso!');
          window.location.href = "/login";
        } else if (response.status === 400) {
          alert('Dados inválidos. Verifique os campos preenchidos.');
        } else if (response.status === 409) {
          alert('Email já cadastrado. Tente com outro email.');
        } else if (response.status === 500) {
          alert('Erro interno do servidor. Tente novamente mais tarde.');
        } else {
          alert('Cadastro falhou: ' + (data.error || 'Erro desconhecido'));
        }
      })
      .catch(error => {
        alert('Erro desconhecido: ' + error.message);
      });
    });
  </script>
</body>
</html>