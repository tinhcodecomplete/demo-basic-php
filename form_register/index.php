<?php

include 'user.php';
$userObj = new User();
$result = $userObj->displayData();
// Delete record from table
if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
  $deleteId = $_GET['deleteId'];
  $userObj->deleteRecord($deleteId);  
}
function format_name($name_unformatted){
   $name_formatted = ucwords(strtolower($name_unformatted)); 
   return $name_formatted;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>List</title> 
    <style>
    .alert {
    padding: 20px;
    background-color: #f44336;
    color: white;
    opacity: 1;
    transition: opacity 0.6s;
    margin-bottom: 15px;
    }

    .alert.success {background-color: #4CAF50;}
    .alert.info {background-color: #2196F3;}
    .alert.warning {background-color: #ff9800;}

    .closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
    }

    .closebtn:hover {
    color: black;
    }
    </style>
    <script>
    function showUser(str) {
        if (str.length == 0) {
            document.getElementById("txtHint").innerHTML = "No result found! \n press Enter to show all.";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
            };
            xmlhttp.open("GET", "getUserAjax.php?searchValue="+str, true);
            xmlhttp.send();
        }
    }
    </script>

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add.php">Add</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
        
        <input id="fname" name="fname" onkeyup="showUser(this.value)" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<?php
    if (isset($_GET['msg1']) == "insert") {
      echo "<div class='alert success'>
                <span class='closebtn'>&times;</span>  
                <strong>Success!</strong> insert a successful.
            </div>";
      } 
    if (isset($_GET['msg2']) == "update") {
      echo "<div class='alert success'>
                <span class='closebtn'>&times;</span>  
                <strong>Success!</strong> Update successful.
            </div>";
    }
    if (isset($_GET['msg3']) == "delete") {
      echo "<div class='alert success'>
                <span class='closebtn'>&times;</span>  
                <strong>Success!</strong> Delete successful.
            </div>";
    }
?>
   
<div id="txtHint" class="mt-5">
<table class="table">
    <thead>
        <tr>
            <th scope="col" >#</th>
            <th scope="col" >Full Name</th>
            <th scope="col" >Email</th>
            <th scope="col" >Phone</th>
            <th scope="col" >Address</th>
            <th scope="col" >Gender</th>
            <th scope="col" >Language</th>
            <th scope="col" >Image</th>
            <th scope="col" ></th>
            
        </tr>
    </thead>
    <tbody>           
<?php
    $result = $userObj->displayData();
    foreach($result as $row) {
            echo " <tr>";
            echo " <th scope='row'>" . $row['id'] . "</th> ";
            echo " <td>" . ucwords($row['firstname'])." " . ucwords($row['lastname']). "</td>";
            echo " <td>" . $row['email'] . "</td>";
            echo " <td>" . $row['phone'] . "</td>";
            echo " <td>" . ucwords($row['addr']). "</td>";
            if ($row['gender'] == 1) {
                echo " <td>Male</td>";
            } elseif ($row['gender'] == 0) {
                echo  " <td>Female</td>";
            }
            echo " <td>" . $row['languages'] . "</td>"; 
            $image="images/Screenshot.png";
            if($row['image'] == "images/"){
              $image = "images/Screenshot.png";
            }else{
              $image = $row['image'];
            }
            echo " <td>" ."<img style='width:150px;height:80px;' src='".$image."' alt='anh'>"."</td>";
            echo "<td>";
?>
                <a href="edit.php?editId=<?php echo $row['id'] ?>" style="color:white" class="btn btn-primary">Edit</a>&nbsp
                <a href="index.php?deleteId=<?php echo $row['id'] ?>" style="color:white"class="btn btn-danger" onclick=" return confirm('Are you sure want to delete this record')">Delete </a>
<?php   echo "</td>";       
        echo " </tr>";
    }
?>

    </tbody>
</table>
</div>


</body>
<script>
var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
  close[i].onclick = function(){
    var div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}
</script>
</html>