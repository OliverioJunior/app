<?php

namespace Tests\Unit;

use App\Services\FutebolDataForDatabaseController;
use PHPUnit\Framework\TestCase;

class FutebolDataForDatabaseControllerTest extends TestCase
{
    public function testGetMethodReturnsDesiredKeys()
    {

        $data = [
            (object)[
                "Localidade" => "1144 - BETS1.PRO",
                "Seção" => "1144 - BETS1.PRO",
                "Estabelecimento" => "014418 - Loja Mercadao Centro BETS1PRO",
                "Quantidade" => 1,
                "Vendas" => 100,
                "Comissão" => 15,
                "Comissão Retida" => 0,
                "Qtd Prêmios/Saques" => 0,
                "Prêmios/Saques" => 0,
                "Líquido" => 85,
                "% Liq." => "85.00%"
            ]
        ];


        $controller = new FutebolDataForDatabaseController();


        $result = $controller->get($data);


        $this->assertIsArray($result);


        foreach ($result as $item) {
            $this->assertIsObject($item);
        }


        foreach ($result as $item) {
            $desired_keys = [
                "Localidade",
                "Seção",
                "Estabelecimento",
                "Quantidade",
                "Vendas",
                "Comissão",
                "Prêmios/Saques",
                "Líquido"
            ];
            foreach ($desired_keys as $key) {
                $this->assertObjectHasProperty($key, $item);
            }
        }
    }
}
