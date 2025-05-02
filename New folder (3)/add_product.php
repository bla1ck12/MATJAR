
<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['product_name'];
    $price = $_POST['product_price'];
    $description = $_POST['product_description'];

    $sql = "INSERT INTO products (name, price, description) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $price, $description]);

    header('Location: index.html');
}
?>
