@extends('patrimonio.PatrimonioTabela')

@section('htmlheader_title')
    Bens Móveis
@stop

@section('contentTabela')
    <div class="row" style="overflow:auto">
        <table id="tabela" class="table table-bordered table-striped" summary="Resultado da pesquisa">
            <thead>
                <tr>
                    <?PHP
                        foreach ($colunaDados as $valor) {
                             if ($valor == "Valor"){
                                echo "<th scope='col' style='vertical-align:middle;text-align:right'' data-dynatable-column='valormoeda'>" . $valor . "</th>";
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
                                echo "<td scope='col'><a href='". route('BensOrgao', ['orgao' => $valor->OrgaoLocalizacao]) ."'>". $valor->OrgaoLocalizacao ."</a></td>";
                                break;
                            case 'Tipo':
                                echo "<td><a href='". route('BensOrgaoTipo', ['orgao' => $valor->OrgaoLocalizacao, 'tipo' => str_replace('/', '@', $valor->Tipo)]) ."'>". $valor->Tipo ."</a></td>";
                                break;
                            case 'Patrimônio':                                                                                                                                                                                                                
                                 echo "<td scope='col'><a href='#' onclick=ShowBemMovel(". $valor->IdentificacaoBem .") data-toggle='modal' data-target='#myModal'>". $valor->IdentificacaoBem ."</a></td>";
                                break;
                            case 'Descrição':                                                                    
                                echo "<td scope='col'>".$valor->Descricao."</td>";                                                                                                                                        
                                break;                                                                 
                            case 'Valor':      
                                    echo "<td scope='col'>" . $valor->ValorAquisicao . "</td>";                                                                                                                                                                                                                                                                            
                                break;                                                                  
                                                                                                                                                                                                                            
                        }
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
@endsection

@section('scriptsadd')
@parent
<script>
    function ShowBemMovel(patrimonio) {
        document.getElementById("modal-body").innerHTML = '';
        document.getElementById("titulo").innerHTML = '';
        tamanho=$("table").css('font-size');
        $.get("{{ route('ShowBemMovel')}}", {Patrimonio: patrimonio}, function(value){
            var data = JSON.parse(value);
            $("#myModalLabel").css('font-size',tamanho);
            document.getElementById("titulo").innerHTML = '<span>Dados do Patrimônio Nº: </span> ' + data[0].IdentificacaoBem;
                                                                                                                                                                                    
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
                                            '<td>Número do Patrimonio:</td>' +
                                            '<td>' + data[0].IdentificacaoBem + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Tipo:</td>' +
                                            '<td>' + data[0].Tipo + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Descrição:</td>' +
                                            '<td>' + data[0].Descricao + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Órgão:</td>' +
                                            '<td>' + data[0].OrgaoLocalizacao + '</td>'+                                                        
                                            '</tr>'+                                            
                                            '<tr>'+                                                        
                                            '<td>Valor:</td>' +
                                            '<td>' + currencyFormat(data[0].ValorAquisicao,2)+'</td>'+                                                        
                                            '</tr>' +                                                                                                      
                                        '</tbody>'+
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
    filename:'moveis'
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
@endsection