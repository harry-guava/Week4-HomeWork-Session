<?php
session_start(); 
if (isset($_POST["btnOK"]))
{
  //require_once("connect.php");
  $userName = $_POST["txtUserName"];
  $passWord = $_POST["txtPassword"];
  if(trim((($userName)&&($passWord))) != "")
  { 
  $_SESSION["userName"] = $userName;
  $_SESSION["passWord"] = $passWord;
  $sql = <<<compare
  select * from member where `userName` = '$userName' and `paswd` = '$passWord'
  compare;
  require_once("connect.php");
  mysqli_query($link,$sql);
  //mysqli_query($link,$sql);
  $result = mysqli_query($link, $sql);
  $row =mysqli_num_rows($result);
  }
  else
  {
    echo '<script language="javascript">';
    echo 'alert("欄位請勿空白")';
    echo '</script>';
  }
  if($row != 0)
  {
    if(isset($_SESSION["lastpage"]))
    {
    header(sprintf("Location: %s", $_SESSION["lastpage"]));
    exit();
    }
    else
    {
    header("Location: index.php");
    }
  }
  else
  {
    echo '<script language="javascript">';
    echo 'alert("請輸入正確的帳號或密碼")';
    echo '</script>';
  }
}


if(isset($_POST["btnHome"]))
{
  header("Location: index.php");
  exit();
}

if(isset($_GET["logout"]))
{
  if($_SESSION["userName"]!="Guest")
  {
   
    session_unset();
    session_destroy();
    header("location: index.php");
    exit();
  
  }
}
 if(isset($_POST["btnAdd"]))
 { 
     mysqli_query($link,$sql);
     header("location: add.php");
 }
?>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Lab - Login</title>
</head>

<body>
  <form id="form1" name="form1" method="post" action="login.php">
    <table width="300" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
      <tr>
        <td colspan="2" align="center" bgcolor="#CCCCCC">
          <font color="#FFFFFF">會員系統 - 登入</font>
        </td>
      </tr>
      <tr>
        <td width="80" align="center" valign="baseline">帳號</td>
        <td valign="baseline">
        <input type="text" name="txtUserName" id="txtUserName" /></td>
      </tr>
      <tr>
        <td width="80" align="center" valign="baseline">密碼</td>
        <td valign="baseline">
        <input type="password" name="txtPassword" id="txtPassword" /></td>
      </tr>
      <tr>
        <td colspan="2" align="center" bgcolor="#CCCCCC">
         
          <input type="submit" name="btnOK" id="btnOK" value="登入" />
          <!--<input type="reset" name="btnReset" id="btnReset" value="重設" />-->
          <input type="submit" name="btnHome" id="btnHome" value="回首頁" />
          <input href = "addEmployee.php" name = "btnAdd" type="submit" value ="加入會員"/>
        </td>
      </tr>
      
    </table>
  </form>
</body>

</html>