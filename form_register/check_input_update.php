<?php
include 'define.php';

$firstnameErr_update = $lastnameErr_update= $phoneErr_update= $emailErr_update  = $addrErr_update = $genderErr_update = $languageErr_update = "";
$firstname_update = $lastname_update = $email_update = $addr_update = $phone_update = $language_update =$description_update= "";
$gender_update = 1;
$arrlanguage_update = ["", "", ""];
$_inputvalid_U_firstname = $_inputvalid_U_lastname = $_inputvalid_U_email= $_inputvalid_U_phone= $_inputvalid_U_gender = $_inputvalid_U_addr = $_inputvalid_U_checkbox = 0;

//get data
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    user::validate("firstname_update",$firstnameErr_update,$_inputvalid_U_firstname,PATTERN,$firstname_update);

    user::validate("lastname_update",$lastnameErr_update,$_inputvalid_U_lastname,PATTERN,$lastname_update);   

    user::validate("addr_update",$addrErr_update,$_inputvalid_U_addr,PATTERN_ADDR,$addr_update); 

    user::validate("email_update",$emailErr_update,$_inputvalid_U_email,PATTERN_EMAIL,$email_update); 

    user::validate("phone_update",$phoneErr_update,$_inputvalid_U_phone,PATTERN_PHONE,$phone_update); 

    user::validate_gender("gender_update",$genderErr_update,$_inputvalid_U_gender,$gender_update);

    user::validate_language("chk_update",$languageErr_update,$_inputvalid_U_checkbox,$language_update);

    $description_update = user::validate_input($_POST["description_update"]);

    $language_update = trim($language_update);
    $arrlanguage_update = preg_split('/\s+/', $language_update);

}


?>  