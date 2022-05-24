Nesse teste foi proposto a criação de uma *API* para realizar a consulta de vários *CEPs* no *[ViaCEP](https://viacep.com.br/)* e fazer o retorno dos dados da maneira proposta. 
<br>  
A seguir apresento minha solução para o problema

Problemas:
1. Crie um novo projeto de *API* em [Lumen](https://lumen.laravel.com/docs/9.x) ou [Laravel](https://laravel.com/), nele defina uma nova rota *GET* correspondente a o caminho ``/search/local/CEP-1,CEP-2…``. - ✨
2. No controlador dessa rota use a *API* do [ViaCEP](https://viacep.com.br/) para realizar e armazenar em *array* a consulta de cada.  ✨
3. Reorganize os dados dos endereços para que quando acessado ``/search/local/01001000,17560-246`` a *API* retorne um *JSON* exatamente assim:  ✨

```json
[
  {
    "cep": "17560246",
    "label": "Avenida Paulista, Vera Cruz",
    "logradouro": "Avenida Paulista",
    "complemento": "de 1600/1601 a 1698/1699",
    "bairro": "CECAP",
    "localidade": "Vera Cruz",
    "uf": "SP",
    "ibge": "3556602",
    "gia": "7134",
    "ddd": "14",
    "siafi": "7235"
  },
  {
    "cep": "01001000",
    "label": "Praça da Sé, São Paulo",
    "logradouro": "Praça da Sé",
    "complemento": "lado ímpar",
    "bairro": "Sé",
    "localidade": "São Paulo",
    "uf": "SP",
    "ibge": "3550308",
    "gia": "1004",
    "ddd": "11",
    "siafi": "7107"
  }
]
```

Estes links me ajudaram no processo <br>
Referências:
* Validar cep https://www.facebook.com/emersonbrogadev/posts/511629469645910/
* O que é o cep? https://www.significados.com.br/cep/
* ViaCEP https://viacep.com.br/
