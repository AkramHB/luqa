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

    <title> بوابة التسجيل</title>
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
$companyName = mysqli_real_escape_string($link, $_REQUEST['companyName']);
$repName = mysqli_real_escape_string($link, $_REQUEST['repName']);
$repPosition = mysqli_real_escape_string($link, $_REQUEST['repPosition']);
$instField = mysqli_real_escape_string($link, $_REQUEST['instField']);
if(strcmp($instField,"other") == 0){
    $instField = mysqli_real_escape_string($link, $_REQUEST['other_instField']);
}
$vacant_Jobs = mysqli_real_escape_string($link, $_REQUEST['vacant_Jobs']);
$vacant_Jobs_more_info = '';
if(strcmp($vacant_Jobs,"مدير مركز ومعرض تجاري") == 0){
    $vacant_Jobs_more_info = mysqli_real_escape_string($link, $_REQUEST['managerInput']);
}
else if(strcmp($vacant_Jobs,"مشرف معرض ومركز تجاري") == 0){
    $vacant_Jobs_more_info = mysqli_real_escape_string($link, $_REQUEST['supervisorInput']);
}
else if(strcmp($vacant_Jobs,"محاسب مبيعات كاشير") == 0){
    $vacant_Jobs_more_info = mysqli_real_escape_string($link, $_REQUEST['accountantInput']);
}
else if(strcmp($vacant_Jobs,"بائع تجزئة") == 0){
    $vacant_Jobs_more_info = mysqli_real_escape_string($link, $_REQUEST['sellerInput']);
}
else if(strcmp($vacant_Jobs,"عارض منتجات ومصفف ارفف") == 0){
    $vacant_Jobs_more_info = mysqli_real_escape_string($link, $_REQUEST['exhibitorInput']);
}
else if(strcmp($vacant_Jobs,"مسؤول علاقات عامة") == 0){
    $vacant_Jobs_more_info = mysqli_real_escape_string($link, $_REQUEST['administratorRelInput']);
}
else if(strcmp($vacant_Jobs,"أخصائي بصريات") == 0){
    $vacant_Jobs_more_info = mysqli_real_escape_string($link, $_REQUEST['opticsSpecialist']);
}
else if(strcmp($vacant_Jobs,"فني بصريات") == 0){
    $vacant_Jobs_more_info = mysqli_real_escape_string($link, $_REQUEST['opticsTechnical']);
}
else if(strcmp($vacant_Jobs,"بائع بصريات") == 0){
    $vacant_Jobs_more_info = mysqli_real_escape_string($link, $_REQUEST['opticsSeller']);
}
else if(strcmp($vacant_Jobs,"مسؤول إدارة مخزون") == 0){
    $vacant_Jobs_more_info = mysqli_real_escape_string($link, $_REQUEST['administratorManInput']);
}
else {
    $vacant_Jobs_more_info = mysqli_real_escape_string($link, $_REQUEST['otherInput']);
}
$address = mysqli_real_escape_string($link, $_REQUEST['address']); 
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$mobile = mysqli_real_escape_string($link, $_REQUEST['mobile']); 
$phone = mysqli_real_escape_string($link, $_REQUEST['phone']);
$confirm_code = rand(10000000, 99999999);



if($companyName == "" || $repName == "" || $repPosition == "" || $instField == "" ||  $vacant_Jobs == "" || $address == "" || $email == "" || $mobile == ""){
              echo "<div class = 'container' style = 'position:absolute; left: 50%; top: 50%; transform: translate(-50%, -50%);'><h3 style = 'color: red;'>حدث خطأ ما، الرجاء التأكد من ادخال جميع البيانات بشكل صحيح</h3></div>";
              die();
              }
    

$sql = "INSERT INTO corporations (name, rep_name, rep_position, institution_field, vacant_job, vacant_job_more_info, address, email, mobile, phone, confirmation_code) VALUES ('$companyName', '$repName', '$repPosition', '$instField', '$vacant_Jobs','$vacant_Jobs_more_info', '$address', '$email', '$mobile', '$phone', '$confirm_code')";


// attempt insert query execution

if(mysqli_query($link, $sql)){
    
    $to = $email;
    $subject = 'تم تسجيلكم في برنامج جدة توطين';
    $text = 'عزيزي ' .  $name . "<br>";
    $text .= 'لقد تم تسجيلكم في برنامج جدة توطين ' . "<br>";
    $text .= 'بيانات طلبكم كالاتي: ' . "<br>";
    $text .= 'الاسم ' .  $name . "<br>";
    $text .= 'البريد الالكتروني ' .  $email . "<br>";
    $text .= 'رقم الجوال ' .  $mobile . "<br>";
    $text .= 'العنوان ' .  $address . "<br>";
    $text .= '<div>رمز التأكيد: <span style = "color: red; font-size: 20px;">' . $confirm_code . '</span></div>';
    $text .= '<div>:الرجاء تأكيد حسابك عن طريق ادخال رمز التأكيد في الرابط التالي</div>';
    $text .= '<div>http://jeddahtawteen.org/auth/conf_regis_cor.html</div>';

    $from = "info@jeddahtawteen.org";
    // Always set content-type when sending HTML email
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";

    // More headers
    $headers .= 'From: ' . $from . "\r\n";
    
    $header=$headers;
    
    mail($to, $subject, $text, $header);
    
    include("includeSettings.php");	
    		//يحتوي هذه الملف على جميع الإعدادات الخاصه ببوابات الإرسال



$myMobile = "Jeddahtawteen";							//رقم الجوال (إسم المستخدم) في موبايلي
$password = "adgj1235";							//كلمة المرور في موبايلي

$numbers = $mobile;							//يجب كتابة الرقم بالصيغة الدولية مثل 96650555555 وعند الإرسال إلى أكثر من رقم يجب وضع الفاصلة (,) وهي التي عند حرف الواو بين كل رقمين 


$sender = "Jeddah Tawteen";					//اسم المرسل الذي سيظهر عند ارسال الرساله، ويتم تشفيره إلى  بشكل تلقائي إلى نوع التشفير (urlencode)

										//لا يوجد عدد محدد من الأرقام التي يمكنك الإرسال لها في حال تم الإرسال من خلال بوابة fsockpoen  أو بوابة CURL،
										//ولكن في حال تم الإرسال من خلال بوابة fOpen ، فإنه يمكنك الإرسال إلى 120 رقم فقط في كل عملية إرسال

$msg = "تم تسجيلكم في برنامج جدة توطين";		/*
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


    
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>

<script>alert('شكرًا لتسجيلك معنا.');
        window.location="index.html";
</script>

</body>

</html>