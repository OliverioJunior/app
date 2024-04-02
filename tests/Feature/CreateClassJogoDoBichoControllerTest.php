<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\CreateClassJogoDoBichoController;

class CreateClassJogoDoBichoControllerTest extends TestCase
{
    public function test_create_class_jogo_do_bicho()
    {
        $data = [
            ["Ponto 1", 100, 50, 50, 30, 10, 5, 2, 3, 4, 0, 10, 20, 5],
            ["Ponto 2", 150, 70, 80, 50, 15, 10, 3, 5, 6, 0, 20, 25, 0],
        ];

        $controller = new CreateClassJogoDoBichoController();

        $result = $controller->create($data);

        $this->assertIsArray($result);
        $this->assertCount(2, $result);


        $this->assertObjectHasProperty("Ponto", $result[0]);
        $this->assertEquals('Ponto 1', $result[0]->Ponto);
        $this->assertEquals(100, $result[0]->Bruta);
        $this->assertEquals(50, $result[0]->Vendas);
        $this->assertEquals(50, $result[0]->Pgto);
        $this->assertEquals(30, $result[0]->Líquido);

        $this->assertObjectHasProperty('Ponto', $result[1]);
        $this->assertEquals('Ponto 2', $result[1]->Ponto);
        $this->assertEquals(150, $result[1]->Bruta);
        $this->assertEquals(70, $result[1]->Vendas);
        $this->assertEquals(80, $result[1]->Pgto);
        $this->assertEquals(50, $result[1]->Líquido);
    }
}
