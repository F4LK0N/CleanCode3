<?php

use PHPUnit\Framework\TestCase;

class Coupon_Test extends TestCase
{
    public function testInstantiation(): void
    {
        $this->assertInstanceOf(
            Coupon::class,
            new Coupon()
        );
    }


    /**
     * @dataProvider providerInvalidPercentages
     */
    public function testInvalidPercentage(int $percentage): void
    {
        $coupon = new Coupon($percentage);

        $this->assertEquals(
            0,
            $coupon->getPercentage()
        );
    }
    public function providerInvalidPercentages(): array
    {
        return [
            [-1],
            [0],
            [101],
        ];
    }


    /**
     * @dataProvider providerValidPercentages
     */
    public function testValidPercentages(int $percentage): void
    {
        $coupon = new Coupon($percentage);

        $this->assertEquals(
            $percentage,
            $coupon->getPercentage()
        );
    }
    public function providerValidPercentages(): array
    {
        return [
            [0],
            [1],
            [10],
            [25],
            [50],
            [75],
            [99],
            [100],
        ];
    }


    /**
     * @dataProvider providerExpireDate
     */
    public function testExpireDate(int $expireDate, bool $expectedResult): void
    {
        $coupon = new Coupon(1, $expireDate);

        $this->assertEquals(
            $expectedResult,
            $coupon->isExpired()
        );
    }
    public function providerExpireDate(): array
    {
        return [
            [-TimeInSeconds::$DAY   , true],
            [TimeInSeconds::$DAY    , false],
            [TimeInSeconds::$DAY * 2, false],
        ];
    }


    /**
     * @dataProvider providerCalculateFinalValue
     */
    public function testCalculateFinalValue(int $percentage, int $value, int $expectedValue): void
    {
        $coupon = new Coupon($percentage);

        $this->assertEquals(
            $expectedValue,
            $coupon->calculateFinalValue($value)
        );
    }
    public function providerCalculateFinalValue(): array
    {
        return [
            [1,   10000, 9900],
            [10,  10000, 9000],
            [25,  10000, 7500],
            [100, 10000,    0],
        ];
    }

}
