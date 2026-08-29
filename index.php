<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'config/db.php';
include 'includes/header.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        $error = 'Please fill in all fields.';
    } else {


        if ($username === 'if_level_halloween' && $password === 'else_pumpkin_display_none') {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_user'] = 'if_level_halloween';
            $_SESSION['user_role'] = 'admin'; 
            
            header('Location: cardCover.php');
            exit;
        }
       
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username LIMIT 1");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
           
           if ($user['username'] === 'if_level_halloween' || (isset($user['role']) && strtolower($user['role']) === 'admin')) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_user'] = $user['username'];
        } else {
            $_SESSION['user_logged_in'] = true;
            $_SESSION['guest_user'] = $user['username'];
        }
            header('Location: cardCover.php');
            exit;
        } else {
            $error = 'Invalid username or password.';
        }
    } 
} 

?>

<body>

<?php include 'includes/navigation.php'; ?>

<!-- walking pumpkin -->
<img src="images/pumpkinImg.png" alt="Walking Pumpkin" class="pumpkin-animation">

<div class="login-container">
    
    <!-- RECRUITER NOTICE BOX -->
    <div class="recruiter-notice">
        <strong>Welcome! (Recruiter Review Mode)</strong>
    <p>
        To make testing quick and easy, I have automatically pre-filled the form below with 
        test credentials. Just click <strong>"Log In"</strong> to see how the backend handles 
        different user roles, explore the invitation interface and test out the live 
        wishlist system.
    </p>
    </div>
    
    <?php if (!empty($error)): ?>
        <div class="error-msg">
            <?php echo htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>

    <form action="" method="POST" class="login-form">
        <div class="form-group">
            <label for="username">Username</label>
            <!--pre filled field:  'admin' -->
            <input type="text" id="username" name="username" value="if_level_halloween" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <!-- pre filled field: guest password -->
            <input type="password" id="password" name="password" value="else_pumpkin_display_none" required>
        </div>

        <button type="submit" class="login-btn">Log In</button>
    </form>
</div>



<?php 
include 'includes/footer.php'; 
?>
