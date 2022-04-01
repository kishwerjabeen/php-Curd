<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "you are loged out ";
    header('location:login.php');
}

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

    ?>



    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="d-flex justify-content-left mx-4 mb-3 mb-lg-4">
                                    <a href="logout.php"> <button type="submit" name="submit" class="btn btn-primary btn-lg">Logout</button> </a>
                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Home</p>
                                    <p class="text-center h5 ">Hello This is <?php echo  $_SESSION['username']; ?></p>


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