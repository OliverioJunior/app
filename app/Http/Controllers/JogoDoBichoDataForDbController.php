<?php

namespace App\Http\Controllers;

class JogoDoBichoDataForDbController extends Controller
{
    public function get(array $data)
    {
        return array_map(function ($estabelecimento) {
            $dbData = new \stdClass;
            $comissao = round($estabelecimento->Vendas * 0.2, 2);
            $premio = $estabelecimento->Pgto - $comissao;
            $dbData->estabelecimento = $estabelecimento->Ponto;
            $dbData->vendas = (float) $estabelecimento->Vendas;
            $dbData->comissao = $comissao;
            $dbData->premio = $premio;
            $dbData->liquido = (float)$estabelecimento->Líquido;

            return $dbData;
        }, $data);
    }
}
