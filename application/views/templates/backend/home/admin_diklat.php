<script src="<?php echo base_url('assets/plugins/highcharts/code/highcharts.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/highcharts/code/modules/exporting.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/highcharts/code/modules/export-data.js');?>"></script>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>        
        <small><b><?php echo $title; ?></b></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Dashboard</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p>Mahasiswa Praktek</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-md"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $jumlahci;?> <sup style="font-size: 20px"> CIs</sup></h3>

              <p>Clinical instructors</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
      </div>

      <div class="box box-success ">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-server"></i> <?php echo $title2 ?></h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12" style="word-wrap:break-word;">
                    <div class="row">
                      <div class="col-md-6 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-blue">
                          <div class="inner">
                            <h3><sup style="font-size: 20px"><?php echo'Jumlah Mahasiswa' ?></sup></h3>

                            <p>Total <?php echo $jumlah_mahasiswa?></p>
                          </div>
                          <div class="icon">
                            <i class="fa fa-user-md"></i>
                          </div>
                          <a href="<?php echo base_url('diklat');?>" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div>

                      <div class="col-md-6 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                          <div class="inner">
                            <h3><sup style="font-size: 20px"><?php echo 'Jumlah Kegiatan Diklat' ?></sup></h3>

                            <p>Jumlah <?php echo $jumlah_keg?> kegiatan Diklat</p>
                          </div>
                          <div class="icon">
                            <i class="fa fa-file-text"></i>
                          </div>
                          <a href="<?php echo base_url('diklat');?>" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div>                  
                       
                    </div>
                </div>
            </div>
        </div>
      </div>


      


      <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-line-chart"></i> <?php echo $title3 ?></h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
               <div class="col-md-12" style="word-wrap:break-word;">
                  <div id="container1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                  <script type="text/javascript">
                    $(document).ready(function(){
                      $('#print_chart').click(function () {
                            chart.print();
                        }); 
                      var th = '<?php echo date("Y") ;?>';
                      var options = {
                          chart: {
                            renderTo: 'container1' ,
                            type: 'column'                                            
                          },                              
                          title: {
                                text: 'Jumlah Mahasiswa per Bulan'
                          },
                          subtitle: {
                              text: th
                          },
                          xAxis: {
                              type: 'category'
                          },
                          yAxis: {
                            title: {
                                text: 'Jumlah Mahasiswa per bulan'
                            }
                          },
                          legend: {
                              enabled: false
                          },
                          plotOptions: {
                              series: {
                                  borderWidth: 0,
                                  dataLabels: {
                                      enabled: true,
                                      format: '{point.y:.f} Mahasiswa'
                                  }
                              }
                          },
                          tooltip: {
                              headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                              pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.f}  Mahasiswa</b>.!<br/>'
                          },
                          series: [{
                            name: 'Jumlah Mahasiswa per bulan',
                            colorByPoint: true,
                            data:[{}]
                          }],                              
                      };
                      $.getJSON("<?php echo $base_url; ?>/home/mahasiswabulan_json", function(json) {
                        options.series[0].data = json;
                        var chart = new Highcharts.Chart(options);                                                        
                      });
                    });
                  </script>
                </div>
            </div>
        </div>
      </div>

      <div class="row">
          <div class="col-md-12" style="word-wrap:break-word;">
              <div class="row">
                <div class="col-sm-6 col-xs-6">
                  <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-line-chart"></i> <?php echo $title2 ?></h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">

                        <div id="container2" style="height: 400px"></div>


                        <script type="text/javascript">
                          Highcharts.setOptions({
                              colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
                                  return {
                                      radialGradient: {
                                          cx: 0.5,
                                          cy: 0.3,
                                          r: 0.7
                                      },
                                      stops: [
                                          [0, color],
                                          [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
                                      ]
                                  };
                              })
                          });

                          Highcharts.chart('container2', {
                              chart: {
                                  type: 'pie',
                                  options3d: {
                                      enabled: true,
                                      alpha: 45,
                                      beta: 0
                                  }
                              },
                              title: {
                                  text: 'Prosentase jenis Diklat'
                              },
                              tooltip: {
                                  pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                              },
                              plotOptions: {
                                  pie: {
                                      allowPointSelect: true,
                                      cursor: 'pointer',
                                      depth: 35,
                                      dataLabels: {
                                          enabled: true,
                                          format: '{point.name}'
                                      }
                                  }
                              },
                              series: [{
                                  type: 'pie',
                                  name: 'Jenis Diklat',
                                  data: [
                                      ['Keperawatan', 45.24],
                                      ['Kedokteran', 3.27],
                                      {
                                          name: 'Kesehatan lain',
                                          y: 42.58,
                                          sliced: true,
                                          selected: true
                                      },
                                      ['Umum (Non Tenaga Kesehatan)', 8.91],
                                     
                                  ]
                              }]
                          });
                        </script>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-6">
                  <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-line-chart"></i> <?php echo $title2 ?></h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">

                        <div id="container3" style="height: 400px"></div>


                        <script type="text/javascript">

                              Highcharts.chart('container3', {
                                  chart: {
                                      type: 'pie',
                                      options3d: {
                                          enabled: true,
                                          alpha: 45,
                                          beta: 0
                                      }
                                  },
                                  title: {
                                      text: 'Jenis Layanan Diklat'
                                  },
                                  tooltip: {
                                      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                                  },
                                  plotOptions: {
                                      pie: {
                                          allowPointSelect: true,
                                          cursor: 'pointer',
                                          depth: 35,
                                          dataLabels: {
                                              enabled: true,
                                              format: '{point.name}'
                                          }
                                      }
                                  },
                                  series: [{
                                      type: 'pie',
                                      name: 'Jenis Layanan Diklat',
                                      data: [
                                          ['Penelitian / Pra Penelitian / Survey', 37.05],
                                          ['Praktek Klinik', 33.24],
                                          {
                                              name: 'Kunjungan Sehari (Per-Orang)',
                                              y: 21.45,
                                              sliced: true,
                                              selected: true
                                          },
                                          ['Orientasi (Pra Klinik) Per Orang', 4.50],
                                          ['Wawancara / Observasi ( Per orang per Kali )', 3.59],
                                          ['Magang / On Job Training', 0.17],
                                      ]
                                  }]
                              });
                        </script>
                    </div>
                  </div>
                </div>
                                 
                 
              </div>
          </div>
      </div>




    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->