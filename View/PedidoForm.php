<?php
  $this->setView("Header");
?>
	<div ng-app ng-controller="CtrlApp">
	<form id="form" name='form' action="<?php echo SH_WEB_ROOT_APP ?>/Cliente/salvar" method="POST" >  	  

	   <h3><i class="glyphicon glyphicon-pencil"></i> Cadastro de cliente</h3>
		<hr>

		 <div class="row">
		 	<div class="form-group col-lg-2 col-sm-2">
		      <label for="idProduto">Produto</label>
		      <input type="text" name="idProduto" id="idProduto" class="form-control">
		    </div>
		    <div class="form-group col-lg-5 col-sm-5">
		      <label for="idProduto">Produto</label>
		      <input type="text" name="idProduto" id="idProduto" class="form-control">
		    </div>
		    <div class="form-group col-lg-2 col-sm-2">
		      <label for="quantidade">Quantidade</label>
		      <input type="number" name="quantidade" id="quantidade" class="form-control">
		    </div>
		    <div class="form-group col-lg-2 col-sm-2">
		      <label for="preco">Valor Unitário</label>
		      <input type="text" name="preco" id="preco" class="form-control">
		    </div>
		</div>    

		<button type="button" class="btn btn-success btn-sm" ng-click="addProduto()"><i class="glyphicon glyphicon-ok"></i> Adicionar</button>

		<div class="row" >
			<div class="table-responsive">
			 <table class="table table-hover" id="tableList">
		        <thead>
		          <tr>
		            <th class="col-md-1 text-center">Cód.</th>
		            <th class="col-md-5">Nome</th>
		            <th class="col-md-1 text-center">Qtde</th>
		            <th class="col-md-2 hidden-xs text-right">Preço</th>		            
		            <th class="col-md-2 text-right">Total</th>
		            <th class="col-md-1">&nbsp;</th>		            	           
		          </tr>
		        </thead>
		        <tbody ng-repeat="produto in produtos">
		        	<tr>
		        		<td class="text-center">{{produto.idProduto}}</td>
		        		<td>{{produto.nome}}</td>
		        		<td class="text-center"><input class="form-control" type="number" min="1" ng-model="produto.qtde" value="{{produto.qtde}}"></td>
		        		<td class="hidden-xs text-right">{{produto.preco | currency:"R$ "}}</td>
		        		<td class="text-right">{{produto.preco*produto.qtde | currency:"R$ "}}</td>
		        		<td><button type="button" class="btn btn-link btn-xs" title="Excluir" ng:click="produtos.splice($index, 1)"><i class="glyphicon glyphicon-trash"></i> </button></td>
		        	</tr>
		        </tbody>
		        	<tr>		        		
		        		<td colspan="5" class="text-right"><h3><span class="label label-success">{{sumProduto() | currency:"R$ "}}</span></h3></td>		        		
		        	</tr>
		      </table>
		    </div>
		</div>
		<div class="row pull-right">
			<div class="form-group col-lg-12 col-sm-12">
				<button type="submit" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-ok"></i> Salvar</button>
		    	<a href="<?php echo SH_WEB_ROOT_APP ?>/Pedido/listar" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i> Cancelar</a>
			</div>
		</div>
	</form>
	</div>

<script>



	function CtrlApp($scope) {
		$scope.produtos 	= [];

		$scope.addProduto = function() { 
			$scope.produtos.push({idProduto : 1, nome: "Mouse",qtde:2,preco:10.00});		
		}

		$scope.delProduto = function(index) {
		}

		$scope.sumProduto = function() 
		{
		   	var total = 0;
			for(var i=0;i<$scope.produtos.length;i++)
		    	total += $scope.produtos[i].qtde * $scope.produtos[i].preco;
		   	return total;	   	
		}        
	}

</script>
  
<?php
  $this->setView("Footer");
?>  