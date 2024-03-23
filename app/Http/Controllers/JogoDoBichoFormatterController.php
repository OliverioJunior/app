<?php

namespace App\Http\Controllers;

class JogoDoBichoFormatterController extends Controller
{
    public function formatter(array $data)
    {
        $removeNullValues = new RemoveNullValuesArrayController();
        $removeEmptyValues = new RemoveEmptyArrayController();
        $createClassJogoDoBicho = new CreateClassJogoDoBichoController();
        $filterNonZeroValuesSalesAndNetProfitController = new FilterNonZeroValuesSalesAndNetProfitController();
        $jogoDoBichoDataForDbController = new JogoDoBichoDataForDbController();


        $reportWithoutNullValues  =  $removeNullValues->remove($data);
        $reportWithoutEmptyValues = $removeEmptyValues->remove($reportWithoutNullValues);

        $jogoDoBichoClass = $createClassJogoDoBicho->create($reportWithoutEmptyValues);

        $jogoDoBichoClassWithSales = $filterNonZeroValuesSalesAndNetProfitController->filter($jogoDoBichoClass);
        $dataForDB = $jogoDoBichoDataForDbController->get($jogoDoBichoClassWithSales);

        return $dataForDB;
    }
}
