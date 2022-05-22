<?php

use PHPUnit\Framework\TestCase;

class Order_Test extends TestCase
{
    public function testInstantiation(): void
    {
        $this->expectException("Exception");
        $this->assertInstanceOf(
            Order::class,
            new Order(new CPF(""))
        );
    }

    public function testInvalidCpf(): void
    {
        $this->expectException("Exception");
        $cpf = new CPF("");
        $order = new Order($cpf);
    }

    public function testValidCpf(): void
    {
        $cpf = new CPF("111.444.777-35");
        $order = new Order($cpf);
        $this->assertInstanceOf(
            CPF::class,
            $order->getCpf()
        );
    }

}
