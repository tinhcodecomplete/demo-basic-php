<?php
class User{
    private $servername = "localhost";
    private $username 	= "root";
    private $password 	= "";
    private $database 	= "MyDB";
    public  $conn;


    public function __construct(){
        $this->conn = new mysqli($this->servername, $this->username,$this->password,$this->database);
			if(mysqli_connect_error()) {
				trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
			}else{
				return $this->conn;
			}
    }
    
    // Insert user data into user_register table
    public function insertData($firstname, $lastname, $email, $phone,$addr, $gender,$description, $languages,$image)
    {
        $stmt = $this->conn->prepare("INSERT INTO USER_REGISTER(firstname, lastname, email, phone, addr, descriptions,gender,languages,image) VALUES (?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param('ssssssiss', $firstname, $lastname, $email, $phone, $addr, $description, $gender, $languages,$image);        
        if ($stmt->execute()==true) {
            $stmt->close();
            $this->conn->close();
            header("Location:index.php?msg1=insert");
        }else{
            echo "Registration failed try again!";
        }
        $this->conn->close();
    }

    // Fetch User records for show listing
    public function displayData()
    {
        $sql = "SELECT * FROM user_register";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }else{
            echo "No found records";
        }
        $this->conn->close();
    }

    // Fetch single data for edit from User_register table
    public function displyaRecordById($id)
    {
        $query = "SELECT * FROM USER_REGISTER WHERE id = '$id'";
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        }else{
            echo "Record not found";
        }
        $this->conn->close();
    }

    // Update user data into User_register table
    public function updateRecord($firstname, $lastname,$addr, $gender,$description="", $languages,$id)
    {
        if(!empty($id)) {
            $sql = "UPDATE user_register SET firstname = '$firstname', lastname = '$lastname', addr = '$addr', descriptions = '$description', gender = b'$gender', languages = '$languages' WHERE user_register.id = '$id'";
            if ($this->conn->query($sql) == true) {
                header("Location:index.php?msg2=update");
            }else{
                echo "Registration updated failed try again!";
            }
        }
        $this->conn->close();
        
    }

    // Delete user data from user_register table
    public function deleteRecord($id)
    {
        $sql = "DELETE FROM user_register WHERE id = '$id'";
        if ($this->conn->query($sql)==true) {
            header("Location:index.php?msg3=delete");
        }else{
            echo "Record does not delete try again";
        }
        $this->conn->close();
    }

    //get user Ajax
    function getUserAjax($searchVal){
        if($searchVal === "" || $searchVal==NULL){
            $sql = "select * from user_register";
        }else{
            $sql = "select * from user_register where firstname like N'%$searchVal%' or lastname like N'%$searchVal%'";
        }
        $result = $this->conn->query($sql);
        return $result;
    }

    //function validate input , set error, get value from form and set it for variable
    public static function validate($name, &$errorVal, &$isValid, $pattern, &$value){
        if (empty($_POST["$name"]))    {
            $errorVal = "required!";
            $isValid = 0;
        }else{
            $value = self::validate_input($_POST["$name"]);
            if($value==""){
                $errorVal = "required!";
                $isValid = 0;
            }else{
                if(!preg_match($pattern, $value)){
                    $errorVal = "data is not valid!";
                    $isValid = 0;
                }else{
                    $isValid = 1;
                }
            }           
        }
    }

    //function validate input gender , set error, get value from form and set it for variable
    public static function validate_gender($name, &$errorVal, &$isValid, &$value){
        if (empty($_POST[$name])){
            $errorVal = "Please Select your gender!";
            $isValid = 0;
        }else {
            $value = user::validate_input($_POST[$name]);
            if ($value == "male"){
                $value = 1;
            }elseif($value == "female"){
                $value = 0;
            }
            $isValid = 1;
        }
    }

    //function validate input language , set error, get value from form and set it for variable
    public static function validate_language($name, &$errorVal, &$isValid, &$value){
        if(!empty($_POST[$name])){
            foreach ($_POST[$name] as $selected){
                $value .= " " . $selected;
            }
            $isValid = 1;
        }else{
            $errorVal = "Please select atleast one option!";
            $isValid = 0;
        }
    } 

    
    // validate input 
    public static function validate_input($data)    {
        $data = trim($data);
        $data = preg_replace('/\s+/'," ",$data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
     
    public function isExistEmail($email):bool{
        $sql = "select * from user_register where email ='$email'";
        $result = $this->conn->query($sql);
        if($result->fetch_assoc()){
            return true;
        }else{
            return false;
        }
    }

    public function isExistPhone($phone):bool{
        $sql = "select * from user_register where phone ='$phone'";
        $result = $this->conn->query($sql);
        if($result->fetch_assoc()){
            return true;
        }else{
            return false;
        }
    }
}
?>
