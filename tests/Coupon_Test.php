<?php
use PHPUnit\Framework\TestCase;

class Coupon_Test extends TestCase
{
    public function testInstantiation(): void
    {
        $this->assertInstanceOf(
            Coupon::class,
            new Coupon(0)
        );
    }

    /**
     * @dataProvider providerInvalid
     */
    public function testInvalid(int $value): void
    {
        $coupon = new Coupon($value);

        $this->assertEquals(
            0,
            $coupon->getPercentage()
        );

        $this->assertEquals(
            10000,
            $coupon->calculateFinalValue(10000)
        );
    }

    public function providerInvalid(): array
    {
        return [
            [-1],
            [0],
            [101],
        ];
    }
//
//    /**
//     * @dataProvider providerValid
//     */
//    public function testValid(string $value, string $expectedValue): void
//    {
//        $cpf = new CPF($value);
//
//        $this->assertEquals(
//            $expectedValue,
//            $cpf->getValue()
//        );
//
//        $this->assertEquals(
//            $expectedValue,
//            "$cpf"
//        );
//
//        $this->assertEquals(
//            true,
//            $cpf->isValid()
//        );
//    }
//
//    public function providerValid(): array
//    {
//        return [
//            ["11144477735",    "111.444.777-35"],
//            ["111.444.777-35", "111.444.777-35"],
//            ["01417599090",    "014.175.990-90"],
//            ["014.175.990-90", "014.175.990-90"],
//        ];
//    }

}
