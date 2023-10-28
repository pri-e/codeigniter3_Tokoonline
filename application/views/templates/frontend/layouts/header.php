<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>Pasar sapi Online Store</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pasar Sapi adalah Toko online terlengkap menyediakan Hewan ternakan, Alat Peternakan, Bibit Ternak, Obat ternak ">
    <meta name="author" content="Priyanta Nugraha" />
    
    

	
		<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="<?php echo base_url('assets/front/assets/css/bootstrap.min.css');?>" media="screen"/>
    <link href="<?php echo base_url('assets/front/assets/css/style.css');?>" rel="stylesheet" media="screen"/>
		<!-- Bootstrap style responsive -->	
		<link href="<?php echo base_url('assets/front/assets/css/bootstrap-responsive.min.css');?>" rel="stylesheet"/>
		<link href="<?php echo base_url('assets/front/assets/css/font-awesome.css');?>" rel="stylesheet" type="text/css">
		<!-- Google-code-prettify -->	
		<link href="<?php echo base_url('assets/front/assets/js/google-code-prettify/prettify.css');?>" rel="stylesheet"/>
		<!-- fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/front/assets/gambar/icon.ico');?>">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
		<style type="text/css" id="enject"></style>
  </head>
<body>
<div id="header">
<div class="container">
<div id="welcomeLine" class="row">
	<div class="span6">Selamat Datang!<strong> Pengguna</strong></div>
	<div class="span6">
	<div class="pull-right">
		
		<span class="btn btn-mini">Id</span>
		<a href="#"><span>Rp</span></a>
		<span class="btn btn-mini">Rp 1,3.j</span>
		<a href="#"><span class="">Rp</span></a>
		<a href="#"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [ 3 ] Barang Dalam Keranjang Belanja </span> </a> 
	</div>
	</div>
</div>
<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="<?php echo base_url()?>"><img src="<?php echo base_url('assets/front/assets/gambar/logo/logosapi.png')?>" alt="Pasar Sapi"/></a>
		<form class="form-inline navbar-search" method="post" action="index.php" >
		<input id="srchFld" class="srchTxt" type="text" />
		  <select class="srchTxt">
			<option>SEMUA</option>
			<option>TERNAK </option>
			<option>PELIHARAAN </option>
			<option>ALAT PETERNAKAN </option>
			<option>OBAT OBATAN </option>
		</select> 
		  <button type="submit" id="submitButton" class="btn btn-primary">Cari</button>
    </form>
    <ul id="topMenu" class="nav pull-right">
	 <li class=""><a href="#">Tawaran Khusus</a></li>
	 <li class=""><a href="#">Hubungi Kami</a></li>
	 <li class="">
	 <a href="<?php echo base_url()?>index.php/webmin" role="button"  style="padding-right:0"><span class="btn btn-md btn-primary">Login</span></a>
	<div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3>Login Pengguna</h3>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal loginFrm">
			  <div class="control-group">								
				<input type="text" id="inputEmail" placeholder="Email">
			  </div>
			  <div class="control-group">
				<input type="password" id="inputPassword" placeholder="Password">
			  </div>
			  <div class="control-group">
				<label class="checkbox">
				<input type="checkbox"> Ingatkan saya
				</label>
			  </div>
			</form>		
			<button type="submit" class="btn btn-primary">Sign in</button>
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		  </div>
	</div>
	</li>
    </ul>
  </div>
</div>
</div>
</div>
<!-- Header End====================================================================== -->