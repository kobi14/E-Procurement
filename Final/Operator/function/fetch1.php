<?php
/**
 * Created by PhpStorm.
 * User: kobi.ktk
 * Date: 12/6/17
 * Time: 11:40 AM
 */

session_start();


//fetch.php
include "conn.php";
//$connect = mysqli_connect("localhost", "root", "", "testing");
$output = '';
if(isset($_POST["query"]))
{
    $search = mysqli_real_escape_string($conn, $_POST["query"]);
    $query = "
  SELECT * FROM tec 
  WHERE TecID LIKE '%".$search."%'
  OR MebID LIKE '%".$search."%' 
  OR TecMail LIKE '%".$search."%' 
  OR Spc LIKE '%".$search."%' 
 ";
}
else
{
    $query = "
  SELECT * FROM tec ORDER BY TecID
 ";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
    $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Tec ID</th>
     <th>Member ID</th>
     <th>Tec Mail</th>
     <th>Tp NO</th>
     <th>Special</th>
     <th class="text-left">Actions</th>
    </tr>
 ';
    while($row = mysqli_fetch_array($result))
    {
        $output .= '
   <tr>
     
    <td>'.$row["TecID"].'</td>
    <td>'.$row["MebID"].'</td>
    <td>'.$row["TecMail"].'</td>
    <td>'.$row["TpNO"].'</td>
    <td>'.$row["Spc"].'</td>
    <td class="td-actions text-right">
             <a href="#" data-id="<?php echo '.$row['TecID'].' ;?>" 
            
             data-toggle="modal"  class="open"  data-target="#myModal"  ><span class="fa fa-plus">&nbsp;</span>Add</a>
                
                <?php $v=1; ?>
             
                  
            </td>
   </tr>
   
  ';

    }
    echo $output;
}
else
{
    echo 'Data Not Found';
}


        //Here a model for add Category is included
        include "./tem/myModal.php";

    echo $v;

?>


<!--<script>-->
<!--    //$(document).ready(function () {-->
<!--        $(".open").click(function () {-->
<!--            $('#firstName').val($(this).data('id'));-->
<!--            $('#myModal').modal('show');-->
<!--        });-->
<!--    });-->
<!---->
<!--    $(document).ready(function(){-->
<!--        $(".announce").click(function(){ // Click to only happen on announce links-->
<!--            $("#cafeId").val($(this).data('id'));-->
<!--            $('#createFormId').modal('show');-->
<!--        });-->
<!--    });-->
<!--</script>-->
<!---->
<!--<a class="btn btn-primary announce" data-toggle="modal" data-id="107" >Announce</a>-->