<?php
session_start();

$success = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require '../../database/db.php';
    require_once '../App/Func/funcs.php'; 
    
    $db = new DB();
    
    if (isset($_POST['Log_admin']) && isset($_POST['Pass_admin'])) {
        $email = $_POST['Log_admin'];
        $password = $_POST['Pass_admin'];
        
        if (checkCredentials($db, $email, $password)) {
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;

            
            $sql = "SELECT Log_admin FROM admin WHERE Log_admin = ?";
            $args = array($email);
            $result = $db->send2db($sql, $args);
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $_SESSION['Log_admin'] = $row['log_admin'];
            }

            $success = true;
            header('Location: ../../Dashboard/dash.php');
            exit;
        } else {
            $error = "Credenciais inválidas. Por favor, tente novamente.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="login.css" rel="stylesheet"> 
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <h2 class="login-title">Login</h2>
            <?php if ($success): ?>
                <div class="alert alert-success">Login bem-sucedido! Redirecionando...</div>
            <?php elseif ($error): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form method="POST" action="" novalidate>
                <div class="form-group">
                    <label for="username">Usuário</label>
                    <input
                        type="text"
                        id="username"
                        name="Log_admin"
                        class="form-control"
                        placeholder="Digite seu usuário"
                        required
                    />
                </div>
                <div class="form-group">
                    <label for="password">Senha</label>
                    <div class="input-wrapper">
                        <input
                            type="password"
                            id="password"
                            name="Pass_admin"
                            class="form-control"
                            placeholder="Digite sua senha"
                            required
                        />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">
                    Entrar
                </button>
            </form>

        
            <button
                onclick="window.location.href = '../../index.php';"
                class="btn btn-secondary w-100 mt-3">
                Voltar para a Home
            </button>

            <p class="text-center mt-3">
                <a href="recuperar-senha.php" class="forgot-password">Esqueceu a senha?</a>
            </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
