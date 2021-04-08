<?php
    include 'user.php';
    $searchValue = "";

    //loai bo khoang trang du thua trong chuoi
    function replacewhitespace($str):string{
        $str = preg_replace('/[\s=]+/', ' ', $str);
        return $str;
    }

    if(!isset($_GET['searchValue'])){
        $searchValue = "";
    }else{
        $searchValue = replacewhitespace(trim($_GET['searchValue']));
    }    
    
    $sql = "";
    $userObj = new User();
    $data = $userObj->getUserAjax($searchValue);
    ?>
         <table class='table'>
             <thead>
                 <tr>
                     <th scope='col' >#</th>
                     <th scope='col' >Full Name</th>
                     <th scope='col' >Email</th>
                     <th scope='col' >Phone</th>
                     <th scope='col' >Address</th>
                     <th scope='col' >Gender</th>
                     <th scope='col' >Language</th>
                     <th scope='col' >Image</th>
                     <th scope='col' ></th>
                 </tr>
             </thead>
             <tbody>
    <?php
    if($data->num_rows>0){
        while($row = $data->fetch_assoc()){
    echo "        <tr>";
    echo "            <th scope='row'>" . $row['id'] . "</th> ";
    echo "            <td>" . ucwords($row['firstname']) . " " . ucwords($row['lastname']) ."</td>";
    echo "            <td>" . $row['email'] . "</td>";
    echo "            <td>" . $row['phone'] . "</td>";
    echo "            <td>" . ucwords($row['addr']) . "</td>";

        if ($row['gender'] == 1) {
            echo "<td> Male </td>";
        } elseif ($row['gender'] == 0) {
            echo "<td> Female </td>";
        }
    echo "            <td>" . $row['languages'] . "</td>";
                    $image="images/Screenshot.png";
                    if($row['image'] == "images/"){
                    $image = "images/Screenshot.png";
                    }else{
                    $image = $row['image'];
                    }
            echo " <td>" ."<img style='width:150px;height:80px;' src='".$image."' alt='anh'>"."</td>";
    echo "<td>";?>
                    <a href="edit.php?editId=<?php echo $row['id'] ?>" style="color:white" class="btn btn-primary">Edit</a>&nbsp
                    <a href="index.php?deleteId=<?php echo $row['id'] ?>" style="color:white"class="btn btn-danger" onclick=" return confirm('Are you sure want to delete this record')">Delete </a>
                <?php   echo "</td>"; 
    }  
    echo "       </tr>";
    }
    
?>