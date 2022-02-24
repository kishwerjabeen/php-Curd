<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php include '../links.php' ?>
    <title>Login</title>
</head>

<body>
    <?php
    include '../conn.php';
    if (isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $emailQuery = "SELECT * FROM reg WHERE email = '$email'";
        $siguery = mysqli_query($conn, $emailQuery);
        $emailCount = mysqli_num_rows($siguery);

        if ($emailCount) {
            $email_pass = mysqli_fetch_assoc($siguery);

            $db_pass = $email_pass['password'];

            $_SESSION['username'] = $email_pass['username'];

            $pass_decode = password_verify($password, $db_pass);

            if ($pass_decode) {
                echo "login succesfull";

    ?>
                <script>
                    location.replace("home.php")
                </script>
    <?php



            } else {
                echo "Password Incorrect";
            }
        } else {
            echo "email invalid";
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

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Login</p>
                                    <p class="text-center h5 ">Get Started with free account</p>
                                    <div class="btn-group-vertical" role="group">
                                        <button type="button" class="btn btn-labeled btn-danger " style="align-items: center;">
                                            <span class="btn-label"><i class="fa fa-camera"></i></span> Login Google</button>
                                        <br>
                                        <button type="button" class="btn btn-labeled btn-primary" style="align-items: center;">
                                            <span class="btn-label"><i class="fa fa-camera"></i></span> Login Facebook</button>

                                    </div>
                                    <br>
                                    <br>
                                    <p class="text-center h4">or</p>
                                    <hr>
                                    <form class="mx-1 mx-md-4" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">



                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" id="form3Example3c" class="form-control" name="email" value="" required />
                                                <label class="form-label" for="form3Example3c">Your Email</label>
                                            </div>
                                        </div>



                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="form3Example4c" class="form-control" name="password" value="" required />
                                                <label class="form-label" for="form3Example4c">Password</label>
                                            </div>
                                        </div>





                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" name="submit" class="btn btn-primary btn-lg">Login</button>
                                        </div>

                                    </form>
                                    <p>Dont you Have an Account <a href="#">Free Sign up </a></p>
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