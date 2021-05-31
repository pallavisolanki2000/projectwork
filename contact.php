<?php
    if(isset($_POST['save'])){
        $Uname =$_POST['UName'];
        $email=$_POST['email'];
        $message=$_POST['message'];

        if(empty($Uname) || empty($email) || empty($message)){
            header('location:demo.php?error');

        }
        else{
            $to ="mani.singh_cs18@gla.ac.in";
            if(mail($to,$message,$email)){
                header('location:demo.php?success');

            }
        }
    }
    else{
        header('location:demo.php');

    }   
