<?php

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php include '../links.php' ?>
    <title>Registration</title>
</head>

<body>
    <?php
    include '../conn.php';
    if (isset($_POST['submit'])) {

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

        $pass = password_hash($password, PASSWORD_BCRYPT);
        $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

        // verification
        $verpass = password_verify($password, $pass);
        $confirmverifypass = password_verify($cpassword, $cpass);

        $token = bin2hex(random_bytes(15));


        $emailQuery = "SELECT * FROM emailreg WHERE email = '$email'";
        $regQuery = mysqli_query($conn, $emailQuery);
        $emailCount = mysqli_num_rows($regQuery);



        if ($emailCount) {
            echo "email already exist";
        } else {
            if ($verpass === $confirmverifypass) {
                $insertQury = "INSERT INTO emailreg( username, email, mobile, password, cpassword, token,status) VALUES ('$username','$email','$mobile','$pass','$cpass', '$token', 'inactive')";
                $iqury = mysqli_query($conn, $insertQury);

                if ($iqury) {
                    $to_email = "kishwarjabeen2020@gmail.com";
                    $subject = "Email Activation";
                    $body = "Hi,  $username . Click here to activate your account 
                    http://localhost/php-curd/email-reg/activate.php?token=$token";
                    $sender_email = "Form : codingtest20222022@gmail.com";

                    if (mail($to_email, $subject, $body, $sender_email)) {
                        /*  echo "Email successfully sent to $to_email..."; */
                        $_SESSION['msg'] = "Check your email to activate your account $email";
                        header('location:login.php');
                    } else {
                        echo "Email sending failed...";
                    }
                } else {
    ?>
                    <script>
                        alert('Inserted Mahi howa bacho');
                    </script>
                <?php
                }
            } else {
                ?>
                <script>
                    alert('Password are not matched');
                </script>
    <?php
            }
        }
    }



    ?>



    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                                    <div class="btn-group-vertical" role="group">
                                        <button type="button" class="btn btn-labeled btn-danger " style="align-items: center;">
                                            <span class="btn-label"><i class="fa fa-camera"></i></span> Login Google</button>
                                        <br>
                                        <button type="button" class="btn btn-labeled btn-primary" style="align-items: center;">
                                            <span class="btn-label"><i class="fa fa-camera"></i></span> Login Facebook</button>

                                    </div>
                                    <br>
                                    <br>
                                    <form class="mx-1 mx-md-4" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example1c" class="form-control" name="username" value="" required />
                                                <label class="form-label" for="form3Example1c">Your Name</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" id="form3Example3c" class="form-control" name="email" value="" required />
                                                <label class="form-label" for="form3Example3c">Your Email</label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="tel" id="form3Example7c" class="form-control" name="mobile" value="" required />
                                                <label class="form-label" for="form3Example7c">Your Mobile</label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="form3Example4c" class="form-control" name="password" value="" required />
                                                <label class="form-label" for="form3Example4c">Password</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="form3Example4cd" class="form-control" name="cpassword" value="" required />
                                                <label class=" form-label" for="form3Example4cd">Repeat your password</label>
                                            </div>
                                        </div>

                                        <div class="form-check d-flex justify-content-center mb-5">
                                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                                            <label class="form-check-label" for="form2Example3">
                                                I agree all statements in <a href="#!">Terms of service</a>
                                            </label>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" name="submit" class="btn btn-primary btn-lg">Register</button>
                                        </div>

                                    </form>
                                    <p>Have an Account <a href="login.php">Login</a></p>
                                </div>

                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">


                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp" class="img-fluid" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</body>

</html>