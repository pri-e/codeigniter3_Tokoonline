<!-- CSS JS -->
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/data.js"></script>
  <script src="https://code.highcharts.com/modules/drilldown.js"></script>
<!-- CSS JS end-->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>        
        <small><b>Dashboard <?php echo $title1; ?></b></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Dashboard</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php foreach ($klaim_blnini as $kbln) { ?>
      
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-wheelchair" ></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jumlah Kunjungan<br> Bulan <?php echo $kbln['name']?></span>
              <span class="info-box-number"><?php echo $kbln['totalrajal']?><small></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-medkit"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Pasien Jaminan <br> Bulan <?php echo $kbln['name']?></span>
              <span class="info-box-number"><?php echo $kbln['ttljaminan']?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-internet-explorer"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Klaim Kunjungan<br> Bulan <?php echo $kbln['name']?> terkirim <br>DC Kemenkes</span>
              <span class="info-box-number"><?php echo $kbln['jumlah_terkirimdc']?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-file"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Berkas<br> Jaminan Bulan <?php echo $kbln['name']?></span>
              <span class="info-box-number"><?php echo $kbln['berkas']?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <!-- /.col -->
      </div>
      <!-- /.row -->
      <?php }?>
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Grafik Pasien</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          
          <div class="row">
            <div class="col-sm-12 text-center">
              <b><?php ;?></b>
            </div>
            <div class="col-sm-12" id="printableArea">
              <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>            
            </div>
          </div>


          <div class="row">
            <div class="col-sm-12 text-center">
              <b><?php ;?></b>
            </div>
            <div class="col-sm-12" id="printableArea1">
              <div id="container1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>          
            </div>
          </div>      
          
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          ;)
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

      
      
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
  function printDiv(divName) {
      var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
  }

  $(document).ready(function(){
    $('#print_chart').click(function () {
          chart.print();
      }); 
    var th = '2018';
    var options = {
        chart: {
          renderTo: 'container' ,
          type: 'column'                                            
        },                              
        title: {
              text: 'Jumlah ter klaim per bulan Rawat jalan'
        },
        subtitle: {
            text: th
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
          title: {
              text: 'Jumlah ter klaim per bulan'
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
                    format: '{point.y:.f} Klaim'
                }
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.f}  klaim</b>.!<br/>'
        },
        series: [{
          name: 'Jumlah ter klaim per bulan',
          colorByPoint: true,
          data:[{}]
        }],                              
        
    };
    $.getJSON("<?php echo $base_url; ?>index.php/home/json_klaim", function(json) {
      options.series[0].data = json;
      var chart = new Highcharts.Chart(options);                                                        
    });
  });
</script>
