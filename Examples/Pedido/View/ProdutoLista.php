<?php
  	$this->setView("Header");

  	$REG_PG 	= 5;
	$NUM_PG 	= defined("HTA_PARAM3") && is_numeric(HTA_PARAM3)? HTA_PARAM3 : 1;
?>

<div ng-controller="CtrlApp" ng-init="init()">	

	<h3><i class="glyphicon glyphicon-list"></i> Lista de produto(s)</h3>
	<hr>
	    
    <div class="row">
    	<div class="col-lg-12">
			<a href="#filter" data-toggle="modal" class="btn btn btn-primary btn-sm"><i class="glyphicon glyphicon-search"></i> Buscar</a>
          	<a href="<?php echo SH_WEB_ROOT_APP ?>/Produto/listar" class="btn btn-danger btn-sm" <?php if(!$this->post) echo "disabled" ?>><i class="glyphicon glyphicon-remove"></i> Limpar</a>
    		<a href="<?php echo SH_WEB_ROOT_APP ?>/Produto/cadastrar" class="btn btn-primary pull-right btn-sm"><i class="glyphicon glyphicon-plus"></i> Novo Produto</a>
    	</div>
    </div>

	<form  class="form-horizontal" action="<?php echo SH_WEB_ROOT_APP ?>/Produto/listar" method="POST">
	  <div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="filterLabel" aria-hidden="true">
	    <div class="modal-dialog">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	          <h4 class="modal-title"><i class="glyphicon glyphicon-search"></i> Busca de produtos</h4>
	        </div>
	        <div class="modal-body">
	        	<div class="form-group">
					<label class="col-sm-2" for="filIdCliente">Código</label>
					<div class="col-sm-4">
				      <input name="filIdCliente" id="filIdCliente" type="text" class="form-control" placeholder="Código do Cliente" value="<?php echo isset($this->post["filIdCliente"]) ? $this->post["filIdCliente"] : ""?>">							
				    </div>				    
				</div>									
		    </div>
	        <div class="modal-footer" >
	        	<button type="submit" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-search"></i> Buscar</button>
	          	<button type="button" class="btn btn-danger btn-sm" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i> Fechar</button>
	        </div>
	      </div>
	    </div>
	  </div>
	</form>

    <hr>

	<div class="table-responsive">
	 <table class="table table-hover" id="tableList">
        <thead>
          <tr>
            <th class="col-md-1 text-center">Cód.</th>
            <th class="col-md-9">Nome</th>
            <th class="col-md-1 hidden-xs">Preço</th>            
            <th class="col-md-1 text-center">Ações</th>		           
          </tr>
          <tbody>
	          <tr ng-repeat="prod in produtos">
	          	<td class="text-center">{{prod.idProduto}}</td>
	          	<td>{{prod.nome}}</td>
	          	<td>{{prod.preco| currency:"R$ "}}</td>   
	          	<td class="text-right" nowrap>
	            	<a href="" class="btn btn-warning btn-xs" title="Alterar"><i class="glyphicon glyphicon-edit"></i> </a>				            	
	            	<button type="button" class="btn btn-danger btn-xs" title="Excluir" onclick="if(confirm('Deseja remover o cliente?')) { document.location.href='#' }"><i class="glyphicon glyphicon-trash"></i> </button>								
	            </td>       	
	          </tr>
          </tbody>
        </thead>
      </table>		      
    </div>

	<div ng-if="produtos.length == 0" class="alert alert-dismissable alert-info">
       <button ng-if="alert.close" type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Atenção</strong>
        Nenhum registro encontrado!
    </div>     

    <hr>
	
	<div class="pull-right">
		<h4><span class="label label-default">Produtos: {{produtos.length}}</span></h4>      
	</div>
      
    <button ng-click="atualizar()">atualizar</button>

    <div class="text-center">
      	<?php
      		//$pagination = new Pagination(SH_WEB_ROOT_APP."/Cliente/listar",$this->clientes,$REG_PG,$NUM_PG);
      		//echo $pagination->getHtml();
      	?>      				    
	</div>
</div>



	<script type="text/javascript">

		function CtrlApp($scope,$http, $templateCache) 
		{
			$scope.produtos = [];

			$scope.init = function (){
				$scope.atualizar();
			}
			
			$scope.atualizar = function (){				

				$http({method: "POST", url: "http://127.0.0.1/SIHT/Examples/Pedido/Produto/JSONList", cache: $templateCache}).
			      success(function(data, status) {
			      	$scope.produtos = data.produtos;
			      	$scope.setAlerts(data.alerts);
			      }).
			      error(function(data, status) {
			       alert('erro');
			    });
			};

		  
		}

	</script>
		
		
	
  
<?php  
  $this->setView("Footer");
?>  