<?php
@session_start();
require_once('conexao.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    // Validação adicional no lado do servidor
    $erros = [];

    if (empty($nome)) {
        $erros[] = "O campo nome é obrigatório.";
    }

    if (empty($email)) {
        $erros[] = "O campo email é obrigatório.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros[] = "Formato de email inválido.";
    }

    if (empty($senha)) {
        $erros[] = "O campo senha é obrigatório.";
    } elseif (strlen($senha) < 6) {
        $erros[] = "A senha deve ter pelo menos 6 caracteres.";
    }

    if (count($erros) > 0) {
        // Armazenar mensagens de erro na sessão
        $_SESSION['messages'] = ['type' => 'danger', 'messages' => $erros];
        header('Location: ../../registrar.php?success=1');
        exit;
    }

      // Verificar se o email já está cadastrado
      $sql = "SELECT id FROM usuarios WHERE email = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param('s', $email);
      $stmt->execute();
      $stmt->store_result();
  
      if ($stmt->num_rows > 0) {
          $erros[] = "Este email já está cadastrado.";
          $_SESSION['messages'] = ['type' => 'danger', 'messages' => $erros];
          header('Location: ../../registrar.php');
          exit;
      }
  
      $stmt->close();

    // Criptografar a senha
    $senhaHash = MD5($senha);

     // Inserir o novo usuário no banco de dados
   
     $sql = "INSERT INTO usuarios (nome, email, senha, situacoe_id, niveis_acesso_id, 	avatar_user, created, modified) 
        VALUES ('$nome', '$email', '$senhaHash', 1, 1, NULL, NOW(), NULL)";
    if ($conn->query($sql) === TRUE) {
        // Definir mensagem de sucesso na sessão
        $_SESSION['messages'] = ['type' => 'success', 'messages' => ["Cadastro realizado com sucesso!"]];
        
    } else {
        $erros[] = "Erro ao cadastrar usuário: " . $stmt->error;
        $_SESSION['messages'] = ['type' => 'danger', 'messages' => $erros];
    }
    
   
    $conn->close();    

     // Redirecionar para a tela anterio
     header('Location: ../../registrar.php?success=1');
    
} else {
    echo "Método de requisição inválido.";
}