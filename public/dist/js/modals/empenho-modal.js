//Função para o Model ou PopUP
function ShowEmpenho(empenhoID) {
    tamanho = $("table").css('font-size');
    document.getElementById("modal-body").innerHTML = '';
    document.getElementById("titulo").innerHTML = '';

    $.get("/despesas/empenhos/showEmpenho", { EmpenhoID: empenhoID }, function(value) {
        var data = JSON.parse(value);
        $("#myModalLabel").css('font-size', tamanho);
        document.getElementById("titulo").innerHTML = '<span>Nota de Empenho Nº: </span> ' + data[0].NotaEmpenho + '/' + data[0].AnoExercicio;

        var body = '' + '<div class="row">' +
            '<div class="col-md-12">' +
            '<table class="table table-sm" style="font-size:' + tamanho + '">' +
            '<thead>' +
            '<tr>' +
            '<th colspan="2">DADOS</th>' +
            '</tr>' +
            '</thead>' +
            '<tbody>' +
            '<tr>' +
            '<td>Órgão:</td>' +
            '<td>' + data[0].Orgao + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Unidade Gestora:</td>' +
            '<td>' + data[0].UnidadeGestora + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Processo:</td>';
        if ((data[0].NumeroProcesso == '') || (data[0].NumeroProcesso == null) || (data[0].AnoProcesso == '') || (data[0].AnoProcesso == null)) {
            body = body + '<td>Não informado</td>';
        } else {
            body = body + '<td>' + $.trim(data[0].NumeroProcesso + "/" + data[0].AnoProcesso) + '</td>';
        }

        body = body + '</tr>' +
            '<tr>' +
            '<td>Ação:</td>' +
            '<td>' + data[0].Acao + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Subtítulo:</td>';
        if ((data[0].Subtitulo == '') || (data[0].Subtitulo == null)) {
            body = body + '<td>Cachoeiro de Itapemirim</td>';
        } else {
            body = body + '<td>' + $.trim(data[0].Subtitulo) + '</td>';
        }
        body = body + '</tr>' +
            '<tr>' +
            '<td>Elemento da Despesa:</td>' +
            '<td>' + data[0].ElemDespesa + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Programa:</td>' +
            '<td>' + data[0].Programa + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Fonte de Recursos:</td>' +
            '<td>' + data[0].FonteRecursos + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Função:</td>' +
            '<td>' + data[0].Funcao + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Subfunção:</td>' +
            '<td>' + data[0].SubFuncao + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Ano Exercício:</td>' +
            '<td>' + data[0].AnoExercicio + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Data de Empenho:</td>' +
            '<td>' + stringToDate(data[0].DataEmpenho) + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Modalidade Licitatória:</td>';
        if ((data[0].ModalidadeLicitatoria == '') || (data[0].ModalidadeLicitatoria == null)) {
            body = body + '<td>Não Aplicável</td>';
        } else {
            body = body + '<td>' + $.trim(data[0].ModalidadeLicitatoria) + '</td>';
        }
        body = body + '</tr>' +
            '<tr>' +
            '<td>Categoria Econômica:</td>' +
            '<td>' + data[0].CatEconomica + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Modalidade Aplicação:</td>' +
            '<td>' + $.trim(data[0].ModalidadeAplicacao) + '</td>' +
            '</tr>' +
            '<tr>' +
            '<tr>' +
            '<td>Natureza da Despesa:</td>' +
            '<td>' + data[0].NaturezaDespesa + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Descrição:</td>' +
            '<td>' + data[0].ProdutoServico + '</td>' +
            '</tr>' +
            '<tr>' +
            '</tbody>' +
            '</table>' +
            '<table class="table table-sm" style="font-size:' + tamanho + '">' +
            '<thead>' +
            '<tr>' +
            '<th colspan="2">Credor</th>' +
            '</tr>' +
            '<tr>' +
            '<td>Nome:</td>' +
            '<td>' + data[0].Beneficiario + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>CPF/CNPJ:</td>' +
            '<td>' + FormatCpfCnpj(data[0].CPF_CNPJ) + '</td>' +
            '</tr>' +
            '</thead>' +
            '</table>' +
            '<table class="table table-sm" style="font-size:' + tamanho + '">' +
            '<thead>' +
            '<tr>' +
            '<th>Valor Empenhado</th>' +
            '<th>' + 'R$ ' + currencyFormat(data[0].ValorEmpenho) + '</th>' +
            '</tr>' +
            '</thead>' +
            '</table>';

        body = body + '</div>' + '</div>';

        document.getElementById("modal-body").innerHTML = body;
    });
}