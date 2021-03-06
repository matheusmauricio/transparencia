@extends('formFiltro')
@section('htmlheader_title')
    Download - Convênios e Transferências
@stop
@section('main-content')

<div class='row'>
    <div class='col-md-12'>
        <div id="navegacao" class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Navegação</h3>                   
            </div>
            <div class="box-body">                                                        
                <ol class="breadcrumb">
                    <li><a href="/">Início</a></li>                                                
                    <li class="active">Download - Convênios e Transferências</li>                                                                                                                           
                </ol>        
            </div>
        </div>            
    </div>
</div>

<div class="row">
<div class="col-md-12">
   <div class=" box-body box box-solid">
      <div class="box-group" id="accordion">
         <!--Recebidos-->
         <div class="panel box box-primary">
            <div class="box-header with-border">
               <h4 class="box-title">
                  Convênios Recebidos
               </h4>
            </div>
            <div id="collapse1">
                <div class="box-body">
                    {{ Form::open(array('url' => '/dadosabertos/convenios/recebidos', 'method' => 'POST')) }}                                        
                    <div class="row form-group">
                        <div class="col-xs-2" style="width: 110px;">
                            {{ Form::submit('Download', array('class'=>'btn btn-primary')) }}                        
                        </div>
                        <div class="col-xs-2">
                            <span class="btn btn-primary" data-toggle="collapse" data-target="#recebido">Detalhes</span>
                        </div>
                    </div>
                    {{ Form::close() }}

                    <!-- Erro -->
                    @if(session()->has('mensagemRecebidos'))
                        <div class="col-md-8 alert alert-danger" style="font-size:20px">
                            {{ session()->get('mensagemRecebidos') }}
                        </div>
                    @endif
                    <!--Fim erro-->

               </div>
               <!--Tabela de Descricao-->
               <div id="recebido" class="collapse">
                  <table id="tabela" class="table table-bordered table-striped" summary="Tabela com a descrição do retorno da api">
                     <thead>
                        <tr>
                           <th scope="col" style='vertical-align:middle'>Coluna</th>
                           <th scope="col" style='vertical-align:middle'>Tipo</th>
                           <th scope="col" style='vertical-align:middle'>Descrição</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td scope="col">Data Celebração</td>
                           <td scope="col">texto</td>
                           <td scope="col">Identificação do Órgão Público ou outra entidade responsáel pela concessão do recurso</td>
                        </tr>
                        <tr>
                           <td scope="col">Prazo Vigência</td>
                           <td scope="col">texto</td>
                           <td scope="col">Prazo de duração do Convênio ou outro instrumento</td>
                        </tr>
                        <tr>
                           <td scope="col">Objeto</td>
                           <td scope="col">texto</td>
                           <td scope="col">Descrição detalhada do Objeto da Transferência Voluntária</td>
                        </tr>
                        <tr>
                           <td scope="col">Valor a Receber</td>
                           <td scope="col">texto</td>
                           <td scope="col">Valor a ser cedido durante a vigência do termo</td>
                        </tr>
                        <tr>
                           <td scope="col">Valor de Contrapartida</td>
                           <td scope="col">texto</td>
                           <td scope="col">Valor de contrapartida ofertada pelo município para realização do objeto</td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               <!--Fim Tabela de Descricao-->
            </div>
         </div>
         <!--Fim Recebidos-->
         <!--Cedidos-->
         <div class="panel box box-primary">
            <div class="box-header with-border">
               <h4 class="box-title">                  
                  Convênios Cedidos                  
               </h4>
            </div>
            <div id="collapse2">
                <div class="box-body">
                    {{ Form::open(array('url' => '/dadosabertos/convenios/cedidos', 'method' => 'POST')) }}                                              
                    <div class="row form-group">
                        <div class="col-xs-2" style="width: 110px;">
                            {{ Form::submit('Download', array('class'=>'btn btn-primary')) }}                        
                        </div>
                        <div class="col-xs-2">
                            <span class="btn btn-primary" data-toggle="collapse" data-target="#concedido">Detalhes</span>
                        </div>
                    </div>
                    {{ Form::close() }}

                    <!-- Erro -->
                    @if(session()->has('mensagemCedidos'))
                        <div class="col-md-8 alert alert-danger" style="font-size:20px">
                            {{ session()->get('mensagemCedidos') }}
                        </div>
                    @endif
                    <!--Fim erro-->

               </div>
               <!--Tabela de Descricao-->
               <div id="concedido" class="collapse">
                  <table id="tabela" class="table table-bordered table-striped" summary="Tabela com a descrição do retorno da api">
                     <thead>
                        <tr>
                           <th scope="col" style='vertical-align:middle'>Coluna</th>
                           <th scope="col" style='vertical-align:middle'>Tipo</th>
                           <th scope="col" style='vertical-align:middle'>Descrição</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td scope="col">Órgão Concedente</td>
                           <td scope="col">texto</td>
                           <td scope="col">Identificação do Órgão responsável pela concessão do recurso</td>
                        </tr>
                        <tr>
                           <td scope="col">CNPJ do Beneficiário</td>
                           <td scope="col">texto</td>
                           <td scope="col">CNPJ da Empresa ou Órgão Público beneficiário da Transferência Voluntária</td>
                        </tr>
                        <tr>
                           <td scope="col">Nome do Beneficiário</td>
                           <td scope="col">texto</td>
                           <td scope="col">Nome ou razão social da Empresa ou Órgão Público beneficiário da Transferência Voluntária</td>
                        </tr>
                        <tr>
                           <td scope="col">Número do Convênio</td>
                           <td scope="col">texto</td>
                           <td scope="col">Número designado para o Convênio Cedido especificado</td>
                        </tr>
                        <tr>
                           <td scope="col">Ano do Convênio</td>
                           <td scope="col">texto</td>
                           <td scope="col">Ano do Convênio Cedido especificado</td>
                        </tr>
                        <tr>
                           <td scope="col">Vigência Inicial</td>
                           <td scope="col">texto</td>
                           <td scope="col">Data da Vigência Inicial do Convênio Cedido</td>
                        </tr>
                        <tr>
                           <td scope="col">Vigência Final</td>
                           <td scope="col">texto</td>
                           <td scope="col">Data da Vigência Final do Convênio Cedido</td>
                        </tr>
                        <tr>
                           <td scope="col">Objeto</td>
                           <td scope="col">texto</td>
                           <td scope="col">Descrição detalhada do Objeto da Transferência Voluntária</td>
                        </tr>
                        <tr>
                           <td scope="col">Valor do Convênio</td>
                           <td scope="col">texto</td>
                           <td scope="col">Valor a ser cedido durante a vigência do termo</td>
                        </tr>
                        <tr>
                           <td scope="col">Valor de Contrapartida</td>
                           <td scope="col">texto</td>
                           <td scope="col">Valor de contrapartida ofertada pelo município para realização do objeto</td>
                        </tr>
                        <tr>
                           <td scope="col">Data da Assinatura</td>
                           <td scope="col">texto</td>
                           <td scope="col">Data da assinatura do convênio cedido</td>
                        </tr>
                        <tr>
                           <td scope="col">Número do Processo</td>
                           <td scope="col">texto</td>
                           <td scope="col">Número do processo designado ao convênio cedido</td>
                        </tr>
                        <tr>
                           <td scope="col">Ano do Processo</td>
                           <td scope="col">texto</td>
                           <td scope="col">Ano do processo designado ao convênio cedido</td>
                        </tr>
                        <tr>
                           <td scope="col">Status</td>
                           <td scope="col">texto</td>
                           <td scope="col">Status do convênio cedido</td>
                        </tr>
                        <tr>
                           <td scope="col">Categoria do Convênio</td>
                           <td scope="col">texto</td>
                           <td scope="col">Categoria do convênio cedido</td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               <!--Fim Tabela de Descricao-->
            </div>
         </div>
         <!--Fim Cedidos-->  
      </div>
   </div>
</div>
@endsection
@section('scriptsadd')
<script src="{{ asset('/plugins/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('/js/options.min.js') }}"></script> 
<link rel="stylesheet" media="all" href="{{ asset('/css/jquery.dynatable.css') }}" />
<script src="https://rawgit.com/digitalBush/jquery.maskedinput/master/dist/jquery.maskedinput.min.js"></script>
@endsection
