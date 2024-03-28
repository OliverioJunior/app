<?php

namespace App\Services;

class RemoveLinesNotContainingEstablishmentData
{
    /**
     * Remove lines from the data array that do not contain establishment data.
     *
     * @param array $data The input data array
     * @return array The filtered data array
     */
    public function remove($data): array
    {

        $establishmentDataPattern = '/^\d{6}\s+-/';

        $establishment = array_filter($data, function ($row) use ($establishmentDataPattern) {
            return array_key_exists(0, $row) && preg_match($establishmentDataPattern, $row[0]) === 1;
        });

        foreach ($establishment as $row) {
            $reIndexedEstablishment[] = array_values($row);
        }

        return $reIndexedEstablishment;
    }
}
