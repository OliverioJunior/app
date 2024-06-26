<?php

namespace App\Services;

use PhpOffice\PhpSpreadsheet\IOFactory;

class ExcelReaderController
{
    public function readXlsx(String $filePath)
    {
        try {
            $spreadsheet = IOFactory::load($filePath);
            $worksheet = $spreadsheet->getActiveSheet();

            $data = [];

            foreach ($worksheet->getRowIterator() as $row) {
                $rowData = [];
                foreach ($row->getCellIterator() as $cell) {
                    $rowData[] = $cell->getValue();
                }

                $data[] = $rowData;
            }
            return $data;
        } catch (\Throwable $th) {
            return throw new \Exception($th->getMessage(), 500);
        }
    }
}
