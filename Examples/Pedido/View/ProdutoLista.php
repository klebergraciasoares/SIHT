<?php
  	$this->setView("Header");
?>

<div ng-controller="CtrlApp" ng-init="init()">	

	<h3><i class="glyphicon glyphicon-list"></i> Lista de produto(s)</h3>
	<hr>
	    
    <div class="row">
    	<div class="col-lg-12">
			<a href="#filter" data-toggle="modal" class="btn btn btn-primary btn-sm"><i class="glyphicon glyphicon-search"></i> Buscar</a>
    		<button type="button" ng-click="limpar()" data-dismiss="modal" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i> Limpar</button>
		    <a href="<?php echo SH_WEB_ROOT_APP ?>/Produto/cadastrar" class="btn btn-primary pull-right btn-sm"><i class="glyphicon glyphicon-plus"></i> Novo Produto</a>
    	</div>
    </div>

    <form  class="form-horizontal">
		<div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="filterLabel" aria-hidden="true">
			<div class="modal-dialog">
			  <div class="modal-content">
			    <div class="modal-header">
			      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			      <h4 class="modal-title"><i class="glyphicon glyphicon-search"></i> Busca de produtos</h4>
			    </div>
			    <div class="modal-body">
			    	<div class="form-group">
						<label class="col-sm-2">C�digo</label>
						<div class="col-sm-4">
					      <input ng-model="busca.idProduto" type="text" class="form-control" placeholder="C�digo do Produto">							
					    </div>    
					</div>	
					<div class="form-group">
						<label class="col-sm-2">Nome</label>
						<div class="col-sm-10">
					      <input ng-model="busca.nome" type="text" class="form-control" placeholder="Nome do Produto">							
					    </div>    
					</div>
					<div class="form-group">
						<label class="col-sm-2">Pre�o</label>
						<div class="col-sm-4">
					      <input ng-model="busca.preco" type="text" class="form-control" placeholder="Pre�o do Produto">							
					    </div>    
					</div>							
			    </div>
			    <div class="modal-footer" >
			    	<button type="button" ng-click="listar()" data-dismiss="modal" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-search"></i> Buscar</button>
			      	<button type="button" class="btn btn-danger btn-sm" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i> Fechar</button>
			    </div>
			  </div>
			</div>
		</div>
	</form>

    <hr>

	<div ng-if="(produtos | filter:busca).length > 0" class="table-responsive" style="height:400px;overflow:auto">
	 <table class="table table-hover" id="tableList">
        <thead>
          <tr>
            <th class="col-md-1 text-center">C�d.</th>
            <th class="col-md-9">Nome</th>
            <th class="col-md-1 hidden-xs">Pre�o</th>            
            <th class="col-md-1 text-center">A��es</th>		           
          </tr>
          <tbody>
	          <tr ng-repeat="prod in produtos | filter:busca">
	          	<td class="text-center">{{prod.idProduto}}</td>
	          	<td>{{prod.nome}}</td>
	          	<td nowrap class="text-right">{{prod.preco| currency:"R$ "}}</td>   
	          	<td class="text-right" nowrap>
	            	<a href="<?php echo SH_WEB_ROOT_APP ?>/Produto/alterar/{{prod.idProduto}}" class="btn btn-warning btn-xs" title="Alterar"><i class="glyphicon glyphicon-edit"></i> </a>				            	
	            	<button type="button" class="btn btn-danger btn-xs" title="Excluir" ng-click="excluir(prod)"><i class="glyphicon glyphicon-trash"></i> </button>								
	            </td>       	
	          </tr>
          </tbody>
        </thead>
      </table>		      
    </div>

	<div ng-if="(produtos | filter:busca).length == 0" class="alert alert-dismissable alert-info">
       <button ng-if="alert.close" type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Aten��o</strong>
        Nenhum registro encontrado!
    </div>     

    <hr>
	
	<div class="pull-right">
		<h4><span class="label label-primary">Produtos: {{produtos.length}}</span></h4>		
	</div>
      
    <div class="text-center">
      	<ul class="pagination">
        <li class="disabled"><a href="#">&laquo;</a></li>        
        <li ng-repeat="i in range(1,((produtos | filter:busca).length),5)">
        	<a href="#" ng-click="setPage($index+1)">{{$index+1}}</a>
        </li>
        <li><a href="#">&raquo;</a></li>     
     </ul>				    
	</div>
</div>



	<script type="text/javascript">

		function CtrlApp($scope,$http, $templateCache) 
		{
			$scope.produtos = [];
			$scope.busca 	= {};
			$scope.page 	= 1;

			$scope.init = function (){
				$scope.listar();
			}
			
			$scope.listar = function (){
				$http({
					method	: "POST",
					url		: "http://127.0.0.1/SIHT/Examples/Pedido/Produto/RequestList", 
					cache 	: $templateCache,
					//data 	: $.param({filter : $scope.busca}),
					headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}
				}).success(function(data, status) {
			      	$scope.produtos = data.produtos;
			      	$scope.setAlerts(data.alerts);
			    }).error(function(data, status) {
			       $scope.setAlerts([{type:"danger",title:"Aten��o: ",text:"Erro ao Buscar JSON!"}]);
			    });
			};

			$scope.limpar = function (){
				$scope.busca={};
				$scope.listar();
			}

			$scope.excluir = function (object){
				if(!confirm("Confirma exclus�o do Produto:" + object.nome +  "?"))
					return;

				$http({
					method	: "POST",
					url		: "http://127.0.0.1/SIHT/Examples/Pedido/Produto/RequestExcluir",
					cache 	: $templateCache,
					data 	: $.param({produto : object}),
					headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=ISO8859-1'}
				}).success(function(data, status) {					
			      	$scope.setAlerts(data.alerts);
			      	if(data.sucess) 
			      		$scope.listar();
			    }).error(function(data, status) {
			       $scope.setAlerts([{type:"danger",title:"Aten��o: ",text:"Erro ao Buscar JSON!"}]);
			    });
				
			}

			$scope.setPage= function (page){
				$scope.page = page;
			}
		  
		}

	</script>
		
		
	
  
<?php  
  $this->setView("Footer");
?>  