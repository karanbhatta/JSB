 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $this->lang->line('dashboard'); ?>
        <small><?php echo $this->lang->line('control panel'); ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $this->lang->line('home'); ?></a></li>
        <li class="active"><?php echo $this->lang->line('dashboard'); ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="background-color: #fff;">
      <!-- Small boxes (Stat box) -->
      <?php if($is_admin == true): ?>

        <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3><?php echo $total_products ?></h3>

                <p><?php echo $this->lang->line('total products'); ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url('products/') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3><?php echo $total_paid_orders ?></h3>

                <p><?php echo $this->lang->line('total paid orders'); ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo base_url('orders/') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3><?php echo $total_users; ?></h3>

                <p><?php echo $this->lang->line('total users'); ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-android-people"></i>
              </div>
              <a href="<?php echo base_url('users/') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3 ><?php echo $total_stores ?></h3>

                <p><?php echo $this->lang->line('total stores'); ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-android-home"></i>
              </div>
              <a href="<?php echo base_url('stores/') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- total sale -->
          <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>NPR.<?php echo $total_sale['net_amount']+$total_walk_sale['net_amount'] ?></h3>

                <p><?php echo $this->lang->line('total sale'); ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-android-home"></i>
              </div>
              <a href="<?php echo base_url('ProfitLoss/') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

<!-- total purchase -->
          <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-blue">
              <div class="inner">
                <h3>NPR.<?php echo $total_purchase['net_amount'] ?></h3>

                <p><?php echo $this->lang->line('total purchase'); ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-android-home"></i>
              </div>
              <a href="<?php echo base_url('ProfitLoss/') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

<!-- profit/loss -->

          <div class="col-lg-4 col-xs-6">
            <!-- small box -->

            <div  class="<?php echo ((($total_sale['net_amount']+$total_walk_sale['net_amount'])-$total_purchase['net_amount']) < 0 ? 'small-box bg-red' : 'small-box bg-green'); ?>">
              <div class="inner">
                <h3>NPR.<?php echo ($total_sale['net_amount']+$total_walk_sale['net_amount'])-$total_purchase['net_amount'] ?></h3>

                <p><?php echo $this->lang->line('total pl'); ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-android-home"></i>
              </div>
              <a href="<?php echo base_url('ProfitLoss/') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>

          </div>
          <div class="col-lg-3 col-xs-6"></div>
<div class="col-lg-6 col-xs-6">
            <!-- small box -->

            <div  class="small-box bg-green">
              <div class="inner">
                <h3><?php echo $this->lang->line('wcs'); ?></h3>

              </div>
              <div class="icon">
                <i class="ion ion-android-home"></i>
              </div>
              <a href="<?php echo base_url('WalkSale/') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>

          </div>
        </div>
        <!-- /.row -->


      <?php endif; ?>

            <div id="pie_chart" style="width: 900px; height: 500px; margin: 0 auto"></div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
  <script type="text/javascript">
      google.charts.load('visualization', "1", {
          packages: ['corechart']
      });
  </script>

  <script type="text/javascript">
      $(document).ready(function() {
        $(".status").each(function(){
            var value = parseInt ( $( this).html() );
            if (value < 0){
                // this will change the color of font 
                $(this).css('color', 'green');
            }
        });
    });
  </script>

<script language="JavaScript">
  // Draw the Pie chart 
  google.charts.setOnLoadCallback(pieChart);   
  //for month wise
  function pieChart() {
 
        /* Define the chart to be drawn.*/
        var data = google.visualization.arrayToDataTable([
            ['Product', 'Amount'],
            <?php 
             foreach ($chart_data as $row){
             echo "['".$row['name']."',".$row['amount']."],";
             }
             ?>
        ]);
        var options = {
            title: 'Overall Sale',
            is3D: true,
        };
        /* Instantiate and draw the chart.*/
        var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
        chart.draw(data, options);
  } 
</script>

  <script type="text/javascript">
    $(document).ready(function() {
      $("#dashboardMainMenu").addClass('active');
    }); 
  </script>
