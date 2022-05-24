<?php

namespace App\Services\Contracts;
interface CepInterface
{
    public function findManyByCep(array $ceps): array;
    public function findOneByCep(string $cep);
}
