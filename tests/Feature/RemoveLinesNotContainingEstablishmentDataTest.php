<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\RemoveLinesNotContainingEstablishmentData;

class RemoveLinesNotContainingEstablishmentDataTest extends TestCase
{
    public function test_remove_lines_not_containing_establishments_data()
    {
        $data = [
            ['123456 - Value 1', 0, 0],
            ['', 0, 0],
            ['999999 - Value 7', 0, 0],
            ['', 'Value 11', 'Value 12'],
        ];


        $controller = new RemoveLinesNotContainingEstablishmentData();


        $result = $controller->remove($data);

        $expectedResult = [
            0 => ['123456 - Value 1', 0, 0],
            2 => ['999999 - Value 7', 0, 0],

        ];

        $this->assertEquals($expectedResult, $result);
    }
}
