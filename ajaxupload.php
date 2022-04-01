<?php  include 'connect.php'; ?>
  <?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Get Variables From The Form
   $ImgName = $_FILES['img']['name'];
   $ImgSize = $_FILES['img']['size'];
   $ImgTmp  = $_FILES['img']['tmp_name'];
   $ImgType = $_FILES['img']['type'];

   $ImgError = array("jpeg", "jpg", "png", "gif");

   $Errorimg = strtolower($ImgName);
   $Endrror = explode('.', $Errorimg);
   $ImgNamerr = end($Endrror);

   $ImgName1 = $_FILES['img1']['name'];
   $ImgSize1 = $_FILES['img1']['size'];
   $ImgTmp1  = $_FILES['img1']['tmp_name'];
   $ImgType1 = $_FILES['img1']['type'];

   $Errorimg = strtolower($ImgName1);
   $Endrror = explode('.', $Errorimg);
   $ImgNamerr1 = end($Endrror);

   $ImgName2 = $_FILES['img2']['name'];
   $ImgSize2 = $_FILES['img2']['size'];
   $ImgTmp2  = $_FILES['img2']['tmp_name'];
   $ImgType2 = $_FILES['img2']['type'];

   $Errorimg = strtolower($ImgName2);
   $Endrror = explode('.', $Errorimg);
   $ImgNamerr2 = end($Endrror); 

   $ImgName3 = $_FILES['img3']['name'];
   $ImgSize3 = $_FILES['img3']['size'];
   $ImgTmp3  = $_FILES['img3']['tmp_name'];
   $ImgType3 = $_FILES['img3']['type'];

   $Errorimg = strtolower($ImgName3);
   $Endrror = explode('.', $Errorimg);
   $ImgNamerr3 = end($Endrror);

   $ImgName4 = $_FILES['img4']['name'];
   $ImgSize4 = $_FILES['img4']['size'];
   $ImgTmp4  = $_FILES['img4']['tmp_name'];
   $ImgType4 = $_FILES['img4']['type'];

   $Errorimg = strtolower($ImgName4);
   $Endrror = explode('.', $Errorimg);
   $ImgNamerr4 = end($Endrror);

   $name    =  $_POST['name'];
   $tage    =  $_POST['tage'];
   $text    =  $_POST['text'];
   $pric    =  $_POST['pric'];
   $dres    =  $_POST['address'];   
   $user    =  $_POST['username'];
   $moble   =  $_POST['moble'];



      // $formErrors = array();

      //   if (empty($name)) {
      //     $formErrors[] = 'اكتب <strong>اسم المنتج</strong>';
      //   }

      //   if (empty($pric)) {
      //     $formErrors[] = 'اكتب <strong>ثمن </strong>';
      //   }
      //     if (empty($moble)) {
      //     $formErrors[] = 'اكتب <strong>رقم الهاتف</strong>';
      //   }

      //     if (($dres)== 'اختر المدينة') {
      //     $formErrors[] = 'اختر  <strong> اسم مدينتك</strong>';
      //   }

      //     if (($tage) == 'اختار الفئات') {
      //     $formErrors[] = '<strong>اختر الفئة</strong> مثلان سيارات او الهواتف';
      //   }

      //   if (strlen($name) < 4) {
      //   $formErrors[] = 'ايجب يجب ان يكون اسم المنتج اكثر من<strong>4حروف</strong>';
      //   }
      //   if (strlen($name) > 21) {
      //   $formErrors[] = 'يجب ان يكون اسم المنتج اقلر من<strong>20حروف</strong>';
      //   }
      //   if (strlen($tage) < 10) {
      //     $formErrors[] = 'يجب ان يكون وصف المنتج اكثر<strong>20 حروف  </strong> على لاقل في ';
      //   }

      //    if (! empty($ImgName) && ! in_array($ImgNamerr, $ImgError)) {
      //    $formErrors[] = 'هذه ليست <strong>صورة</strong>';
      //    }

      //    if (! empty($ImgName1) && ! in_array($ImgNamerr1, $ImgError)) {
      //    $formErrors[] = 'هذه ليست <strong>صورة</strong>';
      //    }

      //    if (! empty($ImgName2) && ! in_array($ImgNamerr2, $ImgError)) {
      //    $formErrors[] = 'هذه ليست <strong>صورة</strong>';
      //    }

      //    if (! empty($ImgName3) && ! in_array($ImgNamerr3, $ImgError)) {
      //    $formErrors[] = 'هذه ليست <strong>صورة</strong>';
      //    }

      //    if (! empty($ImgName4) && ! in_array($ImgNamerr4, $ImgError)) {
      //    $formErrors[] = 'هذه ليست <strong>صورة</strong>';
      //    }



        // Loop Into Errors Array And Echo It

//        foreach($formErrors as $error) {
//          echo '<div class="alert alert-danger">' . $error . '</div>';
//        }

        // Check If There's No Error Proceed The Update Operation

      //  if (empty($formErrors)) {

                 /*زيادة في اسم الصور من اجل منع تشبه في الاسم*/
             if ($ImgName == ""){$my = $ImgName;} else {
              $my = rand(0, 66666666);
              $my .= $ImgName;
            }

            if ($ImgName1 == ""){$my1 = $ImgName1;} else {
              $my1 = rand(0, 66666666);
              $my1 .= $ImgName1; 
            }

            if ($ImgName2 == ""){$my2 = $ImgName2;} else {
              $my2 = rand(0, 66666666);
              $my2 .= $ImgName2; 
            }

            if ($ImgName3 == ""){$my3= $ImgName3;} else {
              $my3 = rand(0, 66666666);
              $my3 .= $ImgName3; 
            }

          if ($ImgName4 == ""){$my4 = $ImgName4;} else {
              $my4 = rand(0, 66666666);
              $my4 .= $ImgName4; 
            }
          /*انتهي زيادة في اسم الصورة*/
           
           $target = "upload/img/".basename($my);
           $target1 = "upload/img/".basename($my1);
           $target2 = "upload/img/".basename($my2);
           $target3 = "upload/img/".basename($my3);
           $target4 = "upload/img/".basename($my4);
 
          move_uploaded_file($ImgTmp,  $target);
          move_uploaded_file($ImgTmp1, $target1);
          move_uploaded_file($ImgTmp2, $target2);
          move_uploaded_file($ImgTmp3, $target3);
          move_uploaded_file($ImgTmp4, $target4);
            $ivs = 0;
             $stmt = $con->prepare("INSERT INTO items
                    (Name, City, Image, Image1, Image2, Image3, Image4,
                     Price, Tage, Add_Date, Descr, Username, Mobile, id_vi)
             VALUES  (:zname, :zdres, :zimg, :zimg1, :zimg2, :zimg3, :zimg4,
                      :zpric, :ztage, now(), :zdesc, :zuser, :zmoble, :zivs)"); 

          $stmt->execute(array(
              'zname'   =>  $name,
              'ztage'   =>  $tage,
              'zpric'   =>  $pric,
              'zimg'    =>  $my,
              'zimg1'   =>  $my1,
              'zimg2'   =>  $my2,
              'zimg3'   =>  $my3,
              'zimg4'   =>  $my4,
              'zuser'   =>  $user,
              'zdesc'   =>  $text,
              'zdres'   =>  $dres,
              'zmoble'  =>  $moble,
              'zivs'    =>  $ivs
        ));

          $count = $stmt->rowCount();

          if ($count == 1) {
           echo '<div class="btn btn-success btn-block">تم بنجاح</div>';
          } else {
            echo '<div class="alert alert-danger">Sorry This User Is Exist</div>';
          }
            
        // }
      }
    
  ?>
