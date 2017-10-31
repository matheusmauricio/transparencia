@extends('layouts.app')
@section('htmlheader_title', 'Legislação Orçamentária')

@section('cssheader')
@endsection

@section('main-content')

      <div class="row">
        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">LDO</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body text-justify">  
            <ul class="links-gestao">
            <li>
              <a class="acessibilidade" target="_blank" href="{{route('download', ['nomeArquivo' => 'projldo2018'])}}">Projeto LDO 2018</a>
            </li>         
            <li> 
              <a class="acessibilidade" target="_blank" href="{{route('download', ['nomeArquivo' => 'ldo2018'])}}">Metodologia LDO 2018</a>
            </li>
            <li>
              <a class="acessibilidade" target="_blank" href="{{route('download', ['nomeArquivo' => 'ldo2017'])}}">LDO 2017</a>
            </li>
            <li>
              <a class="acessibilidade" target="_blank" href="{{route('download', ['nomeArquivo' => 'metodologia2017'])}}">Metodologia LDO 2017</a>
            </li>
            <li>
              <a class="acessibilidade" target="_blank" href="{{route('download', ['nomeArquivo' => 'ldo2016'])}}">LDO 2016</a>
            </li>
            <li>
              <a class="acessibilidade" target="_blank" href="{{route('download', ['nomeArquivo' => 'metodologia2016'])}}">Metodologia LDO 2016</a>
            </li>
            <li>
              <a class="acessibilidade" target="_blank" href="{{route('download', ['nomeArquivo' => 'lei2015'])}}">Lei 7228 Altera LDO 2015</a>
            </li>
            <li>
              <a class="acessibilidade" target="_blank" href="{{route('download', ['nomeArquivo' => 'ldo2015'])}}">LDO 2015</a>
            </li>
            <li>
              <a class="acessibilidade" target="_blank" href="{{route('download', ['nomeArquivo' => 'metodologia2015'])}}">Metodologia LDO 2015</a>
            </li>
            <li>
              <a class="acessibilidade" target="_blank" href="{{route('download', ['nomeArquivo' => 'ldo2014'])}}">LDO 2014</a>
            </li>
            <li>
              <a class="acessibilidade" target="_blank" href="{{route('download', ['nomeArquivo' => 'ldo2013'])}}">LDO 2013</a>
            </li>
            <li>
              <a class="acessibilidade" target="_blank" href="{{route('download', ['nomeArquivo' => 'metodologia2013'])}}">Metodologia LDO 2013</a>
            </li>  
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