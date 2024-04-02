<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\RemoveNullValuesArrayController;

class RemoveNullValuesArrayControllerTest extends TestCase
{
    public function test_remove_null_values()
    {

        $data = [
            [1, null, 3],
            [null, 2, null],
            [4, 5, null],
        ];


        $controller = new RemoveNullValuesArrayController();


        $result = $controller->remove($data);

        $expectedResult = [
            [0 => 1, 2 => 3],
            [1 => 2],
            [4, 5],
        ];

        $this->assertEquals($expectedResult, $result);
    }
}
