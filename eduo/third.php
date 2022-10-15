<?php
require 'student/Controllers/third_controller.php';
//require 'student/Controllers/second_controller.php';

session_start();
$user_seat = $_SESSION['seatNumber'];
$res = new ThirdController;
// die($user_seat);
if($res->getUserData($user_seat)){
     $result = $res->getUserData($user_seat);
    }     

if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['delete'])){
  $target = $_POST['delete'];
  $dat = new ThirdController();
  if($dat->getFinal($target,$user_seat)){
    //die($target);
    $result1 = $dat->getFinal($target,$user_seat);
    echo "<script> window.open('_self'); </script>";
  }
}
 if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['finish'])){
          echo '<script type = "text/javascript">';
          echo 'alert("تمت عملية التقديم بنجاح")';
          echo '</script>';
          echo "<script> window.open('index.php','_self'); </script>";
  }

?>

<!DOCTYPE html>
<head>
<meta  charset="utf-8">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>التقديم الإلكتروني </title>
  <link rel="stylesheet" type="text/css" href="bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" />
  <link rel="stylesheet" type="text/css" href="bootstrap.min.js" />
  <link rel="stylesheet" type="text/css" href="pagetest.css" />
</head>
<body>
  <!-- MultiStep Form -->
  <div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
      <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
        <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
          <h2><strong class="strong">التقديم الإلكتروني للجامعات الحكومية</strong></h2>
          <p class="strong">أستخدم جميع الخطوات</p>
          <div class="row">
            <div class="col-md-12 mx-0">

            <form id="msform" method="POST">
                <!-- progressbar -->
                <ul id="progressbar">
                  <li class="active" id="account"><strong>الخطوةالأولي</strong></li>
                  <li class="active" id="personal"><strong>الخطوةالثانية</strong></li>
                  <li class="active" id="payment"><strong>الخطوةالثالثة</strong></li>
                  <li id="confirm"><strong>النهاية</strong></li>
                </ul> <!-- fieldsets -->
                <fieldset>
                  
                  <table class="table table-border" >
                    <thead>
                      <tr style="color:Dodgerblue">
                      <th scope="col">الترتيب</th>
                          <th scope="col">الجامعة</th>
                          <th scope="col">الكلية</th>
                          <th scope="col">التخصص</th>
                          <th scope="col"> حذف رغبة</th>  
                      </tr>
                    </thead>
                    <tbody>
                    <?php $counter=1;?>
                          <?php foreach($result as $row):?>
                            <tr>
                            <td><?php echo $counter?></td>
                              <td><?php echo $row['University_name'] ?> </td>
                              <td><?php echo $row['Collage']?> </td>
                              <td><?php echo $row['Desire']?> </td>
                              
                              <td style="color:red"><input type="submit" name="delete" class="next action-button " style = 'color:white' value="<?php echo $row['Desire']?>"> <?php  echo 'حذف'; ?></td>
                              <?php $counter++;?>                              
                              <?php endforeach ?>
                            </tr>
                    </tbody>
                  </table>
                  <p style="color:Blue">
                    اقر انا الطالب المقدم علي التقديم علي صحة و التاكيد علي البيانات التي قمت بملأها
                    <input type="checkbox" name="check" id="inlineRadio1" checked required/>  
                  </p>  
                   <input type="submit" name="previous" class="previous  action-button-previous  btn btn-sm" value="السابق" />
                  <input type="submit" name="finish" class="next action-button" value="تاكيد" />

                  
                </fieldset>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="jquery-3.3.1.min.js"></script>
  <script src="bootstrap.min.js"></script>
  <script src="page.js"></script>
</body>

</html>        