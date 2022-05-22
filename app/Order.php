<?php

class Order
{
    private CPF   $cpf;
    private array $items = [];
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

    public function addItem(int $quantity, Product $product): void
    {
        $this->items[] = new OrderItem($quantity, $product);
        $this->calculateTotal();
    }

    private function calculateTotal(): void
    {
        $this->total = 0;
        foreach ($this->items as $orderItem)
        {
            $this->total += $orderItem->getTotal();
        }
    }

    public function getTotal(): int
    {
        return $this->total;
    }

}
