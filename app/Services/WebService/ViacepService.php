<?php

namespace App\Services\WebService;
use App\Services\Contracts\CepInterface;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

/**
 * Códigos de Endereçamento Postal (CEP) do Brasil fornecidos pelo site ViaCep.com.br?
 */
class ViacepService implements CepInterface
{
    /**
     * @var string
     * Url principal do webservice
     */
    public $endpoint = 'https://viacep.com.br/ws/';

    /**
     * @param array $ceps
     * @return array
     * Retorna varios ceps
     */
    public function findManyByCep(array $ceps): array
    {
        $result = [];
        foreach ($ceps as $cep){
            $result[] = $this->findOneByCep($cep);
        }
        return $result;
    }

    /**
     * @param string $cep
     * @return array
     * Retorna um cep
     */
    public function findOneByCep(string $cep): array
    {
        $url = $this->endpoint.$cep.'/json/';
        return Cache::remember("cep_$cep", 60,
            function () use ($url) {
                return Http::get($url)->json();
            });
    }



}
