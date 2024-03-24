<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Http\Controllers\RemoveNullValuesArrayController;

class RemoveNullValuesArrayControllerTest extends TestCase
{
    public function test_remove_null_values()
    {

        $data = [
            ['a' => 1, 'b' => null, 'c' => 3],
            ['a' => null, 'b' => 2, 'c' => null],
            ['a' => 4, 'b' => 5, 'c' => null],
        ];


        $controller = new RemoveNullValuesArrayController();


        $result = $controller->remove($data);

        $expectedResult = [
            ['a' => 1, 'c' => 3],
            ['b' => 2],
            ['a' => 4, 'b' => 5],
        ];

        $this->assertEquals($expectedResult, $result);
    }
}
