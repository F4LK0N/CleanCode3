<?php

class Order
{
    private CPF $cpf;

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


}
