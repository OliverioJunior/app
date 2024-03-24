<?php

namespace App\Http\Controllers;

class FilterNonZeroValuesSalesAndNetProfitController extends Controller
{
    public function filter(array $data)
    {
        return array_filter($data, function ($estabelecimento) {
            if ((float) $estabelecimento->Vendas === 0.0 && (float)$estabelecimento->Líquido === 0.0) {
                return false;
            } else {
                return true;
            };
        });
    }
}
