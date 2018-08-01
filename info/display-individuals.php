<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v4.5.0, mobirise.com">


    <meta charset="UTF-8">
    <meta name="description" content="برنامج محافظة جدة لتوطين الوظائف">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">

    <title> برنامج محافظة جدة لتوطين الوظائف</title>
    
    <style>
        
        @import url(http://fonts.googleapis.com/earlyaccess/droidarabickufi.css);
    * {
        font-family: 'Droid Arabic Kufi', serif !important;
        font-size: 16px;
        font-weight: 600;
    }
            
   
    
    
        </style>
   


</head>

<body style="background-color: #ffffff;" dir="rtl">



    <div>
        <a href="http://jeddahtawteen.org"><img id="T1" class="img-fluid" style="padding-bottom: 0em;" src="../assets/images/header.jpg"></a>
    </div>
    
        <div class = "container"><ul class="nav nav-tabs nav-fill mt-5">
              <li class="nav-item">
                <a class="nav-link active" href="#">أفراد</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="display-corporations.php">مؤسسات</a>
              </li>
        </ul></div>
        
    <?php
    
            error_reporting(0);
            session_start();
    
            if($_SESSION["privilege"] == "admin"){

            $servername = "localhost";
            $username = "akram";
            $password = "K8XG-3Dd=%-S";
            $dbname = "tawteen";

            $MySQL_Handle = mysqli_connect($servername,$username,$password,$dbname) 
            or die ( mysqli_error($MySQL_Handle) ); 

            $sSQL= 'SET CHARACTER SET utf8'; 

            mysqli_query($MySQL_Handle,$sSQL) 
            or die ('Can\'t charset in DataBase');
            if (empty($_GET['page'])) {
                $page = 1;
              }
              else {
                $page = $_GET['page'];
              }
              $items = 100; 
              $offset = ($page * $items) - $items;
            $sql = "SELECT * FROM individuals LIMIT $items OFFSET $offset";
            $result = $MySQL_Handle->query($sql);

            if ($result->num_rows > 0) {

                echo "<div class = 'container-fluid text-center mt-5'><table class = 'table table-hover table-responsive text-center'>
                    <thead class='thead-light'><tr><th scope='col'>ID #</th><th scope='col'>الاسم</th><th scope='col'>الجنس</th><th scope='col'>تاريخ الميلاد</th><th scope='col'>الهوية</th><th scope='col'>العنوان</th><th scope='col'>البريد الإلكتروني</th><th scope='col'>رقم الجوال</th><th scope='col'>دولة التعليم</th><th scope='col'>مؤسسة التعليم</th><th scope='col'>الدرجة العلمية</th><th scope='col'>الكلية</th><th scope='col'>التخصص</th><th scope='col'>تاريخ الحصول على الدرجة العلمية</th><th scope='col'>الخبرة</th><th scope='col'>المسمى الوظيفي</th><th scope='col'>المجال</th><th scope='col'>السيرة الذاتية</th><th scope='col'>تفعيل</th></tr></thead>";

                while($row = $result->fetch_assoc()) {
                    echo "<tr class=''>
                    <th scope='row'> " . $row['id'] . "
                    <td>" . $row['name'] . "
                    <td>" . $row['gender'] . "
                    <td>" . $row['birthdate'] . "
                    <td>" . $row['identity'] . "
                    <td>" . $row['address'] . "
                    <td>" . $row['email'] . "
                    <td>" . $row['mobile'] . "
                    <td>" . $row['edu_country'] . "
                    <td>" . $row['edu_institute'] . "
                    <td>" . $row['degree'] . "
                    <td>" . $row['college'] . "
                    <td>" . $row['major'] . "
                    <td>" . $row['degree_date'] . "
                    <td>" . $row['experience'] . "
                    <td>" . $row['position'] . "
                    <td>" . $row['field'] . "
                    <td><a class = 'btn btn-default' href = '../uploads/" . $row['cv'] . "'>تحميل </a>  
                    <td>" . $row['activated'] . "
                    </tr>";
                }
            } else {
                echo "<div class = 'my-5 text-center display-3'>لا توجد هناك نتائج حاليًا</div>";
            }
            $MySQL_Handle->close();
            }

            else {
                echo "<div class = 'container text-center'><div class='alert alert-danger' role='alert'>
                    غير مصرح لك بالدخول هنا
              </div></div>";
            }



              echo "</tbody>
            </table>
            </div>";

    ?>
     <div class = "container my-5">
         <div class = "row justify-content-between">
            <div class = "col-3 order-2">                     
                <a class = "btn btn-default btn-success" style = "background-color: #466653; color: #d8b92b;" href="display-individuals.php?page=<?php echo $page + 1; ?>">الصفحة التالية</a>
            </div>
            <div class = "col-3 order-1">
                <?php if ($page != 1) { ?>
                    <a class = "btn btn-default btn-success" style = "background-color: #466653; color: #d8b92b;" href="display-individuals.php?page=<?php echo $page - 1; ?>">الصفحة السابقة</a>
                <?php } ?>
            </div>
        </div>
     </div> 

    <!-- footer -->

    <!-- #a00d1a -->
    <section data-rv-view="15" style="background-color: #1d392a;" id="timea" class="Images mbr-section mbr-section--no-padding">
        <div class="container">
            <img id="T1" style="padding-bottom: 0em; " src="../assets/images/footercopyr.jpg" class="img-fluid">
        </div>


    </section>



</body>





</html>