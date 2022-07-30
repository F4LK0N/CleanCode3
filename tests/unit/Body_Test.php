<?php

namespace unit;

use Body;
use PHPUnit\Framework\TestCase;

class Body_Test extends TestCase
{
    public function testInstantiation(): void
    {
        $this->assertInstanceOf(
            Body::class,
            new Body()
        );
    }


    /**
     * @dataProvider provideVolume
     */
    public function testVolume(float $width, float $height, float $length, float $expectedValue): void
    {
        $body = new Body($width, $height, $length);

        $this->assertEquals(
            $expectedValue,
            $body->getVolume()
        );
    }
    public function provideVolume(): array
    {
        return [
            [20, 15, 10, 0.003],
            [100, 30, 10, 0.03],
            [200, 100, 50, 1],
        ];
    }


    /**
     * @dataProvider providerDensity
     */
    public function testDesnsity(float $width, float $height, float $length, float $weight, float $expectedValue): void
    {
        $body = new Body($width, $height, $length, $weight);

        $this->assertEquals(
            $expectedValue,
            $body->getDesnsity()
        );
    }
    public function providerDensity(): array
    {
        return [
            [20, 15, 10, 1, 333],
            [100, 30, 10, 3, 100],
            [200, 100, 50, 40, 40],
        ];
    }





}
