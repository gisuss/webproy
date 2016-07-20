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
	      <a class="navbar-brand" href="<?=base_url()?>" title="Inicio"><b>GiSolutions | <i><?= $titulo; ?></i></b></a>
	    </div>
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-right">
	        <li>
	        	<a href="<?= base_url().'usuarios/signup'?>" title="Sign up">
	        		<span class="glyphicon glyphicon-plus-sign"></span>&nbsp;Sign up
	        	</a>
	        </li>
	      </ul>
	    </div>
	  </div>
	</nav>

	<div class="center-block">
		<?php if(isset($mensaje1)):?>
			<h2>
				<span class="glyphicon glyphicon-exclamation-sign" style="margin-left:15px"></span>&nbsp;<?= $mensaje1; ?>
			</h2>
		<?php endif; ?>

		<?php if(isset($mensaje)):?>
			<h2>
				<span class="glyphicon glyphicon-thumbs-up" style="margin-left:15px"></span>&nbsp;<?= $mensaje,$usuario; ?>
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

	<script src="<?php base_url();?>/assets/js/jquery-1.10.2.min.js"></script>
    <script src="<?php base_url();?>/assets/js/bootstrap.min.js"></script>
    <script src="<?php base_url();?>/assets/js/custom.js"></script>
  	<script type="text/javascript">/* <![CDATA[ */(function(d,s,a,i,j,r,l,m,t){try{l=d.getElementsByTagName('a');t=d.createElement('textarea');for(i=0;l.length-i;i++){try{a=l[i].href;s=a.indexOf('/cdn-cgi/l/email-protection');m=a.length;if(a&&s>-1&&m>28){j=28+s;s='';if(j<m){r='0x'+a.substr(j,2)|0;for(j+=2;j<m&&a.charAt(j)!='X';j+=2)s+='%'+('0'+('0x'+a.substr(j,2)^r).toString(16)).slice(-2);j++;s=decodeURIComponent(s)+a.substr(j,m-j)}t.innerHTML=s.replace(/</g,'&lt;').replace(/>/g,'&gt;');l[i].href='mailto:'+t.value}}catch(e){}}}catch(e){}})(document);/* ]]> */</script>
</body>
</html>