
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css">

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/css/bootstrap-select.min.css">
<header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo" style="background-color:#898288;">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>JSB</b></span> 
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Jay Shree Bhauneli Trade</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background-color:#898288;">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <ul class="nav navbar-nav" style="margin-top: 12px; margin-left: 90%;">
       <?php
          echo form_open($this->uri->uri_string());
        ?>
        <label><?php echo $this->lang->line('chooseLang'); ?></label>
        <select id="locale" name="locale" onchange = "javascript:this.form.submit();">
          <option value="np" <?php if($language == 'np'){ echo 'selected';}?>>Nepali</option>
          <option value="en" <?php if($language == 'en' || $language == ''){ echo 'selected';}?>>English</option>
         
        </select>
        <?php
          echo form_close();
        ?>
      </ul>
    </nav>
    
  </header>
  <!-- Left side column. contains the logo and sidebar -->
