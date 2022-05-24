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

    public function validate($cep):bool{
        return preg_match('/^\d{2}\.?\d{3}-\d{3}$/', $cep) > 0;
    }

    private function prepate($ceps): array
    {
        $validateCeps = [];
        foreach ($ceps as $i => $cep){
            $ceps[$i] = preg_replace('/[^0-9]/', '', $cep);
            $ceps[$i] = preg_replace('/([0-9]{5})([0-9]{3})/', '$1-$2',  $ceps[$i]);
            $this->validate($ceps[$i]) ? $validateCeps[] = $ceps[$i] : null;
        }

        return $validateCeps;
    }
    /**
     * @param array $ceps
     * @return array
     * Retorna varios ceps
     */
    public function findManyByCep(array $ceps): array
    {
        $ceps = $this->prepate($ceps);
        foreach ($ceps as $i => $cep){
            $ceps[$i] = $this->findOneByCep($cep);
        }
        return $ceps;
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
