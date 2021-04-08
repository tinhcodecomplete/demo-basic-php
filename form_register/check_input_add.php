<?php
include 'define.php';

$firstnameErr = $lastnameErr = $emailErr = $addrErr = $phoneErr = $genderErr = $languageErr = "";

$firstname = $lastname = $email = $addr = $phone = $language =$description= "";

$arrlanguage = ["", "", ""];

$_inputvalidfirstname = $_inputvalidlastname = $_inputvalidphone = $_inputvalidemail = $_inputvalidgender = $_inputvalidaddr = $_inputvalidcheckbox = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    user::validate("firstname",$firstnameErr,$_inputvalidfirstname,PATTERN,$firstname);

    user::validate("lastname",$lastnameErr,$_inputvalidlastname,PATTERN,$lastname);   

    user::validate("email",$emailErr,$_inputvalidemail,PATTERN_EMAIL,$email);

    user::validate("addr",$addrErr,$_inputvalidaddr,PATTERN_ADDR,$addr); 
    
    user::validate("phone",$phoneErr,$_inputvalidphone,PATTERN_PHONE,$phone); 

    user::validate_gender("gender",$genderErr,$_inputvalidgender,$gender);

    user::validate_language("chk",$languageErr,$_inputvalidcheckbox,$language);

    $description = user::validate_input($_POST["description"]);

    $language = trim($language);
    $arrlanguage = preg_split('/\s+/', $language);

}
?>