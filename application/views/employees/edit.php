



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
      <li class="active"><?php echo $this->lang->line('employee'); ?></li>
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
            <h3 class="box-title"><?php echo $this->lang->line('add employee'); ?></h3>
          </div>
          <!-- /.box-header -->
          <!-- employee form -->

<style>
.mynav a{
  height: 40px;
    display: flex;
    align-items: center;
    padding: 0;
    font-weight: 600;
    font-size: 13px;
    color: #212229;
    padding-bottom: 2px;
    text-transform: capitalize;
/*  border-top: 1px dotted #ced4da;
  border-top-color: rgba(255, 255, 255, 0.12);
*/  }
/*.mynav a.active{color:#FFF;}
.mynav a.active::before {
    content: '';
    position: absolute;
    top: -1px;
    left: -20px;
    right: -20px;
    background-color: #37a000;
    height: 41px;
}*/
.mynav-sub{
  
    padding-left: 10px;
    padding-bottom: 0;
    position: relative;
  margin-left: 0px;
    border-left: 1px solid #e9ecef;
  border-left-color: rgba(255, 255, 255, 0.1);
  }
.mynav-sub a{
  padding-left: 29px !important;
  }

</style>


       
        <div class="bd-content bd-content-dashboard-two">
        
           
            <div class="bd-content-body">
                <!-- load messages -->
                                        <!-- load custom page -->
                    
  <style>

.nav.nav-tabs li a {
background-color: green;
color:white;
}

.nav.nav-tabs li:not(.active) a {
  pointer-events:none;
  background-color: #2554C7;
  color:white;
}
.nav.nav-tabs li (.active) a{
  background-color: red;
  color:white;
}

  </style>
 
<div class="card" style="padding: 20px;">

 <div class="row">
        <div class="col-sm-12 col-md-12">
            
                
                <div class="card-body">
 <form action="<?php base_url('employees/update') ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
<div class="tab-content">

        

                    
                        <div class="tab-pane active" id="tab1">
                  <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Full Name *</label>
                            <div class="col-sm-9">
                                <input name="name" class="form-control" type="text" placeholder="Full Name" id="name" value="<?php echo $employees['employee']['name']?>"  required>
                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email *</label>
                            <div class="col-sm-9">
                                <input name="email" class="form-control" type="email" placeholder="Email" id="email"value="<?php echo $employees['employee']['email']?>"  required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-3 col-form-label">Phone *</label>
                            <div class="col-sm-9">
                                <input name="phone" class="form-control" type="number" placeholder="Phone" id="phone" value="<?php echo $employees['employee']['phone']?>" required>
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="post" class="col-sm-3 col-form-label">Post </label>
                            <div class="col-sm-9">
                    <input type="text" class="form-control"value="<?php echo $employees['employee']['post']?>" id="post" name="post" placeholder="Post">
                            </div>
                        </div> 
                         <div class="form-group row">
                            <label for="alternative_phone" class="col-sm-3 col-form-label">Alternative Phone </label>
                            <div class="col-sm-9">
                                <input name="alternative_phone" class="form-control" type="number" value="<?php echo $employees['employee']['alternative_phone']?>" placeholder="Alternative Phone" id="alternative_phone">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="employee_id_no" class="col-sm-3 col-form-label">Employee Id </label>
                            <div class="col-sm-9">
                                <input name="employee_id_no" class="form-control" type="number" placeholder="Employee Id" value="<?php echo $employees['employee']['employee_id_no']?>" id="employee_id_no">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="present_address" class="col-sm-3 col-form-label">Present Address </label>
                            <div class="col-sm-9">
                                <input name="present_address" class="form-control"  placeholder="Present Address" value="<?php echo $employees['employee']['present_address']?>" id="present_address" >
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="parmanent_address"  class="col-sm-3 col-form-label">Permanent Address </label>
                            <div class="col-sm-9">
                                <input name="permanent_address" class="form-control"  placeholder="Permanent Address" value="<?php echo $employees['employee']['permanent_address']?>" id="permanent_address" >
                            </div>
                        </div> 
                         <div class="form-group row">
                            <label for="state" class="col-sm-3 col-form-label">State </label>
                            <div class="col-sm-9">
                                <select name="state"  class="form-control">
<option value="P1">P1</option>
<option value="P2">P2</option>
<option value="P3">P3</option>
<option value="P4">P4</option>
<option value="P5">P5</option>
<option value="P6">P6</option>
<option value="P7">P7</option>

</select>
 
                            </div>
                        </div> 

                  <div class="form-group row">
                            <label for="city" class="col-sm-3 col-form-label">City </label>
                            <div class="col-sm-9">
                    <input type="text" class="form-control" id="city" value="<?php echo $employees['employee']['city']?>" name="city" placeholder="City">
                            </div>
                        </div> 
                         <div class="form-group row">
                            <label for="zip_code"  class="col-sm-3 col-form-label">Zip Code </label>
                            <div class="col-sm-9">
                         <input type="text" class="form-control" value="<?php echo $employees['employee']['zip_code']?>" id="zip_code" name="zip_code" placeholder="Zip Code">
                            </div>
                        </div> 

                <div class="form-group">
                  <label><?php echo $this->lang->line('image preview'); ?>: </label>
                  <img src="<?php echo base_url() . $employees['employee']['picture'] ?>" width="150" height="150" class="img-circle">
                </div>

                <div class="form-group">
                  <label for="picture"><?php echo $this->lang->line('update image'); ?></label>
                  <div class="kv-avatar">
                      <div class="file-loading">
                          <input id="picture" name="picture" type="file">
                      </div>
                  </div>
                </div>



                       
                           <div class="form-group row">
                            <label for="hire_date" class="col-sm-3 col-form-label">Hired Date</label>
                            <div class="col-sm-9">
                                <input type="date" value="<?php echo isset($employees['employee']['hire_date']) ? set_value('hire_date', date('Y-m-d', ($employees['employee']['hire_date']))) : set_value('to_date'); ?>" name="hire_date" class="form-control"  placeholder="Hired Date" id="hire_date" >
                            </div>
                        </div> 

 <div class="form-group row">
                            <label for="status" class="col-sm-3 col-form-label">Status </label>
                            <div class="col-sm-9">
                                <select name="status"  class="form-control">
<option value="1">Available</option>
<option value="2">Unavailable</option>


</select>
 
                            </div>
                        </div>

                        <div class="form-group text-right">
                    <input type="submit" name="submit"></div>
                </div>

                
     
      
    
   
</div>
</div>
</div>
</div>
</div>
</form>

<script type="c544b4a0f7c3e11f295dbf79-text/javascript">
    

  $('.btnPrevious').click(function(){
  $('.nav-tabs > .active').prev('li').find('a').trigger('click');
  var prev = $('.nav-tabs > .active').removeClass('active').prev('li');
  if (!prev.length) prev = prev.prevObject.siblings(':first');
    prev.addClass('active');
});

  $("#first_name").on('keyup', function() {
    var inpfirstname = document.getElementById('first_name');
  if (inpfirstname.value.length === 0) return;
$("#first_name").css("border-color", "green");
});

  $("#email").on('keyup', function() {
    var email = document.getElementById('email');
  if (email.value.length === 0) return;
$("#email").css("border-color", "green");
});

  $("#phone").on('keyup', function() {
    var phone = document.getElementById('phone');
  if (phone.value.length === 0) return;
$("#phone").css("border-color", "green");
});


  function validation1() {
    
    var f_name = $('#first_name').val();
      if (f_name == "") {
        $("#first_name").css("border-color", "red");
    }
    var email = $('#email').val();
      if (email == "") {
        $("#email").css("border-color", "red");
    }

var phone = $('#phone').val();
      if (phone == "") {
        $("#phone").css("border-color", "red");
    }
    

if(f_name !== "" && email !=="" && phone !==""){
     $('.nav-tabs > .active').next('li').find('a').trigger('click');
   var next = $('.nav-tabs > .active').removeClass('active').next('li');
  if (!next.length) next = next.prevObject.siblings(':first');
    next.addClass('active');
}

}
function validation2() {
 //$('.nav-tabs > .active').next('li').find('a').trigger('click');
  $('.nav-tabs > .active').next('li').find('a').trigger('click');
  var next = $('.nav-tabs > .active').removeClass('active').next('li');
  if (!next.length) next = next.prevObject.siblings(':first');
    next.addClass('active');
 //$('.nav-tabs > .active').next('li').find('a').trigger('click');
}
</script>


<!-- close employee form -->
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


    $("#picture").fileinput({
        overwriteInitial: true,
        maxFileSize: 1500,
        showClose: false,
        showCaption: false,
        browseLabel: '',
        removeLabel: '',
        browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
        removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
        removeTitle: 'Cancel or reset changes',
        elErrorContainer: '#kv-avatar-errors-1',
        msgErrorClass: 'alert alert-block alert-danger',
        // defaultPreviewContent: '<img src="/uploads/default_avatar_male.jpg" alt="Your Avatar">',
        layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png", "gif"]
    });





    $(".select_group").select2();
    // $("#description").wysihtml5();

    $("#mainEmployeeNav").addClass('active');
    $("#createEmployeeNav").addClass('active');
    
    var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' + 
        'onclick="alert(\'Call your custom code here.\')">' +
        '<i class="glyphicon glyphicon-tag"></i>' +
        '</button>'; 
  
    // Add new row in the table 
    $("#add_row").unbind('click').bind('click', function() {
      var table = $("#product_info_table");
      var count_table_tbody_tr = $("#product_info_table tbody tr").length;
      var row_id = count_table_tbody_tr + 1;

      $.ajax({
          url: base_url + '/orders/getTableProductRow/',
          type: 'post',
          dataType: 'json',
          success:function(response) {
            
              // console.log(reponse.x);
               var html = '<tr id="row_'+row_id+'">'+
                   '<td>'+ 
                    '<select class="form-control select_group product" data-row-id="'+row_id+'" id="product_'+row_id+'" name="product[]" style="width:100%;" onchange="getProductData('+row_id+')">'+
                        '<option value=""></option>';
                        $.each(response, function(index, value) {
                          html += '<option value="'+value.id+'">'+value.name+'</option>';             
                        });
                        
                      html += '</select>'+
                    '</td>'+ 
                    '<td><input type="number" name="qty[]" id="qty_'+row_id+'" class="form-control" onkeyup="getTotal('+row_id+')"></td>'+
                    '<td><input type="text" name="rate[]" id="rate_'+row_id+'" class="form-control" ><input type="hidden" name="rate_value[]" id="rate_value_'+row_id+'" class="form-control"></td>'+
                    '<td><input type="text" name="amount[]" id="amount_'+row_id+'" class="form-control" disabled><input type="hidden" name="amount_value[]" id="amount_value_'+row_id+'" class="form-control"></td>'+
                    '<td><button type="button" class="btn btn-default" onclick="removeRow(\''+row_id+'\')"><i class="fa fa-close"></i></button></td>'+
                    '</tr>';

                if(count_table_tbody_tr >= 1) {
                $("#product_info_table tbody tr:last").after(html);  
              }
              else {
                $("#product_info_table tbody").html(html);
              }

              $(".product").select2();

          }
        });

      return false;
    });

  }); // /document

  function getTotal(row = null) {
    if(row) {
      var total = Number($("#rate_"+row).val()) * Number($("#qty_"+row).val());
      total = total.toFixed(2);
      $("#amount_"+row).val(total);
      $("#amount_value_"+row).val(total);
      
      subAmount();

    } else {
      alert('no row !! please refresh the page');
    }
  }

  // get the product information from the server
  function getProductData(row_id)
  {
    var product_id = $("#product_"+row_id).val();    
    if(product_id == "") {
      $("#rate_"+row_id).val("");
      $("#rate_value_"+row_id).val("");

      $("#qty_"+row_id).val("");           

      $("#amount_"+row_id).val("");
      $("#amount_value_"+row_id).val("");

    } else {
      $.ajax({
        url: base_url + 'orders/getProductValueById',
        type: 'post',
        data: {product_id : product_id},
        dataType: 'json',
        success:function(response) {
          // setting the rate value into the rate input field
          
          $("#rate_"+row_id).val(response.price);
          $("#rate_value_"+row_id).val(response.price);

          $("#qty_"+row_id).val(1);
          $("#qty_value_"+row_id).val(1);

          var total = Number(response.price) * 1;
          total = total.toFixed(2);
          $("#amount_"+row_id).val(total);
          $("#amount_value_"+row_id).val(total);
          
          subAmount();
          getPaidAmount();
        } // /success
      }); // /ajax function to fetch the product data 
    }
  }

 

  // calculate the total amount of the order
  function subAmount() {
    var service_charge =$("#service_charge").val();
    var vat_charge = $("#vat_charge").val();

    var tableProductLength = $("#product_info_table tbody tr").length;
    var totalSubAmount = 0;
    for(x = 0; x < tableProductLength; x++) {
      var tr = $("#product_info_table tbody tr")[x];
      var count = $(tr).attr('id');
      count = count.substring(4);

      totalSubAmount = Number(totalSubAmount) + Number($("#amount_"+count).val());
    } // /for

    totalSubAmount = totalSubAmount.toFixed(2);

    // sub total
    $("#gross_amount").val(totalSubAmount);
    $("#gross_amount_value").val(totalSubAmount);

    // vat
    // var vat = (Number($("#gross_amount").val())/100) * vat_charge;
    // vat = vat.toFixed(2);
    // $("#vat_charge").val(vat);
    // $("#vat_charge_value").val(vat);

    // service
    // var service = (Number($("#gross_amount").val())/100) * service_charge;
    // service = service.toFixed(2);
    // $("#service_charge").val(service);
    // $("#service_charge_value").val(service);
    
    // total amount
    var totalAmount = (Number(totalSubAmount) + Number(vat_charge) + Number(service_charge));
    totalAmount = totalAmount.toFixed(2);
    // $("#net_amount").val(totalAmount);
    // $("#totalAmountValue").val(totalAmount);

    var discount = $("#discount").val();
    if(discount) {

      getPaidAmount();


      var grandTotal = Number(totalAmount) - Number(discount);
      grandTotal = grandTotal.toFixed(2);
      $("#net_amount").val(grandTotal);
      $("#net_amount_value").val(grandTotal);

    } else {
      $("#net_amount").val(totalAmount);
      $("#net_amount_value").val(totalAmount);

      
    } // /else discount 

  } // /sub total amount
 


function getPaidAmount(){
    var net_amount=$("#net_amount").val();
    var paid_amount=$("#paid_amount").val();
  
    if(paid_amount){
      var dAmount=Number(net_amount) - Number(paid_amount);
      dAmount=dAmount.toFixed(2);
      $("#due_amount").val(dAmount);
      $("#due_amount_value").val(dAmount);
    }else{
       $("#due_amount").val(0);
      $("#due_amount_value").val(0);
    }
  }

  function removeRow(tr_id)
  {
    $("#product_info_table tbody tr#row_"+tr_id).remove();
    subAmount();
  }

  
</script>