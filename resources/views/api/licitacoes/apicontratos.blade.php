@extends('layouts.app')
@section('htmlheader_title', 'API Contratos')

@section('cssheader')
@endsection

@section('main-content')
    <?php //Configurar variável para Navegação
        $Navegacao = array(
                        array('url' => '/api' ,'Descricao' => 'WebService'),
                        array('url' => '#' ,'Descricao' => 'API Contratos'));
    ?>

    <div class='row'>
        <div class='col-md-12'>
            @include('layouts.navegacao')
        </div>
    </div>

      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body text-justify">
                <h3>Url da API</h3>
                <pre>transparencia.cachoeiro.es.gov.br/api/licitacoescontratos/contratos/{status}</pre>
                

                <h3>Exemplo</h3>
                <p><a href="/api/licitacoescontratos/contratos/vigente">transparencia.cachoeiro.es.gov.br/api/licitacoescontratos/contratos/vigente</a></p>
                <h4>Retorno<h4>
                <div class="">
                    <pre>[{"DataInicial":"2018-04-02","DataFinal":"2019-04-02","NomeContratado":"JPR CONSTRUTORA LTDA","CPF_CNPJContratado":"10.677.828\/0001-32","OrgaoContratante":"PREFEITURA MUNICIPAL DE CACHOEIRO DE ITAPEMIRIM","Objeto":"CONTRATAÇÃO DE EMPRESA ESPECIALIZADA PARA REALIZAÇÃO DE OBRA DE CONSTRUÇÃO DA EMEB “OLGA DIAS DA COSTA MENDES”, NA RUA DR. AMILCAR FIGLIUZZI, Nº. 54 – BAIRRO CORONEL BORGES – CACHOEIRO DE ITAPEMIRIM\/ES, CONFORME ESPECIFICAÇÕES E CONDIÇÕES DAS PLANILHAS E","NumeroProcesso":"041812","ValorContratado":3914028.17}]</pre>
                </div>

                <h3>Detalhes das colunas</h3>
                <table id="tabela" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col" style='vertical-align:middle'>Coluna</th>
                                    <th scope="col" style='vertical-align:middle'>Tipo</th>
                                    <th scope="col" style='vertical-align:middle'>Descrição</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="col">DataInicial</td>
                                    <td scope="col">date</td>
                                    <td scope="col">Data de Assinatura, Publicação ou Início de Vigência do Contrato</td>
                                </tr>
                                <tr>
                                    <td scope="col">DataFinal</td>
                                    <td scope="col">date</td>
                                    <td scope="col">Data do fim do contrato</td>
                                </tr>       
                                <tr>
                                    <td scope="col">NomeContratado</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Nome do Contratado</td>
                                </tr>  
                                <tr>
                                    <td scope="col">CPF_CNPJContratado</td>
                                    <td scope="col">string</td>
                                    <td scope="col">CPF ou CNPJ do fornecedor contratado</td>
                                </tr>             
                                <tr>
                                    <td scope="col">OrgaoContratante</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Órgão cujo titular assina o contrato</td>
                                </tr>
                                <tr>
                                    <td scope="col">Objeto</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Descrição do objeto do contrato</td>
                                </tr>
                                <tr>
                                    <td scope="col">NumeroProcesso</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Número do processo ou do edital de licitação que originou o contrato, ou informação de sua dispensa, caso ocorra</td>
                                </tr>
                                <tr>
                                    <td scope="col">ValorContratado</td>
                                    <td scope="col">double</td>
                                    <td scope="col">Valor global do contrato</td>
                                </tr>
                            </tbody>
                        </table>
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
    <link rel="stylesheet" media="all" href="{{ asset('/css/jquery.dynatable.css') }}" />
    <!--grafico-->    
    <script src="{{ asset('/js/jquery.dynatable.js') }}"></script>
@endsection