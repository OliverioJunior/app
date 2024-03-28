<?php

namespace App\Services;

class JogoDoBichoDataForDbController
{
    /**
     * @param array|null $data 
     *
     * @return array 
     */
    public function get(?array $data): array
    {

        if ($data === null) {
            return [];
        }

        return array_map(function ($estabelecimento) {
            $comissao = round($estabelecimento->Vendas * 0.2, 2);
            $premio = $estabelecimento->Pgto - $comissao;

            return (object) [
                'estabelecimento' => $estabelecimento->Ponto,
                'vendas' => (float) $estabelecimento->Vendas,
                'comissao' => $comissao,
                'premio' => $premio,
                'liquido' => (float) $estabelecimento->Líquido,
            ];
        }, $data);
    }
}
