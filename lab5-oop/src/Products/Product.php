<?php

namespace App\Products;

class Product
{
    public $id;
    public $title;
    public $sku;
    public $price;

    public function __construct(
        $id,
        $title,
        $sku,
        $price
    )
    {
        $this->id = $id;
        $this->title = $title;
        $this->sku = $sku;
        $this->price = $price;
    }

}