<?php

namespace App\Http\Controllers;

class RemoveEmptyArrayController extends Controller
{
    public function remove(array $data)
    {

        $filteredData = array_filter($data, function ($row) {
            if (isset($row[0])) {
                return preg_match('/^\d{6}\s+-/', $row[0]) === 1;
            }
            return false;
        });

        return  array_map(function ($row) {
            return array_values($row);
        }, $filteredData);
    }
}
