<?php
use PHPUnit\Framework\TestCase;

class CPF_Test extends TestCase
{
    public function testInstantiation(): void
    {
        $this->assertInstanceOf(
            CPF::class,
            new CPF("")
        );
    }

    /**
     * @dataProvider providerInvalid
     */
    public function testInvalid(string $value): void
    {
        $cpf = new CPF($value);

        $this->assertEquals(
            "",
            $cpf->getValue()
        );

        $this->assertEquals(
            false,
            $cpf->isValid()
        );
    }

    public function providerInvalid(): array
    {
        return [
            [""],
            ["1234567890"],
            ["123456789012"],
            ["000.000.000-00"],
            ["111.111.111-11"],
            ["123.456.789-12"],
            ["111.444.777-07"],
            ["111.444.777-37"],
        ];
    }

    /**
     * @dataProvider providerValid
     */
    public function testValid(string $value, string $expectedValue): void
    {
        $cpf = new CPF($value);

        $this->assertEquals(
            $expectedValue,
            $cpf->getValue()
        );

        $this->assertEquals(
            $expectedValue,
            "$cpf"
        );

        $this->assertEquals(
            true,
            $cpf->isValid()
        );
    }

    public function providerValid(): array
    {
        return [
            ["11144477735",    "111.444.777-35"],
            ["111.444.777-35", "111.444.777-35"],
            ["01417599090",    "014.175.990-90"],
            ["014.175.990-90", "014.175.990-90"],
        ];
    }

}