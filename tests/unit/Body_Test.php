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
    public function testVolume(float $weight, float $height, float $length, float $expectedValue): void
    {
        $body = new Body($weight, $height, $length);

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







}
