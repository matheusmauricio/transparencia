@extends('layouts.app')
@section('htmlheader_title', 'Programas, Projetos e Ações')

@section('cssheader')
@endsection

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
                        <li class="active">Programas, Projetos e Ações</li>                                                                                                                           
                    </ol>        
                </div>
            </div>            
        </div>
    </div>

      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-body text-justify">
                <h4 style="margin-bottom: 30px;">Conheça os programas, projetos e ações de cada secretaria, com suas respectivas metas e valores.</h4>                
                <a target="_blank" class="btn btn-primary" href="{{route('downloadGestaoFiscalAno', ['tipoArquivo' => 'ppacao' , 'ano' => '2017' ,'nomeArquivo' => 'ProgProjAcoes.pdf'])}}" role="button">Exibir Demonstrativo</a>
            </div>
            <div style="height: 30px">
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

@endsection

@section('scriptsadd')
@endsection