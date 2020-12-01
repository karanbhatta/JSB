

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage
      <small>Vehicle</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Vehicles</li>
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

        <?php if(in_array('createVehicle', $user_permission)): ?>
          <button class="btn btn-primary" data-toggle="modal" data-target="#addVehicleModal">Add Vehicle</button>
          <br /> <br />
        <?php endif; ?>

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Manage Vehicles</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="manageTable" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Vehicle No</th>
                <th>Driver Name</th>
                <th>Driver Contact</th>
                <th>Co-driver Name</th>
                <th>Co-driver Contact</th>
                <th>Status</th>

                <?php if(in_array('viewVehicle', $user_permission) || in_array('deleteVehicle', $user_permission)): ?>
                  <th>Action</th>
                <?php endif; ?>
              </tr>
              </thead>

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


<?php if(in_array('createVehicle', $user_permission)): ?>
<!-- create brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="addVehicleModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Vehicle</h4>
      </div>

      <form role="form" action="<?php echo base_url('Vehicles/create') ?>" method="post" id="createVehicleForm">

        <div class="modal-body">

          <div class="form-group">
            <label for="brand_name">Vehicle No.</label>
            <input type="text" class="form-control" id="v_no" name="v_no" placeholder="Enter Vehicle No." autocomplete="off">
          </div>
           <div class="form-group">
            <label for="brand_name">Driver Name</label>
            <input type="text" class="form-control" id="d_name" name="d_name" placeholder="Enter Driver Name" autocomplete="off">
          </div>
           <div class="form-group">
            <label for="brand_name">Driver Contact</label>
            <input type="text" class="form-control" id="d_contact" name="d_contact" placeholder="Enter Driver Contact" autocomplete="off">
          </div>

           <div class="form-group">
            <label for="brand_name">Co-Driver Name</label>
            <input type="text" class="form-control" id="cd_name" name="cd_name" placeholder="Enter Co-Driver Name" autocomplete="off">
          </div>
           <div class="form-group">
            <label for="brand_name">Co-Driver Contact</label>
            <input type="text" class="form-control" id="cd_contact" name="cd_contact" placeholder="Enter Co-Driver Contact" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="active">Status</label>
            <select class="form-control" id="active" name="active">
              <option value="1">Active</option>
              <option value="2">Inactive</option>
            </select>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>

      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endif; ?>

<?php if(in_array('updateVehicle', $user_permission)): ?>
<!-- edit brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="editVehicleModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Vehicle</h4>
      </div>

      <form role="form" action="<?php echo base_url('Vehicles/updateVehicle') ?>" method="post" id="updateVehicleForm">

        <div class="modal-body">
          <div id="messages"></div>

          <div class="form-group">
            <label for="brand_name">Vehicle No.</label>
            <input type="text" class="form-control" id="edit_vehicle_no" name="edit_vehicle_no" placeholder="Enter Vehicle No." autocomplete="off">
          </div>
           <div class="form-group">
            <label for="brand_name">Driver Name</label>
            <input type="text" class="form-control" id="edit_driver_name" name="edit_driver_name" placeholder="Enter Driver Name" autocomplete="off">
          </div>
           <div class="form-group">
            <label for="brand_name">Driver Contact</label>
            <input type="text" class="form-control" id="edit_driver_contact" name="edit_driver_contact" placeholder="Enter Driver Contact" autocomplete="off">
          </div>

           <div class="form-group">
            <label for="brand_name">Co-Driver Name</label>
            <input type="text" class="form-control" id="edit_co_driver_name" name="edit_co_driver_name" placeholder="Enter Co-Driver Name" autocomplete="off">
          </div>
           <div class="form-group">
            <label for="brand_name">Co-Driver Contact</label>
            <input type="text" class="form-control" id="edit_co_driver_contact" name="edit_co_driver_contact" placeholder="Enter Co-Driver Contact" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="active">Status</label>
            <select class="form-control" id="edit_active" name="edit_active">
              <option value="1">Active</option>
              <option value="2">Inactive</option>
            </select>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>

      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endif; ?>

<?php if(in_array('deleteVehicle', $user_permission)): ?>
<!-- remove brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Remove Vehicle</h4>
      </div>

      <form role="form" action="<?php echo base_url('vehicles/remove') ?>" method="post" id="removeForm">
        <div class="modal-body">
          <p>Do you really want to remove?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endif; ?>


<script type="text/javascript">
var manageTable;
var base_url = "<?php echo base_url(); ?>";

$(document).ready(function() {

  $("#vehicleNav").addClass('active');

  // initialize the datatable 
  manageTable = $('#manageTable').DataTable({
    'ajax':  base_url+'Vehicles/fetchVehiclesData',
    'order': []
  });

  // submit the create from 
  $("#createVehicleForm").unbind('submit').on('submit', function() {
    var form = $(this);

    // remove the text-danger
    $(".text-danger").remove();

    $.ajax({
      url: form.attr('action'),
      type: form.attr('method'),
      data: form.serialize(), // /converting the form data into array and sending it to server
      dataType: 'json',
      success:function(response) {

        manageTable.ajax.reload(null, false); 

        if(response.success === true) {
          $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
            '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
          '</div>');


          // hide the modal
          $("#addVehicleModal").modal('hide');

          // reset the form
          $("#createVehicleForm")[0].reset();
          $("#createVehicleForm .form-group").removeClass('has-error').removeClass('has-success');

        } else {

          if(response.messages instanceof Object) {
            $.each(response.messages, function(index, value) {
              var id = $("#"+index);

              id.closest('.form-group')
              .removeClass('has-error')
              .removeClass('has-success')
              .addClass(value.length > 0 ? 'has-error' : 'has-success');
              
              id.after(value);

            });
          } else {
            $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
            '</div>');
          }
        }
      }
    }); 

    return false;
  });


});

function editVehicle(id)
{ 
  $.ajax({
    url: base_url+'Vehicles/fetchVehicleDataById/'+id,
    type: 'post',
    dataType: 'json',
    success:function(response) {

      $("#edit_vehicle_no").val(response.v_no);
      $("#edit_driver_name").val(response.d_name);
      $("#edit_driver_contact").val(response.d_contact);
      $("#edit_co_driver_name").val(response.cd_name);
      $("#edit_co_driver_contact").val(response.cd_contact);
      $("#edit_active").val(response.active);

      // submit the edit from 
      $("#updateVehicleForm").unbind('submit').bind('submit', function() {
        var form = $(this);

        // remove the text-danger
        $(".text-danger").remove();

        $.ajax({
          url: form.attr('action') + '/' + id,
          type: form.attr('method'),
          data: form.serialize(), // /converting the form data into array and sending it to server
          dataType: 'json',
          success:function(response) {

            manageTable.ajax.reload(null, false); 

            if(response.success === true) {
              $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
              '</div>');


              // hide the modal
              $("#editVehicleModal").modal('hide');
              // reset the form 
              $("#updateVehicleForm .form-group").removeClass('has-error').removeClass('has-success');

            } else {

              if(response.messages instanceof Object) {
                $.each(response.messages, function(index, value) {
                  var id = $("#"+index);

                  id.closest('.form-group')
                  .removeClass('has-error')
                  .removeClass('has-success')
                  .addClass(value.length > 0 ? 'has-error' : 'has-success');
                  
                  id.after(value);

                });
              } else {
                $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
                '</div>');
              }
            }
          }
        }); 

        return false;
      });

    }
  });
}

function removeVehicle(id)
{
  if(id) {
    $("#removeVehicleForm").on('submit', function() {

      var form = $(this);

      // remove the text-danger
      $(".text-danger").remove();

      $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: { vehicle_id:id }, 
        dataType: 'json',
        success:function(response) {

          manageTable.ajax.reload(null, false); 

          if(response.success === true) {
            $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
            '</div>');

            // hide the modal
            $("#removeVehicleModal").modal('hide');

          } else {

            $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
            '</div>'); 
          }
        }
      }); 

      return false;
    });
  }
}


</script>
