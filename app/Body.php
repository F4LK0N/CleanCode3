<?php

class Body {

    private float $width  = 0.0; //cm
    private float $height = 0.0; //cm
    private float $length = 0.0; //cm
    private float $volume = 0.0; //m3

    private float $weight = 0.0;
    private float $density = 0.0;



    public function __construct(float $width = 0, float $height = 0, float $length = 0, float $weight=0)
    {
        $this->width = $width;
        $this->height = $height;
        $this->length = $length;
        $this->calculateVolume();

        $this->weight = $weight;
        $this->calculateDensity();
    }

    private function calculateVolume(): void
    {
        if($this->width===0 || $this->height===0 && $this->length===0){
            return;
        }
        $this->volume = ($this->width * $this->height * $this->length) / 1000000.0;
    }

    public function getVolume(): float
    {
        return $this->volume;
    }

    private function calculateDensity(): void
    {
        if(!$this->weight || !$this->volume){
            return;
        }

        $this->density = round(($this->weight / $this->volume));
    }

    public function getDesnsity(): float
    {
        return $this->density;
    }




}