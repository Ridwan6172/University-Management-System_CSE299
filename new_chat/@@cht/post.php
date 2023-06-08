<?php
session_start();
if(isset($_SESSION['name'])){
    $text = $_POST['text'];
     
    $cb = fopen("log.html", 'a');
    date_default_timezone_set('Asia/Dhaka');
    fwrite($cb, "<div class='msgln'>(".date("F j, Y, g:i a").") <b><span style='background:green;padding:3px 6px;color:#fff;'>".$_SESSION['name']."</span></b>: <span style='background:red;padding:3px 6px;color:#fff;'>".stripslashes(htmlspecialchars($text))."</span><br><br></div>");
    fclose($cb);
}
?>