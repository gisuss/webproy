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
	      <a class="navbar-brand" href="<?=base_url().'solicitante'?>" title="Inicio"><b>GiSolutions | <i>Solicitante</i></b></a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
		      <li>
		      	<a href="<?= base_url().'solicitante/new_ticket'?>"><span class="glyphicon glyphicon-plus"></span>&nbsp;<b>Generar Ticket</b></a>
		      </li>
		      <form class="navbar-form navbar-left" role="search" action="<?=base_url().'solicitante/very_search'?>" method="POST">
		        <div class="form-group">
		          <input type="text" class="form-control" name="numero" placeholder="Consultar Ticket">
		        </div>
		        <button type="submit" name="search_ticket" class="btn btn-default" value="Buscar">Buscar</button>
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
				<span class="glyphicon glyphicon-thumbs-up" style="margin-left:15px"></span>&nbsp;<?= $mensaje; ?>
			</h2>
		<?php endif; ?>
	</div>

	<h1>Hola desde la vista de Solicitante</h1>

	<script src="<?php base_url();?>/assets/js/jquery-1.10.2.min.js"></script>
    <script src="<?php base_url();?>/assets/js/bootstrap.min.js"></script>
    <script src="<?php base_url();?>/assets/js/custom.js"></script>
  	<script type="text/javascript">/* <![CDATA[ */(function(d,s,a,i,j,r,l,m,t){try{l=d.getElementsByTagName('a');t=d.createElement('textarea');for(i=0;l.length-i;i++){try{a=l[i].href;s=a.indexOf('/cdn-cgi/l/email-protection');m=a.length;if(a&&s>-1&&m>28){j=28+s;s='';if(j<m){r='0x'+a.substr(j,2)|0;for(j+=2;j<m&&a.charAt(j)!='X';j+=2)s+='%'+('0'+('0x'+a.substr(j,2)^r).toString(16)).slice(-2);j++;s=decodeURIComponent(s)+a.substr(j,m-j)}t.innerHTML=s.replace(/</g,'&lt;').replace(/>/g,'&gt;');l[i].href='mailto:'+t.value}}catch(e){}}}catch(e){}})(document);/* ]]> */</script>
	
</body>
</html>