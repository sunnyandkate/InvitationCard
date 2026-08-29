<?php


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'config/db.php';
include 'includes/header.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$stmt = $pdo->prepare("SELECT * FROM items WHERE id = :id");
$stmt->execute(['id' => $id]);
$item = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$item) {
    die("Present not found!");
}
?>

<body>

<?php include 'includes/navigation.php'; ?>
<div class= "single-present">
        <h1 class="single-present-title"><?php echo htmlspecialchars($item['title']); ?></h1>
        <img src="<?php echo htmlspecialchars($item['image']); ?>" 
            alt="<?php echo htmlspecialchars($item['title']); ?>" class="single-present-img">                         
         <a href="delete_item.php?id=<?php echo $item['id']; ?>" onclick="return confirm('Are you sure you want to choose this present? It will be removed from the wishlist.');" class="choose-present-btn">Choose Present</a>
        <a href= "wishlist.php" class="back-btn">Back</a>
</div>
<?php include 'includes/footer.php'; ?>