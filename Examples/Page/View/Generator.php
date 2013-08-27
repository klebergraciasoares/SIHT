<?php
  $this->setView("Header");
?>

  <?php  

    function replaceTags(&$tags){
      $tags = str_replace("<<", "&lt", $tags);
      $tags = str_replace(">>", "&gt;", $tags);
    }

    $controller = file_get_contents("./Files/Controller.code");
    $DAO        = file_get_contents("./Files/DAO.code"); 
    $model      = file_get_contents("./Files/Model.code"); 
    $view       = file_get_contents("./Files/View.code");
    
    $sql_insert       = file_get_contents("./Files/SQL.INSERT.code");
    $sql_update       = file_get_contents("./Files/SQL.UPDATE.code");
    $sql_delete       = file_get_contents("./Files/SQL.DELETE.code");
    $sql_select_bind  = file_get_contents("./Files/SQL.SELECT.BIND.code");
    $sql_select_all   = file_get_contents("./Files/SQL.SELECT.ALL.code");

    replaceTags($controller);
    replaceTags($DAO);
    replaceTags($view);
    replaceTags($model);
    replaceTags($sql);

  ?>
  

      <div ng-controller="CtrlApp">

      <h1>Code Generator</h1>
      <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>

       <hr>

        <div class="form-group">
          <label for="classname">Class Name</label>
          <input type="text" ng-model="classname" class="form-control" id="classname" placeholder="Enter Class Name">
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-sm-9">
              <label for="atribute">Atributes for Class Model: {{firstUpper(classname)}}</label>
              <input type="text" ng-model="atribute" ng-change="udpateAtribute()" class="form-control" id="atribute" placeholder="Enter the name of attributes separated by ({{separator}})">
            </div>            
            <div class="col-sm-1">
              <label for="separator">Separator</label>
              <input type="text" ng-model="separator" ng-change="udpateAtribute()" class="form-control text-center" id="separator" maxlength="1">
            </div>            
            <div class="col-sm-2">
                <label>Documentation</label>
                 <div class="input-group">
                  <span class="input-group-addon">
                    <input type="checkbox"  id="documentation" name="documentation" ng-model="documentation" ng-init="documentation=true"/> 
                  </span>
                  <label for="documentation" class="form-control">Display</label>
                </div>
            </div>
          </div>
        </div>

        <hr>

        <div ng-if="classname">
          <ul id="myTab" class="nav nav-tabs">
            <li class="active"><a href="#controller" data-toggle="tab">{{firstUpper(classname)}}Controller</a></li>
            <li class=""><a href="#dao" data-toggle="tab">{{firstUpper(classname)}}DAO</a></li>
            <li class=""><a href="#view" data-toggle="tab">{{firstUpper(classname)}}View</a></li>
            <li class=""><a href="#model" data-toggle="tab">{{firstUpper(classname)}}</a></li>
            <li class=""><a href="#sql" data-toggle="tab">SQL</a></li>
          </ul>
          <div class="tab-content">
            <div id="controller" class="tab-pane fade active in">
              <hr>            
              <div class="panel panel-info">
                <div class="panel-heading">Create file: <b>/Controller/{{firstUpper(classname)}}Controller.php</b> </div>
                <div class="panel-body">
                 <?php echo "<pre class='h300'>{$controller}</pre>" ;?>
                </div>
              </div>            
            </div>
            <div id="dao" class="tab-pane fade">
              <hr>
              <div class="panel panel-info">
                <div class="panel-heading">Create file: <b>/DAO/{{firstUpper(classname)}}DAO.php</b></div>
                <div class="panel-body">
                 <?php echo "<pre class='h300'>{$DAO}</pre>" ;?>
                </div>
              </div>
            </div>
            <div id="view" class="tab-pane fade">
              <hr>
              <div class="panel panel-info">
                <div class="panel-heading">Create file: <b>/View/{{firstUpper(classname)}}View.php</b></div>
                <div class="panel-body">
                 <?php echo "<pre class='h300'>{$view}</pre>" ;?>
                </div>
              </div>
            </div>
            <div id="model" class="tab-pane fade">
              <hr>
              <div class="panel panel-info">
                <div class="panel-heading">Create file: <b>/Model/{{firstUpper(classname)}}.php</b></div>
                <div class="panel-body">
                 <?php echo "<pre class='h300'>{$model}</pre>" ;?>
                </div>
              </div>
            </div>
            <div id="sql" class="tab-pane fade">                 
                <hr>
                <div class="row">
                  <div class="form-group col-sm-12">
                    <h4><span class="label label-primary">Sql Scripts</span></h4>
                    <div class="row">
                      <div class="col-sm-2">                  
                         <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox"  id="sqlInsert" name="sqlInsert" ng-model="sqlInsert" ng-init="sqlInsert=true"/> 
                          </span>
                          <label for="sqlInsert" class="form-control">INSERT</label>
                        </div>
                      </div>                  
                      <div class="col-sm-2">                  
                         <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox"  id="sqlUpdate" name="sqlUpdate" ng-model="sqlUpdate" ng-init="sqlUpdate=true"/> 
                          </span>
                          <label for="sqlUpdate" class="form-control">UPDATE</label>
                        </div>
                      </div>
                      <div class="col-sm-2">                  
                         <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox"  id="sqlDelete" name="sqlDelete" ng-model="sqlDelete" ng-init="sqlDelete=true"/> 
                          </span>
                          <label for="sqlDelete" class="form-control">DELETE</label>
                        </div>
                      </div>
                      <div class="col-sm-2">                  
                         <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox"  id="sqlSelect" name="sqlSelect" ng-model="sqlSelect" ng-init="sqlSelect=true"/> 
                          </span>
                          <label for="sqlSelect" class="form-control">SELECT</label>
                        </div>
                      </div>              
                    </div>
                  </div>
                </div>

               <div class="row">
                  <div class="form-group col-sm-4">
                    <h4><span class="label label-primary">PDO Options</span></h4>
                    <div class="row">
                      <div class="col-sm-6">
                         <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox"  id="sqlPDO" name="sqlPDO" ng-model="sqlPDO" ng-init="sqlPDO=true"/> 
                          </span>
                          <label for="sqlPDO" class="form-control">PDO</label>
                        </div>
                      </div>
                      <div class="col-sm-6">
                         <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox" ng-disabled="!sqlPDO"  id="sqlPDOBindParam" name="sqlPDOBindParam" ng-model="sqlPDOBindParam" ng-init="sqlPDOBindParam=true"/> 
                          </span>
                          <label for="sqlPDOBindParam" class="form-control">BindParam</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-sm-2">
                    <h4><span class="label label-primary">Object Options</span></h4>
                    <div class="row">
                      <div class="col-sm-4">                  
                         <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox"  id="sqlGetSet" name="sqlGetSet" ng-model="sqlGetSet" ng-init="sqlGetSet=true"/> 
                          </span>
                          <label for="sqlGetSet" class="form-control">GET/SET</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-sm-6">
                    <h4><span class="label label-primary">Fetch Style</span></h4>
                    <div class="row">
                      <div class="col-sm-3">
                         <div class="input-group">
                          <span class="input-group-addon">
                           <input type="radio"ng-model="sqlFetch" id="sqlFetchAssoc" value="A" ng-init="sqlFetch='A'"/>
                          </span>
                           <label for="sqlFetchAssoc" class="form-control">Assoc</label>
                        </div>
                      </div>
                      <div class="col-sm-3">
                         <div class="input-group">
                          <span class="input-group-addon">
                           <input type="radio"ng-model="sqlFetch" id="sqlFetchRow" value="R"/>
                          </span>
                           <label for="sqlFetchRow" class="form-control">Row</label>
                        </div>
                      </div>
                      <div class="col-sm-3">
                         <div class="input-group">
                          <span class="input-group-addon">
                           <input type="radio"ng-model="sqlFetch" id="sqlFetchObject" value="O"/>
                          </span>
                           <label for="sqlFetchObject" class="form-control">Object</label>
                        </div>
                      </div>
                    </div>              
                  </div>              
                </div>  
                <div class="row">
                  <div class="col-sm-12">
                    <h4><span class="label label-primary">Primary Keys</span></h4>
                    <div class="col-sm-12 input-group form-control">
                      <span ng-repeat="atr in atributes"> <label>
                        <input type="checkbox" ng-model="atr.pk"> {{atr.name}}
                      </span>
                    </div>
                  </div>
                </div>            
                <hr>
                <div class="panel panel-info">
                  <div class="panel-heading">Script sql for class: <b>{{firstUpper(classname)}}</b></div>
                  <div class="panel-body">
                    <div ng-if="sqlInsert">
                      <h4><span class="label label-primary">insert</span></h4><?php echo "<pre class='h100'>{$sql_insert}</pre>" ;?>
                    </div>
                    <div ng-if="sqlUpdate">
                     <h4><span class="label label-primary">update</span></h4><?php echo "<pre class='h100'>{$sql_update}</pre>" ;?>
                    </div>
                    <div ng-if="sqlDelete">  
                      <h4><span class="label label-primary">delete</span></h4><?php echo "<pre class='h100'>{$sql_delete}</pre>" ;?>
                    </div>
                    <div ng-if="sqlSelect">
                      <h4><span class="label label-primary">select bind</span></h4><?php echo "<pre class='h100'>{$sql_select_bind}</pre>" ;?>
                    </div> 
                    <div ng-if="sqlSelect">
                      <h4><span class="label label-primary">select all</span></h4><?php echo "<pre class='h100'>{$sql_select_all}</pre>" ;?>
                    </div>                    
                  </div>
                </div>
              </div>
            </div>         
        </div>
      </div>
  

<style>

  pre.h300{
    height:300px;
    overflow:auto;
  }

   pre.h200{
    height:300px;
    overflow:auto;
  }

</style>

<script>

  function CtrlApp($scope) {
      $scope.classname  = "Cliente";
      $scope.atribute   = "idCliente, nome, email";
      $scope.separator  = ",";
      $scope.atributes  = [];

      $scope.udpateAtribute = function()
      {
        $scope.atributes = [];
        var atributes = $scope.atribute.split($scope.separator);
        
        for(var i=0;i<atributes.length;i++)
        {
          var atribute = atributes[i].trim();
          $scope.atributes.push({name : atribute, pk : false});
        }
      }

      $scope.firstUpper = function(text) {
        return text.substring(0, 1).toUpperCase() + text.substring(1, text.length);
      }

      $scope.firstLower = function(text) {
        return text.substring(0, 1).toLowerCase() + text.substring(1, text.length);
      }

      $scope.isNotPk = function(item) {
        if(!item.pk)
          return true;
        return false;
      };

      $scope.udpateAtribute();
  }

</script>

<?php
  $this->setView("Footer");
?>