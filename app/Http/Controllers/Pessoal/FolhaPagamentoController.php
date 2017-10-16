<?php

namespace App\Http\Controllers\Pessoal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pessoal\FolhaPagamentoModel;
use App\Auxiliar as Auxiliar;

class FolhaPagamentoController extends Controller
{
    //POST
    public function matricula(Request $request){        
        if (($request->txtMatricula != '') && ($request->txtMatricula != null)) {
            return redirect()->route('MostrarPagamentos', ['matricula' => $request->txtMatricula]);            
        }
        return view('pessoal/folhapagamento.filtroMatricula');
    }   

    //GET    
    public function MostrarPagamentos($matricula, $contrato){                                                      
        $dadosDb = FolhaPagamentoModel::orderBy('Nome');
        $dadosDb->select('Nome','Matricula', 'MesPagamento', 'AnoPagamento', 'NumeroContrato');
        $dadosDb->where('Matricula', '=', $matricula);
        $dadosDb->where('NumeroContrato', '=', $contrato);        
        $dadosDb->groupBy('MesPagamento', 'AnoPagamento');
        $dadosDb->orderBy( 'AnoPagamento', 'desc');
        $dadosDb->orderBy( 'MesPagamento', 'desc');        
        $dadosDb = $dadosDb->get();                                
        $colunaDados = ['Mês', 'Ano'];
        $Navegacao = array(            
                array('url' => '/servidores/nome' ,'Descricao' => 'Filtro'),
                array('url' => '#' ,'Descricao' => 'Matrícula: ' . $matricula . ' | Contrato: ' . $contrato)
        );

        if (count($dadosDb) > 0){
            $Titulo = $dadosDb[0]->Nome . ' | CONTRATO ' . $dadosDb[0]->NumeroContrato;
        }else{
            $Titulo = 'Nenhum Pagamento Encontrado';
        }
        
        return View('pessoal/folhapagamento.tabelaPagamentos', compact('dadosDb', 'colunaDados', 'Navegacao', 'Titulo'));
    }

    //GET
    public function showPagamento(){
        $Matricula =  isset($_GET['Matricula']) ? $_GET['Matricula'] : 'null';
        $Contrato =  isset($_GET['Contrato']) ? $_GET['Contrato'] : 'null';
        $Mes =  isset($_GET['Mes']) ? $_GET['Mes'] : 'null';
        $Ano =  isset($_GET['Ano']) ? $_GET['Ano'] : 'null';

        $dadosDb = FolhaPagamentoModel::orderBy('Nome');
        $dadosDb->where('Matricula', '=', $Matricula);
        $dadosDb->where('NumeroContrato', '=', $Contrato);
        $dadosDb->where('MesPagamento', '=', $Mes);
        $dadosDb->where('AnoPagamento', '=', $Ano);
        $dadosDb = $dadosDb->get();

        //Método abaixo retira os eventos que não podem ser mostrados, como por exemplo os empréstimos.
        $eventos = [612, 617, 618, 630, 631, 632, 640, 516, 560, 511, 626, 504, 602, 605, 510, 512, 582, 584, 587, 588, 589, 601, 602, 607, 611, 619, 625, 626, 650, 682];
        $dadosDbAux = [];        
        
        for ($i = 0; $i < count($dadosDb); $i++){
            $aux = false;
             foreach ($eventos as $value){
                 if ($dadosDb[$i]->CodigoEvento == $value){
                     $aux = true;
                     break;
                 }
             }
             if ($aux != true){
                array_push($dadosDbAux, $dadosDb[$i]);
             }
        }         

         $dadosDb = $dadosDbAux;

        
        //Camuflar o CPF
        $dadosDb = Auxiliar::ModificarCPF($dadosDb);

        return json_encode($dadosDb);
    }    
}