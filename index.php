<?php 
session_start();
$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? ''
];
$activeForm = $_SESSION['active_form'] ?? 'login';
session_unset();
function showError($error){
    return !empty($error) ? "<p class ='error-mesage'>$error</p>":'';
}
function isActiveForm($formName, $activeForm){
    return $forName === $activeForm ? 'active' : '';
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
   
    <div class="container">
    <div class="form-box" <?= isActiveForm('login', $activeForm);?> id="login-form">
        <form action="login_register.php" method="post">
        <h2>Login</h2>
        <?= showError($errors['login']);?>
        <input type="email" name="email" placeholder="Email" required>  
        <input type="password" name="password" placeholder="Parola" required>  <br>
        <button type="submit" name="login">Login</button>
        <p>Don't have an account?<a href="#" onclick="showForm('register-form')">Register</a></p>
    </form>
</div>
<div class="form-box" <?= isActiveForm('register', $activeForm); ?> id="register-form">
    <form action="login_register.php" method="post">
    <h2>Register</h2>
    <?= showError($errors['register']);?>
    <input type="text" name="name" placeholder="Nume" required>
    <input type="email" name="email" placeholder="Email" required>  
    <input type="password" name="password" placeholder="Parola" required>  <br>
    <select name="role" required>
        <option value="" selected>---Select role---</option>
        <option value="user">User</option>
        <option value="admin">Admin</option>
    </select>
    <button type="submit" name="register">Register</button>
    <p>Already have an account?<a href="#" onclick="showForm('login-form')">Login</a></p>
    
</form>

</div>
<script src="script.js"></script>
</body>
</html>