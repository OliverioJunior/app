<?php

namespace App\Http\Controllers;



class CreateClassJogoDoBichoController extends Controller
{
    public function create(array $data)
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
            $obj = new \stdClass;
            foreach ($keysReportJogoDoBicho as $index => $header) {
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
