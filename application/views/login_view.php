<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $titulo; ?></title>
	<link rel="stylesheet" href="<?php base_url();?>/assets/css/bootstrap.css">
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="<?=base_url()?>" title="Inicio"><b>GiSolutions</b></a>
	    </div>
	  </div>
	</nav>

	<div class="center-block">
		<?php if(isset($mensaje)):?>
			<h2>
				<span class="glyphicon glyphicon-thumbs-down" style="margin-left:15px"></span>&nbsp;<?= $mensaje; ?>
			</h2>
		<?php endif; ?>

		<h1><span class="glyphicon glyphicon-user" style="margin-left:15px"></span>&nbsp;Iniciar Sesion</h1>
		
		<form class="form-horizontal" name="form_log" action="<?=base_url().'usuarios/very_sesion'?>" method="POST">
			<label for="Usuario" class="col-sm-2 control-label">Usuario</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="usuario" placeholder="Nombre de Usuario" value="<?= @set_value('usuario')?>"><br />
			</div>

			<label for="Pass" class="col-sm-2 control-label">Contraseña</label>
			<div class="col-sm-10">
				<input type="password" class="form-control" name="pass" placeholder="Contraseña" value="<?= @set_value('pass')?>"><br />
			</div>

			<div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <input type="submit" value="Entrar" name="submit" class="btn btn-primary">
			    </div>
			</div>
		</form>
	</div>

	<hr />
	<?= validation_errors(); ?>

	<script src="<?php base_url();?>assets/js/jquery.js"></script>
	<script src="<?php base_url();?>assets/js/bootstrap.min.js"></script>
</body>
</html>