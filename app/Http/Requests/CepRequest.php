<?php

namespace App\Http\Requests;

use App\Rules\CepRule;
use Illuminate\Foundation\Http\FormRequest;

class CepRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->replace([
            'ceps' => explode(",", $this->ceps),
        ]);
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'ceps' => ['required'],
            'ceps.*' => [
                /*TODO - Ao validar apresenta ERR_TOO_MANY_REDIRECTS URGENTE*/
                // new CepRule()
            ]
        ];
    }
}
