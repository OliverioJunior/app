<?php

namespace App\Services;

class CreateClassFutebolController
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
            return $this->createObject($row, $futebolKeysReport);
        }, $data);
    }
    private function createObject(array $row, array $keys): \stdClass
    {
        $object = new \stdClass;

        foreach ($keys as $index => $header) {
            $value = $row[$index] ?? null;
            $object->$header = $value;
        }

        return $object;
    }
}
