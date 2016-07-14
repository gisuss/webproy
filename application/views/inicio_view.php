<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $titulo; ?></title>
	<link rel="stylesheet" href="<?php base_url();?>assets/css/bootstrap.css">
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="<?=base_url().'inicio'?>" title="Inicio"><b>GiSolutions</b></a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <!--<ul class="nav navbar-nav">
	        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
	        <li><a href="#">Link</a></li>
	      </ul>-->
	      <ul class="nav navbar-nav navbar-right">
	        <li>
	        	<a href="<?= base_url().'usuarios/'?>" title="Log in">
	        		<span class="glyphicon glyphicon-user"></span>&nbsp;Log in
	        	</a>
	        </li>
	        <li>
	        	<a href="<?= base_url().'usuarios/signup'?>" title="Sign up">
	        		<span class="glyphicon glyphicon-plus-sign"></span>&nbsp;Sign up
	        	</a>
	        </li>
	      </ul>
	    </div>
	  </div>
	</nav>

	<h1>Hola desde la vista</h1>

	<script src="<?php base_url();?>assets/js/jquery.js"></script>
	<script src="<?php base_url();?>assets/js/bootstrap.min.js"></script>
</body>
</html>