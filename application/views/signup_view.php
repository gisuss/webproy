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
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="<?=base_url()?>" title="Inicio"><b>GiSolutions</b></a>
	    </div>
	  </div>
	</nav>

	<div class="center-block">
		<?php if(isset($mensaje)):?>
			<h2>
				<span class="glyphicon glyphicon-thumbs-up" style="margin-left:15px"></span>&nbsp;<?= $mensaje; ?>
				<a href="<?= base_url().'usuarios/'?>" class="btn btn-primary">Log In</a>
			</h2>
		<?php endif; ?>

		<h1><span class="glyphicon glyphicon-pencil" style="margin-left:15px"></span>&nbsp;Registro de Nuevo Usuario</h1>

		<form class="form-horizontal" name="form_reg" action="<?=base_url().'usuarios/very_signup'?>" method="POST">
			<label for="Nombre" class="col-sm-2 control-label">Nombre</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="nombre" placeholder="Ingrese Nombre" value="<?= @set_value('nombre')?>"><br />
			</div>

			<label for="Apellido" class="col-sm-2 control-label">Apellido</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="apellido" placeholder="Ingrese Apellido" value="<?= @set_value('apellido')?>"><br />
			</div>

			<label for="Cedula" class="col-sm-2 control-label">Cedula</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="cedula" placeholder="Ingrese Cedula" value="<?= @set_value('cedula')?>"><br />
			</div>

			<label for="Correo" class="col-sm-2 control-label">Correo</label>
			<div class="col-sm-10">
				<input type="email" class="form-control" name="correo" placeholder="Email" value="<?= @set_value('correo')?>"><br />
			</div>

			<label for="Telefono" class="col-sm-2 control-label">Telefono</label>
			<div class="col-sm-10">
				<input type="tel" class="form-control" name="telefono" placeholder="Telefono" value="<?= @set_value('telefono')?>"><br />
			</div>

			<label for="Usuario" class="col-sm-2 control-label">Usuario</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="usuario" placeholder="Ingrese Usuario" value="<?= @set_value('usuario')?>"><br />
			</div>

			<label for="Password" class="col-sm-2 control-label">Contraseña</label>
			<div class="col-sm-10">
				<input type="password" class="form-control" name="pass" placeholder="Ingrese Contraseña" value="<?= @set_value('pass')?>"><br />
			</div>

			<label for="Password" class="col-sm-2 control-label">Confirme Contraseña</label>
			<div class="col-sm-10">
				<input type="password" class="form-control" name="pass2" placeholder="Ingrese Contraseña" value="<?= @set_value('pass2')?>"><br />
			</div>

			<label for="Cargo" class="col-sm-2 control-label">Cargo</label>
			<div class="col-sm-10">
				<input type="tel" class="form-control" name="cargo" placeholder="Indique su Cargo" value="<?= @set_value('cargo')?>"><br />
			</div>

			<label for="Departamento" class="col-sm-2 control-label">Departamento</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="departamento" placeholder="Indique un Departamento" value="<?= @set_value('departamento')?>"><br />
			</div>

			<label for="Tipo" class="col-sm-2 control-label">Tipo</label>
			<div class="col-sm-10" style="height:60px">		 
		      <select id="Tipo" name="tipo" style="height:39px;color:#000">
		        <option>admin</option>
		        <option>gerente</option>
		        <option>tecnico</option>
		        <option>solicitante</option>
		      </select>
		    </div>

			<div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <input type="submit" value="Registrar" name="submit_reg" class="btn btn-primary">
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