<?php

use PHPUnit\Framework\TestCase;

class Product_Test extends TestCase
{
    public function testInstantiation(): void
    {
        $this->assertInstanceOf(
            Product::class,
            new Product()
        );
    }

    /**
     * @dataProvider providerValid
     */
    public function testValid(int $id, string $name, string $description, int $value): void
    {
        $product = new Product($id, $name, $description, $value);

        $this->assertEquals(
            $id,
            $product->getId()
        );

        $this->assertEquals(
            $name,
            $product->getName()
        );

        $this->assertEquals(
            $description,
            $product->getDescription()
        );

        $this->assertEquals(
            $value,
            $product->getValue()
        );

    }
    public function providerValid(): array
    {
        return [
            [1, "Name 1", "Description 1", 10000],
            [2, "Name 2", "Description 2", 20000],
            [3, "Name 3", "Description 3", 30000],
        ];
    }

    public function testBody(): void
    {
        $body = new Body(20, 15, 10, 1, 333);
        $product = new Product(0, '', '', 0, $body);


        $this->assertEquals(
            0.003,
            $product->getBody()->getVolume()
        );

        $this->assertEquals(
            333,
            $product->getBody()->getDesnsity()
        );

    }

}
