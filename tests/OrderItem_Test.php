<?php

use PHPUnit\Framework\TestCase;

class OrderItem_Test extends TestCase
{
    public function testInvalidQuantity(): void
    {
        $this->expectException("Exception");
        $orderItem = new OrderItem(0, new Product());
    }

    public function testTotal(): void
    {
        $orderItem = new OrderItem(2, new Product(1, "Name 1", "Description 1", 10000));
        $this->assertEquals(
            20000,
            $orderItem->getTotal()
        );

    }

}
