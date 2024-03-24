<?php

namespace Tests\Unit;

use App\Http\Controllers\JogoDoBichoDataForDbController;
use PHPUnit\Framework\TestCase;

class JogoDoBichoDataForDbControllerTest extends TestCase
{
    public function test_get_method_returns_correct_data()
    {

        $controller = new JogoDoBichoDataForDbController();
        $data = [
            (object)['Ponto' => 'Estabelecimento A', 'Vendas' => 100.0, 'Pgto' => 80.0, 'Líquido' => 20.0],
            (object)['Ponto' => 'Estabelecimento B', 'Vendas' => 200.0, 'Pgto' => 160.0, 'Líquido' => 40.0],
        ];

        $result = $controller->get($data);

        $this->assertCount(2, $result);

        $this->assertEquals('Estabelecimento A', $result[0]->estabelecimento);
        $this->assertEquals(100.0, $result[0]->vendas);
        $this->assertEquals(20.0, $result[0]->comissao);
        $this->assertEquals(60.0, $result[0]->premio);
        $this->assertEquals(20.0, $result[0]->liquido);

        $this->assertEquals('Estabelecimento B', $result[1]->estabelecimento);
        $this->assertEquals(200.0, $result[1]->vendas);
        $this->assertEquals(40.0, $result[1]->comissao);
        $this->assertEquals(120.0, $result[1]->premio);
        $this->assertEquals(40.0, $result[1]->liquido);
    }
}