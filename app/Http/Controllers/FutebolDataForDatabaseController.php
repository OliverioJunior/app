<?php

namespace App\Http\Controllers;


class FutebolDataForDatabaseController extends Controller
{
    public function get(array $data)
    {
        return array_map(function ($estabelecimento) {
            $dataForDatabase = new \stdClass;
            $desired_keys = [
                "Localidade",
                "Seção",
                "Estabelecimento",
                "Quantidade",
                "Vendas",
                "Comissão",
                "Prêmios/Saques",
                "Líquido"
            ];
            foreach ($desired_keys as $key) {
                $dataForDatabase->{$key} = $estabelecimento->{$key};
            }
            return $dataForDatabase;
        }, $data);
    }
}
