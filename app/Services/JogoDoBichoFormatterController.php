<?php

namespace App\Services;

class JogoDoBichoFormatterController
{
    private $removeNullValuesController;
    private $removeEmptyLinesController;
    private $createClassJogoDoBichoController;
    private $filterNonZeroValuesSalesController;
    private $jogoDoBichoDataForDbController;

    public function __construct(
        RemoveNullValuesArrayController $removeNullValuesController,
        RemoveLinesNotContainingEstablishmentData $removeEmptyLinesController,
        CreateClassJogoDoBichoController $createClassJogoDoBichoController,
        FilterNonZeroValuesSalesAndNetProfitController $filterNonZeroValuesSalesController,
        JogoDoBichoDataForDbController $jogoDoBichoDataForDbController
    ) {
        $this->removeNullValuesController = $removeNullValuesController;
        $this->removeEmptyLinesController = $removeEmptyLinesController;
        $this->createClassJogoDoBichoController = $createClassJogoDoBichoController;
        $this->filterNonZeroValuesSalesController = $filterNonZeroValuesSalesController;
        $this->jogoDoBichoDataForDbController = $jogoDoBichoDataForDbController;
    }

    public function formatter(array $data): array
    {
        $reportWithoutNullValues = $this->removeNullValuesController->remove($data);
        $reportWithoutEmptyLines = $this->removeEmptyLinesController->remove($reportWithoutNullValues);

        $jogoDoBichoClass = $this->createClassJogoDoBichoController->create($reportWithoutEmptyLines);

        $jogoDoBichoClassWithSales = $this->filterNonZeroValuesSalesController->filter($jogoDoBichoClass);
        $dataForDB = $this->jogoDoBichoDataForDbController->get($jogoDoBichoClassWithSales);

        return $dataForDB;
    }
}
