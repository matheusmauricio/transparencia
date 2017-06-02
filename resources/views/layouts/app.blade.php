<html>
    <head>
        <title>Transparência - @yield('htmlheader_title', '') </title>
		@section('htmlheader')
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<title>Transparencia - @yield('htmlheader_title')</title>
			<!-- Tell the browser to be responsive to screen width -->
			<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
			<!-- Bootstrap 3.3.6 -->
			<link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}" />
			<!-- Font Awesome -->
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
			<!-- Ionicons -->
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
			
			@section('cssheader')
			@show

            <!-- Theme style -->
            <link rel="stylesheet" href="{{ asset('/dist/css/AdminLTE.min.css') }}">
            <!-- AdminLTE Skins. Choose a skin from the css/skins
                folder instead of downloading all of them to reduce the load. -->
            <link rel="stylesheet" href="{{ asset('/dist/css/skins/_all-skins.min.css') }}">
        @show
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="{{ ('/') }}" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><b>T</b></span>
				<!-- logo for regular state and mobile devices -->
				<!--<span class="logo-lg"><b>Transparência</b></span>-->
				<span class="logo-lg">
					<img src="/img/logo.png" class="img-responsive img-center"  alt="Cachoeiro De Itapemirim">
				</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
			<h1 id="NomeHeader" class="text-center">Prefeitura Municipal de Cachoeiro <br/>Portal da Transparência</h1>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar" style="height: auto;">
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Pesquisar...">
                    <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- Sidebar Menu -->
				<ul class="sidebar-menu">					
					<!--Home-->
					<li id="Home" class="active">
						<a href="{{ ('/') }}">
							<i class="fa fa-home"></i>
							<span>Home</span>
						</a>
					</li>
					<!--O Portal-->
					<li id="Portal" class="treeview">
						<a href="#">
							<i class="fa fa-info-circle"></i>
							<span>O Portal</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu itens">
							<li id="Oquee">
								<a href="{{ ('/portal') }}">O que é o Portal</a>
							</li>
							<li id="Glossario">
								<a href="{{ ('/glossario') }}">Glossário</a>
							</li>
							<!--<li>
								<a href="{{ ('/manual') }}">Manual de Navegação</a>
							</li>-->
							<li id="Legislacao">
								<a href="{{ ('/legislacao') }}">Legislação</a>
							</li>
							<li id="Faq">
								<a href="{{ ('/faq') }}">Perguntas Frequentes</a>
							</li>
							<li id="Mapasite">
								<a href="{{ ('/mapasite') }}">Estrutura Organizacional</a>
							</li>
						</ul>
					</li>
					<!--Despesas-->
					<li id="Despesas" class="treeview">
						<a href="#">
							<i class="fa fa-area-chart"></i>
							<span>Despesas</span>
							<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
						</a>
						<ul class="treeview-menu itens">
						   <!--Empenhos-->
							<li id= "Empenhos" class="treeview">
								<a href="#">
									<span>Empenhos</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
								</a>
								<ul class="treeview-menu itens">
									<li id="EmpenhosOrgaos">
										<a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'empenhos','tipoConsulta' => 'orgaos'])}}">Por Órgãos</a>
									</li>
									<li id="EmpenhosFornecedores">
										<a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'empenhos','tipoConsulta' => 'fornecedores'])}}">Por Fornecedores</a>
									</li>
									<li id="EmpenhosFuncoes">
										<a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'empenhos','tipoConsulta' => 'funcoes'])}}">Por Funções</a>
									</li>
									<li id="EmpenhosElementos">
										<a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'empenhos','tipoConsulta' => 'elementos'])}}">Por Elementos</a>
									</li>
									<li id="EmpenhosNota">
										<a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'empenhos','tipoConsulta' => 'nota'])}}">Por Nota</a>
									</li>
								</ul>
							</li>
							<!--Liquidações-->
							<li id="Liquidacoes" class="treeview">
								<a href="#">
									<span>Liquidações</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
								</a>
								<ul class="treeview-menu itens">
									<li id="LiquidacoesOrgaos">
										<a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'liquidacoes','tipoConsulta' => 'orgaos'])}}">Por Órgãos</a>
									</li>
									<li id="LiquidacoesFornecedores">
										<a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'liquidacoes','tipoConsulta' => 'fornecedores'])}}">Por Fornecedores</a>
									</li>
									<li id="LiquidacoesFuncoes">
										<a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'liquidacoes','tipoConsulta' => 'funcoes'])}}">Por Funções</a>
									</li>
									<li id="LiquidacoesElementos">
										<a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'liquidacoes','tipoConsulta' => 'elementos'])}}">Por Elementos</a>
									</li>
									<li id="LiquidacoesNota">
										<a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'liquidacoes','tipoConsulta' => 'nota'])}}">Por Nota</a>
									</li>
								</ul>
							</li>
							<!--Pagamentos-->
                                <li id="Pagamentos" class="treeview">
								<a href="#">
									<span>Pagamentos</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
								</a>
								<ul class="treeview-menu itens">
									<li id="PagamentosOrgaos">
										<a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'pagamentos','tipoConsulta' => 'orgaos'])}}">Por Órgãos</a>
									</li>
									<li id="PagamentosFornecedores">
										<a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'pagamentos','tipoConsulta' => 'fornecedores'])}}">Por Fornecedores</a>
									</li>
									<li id="PagamentosFuncoes">
										<a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'pagamentos','tipoConsulta' => 'funcoes'])}}">Por Funções</a>
									</li>
									<li id="PagamentosElementos">
										<a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'pagamentos','tipoConsulta' => 'elementos'])}}">Por Elementos</a>
									</li>
									<li id="PagamentosNota">
										<a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'pagamentos','tipoConsulta' => 'nota'])}}">Por Nota</a>
									</li>
								</ul>
							</li>
							<!--Restos a Pagar-->
							<li id="Restos_a_pagar" class="treeview">
								<a href="#">
									<span>Restos a Pagar</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
								</a>
								<ul class="treeview-menu itens">
									<li id="RestoOrgaos">
										<a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'restosapagar','tipoConsulta' => 'orgaos'])}}">Por Órgãos</a>
									</li>
									<li id="RestoFornecedores">
										<a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'restosapagar','tipoConsulta' => 'fornecedores'])}}">Por Fornecedores</a>
									</li>
									<li id="RestoFuncoes">
										<a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'restosapagar','tipoConsulta' => 'funcoes'])}}">Por Funções</a>
									</li>
									<li id="RestoElementos">
										<a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'restosapagar','tipoConsulta' => 'elementos'])}}">Por Elementos</a>
									</li>
									<li id="RestoNota">
										<a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'restosapagar','tipoConsulta' => 'nota'])}}">Por Nota</a>
									</li>
								</ul>
							</li>
						</ul>
							
					<!--Receitas-->
					<li class="treeview">
						<a href="#">
							<i class="fa fa-line-chart"></i>
							<span>Receitas</span>
							<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
						</a>
						<!--Lançamentos-->
						<ul class="treeview-menu itens">
							<li class="treeview">
								<a href="#">
									<span>Lançamentos</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
								</a>
								<ul class="treeview-menu itens">
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'receitas','subConsulta' => 'lancamentos','tipoConsulta' => 'orgaos'])}}">Por Órgãos</a>
									</li>
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'receitas','subConsulta' => 'lancamentos','tipoConsulta' => 'categorias'])}}">Por Categorias</a>
									</li>
								</ul>
							</li>
						<!--Recebimentos-->
							<li class="treeview">
								<a href="#">
									<span>Recebimentos</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
								</a>
								<ul class="treeview-menu itens">
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'receitas','subConsulta' => 'recebimentos','tipoConsulta' => 'orgaos'])}}">Por Órgãos</a>
									</li>
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'receitas','subConsulta' => 'recebimentos','tipoConsulta' => 'categorias'])}}">Por Categorias</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<!--Licitações e Contratos-->
					<li class="treeview">
						<a href="#">
							<i class="fa fa-shopping-cart"></i>
							<span>Licitações e Contratos</span>
							<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
						</a>
						<ul class="treeview-menu itens">
							<li>
								<a href="{{route('filtroIndex', ['consulta' => 'licitacoes_contratos','subConsulta' => 'default','tipoConsulta' => 'andamentos'])}}">Licitações em Andamento</a>
							</li>
							<li>
								<a href="{{route('filtroIndex', ['consulta' => 'licitacoes_contratos','subConsulta' => 'default','tipoConsulta' => 'concluidos'])}}">Licitações Concluídas</a>
							</li>
							<li>
								<a href="{{route('filtroIndex', ['consulta' => 'licitacoes_contratos','subConsulta' => 'default','tipoConsulta' => 'contratos'])}}">Contratos</a>
							</li>
							<li>
								<a href="{{route('filtroIndex', ['consulta' => 'licitacoes_contratos','subConsulta' => 'default','tipoConsulta' => 'bens_produtos_adquiridos'])}}">Bens e Produtos Adquiridos</a>
							</li>
						</ul>
					</li>
					<!--Gestão Fiscal-->
					<li class="treeview">
						<a href="#">
							<i class="fa fa-exclamation-triangle"></i>
							<span>Gestão Fiscal</span>
							<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
						</a>
						<!--Registro Orçamentário-->
						<ul class="treeview-menu itens">
							<li class="treeview">
								<a href="#">
									<span>Registro Orçamentário</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
								</a>
								<ul class="treeview-menu itens">
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'gestao_fiscal','subConsulta' => 'registro_orcamentario','tipoConsulta' => 'ppa'])}}">PPA</a>
									</li>
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'gestao_fiscal','subConsulta' => 'registro_orcamentario','tipoConsulta' => 'ldo'])}}">LDO</a>
									</li>
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'gestao_fiscal','subConsulta' => 'registro_orcamentario','tipoConsulta' => 'loa'])}}">LOA</a>
									</li>
								</ul>
							</li>
						<!--Relatório LRF-->
							<li class="treeview">
								<a href="#">
									<span>Relatório LRF</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
								</a>
								<ul class="treeview-menu itens">
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'gestao_fiscal','subConsulta' => 'relatorio_lrf','tipoConsulta' => 'rgf'])}}">RGF</a>
									</li>
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'gestao_fiscal','subConsulta' => 'relatorio_lrf','tipoConsulta' => 'rreo'])}}">RREO</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="{{route('filtroIndex', ['consulta' => 'gestao_fiscal','subConsulta' => 'default','tipoConsulta' => 'prestacoes_contas'])}}">Prestações de Contas</a>
							</li>
							<li>
								<a href="{{route('filtroIndex', ['consulta' => 'gestao_fiscal','subConsulta' => 'default','tipoConsulta' => 'auditorias_inspecoes'])}}">Auditorias e Inspeções</a>
							</li>
						</ul>
					</li>
					<!--Patrimônio-->
					<li class="treeview">
						<a href="#">
							<i class="fa fa-institution"></i>
							<span>Patrimônio</span>
							<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
						</a>
						<ul class="treeview-menu itens">
							<li>
								<a href="{{route('filtroIndex', ['consulta' => 'patrimonio','subConsulta' => 'default','tipoConsulta' => 'bens_moveis'])}}">Bens Móveis</a>
							</li>
							<li>
								<a href="{{route('filtroIndex', ['consulta' => 'patrimonio','subConsulta' => 'default','tipoConsulta' => 'bens_imoveis'])}}">Bens Imóveis</a>
							</li>
							<li>
								<a href="{{route('filtroIndex', ['consulta' => 'patrimonio','subConsulta' => 'default','tipoConsulta' => 'frota'])}}">Frota</a>
							</li>
						</ul>
					</li>
					<!--Pessoal-->
					<li class="treeview">
						<a href="#">
							<i class="fa fa-users"></i>
							<span>Pessoal</span>
							<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
						</a>
						<!--Servidores-->
						<ul class="treeview-menu itens">
							<li class="treeview">
								<a href="#">
									<span>Servidores</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
								</a>
								<ul class="treeview-menu itens">
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'pessoal','subConsulta' => 'servidores','tipoConsulta' => 'orgaos'])}}">Por Órgãos</a>
									</li>
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'pessoal','subConsulta' => 'servidores','tipoConsulta' => 'funcoes'])}}">Por Funções</a>
									</li>
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'pessoal','subConsulta' => 'servidores','tipoConsulta' => 'cargos'])}}">Por Cargos</a>
									</li>
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'pessoal','subConsulta' => 'servidores','tipoConsulta' => 'matricula'])}}">Por Matrícula</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="{{route('filtroIndex', ['consulta' => 'pessoal','subConsulta' => 'default','tipoConsulta' => 'estrutura_pessoal'])}}">Estrutura de Pessoal</a>
							</li>
							<li>
								<a href="{{route('filtroIndex', ['consulta' => 'pessoal','subConsulta' => 'default','tipoConsulta' => 'folha_pagamento'])}}">Folha de Pagamento</a>
							</li>
							<li>
								<a href="{{route('filtroIndex', ['consulta' => 'pessoal','subConsulta' => 'default','tipoConsulta' => 'concurso_publico'])}}">Concurso Público</a>
							</li>
						</ul>
					</li>
					<!--Convênios e Transferências-->
					<li class="treeview">
						<a href="#">
							<i class="fa fa-chain"></i>
							<span>Convênios e Transferências</span>
							<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
						</a>
						<ul class="treeview-menu itens">
							<li>
								<a href="{{route('filtroIndex', ['consulta' => 'convenios_transferencias','subConsulta' => 'default','tipoConsulta' => 'recursos_recebidos_uniao'])}}">Recursos Recebidos da União</a>
							</li>
							<li>
								<a href="{{route('filtroIndex', ['consulta' => 'convenios_transferencias','subConsulta' => 'default','tipoConsulta' => 'recursos_recebidos_estado'])}}">Recursos Recebidos do Estado</a>
							</li>
							<li>
								<a href="{{route('filtroIndex', ['consulta' => 'convenios_transferencias','subConsulta' => 'default','tipoConsulta' => 'recursos_concedidos_pelo_municipio'])}}">Recursos Concedidos Pelo Município</a>
							</li>
						</ul>
					</li>
					<!--Mais Informações-->
					<li class="treeview">
						<a href="#">
							<i class="fa fa-info"></i>
							<span>Mais Informações</span>
							<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
						</a>
						<ul class="treeview-menu itens">
							<li>
								<a href="{{route('filtroIndex', ['consulta' => 'mais_informacoes','subConsulta' => 'default','tipoConsulta' => 'obras'])}}">Obras</a>
							</li>
							<li>
								<a href="{{route('filtroIndex', ['consulta' => 'mais_informacoes','subConsulta' => 'default','tipoConsulta' => 'outros'])}}">Outros</a>
							</li>
						</ul>
					</li>
					<!--Áreas Temáticas--
					<li class="treeview">
						<a href="#">
							<i class="fa fa-university"></i>
							<span>Áreas Temáticas</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li>
								<a href="#">Educação</a>
							</li>
							<li>
								<a href="#">Obras</a>
							</li>
							<li>
								<a href="#">Saúde</a>
							</li>
							<li>
								<a href="#">Segurança</a>
							</li>
						</ul>
					</li>
					<!--Mapa--
					<li>
						<a href="#">
							<i class="fa fa-map"></i>
							<span>Mapas</span>
						</a>
					</li>
					<!--Dados Abertos-->
					<li>
						<a href="#">
							<i class="fa fa-folder-open"></i>
							<span>Dados Abertos</span>
						</a>
					</li>
					@section('nav')
					@show
				</ul>
				<!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" >
            <!-- Content Header (Page header) -->
			@section('header')
            <section class="content-header">
            <h1>
				@yield('htmlheader_title', '')
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ ('/') }}"><!--<i class="fa fa-dashboard"></i>--> Home</a></li>
                <!--<li class="active">Dashboard</li>-->
				@yield('breadcrumb')
            </ol>
            </section>
			@Show

            <!-- Main content -->
            <section class="content" style="min-height:771px;">
                @yield('main-content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer row">
			<div class="col-md-6">
				<strong>
					<i class="fa fa-creative-commons"></i> 2016
					<a href="#">Controladoria</a>.
				</strong>
				Rua Brahim Antônio Seder, 96/102, Centro - CEP: 29300060
				<br />
				Cachoeiro de Itapemirim / ES.
				<br />
				Tel: (0xx28) 3155-5237 / Ouvidoria: 156 / E-mail: controladoria@cachoeiro.es.gov.br
			</div>
			
			<div class="col-md-6" >
				<div class="col-xs-6 icones-footer col-sm-3 col-md-6 col-lg-3 ">
					<a href="http://www.cachoeiro.es.gov.br" target="_blank">
						<img src="{{ ('/img/cachoeiro.png') }}" class="img-responsive" alt="Cachoeiro De Itapemirim" ></a>
				</div>
				<div class="col-xs-6 icones-footer col-sm-3 col-md-6 col-lg-3 ">
					<a href="http://www.ipaci.es.gov.br" target="_blank">
						<img src="{{ ('/img/ipaci.png') }}" class="img-responsive" alt="IPACI" ></a>
				</div>
				<div class="col-xs-6 icones-footer col-sm-3 col-md-6 col-lg-3 ">
					<a href="http://www.dataci.es.gov.br" target="_blank">
						<img src="{{ ('/img/dataci.png') }}" class="img-responsive" alt="DATACI"></a>
				</div>
				<div class="col-xs-6 icones-footer col-sm-3 col-md-6 col-lg-3 ">
					<a href="http://agersa.es.gov.br" target="_blank">
						<img src="{{ ('/img/agersa.png') }}" class="img-responsive" alt="AGERSA" ></a>
				</div>
			</div>
        </footer>
        <!-- ./wrapper -->

		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"><span id="titulo"></span></h4>
				</div>
				<div class="modal-body" id="modal-body">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>					
				</div>
				</div>
			</div>
		</div>

        @section('scripts')
            <!-- jQuery 2.2.3 -->
            <script src="{{ asset('/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
            <!-- jQuery UI 1.11.4 -->
            <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
            <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
            <script>
            $.widget.bridge('uibutton', $.ui.button);
            </script>
            <!-- Bootstrap 3.3.6 -->
            <script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
            <!-- Slimscroll -->
            <script src="{{ asset('/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
            <!-- FastClick -->
            <script src="{{ asset('/plugins/fastclick/fastclick.js') }}"></script>
            <!-- AdminLTE App -->
            <script src="{{ asset('/dist/js/app.min.js') }}"></script>
			<!--Script ppara destacar no menu qual pagina que esta sendo exibida-->
			<script src="{{asset('/js/menu.js') }}"></script>

        @show
        @section('scriptsadd')
        @show
    </body>
</html>