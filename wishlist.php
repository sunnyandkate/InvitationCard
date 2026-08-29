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

    //fetch all items
    $stmt = $pdo->query("SELECT * FROM items");
    $items = $stmt->fetchAll();
    
?>

<body>

<?php include 'includes/navigation.php'; ?>      

     <?php if (isset($_GET['success']) && $_GET['success'] === 'item_chosen'): ?>
        <div class="success-text">
            <strong>Success!</strong> You have chosen the present.
        </div>
    <?php endif; ?>
        <h1 class="wishlist-heading">Sunnys Wishlist</h1>
        <div class="wishlist-container">       
                <?php foreach ($items as $item): ?>
                    <article class="wishlist-card">
                        <h2 class="wishlist-title"><?php echo htmlspecialchars($item['title']); ?></h2>                       
                            <img src="<?php echo htmlspecialchars($item['image']); ?>" 
                        alt="<?php echo htmlspecialchars($item['title']); ?>" class="wishlist-img">
                        <div class="btn-container">
                            <a href="<?php echo htmlspecialchars($item['link']); ?>" target="_blank" rel="noopener noreferrer" title="This link opens the official merchant page in a new window" class="shop-link" 
                             onclick="return confirm('You are leaving my website to visit an external store. I do not control their privacy rules or tracking cookies. Do you want to proceed?');">
                            <img src="images/cart.png" alt="Cart icon" class="pixel-icon"> Where to buy
                            <img src="images/arrow.png" alt="External link icon" class="pixel-icon"></a>
                            <a href="present.php?id=<?php echo $item['id']; ?>" class="select-item">View</a>
                        </div>
                    </article>
                <?php endforeach; ?>
        </div>    
    
    <p class="disclaimer">
        <strong>Disclaimer:</strong>All featured product names, 
        book titles, author names, cover illustrations, and retail brand assets displayed here remain the 
        property of their respective copyright holders. These assets are utilized strictly for non-commercial, 
        personal project demonstration and portfolio evaluation purposes.
    </p>

<?php include 'includes/footer.php'; ?>
