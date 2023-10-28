<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>        
        <small><b><?php echo $title; ?></b></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#"><?php echo $title; ?></a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php foreach ($dp as $d) {?>
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-success">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets/image/pengguna/'); ?><?php echo $d->image ;?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $d->nama_pengguna ;?></h3>

              <p class="text-muted text-center"><?php echo $d->alamat ;?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Nama</b> <a class="pull-right"><?php echo $d->nama_pengguna ;?></a>
                </li>
                <li class="list-group-item">
                  <b>Alamat</b> <a class="pull-right"><?php echo $d->alamat ;?></a>
                </li>
                <li class="list-group-item">
                  <b>Kontak</b> <a class="pull-right"><?php echo $d->hp ;?></a>
                </li>
              </ul>

              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Nama</strong>

              <p class="text-muted">
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Alamat</strong>

              <p class="text-muted"></p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Kontak</strong>

              <p>
                <span class="label label-danger"></span>
                <span class="label label-success"></span>
                <span class="label label-info"></span>
                <span class="label label-warning"></span>
                <span class="label label-primary"></span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p></p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom tab-success">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#settings" data-toggle="tab">User Settings</a></li>
              <li><a href="#activity" data-toggle="tab">Activity</a></li>
              <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
              
            </ul>
            <div class="tab-content">

              <div class="active tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputuser" class="col-sm-2 control-label">User Name</label>

                    <div class="col-sm-10">
                      <input readonly value="<?php echo $d->pengguna?>" type="text" class="form-control" id="inputuser">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputpass" class="col-sm-2 control-label">Password</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="inputpass" id="inputpass">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputnama" class="col-sm-2 control-label">Nama</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="inputnama" id="inputnama" value="<?php echo $d->nama_pengguna?>" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputemail" class="col-sm-2 control-label" value="">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="inputemail" id="inputemail" placeholder="Email" value="<?php echo $d->email?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="image" class="col-sm-2 control-label">Fotho</label>

                     <?php if(!empty($d->image)){ ?>
                      <div class="col-sm-2">
                        <img src="<?php echo base_url('/assets/image/pengguna/'); ?><?php echo $d->image?>" alt="..." class="img-thumbnail rounded float-left" style="width:100px;height:100px">
                      </div>
                      <div class="col-sm-5"> 
                        <input type="file" class="form-control-file" id="fotho" name="fotho" placeholder="">
                      </div>
                      <?php }else{?>
                      <div class="col-sm-9"> 
                        <input type="file" class="form-control-file" id="fotho" name="fotho" placeholder="">
                      </div>
                      <?php }?>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <div class="col-sm-12">
                        Biarkan Passsword Kosong jika Tak Ingin diubah
                      </div>
                    </div>
                  </div>
                 
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Simpan</button>
                    </div>
                  </div>
                </form>
              </div>
              <div class=" tab-pane" id="activity">
                <!-- Post -->
                
                <!-- /.post -->

                <!-- Post -->
                
                <!-- /.post -->

                <!-- Post -->
                
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                
              </div>
              <!-- /.tab-pane -->

              
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <?php }?>
           
      

      
      
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->