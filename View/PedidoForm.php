<?php
  $this->setView("Header");
?>
	<div ng-app ng-controller="CtrlApp">
	<form id="form" name='form' action="<?php echo SH_WEB_ROOT_APP ?>/Cliente/salvar" method="POST" >  	  

	   <h3><i class="glyphicon glyphicon-pencil"></i> Cadastro de cliente</h3>
		<hr>

		 <div class="row">
		 	<div class="form-group col-lg-2 col-sm-2">
		      <label for="idCliente">Código</label>
		      <input type="text" name="idCliente" id="idCliente" value="" readonly="readonly" class="form-control" placeholder="AUTO">
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
		            <th class="col-md-1 hidden-xs text-center">Qtde</th>
		            <th class="col-md-2 hidden-xs text-right">Preço</th>		            
		            <th class="col-md-2 hidden-xs text-right">Total</th>
		            <th class="col-md-1">&nbsp;</th>		            	           
		          </tr>
		        </thead>
		        <tbody ng-repeat="produto in produtos">
		        	<tr>
		        		<td>{{produto.idProduto}}</td>
		        		<td>{{produto.nome}}</td>
		        		<td class="hidden-xs text-center">{{produto.qtde}}</td>
		        		<td class="hidden-xs text-right">{{produto.preco | currency:"R$ "}}</td>
		        		<td class="text-right">{{produto.subtotal | currency:"R$ "}}</td>
		        		<td><button type="button" class="btn btn-link btn-xs" title="Excluir" onclick="if(confirm('Deseja remover o cliente?')) { }"><i class="glyphicon glyphicon-trash"></i> </button></td>
		        	</tr>
		        </tbody>
		        	<tr>
		        		<td></td>
		        		<td></td>
		        		<td class="hidden-xs text-center"></td>
		        		<td class="hidden-xs text-right"></td>
		        		<td class="text-right"><h3><span class="label label-success">{{total | currency:"R$ "}}</span></h3></td>
		        		<td></td>
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
      $scope.total 		= 0;

      $scope.addProduto = function() { 
        $scope.produtos.push({idProduto : 1, nome: "Mouse",qtde:1,preco:10.00,subtotal:10.00});
        $scope.atualizaTotal();    
      }

      $scope.removeProduto = function() {
        $scope.produtos = [];
      }

      $scope.atualizaTotal = function() {
      	$scope.total = 0;
      	for(var i=0;i<$scope.produtos.length;i++)
            $scope.total= $scope.total + $scope.produtos[i].subtotal;
      }
  }

</script>
  
<?php
  $this->setView("Footer");
?>  