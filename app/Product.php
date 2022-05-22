<?php

class Product
{
    private int    $id          = 0;
    private string $name        = "";
    private string $description = "";
    private int    $value       = 0;



    public function __construct(int $id=0, string $name='', string $description='', int $value=0)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->value = $value;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getValue(): int
    {
        return $this->value;
    }

}
