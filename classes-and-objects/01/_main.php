<?php

include 'Product.php';

class Test
{
    public function main()
    {
        $products = [
            new Product("Logitech mouse", 70.00, 14),
            new Product("iPhone 5s", 999.99, 3),
            new Product("Epson EB-U05", 440.46, 1)
        ];

        foreach ($products as $product) {
            echo $product->printProduct() . PHP_EOL;
        }

        $products[0]->setAmount(20);

        foreach ($products as $product) {
            echo $product->printProduct() . PHP_EOL;
        }

        $products[1]->setPrice(1200.00);

        foreach ($products as $product) {
            echo $product->printProduct() . PHP_EOL;
        }
    }
}

$test = new Test();
$test->main();