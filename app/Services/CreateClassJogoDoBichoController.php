<?php

namespace App\Services;

class CreateClassJogoDoBichoController
{
    public function create(array $data): array
    {
        $keysReportJogoDoBicho = [
            "Ponto",
            "Bruta",
            "Vendas",
            "Pgto",
            "Líquido",
            "Recarga",
            "Braga",
            "Bolão",
            "Vale Mot",
            "Vale Camb",
            "Vale Cel",
            "Acertos",
            "Lucro",
            "Prejuízo",
        ];

        return array_map(function ($row) use ($keysReportJogoDoBicho) {
            return $this->createObject($row, $keysReportJogoDoBicho);
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
