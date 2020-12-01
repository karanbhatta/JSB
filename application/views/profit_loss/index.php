 
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

        <div class="row">
            <!-- small box -->
           <div class="col-md-12 col-xs-12"> 
             <form role="form" method="POST" action="<?php echo base_url('ProfitLoss/') ?>" id="removeBrandForm">
        <div class="modal-body">
  <label for="sd">Start Date:</label>
  <input type="date" data-date-format="d-m-Y" id="sd" name="sd" required="required">
   <label for="ed">End Date:</label>
  <input type="date" id="ed"  name="ed" required="required">

                             <input type="submit">        

</div> 


       
      </form>
        </div>
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
          
        </div>
        <!-- /.row -->





    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
