<head>
    <meta charset="utf-8" />
    <title>CCAPTCHA Demo in PHP</title>  
    <script src="https://widget.ccaptcha.com/js/ccaptcha_version2_M1.js"></script>
</head>

<body>

<form method="post">
<div class="ccaptcha_M1" id="Ccaptcha_M1" name="Ccaptcha_M1" data-ccaptcha_apicode="Type your API Code Here"></div>
<input type="submit" name="test" id="test" value="Validate" /><br/>

<?php
if(array_key_exists('test',$_POST)){

//Type Your SecretCode Here
$Secret_Code="Type Your SecretCode Here";
$url = 'https://api.ccaptcha.com/api/Validate/ValidationPost';
$myvars = 'Token=' . $_POST['ccaptcha_token_input'] . '&Secret_Code=' . $Secret_Code;
$ch = curl_init( $url );
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );
    if($response == '"true"')
    {
       //CCAPTCHA SOLVED!
    echo 'true';
    }
    else
    {
     //CCAPTCHA Not Solved!
     echo 'false';
    }

}
?>
</form>

</body>