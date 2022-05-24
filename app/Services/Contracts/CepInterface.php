<?php

namespace App\Services\Contracts;
interface CepInterface
{
    public function findManyByCep(array $cep);
    public function findOneByCep(string $cep);
}
