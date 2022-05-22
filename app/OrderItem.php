<?php

class OrderItem
{
    private int    $quantity    = 0;
    private int    $total       = 0;

    private int    $id          = 0;
    private string $name        = "";
    private string $description = "";
    private int    $price       = 0;



    public function __construct(int $quantity, Product $product)
    {
        if($quantity<1){
            throw new Exception('Invalid quantity!');
        }

        $this->quantity = $quantity;

        $this->id          = $product->getId();
        $this->name        = $product->getId();
        $this->description = $product->getId();
        $this->price       = $product->getValue();

        $this->total = $this->price * $this->quantity;
    }


    public function getTotal(): int
    {
        return $this->total;
    }

}
