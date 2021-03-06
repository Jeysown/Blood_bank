<html xmlns="http://www.w3.org/1999/xhtml">
      <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Blood Inventory</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
                      <link rel="shortcut icon" href="images/bllod.ico">
           <link href="assets/bootstrap.css" rel="stylesheet" />
                 <link href="assets/bootstrap.min.css" rel="stylesheet" />
                 <link href="assets/dropdown.css" rel="stylesheet" />
        <script src="assets/jquery.min.js"></script>
        <script src="assets/bootstrap.min.js"></script>
        <link href="styles.css" rel="stylesheet" type="text/css" media="screen" />
        <style >
        .filterable {
            margin-top: 15px;
        }
        .filterable .panel-heading .pull-right {
            margin-top: -20px;
        }
        .filterable .filters input[disabled] {
            background-color: transparent;
            border: none;
            cursor: auto;
            box-shadow: none;
            padding: 0;
            height: auto;
        }
        .filterable .filters input[disabled]::-webkit-input-placeholder {
            color: #333;
        }
        .filterable .filters input[disabled]::-moz-placeholder {
            color: #333;
        }
        .filterable .filters input[disabled]:-ms-input-placeholder {
            color: #333;
        }
        .modal .modal-header {
          border-bottom: none;
          position: relative;
        }
        .modal .modal-header .btn {
          position: absolute;
          top: 0;
          right: 0;
          margin-top: 0;
        }
        .modal .modal-footer {
          border-top: none;
          padding: 0;
        }
        .modal .modal-footer .btn-group > .btn:first-child {
          border-bottom-left-radius: 0;
        }
        .modal .modal-footer .btn-group > .btn:last-child {
          border-top-right-radius: 0;
        }
        .box {
             height:120px; width:380px;
        background: #006633;
float: left;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        margin-left: 0px;
        }
    #container {
    width: 800px;
    margin: auto;
        }
        </style>
        <script type="text/javascript">
          $(document).ready(function(){
            setInterval(function () {
              $('#notify_me').load('notification.php')
              $('#notification_count').load('notification_count.php')
            }, 1000);
            $('#notif').click(function(){
              $("#notification_count").fadeOut();
            });
          });
        </script>
    </head>
 <body>
      <?php session_start();
        if(isset($_SESSION['SESS_FIRST_NAME']) == ''){
          header("location: blood_login.php");
        }
       ?>
      <div id="wrap">
        <div id="menu">
          <ul>
            <li><a href="home.php" class="active">Home</a></li>
            <li>    
              <span id="notification_count"></span>
              <a href="#" id="notif" data-toggle="modal" data-target=".notif-modal">Notifications</a>
            </li>
            <li><a href="blood_search.php">Search</a></li>
            <?php if($_SESSION['SESS_TYPE'] == 'main'){?>
            <li><a href="sub_admin.php">Account</a></li>
            <?php }?>
            <li>
              <a href="blood_inventory.php" style="width:160px">Blood Inventory</a>
            </li>
            <li>
              <a href="logOut.php">Logout</a>
            </li>
          </ul>
        </div>
        <?php
          $connect = mysqli_connect("localhost","root","","blood_bank");
          
          $a_plus_query_c = "SELECT * FROM blood WHERE remarks = '1' AND blood_type = '1' ORDER by blood_id";
          $a_plus_result_c = mysqli_query($connect,$a_plus_query_c);
          
          $a_minus_query_c = "SELECT * FROM blood WHERE remarks = '1' AND blood_type = '2' ORDER by blood_id";
          $a_minus_result_c = mysqli_query($connect,$a_minus_query_c);
          
          $b_plus_query_c = "SELECT * FROM blood WHERE remarks = '1' AND blood_type = '3' ORDER by blood_id";
          $b_plus_result_c = mysqli_query($connect,$b_plus_query_c);
          
          $b_minus_query_c = "SELECT * FROM blood WHERE remarks = '1' AND blood_type = '4' ORDER by blood_id";
          $b_minus_result_c = mysqli_query($connect,$b_minus_query_c);

          $ab_plus_query_c = "SELECT * FROM blood WHERE remarks = '1' AND blood_type = '5' ORDER by blood_id";
          $ab_plus_result_c = mysqli_query($connect,$ab_plus_query_c);
          
          $ab_minus_query_c = "SELECT * FROM blood WHERE remarks = '1' AND blood_type = '6' ORDER by blood_id";
          $ab_minus_result_c = mysqli_query($connect,$ab_minus_query_c);
          
          $o_plus_query_c = "SELECT * FROM blood WHERE remarks = '1' AND blood_type = '7' ORDER by blood_id";
          $o_plus_result_c = mysqli_query($connect,$o_plus_query_c);
          
          $o_minus_query_c = "SELECT * FROM blood WHERE remarks = '1' AND blood_type = '8' ORDER by blood_id";
          $o_minus_result_c = mysqli_query($connect,$o_minus_query_c);

          //Expired
          $a_plus_query_e = "SELECT * FROM blood WHERE remarks = '2' AND blood_type = '1' ORDER by blood_id";
          $a_plus_result_e = mysqli_query($connect,$a_plus_query_e);
          
          $a_minus_query_e = "SELECT * FROM blood WHERE remarks = '2' AND blood_type = '2' ORDER by blood_id";
          $a_minus_result_e = mysqli_query($connect,$a_minus_query_e);
          
          $b_plus_query_e = "SELECT * FROM blood WHERE remarks = '2' AND blood_type = '3' ORDER by blood_id";
          $b_plus_result_e = mysqli_query($connect,$b_plus_query_e);
          
          $b_minus_query_e = "SELECT * FROM blood WHERE remarks = '2' AND blood_type = '4' ORDER by blood_id";
          $b_minus_result_e = mysqli_query($connect,$b_minus_query_e);

          $ab_plus_query_e = "SELECT * FROM blood WHERE remarks = '2' AND blood_type = '5' ORDER by blood_id";
          $ab_plus_result_e = mysqli_query($connect,$ab_plus_query_e);
          
          $ab_minus_query_e = "SELECT * FROM blood WHERE remarks = '2' AND blood_type = '6' ORDER by blood_id";
          $ab_minus_result_e = mysqli_query($connect,$ab_minus_query_e);
          
          $o_plus_query_e = "SELECT * FROM blood WHERE remarks = '2' AND blood_type = '7' ORDER by blood_id";
          $o_plus_result_e = mysqli_query($connect,$o_plus_query_e);
          
          $o_minus_query_e = "SELECT * FROM blood WHERE remarks = '2' AND blood_type = '8' ORDER by blood_id";
          $o_minus_result_e = mysqli_query($connect,$o_minus_query_e);
          

        ?>
        <a href="#" data-toggle="modal" data-target=".blood-details-modal" class="btn btn-lg btn-primary" style="margin-left:40%;margin-bottom:2%">Print Blood Details</a>
            <?php
        if(isset($_SESSION['no_entry']) && $_SESSION['no_entry'] != ''){?>
            <div class="prompt-box" align="center" style="width:30%;margin-left:35%;background:#ffecec url('prompt/error.png') no-repeat 10px 50%;border:1px solid #f5aca6;" id="has-error">
                <b><font size="2em"><span>error: <?php echo $_SESSION['no_entry'];?></span></font></b>
            </div>
        <?php    unset($_SESSION['no_entry']);
        }
        ?>
        </br>
<div id='container'>
<div class='box' style="color:white; float:left; margin-right:30px;" >
        <h1>Claimed</h1>
         <a style="margin-left:29px;">A+</a>
         <a style="margin-left:15px;"><?php echo mysqli_num_rows($a_plus_result_c);?></a>

          <a style="margin-left: 45px;">A-</a>
           <a style="margin-left:15px;"><?php echo mysqli_num_rows($a_minus_result_c);?></a>
          <a style="margin-left: 45px;">B+</a>
           <a style="margin-left:15px;"><?php echo mysqli_num_rows($b_plus_result_c);?></a>
          <a style="margin-left: 45px;">B-</a>
           <a style="margin-left:15px;"><?php echo mysqli_num_rows($b_minus_result_c);?></a>
    <br>

            <a style="margin-left: 19px;">AB+</a>
                       <a style="margin-left:15px;"><?php echo mysqli_num_rows($ab_plus_result_c);?></a>

            <a style="margin-left: 35px;">AB-</a>
                       <a style="margin-left:15px;"><?php echo mysqli_num_rows($ab_minus_result_c);?></a>

            <a style="margin-left: 43px;">O+</a>
                       <a style="margin-left:15px;"><?php echo mysqli_num_rows($o_plus_result_c);?></a>
            <a style="margin-left: 45px;">O-</a>
                       <a style="margin-left:15px;"><?php echo mysqli_num_rows($o_minus_result_c);?></a>
</div>
<div class='box' style="color:white;margin-left:0px;" >
        <h1>Expired</h1>
      <a style="margin-left:29px;">A+</a>
         <a style="margin-left:15px;"><?php echo mysqli_num_rows($a_plus_result_e);?></a>

          <a style="margin-left: 45px;">A-</a>
           <a style="margin-left:15px;"><?php echo mysqli_num_rows($a_minus_result_e);?></a>
          <a style="margin-left: 45px;">B+</a>
           <a style="margin-left:15px;"><?php echo mysqli_num_rows($b_plus_result_e);?></a>
          <a style="margin-left: 45px;">B-</a>
           <a style="margin-left:15px;"><?php echo mysqli_num_rows($b_minus_result_e);?></a>
    <br>

            <a style="margin-left: 19px;">AB+</a>
                       <a style="margin-left:15px;"><?php echo mysqli_num_rows($ab_plus_result_e);?></a>

            <a style="margin-left: 35px;">AB-</a>
                       <a style="margin-left:15px;"><?php echo mysqli_num_rows($ab_minus_result_e);?></a>

            <a style="margin-left: 43px;">O+</a>
                       <a style="margin-left:15px;"><?php echo mysqli_num_rows($o_plus_result_e);?></a>
            <a style="margin-left: 45px;">O-</a>
                       <a style="margin-left:15px;"><?php echo mysqli_num_rows($o_minus_result_e);?></a>
</div>

</div>
<div id="notifications_list">
        <?php
            $styles = "color:black;margin-left:27%;background-color: #00CC33";

$account_id = $_SESSION['SESS_ACCOUNT_ID'];

$connect = mysqli_connect("localhost","root","","blood_bank");
$notifs = "SELECT * FROM blood ORDER by blood_id";
$run = mysqli_query($connect,$notifs);
if(mysqli_num_rows($run) == 0){?>
<br><br><br><br><br><br><br>
  <div class="alert alert-danger" style="font-size:20px"><b>There are no Claimed/Expired Bloods!</b></div>
<?php }
else{
echo "<center>";
echo "<div class='container' style='width:100%;border-radius:5px;height: 590px;overflow-y: auto;'>";
echo "<div class='row'>";
echo "<div class='panel panel-success filterable'>";
echo "<div class='panel-heading'>";
echo "<h3 class='panel-title' style='padding-bottom:5px;'>List of Blood Donations with their Donor</h3>";
echo "<div class='pull-right'>";
echo "<br><br><button class='btn btn-default btn-xs btn-filter'><span class='glyphicon glyphicon-filter'></span> Filter</button>";
echo "</div>";
echo "</div>";
echo "</br>";
echo "<table class='table'>";
echo "<thead>";
echo " <tr class='filters'>";
echo "<th><input type='text' class='form-control' placeholder='Call Number' disabled></th>";
echo "<th><input type='text' class='form-control' placeholder='Blood Type' disabled></th>";
echo "<th><input type='text' class='form-control' placeholder='Place of Donation' disabled></th>";
echo "<th><input type='text' class='form-control' placeholder='Nurse/Staff' disabled></th>";
echo "<th><input type='text' class='form-control' placeholder='Donor' disabled></th>";
echo "<th><input type='text' class='form-control' placeholder='Age' disabled></th>";
echo "<th><input type='text' class='form-control' placeholder='Remarks' disabled></th>";
echo "<th><input type='text' class='form-control' placeholder='Recipient' disabled></th>";

echo "</tr>";
echo "</thead>";
while($temp = mysqli_fetch_array($run)){
echo "<tr>";
echo "<td style='color:black'>" . $temp['call_number'] . "</td>";
$bLood_TYpe = '';
$remarks = '';
if($temp['blood_type'] == 1){
  $bLood_TYpe = 'A+';
}
else if($temp['blood_type'] == 2){
  $bLood_TYpe = 'A-';
}
else if($temp['blood_type'] == 3){
  $bLood_TYpe = 'B+';
}
else if($temp['blood_type'] == 4){
  $bLood_TYpe = 'B-';
}
else if($temp['blood_type'] == 5){
  $bLood_TYpe = 'AB+';
}
else if($temp['blood_type'] == 6){
  $bLood_TYpe = 'AB-';
}
else if($temp['blood_type'] == 7){
  $bLood_TYpe = 'O+';
}
else{
  $bLood_TYpe = 'O-';
}
if($temp['remarks'] == 0){
  $remarks = 'Available';
}
else if($temp['remarks'] == 1){
 $remarks = 'Claimed'; 
}
else{
  $remarks = 'Expired';
}
$recipient = '';
if($temp['recipient'] == ''){
  $recipient = 'None';
}
else{
  $recipient = $temp['recipient'];
}
echo "<td style='color:black'>" . $bLood_TYpe . "</td>";
echo "<td style='color:black'>" . $temp['place_of_acquisition'] . "</td>";
echo "<td style='color:black'>" . $temp['incharge'] . "</td>";
echo "<td style='color:black'> " . $temp['donor'] . "</td>";
echo "<td style='color:black'> " . $temp['age'] . " years old</td>";

echo "<td style='color:black'> " . $remarks . "</td>";
echo "<td style='color:black'> " . $recipient . "</td>";
echo "</tr>";
}
echo"</table>";
} 
?>
</div>
    <div class="modal fade notif-modal" id="modal_notif" tabindex="-1" role="dialog" aria-labelledby="myForgetModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" style="overflow-y: initial !important">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">x</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" style="color:black"><b>Notifications<b></h4>
            </div>
            <div class="modal-body" id="notify_me" style="height: 250px;overflow-y: auto;">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" style="color: #2E8B57;">Cancel</button>
            </div>
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->
    <div class="modal fade blood-details-modal" id="modal_notif" tabindex="-1" role="dialog" aria-labelledby="myForgetModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" style="overflow-y: initial !important">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">x</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" style="color:black"><b>Print Options<b></h4>
            </div>
            <div class="modal-body" style="height: 250px;overflow-y: auto;">
              <?php 
                      $connect = mysqli_connect("localhost","root","","blood_bank");
                      $list_of_donors = "SELECT DISTINCT(donor) FROM blood WHERE donor != ''";
                      $list_run = mysqli_query($connect,$list_of_donors);
                    ?>
                    <?php if(mysqli_num_rows($list_run) > 0){?>
                <form action="../blood_bank/temp.php" method="post" target="_blank">
                  <a style="color:black;font-family: Georgia;">Choose Bloodtype:</a>
                    <span class="custom-dropdown custom-dropdown--white">
                    <select name = "blood_typescategory"  class="custom-dropdown__select custom-dropdown__select--white">
                      <option value="10">All</option>
                      <option value="1">A+</option>
                      <option value="2">A-</option>
                      <option value="3">B+</option>
                      <option value="4">B-</option>
                      <option value="7">O+</option>
                      <option value="8">O-</option>
                      <option value="5">AB+</option>
                      <option value="6">AB-</option>
                    </select>
                    </span>
                    <br>
                    <br>
                    <a style="color:black;font-family: Georgia;">Remarks</a>
                    <span class="custom-dropdown custom-dropdown--white">
                    <select name = "remarkscategory"  class="custom-dropdown__select custom-dropdown__select--white">
                      <option value="10">All</option>
                      <option value="0">Available</option>
                      <option value="1">Claimed</option>
                      <option value="2">Expired</option>
                    </select>
                    </span>
                    <br>
                    <br>
                    <a style="color:black;font-family: Georgia;">Donor</a>
                    <span class="custom-dropdown custom-dropdown--white">
                    <select name = "donorcategory"  class="custom-dropdown__select custom-dropdown__select--white">
                      <option value="All">All</option>
                      <?php while($list = mysqli_fetch_array($list_run)){?>
                        <option value="<?php echo $list['donor'];?>"><?php echo $list['donor'];?></option>
                      <?php }?>
                    </select>
                    </span> 
                    <br>
                    <br>
                    <input type="submit" class='btn-ko'>
                </form>
                  <?php }
                  else{?>
                    <h1 style="color:black">No Donors</h1>
                  <?php }?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" style="color: #2E8B57;">Cancel</button>
            </div>
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->
    </body>
</html>
<script type="text/javascript"> 
$(document).ready(function(){
                $("#has-error").fadeTo(3000, 500).slideUp(500, function(){
                });
                $("#has-success").fadeTo(3000, 500).slideUp(500, function(){
                });
                $('.filterable .btn-filter').click(function(){
                    var $panel = $(this).parents('.filterable'),
                    $filters = $panel.find('.filters input'),
                    $tbody = $panel.find('.table tbody');
                    if ($filters.prop('disabled') == true) {
                        $filters.prop('disabled', false);
                        $filters.first().focus();
                    } else {
                        $filters.val('').prop('disabled', true);
                        $tbody.find('.no-result').remove();
                        $tbody.find('tr').show();
                    }
                });

                $('.filterable .filters input').keyup(function(e){
                    /* Ignore tab key */
                    var code = e.keyCode || e.which;
                    if (code == '9') return;
                    /* Useful DOM data and selectors */
                    var $input = $(this),
                    inputContent = $input.val().toLowerCase(),
                    $panel = $input.parents('.filterable'),
                    column = $panel.find('.filters th').index($input.parents('th')),
                    $table = $panel.find('.table'),
                    $rows = $table.find('tbody tr');
                    /* Dirtiest filter function ever ;) */
                    var $filteredRows = $rows.filter(function(){
                        var value = $(this).find('td').eq(column).text().toLowerCase();
                        return value.indexOf(inputContent) === -1;
                    });
                    /* Clean previous no-result if exist */
                    $table.find('tbody .no-result').remove();
                    /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
                    $rows.show();
                    $filteredRows.hide();
                    /* Prepend no-result row if all rows are filtered */
                    if ($filteredRows.length === $rows.length) {
                        $table.find('tbody').prepend($('<tr class="no-result text-center" style="color:red"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
                    }
                });
            });
</script>