<?php

class CPF
{
    static private int $SIZE = 11;

    private bool   $valid = false;
    private string $value = "";

    public function __construct(string $value)
    {
        if(!$this->validate($value)){
            return;
        }

        $this->value = $this->format($value);
        $this->valid = true;
    }

    private function validate(string $value): bool
    {
        $valueNumbers = $this->getNumbersOnly($value);
        if(strlen($valueNumbers)!==self::$SIZE || $this->allNumbersAreEqual($valueNumbers)){
            return false;
        }

        $verifyingDigit1 = (int)substr($valueNumbers, 9, 1);
        $calculatedVerifyingDigit1 = $this->calculateVerifyingDigit(substr($valueNumbers, 0, 9));
        if($verifyingDigit1 !== $calculatedVerifyingDigit1){
            return false;
        }

        $verifyingDigit2 = (int)substr($valueNumbers, 10, 1);
        $calculatedVerifyingDigit2 = $this->calculateVerifyingDigit(substr($valueNumbers, 0, 10));
        if($verifyingDigit2 !== $calculatedVerifyingDigit2){
            return false;
        }

        return true;
    }

    private function getNumbersOnly(string $value): string
    {
        return preg_replace( '/\D/', '', $value);
    }

    private function allNumbersAreEqual(string $valueNumbers): bool
    {
        $valueNumbersArray = str_split($valueNumbers);
        $firstNumber = $valueNumbersArray[0];
        foreach ($valueNumbersArray as $currentNumber) {
            if($currentNumber!=$firstNumber){
                return false;
            }
        }

        return true;
    }

    private function calculateVerifyingDigit(string $base): int
    {
        $baseArray = str_split($base);
        $baseCalc=0;
        for($index=count($baseArray)-1, $multiplier=2; $index>=0; $index--, $multiplier++)
        {
            $baseCalc += (((int)$baseArray[$index]) * $multiplier);
        }
        $baseCalcRemainder = $baseCalc % 11;

        if($baseCalcRemainder < 2){
            return 0;
        }
        return (11 - $baseCalcRemainder);
    }

    private function format(string $value): string
    {
        $value = $this->getNumbersOnly($value);

        return
            substr($value, 0, 3).".".
            substr($value, 3, 3).".".
            substr($value, 6, 3)."-".
            substr($value, 9, 2);
    }

    public function isValid(): bool
    {
        return $this->valid;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString()
    {
        return $this->value;
    }

}
