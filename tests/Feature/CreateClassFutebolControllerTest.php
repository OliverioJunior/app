<?php

namespace Tests\Feature;

use App\Services\CreateClassFutebolController;
use Tests\TestCase;

class CreateClassFutebolControllerTest extends TestCase
{
    public function test_create_class_futebol()
    {
        $data =  [
            [
                "Origem", "1144 - BETS1.PRO", "1144 - BETS1.PRO", "014418 - Loja Mercadao Centro BETS1PRO", 1, 100, 15, 0, 0, 0, 85, "85.00%"
            ],
            [
                "Origem", "1144 - BETS1.PRO", "1144 - BETS1.PRO", "015418 - Caylan Conceicao BETS1PRO", 2, 4, 0.8, 0, 0, 0, 3.2, "80.00%"
            ]
        ];

        $controller = new CreateClassFutebolController();

        $result = $controller->create($data);

        $expectedResult = [
            (object)[
                "Centro de Custo" => "Origem", "Localidade" => "1144 - BETS1.PRO", "Seção" => "1144 - BETS1.PRO",
                "Estabelecimento" => "014418 - Loja Mercadao Centro BETS1PRO",
                "Quantidade" => 1,
                "Vendas" =>  100,
                "Comissão" => 15,
                "Comissão Retida" => 0,
                "Qtd Prêmios/Saques" => 0,
                "Prêmios/Saques" => 0,
                "Líquido" => 85,
                "% Liq." => "85.00%",
            ],
            (object)[
                "Centro de Custo" => "Origem", "Localidade" => "1144 - BETS1.PRO", "Seção" => "1144 - BETS1.PRO",
                "Estabelecimento" => "015418 - Caylan Conceicao BETS1PRO",
                "Quantidade" => 2,
                "Vendas" =>  4,
                "Comissão" => 0.8,
                "Comissão Retida" => 0,
                "Qtd Prêmios/Saques" => 0,
                "Prêmios/Saques" => 0,
                "Líquido" => 3.2,
                "% Liq." => "80.00%",
            ],

        ];

        $this->assertEquals($expectedResult, $result);
    }
}
