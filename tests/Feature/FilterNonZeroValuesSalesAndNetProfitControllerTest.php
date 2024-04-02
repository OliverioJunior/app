<?php

namespace Tests\Unit;

use App\Services\FilterNonZeroValuesSalesAndNetProfitController;
use PHPUnit\Framework\TestCase;

class FilterNonZeroValuesSalesAndNetProfitControllerTest extends TestCase
{
    public function test_filter_removes_entries_with_zero_sales_and_net_profit()
    {

        $controller = new FilterNonZeroValuesSalesAndNetProfitController();
        $data = [
            (object)['Vendas' => 100.00, 'Líquido' => 50.00],
            (object)['Vendas' => 0.00, 'Líquido' => 50.00],
            (object)['Vendas' => 0.00, 'Líquido' => 0.00],
            (object)['Vendas' => 100.00, 'Líquido' => 50.00],
            (object)['Vendas' => 0.00, 'Líquido' => 0.00],
        ];

        $filteredData = $controller->filter($data);

        $this->assertCount(3, $filteredData);
        $this->assertEquals(100.0, $filteredData[0]->Vendas);
        $this->assertEquals(50.0, $filteredData[0]->Líquido);
        $this->assertEquals(0.0, $filteredData[1]->Vendas);
        $this->assertEquals(50.0, $filteredData[1]->Líquido);
        $this->assertEquals(null, $filteredData[2]->Líquido);
    }
}
