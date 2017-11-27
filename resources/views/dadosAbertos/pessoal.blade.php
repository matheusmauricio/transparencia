@extends('formFiltro')

@section('htmlheader_title')
    Download - Pessoal
@stop
@section('main-content')

<div class="row">
    <div class="col-md-12">
        <div class=" box-body box box-solid">
            <div class="box-group" id="accordion">
                <!--Servidor-->
                <div class="panel box box-primary">
                    <div class="box-header with-border">
                    <h4 class="box-title">                        
                        Servidor                        
                    </h4>
                    </div>
                    <div id="collapse1">
                    <div class="box-body">
                        {{ Form::open(array('url' => '/dadosabertos/pessoal/servidores', 'method' => 'POST')) }}
                        <div class="row form-group">    
                            <div class="col-md-4">
                                {{ Form::label('Nome', '', array('id'=>'lblNome')) }}
                                {{ Form::text('txtNome', '', array('id'=>'txtNome', 'class' => 'form-control')) }}                                
                            </div> 
                            <div class="col-md-4">
                            {{ Form::label('Situação', '', array('id'=>'lblSituacao')) }}
                            {{ Form::select('selectSituacao', array('EM EXERCICIO'=>'EM EXERCICIO','Todos'=>'Todos','EM FÉRIAS'=>'EM FÉRIAS','EXONERADO'=>'EXONERADO','LICENCIADO/AFASTADO'=>'LICENCIADO/AFASTADO'), 'default', array('id'=>'selectSituacao', 'class'=>'form-control ajuste-campo')) }}
                            </div>
                        </div>                                              
                        <div class="row form-group">
                                <div class="col-xs-2" style="width: 110px;">
                                    {{ Form::submit('Download', array('class'=>'btn btn-primary')) }}
                                    {{ Form::close() }}
                                </div>
                                <div class="col-xs-2">
                                    <span class="btn btn-primary" data-toggle="collapse" data-target="#servidores">Detalhes</span>
                                </div>
                        </div>
                        
                    </div>
                    <!--Tabela de Descricao-->
                        <div id="servidores" class="collapse">
                        <table id="tabela" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th style='vertical-align:middle'>Coluna</th>
                                                    <th style='vertical-align:middle'>Tipo</th>
                                                    <th style='vertical-align:middle'>Descrição</th>
                                                </tr>
                                            </thead>                            
                                            <tbody>
                                                <tr>
                                                    <td>Matricula</td>
                                                    <td>Texto</td>
                                                    <td>Número de matrícula identificando o Servidor na Administração Municipal</td>
                                                </tr>
                                                <tr>
                                                    <td>CPF</td>
                                                    <td>Texto</td>
                                                    <td>Número do CPF do servidor, podendo estar parte oculta</td>
                                                </tr>
                                                <tr>
                                                    <td>Nome</td>
                                                    <td>Texto</td>
                                                    <td>Nome completo do Servidor</td>
                                                </tr>
                                                <tr>
                                                    <td>Cargo</td>
                                                    <td>Texto</td>
                                                    <td>Indicação do nome do cargo efetivo que o servidor ocoupa</td>
                                                </tr>
                                                <tr>
                                                    <td>Funcao</td>
                                                    <td>Texto</td>
                                                    <td>Identificação do Cargo Comissionado ou Função Gratificada que o servidor exerce</td>
                                                </tr>
                                                <tr>
                                                    <td>Tipo Vinculo</td>
                                                    <td>Texto</td>
                                                    <td>Tipo de vínculo, se Efetivo, Comissionado, Temporário ou outro</td>
                                                </tr>
                                                <tr>
                                                    <td>Data Exercício</td>
                                                    <td>Texto</td>
                                                    <td>Data em que o servidor entrou em exercício</td>
                                                </tr>
                                                <tr>
                                                    <td>Data Demissão</td>
                                                    <td>Texto</td>
                                                    <td>Data em que o servidor foi exonerado do seu cargo ou função</td>
                                                </tr>
                                                <tr>
                                                    <td>Situação</td>
                                                    <td>Texto</td>
                                                    <td>Situação do Servidor na data em pesquisa, se Ativo, em Licença Remunerada, em Licença sem Vencimentos, etc</td>
                                                </tr>
                                                <tr>
                                                    <td>Órgão</td>
                                                    <td>Texto</td>
                                                    <td>Órgão onde o servidor exerce suas atividades</td>
                                                </tr>
                                                <tr>
                                                    <td>Carga Horária</td>
                                                    <td>Texto</td>
                                                    <td>Informação da carga horária Semanal ou Diária do servidor</td>
                                                </tr>
                                                <tr>
                                                    <td>Referência</td>
                                                    <td>Texto</td>
                                                    <td>campo responável pelo enquadramento salarial</td>
                                                </tr>
                                                <tr>
                                                    <td>Sigla</td>
                                                    <td>Texto</td>
                                                    <td>campo responável pelo enquadramento salarial</td>
                                                </tr>
                                                <tr>
                                                    <td>Referência Sigla</td>
                                                    <td>Texto</td>
                                                    <td>campo responável pelo enquadramento salarial</td>
                                                </tr>
                                                <tr>
                                                    <td>Contrato</td>
                                                    <td>Texto</td>
                                                    <td>Número do contrato do servidor</td>
                                                </tr>                                                
                                            </tbody>
                                        </table>
                        </div> 
                    <!--Fim Tabela de Descricao-->
                    </div>
                </div>
                <!---Fim Servidor-->

                <!--Folha de Pagamento-->
                <div class="panel box box-primary">
                    <div class="box-header with-border">
                    <h4 class="box-title">                        
                        Folha de Pagamento                        
                    </h4>
                    </div>
                    <div id="collapse2">
                    <div class="box-body">
                        {{ Form::open(array('url' => '/dadosabertos/pessoal/folhapagamento', 'method' => 'POST')) }}
                        <div class="row form-group">   
                            <div class="col-sm-4 col-md-4 col-lg-2">
                                {{ Form::label('Mês', '', array('id'=>'lblTipoConsulta')) }}
                                {{ Form::select('txtMes', array('01'=>'Janeiro','02'=>'Fevereiro','03'=>'Março','04'=>'Abril','05'=>'Maio',
                                '06'=>'Junho','07'=>'Julho','08'=>'Agosto','09'=>'Setembro','10'=>'Outubro','11'=>'Novembro','12'=>'Dezembro'), 'default', array('id'=>'selectTipoConsulta2', 'class'=>'form-control ajuste-campo')) }}
                            </div>   
                            <div class="col-sm-4 col-md-4 col-lg-2">
                                {{ Form::label('ano', 'Ano') }}
                                {{ Form::select('selectAno', array(), 'default', array('id'=>'selectAno', 'class'=>'form-control ajuste-campo')) }}
                            </div> 
                        </div>                                              
                        <div class="row form-group">
                                <div class="col-xs-2" style="width: 110px;">
                                    {{ Form::submit('Download', array('class'=>'btn btn-primary')) }}
                                    {{ Form::close() }}
                                </div>
                                <div class="col-xs-2">
                                    <span class="btn btn-primary" data-toggle="collapse" data-target="#folha">Detalhes</span>
                                </div>
                        </div>
                        
                    </div>
                    <!--Tabela de Descricao-->
                        <div id="folha" class="collapse">
                        <table id="tabela" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th style='vertical-align:middle'>Coluna</th>
                                                    <th style='vertical-align:middle'>Tipo</th>
                                                    <th style='vertical-align:middle'>Descrição</th>
                                                </tr>
                                            </thead>
                                            <tbody>                           
                                                <tr>
                                                    <td>Matrícula</td>
                                                    <td>Texto</td>
                                                    <td>Número de matrícula identificando o Servidor na Administração Municipal</td>
                                                </tr>   
                                                <tr>
                                                    <td>Nome</td>
                                                    <td>Texto</td>
                                                    <td>Nome completo do servidor</td>
                                                </tr>
                                                <tr>
                                                    <td>CPF</td>
                                                    <td>Texto</td>
                                                    <td>Número do CPF do servidor, podendo estar parte oculta</td>
                                                </tr>
                                                <tr>
                                                    <td>Mês</td>
                                                    <td>Texto</td>
                                                    <td>Mês ao qual se refere aquele pagamento</td>
                                                </tr>         
                                                <tr>
                                                    <td>Ano</td>
                                                    <td>Texto</td>
                                                    <td>Ano ao qual se refere a rubrica lançada no pagamento</td>
                                                </tr>   
                                                <tr>
                                                    <td>Evento</td>
                                                    <td>Texto</td>
                                                    <td>Código numérico que identifica unicamente a rubrica do pagamento</td>
                                                </tr>    
                                                <tr>
                                                    <td>Descricao Evento</td>
                                                    <td>Texto</td>
                                                    <td>Descrição da rubrica (ex.: Vencimento, Adicional por Tempo de Serviço, Décimo Terceiro Salário, etc)</td>
                                                </tr> 
                                                <tr>
                                                    <td>Tipo Envento</td>
                                                    <td>Texto</td>
                                                    <td>Identificador se a rubrica é uma rubrica de crédito ou de débito</td>
                                                </tr>
                                                <tr>
                                                    <td>Quantidade</td>
                                                    <td>Texto</td>
                                                    <td>Refere-se ao campo “Quantidade” listado no contracheque. Exemplo: 11%, 27,5%, 29D, etc</td>
                                                </tr>
                                                <tr>
                                                    <td>Valor</td>
                                                    <td>Texto</td>
                                                    <td>Valor de crédito ou débito da rubrica</td>
                                                </tr>
                                                <tr>
                                                    <td>Contrato</td>
                                                    <td>Texto</td>
                                                    <td>Número do contrato do servidor</td>
                                                </tr>
                                            </tbody>
                                        </table>
                        </div> 
                    <!--Fim Tabela de Descricao-->
                    </div>
                </div>
                <!--Fim Folha de Pagamento-->
        </div>
    </div>    
</div>

@endsection

@section('scriptsadd')
<link rel="stylesheet" media="all" href="{{ asset('/css/jquery.dynatable.css') }}" />
    <script src="{{ asset('/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('/js/options.min.js') }}"></script> 
    <script src="https://rawgit.com/digitalBush/jquery.maskedinput/master/dist/jquery.maskedinput.min.js"></script>
    <script>
        // LoadPage
        $(function () {
            $(document).ready(function() {
                var sAno = document.getElementById("selectAno");
                var optionArrayAno = [];
                $.each(arrayGenerico('anos'), function (key, value) {
                    optionArrayAno.push(value+'|'+value);
                });
        
                $.each(montarObjDropdown(optionArrayAno), function (key, value) {
                    sAno.options.add(value);
                });
            });
        });
    </script>
@endsection