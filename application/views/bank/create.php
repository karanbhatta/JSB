

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo $this->lang->line('manage'); ?>
      <small><?php echo $this->lang->line('bank'); ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $this->lang->line('home'); ?></a></li>
      <li class="active"><?php echo $this->lang->line('bank'); ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">

        <div id="messages"></div>

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
            <h3 class="box-title"><?php echo $this->lang->line('add bank statement'); ?></h3>
          </div>
          <!-- /.box-header -->
          <form role="form" action="<?php base_url('Bank/create') ?>" method="post" class="form-horizontal">
              <div class="box-body">

                <?php echo validation_errors(); ?>

                <div class="form-group">
                  <label for="gross_amount" class="col-sm-12 control-label"><?php echo $this->lang->line('date'); ?>: <?php date_default_timezone_set("Asia/Katmandu"); echo date('Y-m-d') ?></label>
                </div>
                <div class="form-group">
                  <label for="gross_amount" class="col-sm-12 control-label"><?php echo $this->lang->line('time'); ?>: <?php echo date('h:i a') ?></label>
                </div>

                <div class="col-md-4 col-xs-12 pull pull-left">
					 <div class="form-group">
                    <label for="gross_amount" class="col-sm-5 control-label" style="text-align:left;"><?php echo $this->lang->line('bank name'); ?></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Enter Bank Name" autocomplete="off" required="required" />
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="gross_amount" class="col-sm-5 control-label" style="text-align:left;"><?php echo $this->lang->line('check no'); ?></label>
                    <div class="col-sm-7">
                       <input type="text" class="form-control" id="cheque_no" name="cheque_no" placeholder="Enter Cheque Number" autocomplete="off">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="gross_amount" class="col-sm-5 control-label" style="text-align:left;"><?php echo $this->lang->line('cheque name'); ?></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="cheque_name" name="cheque_name" placeholder="Enter A/C holder  name" autocomplete="off">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="customer_email" class="col-sm-5 control-label" style="text-align:left;"><?php echo $this->lang->line('ac no'); ?></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="account_no" name="account_no" placeholder="Account Number" autocomplete="off">
                    </div>
                  </div>
                 
                </div>

                <div class="col-md-4 col-xs-12 pull pull-right">
 				<div class="form-group">
                    <label for="gross_amount" class="col-sm-5 control-label" style="text-align:left;"><?php echo $this->lang->line('amount'); ?></label>
                    <div class="col-sm-7">
                      <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter Amount" autocomplete="off" />
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="gross_amount" class="col-sm-5 control-label" style="text-align:left;"><?php echo $this->lang->line('deposited by'); ?></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="deposited_by" name="deposited_by" placeholder="Deposited By" autocomplete="off">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="gross_amount" class="col-sm-5 control-label" style="text-align:left;"><?php echo $this->lang->line('type'); ?></label>
                    <div class="col-sm-7">
                     <select type="text" class="form-control" id="transaction_type" name="transaction_type">
                        <option value="1">Deposit</option>
                        <option value="2">Withdraw</option>
                      </select>
                    </div>
                  </div>

                  
                 
                </div>

                <!--  -->
                <br /> <br/>
                
                <br /> <br/>

               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
             <!--    <input type="hidden" name="service_charge_rate"  autocomplete="off">
                <input type="hidden" name="vat_charge_rate"  autocomplete="off"> -->
                <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('add bank statement'); ?></button>
                <a href="<?php echo base_url('bank/') ?>" class="btn btn-warning"><?php echo $this->lang->line('back'); ?></a>
              </div>
            </form>
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
