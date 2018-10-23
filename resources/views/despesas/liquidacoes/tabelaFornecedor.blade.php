@extends('despesas.tabelaDespesas')

@section('htmlheader_title')
    Liquidações
@stop

@section('contentTabela')
    <div class="row" style="overflow:auto">
        <table id="tabela" class="table table-bordered table-striped" summary="Resultado da pesquisa">
            <thead>
                <tr>
                    <?PHP
                        foreach ($colunaDados as $valor) {
                            if ($valor == "Valor Liquidado"){
                                echo "<th scope='col' style='vertical-align:middle;text-align:right' data-dynatable-column='valormoeda'>" . $valor . "</th>";
                            }else if($valor == "Data de Liquidação"){
                                echo "<th scope='col' style='vertical-align:middle' data-dynatable-column='dataColumn'>" . $valor . "</th>";
                            }
                            else{
                                echo "<th style='vertical-align:middle'>" . $valor . "</th>";
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
                                $fornecedor = App\Auxiliar::ajusteUrl($valor->Beneficiario);
                                echo "<td scope='col'><a href='". route('MostrarLiquidacaoFornecedorOrgao', ['datainicio' => $datainicio, 'datafim' => $datafim,'fornecedores' =>$fornecedor,'orgao' => $valor->Orgao]) ."'>". $valor->Orgao ."</a></td>";
                                break;
                            case 'Unidade Gestora':
                                echo "<td scope='col'>". $valor->UnidadeGestora ."</td>";
                                break;
                            case 'Fornecedor':
                                $fornecedor = App\Auxiliar::ajusteUrl($valor->Beneficiario);
                                echo "<td scope='col'><a href='". route('MostrarLiquidacaoFornecedor', ['datainicio' => $datainicio, 'datafim' => $datafim, 'orgao' => $valor->Orgao,'fornecedores' =>$fornecedor]) ."'>". $valor->Beneficiario ."</a></td>";
                                break;  
                            case 'Data de Liquidação':
                                echo "<td scope='col'>". $valor->DataLiquidacao ."</td>";
                                break;
                            case 'Elemento':
                                echo "<td scope='col'>". $valor->ElemDespesa ."</td>";
                                break;    
                            case 'Nota de Liquidação':
                                
                                $navegacao = serialize($Navegacao); ?>
                                <td scope='col'>
                                    {{Form::open(array('action' => array('Despesas\LiquidacoesController@mostrarLiquidacaoPelaNota')))}}
                                            <input type="hidden" name="navegacao" value="{{$navegacao}}">
                                            <input type="hidden" name="LiquidacaoID" value="{{$valor->LiquidacaoID}}">
                                            <input type="hidden" name="datainicio" value="{{$datainicio}}">
                                            <input type="hidden" name="datafim" value="{{$datafim}}">
                                            <button style='border-color:transparent; background-color:transparent; color:steelblue' type='submit'>{{$valor->NotaLiquidacao}}</button>
                                    {{Form::close()}}
                                </td>
                                <?PHP

                                break;                        
                            case 'Valor Liquidado':                                
                                echo "<td scope='col'>" . $valor->ValorLiquidado . "</td>";
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
<!-- Modal de Liquidação -->
<script src="{{ asset('/dist/js/modals/liquidacao-modal.js') }}"></script>

<script>
var ExportButtons = document.getElementById('tabela');
var instance = new TableExport(ExportButtons, {
    formats: ['xls','csv'],
    exportButtons: false,
    filename:'liquidacao fornecedor'
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