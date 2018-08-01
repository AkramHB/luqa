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

<body style="background-color:#f2eff0 ;" dir="rtl">

<div>
<img class="img-fluid d-none d-md-block" style="padding-bottom: 0em;" src="assets/images/header.jpg" >
<img class="img-fluid d-block d-md-none" style="padding-bottom: 0em;" src="assets/images/headermobile.jpg" >
</div>
    
    <?php
    
            error_reporting(0);
            session_start();
    

            $servername = "localhost";
            $username = "akram";
            $password = "K8XG-3Dd=%-S";
            $dbname = "tawteen";

            $MySQL_Handle = mysqli_connect($servername,$username,$password,$dbname) 
            or die ( mysqli_error($MySQL_Handle) ); 

            $sSQL= 'SET CHARACTER SET utf8'; 

            mysqli_query($MySQL_Handle,$sSQL) 
            or die ('Can\'t charset in DataBase');

            $sql = "SELECT * FROM individuals";
            $result = $MySQL_Handle->query($sql);

            $NoR = 0;
            $NoM = 0;
            $NoF = 0;
            $NoC = 0;
            $NoVJs = 0;

            if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {

                    $NoR++;

                    if($row['gender'] == 'male')
                        $NoM++;
                    else 
                        $NoF++;

                    

                }

            }

            $sql = "SELECT * FROM corporations";
            $result = $MySQL_Handle->query($sql);
            $n = 0;
            if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {

                    $NoC++;

                    $array = str_split($row['vacant_job_more_info']);
                    foreach ($array as $char) {
                    if(is_numeric($char)) {
                        $NoVJs += $char;
                        }
                    }

                }

            }

            echo "
                    <div class = 'container'>
                        <div class = 'row'>
                            <div class = 'col-12 text-right mt-5'>
                                 <h3 class = 'display-4 text-center' style='color:#a79024;'>المجموع الكلي للمتقدمين حتى الآن <h3> 

                            </div>

                            <div class = 'col-12 text-center'> 
                            
                            <img class = 'img-fluid text-center mt-5' src = 'assets/images/team.png'>
                            </div>
                            <br>
                            <div class = 'col-12 text-center mt-5'>
                                <h1 class='text-center'style='font-weight: bold; color:#466653'>" . $NoR . "  </h1>
                            </div>
                        </div>
                    </div>
                ";

            echo "
                    <div class = 'container text-center'>
                        <div class = 'row'>
                            <div class = 'col-12 text-right mt-5'>
                                <h1 class = 'display-4'><h1>
                            </div>
                            <div class = 'col-6'>
                                <img class = 'img-fluid mt-5' src = 'assets/images/standing-up-man-.png'>
                            </div>
                            <div class = 'col-6'>
                                <img class = 'img-fluid mt-5' src = 'assets/images/girl.png'>
                            </div>
                            <div class = 'col-6'>
                                <h1 class = 'display-5 mt-3' style='color:#466653;'>" . $NoM . "</h1>
                            </div>
                            <div class = 'col-6'>
                                <h1 class = 'display-5 mt-3' style='color:#466653;'>" . $NoF . "</h1>
                            </div>
                        </div>
                    </div>
                ";

                echo " <br>
                    <div class = 'container text-center'>
                        <div class = 'row'>
                            <div class = 'col-12 text-right mt-5'>
                                <h3 class = 'display-4 text-center  'style='color:#a79024;'>مجموع الشركات<h3>
                                

                            </div> 
                            <div class = 'col-12'>
                            <img class = 'img-fluid text-center mt-5' src = 'assets/images/building.png'>
                            </div>
                            <br>
                            <div class = 'col-12'>
                                <h1 class = 'display-5 mt-3 text-center' style='font-weight: bold; color:#466653;'>" . $NoC . "  </h1>
                            </div> <br>
                        </div> <br>
                    </div>
                ";

                echo " <br>
                    <div class = 'container text-center'>
                        <div class = 'row'>
                            <div class = 'col-12 text-right mt-5'>
                                <h3 class = 'display-4 text-center  'style='color:#a79024;'>مجموع الوظائف الشاغرة<h3>
                            </div> 
                            
                            <div class = 'col-12'>
                                <h1 class = 'display-5 mt-3 text-center' style='font-weight: bold; color:#466653;'>" . "520" . "  </h1>
                            </div> 
                        </div> 
                    </div>
                ";

            $MySQL_Handle->close();


    ?>

    <!-- footer -->

    <!-- #a00d1a -->
    <section data-rv-view="15" style="background-color: #1d392a;" id="timea" class="Images mbr-section mbr-section--no-padding">
        <div class="container">
            <img id="T1" style="padding-bottom: 0em; " src="../assets/images/footercopyr.jpg" class="img-fluid">
 
        </div>


    </section>



</body>





</html>