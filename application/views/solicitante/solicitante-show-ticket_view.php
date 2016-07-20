<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $titulo1; ?></title>
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
	      <ul class="nav navbar-nav">
		      <li>
		      	<a href="<?= base_url().'solicitante/new_ticket'?>"><span class="glyphicon glyphicon-plus"></span>&nbsp;<b>Generar Ticket</b></a>
		      </li>
		      <form class="navbar-form navbar-left" role="search">
		        <div class="form-group">
		          <input type="text" class="form-control" placeholder="Consultar Ticket">
		        </div>
		        <button type="submit" name="search-ticket" class="btn btn-default">Buscar</button>
		      </form>
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
		<?php if(isset($mensaje)):?>
			<h2>
				<span class="glyphicon glyphicon-thumbs-up" style="margin-left:15px"></span>&nbsp;<?= $mensaje, $numero; ?>
			</h2>
		<?php endif; ?>

		<h1><span class="glyphicon glyphicon-pencil" style="margin-left:15px"></span>&nbsp;Informacion sobre el Incidente Nro: <b><i><?= $numero; ?></i></b></h1>

		<form class="form-horizontal">
			<label class="col-sm-2 control-label">Numero de Incidente</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="numero" OnFocus="this.blur()" value="<?= $id; ?>"><br />
			</div>

			<label class="col-sm-2 control-label">Usuario</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="titular" OnFocus="this.blur()" value="<?= $titular; ?>"><br />
			</div>

			<label class="col-sm-2 control-label">Tipo de Incidente</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="tipo" OnFocus="this.blur()" value="<?= $tipo; ?>"><br />
			</div>

			<label class="col-sm-2 control-label">Nivel de Incidente</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="nivel" OnFocus="this.blur()" value="<?= $nivel; ?>"><br />
			</div>

			<label class="col-sm-2 control-label">Prioridad</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="prioridad" OnFocus="this.blur()" value="<?= $prioridad; ?>"><br />
			</div>

			<label class="col-sm-2 control-label">Fecha de Entrada</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="f_ingreso" OnFocus="this.blur()" value="<?= $f_ingreso; ?>"><br />
			</div>

			<label class="col-sm-2 control-label">Fecha de Cierre</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="f_cierre" OnFocus="this.blur()" value="<?= $f_cierre; ?>"><br />
			</div>

			<label class="col-sm-2 control-label">Departamento de Origen</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="origen" OnFocus="this.blur()" value="<?= $origen; ?>"><br />
			</div>

			<?php if($t_requerido != NULL):?>
				<label class="col-sm-2 control-label">Tiempo Requerido Para Solucion</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="t_requerido" OnFocus="this.blur()" value="<?= $t_requerido; ?>"><br />
				</div>
			<?php endif; ?>

			<label class="col-sm-2 control-label">Descripcion del Incidente</label>
			<div class="col-sm-10">
				<textarea type="text" rows="4" class="form-control" name="descripcion" OnFocus="this.blur()"><?= $descripcion; ?></textarea><br />
			</div>

			<?php if($observaciones != NULL):?>
				<label class="col-sm-2 control-label">Observaciones por Parte del Experto</label>
				<div class="col-sm-10">
					<textarea type="text" rows="4" class="form-control" name="observaciones" OnFocus="this.blur()"><?= $observaciones; ?></textarea><br />
				</div>
			<?php endif; ?>

			<?php if($solucion != NULL):?>
				<label class="col-sm-2 control-label">Solucion</label>
				<div class="col-sm-10">
					<textarea type="text" rows="4" class="form-control" name="solucion" OnFocus="this.blur()"><?= $solucion; ?></textarea><br />
				</div>
			<?php endif; ?>
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