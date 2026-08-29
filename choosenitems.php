<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'config/db.php';


if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: index.php');
    exit;
}

include __DIR__ . '/includes/header.php';
?>

<body>

<?php include 'includes/navigation.php'; ?>


   
    <h1 class="choosen-presents-heading">Choosen Presents</h1>
    <p class="choosen-presents-content">The following items have been selected by guests from the wishlist and have been moved to the choosenpresents table</p>

    <?php
    $stmt = $pdo->query("SELECT * FROM choosenpresents ORDER BY id DESC");
    $chosen_items = $stmt->fetchAll();
    ?>
         <?php if (empty($chosen_items)): ?>
                <p class="no-presents-chosen">No presents have been chosen by users yet.</p>
            <?php else: ?>
        <div class="choosen-presents-container">          
            <?php foreach ($chosen_items as $item): ?>
                <article class="choosen-presents-card">
                    <h2 class="choosen-presents-title"><?php echo htmlspecialchars($item['title']); ?></h2>
                     <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="Product image" class="choosen-presents-img">                                  
                </article>
                <?php endforeach; ?>  
             </div>     
         <?php endif; ?>
       

<?php include 'includes/footer.php'; ?>
