<?php
require 'student/Controllers/first_controller.php';
session_start();

error_reporting(E_ERROR | E_WARNING | E_PARSE);

if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['first'])){
    
    $validate = new FirstController();
    if($validate->validate($_POST['seatNumber'] , $_POST['name'])){
      $_SESSION['name'] = $_POST['name'];
      $_SESSION['seatNumber'] = $_POST['seatNumber'];
      echo "<script> window.open('second.php','_self'); </script>";
    }
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
              <form id="msform" method="POST"">
                <!-- progressbar -->
                <ul id="progressbar">
                  <li class="active" id="account"><strong>الخطوةالأولي</strong></li>
                  <li id="personal"><strong>الخطوةالثانية</strong></li>
                  <li id="payment"><strong>الخطوةالثالثة</strong></li>
                  <li id="confirm"><strong>النهاية</strong></li>
                </ul> <!-- fieldsets -->

                <fieldset>
                    <div class="form-card">
                      <div class="row">
                        <div class="col-6">
                          <input type="text" name="name" placeholder="الاسم" />
                          <input type="text" name=" seatNumber" placeholder="رقم الجلوس" />
                          <input type="text" name="school" placeholder="المدرسة" />

                        </div>
                    <div class="col-6">
                   
                      <input type="text" name="chauffeured" placeholder="المساق" />
                      <div class="for-group">
                      <label for="" class="mt-4 ml-1" style="float:right;"> الوﻻيـــــة</label><br>
                      <select name="state" class="form-select form-select-sm  selection btn-sm btn btn-info mb-4" aria-label="Default select example" >
                       <option selected value="" >الخرطوم</option>
                       <option value="1">الجزيرة</option>
                       <option value="2">القضارف</option>
                       <option value="3">النيل اﻻبيض</option>
                       <option value="1">امدرمان</option>
                       <option value="2">البحر اﻻحمر</option>
                      </select>

                      </div>
                    </div>
                  </div>
                </div>
                  <input type="submit" name="first" class="next  action-button" value="الخطوة التالية " />
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