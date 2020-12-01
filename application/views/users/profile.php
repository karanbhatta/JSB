

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $this->lang->line('user'); ?>
        <small><?php echo $this->lang->line('profile'); ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $this->lang->line('home'); ?></a></li>
        <li class="active"><?php echo $this->lang->line('profile'); ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo $this->lang->line('profile'); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-condensed table-hovered">
                <tr>
                  <th><?php echo $this->lang->line('username'); ?></th>
                  <td><?php echo $user_data['username']; ?></td>
                </tr>
                <tr>
                  <th><?php echo $this->lang->line('email'); ?></th>
                  <td><?php echo $user_data['email']; ?></td>
                </tr>
                <tr>
                  <th><?php echo $this->lang->line('first name'); ?></th>
                  <td><?php echo $user_data['firstname']; ?></td>
                </tr>
                <tr>
                  <th><?php echo $this->lang->line('last name'); ?></th>
                  <td><?php echo $user_data['lastname']; ?></td>
                </tr>
                <tr>
                  <th><?php echo $this->lang->line('gender'); ?></th>
                  <td><?php echo ($user_data['gender'] == 1) ? 'Male' : 'Gender'; ?></td>
                </tr>
                <tr>
                  <th><?php echo $this->lang->line('phone'); ?></th>
                  <td><?php echo $user_data['phone']; ?></td>
                </tr>
                <tr>
                  <th><?php echo $this->lang->line('group'); ?></th>
                  <td><span class="label label-info"><?php echo $user_group['group_name']; ?></span></td>
                </tr>
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

 
