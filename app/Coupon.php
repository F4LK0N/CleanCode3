<?php

class Coupon
{
    private int $percentage = 0;
    private int $expireDateInSeconds = 0;

    public function __construct(int $percentage = 0, int $expireDate = 0)
    {
        if($percentage>=1 && $percentage<=100){
            $this->percentage = $percentage;
        }

        if($expireDate>0){
            $this->expireDateInSeconds = time() + $expireDate;
        }
    }

    public function getPercentage(): int
    {
        return $this->percentage;
    }

    public function isExpired(int $currentDateInSeconds = 0): bool
    {
        if($this->expireDateInSeconds===0){
            return false;
        }

        if($currentDateInSeconds===0){
            $currentDateInSeconds = time();
        }

        return ($currentDateInSeconds > $this->expireDateInSeconds);
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
