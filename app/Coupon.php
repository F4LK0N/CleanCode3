<?php

class Coupon
{
    private int $percentage = 0;
    private ?DateTime $expireDate = null;

    public function __construct(int $percentage = 0, DateTime $expireDate = null)
    {
        if($percentage>=1 && $percentage<=100){
            $this->percentage = $percentage;
        }

        if($expireDate){
            $this->expireDate = $expireDate;
        }
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
