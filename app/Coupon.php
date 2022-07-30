<?php

class Coupon
{
    private int $percentage = 0;
    private int $expireDate = 0;

    public function __construct(int $percentage = 0, int $expireDate = 0)
    {
        if($percentage>=1 && $percentage<=100){
            $this->percentage = $percentage;
        }

        $this->expireDate = time() + $expireDate;
    }

    public function getPercentage(): int
    {
        return $this->percentage;
    }

    public function isExpired(): bool
    {
        if($this->expireDate===0){
            return false;
        }

        return (time() > $this->expireDate);
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
