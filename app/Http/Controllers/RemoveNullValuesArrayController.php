<?php

namespace App\Http\Controllers;


class RemoveNullValuesArrayController extends Controller
{
    public function remove(array $data)
    {
        return array_map(function ($row) {
            return array_filter($row, function ($value) {
                return $value !== null;
            });
        }, $data);
    }
}
