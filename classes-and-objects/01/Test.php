<?php

class Test
{
    public function main(): void
    {
        $products = [
            new Product("Logitech mouse", 70.00, 14),
            new Product("iPhone 5s", 999.99, 3),
            new Product("Epson EB-U05", 440.46, 1)
        ];

        foreach ($products as $product) {
            $product->print() . PHP_EOL;
        }

        $products[0]->setAmount(20);

        foreach ($products as $product) {
            $product->print() . PHP_EOL;
        }

        $products[1]->setPrice(1200.00);

        foreach ($products as $product) {
            $product->print() . PHP_EOL;
        }
    }
}