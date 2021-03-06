<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Receitas\ReceitaModel;
use App\Models\Receitas\ISSModel;
class ApiReceitasController extends Controller
{

    public function arrecadadas($dataInicio,$dataFim)
    {
        $dataInicio=date("Y-m-d", strtotime($dataInicio));
        $dataFim=date("Y-m-d", strtotime($dataFim));

        $dadosDb = ReceitaModel::orderBy('DataArrecadacao');
        $dadosDb->whereBetween('DataArrecadacao', [$dataInicio, $dataFim]);
        $dadosDb = $dadosDb->get();

        return Json_encode($dadosDb, JSON_UNESCAPED_UNICODE);
    }

    public function iss($dataInicio,$dataFim)
    {
        $dataInicio=date("Y-m-d", strtotime($dataInicio));
        $dataFim=date("Y-m-d", strtotime($dataFim));

        $dadosDb = ISSModel::orderBy('DataNFSe');
        $dadosDb->select('DataNFSe', 'UnidadeGestora', 'CategoriaEconomica', 'Origem', 'Especie', 'Rubrica', 'Alinea', 'Subalinea', 'ValorISS', 'CodigoServico', 'DescricaoServico');
        $dadosDb->whereBetween('DataNFSe', [$dataInicio, $dataFim]);
        $dadosDb = $dadosDb->get();

        return Json_encode($dadosDb, JSON_UNESCAPED_UNICODE);
    }
}