<?php
session_start();
include ("includes/connection.php");
 
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($con,$_POST['email']);
        $pass= mysqli_real_escape_string($con,$_POST['pass']);
        $select_user ="select * FROM users where user_email='$email' AND user_pass='$pass'AND status= 'verified'";
        $query =mysqli_query($con,$select_user);
        $result = mysqli_fetch_assoc($query);
        $check_user =mysqli_num_rows($query);
        if($check_user==1 && $result['role']== 'Admin'){
            $_SESSION['user_email']=$email;
            $_SESSION['user_id']=$result['user_id'];
            echo "<script>window.open('Team-A/managementdash.php','_self')</script>";
            }
            else if($check_user==1 && $result['role']=='Asignee'){
                
                echo "<script>window.open('Team-B/Assignedashboard.php','_self')</script>";
            }
            else{
                echo ("<script LANGUAGE='JavaScript'>
    window.alert('Wrong Credentials');
    window.location.href='index.php';
    </script>");
            }
        }    
?>
