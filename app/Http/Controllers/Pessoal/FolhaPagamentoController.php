<?php

namespace App\Http\Controllers\Pessoal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pessoal\FolhaPagamentoModel;

class FolhaPagamentoController extends Controller
{
    //POST
    public function matricula(Request $request){        
        if (($request->txtMatricula != '') && ($request->txtMatricula != null)) {
            return redirect()->route('MostrarPagamentos', ['matricula' => $request->txtMatricula]);            
        }
        return view('pessoal/folhapagamento.filtroMatricula');
    }

    //FAZER O RESTANTE DOS FILTROS AGORA.

    //GET
    //'/folhadepagamento/matricula/{numeroMatricula}'       
    public function MostrarPagamentos($matricula){                                                      
        $dadosDb = FolhaPagamentoModel::orderBy('Nome');
        $dadosDb->select('Nome','Matricula', 'MesPagamento', 'AnoPagamento');
        $dadosDb->where('Matricula', '=', $matricula);
        $dadosDb->groupBy('MesPagamento', 'AnoPagamento');
        $dadosDb->orderBy( 'AnoPagamento', 'desc');
        $dadosDb->orderBy( 'MesPagamento', 'desc');        
        $dadosDb = $dadosDb->get();                                
        $colunaDados = [ 'Nome', 'Matrícula','Mês', 'Ano'];
        $Navegacao = array(            
                array('url' => '/folhadepagamento/matricula' ,'Descricao' => 'Filtro'),
                array('url' => '#' ,'Descricao' => $matricula)
        );

        return View('pessoal/folhapagamento.tabelaPagamentos', compact('dadosDb', 'colunaDados', 'Navegacao'));
    }    

    //GET        
    public function showPagamento(){
        $Matricula =  isset($_GET['Matricula']) ? $_GET['Matricula'] : 'null';
        $Mes =  isset($_GET['Mes']) ? $_GET['Mes'] : 'null';
        $Ano =  isset($_GET['Ano']) ? $_GET['Ano'] : 'null';        

        $dadosDb = FolhaPagamentoModel::orderBy('Nome');        
        $dadosDb->where('Matricula', '=', $Matricula);
        $dadosDb->where('MesPagamento', '=', $Mes);
        $dadosDb->where('AnoPagamento', '=', $Ano);
        $dadosDb = $dadosDb->get();       
        
        // //Método para camuflar o CPF
        // $dadosDb = $this->ModificarCPF($dadosDb);

        return json_encode($dadosDb);
    }

    // private function ModificarCPF($dados){
    //     for ($i = 0; $i < count($dados); $i++){
    //         $dados[$i]->CPF = '***'.'.'.substr($dados[$i]->CPF,3,3).'.'.substr($dados[$i]->CPF,6,3).'-**';
    //     }        
    //     return $dados;
    // }



    // static public $EventosProibidos = new Array(215, 91, 449, 470, 512, 582, 682, 511, 601, 628, 30, 204, );
}