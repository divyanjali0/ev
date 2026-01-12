<?php
session_start();
require_once __DIR__ . '/assets/includes/db_connect.php'; 

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['name'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($name && $password) {
        $stmt = $conn->prepare("SELECT * FROM users WHERE name = :name AND status = 'active' LIMIT 1");
        $stmt->execute(['name' => $name]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_role'] = $user['role'];

            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Invalid name or password.";
        }
    } else {
        $error = "Please fill in all fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Explore Vacations | Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="icon" type="image/png" href="assets/images/favicon.ico">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
    body {
        background: 
            linear-gradient(310deg, rgb(49 49 49 / 36%), rgb(2 47 85 / 60%)),
            url('assets/images/bg-login.webp') no-repeat center center fixed;
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        font-family: 'Cambria', serif;
        overflow: hidden;
    }

    .login-card {
        background: #fff;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 12px 30px rgba(0,0,0,0.2);
        width: 100%;
        max-width: 420px;
        animation: fadeIn 0.8s ease-in-out;
        position: relative;
    }

    @keyframes fadeIn {
        0% {opacity: 0; transform: translateY(-20px);}
        100% {opacity: 1; transform: translateY(0);}
    }

    .login-card img {
        display: block;
        margin: 0 auto;
        width: 200px;
        transition: transform 0.3s ease;
    }
    .login-card img:hover {
        transform: scale(1.1);
    }

    .login-card input {
        transition: all 0.3s ease;
    }
    .login-card input:focus {
        border-color: #0a277d;
        box-shadow: 0 0 10px rgba(10,39,125,0.3);
    }

    .btn-primary {
        background: linear-gradient(180deg, #0a277d, #1b289da3);
        border: none;
        transition: all 0.3s ease;
    }
    .btn-primary:hover {
        background: linear-gradient(135deg, #0056d2, #003d99);
        transform: translateY(-2px);
        box-shadow: 0 8px 15px rgba(0,0,0,0.2);
    }

    .password-toggle {
        position: absolute;
        right: 15px;
        top: 74%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #555;
    }

    .position-relative {
        position: relative;
    }
</style>
</head>
<body>

<div class="login-card">
    <img src="assets/images/footer-logo.png" alt="Logo">
    <!-- <h4 class="text-center mb-4 text-dark fw-bold">Explore Vacations Login</h4> -->

    <!-- Session Messages -->
    <?php if (isset($_GET['timeout'])): ?>
        <div class="alert alert-warning text-center py-2">
            Your session has expired. Please log in again.
        </div>
    <?php endif; ?>
    <?php if (isset($_GET['logout'])): ?>
        <div class="alert alert-success text-center py-2">
            You have been logged out successfully.
        </div>
    <?php endif; ?>

    <!-- Error Message -->
    <?php if ($error): ?>
        <div class="alert alert-danger text-center py-2"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="mb-3">
            <label for="name" class="form-label fw-semibold">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
        </div>

        <div class="mb-3 position-relative">
            <label for="password" class="form-label fw-semibold">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
            <span class="password-toggle" id="togglePassword"><i class="bi bi-eye-fill"></i></span>
        </div>

        <button type="submit" class="btn btn-primary w-100 py-2 mt-2">Login</button>
    </form>
</div>

<script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');

    togglePassword.addEventListener('click', () => {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        togglePassword.innerHTML = type === 'password' 
            ? '<i class="bi bi-eye-fill"></i>' 
            : '<i class="bi bi-eye-slash-fill"></i>';
    });
</script>

</body>
</html>
