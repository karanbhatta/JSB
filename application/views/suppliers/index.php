

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->  
  <section class="content-header">
    <h1>
      <?php echo $this->lang->line('manage'); ?>
      <small><?php echo $this->lang->line('imports'); ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $this->lang->line('home'); ?></a></li>
      <li class="active"><?php echo $this->lang->line('imports'); ?></li>
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

        <?php if(in_array('createImport', $user_permission)): ?>
          <a href="<?php echo base_url('suppliers/create') ?>" class="btn btn-primary"><?php echo $this->lang->line('add import'); ?></a>  

          <button class="btn btn-primary" data-toggle="modal" data-target="#addSupplierInformationModal">Add Supplier</button>

            <a href="<?php echo base_url('suppliers/supplier_ledger') ?>" class="btn btn-primary"><?php echo $this->lang->line('supplier ledger'); ?></a>  
          <br /> <br />
          <br /> <br />
        <?php endif; ?>

        <div class="box">
          <div class="box-header">
            <h3 class="box-title"><?php echo $this->lang->line('manage imports'); ?></h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="manageTable" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th><?php echo $this->lang->line('bill number'); ?></th>
                <th><?php echo $this->lang->line('supplier name'); ?></th>
                <th><?php echo $this->lang->line('date'); ?>
                </th>
                <th><?php echo $this->lang->line('total amount'); ?></th>
                <th><?php echo $this->lang->line('paid amount'); ?></th>
                <th><?php echo $this->lang->line('due amount'); ?></th>

<!-- bank -->
                 <th><?php echo $this->lang->line('bank name'); ?></th>
                 <th><?php echo $this->lang->line('cheque name'); ?></th>
                 <th><?php echo $this->lang->line('check no'); ?></th>
                <th><?php echo $this->lang->line('deposited by'); ?></th>
                
                
                <?php if(in_array('updateImport', $user_permission) || in_array('viewImport', $user_permission) || in_array('deleteImport', $user_permission)): ?>
                  <th><?php echo $this->lang->line('action'); ?></th>
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
    
<div class="box">
          <div class="box-header">
            <h3 class="box-title">Manage Suppliers</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="manageTableSuppliers" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Supplier Name</th>
                <th>Supplier Address</th>
                <th>Supplier Contact</th>
                <th>Status</th>
                <?php if(in_array('updateImport', $user_permission) || in_array('deleteImport', $user_permission)): ?>
                  <th>Action</th>
                <?php endif; ?>
              </tr>
              </thead>

            </table>
          </div>
          <!-- /.box-body -->
        </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php if(in_array('deleteImport', $user_permission)): ?>
<!-- remove brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Remove Order</h4>
      </div>

      <form role="form" action="<?php echo base_url('suppliers/remove') ?>" method="post" id="removeForm">
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




<?php if(in_array('createImport', $user_permission)): ?>
<!-- create brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="addSupplierInformationModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Supplier</h4>
      </div>

      <form role="form" action="<?php echo base_url('Suppliers/createSupplier') ?>" method="post" id="createBrandForm">

        <div class="modal-body">

          <div class="form-group">
            <label for="brand_name">Supplier Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" autocomplete="off">
          </div>
           <div class="form-group">
            <label for="brand_name">Supplier Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" autocomplete="off">
          </div>
           <div class="form-group">
            <label for="brand_name">Supplier Contact</label>
            <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter Contact" autocomplete="off">
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

<?php if(in_array('updateImport', $user_permission)): ?>
<!-- edit brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="editBrandModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Supplier</h4>
      </div>

      <form role="form" action="<?php echo base_url('Suppliers/updateSupplier') ?>" method="post" id="updateBrandForm">

        <div class="modal-body">
          <div id="messages"></div>

          <div class="form-group">
            <label for="edit_brand_name">Supplier Name</label>
            <input type="text" class="form-control" id="edit_supplier_name" name="edit_brand_name" placeholder="Enter Name" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="edit_brand_name">Supplier Address</label>
            <input type="text" class="form-control" id="edit_supplier_address" name="edit_supplier_address" placeholder="Enter Address" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="edit_supplier_contact">Supplier Contact</label>
            <input type="text" class="form-control" id="edit_supplier_contact" name="edit_supplier_contact" placeholder="Enter Contact" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="edit_active">Status</label>
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

<?php if(in_array('deleteImport', $user_permission)): ?>
<!-- remove brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeBrandModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Remove Supplier</h4>
      </div>

      <form role="form" action="<?php echo base_url('Suppliers/removeSupplier') ?>" method="post" id="removeBrandForm">
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
var manageTableSuppliers;
var base_url = "<?php echo base_url(); ?>";

$(document).ready(function() {

  $("#mainSuppliersNav").addClass('active');
  $("#manageSuppliersNav").addClass('active');

  // initialize the datatable 
  manageTable = $('#manageTable').DataTable({
    'ajax': base_url + 'Suppliers/fetchSuppliersData',
    'order': []
  });
 manageTableSuppliers = $('#manageTableSuppliers').DataTable({
    'ajax':base_url + 'Suppliers/fetchSupplierInformationData',
    'orderSupplier': []
  });

 $("#createBrandForm").unbind('submit').on('submit', function() {
    var form = $(this);

    // remove the text-danger
    $(".text-danger").remove();

    $.ajax({
      url: form.attr('action'),
      type: form.attr('method'),
      data: form.serialize(), // /converting the form data into array and sending it to server
      dataType: 'json',
      success:function(response) {

        manageTableSuppliers.ajax.reload(null, false); 

        if(response.success === true) {
          $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
            '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
          '</div>');


          // hide the modal
          $("#addBrandModal").modal('hide');

          // reset the form
          $("#createBrandForm")[0].reset();
          $("#createBrandForm .form-group").removeClass('has-error').removeClass('has-success');

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

// remove functions 
function removeFunc(id)
{
  if(id) {
    $("#removeForm").on('submit', function() {

      var form = $(this);

      // remove the text-danger
      $(".text-danger").remove();

      $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: { import_id:id }, 
        dataType: 'json',
        success:function(response) {

          manageTable.ajax.reload(null, false); 

          if(response.success === true) {
            $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
            '</div>');

            // hide the modal
            $("#removeModal").modal('hide');

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
 
function editBrand(id)
{ 
  $.ajax({
    url:base_url+'Suppliers/fetchSuplierInformationDataById/'+id,
    type: 'post',
    dataType: 'json',
    success:function(response) {

      $("#edit_supplier_name").val(response.name);
      $("#edit_supplier_address").val(response.address);
      $("#edit_supplier_contact").val(response.contact);
      $("#edit_active").val(response.active);

      // submit the edit from 
      $("#updateBrandForm").unbind('submit').bind('submit', function() {
        var form = $(this);

        // remove the text-danger
        $(".text-danger").remove();

        $.ajax({
          url: form.attr('action') + '/' + id,
          type: form.attr('method'),
          data: form.serialize(), // /converting the form data into array and sending it to server
          dataType: 'json',
          success:function(response) {

            manageTableSuppliers.ajax.reload(null, false); 

            if(response.success === true) {
              $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
              '</div>');


              // hide the modal
              $("#editBrandModal").modal('hide');
              // reset the form 
              $("#updateBrandForm .form-group").removeClass('has-error').removeClass('has-success');

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

function removeBrand(id)
{
  if(id) {
    $("#removeBrandForm").on('submit', function() {

      var form = $(this);

      // remove the text-danger
      $(".text-danger").remove();

      $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: { brand_id:id }, 
        dataType: 'json',
        success:function(response) {

          manageTableSuppliers.ajax.reload(null, false); 

          if(response.success === true) {
            $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
            '</div>');

            // hide the modal
            $("#removeBrandModal").modal('hide');

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
