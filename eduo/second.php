<?php

require 'student/Controllers/second_controller.php';
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$user_name = $_SESSION['name'];
$user_seat = $_SESSION['seatNumber'];
//$result1 = null;
if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['add'])){
  $data = new SecondController();
  if($data->show($user_seat,$_POST['percent'])){
    $result = $data->show($user_seat,$_POST['percent']); 
    foreach($result as $raw){
    $percent = $raw['Result'];
    }
    $studentResult = $percent;
    $dataP = new SecondController();
    if($dataP->percentage($studentResult)){
      $result1 = $dataP->percentage($studentResult); 
    } 
  }
}

if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['second'])){
  $send = new SecondController();
  if($send->show($user_seat,$_POST['percent'])){
    $result = $send->show($user_seat,$_POST['percent']); 
    foreach($result as $raw){
    $percent = $raw['Result'];
    }
    $studentResult = $percent;
  $send->addDesire($user_seat,$send->percentage($studentResult));
  echo "<script> window.open('third.php','_self'); </script>";
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

              
                <!-- progressbar -->
                <ul id="progressbar">

                  <li class="active" id="account"><strong>الخطوةالأولي</strong></li>
                  <li class="active" id="personal"><strong>الخطوةالثانية</strong></li>
                  <li id="payment"><strong>الخطوةالثالثة</strong></li>
                  <li id="confirm"><strong>النهاية</strong></li>

                </ul> <!-- fieldsets -->
            
                <fieldset>
                <form id="msform" method="POST">
                  <div class="form-card">
                    <div class="row">
                      <div class="col-4">
                          <div class="form-group">
                            <input type="text" name="name" value="<?php echo $user_name ?>" >
                          </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          <input type="text" name="seatNumber " value="<?php echo $user_seat ?>" >
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          <input type="number_format" name="percent" placeholder="النسبة المحرزة" value="<?php echo $_POST['percent']?>" required >
                        </div>
                      </div>
                    </div>
                      <strong dir="rtl" style="float:right; color:Dodgerblue;">اخترع نوع التقديم</strong>
                      <hr>
                    <div class="row" style="margin-right:3px">
                    
                      <div class="form-check form-check-inline bordered">
                        <input class="form-check-input" type="radio" name="radio" id="inlineRadio1" value=" تقديم لبكالريوس ">
                        <label class="form-check-label text-label" for="inlineRadio1">تقديم لبكالريوس</label>
                      </div>
                      <div class="form-check form-check-inline bordered">
                        <input class="form-check-input" type="radio" name="radio" id="inlineRadio2" value=" تقديم لدبلوم ">
                        <label class="form-check-label text-label" for="inlineRadio2">تقديم لدبلوم</label>
                      </div>
                      <div class="form-check form-check-inline bordered">
                        <input class="form-check-input" type="radio" name="radio" id="inlineRadio3" value=" تقديم وﻻئي " >
                        <label class="form-check-label text-label" for="StateSubmitting">تقديم وﻻئي</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6">

                        <div class="for-group">

                          <label for="" class="mt-4 ml-1" style="float:right;color:Dodgerblue"> اختر نوع المؤسسة</label><br>
                          <select name="HighEducation" class="form-select form-select-sm  selection btn-sm btn btn-info mb-4" aria-label="Default select example" >

                           <option selected value=" مؤسسة التعليم العالي الحكومية " >مؤسسة التعليم العالي الحكومية</option>

                          </select>
                        </div>

                      </div>
                      <div class="col-6">
                        <div class="for-group">

                          <label for="" class="mt-4 ml-1" style="float:right; color:Dodgerblue;"> اختر الجامعة</label><br>
                          <select name="university_name" class="form-select form-select-sm  selection btn-sm btn btn-info mb-4" aria-label="Default select example" >

                           <option selected value="جامعة السودان للعلوم والتكنولوجيا" >جامعة السودان للعلوم والتكنولوجيا</option>
                           <option selected value="جامعة السودان للعلوم والتكنولوجيا" >جامعةالخرطوم </option>
                           <option selected value="جامعة السودان للعلوم والتكنولوجيا" >جامعة   النيللين</option>
                           <option selected value="جامعة السودان للعلوم والتكنولوجيا" >جامعة الجزيرة  </option>

                          </select>
                        </div>
                      </div>
                    </div>
                    <!--<div class="row">
                      <div class="col-3">
                        <p class="">اسم الكلية</p>
                      </div>
                      <div class="col-6 ml-3">
                        <div class="for-group">

                          <select name="desire" class="form-select form-select-sm  selection btn-sm btn btn-info mb-4 " style="float:right" aria-label="Default select example" >

                           <option selected value ="نظم معلومات"> كلية علوم الحاسوب وتقانة المعلومات /نظم معلومات </option>
                            <option selected value="نظم الحاسوب والشبكات" > كلية علوم الحاسوب وتقانة المعلومات /نظم الحاسوب والشبكات </option>
                             <option selected value="تقانة المعلومات" > كلية علوم الحاسوب وتقانة المعلومات /تقانة المعلومات </option>
                              <option selected value="هندسة البرمجيات" > كلية علوم الحاسوب وتقانة المعلومات /هندسة البرمجيات </option>
                               <option selected value="علوم الحاسوب" > كلية علوم الحاسوب وتقانة المعلومات / علوم الحاسوب </option>
                                <option selected value="الطب والجراحه" > كلية الطب / الطب والجراحه </option>
                                 <option selected value="  طب الاسنان" > كلية الطب / طب الأسنان </option>
                                  <option selected value="الصيدلة" > كلية الصيدلة </option>
                                  <option selected value=" علوم المختبرات الطبية" > كلية علوم المختبرات الطبية / علوم المختبرات الطبية  </option>
                                  <option selected value=" تكنولوجيا الأشعة التشخيصية" > كلية علوم الأشعة الطبية/ تكنولوجيا الأشعة التشخيصية </option>
                                  <option selected value="تكنولوجيا العلاج بالأشعة " >  كلية علوم الأشعة الطبية/تكنولوجيا العلاج بالأشعة  </option>
                                  <option selected value="الفيزياء" >  كلية العلوم / الفيزياء </option>
                                  <option selected value="الإحصاء" > كلية العلوم / الإحصاء </option>
                                  <option selected value="الجيولوجيا" > كلية العلوم / الجيولوجيا </option>
                                  <option selected value="الكيمياء الحيوية " > كلية العلوم / الكيمياء الحيوية  </option>
                                  <option selected value="الكيمياء" > كلية العلوم / الكيمياء  </option>
                          </select>
                        </div>
                      </div>
                    </div> -->                   
                  <input type="submit" name="previous" class="previous action-button-previous btn btn-sm" value="السابق" />
                  <input type="submit" name="add" class="next action-button" value="عرض الرغبات" />
                  <input type="submit" name="second" class="next action-button" value="التالي" />
                  </form>
                  
                </fieldset>
              
                <fieldset>
                    <table class="table table-border" >
                      <thead style="color:Dodgerblue">
                          <th scope="col">الترتيب </th>
                          <th scope="col">الجامعة</th>
                          <th scope="col">الكلية</th>
                          <th scope="col">التخصص</th>
                          <th scope="col"> النسبة السابقة</th>
                          
                      </thead>
                      <tbody>
                        <?php if(isset($_POST['add']) AND $result1):?>
                          <?php $counter=1;?>
                            <?php foreach($result1 as $row):?>
                            <tr>
                              <td><?php echo $counter?></td>
                              <td><?php echo $row['University'] ?> </td>
                              <td><?php echo  $row['College']  ?> </td>
                              <td><?php echo  $row['University major']  ?> </td>
                              <td><?php echo  $row['Percent']  ?> </td>
                              <?php $counter++;?>
                            <?php endforeach ?>
                        <?php endif ?>
                      </tbody>
                    </table>
                </fieldset>
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

                
                
