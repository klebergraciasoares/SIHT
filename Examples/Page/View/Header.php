<!DOCTYPE html>
<html ng-app lang="pt">
  <head>
    <title>Project Name X</title>
    
    <meta charset="iso-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">    
    
    <link href="<?php echo SH_WEB_ROOT_LIB ?>/css/bootstrap.min.css" rel="stylesheet">    
    <link href="<?php echo SH_WEB_ROOT_LIB ?>/css/local.css" rel="stylesheet">

    <script src="<?php echo SH_WEB_ROOT_LIB ?>/js/jquery.min.js"></script>
    <script src="<?php echo SH_WEB_ROOT_LIB ?>/js/bootstrap.min.js"></script>    
    <script src="<?php echo SH_WEB_ROOT_LIB ?>/js/angular.min.js"></script>
    <script src="<?php echo SH_WEB_ROOT_LIB ?>/js/angular.locale.pt-br.min.js"></script>
    <script src="<?php echo SH_WEB_ROOT_LIB ?>/js/local.js"></script>

  </head>

  <body>   
    
    <nav id="navbar-example" role="navigation" class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" style="padding:7px" href="./"><img src="data:image/png;base64,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"></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">            
            <li class="<?php echo $this instanceof StartController ? "active" : "" ?>"><a href="./Start">Start</a></li>
            <li class="<?php echo $this instanceof StructureController ? "active" : "" ?>"><a href="./Structure">Structure</a></li>
            <li class="disabled"><a href="Download.php">Download</a></li>
            <li class="disabled"><a href="#">Docs</a></li>
            <li class="disabled"><a href="#">Demo</a></li>
            <li class="<?php echo $this instanceof GeneratorController ? "active" : "" ?>"><a href="./Generator">Generator</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">            
            <li class="disabled"><a href="./">Contact</a></li>
          </ul>
        </div>      
      </div>
    </nav>

    <div class="container">          
    