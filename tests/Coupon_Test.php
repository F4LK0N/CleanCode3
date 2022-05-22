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

    /**
     * @dataProvider providerValid
     */
    public function testValid(int $value, int $percentage, int $expectedValue): void
    {
        $coupon = new Coupon($percentage);

        $this->assertEquals(
            $percentage,
            $coupon->getPercentage()
        );

        $this->assertEquals(
            $expectedValue,
            $coupon->calculateFinalValue($value)
        );
    }

    public function providerValid(): array
    {
        return [
            [10000, 1,   9900],
            [10000, 10,  9000],
            [10000, 25,  7500],
            [10000, 100,    0],
        ];
    }

}
