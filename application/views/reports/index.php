

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $this->lang->line('reports'); ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $this->lang->line('home'); ?></a></li>
        <li class="active"><?php echo $this->lang->line('reports'); ?></li>
      </ol>
    </section> 

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">

        <div class="col-md-12 col-xs-12"> 
          <form class="form-inline" action="<?php echo base_url('reports/') ?>" method="POST">
            <div class="form-group">
              <label for="date"><?php echo $this->lang->line('year'); ?></label>
              <select class="form-control" name="select_year" id="select_year">
                <?php foreach ($report_years as $key => $value): ?>
                  <option value="<?php echo $value ?>" <?php if($value == $selected_year) { echo "selected"; } ?>><?php echo $value; ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <button type="submit" class="btn btn-default"><?php echo $this->lang->line('submit'); ?></button>
          </form>
        </div>

        <br /> <br />
 

        <div class="col-md-12 col-xs-12">

          <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php elseif($this->session->flashdata('error')): ?>
            <div class="alert alert-error alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('error'); ?>
            </div>
          <?php endif; ?>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pie Chart - Report</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="chart">
            <div id="pie_chart" style="width: 900px; height: 500px; margin: 0 auto"></div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo $this->lang->line('total orders report'); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatables" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><?php echo $this->lang->line('bill number'); ?></th>
                  <th><?php echo $this->lang->line('gross amount'); ?></th>
                  <th><?php echo $this->lang->line('service charge'); ?></th>
                  <th><?php echo $this->lang->line('vat charge'); ?></th>
                  <th><?php echo $this->lang->line('discount'); ?></th>
                  <th><?php echo $this->lang->line('net amount'); ?></th>
                  <th><?php echo $this->lang->line('paid amount'); ?></th>
                  <th><?php echo $this->lang->line('due amount'); ?></th>
                </tr>
                </thead>
                <tbody>
        <?php if($results): ?>  
                  <?php foreach ($results as $data): ?>
                    <tr>
                      <td><?php echo $data['bill_no']; ?></td>
                      <td><?php echo $data['gross_amount']; ?></td>
                      <td><?php echo $data['service_charge']; ?></td>
                      <td><?php echo $data['vat_charge']; ?></td>
                      <td><?php echo $data['discount']; ?></td>
                      <td><?php echo $data['net_amount']; ?></td>
                      <td><?php echo $data['paid_amount']; ?></td>
                      <td><?php echo $data['due_amount']; ?></td>
                    </tr>
                  <?php endforeach ?>
                  
                </tbody>
                <tbody>
                

                                    <?php endif; ?>

                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">

    $(document).ready(function() {
      $("#reportNav").addClass('active');
    }); 
</script>
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
  <script type="text/javascript">
      google.charts.load('visualization', "1", {
          packages: ['corechart']
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
             foreach ($results as $row){
             echo "['".$row['bill_no']."',".$row['net_amount']."],";
             }
             ?>
        ]);
        var options = {
            title: 'Transactions',
            is3D: true,
        };
        /* Instantiate and draw the chart.*/
        var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
        chart.draw(data, options);
  } 
</script>