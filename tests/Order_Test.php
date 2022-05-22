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


//    /**
//     * @dataProvider providerValid
//     */
//    public function testValid(int $value, int $percentage, int $expectedValue): void
//    {
//        $coupon = new Coupon($percentage);
//
//        $this->assertEquals(
//            $percentage,
//            $coupon->getPercentage()
//        );
//
//        $this->assertEquals(
//            $expectedValue,
//            $coupon->calculateFinalValue($value)
//        );
//    }
//
//    public function providerValid(): array
//    {
//        return [
//            [10000, 1,   9900],
//            [10000, 10,  9000],
//            [10000, 25,  7500],
//            [10000, 100,    0],
//        ];
//    }

}
