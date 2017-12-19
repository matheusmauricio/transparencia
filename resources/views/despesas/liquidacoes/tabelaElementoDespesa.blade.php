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
                            case 'Órgãos':
                                echo "<td scope='col'><a href='". route('MostrarLiquidacaoElementoOrgao', ['datainicio' => $datainicio, 'datafim' => $datafim,'elemento' =>$valor->ElemDespesa ,'orgao' => $valor->UnidadeGestora]) ."'>". $valor->UnidadeGestora ."</a></td>";
                                break;
                            case 'Elementos':
                                $elemento = App\Auxiliar::ajusteUrl($valor->ElemDespesa);
                                echo "<td scope='col'><a href='". route('MostrarLiquidacaoElemento', ['datainicio' => $datainicio, 'datafim' => $datafim, 'elemento' => $elemento]) ."'>". $valor->ElemDespesa ."</a></td>";
                                break;  
                            case 'Data de Liquidação':
                                echo "<td scope='col'>". $valor->DataLiquidacao ."</td>";
                                break;
                            case 'Fornecedores':
                                echo "<td scope='col'>". $valor->Beneficiario ."</td>";
                                break;    
                            case 'Nota de Liquidação':
                                echo "<td scope='col'><a href='#' onclick=ShowLiquidacao(". $valor->LiquidacaoID .") data-toggle='modal' data-target='#myModal'> ".$valor->NotaLiquidacao."</a></td>";
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
<script>    
    //Função para o Model ou PopUP
    function ShowLiquidacao(liquidacaoID) {
        document.getElementById("modal-body").innerHTML = '';
        document.getElementById("titulo").innerHTML = '';
        tamanho=$("table").css('font-size');
        $.get("{{ route('ShowLiquidacao')}}", {LiquidacaoID: liquidacaoID}, function(value){
            var data = JSON.parse(value);
            $("#myModalLabel").css('font-size',tamanho);
            document.getElementById("titulo").innerHTML = '<span>Nota de Liquidação Nº: </span> ' + data[0].NotaLiquidacao + '/' + data[0].AnoExercicio;
            
            var body = '' + '<div class="row">'+
                                '<div class="col-md-12">'+
                                '<table class="table table-sm" style="font-size:'+tamanho+'">'+
                                        '<thead>'+
                                            '<tr>'+
                                            '<th colspan="2">DADOS</th>'+                                                    
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody>'+
                                            '<tr>'+                                                        
                                            '<td>Órgão:</td>' +
                                            '<td>' +data[0].UnidadeGestora+ '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Processo:</td>' ;
                                            if((data[0].Processo=='')||(data[0].Processo==null)){
                                                body=body+'<td>Não informado</td>';
                                            }
                                            else{
                                                body=body+'<td>' +$.trim(data[0].Processo)+ '</td>';
                                            }
                                                                                                    
                                body=body+'</tr>'+                                                 
                                            '<td>Ação:</td>' +
                                            '<td>' + data[0].Acao + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                    
                                            '<td>Subtítulo:</td>';
                                            if((data[0].Subtitulo=='')||(data[0].Subtitulo==null)){
                                                body=body+'<td>Cachoeiro de Itapemirim</td>';
                                            }
                                            else{
                                                body=body+'<td>' +$.trim(data[0].Subtitulo)+ '</td>';
                                            }                                                 
                                body=body+'</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Elemento da Despesa:</td>' +
                                            '<td>' + data[0].ElemDespesa + '</td>'+                                                        
                                            '</tr>'+   
                                            '<tr>'+                                                        
                                            '<td>Programa:</td>' +
                                            '<td>' + data[0].Programa + '</td>'+                                                        
                                            '</tr>'+                                          
                                            '<tr>'+                                                        
                                            '<td>Fonte de Recursos:</td>' +
                                            '<td>' + data[0].FonteRecursos + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+                                                        
                                            '<td>Função:</td>' +
                                            '<td>' + data[0].Funcao + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+                                                        
                                            '<td>Subfunção:</td>' +
                                            '<td>' +data[0].SubFuncao + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+                                                        
                                            '<td>Ano Exercício:</td>' +
                                            '<td>' + data[0].AnoExercicio + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+                                                        
                                            '<td>Data de Liquidação:</td>' +
                                            '<td>' +stringToDate(data[0].DataLiquidacao) + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+                                                        
                                            '<td>Modalidade Licitatória:</td>';
                                            if((data[0].ModalidadeLicitatoria=='')||(data[0].ModalidadeLicitatoria==null)){
                                                body=body+'<td>Não Aplicável</td>';
                                            }
                                            else{
                                                body=body+'<td>' +$.trim(data[0].ModalidadeLicitatoria)+ '</td>';
                                            }     
                                body=body+'</tr>' +
                                            '<tr>'+                                                        
                                            '<td>Categoria Econômica:</td>' +
                                            '<td>' + data[0].CatEconomica + '</td>'+                                                        
                                            '</tr>'+ 
                                            '<tr>'+                                                        
                                            '<td>Modalidade Aplicação:</td>' +
                                            '<td>' + $.trim(data[0].ModalidadeAplicacao) + '</td>'+
                                            '</tr>' +
                                            '<tr>'+                                                        
                                            '<td>Natureza da Despesa:</td>' +
                                            '<td>' + data[0].NaturezaDespesa + '</td>'+                                                        
                                            '</tr>'+ 
                                            '<tr>'+                                                        
                                            '<td>Nota do Empenho:</td>' +
                                            '<td><a href=/despesas/empenhos/nota/'+data[0].NotaEmpenho+'/'+data[0].AnoNotaEmpenho+'>' + data[0].NotaEmpenho +'/'+data[0].AnoNotaEmpenho+ '</a></td>'+
                                            '</tr>' +
                                            '<tr>'+                                                        
                                            '<td>Descrição:</td>' +
                                            '<td>' + data[0].ProdutoServico + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+                                                                                                                                                                                                         
                                        '</tbody>'+
                                    '</table>'+
                                    '<table class="table table-sm" style="font-size:'+tamanho+'">'+
                                        '<thead>'+
                                            '<tr>'+
                                            '<th colspan="2">Credor</th>'+
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Nome:</td>' +
                                            '<td>' + data[0].Beneficiario + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+                                                        
                                            '<td>CPF/CNPJ:</td>' +
                                            '<td>' + FormatCpfCnpj(data[0].CPF_CNPJ) + '</td>'+                                                        
                                            '</tr>' +
                                        '</thead>'+                                        
                                    '</table>'+
                                    '<table class="table table-sm" style="font-size:'+tamanho+'">'+
                                        '<thead>'+
                                            '<tr>'+
                                            '<th>Valor Liquidado</th>'+
                                            '<th>'+'R$ '+currencyFormat(data[0].ValorLiquidado)+'</th>'+
                                            '</tr>'+                                        
                                        '</thead>'+                                        
                                    '</table>';
            
            body = body + '</div>' + '</div>';

            document.getElementById("modal-body").innerHTML = body;
        });
    }
</script>
<script>
var ExportButtons = document.getElementById('tabela');
var instance = new TableExport(ExportButtons, {
    formats: ['xls','csv'],
    exportButtons: false,
    filename:'liquidacoe elemento despesa'
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