<?php
       session_start();
 if(isset($_POST["submit"]))
    {
        $auserName = $_POST["auserName"];
        $apassWord = $_POST["apassWord"];
        if(trim(($auserName&&$apassWord)!=""))
        {
        $sql = <<< add
        insert into member (userName,paswd) values ('$auserName','$apassWord');
        add;
        require_once("connect.php");
        mysqli_query($link,$sql);
        header("location: index.php");
        
        }
        else
        {
            echo '<script language="javascript">';
            echo 'alert("帳號或密碼欄位請勿空白")';
            echo '</script>';
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


<form method = "post">
  <div class="form-group row">
    <label for="text" class="col-2">帳號:</label> 
    <div class="col-4">
      <input id="text" name="auserName" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text1" class="col-2">密碼:</label> 
    <div class="col-sm-4">
      <input id="text1" name="apassWord" type="text" class="form-control">
    </div>
  </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" value ="OK" class="btn btn-primary">確定送出</button>
      <input  type ="button" name="cancel" id = "cancel" value ="取消" class = "btn btn-secondary"/>
    </div>
    
  </div>
</form>