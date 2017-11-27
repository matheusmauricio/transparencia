@extends('layouts.app')

@section('htmlheader_title')
    Erro 500
@endsection

@section('main-content')

<div class="row">
    <div class=col-md-12>
        <p class="error text-center">Erro 500</p>   
    </div>
</div>

<div class="row">
    <div class=col-md-12>
        <p class="error-2 text-center">Ops! Ocorreu algum erro inesperado. <a href="javascript:window.history.go(-1)">Voltar para página anterior</a></p>   
    </div>
</div>
      
@endsection

@section('scriptsadd')
    <script>
        $( "h1" ).first().css( "display", "none" );        
    </script>
@stop