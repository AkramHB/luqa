<!DOCTYPE html>
<html lang="en" >

<head>

    <meta charset="UTF-8">
    <meta name="description" content="برنامج محافظة جدة لتوطين الوظائف">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">

    <title> نموذج تأكيد الحضور</title>
    <link rel="stylesheet" href="assets/et-line-font-plugin/style.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="assets/tether/tether.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/socicon/css/socicon.min.css">
    <link rel="stylesheet" href="assets/dropdown/css/style.css">
    <link rel="stylesheet" href="assets/theme/css/style.css">
    <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
    <script src="assets/web/assets/jquery/jquery.min.js"></script>
    <script src="assets/tether/tether.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/smooth-scroll/SmoothScroll.js"></script>
    <script src="assets/dropdown/js/script.min.js"></script>
    <script src="assets/theme/js/script.js"></script>
    <script src="assets/theme/js/slick.min.js"></script>




    <!-- -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>


    <!-- -->

    <script src="assets/countdown/jquery.countdown.min.js"></script>



    <!-- popup -->

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>


</head>

<body>


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
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$identity = mysqli_real_escape_string($link, $_REQUEST['idnum']);
$mobile = mysqli_real_escape_string($link, $_REQUEST['mobilenum']); 
$email = mysqli_real_escape_string($link, $_REQUEST['email']);


     

if($name == ""  || $identity == "" ||  $email == "" || $mobile == "" ){
              echo "<div class = 'container' style = 'position:absolute; left: 50%; top: 50%; transform: translate(-50%, -50%);'><h3 style = 'color: red;'>حدث خطأ ما، الرجاء التأكد من ادخال جميع البيانات بشكل صحيح</h3></div>";
              die();
              }

        $sql = "SELECT * FROM confirm WHERE identity='$identity' AND email = '$email'";
        $result = $link->query($sql);
                  
        if ($result->num_rows > 0) {
                  
            echo "<script>alert('لقد تم تسجيل طلبكم من قبل، شكرًا لكم.');
        window.location='index.html';
</script>";
                  
         }
    

else{
$sql = "INSERT INTO confirm (name,idnum, mobilenum,email ) VALUES ('$name', '$identity', '$mobile', '$email')";



// attempt insert query execution

if(mysqli_query($link, $sql)){
    
    $to = $email;
    $subject = 'تم تأكيد طلب التدريب في البرنامج التدريبي لتوطين الوظائف بمحافظة جدة بنجاح';
    $text = 'عزيزي/عزيزتي  ' .  $name . "<br>";
    $text .= ' تم تأكيد موعد المقابلة ' . "<br>";
    $text .= 'بيانات طلبكم كالاتي: ' . "<br>";
    $text .= 'الاسم ' .  $name . "<br>";
    $text .= 'البريد الالكتروني ' .  $email . "<br>";
    $text .= 'رقم الجوال ' .  $mobile . "<br><br> jeddahtawteen.org<br>
    
    ";



    $from = "info@jeddahtawteen.org";
    // Always set content-type when sending HTML email
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";

    // More headers
    $headers .= 'From: ' . $from . "\r\n";
    
    $header=$headers;
    
    mail($to, $subject, $text, $header);
    
    include("includeSettings.php");
    
        $myMobile = "Jeddahtawteen";							//رقم الجوال (إسم المستخدم) في موبايلي
        $password = "adgj1235";							//كلمة المرور في موبايلي

        $numbers = $mobile;							//يجب كتابة الرقم بالصيغة الدولية مثل 96650555555 وعند الإرسال إلى أكثر من رقم يجب وضع الفاصلة (,) وهي التي عند حرف الواو بين كل رقمين 


        $sender = "Jeddahtawteen";					//اسم المرسل الذي سيظهر عند ارسال الرساله، ويتم تشفيره إلى  بشكل تلقائي إلى نوع التشفير (urlencode)

                                                //لا يوجد عدد محدد من الأرقام التي يمكنك الإرسال لها في حال تم الإرسال من خلال بوابة fsockpoen  أو بوابة CURL،
                                                //ولكن في حال تم الإرسال من خلال بوابة fOpen ، فإنه يمكنك الإرسال إلى 120 رقم فقط في كل عملية إرسال

        $msg = "تم تأكيد طلب التدريب في البدنامج التدريبي لتوطين الوظائف بمحافظة جدة بنجاح ";		/*
                                                نص الرسالة
                                                الرساله العربيه  70 حرف
                                                الرساله الانجليزيه 160 حرف
                                                في حال ارسال اكثر من رساله عربيه فان الرساله الواحده تحسب 67
                                                والرساله الانجليزي 153
                                                */

        $MsgID = rand(1,99999);					//رقم عشوائي يتم إرفاقه مع الإرساليه، في حال الرغبة بإرسال نفس الإرساليه في أقل من ساعه من إرسال الرساله الأولى.
                                                //موقع موبايلي يمنع تكرار إرسال نفس الرساله خلال ساعه من إرسالها، إلا في حال تم إرسال قيمة مختلفه مع كل إرساليه.

        $timeSend = 0;							//لتحديد وقت الإرساليه - 0 تعني الإرسال الآن
                                                //الشكل القياسي للوقت هو hh:mm:ss

        $dateSend = 0;							//لتحديد تاريخ الإرساليه - 0 تعني الإرسال الآن
                                                //الشكل القياسي للتاريخ هو mm:dd:yyyy

        $deleteKey = 152485;					//يمكنك من خلال هذه القيمة  القيمه يمكنك من خلالها حذف الرساله من خلال بوابة حذف الرسائل.
                                                //يمكنك تحديد رقم واحد لمجموعه من الإرساليات، بحيث يتم حذفها دفعه واحده.

        $resultType = 1;						//دالة تحديد نوع النتيجه الراجعه من البوابة
                                                //0: إرجاع نتيجة البوابة بشكل عددي
                                                //1: إرجاع نتيجة البوابة بشكل نصي											

        // دالة الإرسال
        sendSMS($myMobile, $password, $numbers, $sender, $msg, $MsgID, $timeSend, $dateSend, $deleteKey, $resultType);

        echo "<script>alert('شكرًا لتأكيد طلبك في البرنامج التدريبي لتوطين الوظائف بمحافظة جدة.');
        window.location='index.html';
</script>";
    
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}
 
// close connection
mysqli_close($link);
?>



</body>

</html>