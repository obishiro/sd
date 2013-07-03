<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?=WebName;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="<?php echo WebUrl;?>assets/js/jquery.js"></script>
    <script src="<?php echo WebUrl;?>assets/js/bootstrap-transition.js"></script>
    <script src="<?php echo WebUrl;?>assets/js/bootstrap-alert.js"></script>
    <script src="<?php echo WebUrl;?>assets/js/bootstrap-modal.js"></script>
    <script src="<?php echo WebUrl;?>assets/js/bootstrap-dropdown.js"></script>
    <script src="<?php echo WebUrl;?>assets/js/bootstrap-scrollspy.js"></script>
    <script src="<?php echo WebUrl;?>assets/js/bootstrap-tab.js"></script>
    <script src="<?php echo WebUrl;?>assets/js/bootstrap-tooltip.js"></script>
    <script src="<?php echo WebUrl;?>assets/js/bootstrap-popover.js"></script>
    <script src="<?php echo WebUrl;?>assets/js/bootstrap-button.js"></script>
    <script src="<?php echo WebUrl;?>assets/js/bootstrap-collapse.js"></script>
    <script src="<?php echo WebUrl;?>assets/js/bootstrap-carousel.js"></script>
    <script src="<?php echo WebUrl;?>assets/js/bootstrap-typeahead.js"></script>
    <script src="<?php echo WebUrl;?>assets/js/jquery.dataTables.js"></script>
 <script type="text/javascript" src="<?php echo WebUrl;?>assets/js/jquery_notification.js"></script>
    <script src="<?php echo WebUrl;?>assets/js/bootstrap-datepicker.js"></script>
 <script src="<?php echo WebUrl;?>assets/js/jquery.validationEngine.js"></script>
    <!-- Le styles -->
    <link href="<?php echo WebUrl;?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo WebUrl;?>assets/css/datepicker.css" rel="stylesheet">
 
    
    <link href="<?php echo WebUrl;?>assets/css/jquery.dataTables.css" rel="stylesheet">
    <link href="<?php echo WebUrl;?>assets/css/jquery_notification.css" type="text/css" rel="stylesheet"/>
    <style type="text/css">
      body {
        
        padding-bottom: 40px;
      }
    </style>
    <link href="<?php echo WebUrl;?>assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php echo WebUrl;?>assets/css/validationEngine.jquery.css" rel="stylesheet">
       <!-- Le fav and touch icons -->
    
     <script type="text/javascript">
    $(document).ready(function() {
  $('#TableData').dataTable( {

         "sPaginationType" : "full_numbers",
         "iDisplayLength": 50,

          "oLanguage": {
                    "sLengthMenu": " _MENU_ /หน้า",
                    "sZeroRecords": "ไม่มีข้อมูล",
                    "sInfo": "จาก _START_ - _END_ ของ _TOTAL_ ",
                    "sInfoEmpty": "จาก 0 - 0 ของ 0 ",
                    "sInfoFiltered": "(ทั้งหมด _MAX_ เร็คคอร์ด)",

                    "sSearch": "ค้นหา :",
                     "oPaginate": {
              "sFirst": "<<",
              "sPrevious": "<",
              "sNext":">",
              "sLast":">>"
            }  }} );

   $('#txt-province').change(function(){ //event onchange : load data by ajax 
    var Str=$('#txt-province').val();
       $('#txt-district').load('<?=WebUrl;?>class/listdata.php?Id='+Str+'&type=district',{
    ajax:true, test:$(this).val() }); }); 
      $('#Aumphur').change(function(){ //event onchange : load data by ajax 
    var Str=$('#Aumphur').val();
       $('#Tumbon').load('<?=WebUrl;?>class/listdata.php?Id='+Str+'&type=tumbon',{
    ajax:true, test:$(this).val() }); }); 
    
    $('.datepicker').datepicker({
		format:'dd-mm-yyyy'
		
		});
     $('.datepicker2').datepicker({
		 format:'dd-mm-yyyy'
		 });
  
  } );
 </script>
  <script>
        $("#slideshow").craftyslide();
      </script> 
  </head>

  <body>
   <div class="header" ></div>
    <div class="navbar navbar-static-top">

      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
             
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?=WebUrl;?>">ระบบงานสัสดี</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="<?=WebUrl;?>"><?=Home;?></a></li>
              
         
               
               <?php if(isset($_SESSION['Usr'])) { 
                 echo "<li class=\"dropdown\">";
                echo "<a  href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">จัดการข้อมูล <b class=\"caret\"></b></a>";
               echo " <ul class=\"dropdown-menu\" >";
                 echo "<li><a href=\"".WebUrl."admin/index.php?action=sd27\">จัดทำข้อมูล สด.๒๗</a></li>";
                 echo "<li><a href=\"".WebUrl."admin/index.php?action=sd16\">จัดทำข้อมูล สด.๑๖</a></li>";
	echo " </ul> </li>";
                
                
             
                echo "<li><a href=\"".WebUrl."admin/index.php?action=logout\"   onClick=\"return confirm('ต้องการออกจากระบบจริงหรือไม่ ?')\">ออกจากระบบ</a></li>";
              }else{ ?>
              <li><a href="<?=WebUrl;?>admin/index.php?action=register">สมัครสมาชิก</a></li>
         
              <? } ?>
            </ul>
       
          </div><!--/.nav-collapse -->
        </div>

      </div>

    </div>
    <ul class="breadcrumb">
  <li><a href="<?php echo WebUrl;?>"><?=Home;?></a> <span class="divider">/</span></li>
  <li>
   <?php /*
   if(empty($_GET['action'])) {
    echo "".WebName."";
   }else{
    $StrDisplay->List1Menu($_GET['action']); 
  }*/?>
   <span class="divider">/</span></li>
  <li class="active"><?php // if(isset($section)) { $StrDisplay->List2Menu($_GET['section']);} ?></li>
</ul>
