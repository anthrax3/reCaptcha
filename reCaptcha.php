<!DOCTYPE html>
<html>
<head>
    <title>Example reCaptcha</title>
    <style type="text/css">
        *{
            font-family: arial;
            font-size: 14px;
        }
    </style>
</head>
<?php 
if(isset($_POST['submit'])){
    $secret = "6LfH0iAUAAAAABr-Lbjauxl4MRMrPYI1AhgFRS9M";
    $response = $_POST["g-recaptcha-response"];
    $remoteip = $_SERVER['REMOTE_ADDR'];
    $URL = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip");
    $result = json_decode($URL,TRUE);

    if($result['success']==1){
        print'<pre>';
        print_r($URL);
        print_r($result);
        print_r($_POST['fullname']);
        print'</pre>';
    }
}
 ?>
<body>
    <form method="post" action="">
        Type Your Name : <input type="text" name="fullname"/><br/><br/>
        <div class="g-recaptcha" data-sitekey="6LfH0iAUAAAAAO0eNlDLG0Ry8cutQSqf9ql8jimX"></div><br/>
        <input type="submit" name="submit"/>
    </form>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</body>
</html>