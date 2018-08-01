<!DOCTYPE html>
<html lang="en" >

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

<body dir = "rtl">


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
$name = mysqli_real_escape_string($link, $_REQUEST['firstName']) . ' ' . mysqli_real_escape_string($link, $_REQUEST['medianName']) . ' ' . mysqli_real_escape_string($link, $_REQUEST['lastName']);
$gender = mysqli_real_escape_string($link, $_REQUEST['gender']);
$birthdate = mysqli_real_escape_string($link, $_REQUEST['day']) . '/' . mysqli_real_escape_string($link, $_REQUEST['month']) . '/' . mysqli_real_escape_string($link, $_REQUEST['year']);
$identity = mysqli_real_escape_string($link, $_REQUEST['idnum']);
$address = mysqli_real_escape_string($link, $_REQUEST['address']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$mobile = mysqli_real_escape_string($link, $_REQUEST['mobile']); 
$edu_country = mysqli_real_escape_string($link, $_REQUEST['edu_country_id']);
$edu_institue = mysqli_real_escape_string($link, $_REQUEST['uniName']); 
$degree = mysqli_real_escape_string($link, $_REQUEST['degree_level']); 
$college = mysqli_real_escape_string($link, $_REQUEST['college']);
$major = mysqli_real_escape_string($link, $_REQUEST['major_subject']);
if(strcmp($major,"other") == 0){
    $major = mysqli_real_escape_string($link, $_REQUEST['other_major_subject']);
}
$degree_date = mysqli_real_escape_string($link, $_REQUEST['degree_day']) . '/' .  mysqli_real_escape_string($link, $_REQUEST['degree_month']) . '/' .  mysqli_real_escape_string($link, $_REQUEST['degree_year']); 
$experience = mysqli_real_escape_string($link, $_REQUEST['total_experience']);
$position = mysqli_real_escape_string($link, $_REQUEST['position']); 
$field = mysqli_real_escape_string($link, $_REQUEST['field']);
if(strcmp($field,"other") == 0){
    $field = mysqli_real_escape_string($link, $_REQUEST['other_field']);
}
$confirm_code = rand(10000000, 99999999);
$temp = explode(".", $_FILES["cv"]["name"]);
$newfilename = $confirm_code . '.' . end($temp);
$dst = "./uploads/";
move_uploaded_file($_FILES["cv"]["tmp_name"], $dst . $newfilename);
$cv = $newfilename;

     

if($name == "" || $gender == "" || $birthdate == "" || $identity == "" || $address == "" || $email == "" || $mobile == "" || $edu_country == "" || $edu_institue == "" || $degree == "" || $college == "" || $major == "" || $degree_date == "" || $experience == "" || $position == "" || $field == ""){
              echo "<div class = 'container' style = 'position:absolute; left: 50%; top: 50%; transform: translate(-50%, -50%);'><h3 style = 'color: red;'>حدث خطأ ما، الرجاء التأكد من ادخال جميع البيانات بشكل صحيح</h3></div>";
              die();
              }

        $sql = "SELECT * FROM individuals WHERE identity='$identity' AND email = '$email'";
        $result = $link->query($sql);
                  
        if ($result->num_rows > 0) {
                  
            echo "<script>alert('لقد تم تسجيل طلبكم من قبل، شكرًا لكم.');
        window.location='index.html';
</script>";
                  
         }
    

else{
$sql = "INSERT INTO individuals (name, gender, birthdate, identity, address, email, mobile, edu_country, edu_institute, degree, college, major, degree_date, experience, position, field, cv, confirmation_code) VALUES ('$name', '$gender', '$birthdate', '$identity', '$address', '$email','$mobile', '$edu_country', '$edu_institue', '$degree', '$college', '$major', '$degree_date', '$experience', '$position', '$field', '$cv', '$confirm_code')";



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
    $text .= '<div>http://jeddahtawteen.org/auth/conf_regis_ind.html</div>';



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


        $sender = "Jeddah Tawteen";					//اسم المرسل الذي سيظهر عند ارسال الرساله، ويتم تشفيره إلى  بشكل تلقائي إلى نوع التشفير (urlencode)

                                                //لا يوجد عدد محدد من الأرقام التي يمكنك الإرسال لها في حال تم الإرسال من خلال بوابة fsockpoen  أو بوابة CURL،
                                                //ولكن في حال تم الإرسال من خلال بوابة fOpen ، فإنه يمكنك الإرسال إلى 120 رقم فقط في كل عملية إرسال

        $msg = "تم تسجيلكم في برنامج جدة توطين بنجاح";		/*
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

        echo "<div>
             <a href='http://jeddahtawteen.org'><img class='img-fluid' style='padding-bottom: 0em;' src='../assets/images/header.jpg'></a>
        </div>";

        $sentence = '';
        $link = '';
        $features='http://jeddahtawteen.org/features.html';
        if($gender == 'male'){
            $sentence = 'المقابلات الشخصية للبرنامج التدريبي سوف تكون من يوم الاثنين ٢٤ ذو القعدة ١٤٣٩ هـ يوم الاثنين ٢ ذو الحجة ١٤٣٩ هـ يوميا من الساعة 10 صباحا الى ١ ظهرا  بمقر  البرنامج التدريبي لتوطين الوظائف بفرع جامعة جدة في الفيصلية ( بنين) 
            ) 
  
          ملاحظة: لا توجد مقابلات يومي الجمعة و السبت<br> 

            موقع المقابلات الشخصية<br>';
            $link = 'https://maps.google.com/?q=21.580778,39.168953';
        }else {
            $sentence = 'المقابلات الشخصية النسائية للبرنامج التدريبي سوف تكون من يوم الثلاثاء  ١٨ ذو القعدة ١٤٣٩ هـ الى يوم الاثنين ٢ ذو الحجة ١٤٣٩ هـ يوميا من الساعة 10 صباحا الى 2 ظهرا  بالمقر النسائي للبرنامج التدريبي لتوطين الوظائف بفرع جامعة جدة في الفيصلية ( بنين) 

            يمكنكم الحضور خلال هذي الفترة لإجراء المقابلة<br> 
            موقع المقابلات الشخصية ';
            $link = 'https://maps.google.com/?q=21.580778,39.168953';
        }

        echo "<div class = 'container text-center my-5'><div class='alert alert-success' role='alert'>
                شكرًا لتسجيلكم معنا٬ من فضلك الرجاء الاطلاع على الجدول المخصص لكم <br> " . $sentence . "<br> <a href = '" . $link . "'>الموقع </a>   <br>  و للاطلاع على مميزات الشركات الموظفة يمكنك زيارة الرابط التالي:
<br><a href='".$features."'>رابط المميزات</a><br>  
              </div></div>";

       /* echo "<div class = 'container text-center mt-5'>مواعيد الرسائل (رجال)
            <table class = 'table table-striped table-hover table-responsive text-center'>
            <thead class='thead-light'><tr><th scope='col'>م</th><th scope='col'>التاريخ</th><th scope='col'>نوع الرسالة</th><th scope='col'>الوسيلة</th><th scope='col'>المرسل إليهم</th></tr></thead>
            <tr><th scope='row'>1</th><td>24-10-1439</td><td>اخبار بموعد المقابلات</td><td>نصية - جوال</td><td>جميع المسجلين في المنصه</td></tr>
            <tr><th scope='row'>2</th><td>24-10-1439</td><td>اخبار بموعد المقابلات</td><td>البريد الالكتروني</td><td>جميع المسجلين في المنصه</td></tr>
            <tr><th scope='row'>3</th><td>25-10-1439</td><td>تذكيرية بموعد المقابلات</td><td>البريد الالكتروني</td><td>جميع المسجلين في المنصه</td></tr>
            <tr><th scope='row'>4</th><td>26-10-1439</td><td>تذكيرية بموعد المقابلات</td><td>البريد الالكتروني</td><td>جميع المسجلين في المنصه</td></tr>
            <tr><th scope='row'>5</th><td>27-10-1439</td><td>تذكيرية بموعد المقابلات</td><td>البريد الالكتروني</td><td>جميع المسجلين في المنصه</td></tr>
            <tr><th scope='row'>6</th><td>28-10-1439</td><td>تذكيرية بموعد المقابلات</td><td>البريد الالكتروني</td><td>جميع المسجلين في المنصه</td></tr>
            <tr><th scope='row'>7</th><td>2-11-1439</td><td>تذكيرية بموعد المقابلات</td><td>البريد الالكتروني</td><td>جميع المسجلين في المنصه</td></tr>
            <tr><th scope='row'>8</th><td>3-11-1439</td><td>تذكيرية بموعد المقابلات</td><td>البريد الالكتروني</td><td>جميع المسجلين في المنصه</td></tr>
            <tr><th scope='row'>9</th><td>4-11-1439</td><td>تذكيرية بموعد المقابلات</td><td>البريد الالكتروني</td><td>جميع المسجلين في المنصه</td></tr>
            <tr><th scope='row'>10</th><td>5-11-1439</td><td>تذكيرية بموعد المقابلات</td><td>البريد الالكتروني</td><td>جميع المسجلين في المنصه</td></tr>
            </table>
        </div>";*/

        /* echo "<div class = 'container text-center mt-5'>مواعيد الرسائل (رجال)
            <table class = 'table table-striped table-hover table-responsive text-center'>
            <thead class='thead-light'><tr><th scope='col'>م</th><th scope='col'>التاريخ</th><th scope='col'>نوع الرسالة</th><th scope='col'>الوسيلة</th><th scope='col'>المرسل إليهم</th></tr></thead>
            <tr><th scope='row'>1</th><td>24-10-1439</td><td>اخبار بموعد المقابلات</td><td>نصية - جوال</td><td>جميع المسجلين في المنصه</td></tr>
            <tr><th scope='row'>2</th><td>24-10-1439</td><td>اخبار بموعد المقابلات</td><td>البريد الالكتروني</td><td>جميع المسجلين في المنصه</td></tr>
            <tr><th scope='row'>3</th><td>25-10-1439</td><td>تذكيرية بموعد المقابلات</td><td>البريد الالكتروني</td><td>جميع المسجلين في المنصه</td></tr>
            <tr><th scope='row'>4</th><td>26-10-1439</td><td>تذكيرية بموعد المقابلات</td><td>البريد الالكتروني</td><td>جميع المسجلين في المنصه</td></tr>
            <tr><th scope='row'>5</th><td>27-10-1439</td><td>تذكيرية بموعد المقابلات</td><td>البريد الالكتروني</td><td>جميع المسجلين في المنصه</td></tr>
            <tr><th scope='row'>6</th><td>28-10-1439</td><td>تذكيرية بموعد المقابلات</td><td>البريد الالكتروني</td><td>جميع المسجلين في المنصه</td></tr>
            <tr><th scope='row'>7</th><td>2-11-1439</td><td>تذكيرية بموعد المقابلات</td><td>البريد الالكتروني</td><td>جميع المسجلين في المنصه</td></tr>
            <tr><th scope='row'>8</th><td>3-11-1439</td><td>تذكيرية بموعد المقابلات</td><td>البريد الالكتروني</td><td>جميع المسجلين في المنصه</td></tr>
            <tr><th scope='row'>9</th><td>4-11-1439</td><td>تذكيرية بموعد المقابلات</td><td>البريد الالكتروني</td><td>جميع المسجلين في المنصه</td></tr>
            <tr><th scope='row'>10</th><td>5-11-1439</td><td>تذكيرية بموعد المقابلات</td><td>البريد الالكتروني</td><td>جميع المسجلين في المنصه</td></tr>
            </table>
        </div>";*/

        echo "<div class = 'container text-center'><a class='btn btn-lg text-center' href='#' role='button' style = 'color: #d8b92b; background-color: #466653;'>العودة إلي الصفحة الرئيسية</a></div>";

    
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}
 
// close connection
mysqli_close($link);
?>



</body>

</html>