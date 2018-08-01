<!DOCTYPE html>
<html lang="en" >

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v4.5.0, mobirise.com">


    <meta charset="UTF-8">
    <meta name="description" content="البرنامج التدريبي لتوطين الوظائف بمحافظة جدة">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <meta name="keywords" content="tawteen, محافظة, برنامج, توظيف, جدة, توطين">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">

    <title> البرنامج التدريبي لتوطين الوظائف بمحافظة جدة</title>
    <link rel="stylesheet" href="../assets/et-line-font-plugin/style.css">
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/tether/tether.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/socicon/css/socicon.min.css">
    <link rel="stylesheet" href="../assets/dropdown/css/style.css">
    <link rel="stylesheet" href="../assets/theme/css/style.css">
    <link rel="stylesheet" href="../assets/mobirise/css/mbr-additional.css" type="text/css">
    <script src="../assets/web/assets/jquery/jquery.min.js"></script>
    <script src="../assets/tether/tether.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/smooth-scroll/SmoothScroll.js"></script>
    <script src="../assets/dropdown/js/script.min.js"></script>
    <script src="../assets/theme/js/script.js"></script>
    <script src="../assets/theme/js/slick.min.js"></script>

    <link rel="shortcut icon" href="../assets/ico/presentation.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/presentation1.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/presentation2.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="a../ssets/ico/presentation3.png">


    <!-- -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>


    <!-- -->

    <script src="assets/countdown/jquery.countdown.min.js"></script>


</head>

<body style="background-color: #ededed;" dir="rtl">
    
    <div>
        <a href="http://www.jeddahawards.org/tawteen"><img id="T1" class="img-fluid" style="padding-bottom: 0em;" src="../assets/images/header.jpg"></a>
    </div>


<?php
/* Attempt MySQL server connection. Assuming you are running MySQL


server with default setting (user 'root' with no password) */

$servername = "localhost";
$username = "akram";
$password = "K8XG-3Dd=%-S";
$dbname = "tawteen";

$link = mysqli_connect($servername, $username, $password, $dbname);
 mysqli_set_charset($link,"utf8");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
    
// Escape user inputs for security
$code = mysqli_real_escape_string($link, $_REQUEST['code']);
    
$sql = "SELECT * FROM individuals WHERE confirmation_code='$code' AND activated = 'YES'";
$result = $link->query($sql);
    
if ($result->num_rows > 0) {
    
    echo "<div class = 'container' style = 'margin-top: 100px; background-color: #426853; color: #fff'>
             <p class = 'pull-right' style = 'background-color: #426853; color: #fff'>قد تم تفعيل حسابكم مسبقًا.</p>
              </div>";
    
}
  

else {
    
    $sql = "SELECT * FROM individuals WHERE confirmation_code='$code'";


// attempt insert query execution

if(mysqli_query($link, $sql)){
    
    $sql = "UPDATE individuals
            SET activated = 'YES'
            WHERE confirmation_code='$code'";
    
    if(mysqli_query($link, $sql)){
        
        echo "<div class = 'container' style = 'margin-top: 100px; background-color: #426853; color: #fff'>
             <p class = 'pull-right' style = 'background-color: #426853; color: #fff'>لقد تم تفعيل حسابكم معنا.</p>
              </div>";
    }

    
} else {
    echo "<div class = 'container' style = 'margin-top: 100px; background-color: #426853; color: #fff'>
             <p class = 'pull-right' style = 'background-color: #426853; color: #fff'>حدث خطأ ما، الرجاء التأكد من رمز التأكيد مرة اخرى</p>
              </div>";
}
    
}



 
// close connection
mysqli_close($link);
?>


</body>

</html>