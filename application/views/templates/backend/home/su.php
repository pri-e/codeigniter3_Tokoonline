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
              <h3>176</h3>

              <p>Item Terjual Hari ini</p>
            </div>
            <div class="icon">
              <i class="fa fa-credit-card-alt"></i>
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
              <h3><?php// echo $jumlahci;?> <sup style="font-size: 20px"> 5000</sup></h3>

              <p>Unique Visitors</p>
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
              <h3>440</h3>

              <p>Registered User</p>
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

              <p>Item Terkirim</p>
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
              <div class="col-sm-12">
                <figure class="highcharts-figure">
                    <div id="container"></div>
                    <p class="highcharts-description">
                        
                    </p>
                </figure>
                <script type="text/javascript">
                  
                  Highcharts.chart('container', {
                      chart: {
                          type: 'column'
                      },
                      title: {
                          text: 'Transaksi Penjualan'
                      },
                      subtitle: {
                          text: 'Source: Pasarsapi.com'
                      },
                      xAxis: {
                          categories: [
                              'Jan',
                              'Feb',
                              'Mar',
                              'Apr',
                              'May',
                              'Jun',
                              'Jul',
                              'Aug',
                              'Sep',
                              'Oct',
                              'Nov',
                              'Dec'
                          ],
                          crosshair: true
                      },
                      yAxis: {
                          min: 0,
                          title: {
                              text: 'Transaksi'
                          }
                      },
                      tooltip: {
                          headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                          pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                              '<td style="padding:0"><b>{point.y:.1f} transaksi</b></td></tr>',
                          footerFormat: '</table>',
                          shared: true,
                          useHTML: true
                      },
                      plotOptions: {
                          column: {
                              pointPadding: 0.2,
                              borderWidth: 0
                          }
                      },
                      series: [{
                          name: 'Penjualan',
                          data: [49.0, 71.0, 106.0, 129.0, 144.0, 176.0, 0, 0, 0, 0,0,0]

                      }]
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
                                  text: 'Prosentase Kategori Terjual'
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
                                  name: 'Kategori Barang',
                                  data: [
                                      ['Alat Peternakan', 45.24],
                                      ['Ternak', 3.27],
                                      {
                                          name: 'Obat-Obatan',
                                          y: 42.58,
                                          sliced: true,
                                          selected: true
                                      },
                                      ['Pakan Ternak', 8.91],
                                     
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
                        <h3 class="box-title"><i class="fa fa-line-chart"></i> Grafik Penjualan Per Provinsi</h3>
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
                                      text: 'Grafik Penjualan Per Provinsi'
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
                                      name: 'Grafik Penjualan Per Provinsi',
                                      data: [
                                          ['Jawa tengah', 37.05],
                                          ['Jawa Timur', 33.24],
                                          {
                                              name: 'Yogyakarta',
                                              y: 21.45,
                                              sliced: true,
                                              selected: true
                                          },
                                          [' Kalimantan Selatan', 4.50],
                                          ['DKI Jakarta', 3.59],
                                          ['Jawa Barat', 0.17],
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