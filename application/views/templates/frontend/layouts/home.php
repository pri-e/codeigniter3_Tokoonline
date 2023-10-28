<div id="carouselBlk">
	<div id="myCarousel" class="carousel slide">
		<div class="carousel-inner">

		  <div class="item active">
		  <div class="container">
			<a href="#"><img style="width:100%" src="<?php echo base_url('assets/front/assets/gambar/produk/carousel/sapi_1.png')?>" alt="special offers"/></a>
			<div class="carousel-caption">
				  <h4>Second Thumbnail label</h4>
				  <p></p>
				</div>
		  </div>
		  </div>
		  <?php foreach ($carusel as $k) { ?>
		  <div class="item">
			  <div class="container">
				<a href="#"><img style="width:100%" src="<?php echo base_url('assets/image/slideshow/')?><?php echo $k->image?>" alt=""/></a>
					<div class="carousel-caption">
					  <h4>Second Thumbnail label</h4>
					  <p></p>
					</div>
			  </div>
		  </div>


		  <?php }?>
		  

		  
		</div>
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
	  </div> 
</div>
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3">
		<div class="well well-small"><a id="myCart" href="product_summary.html"><img src="<?php echo base_url('assets/front/assets/gambar/ico-cart.png')?>" alt="cart">3 Items di keranjang<span class="badge badge-warning pull-right">Rp 1,3.jt</span></a></div>
		<?php 
			echo $sidebar ;

		?>

		

		<br/>

		<div class="thumbnail">
			<div>
				<div class="pembayaran">
					<a href=""><img width="100" height="30" src="<?php echo base_url('assets/front/assets/gambar/pembayaran/sbca.png')?>" title="bca" alt="bca"/></a>
					<a href=""><img width="100" height="30" src="<?php echo base_url('assets/front/assets/gambar/pembayaran/sbni.png')?>" title="bni" alt="bni"/></a>
				</div>
				<div class="pembayaran">
					<a href=""><img width="100" height="30" src="<?php echo base_url('assets/front/assets/gambar/pembayaran/smandiri.png')?>" title="mandiri" alt="mandiri"/></a>
					<a href=""><img width="100" height="30" src="<?php echo base_url('assets/front/assets/gambar/pembayaran/sbri.png')?>" title="bri" alt="bri"/></a>
				</div>
			</div>
			
			
			<div class="caption">
			  <h5>Methode Pembayaran</h5>
			</div>
		  </div>
		  
	</div>
<!-- Sidebar end=============================================== -->

		<div class="span9">		
			<div class="well well-small">
			<h4>Produk Unggulan <small class="pull-right">200+ produk unggulan</small></h4>
			<div class="row-fluid">
			<div id="featured" class="carousel slide">
				<div class="carousel-inner">

					  	<div class="item active">
					  		<?php foreach ($unggulan as $u) {?>
						  	<ul class="thumbnails">
								<li class="span3">
								  <div class="thumbnail">
								  <i class="tag"></i>
									<a href=""><img src="<?php echo base_url('assets/image/product/')?><?php echo $u->image ?>" alt=""></a>
									<div class="caption">
									  <h5><?php echo $u->nama_product ?></h5>
									  <h5><a class="btn" href="">VIEW</a> <span class="pull-right">Rp <?php echo $u->harga ?></span></h5>
									</div>
								  </div>
								</li>
								<?php } ?>
						  	</ul>
									
					  	</div>

					  	<div class="item">
						  	<?php foreach ($unggulan as $u) {?>
						  	<ul class="thumbnails">
								<li class="span3">
								  <div class="thumbnail">
								  <i class="tag"></i>
									<a href=""><img src="<?php echo base_url('assets/image/product/')?><?php echo $u->image ?>" alt=""></a>
									<div class="caption">
									  <h5><?php echo $u->nama_product ?></h5>
									  <h5><a class="btn" href="">VIEW</a> <span class="pull-right">Rp <?php echo $u->harga ?></span></h5>
									</div>
								  </div>
								</li>
								<?php } ?>
						  	</ul>
					  	</div>

				  </div>
				  <a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
				  <a class="right carousel-control" href="#featured" data-slide="next">›</a>
				  </div>
				</div>
		</div>
		<h4>Latest Products </h4>
			
			<ul class="thumbnails">
				<?php foreach ($product as $p) { ?>
				<li class="span3">
				  <div class="thumbnail">
					<a  href=""><img src="<?php echo base_url('assets/image/product/')?><?php echo $p->image?>" alt=""/></a>
					<div class="caption">
					  <h5><?php echo $p->nama_product ?></h5>
					  <p> 
						<?php echo $p->diskripsi ?>. 
					  </p>
					  <div style="text-align:center" style="font-size: 5px" >
					  	<a class="btn btn-xs" href="#">
					  		<i class="icon-zoom-in"></i></a> <a class="btn btn-xs" href="#">Beli<i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">Rp <?php echo $p->harga ?></a>
					  </div>
					</div>
				  </div>
				</li>
				<?php } ?>
			</ul>	
			
		</div>
		</div>
	</div>
</div>