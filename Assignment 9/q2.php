<?php
$lines = file("products.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$products = [];
foreach ($lines as $line) {
    list($name, $price) = explode(",", $line);
    $products[] = ["name" => trim($name), "price" => (int) trim($price)];
}
usort($products, function ($a, $b) {
    return $a["price"] - $b["price"];
});
?>
<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
   
</head>
<body>
    <h2 style="text-align:center;">Sorted Product List</h2>
    <table>
        <tr>
            <th>Product Name</th>
            <th>Price (₹)</th>
        </tr>
        <?php foreach ($products as $product): ?>
        <tr>
            <td><?= htmlspecialchars($product["name"]) ?></td>
            <td><?= htmlspecialchars($product["price"]) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
