<?php
  	$this->setView("Header");

  	$REG_PG 	= 10;
	$NUM_PG 	= defined("HTA_PARAM3") && is_numeric(HTA_PARAM3)? HTA_PARAM3 : 1;
	$FIL_NOME 	= isset($_POST["filNome"]) ? $_POST["filNome"] : "";

?>

	
	<script >
		$(function() {
			$("table#tableList").tablesorter({ sortList: [[1,0]] });
		});

		/*$(function () {
            $('#tableList tr').click(function () {                
                $(this).addClass('lineDiff').siblings().removeClass('lineDiff');
            });
        });*/

	</script>		
      
		  <fieldset>
		    <legend>Lista de Cliente(s)</legend>

		    <form action="<?php echo SH_WEB_ROOT_APP ?>/Cliente/listar" method="POST">
			    <div class="row">
			    	<div class="col-xs-9">
			    		<div class="row">
				    		<div class="input-group col-xs-8">						
				    			<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
								<input name="filNome" type="text" class="form-control" placeholder="Nome do Cliente" value="<?php echo $FIL_NOME?>">
							</div>
							<div class="input-group col-xs-4">						
								<button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-search"></i> Buscar</button>
							</div>
						</div>
			    	</div>		    	
			    	<div class="col-xs-3">
			    		<a href="<?php echo SH_WEB_ROOT_APP ?>/Cliente/cadastrar" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i> Novo Cliente</a>
			    	</div>
			    </div>
		    </form>

		    <hr>

			<div class="bs-table-scrollable">      
			 <table class="table table-hover table-striped" id="tableList">
		        <thead>
		          <tr>
		            <th class="col-lg-1 text-center">Código</th>
		            <th class="col-lg-4">Nome</th>
		            <th class="col-lg-1">Estado</th>
		            <th class="col-lg-2">Cidade</th>		            
		            <th class="col-lg-2">CPF</th>
		            <th class="col-lg-2">&nbsp;</th>
		          </tr>
		        </thead>
		        <tbody>
		        	<?php

		        		$clientes = $this->clientes;

		        		for($i=(($NUM_PG-1) * $REG_PG);$i<($REG_PG * ($NUM_PG)) && $i<count($clientes);$i++)
		        		{
		        			$cliente = $clientes[$i];

		        			$urlAlterar = SH_WEB_ROOT_APP . "/Cliente/alterar/" . $cliente->getIdCliente();
		        			$urlExcluir = SH_WEB_ROOT_APP . "/Cliente/excluir/" . $cliente->getIdCliente();
		        	?>
				          <tr class="<?php echo $cliente->getStatus()=="I" ? "danger" : "" ?>">
				            <td class="text-center"><?php echo $cliente->getIdCliente() ?></td>
				            <td><?php echo $cliente->getNome() ?></td>
				            <td><?php echo $cliente->getEstado() ?></td>
				            <td><?php echo $cliente->getCidade() ?></td>
				            <td><?php echo $cliente->getCpf() ?></td>				            
				            <td class="text-right">
				            	<a href="<?php echo $urlAlterar?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i> Alterar</a>				            	
								<button type="button" class="btn btn-danger btn-xs" onclick="if(confirm('Deseja remover o cliente?')) { document.location.href='<?php echo $urlExcluir?>' }"><i class="glyphicon glyphicon-trash"></i> Excluir</button>								
				            </td>
				          </tr>
		          <?php
		          		}
		          ?>
		          
		        </tbody>
		      </table>		      
		      </div>

		      <?php
					if(count($clientes) == 0)
	          		{
	          			$alert = new Alert("ATENÇÃO:","Nenhum registro encontrado!",Alert::$INFO);
						echo $alert->getHtml();
	          		}
		      ?>

		      <hr>

		      <div class="text-center">
		      	<?php
		      		$pagination = new Pagination(SH_WEB_ROOT_APP."/Cliente/listar",$clientes,$REG_PG,$NUM_PG);
		      		echo $pagination->getHtml();
		      	?>
	      		<ul class="pagination pagination">
					<?php
						/*$PAG_INI = 0;
						$PAG_FIM = ceil(count($clientes) / $REG_PG);

						if($NUM_PG == 0){
							echo "<li class='disabled'><a >&laquo;</a></li>";
							echo "<li class='disabled'><a>&lsaquo;</a></li>";
						}
						else{
							echo "<li><a href='".SH_WEB_ROOT_APP."/Cliente/listar/1'>&laquo;</a></li>";
							echo "<li><a href='".SH_WEB_ROOT_APP."/Cliente/listar/".($NUM_PG - 1)."'>&lsaquo;</a></li>";
						}

						for($i=$PAG_INI;$i<$PAG_FIM;$i++)
	        			{
	        				if($i == $NUM_PG)
	        					echo "<li class='disabled'><a>".($i+1)."</a></li>";
	        				else
	        					echo "<li><a href='".SH_WEB_ROOT_APP."/Cliente/listar/".($i+1)."'>".($i+1)."</a></li>";
	        			}

	        			if($NUM_PG == $PAG_FIM-1){
							echo "<li class='disabled'><a>&rsaquo;</a></li>";		        		
							echo "<li class='disabled'><a>&raquo;</a></li>";
	        			}
						else{
							echo "<li><a href='".SH_WEB_ROOT_APP."/Cliente/listar/".($NUM_PG + 2)."'>&rsaquo;</a></li>";
							echo "<li><a href='".SH_WEB_ROOT_APP."/Cliente/listar/".($PAG_FIM)."'>&raquo;</a></li>";
						}
						*/						
					?>						
				</ul>				    
			</div>
		</fieldset>
		
	
  
<?php  
  $this->setView("Footer");
?>  