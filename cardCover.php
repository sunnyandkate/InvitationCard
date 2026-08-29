<?php 

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION['user_logged_in']) && !isset($_SESSION['admin_logged_in'])) {
        header('Location: index.php');
        exit;
    }
    require_once 'config/db.php';
    include 'includes/header.php'; 
?>

<body>

<?php include 'includes/navigation.php'; ?>  
        <div class="card-container">
             <h1 class="card-cover-heading">Invitation to Sunnys Birthday</h1>
            <img src="images/pumpkinImg.png" alt="Walking Pumpkin" class="pumpkin-card-icon">
            <a href="openedCard.php" class="open-card">Open</a>
        </div>   

<?php include 'includes/footer.php'; ?>
