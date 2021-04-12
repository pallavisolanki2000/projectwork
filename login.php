<?php
session_start();
?>


<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <?php include 'style1.php' ?>
    <?php include 'links.php' ?>
    <style>
        /* body{
            background-image: url("signup.png");
            background-size: cover;
        } */
    </style>
</head>

<body>

    <?php
    include 'dbcon.php';

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $eamil_search = "select * from registration where email='$email'";
        $query = mysqli_query($con, $eamil_search);

        $email_count = mysqli_num_rows($query);

        if ($email_count) {
            $email_pass = mysqli_fetch_assoc($query);
            $db_pass = $email_pass['password'];

            // $_SESSION['username'] =$email_pass['username'];

            $pass_decode = password_verify($password, $db_pass);

            if ($pass_decode) {
                echo "login successful";
                // header('location:home.php');
    ?>
                <script>
                    location.replace("home.php");
                </script>

    <?php

            } else {
                echo "password incorrect";
            }
        } else {
            echo "Invalid email";
        }
    }




    ?>

    <div class="bg-img">


        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
            <p>
            <h2 class="text-center" style="margin-bottom: 30px;"> Login Account</h2>

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><span class="material-icons">
                            perm_identity
                        </span></span>
                </div>
                <input name="email" class="form-control" placeholder=" Enter User name" type="email" required>
            </div>
            <!-- <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><span class="material-icons">
                            mail
                        </span> </span>
                </div>
                <input name="email" class="form-control" placeholder="Email address" type="email" required>
            </div> -->

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><span class="material-icons">
                            lock
                        </span> </span>
                </div>
                <input class="form-control" placeholder="Enter password" type="password" name="password" value="" required>
            </div>

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary btn-block">Login </button>
            </div>
            <p class="text-center">Don't have an account? <a href="signup.php">Signup</a></p>
        </form>
        </article>
    </div>
    </div>
    </div>
    </div>
    </div>




</body>

</html>