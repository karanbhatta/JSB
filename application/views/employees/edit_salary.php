

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo $this->lang->line('manage'); ?>
      <small><?php echo $this->lang->line('employee'); ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $this->lang->line('home'); ?></a></li>
      <li class="active"><?php echo $this->lang->line('employee'); ?></li><li class="active"><?php echo $this->lang->line('salary'); ?></li>
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
            <h3 class="box-title"><?php echo $this->lang->line('add salary'); ?></h3>
          </div>
          <!-- /.box-header -->
          <form role="form" action="<?php base_url('employees/updateSalary') ?>" method="post" class="form-horizontal">
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
                  <label for="brands" class="col-sm-5 control-label" style="text-align:left;"><?php echo $this->lang->line('employee'); ?></label>
                  
                  <select class="form-control select_group" id="employee_id" name="employee_id"  onchange="myFunction()">
                    <?php foreach ($emp as $k => $v): ?>
                      <option value="<?php echo $v['id'] ?>" id="<?php echo $v['id'] ?>" 
                    <?php if($employees['employee']['e_id'] == $v['id']) { echo "selected='selected'"; } ?>
                        ><?php echo $v['name'] ?>
                     </option>
                    <?php endforeach ?>

                  </select>
                  <!-- <input type="text" name="sid" id="sid" hidden> -->
                </div>

                 

                  <div class="form-group">
                    <label for="gross_amount" class="col-sm-5 control-label" style="text-align:left;"><?php echo $this->lang->line('salary'); ?></label>
                    <div class="col-sm-7">
                      <input type="number" class="form-control" id="salary" name="salary" placeholder="Enter Salary Amount" autocomplete="off" value="<?php echo $employees['employee']['salary'] ?>">
                    </div>
                  </div> 
                    <div class="form-group">
                    <label for="gross_amount" class="col-sm-5 control-label" style="text-align:left;"><?php echo $this->lang->line('bonus'); ?></label>
                    <div class="col-sm-7">
                      <input type="number" class="form-control" id="bonus" name="bonus" placeholder="Enter Bonus Amount" autocomplete="off" value="<?php echo $employees['employee']['bonus'] ?>">
                    </div>
                  </div> 

 <div class="form-group">
  <label for="from_date">From Date:</label>
  <input type="date" data-date-format="d-m-Y" id="from_date" name="from_date" required="required" value="<?php echo isset($employees['employee']['from_date']) ? set_value('from_date', date('Y-m-d', ($employees['employee']['from_date']))) : set_value('from_date'); ?>">
   

                  </div> 
 <div class="form-group">
 
                  <label for="to_date">To Date:</label>
  <input type="date" id="to_date" name="to_date" required="required" value="<?php echo isset($employees['employee']['to_date']) ? set_value('to_date', date('Y-m-d', ($employees['employee']['to_date']))) : set_value('to_date'); ?>">
                  
                    </div> 
                
                </div>




                </div>
                

            
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                
                <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('create salary'); ?></button>
                <a href="<?php echo base_url('employees/manageSalary') ?>" class="btn btn-warning"><?php echo $this->lang->line('back'); ?></a>
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

<script type="text/javascript">
 
  var base_url = "<?php echo base_url(); ?>";

  $(document).ready(function() {





    $(".select_group").select2();
    // $("#description").wysihtml5();

    $("#mainEmployeeNav").addClass('active');
    $("#createSalaryNav").addClass('active');
  });
    
</script>