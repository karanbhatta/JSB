

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $this->lang->line('customer ledger'); ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $this->lang->line('home'); ?></a></li>
        <li class="active"><?php echo $this->lang->line('customer ledger'); ?></li>
      </ol>
    </section> 

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">

        <div class="col-md-12 col-xs-12"> 
             <form role="form" action="<?php echo base_url('Orders/getCustomerLedgerDetail') ?>" id="removeBrandForm">
        <div class="modal-body">
  <label for="sd">Start Date:</label>
  <input type="date" data-date-format="d-m-Y" id="sd" name="sd" required="required">
   <label for="ed">End Date:</label>
  <input type="date" id="ed"  name="ed" required="required">

 
</div> 
<div class="col-md-4">
<select class="form-control select_group product" data-row-id="row_1" id="customer_name" name="customer_name" style="width:100%;" required>
                            <option value="">Select Customer</option>
                            <?php foreach ($customer_data as $k => $v): ?>
                              <option value="<?php echo $v['id'] ?>"><?php echo $v['customer_name'] ?>
                              <small>, Address: <?php echo $v['customer_address'] ?></small><small>, Phone: <?php echo $v['customer_phone'] ?></small></option>
                            <?php endforeach ?>                          </select>
                          </div>
                            <input type="submit">        

       
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

          
          <!-- /.box -->
          
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
        $("#mainSalesNav").addClass('active');

      $("#manageLedgerNav").addClass('active');
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