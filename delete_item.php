<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'config/db.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {
    try {
        
        $pdo->beginTransaction();

        $insertSql = "INSERT INTO choosenpresents (id, title, image, link, original_item_id) 
                      SELECT id, title, image, link, id
                      FROM items 
                      WHERE id = ?";
        $stmtInsert = $pdo->prepare($insertSql);
        $stmtInsert->execute([$id]);

        $deleteSql = "DELETE FROM items WHERE id = ?";
        $stmtDelete = $pdo->prepare($deleteSql);
        $stmtDelete->execute([$id]);

        $pdo->commit();

        header("Location: wishlist.php?success=item_chosen");
        exit();

    } catch (Exception $e) {
        $pdo->rollBack();
        die("Error moving the item: " . $e->getMessage());
    }
} else {
    die("Invalid Item ID.");
}
?>

