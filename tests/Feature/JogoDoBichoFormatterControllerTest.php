<?php

namespace Tests\Unit;

use App\Http\Controllers\JogoDoBichoFormatterController;
use PHPUnit\Framework\TestCase;

class JogoDoBichoFormatterControllerTest extends TestCase
{
    public function test_formatter_returns_correct_data()
    {

        $formatter = new JogoDoBichoFormatterController();
        $data = [
            ["000002   - Coleta 2", null, null, null, "0.00", null, null, null, "0.00", null, null, null, "0.00", null, null, null, "0.00", null, null, null, "0.00", null, null, null, "0.00", null, null, null, "0.00", null, null, null, "0.00", null, null, null, "0.00", null, null, null, "0.00", null, null, null],
            ["000003   - Coleta 3", null, null, null, "0.00", null, null, null, "0.00", null, null, null, "0.00", null, null, null, "0.00", null, null, null, "0.00", null, null, null, "0.00", null, null, null, "0.00", null, null, null, "0.00", null, null, null, "0.00", null, null, null, "0.00", null, null, null],
            ["010002   - JHONATAS COLINAS", null, null, null, "0.00", null, null, null, "0.00", null, null, null, "0.00", null, null, null, "0.00", null, null, null, "0.00", null, null, null, "0.00", null, null, null, "0.00", null, null, null, "0.00", null, null, null, "0.00", null, null, null, "0.00", null, null, null],
            ["010020   - LOJA ARENA 1 COLINAS", null, null, null, null, null, null, "125.00", null, null, null, "125.00", null, null, null, "5.00", null, null, null, "100.00", null, null, null, "0.00", null, null, null, "0.00", null, null, null, "0.00", null, null, null, "0.00", null, null, null, "346.40", null, null, null, "472.68", null, null, null, "888049.16"],
        ];


        $formattedData = $formatter->formatter($data);

        $this->assertCount(1, $formattedData);
        $this->assertEquals("010020   - LOJA ARENA 1 COLINAS", $formattedData[3]->estabelecimento);
        $this->assertEquals(125.0, $formattedData[3]->vendas);
        $this->assertEquals(25.0, $formattedData[3]->comissao);
        $this->assertEquals(-20.0, $formattedData[3]->premio);
        $this->assertEquals(100.0, $formattedData[3]->liquido);
    }
}
