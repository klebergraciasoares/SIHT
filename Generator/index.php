<!DOCTYPE html>
<html ng-app lang="pt">
  <head>
    <title>Project Name</title>
    
    <meta charset="iso-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">    
    
    <link href="./Lib/css/bootstrap.css" rel="stylesheet"> 
    <script src="./Lib/js/jquery.js"></script>
    <script src="./Lib/js/angular.min.js"></script>
    <script src="./Lib/js/bootstrap.js"></script>

  </head>

  <?php  

    $controller = file_get_contents("./Files/Controller.code");
    $DAO        = file_get_contents("./Files/DAO.code"); 
    $model      = file_get_contents("./Files/Model.code"); 
    $view       = file_get_contents("./Files/View.code");

    $controller = str_replace("<<", "&lt", $controller);
    $controller = str_replace(">>", "&gt;", $controller);
    $DAO = str_replace("<<", "&lt", $DAO);
    $DAO = str_replace(">>", "&gt;", $DAO);
    $view = str_replace("<<", "&lt", $view);
    $view = str_replace(">>", "&gt;", $view);
    $model = str_replace("<<", "&lt", $model);
    $model = str_replace(">>", "&gt;", $model);
  ?>


  <body ng-controller="CtrlApp">    

      <div class="container">  

       <hr>

        <div class="form-group">
          <label for="classname">Class Name</label>
          <input type="text" ng-model="classname" class="form-control" id="classname" placeholder="Enter ClassName">
        </div>

        <div class="form-group" >          
          <label for="atribute">Atributes for Class: {{classname}}</label>
          <div class="row">
            <div class="col-lg-10">
              <input type="text" ng-model="atribute" class="form-control" id="atribute" placeholder="Enter Name(s) Atribute(s)">
            </div>
            <div class="col-lg-2">
              <button type="button" ng-click="addAtribute()" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>Add</button>
              <button type="button" ng-click="clearAtribute()" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i>Clear</button>
            </div>
          </div>
        </div>

        <hr>

        <ul id="myTab" class="nav nav-tabs">
          <li class="active"><a href="#controller" data-toggle="tab">Controller</a></li>
          <li class=""><a href="#dao" data-toggle="tab">DAO</a></li>
          <li class=""><a href="#view" data-toggle="tab">View</a></li>
          <li class=""><a href="#model" data-toggle="tab">Model</a></li>
        </ul>
        <div class="tab-content">
          <div id="controller" class="tab-pane fade active in">
            <hr>            
            <div class="panel panel-info">
              <div class="panel-heading">Create file: <b>/Controller/{{classname}}Controller.php</b> </div>
              <div class="panel-body">
               <?php echo "<pre>{$controller}</pre>" ;?>
              </div>
            </div>            
          </div>
          <div id="dao" class="tab-pane fade">
            <hr>
            <div class="panel panel-info">
              <div class="panel-heading">Create file: <b>/DAO/{{classname}}DAO.php</b></div>
              <div class="panel-body">
               <?php echo "<pre>{$DAO}</pre>" ;?>
              </div>
            </div>
          </div>
          <div id="view" class="tab-pane fade">
            <hr>
            <div class="panel panel-info">
              <div class="panel-heading">Create file: <b>/View/{{classname}}View.php</b></div>
              <div class="panel-body">
               <?php echo "<pre>{$view}</pre>" ;?>
              </div>
            </div>
          </div>
          <div id="model" class="tab-pane fade">
            <hr>
            <div class="panel panel-info">
              <div class="panel-heading">Create file: <b>/Model/{{classname}}.php</b></div>
              <div class="panel-body">
               <?php echo "<pre>{$model}</pre>" ;?>
              </div>
            </div>
          </div>
        </div>

        <hr>

      </div>
  </body>
  
</html>

<style>

span.sh-classname{
  color:#1c03ff;
  font-weight:bold;
}

span.sh-classname{
  color:#1c03ff;
  font-weight:bold;
}

</style>

<script>

  function CtrlApp($scope) {
      $scope.atributes = [];      

      $scope.addAtribute = function() {
        var atributes = $scope.atribute.split(",");
        
        for(var i=0;i<atributes.length;i++)
        {
          var atribute = atributes[i].trim(); 
          var nameAtr  = atribute;
          var nameUpc  = atribute.substring(0, 1).toUpperCase() + atribute.substring(1, atribute.length)
          $scope.atributes.push({nameAtr : nameAtr, nameUpc: nameUpc});
        }
      }

      $scope.clearAtribute = function() {
        $scope.atributes = [];
      }
  }

</script>