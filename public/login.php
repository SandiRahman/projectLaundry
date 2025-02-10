<?php
include "koneksi.php";
$username = $_POST['username'];
$password = md5($_POST['password']);
$query = mysqli_query($con,"SELECT * FROM user WHERE username = '$username' AND password = '$password' ");
$hasilquery = mysqli_num_rows($query);
if ($hasilquery == 1) 
{
    session_start();
    while ($row=mysqli_fetch_assoc($query)) 
    {
        $_SESSION['username'] = $row['username'];
        $_SESSION['id_user'] = $row['id_user'];
        header("Location: dashboard.php");
    }
}

else 
{
    header("Location: tampilan_login.php");
}
?>