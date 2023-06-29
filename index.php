<?php
require("logic.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Skills Test</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
    <div class="container mb-2 p-2 border">
        <h2 class="text-center">Inventory Entry Form</h2>
        <form action="" method="post" class="d-flex flex-column justify-content-center text-center w-50 mx-auto">
            <label for="product">Product Name:</label>
            <input type="text" id="product" name="product">
            <label for="quantity">Quantity in stock:</label>
            <input type="number" id="quantity" name="quantity">
            <label for="price">Price per item:</label>
            <input type="number" id="price" name="price">
            <input type="submit" name="submit" value="Submit" class="mt-2">
        </form>
    </div>

    <div class="container">
        <table class="table-bordered th, table-bordered td { border: 2px solid black }  mx-auto">
            <thead>
                <tr class="text-center">
                    <th>Product name</th>
                    <th class="px-2">Quantity in stock</th>
                    <th class="px-2">Price per item</th>
                    <th>Datetime submitted</th>
                    <th class="px-2">Total value number</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $json_data = file_get_contents('entries.json');
                $products = json_decode($json_data, true);
                if (count($products) != 0) {
                    foreach ($products as $product) {
                ?>
                        <tr class="text-center">
                            <td><?= $product['product'] ?></td>
                            <td><?= $product['quantity'] ?></td>
                            <td><?= $product['price'] ?></td>
                            <td class="px-3"><?= $product['created_at'] ?></td>
                            <td><?= $product['total_value'] ?></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
            <tr>
                <td class="font-weight-bold">Total Value: <?= array_sum(array_column($products, 'total_value')) ?></td>
            </tr>

        </table>
    </div>

</body>

</html>