<?php

date_default_timezone_set("America/New_York");

$total_value = [];

if (isset($_POST['submit'])) {

    $new_products = array(
        'product' => $_POST['product'],
        'quantity' => $_POST['quantity'],
        'price' => $_POST['price'],
        'created_at' => date("h:i:sa m/d/Y"),
        'total_value' => $_POST['quantity'] * $_POST['price'],
    );

    if (filesize('entries.json') == 0) {
        $first_record = array($new_products);
        $data_to_save = $first_record;
    } else {
        $old_records = json_decode(file_get_contents('entries.json'));
        array_push($old_records, $new_products);
        $data_to_save = $old_records;
    }
    if (!file_put_contents('entries.json', json_encode($data_to_save, JSON_PRETTY_PRINT), LOCK_EX)) {
        $error = "error";
    } else {
        $success = "success";
    }
}
