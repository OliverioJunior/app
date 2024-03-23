<?php

namespace App\Http\Controllers;

class FilterNonZeroValuesSalesAndNetProfitController extends Controller
{
    public function filter(array $data)
    {
        return array_filter($data, function ($estabelecimento) {
            return $estabelecimento->Vendas !== 0.0 and $estabelecimento->Líquido !== 0.0;
        });
    }
}