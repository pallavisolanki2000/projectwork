<!DOCTYPE html>
<html>

<head>
    <title>SignUp and Register</title>
    <?php include 'style.php' ?>
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
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $repassword = mysqli_real_escape_string($con, $_POST['repassword']);

        $pass = password_hash($password, PASSWORD_BCRYPT);
        $repass = password_hash($repassword, PASSWORD_BCRYPT);

        $emailquery = "select * from registration where email='$email' ";
        $query = mysqli_query($con, $emailquery);

        $emailcount = mysqli_num_rows($query);

        if ($emailcount > 0) {
            echo "email already exists";
        } else {
            if ($password === $repassword) {
                $insertquery = "insert into registration(username, email, mobile, password, repassword) values('$username','$email','$mobile','$pass','$repass')";

                $iquery = mysqli_query($con, $insertquery);
                if ($iquery) {
    ?>
                    <script>
                        alert("Signup Successful");
                    </script>
                <?php
                } else {
                ?>
                    <script>
                        alert("Not Signup");
                    </script>
                <?php
                }
            } else {
                ?>
                <script>
                    alert("Password not match");
                </script>
    <?php
            }
        }
    }
    ?>

    <div class="bg-img">


        <form action="" method="POST">
            <p>
            <h2 class="text-center"> Create Account</h2>
            <!-- <a href="" class="btn btn-block btn-gmail"><img src="images/google-plus-removebg-preview.png" alt="" width=30 height=30>
                    Login via Gmail</a> <br>
                <a href="" class="btn btn-block btn-facebook" ><img src="images/facebook-scalable-graphics-icon-facebook-logo-facebook-logo-png-clip-art-removebg-preview.png" alt="" width=50 height=30> -->


            <!-- Login via Facebook</a>
            </p>
            <p class="divider-text">
                <span class="bg-light">OR</span>
            </p> -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><span class="material-icons">
                            perm_identity
                        </span></span>
                </div>
                <input name="username" class="form-control" placeholder="User name" type="text" required>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><span class="material-icons">
                            mail
                        </span> </span>
                </div>
                <input name="email" class="form-control" placeholder="Email address" type="email" required>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><span class="material-icons">
                            call
                        </span> </span>
                </div>
                <input name="mobile" class="form-control" placeholder="Phone number" type="number" required>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><span class="material-icons">
                            lock
                        </span> </span>
                </div>
                <input class="form-control" placeholder="Create password" type="password" name="password" value="" required>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><span class="material-icons">
                            lock
                        </span></span>
                </div>
                <input class="form-control" placeholder="ReEnter password" type="password" name="repassword" value="" required>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary btn-block">Singup </button>
            </div>
            <p class="text-center">Have an account? <a href="login.php">Log-in</a></p>
        </form>
        </article>
    </div>
    </div>
    </div>
    </div>
    </div>




</body>

</html>