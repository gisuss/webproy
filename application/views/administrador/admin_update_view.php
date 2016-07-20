<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $titulo; ?></title>
	<link rel="stylesheet" href="<?php base_url();?>/assets/css/bootstrap.css">
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	    	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		    </button>
	      <a class="navbar-brand" href="<?=base_url().'admin'?>" title="Inicio"><b>GiSolutions | <i>Administrador</i></b></a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	      	<li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span>&nbsp;<b>Gestion de Usuarios</b><span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li class="divider"></li>
	            <li><a href="<?= base_url().'admin/add_usuario'?>"><span class="glyphicon glyphicon-plus"></span>&nbsp;<b>Nuevo Usuario</b></a></li>
	            <li class="divider"></li>
	            <li><a href="#" id="drop_"><span class="glyphicon glyphicon-minus"></span>&nbsp;<b>Eliminar Usuario</b></a></li>
	            <li class="divider"></li>
	            <li><a href="#" id="update_"><span class="glyphicon glyphicon-refresh"></span>&nbsp;<b>Actualizar Usuario</b></a></li>
	          </ul>
	        </li>		      
		  </ul>
	      <ul class="nav navbar-nav navbar-right">
	      	<li>
	      		<a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp; <?= $usuario; ?>
	      		</a>
	      	</li>
        	<li>
        		<a href="<?= base_url().'usuarios/logout'?>"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Log out
        		</a>
        	</li>
	      </ul>
	    </div>
	  </div>
	</nav>

	<div class="center-block">
		<?php if(isset($usuario1)):?>
			<?php if(isset($mensaje)):?>
				<h2>
					<span class="glyphicon glyphicon-thumbs-up" style="margin-left:15px"></span>&nbsp;<?= $mensaje, $usuario1; ?>
				</h2>
			<?php endif; ?>
		<?php endif; ?>
			
		<?php if(isset($mensaje1)):?>
			<h2>
				<span class="glyphicon glyphicon-exclamation-sign" style="margin-left:15px"></span>&nbsp;<?= $mensaje1; ?>
			</h2>
		<?php endif; ?>
	</div>

	<h1>Hola desde la vista de Administrador</h1>

	<div class="center-block">
		<form class="form-horizontal" name="form_reg" action="<?=base_url().'admin/update_user'?>" method="POST">
			<?php if($nombre != NULL):?>
				<label for="Nombre" class="col-sm-2 control-label">Nombre</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nombre" placeholder="Ingrese Nombre" value="<?= $nombre; ?>"><br />
				</div>
			<?php endif; ?>

			<?php if($apellido != NULL):?>
				<label for="Apellido" class="col-sm-2 control-label">Apellido</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="apellido" placeholder="Ingrese Apellido" value="<?= $apellido; ?>"><br />
				</div>
			<?php endif; ?>

			<?php if($cedula != NULL):?>
				<label for="Cedula" class="col-sm-2 control-label">Cedula</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="cedula" placeholder="Ingrese Cedula" value="<?= $cedula; ?>"><br />
				</div>
			<?php endif; ?>

			<?php if($correo != NULL):?>
				<label for="Correo" class="col-sm-2 control-label">Correo</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" name="correo" placeholder="Email" value="<?= $correo; ?>"><br />
				</div>
			<?php endif; ?>

			<?php if($telefono != NULL):?>
				<label for="Telefono" class="col-sm-2 control-label">Telefono</label>
				<div class="col-sm-10">
					<input type="tel" class="form-control" name="telefono" placeholder="Telefono" value="<?= $telefono; ?>"><br />
				</div>
			<?php endif; ?>

			<?php if($usuario1 != NULL):?>
				<label for="Usuario" class="col-sm-2 control-label">Usuario</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="usuario" placeholder="Ingrese Usuario" value="<?= $usuario1; ?>"><br />
				</div>
			<?php endif; ?>

			<?php if($pass != NULL):?>
				<label for="Password" class="col-sm-2 control-label">Contraseña</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" name="pass" placeholder="Ingrese Contraseña" value="<?= $pass; ?>"><br />
				</div>
			<?php endif; ?>

			<?php if($pass != NULL):?>
				<label for="Password" class="col-sm-2 control-label">Confirme Contraseña</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" name="pass2" placeholder="Confirme Contraseña" value="<?= $pass; ?>"><br />
				</div>
			<?php endif; ?>

			<?php if($cargo != NULL):?>
				<label for="Cargo" class="col-sm-2 control-label">Cargo</label>
				<div class="col-sm-10">
					<input type="tel" class="form-control" name="cargo" placeholder="Indique su Cargo" value="<?= $cargo; ?>"><br />
				</div>
			<?php endif; ?>

			<?php if($departamento != NULL):?>
				<label for="Departamento" class="col-sm-2 control-label">Departamento</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="departamento" placeholder="Indique un Departamento" value="<?= $departamento; ?>"><br />
				</div>
			<?php endif; ?>

			<label for="Tipo" class="col-sm-2 control-label">Tipo</label>
			<div class="col-sm-10" style="height:60px">		 
		      <select id="Tipo" name="tipo" style="height:39px;color:#000">
		        <option>admin</option>
		        <option>gerente</option>
		        <option>tecnico</option>
		        <option>solicitante</option>
		      </select>
		    </div>

		    <label for="Estado" class="col-sm-2 control-label">Estado</label>
			<div class="col-sm-10" style="height:60px">
		      <select id="estado" name="estado" style="height:39px;color:#000">
		        <option>Activo</option>
		        <option>Inactivo</option>
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

	<div class="modal" id="miVentana1">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" id="b2" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title">Eliminar Usuario</h4>
	      </div>
	      <div class="modal-body">
	        <form class="navbar-form navbar-left" action="<?=base_url().'admin/very_delete'?>" method="POST">
			    <div class="form-group">
			        <input type="text" class="form-control" name="usuario" placeholder="Ingrese Usuario">
			    </div>
			    <button type="submit" id="b1" name="delete_user" class="btn btn-default" value="Buscar">Buscar</button>
			</form><br /><br />
	      </div>
	      <div class="modal-footer">
	      </div>
	    </div>
	  </div>
	</div>

	<div class="modal" id="miVentana2">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" id="b3" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title">Actualizar Usuario</h4>
	      </div>
	      <div class="modal-body">
	        <form class="navbar-form navbar-left" action="<?=base_url().'admin/very_update'?>" method="POST">
			    <div class="form-group">
			        <input type="text" class="form-control" name="usuario" placeholder="Ingrese Usuario">
			    </div>
			    <button type="submit" id="b4" name="update_user" class="btn btn-default" value="Buscar">Buscar</button>
			</form><br /><br />
	      </div>
	      <div class="modal-footer">
	      </div>
	    </div>
	  </div>
	</div>
		

	<script src="<?php base_url();?>/assets/js/jquery-1.10.2.min.js"></script>
    <script src="<?php base_url();?>/assets/js/bootstrap.min.js"></script>
    <script src="<?php base_url();?>/assets/js/custom.js"></script>
  	<script type="text/javascript">/* <![CDATA[ */(function(d,s,a,i,j,r,l,m,t){try{l=d.getElementsByTagName('a');t=d.createElement('textarea');for(i=0;l.length-i;i++){try{a=l[i].href;s=a.indexOf('/cdn-cgi/l/email-protection');m=a.length;if(a&&s>-1&&m>28){j=28+s;s='';if(j<m){r='0x'+a.substr(j,2)|0;for(j+=2;j<m&&a.charAt(j)!='X';j+=2)s+='%'+('0'+('0x'+a.substr(j,2)^r).toString(16)).slice(-2);j++;s=decodeURIComponent(s)+a.substr(j,m-j)}t.innerHTML=s.replace(/</g,'&lt;').replace(/>/g,'&gt;');l[i].href='mailto:'+t.value}}catch(e){}}}catch(e){}})(document);/* ]]> */</script>

  	<script type="text/javascript">
  		var modal1 = document.getElementById('miVentana1');

  		var modal2 = document.getElementById('miVentana2');

  		var btn1 = document.getElementById("b1");

  		var btn2 = document.getElementById("b2");

  		var btn3 = document.getElementById("b3");

  		var btn4 = document.getElementById("b4");

		btn2.onclick = function() {
		    modal1.style.display = "none";
		}
		
		btn3.onclick = function() {
		    modal2.style.display = "none";
		}

		$("#drop_").on('click', function() {
		    modal1.style.marginTop = "100px";
		    modal1.style.display = 'block';
		});

		$("#update_").on('click', function() {
		    modal2.style.marginTop = "100px";
		    modal2.style.display = 'block';
		});

		// Cuando se hace click en cualquier lado fuera de la pantalla, se cierra el Modal
	 	window.onclick = function(event) {
		  if (event.target == modal1) {
		    modal1.style.display = "none";
		  }

		  if (event.target == modal2) {
		    modal2.style.display = "none";
		  }
		}
  	</script>
	
</body>
</html>