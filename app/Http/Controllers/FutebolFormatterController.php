<?php

namespace App\Http\Controllers;


class FutebolFormatterController extends Controller
{
    public function formatter(array $data)
    {
        $createClassFutebolController = new CreateClassFutebolController();
        $filterNonZeroValuesSalesAndNetProfitController = new FilterNonZeroValuesSalesAndNetProfitController();
        $futebolDataForDatabaseController = new FutebolDataForDatabaseController();


        $futebolClass = $createClassFutebolController->create($data);
        $establishmentsWithTransactions = $filterNonZeroValuesSalesAndNetProfitController->filter($futebolClass);
        $dataForDatabase = $futebolDataForDatabaseController->get($establishmentsWithTransactions);


        return $dataForDatabase;
    }
}
