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
	    	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		    </button>
	      	<a class="navbar-brand" href="<?=base_url().'solicitante'?>" title="Inicio"><b>GiSolutions | <i>Solicitante</i></b></a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">	      
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
		<?php if(isset($mensaje)):?>
			<h2>
				<span class="glyphicon glyphicon-thumbs-up" style="margin-left:15px"></span>&nbsp;<?= $mensaje; ?>
			</h2>
		<?php endif; ?>

		<?php if(isset($mensaje2)):?>
			<h2>
				<span class="glyphicon glyphicon-exclamation-sign" style="margin-left:15px"></span>&nbsp;<?= $mensaje2; ?>
			</h2>
		<?php endif; ?>

		<h1><span class="glyphicon glyphicon-pencil" style="margin-left:15px"></span>&nbsp;Registro de Nuevo Ticket</h1>

		<form class="form-horizontal" name="ticket_reg" action="<?=base_url().'solicitante/very_reg'?>" method="POST">
			<label for="Titulo" class="col-sm-2 control-label">Titulo</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="titulo" placeholder="Titulo de Incidente" value="<?= @set_value('titulo')?>"><br />
			</div>

			<label class="col-sm-2 control-label" for="Usuario">Usuario</label>
			<div class="col-sm-10">			  
			  <input class="form-control" name="usuario" type="text" value="<?= $usuario; ?>" OnFocus="this.blur()"); ?><br />
			</div>

			<label class="col-sm-2 control-label" for="Departamento">Departamento de Origen</label>
			<div class="col-sm-10">			  
			  <input class="form-control" name="departamento" type="text" placeholder="<?= $departamento; ?>" OnFocus="this.blur()" value="<?= $departamento; ?>"><br />
			</div>

			<label for="Tipo" class="col-sm-2 control-label">Tipo</label>
			<div class="col-sm-10" style="height:60px">
		      <select name="tipo" style="height:39px;color:#000">
		        <option value="Hardware" <?php echo  set_select('tipo', 'Hardware', TRUE); ?> >Hardware</option>
		        <option value="Software" <?php echo  set_select('tipo', 'Software'); ?> >Software</option>
		        <option value="Desarrollo" <?php echo  set_select('tipo', 'Desarrollo'); ?> >Desarrollo</option>		       
		      </select><br />
		    </div>

		    <label for="Nivel" class="col-sm-2 control-label">Nivel</label>
		    <div class="col-sm-10">
		        <div class="radio">
		          <label>
		            <input type="radio" name="nivel" value="General" checked="" <?php echo  set_radio('nivel', 'General', TRUE); ?>>
		            General
		          </label>
		        </div>
		        <div class="radio">
		          <label>
		            <input type="radio" name="nivel" value="Especialista" <?php echo  set_radio('nivel', 'Especialista'); ?>>
		            Especialista
		          </label>
		        </div><br />
		    </div>

		    <label for="Prioridad" class="col-sm-2 control-label">Prioridad</label>
			<div class="col-sm-10" style="height:60px">		 
		      <select name="prioridad" style="height:39px;color:#000">
		        <option value="Alta" <?php echo  set_select('prioridad', 'Alta', TRUE); ?> >Alta</option>
		        <option value="Media" <?php echo  set_select('prioridad', 'Media'); ?> >Media</option>
		        <option value="Baja" <?php echo  set_select('prioridad', 'Baja'); ?> >Baja</option>
		      </select><br />
		    </div>

		    <label for="Descripcion" class="col-sm-2 control-label">Descripcion</label>
		    <div class="col-sm-10">
		    	<textarea class="form-control" rows="4" maxlength="2000" name="descripcion" placeholder="Descripcion del Incidente"><?php echo set_value('descripcion'); ?></textarea>
		        <span class="help-block">Descripcion del Incidente, sea los mas especifico posible.</span><br />
		    </div>

		    <?php $mysqltime = date ("Y-m-d H:i:s"); ?>

		    <label class="col-sm-2 control-label" for="F_ingreso">Fecha de Origen</label>
			<div class="col-sm-10">
			  <input class="form-control" name="f_ingreso" type="text" placeholder="<?= $departamento; ?>" value="<?= $mysqltime ?>" OnFocus="this.blur()"><br />
			</div>

			<div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <input type="submit" value="Crear" name="submit_reg_ticket" class="btn btn-primary">
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