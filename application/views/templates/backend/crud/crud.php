<?php if(@$crud->css_files):foreach($crud->css_files as $file): ?>
  <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />

  


<?php endforeach; ?>
<?php endif;?>

<?php if(@$crud->js_files):foreach($crud->js_files as $file): ?>
  <script src="<?php echo $file; ?>"></script>

   

<?php endforeach; ?>
<?php endif;?>  

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <?php echo $subjek?>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('index.php/home');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><?php echo $subjek?></a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          
        </div>
        <div class="box-body">
          <div>
            <?php echo @$crud->output; ?>
          </div>
       
          
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->      
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->






