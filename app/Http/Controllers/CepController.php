<?php

namespace App\Http\Controllers;
use App\Http\Requests\CepRequest;
use App\Http\Resources\CepResource;
use App\Services\WebService\ViacepService;
use Illuminate\Http\JsonResponse;
/**
 * Cep Controller
 */
class CepController extends Controller
{
    /**
     * @var ViacepService
     */
    protected $service;

    /**
     * @param ViacepService $service
     */
    public function __construct(ViacepService $service)
    {
        $this->service = $service;
    }

    /**
     * @param CepRequest $request
     * @return JsonResponse
     */
    public function index(CepRequest $request){
        $service = $this->service->findManyByCep($request->input("ceps"));
        return response()->json(CepResource::collection(collect($service)->sortByDesc('cep')));

    }
}
