<?php
   session_start();//iniciar uma sessão do usuário com o servidor web
   require 'config.php';//incluindo o arquivo config.php

   if ($_SERVER["REQUEST_METHOD"] == "POST"){
       $email = $_POST['email'];
       $senha = $_POST['senha'];

       $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE email = ?");
       $stmt->bind_param("s",$email);//s => string
       $stmt->execute();//executa a consulta "SELECT * FROM usuarios WHERE email = ana@gmail.com"
       $resultado = $stmt->get_result();

       if ($resultado->num_rows === 1){//achou o email do usuario
           $usuario = $resultado->fetch_assoc();//converte para um vetor associativo
           if ($senha === $usuario['senha']){//pegar valor do campo senha no vetor
               $_SESSION['user_id'] = $usuario['id'];//cria a sessão do usuario com o valor id
               header("Location: dashboard.php");//carrega a pagina index.php
               exit();//sai dessa pagina imediatamente
           }
           else{//se a senha está incorreta
               $error = "Senha incorreta!";
           }
       }
       else{//se nao achou o email
           $error = "Usuário não encontrado";
       }  
   }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-5">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Login</h2>
                        <form method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="senha" class="form-label">Senha</label>
                                <input type="password" name="senha" id="senha" class="form-control" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Entrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>