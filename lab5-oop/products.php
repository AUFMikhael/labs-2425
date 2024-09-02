<?php
require "vendor/autoload.php";

use App\Utilities\FileUtility;
use App\Products\Product;
use App\Products\ProductReview;

$products_file = "./assets/products.json";
$products = FileUtility::jsonFileToArray($products_file);

foreach ($products as $data) {
    $product = new Product(
        $data['id'],
        $data['title'],
        $data['sku'],
        $data['price']
    );
    echo "{$product->id} ({$product->sku})\t{$product->price}\t   {$product->title}\n";
}