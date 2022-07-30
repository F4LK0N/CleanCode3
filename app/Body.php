<?php

class Body {

    private float $weight = 0.0; //cm
    private float $height = 0.0; //cm
    private float $length = 0.0; //cm
    private float $volume = 0.0; //m3

    private float $density = 0.0;


    public function __construct(float $weight = 0, float $height = 0, float $length = 0)
    {
        $this->weight = $weight;
        $this->height = $height;
        $this->length = $length;
        $this->calculateVolume();

    }

    private function calculateVolume(): void
    {
        $this->volume = ($this->weight * $this->height * $this->length) / 1000000.0;
    }

    public function getVolume(): float
    {
        return $this->volume;
    }




}