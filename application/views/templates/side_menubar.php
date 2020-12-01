<aside class="main-sidebar" style="background-color:#898288;
">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree" >
        
        <li id="dashboardMainMenu" >
          <a href="<?php echo base_url('dashboard') ?>" style="background-color:#777E84;">
            <i class="fa fa-dashboard"></i> <span ><?php echo $this->lang->line('dashboard'); ?></span>
          </a>
        </li>

        <?php if($user_permission): ?>
          <?php if(in_array('createUser', $user_permission) || in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
            <li class="treeview" id="mainUserNav">
            <a href="#">
              <i class="fa fa-users"></i>
              <span><?php echo $this->lang->line('users'); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php if(in_array('createUser', $user_permission)): ?>
              <li id="createUserNav"><a href="<?php echo base_url('users/create') ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line('add user'); ?></a></li>
              <?php endif; ?>

              <?php if(in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
              <li id="manageUserNav"><a href="<?php echo base_url('users') ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line('manage users'); ?></a></li>
            <?php endif; ?>
            </ul>
          </li>
          <?php endif; ?>


          <!-- customer section -->
           <?php if(in_array('createBrand', $user_permission) || in_array('updateBrand', $user_permission) || in_array('viewBrand', $user_permission) || in_array('deleteBrand', $user_permission)): ?>
            <li id="customerNav">
              <a href="<?php echo base_url('Customers/') ?>">
                <i class="fa fa-users"></i> <span><?php echo $this->lang->line('customer'); ?></span>
              </a>
            </li>
          <?php endif; ?>

<!-- end customer section -->



          <!-- employee section -->
          <?php if(in_array('createEmployee', $user_permission) || in_array('updateEmployee', $user_permission) || in_array('viewEmployee', $user_permission) || in_array('deleteEmployee', $user_permission)): ?>
            <li class="treeview" id="mainEmployeeNav">
            <a href="#">
              <i class="fa fa-users"></i>
              <span><?php echo $this->lang->line('employee'); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php if(in_array('createEmployee', $user_permission)): ?>
              <li id="createEmployeeNav"><a href="<?php echo base_url('employees/create') ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line('add employee'); ?></a></li>
              <?php endif; ?>

              <?php if(in_array('updateEmployee', $user_permission) || in_array('viewEmployee', $user_permission) || in_array('deleteEmployee', $user_permission)): ?>
              <li id="manageEmployeeNav"><a href="<?php echo base_url('employees') ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line('manage employees'); ?></a></li>
               <li id="createSalaryNav"><a href="<?php echo base_url('employees/createSalary') ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line('add salary'); ?></a></li>
                <li id="manageSalaryNav"><a href="<?php echo base_url('employees/manageSalary') ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line('manage salary'); ?></a></li>
            <?php endif; ?>
            </ul>
          </li>
          <?php endif; ?>
          <!-- close employee section -->

          <?php if(in_array('createGroup', $user_permission) || in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)): ?>
            <li class="treeview" id="mainGroupNav">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span><?php echo $this->lang->line('groups'); ?></span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <?php if(in_array('createGroup', $user_permission)): ?>
                  <li id="addGroupNav"><a href="<?php echo base_url('groups/create') ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line('add group'); ?></a></li>
                <?php endif; ?>
                <?php if(in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)): ?>
                <li id="manageGroupNav"><a href="<?php echo base_url('groups') ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line('manage groups'); ?></a></li>
                <?php endif; ?>
              </ul>
            </li>
          <?php endif; ?>


          <?php if(in_array('createBrand', $user_permission) || in_array('updateBrand', $user_permission) || in_array('viewBrand', $user_permission) || in_array('deleteBrand', $user_permission)): ?>
            <li id="brandNav">
              <a href="<?php echo base_url('brands/') ?>">
                <i class="glyphicon glyphicon-tags"></i> <span><?php echo $this->lang->line('brands'); ?></span>
              </a>
            </li>
          <?php endif; ?>

          <?php if(in_array('createVehicle', $user_permission) || in_array('updateVehicle', $user_permission) || in_array('viewVehicle', $user_permission) || in_array('deleteVehicle', $user_permission)): ?>
            <li id="vehicleNav">
              <a href="<?php echo base_url('Vehicles/') ?>">
                <i class="glyphicon glyphicon-user"></i> <span><?php echo $this->lang->line('vehicle'); ?></span>
              </a>
            </li>
          <?php endif; ?>

        

          <?php if(in_array('createCategory', $user_permission) || in_array('updateCategory', $user_permission) || in_array('viewCategory', $user_permission) || in_array('deleteCategory', $user_permission)): ?>
            <li id="categoryNav">
              <a href="<?php echo base_url('category/') ?>">
                <i class="fa fa-files-o"></i> <span><?php echo $this->lang->line('category'); ?></span>
              </a>
            </li>
          <?php endif; ?>

          <?php if(in_array('createStore', $user_permission) || in_array('updateStore', $user_permission) || in_array('viewStore', $user_permission) || in_array('deleteStore', $user_permission)): ?>
            <li id="storeNav">
              <a href="<?php echo base_url('stores/') ?>">
                <i class="fa fa-files-o"></i> <span><?php echo $this->lang->line('stores'); ?></span>
              </a>
            </li>
          <?php endif; ?>

    <!--       <?php if(in_array('createAttribute', $user_permission) || in_array('updateAttribute', $user_permission) || in_array('viewAttribute', $user_permission) || in_array('deleteAttribute', $user_permission)): ?>
          <li id="attributeNav">
            <a href="<?php echo base_url('attributes/') ?>">
              <i class="fa fa-files-o"></i> <span><?php echo $this->lang->line('attributes'); ?></span>
            </a>
          </li>
          <?php endif; ?> -->

          <?php if(in_array('createProduct', $user_permission) || in_array('updateProduct', $user_permission) || in_array('viewProduct', $user_permission) || in_array('deleteProduct', $user_permission)): ?>
            <li class="treeview" id="mainProductNav">
              <a href="#">
                <i class="fa fa-cube"></i>
                <span><?php echo $this->lang->line('products'); ?></span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <?php if(in_array('createProduct', $user_permission)): ?>
                  <li id="addProductNav"><a href="<?php echo base_url('products/create') ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line('add product'); ?></a></li>
                <?php endif; ?>
                <?php if(in_array('updateProduct', $user_permission) || in_array('viewProduct', $user_permission) || in_array('deleteProduct', $user_permission)): ?>
                <li id="manageProductNav"><a href="<?php echo base_url('products') ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line('manage products'); ?></a></li>
                <?php endif; ?>
              </ul>
            </li>
          <?php endif; ?>

<!-- supplier -->
          
          <?php if(in_array('createImport', $user_permission) || in_array('updateImport', $user_permission) || in_array('viewImport', $user_permission) || in_array('deleteImport', $user_permission)): ?>
            <li id="mainSuppliersNav">
              <a href="<?php echo base_url('Suppliers/') ?>">
                <i class="glyphicon glyphicon-user"></i> <span><?php echo $this->lang->line('suppliers'); ?></span>
              </a>
            </li>
          <?php endif; ?>
<!-- banl -->

      <!--     <?php if(in_array('createBank', $user_permission) || in_array('updateBank', $user_permission) || in_array('viewBank', $user_permission) || in_array('deleteBank', $user_permission)): ?>
            <li id="mainBankNav">
              <a href="<?php echo base_url('Bank/') ?>">
                <i class="glyphicon glyphicon-user"></i> <span><?php echo $this->lang->line('bank'); ?></span>
              </a>
            </li>
          <?php endif; ?> -->

          <?php if(in_array('createOrder', $user_permission) || in_array('updateOrder', $user_permission) || in_array('viewOrder', $user_permission) || in_array('deleteOrder', $user_permission)): ?>
            <li class="treeview" id="mainOrdersNav">
              <a href="#">
                <i class="fa fa-dollar"></i>
                <span><?php echo $this->lang->line('export'); ?></span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <?php if(in_array('createOrder', $user_permission)): ?>
                  <li id="addOrderNav"><a href="<?php echo base_url('orders/create') ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line('add export'); ?></a></li>
                <?php endif; ?>
                <?php if(in_array('updateOrder', $user_permission) || in_array('viewOrder', $user_permission) || in_array('deleteOrder', $user_permission)): ?>
                <li id="manageOrdersNav"><a href="<?php echo base_url('orders') ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line('manage export'); ?></a></li>
                
                <?php endif; ?>
              </ul>
            </li>
          <?php endif; ?>

          <!-- sale entry -->

            <li class="treeview" id="mainSalesNav">
              <a href="#">
                <i class="fa fa-dollar"></i>
                <span><?php echo $this->lang->line('sale entry'); ?></span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                  <li id="addSaleNav"><a href="<?php echo base_url('sales/create') ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line('add sale'); ?></a></li>
              
                <li id="manageSalesNav"><a href="<?php echo base_url('sales') ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line('manage sale'); ?></a></li>
                <li id="manageLedgerNav"><a href="<?php echo base_url('orders/customer_ledger') ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line('customer ledger'); ?></a></li>
               
              </ul>
            </li>
          <!-- sale entry close -->


<!-- return -->
 <?php if(in_array('createReturn', $user_permission) || in_array('updateReturn', $user_permission) || in_array('viewReturn', $user_permission) || in_array('deleteReturn', $user_permission)): ?>
            <li class="treeview" id="mainReturnNav">
              <a href="#">
                <i class="fa fa-dollar"></i>
                <span><?php echo $this->lang->line('return'); ?></span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <?php if(in_array('createReturn', $user_permission)): ?>
                  <li id="addWasteNav"><a href="<?php echo base_url('ReturnProduct/create') ?>"><i class="fa fa-circle-o"></i> Waste Return</a></li>
                <?php endif; ?>
                <?php if(in_array('updateReturn', $user_permission) || in_array('viewOrder', $user_permission) || in_array('deleteOrder', $user_permission)): ?>
                <li id="addReturnNav"><a href="<?php echo base_url('ReturnProduct/createReturn') ?>"><i class="fa fa-circle-o"></i> Product Return</a></li>
                <li id="manageReturnNav"><a href="<?php echo base_url('ReturnProduct/') ?>"><i class="fa fa-circle-o"></i> Manage Return</a></li>
                <?php endif; ?>
              </ul>
            </li>
       <!--    <?php endif; ?>
            <?php if(in_array('viewReports', $user_permission)): ?>
            <li id="reportNav">
              <a href="<?php echo base_url('reports/') ?>">
                <i class="glyphicon glyphicon-stats"></i> <span><?php echo $this->lang->line('reports'); ?></span>
              </a>
            </li>
            <?php endif; ?> -->

           <!--   <?php if(in_array('viewReport', $user_permission)): ?>
            <li id="reportNav">
              
              <a data-toggle="modal" data-target="#removeOverallModal">
                <i class="glyphicon glyphicon-stats"></i> <span><?php echo $this->lang->line('overall reports'); ?></span>
              </a>
            </li>
           <?php endif; ?> -->
          <?php if(in_array('updateCompany', $user_permission)): ?>
            <li id="companyNav"><a href="<?php echo base_url('company/') ?>"><i class="fa fa-files-o"></i> <span><?php echo $this->lang->line('company'); ?></span></a></li>
          <?php endif; ?>

        

        <!-- <li class="header">Settings</li> -->

        <?php if(in_array('viewProfile', $user_permission)): ?>
          <li><a href="<?php echo base_url('users/profile/') ?>"><i class="fa fa-user-o"></i> <span><?php echo $this->lang->line('profile'); ?></span></a></li>
        <?php endif; ?>
        <?php if(in_array('updateSetting', $user_permission)): ?>
          <li><a href="<?php echo base_url('users/setting/') ?>"><i class="fa fa-wrench"></i> <span><?php echo $this->lang->line('setting'); ?></span></a></li>
        <?php endif; ?>

        <?php endif; ?>
        <!-- user permission info -->
        <li><a href="<?php echo base_url('auth/logout') ?>"><i class="glyphicon glyphicon-log-out"></i> <span><?php echo $this->lang->line('logout'); ?></span></a></li>

      </ul>


      
    </section>
    <!-- /.sidebar -->
  </aside>
  <div class="modal fade" tabindex="-1" role="dialog" id="removeOverallModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Choose Date</h4>
      </div>

      <form role="form" action="<?php echo base_url('Report') ?>" id="removeBrandForm">
        <div class="modal-body">
  <label for="sd">Start Date:</label>
  <input type="date" data-date-format="d-m-Y" id="sd" name="sd" required="required">
   <label for="ed">End Date:</label>
  <input type="date" id="ed" name="ed" required="required">
  <input type="submit">        </div>
       
      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>