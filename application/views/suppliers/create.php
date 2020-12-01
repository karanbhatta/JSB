

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


        <div class="box">
          <div class="box-header">
            <h3 class="box-title"><?php echo $this->lang->line('add imports'); ?></h3>
          </div>
          <!-- /.box-header -->
          <form role="form" action="<?php base_url('Suppliers/create') ?>" method="post" class="form-horizontal">
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
                    <label for="gross_amount" class="col-sm-5 control-label" style="text-align:left;"><?php echo $this->lang->line('bill no'); ?></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="bill_no" name="bill_no" placeholder="Enter Bill No." required="required" autocomplete="off" />
                    </div>
                  </div>
                 <div class="form-group">
                  <label for="brands"><?php echo $this->lang->line('supplier name'); ?></label>
                  <select class="form-control select_group" id="supplier_name" name="supplier_name"  onchange="myFunction()">
                    <?php foreach ($sups as $k => $v): ?>
                      <option value="<?php echo $v['name'] ?>" id="<?php echo $v['id'] ?>"><?php echo $v['name'] ?>
                     </option>

                    <?php endforeach ?>

                  </select>
  <input type="text" name="sid" id="sid" hidden>
                </div>
<script>
$("#supplier_name").change(function(){
    var x=($(this).children(":selected").attr("id"));
    $('#sid').val(x);

});


</script>
                  

                  
                 
                </div>
<!-- cheque payment -->
                  <div class="col-md-4 col-xs-12 pull pull-right">
                <span><?php echo $this->lang->line('cheque'); ?></span>
                  <div class="form-group">
                    <label for="gross_amount" class="col-sm-5 control-label" style="text-align:left;"><?php echo $this->lang->line('bank name'); ?></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Enter Bank Name" autocomplete="off" />
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
                    <label for="customer_email" class="col-sm-5 control-label" style="text-align:left;"><?php echo $this->lang->line('deposited by'); ?></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="deposited_by" name="deposited_by" placeholder="Deposited By" autocomplete="off">
                    </div>
                  </div>
                </div>
                <!--  -->
                <br /> <br/>
                <table class="table table-bordered" id="product_info_table">
                  <thead>
                    <tr>
                      <th style="width:50%"><?php echo $this->lang->line('product'); ?></th>
                      <th style="width:10%"><?php echo $this->lang->line('qty'); ?></th>
                      <th style="width:10%"><?php echo $this->lang->line('rate'); ?></th>
                      <th style="width:20%"><?php echo $this->lang->line('amount'); ?></th>
                      <th style="width:10%"><button type="button" id="add_row" class="btn btn-default"><i class="fa fa-plus"></i></button></th>
                    </tr>
                  </thead>

                   <tbody>
                     <tr id="row_1">
                      
                        <td><select class="form-control select_group product" data-row-id="row_1" id="product_1" name="product[]" style="width:100%;" onchange="getProductData(1)" required>
                            <option value=""></option>
                            <?php foreach ($products as $k => $v): ?>
                              <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?>
                               <small> <?php echo $v['qty'] ?></small></option>
                            <?php endforeach ?>
                          </select>
                        </td>
                        <td><input type="text" name="qty[]" id="qty_1" class="form-control" required onkeyup="getTotal(1)"></td>
                        <td>
                          <input type="text" name="rate[]" id="rate_1" class="form-control"  autocomplete="off" onkeyup="getTotal(1)">
                          <!-- <input type="hidden" name="rate_value[]" id="rate_value_1" class="form-control" autocomplete="off"> -->
                        </td>
                        <td>
                          <input type="text" name="amount[]" id="amount_1" class="form-control" disabled autocomplete="off">
                          <input type="hidden" name="amount_value[]" id="amount_value_1" class="form-control" autocomplete="off">
                        </td>
                        <td><button type="button" class="btn btn-default" onclick="removeRow('1')"><i class="fa fa-close"></i></button></td>
                     </tr>
                   </tbody>
                </table>

                <br /> <br/>

                <div class="col-md-6 col-xs-12 pull pull-right">

                  <div class="form-group">
                    <label for="gross_amount" class="col-sm-5 control-label"><?php echo $this->lang->line('gross amount'); ?></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="gross_amount" name="gross_amount" disabled autocomplete="off">
                      <input type="hidden" class="form-control" id="gross_amount_value" name="gross_amount_value" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="service_charge" class="col-sm-5 control-label"><?php echo $this->lang->line('service charge'); ?></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="service_charge" name="service_charge"  autocomplete="off" onkeyup="subAmount()">
                      <input type="hidden" class="form-control" id="service_charge_value" name="service_charge_value" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="vat_charge" class="col-sm-5 control-label"><?php echo $this->lang->line('vat'); ?> </label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="vat_charge" name="vat_charge"  autocomplete="off" onkeyup="subAmount()">
                      <input type="hidden" class="form-control" id="vat_charge_value" name="vat_charge_value" autocomplete="off">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="discount" class="col-sm-5 control-label"><?php echo $this->lang->line('discount'); ?></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="discount" name="discount" placeholder="Discount" onkeyup="subAmount()" autocomplete="off">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="net_amount" class="col-sm-5 control-label"><?php echo $this->lang->line('net amount'); ?></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="net_amount" name="net_amount" disabled autocomplete="off" >
                      <input type="hidden" class="form-control" id="net_amount_value" name="net_amount_value" autocomplete="off">
                    </div>
                  </div>

                    <div class="form-group">
                    <label for="discount" class="col-sm-5 control-label"><?php echo $this->lang->line('paid amount'); ?></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="paid_amount" name="paid_amount" placeholder="Paid Amount" onkeyup="getPaidAmount()" autocomplete="off">
                    </div>
                  </div>

<!-- due -->
                  <div class="form-group">
                    <label for="due_amount" class="col-sm-5 control-label"><?php echo $this->lang->line('due amount'); ?></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="due_amount" name="due_amount" disabled autocomplete="off">
                      <input type="hidden" class="form-control" id="due_amount_value" name="due_amount_value" autocomplete="off">
                    </div>
                  </div>

                  

                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
             <!--    <input type="hidden" name="service_charge_rate"  autocomplete="off">
                <input type="hidden" name="vat_charge_rate"  autocomplete="off"> -->
                <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('create import'); ?></button>
                <a href="<?php echo base_url('suppliers/') ?>" class="btn btn-warning"><?php echo $this->lang->line('back'); ?></a>
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

    $("#mainOrdersNav").addClass('active');
    $("#addOrderNav").addClass('active');
    
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
          url: base_url + '/suppliers/getTableProductRow/',
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
                    '<td><input type="text" name="rate[]" id="rate_'+row_id+'" class="form-control" onkeyup="getTotal('+row_id+')"></td>'+
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