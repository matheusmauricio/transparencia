@extends('despesas.tabelaDespesas')

@section('htmlheader_title')
    Restos a Pagar
@stop

@section('contentTabela')
    <div class="row" style="overflow:auto">
        <table id="tabela" class="table table-bordered table-striped" summary="Resultado da pesquisa">
            <thead>
                <tr>
                    <?PHP
                        foreach ($colunaDados as $valor) {
                            if ($valor == "Valor Pago"){
                                echo "<th scope='col' style='vertical-align:middle;text-align:right' data-dynatable-column='valormoeda'>" . $valor . "</th>";
                            }else if($valor == "Data de Pagamento"){
                                echo "<th scope='col' style='vertical-align:middle' data-dynatable-column='dataColumn'>" . $valor . "</th>";
                            }
                            else{
                                echo "<th scope='col' style='vertical-align:middle'>" . $valor . "</th>";
                            }
                        }                        
                    ?>
                </tr>
            </thead>
            <tbody>
                <?PHP
                foreach ($dadosDb as $valor) {                    
                    echo "<tr>";
                    foreach ($colunaDados as $valorColuna) {
                        switch ($valorColuna) {
                            case 'Órgão':
                                $orgao = App\Auxiliar::ajusteUrl($valor->Orgao);
                                $funcao = App\Auxiliar::ajusteUrl($valor->Funcao);
                                echo "<td scope='col'><a href='". route('MostrarPagamentoRestoFuncaoOrgao', ['datainicio' => $datainicio, 'datafim' => $datafim,'funcao' =>$funcao ,'orgao' => $orgao]) ."'>". $valor->Orgao ."</a></td>";
                                break;
                            case 'Unidade Gestora':
                                echo "<td scope='col'>". $valor->UnidadeGestora ."</td>";
                                break;
                            case 'Funções':
                                $funcao = App\Auxiliar::ajusteUrl($valor->Funcao);
                                echo "<td scope='col'><a href='". route('MostrarPagamentoRestoFuncao', ['datainicio' => $datainicio, 'datafim' => $datafim, 'orgao' => $valor->Orgao,'funcao' =>$funcao]) ."'>". $valor->Funcao ."</a></td>";
                                break;
                            case 'Fornecedores':
                                $orgao = App\Auxiliar::ajusteUrl($valor->Orgao);
                                $funcao = App\Auxiliar::ajusteUrl($valor->Funcao);
                                $fornecedor = App\Auxiliar::ajusteUrl($valor->Beneficiario);
                                echo "<td scope='col'><a href='". route('MostrarPagamentoRestoFuncaoOrgaoFornecedor', ['datainicio' => $datainicio, 'datafim' => $datafim,'funcao' =>$funcao, 'orgao' => $orgao,'fornecedor' =>$fornecedor]) ."'>". $valor->Beneficiario ."</a></td>";
                                break;  
                            case 'Data de Pagamento':
                                echo "<td scope='col'>". $valor->DataPagamento ."</td>";
                                break;
                            case 'Elementos':
                                echo "<td scope='col' >". $valor->ElemDespesa ."</td>";
                                break;    
                            case 'Nota de Pagamento':

                                $navegacao = serialize($Navegacao); ?>
                                <td scope='col'>
                                    {{Form::open(array('action' => array('Despesas\PagamentoRestoController@mostrarPagamentoRestoPelaNota', 'funcoes')))}}
                                            <input type="hidden" name="navegacao" value="{{$navegacao}}">
                                            <input type="hidden" name="PagamentoID" value="{{$valor->PagamentoID}}">
                                            <input type="hidden" name="datainicio" value="{{$datainicio}}">
                                            <input type="hidden" name="datafim" value="{{$datafim}}">
                                            <button style='border-color:transparent; background-color:transparent; color:steelblue' type='submit'>{{$valor->NotaPagamento}}</button>
                                    {{Form::close()}}
                                </td>
                                <?PHP

                                break;                        
                            case 'Valor Pago':                                
                                echo "<td scope='col'>" . $valor->ValorPago . "</td>";
                                break;
                        }
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
@stop

@section('scriptsadd')
@parent
<!-- Modal de Restos a Pagar -->
<script src="{{ asset('/dist/js/modals/restospagar-modal.js') }}"></script>

<script>
var ExportButtons = document.getElementById('tabela');
var instance = new TableExport(ExportButtons, {
    formats: ['xls','csv'],
    exportButtons: false,
    filename:'resto funcao'
});
var exportDataXls = instance.getExportData()['tabela']['xls'];
var exportDataCsv = instance.getExportData()['tabela']['csv'];

var XLSbutton = document.getElementById('customXLSButton');
XLSbutton.addEventListener('click', function (e) {
    instance.export2file(exportDataXls.data, exportDataXls.mimeType, exportDataXls.filename, exportDataXls.fileExtension);
});


var XLSbutton = document.getElementById('customCSVButton');
XLSbutton.addEventListener('click', function (e) {
    instance.export2file(exportDataCsv.data, exportDataCsv.mimeType, exportDataCsv.filename, exportDataCsv.fileExtension);
});

</script>
@stop