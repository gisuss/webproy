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
	      <a class="navbar-brand" href="<?=base_url().'inicio'?>" title="Inicio"><b>GiSolutions</b></a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
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
	<?php if(isset($mensaje)):?>
		<h2>
			<span class="glyphicon glyphicon-thumbs-up" style="margin-left:15px"></span>&nbsp;<?= $mensaje; ?>
		</h2>
	<?php endif; ?>

	<script src="<?php base_url();?>/assets/js/jquery-1.10.2.min.js"></script>
    <script src="<?php base_url();?>/assets/js/bootstrap.min.js"></script>
    <script src="<?php base_url();?>/assets/js/custom.js"></script>
  	<script type="text/javascript">/* <![CDATA[ */(function(d,s,a,i,j,r,l,m,t){try{l=d.getElementsByTagName('a');t=d.createElement('textarea');for(i=0;l.length-i;i++){try{a=l[i].href;s=a.indexOf('/cdn-cgi/l/email-protection');m=a.length;if(a&&s>-1&&m>28){j=28+s;s='';if(j<m){r='0x'+a.substr(j,2)|0;for(j+=2;j<m&&a.charAt(j)!='X';j+=2)s+='%'+('0'+('0x'+a.substr(j,2)^r).toString(16)).slice(-2);j++;s=decodeURIComponent(s)+a.substr(j,m-j)}t.innerHTML=s.replace(/</g,'&lt;').replace(/>/g,'&gt;');l[i].href='mailto:'+t.value}}catch(e){}}}catch(e){}})(document);/* ]]> */</script>
</body>
</html>