<?php

namespace App\Http\Controllers;

class CreateClassFutebolController extends Controller
{
    public function create(array $data)
    {
        $futebolKeysReport = [
            "Centro de Custo",
            "Localidade",
            "Seção",
            "Estabelecimento",
            "Quantidade",
            "Vendas",
            "Comissão",
            "Comissão Retida",
            "Qtd Prêmios/Saques",
            "Prêmios/Saques",
            "Líquido",
            "% Liq.",
        ];
        return array_map(function ($row) use ($futebolKeysReport) {
            $obj = new \stdClass;
            foreach ($futebolKeysReport as $index => $header) {
                if (isset($row[$index])) {
                    $obj->$header = $row[$index];
                } else {
                    $obj->$header = null;
                }
            }
            return $obj;
        }, $data);
    }
}
