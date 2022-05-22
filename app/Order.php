<?php

class Order
{
    private CPF   $cpf;
    private array $itens = [];
    private int   $total = 0;

    public function __construct(CPF $cpf)
    {
        if(!$cpf->isValid()){
            throw new Exception('CPF invalid!');
        }
        $this->cpf = $cpf;

    }

    public function getCpf (): CPF
    {
        return $this->cpf;
    }

    public function addItem(int $quantity, Product $item): void
    {


        $this->calculateTotal();
    }

    private function calculateTotal(): void
    {


        $this->total = 0;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

}
