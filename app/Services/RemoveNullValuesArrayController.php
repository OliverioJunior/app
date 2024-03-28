<?php

namespace App\Services;

class RemoveNullValuesArrayController
{
    /**
     * Remove null and optionally false, empty string, etc. values from a multidimensional array.
     *
     * @param array
     * @return array
     */
    public function remove($data): array
    {
        return array_map(function ($row) {
            return array_filter($row, function ($value) {
                return $value !== null;
            });
        }, $data);
    }
}
