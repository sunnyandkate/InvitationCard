<?php 


    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    require_once 'config/db.php';
    include 'includes/header.php'; 
?>

<body>

<?php include 'includes/navigation.php'; ?>
        <img src="images/pumpkinImg.png" alt="Walking Pumpkin" class="pumpkin-animation">
        <img src="images/pumpkinImg.png" alt="Walking Pumpkin" class="pumpkinTwo-animation"> 
        <div class="opened-card-container">
            <p>You are invited to Sunny's Halloween Birthday Party.</p>
            <p>On 31st October 2026</p>
            <p>At the beach in Solituede</p>
           <p>If you want you can have a look at Sunny's <a href="wishlist.php" class="wishlist-btn">wishlist</a></p>
        </div>    
   
<?php include 'includes/footer.php'; ?>
