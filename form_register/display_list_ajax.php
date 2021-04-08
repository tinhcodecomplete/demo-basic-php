<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>List User Ajax</title>
    
    <script>
    function showUser(str) {
        if (str.length == 0) {
           //document.getElementById("txtHint").innerHTML = "";
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
    <form action="">
        <label for="fname">Enter name to search</label>
        <input type="text" id="fname" name="fname"  onkeyup="showUser(this.value)">
    </form>
    <div id="txtHint">
        <?php include 'getUserAjax.php';?>
    </div>
</body>
</html>