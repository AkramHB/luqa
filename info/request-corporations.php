<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
<?php


$servername = "localhost";
$username = "akram";
$password = "K8XG-3Dd=%-S";
$dbname = "tawteen";

$MySQL_Handle = mysqli_connect($servername, $username, $password, $dbname);
 mysqli_set_charset($MySQL_Handle,"utf8");
 
// Check connection
if($MySQL_Handle === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
    

 
        $command = $_GET["command"];
        $id = $_GET["id"];

        if($command == 'complete'){
            $sql = "UPDATE corporations
            SET status = 'مكتمل'
            WHERE id = '$id';";
            $result = $MySQL_Handle->query($sql);
        }

        if($command == 'incomplete'){
            $sql = "UPDATE corporations
            SET status = 'غير مكتمل'
            WHERE id = '$id';";
            $result = $MySQL_Handle->query($sql);
        }

        if($command == 'decline'){
            $sql = "UPDATE corporations
            SET status = 'مرفوض'
            WHERE id = '$id';";
            $result = $MySQL_Handle->query($sql);
        }

            echo '<script type="text/javascript">' . "\n"; 
            echo 'window.location="committee-display-corporations.php";'; 
            echo '</script>';

 
mysqli_close($link);
?>
</body>
</html>

