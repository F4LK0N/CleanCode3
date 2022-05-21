<?php
use PHPUnit\Framework\TestCase;

class Circle_Test extends TestCase
{
    public function testInstantiation(): void
    {
        $this->assertInstanceOf(
            Circle::class,
            new Circle()
        );
    }

}