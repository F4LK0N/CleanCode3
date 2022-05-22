<?php

class Coupon
{
    private int $percentage = 0;

    public function __construct(int $percentage)
    {
        if($percentage<1 || $percentage>100){
            return;
        }

        $this->percentage = $percentage;
    }

    public function getPercentage(): int
    {
        return $this->percentage;
    }

    public function calculateFinalValue(int $value): int
    {
        if($this->percentage === 0){
            return $value;
        }

        if($this->percentage === 100){
            return 0;
        }

        $discount = ceil(($value / 100.0) * $this->percentage);
        return $value - $discount;
    }

}
