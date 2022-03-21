<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap 5 Example</title>
    <?php include 'links.php' ?>
</head>

<body>

    <div class="container mt-3">
        <h2>Stacked form</h2>
        <form action="index.php" method="POST">

            <div class="mb-3">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Name" name="user" value="" required />
            </div>

            <div class="mb-3">
                <label for="deg">Degree:</label>
                <input type="text" class="form-control" id="deg" placeholder="Enter Degree" name="deg" value="" required />
            </div>

            <div class="mb-3">
                <label for="numb">Mobile Number:</label>
                <input type="tel" class="form-control" id="numb" placeholder="mobile Number" name="mobile" value="" required />
            </div>

            <div class="mb-3 mt-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Any refference" name="email" value="" required />
            </div>

            <div class="mb-3">
                <label for="ref">Refference:</label>
                <input type="text" class="form-control" id="ref" placeholder="Any Refference" name="ref" value="" required />
            </div>

            <div class="mb-3">
                <label for="jobpro">Job Profile:</label>
                <input type="text" class="form-control" id="jobpro" placeholder="Webdeveloper Post" name="jobpro" value="Web developer Post" required />
            </div>



            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>

        <br>
        <a href="display.php" class="btn btn-success btn-block">Display</a>
    </div>

</body>

</html>

<?php
include 'conn.php';
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['user']);
    $quli = mysqli_real_escape_string($conn, $_POST['deg']);
    $number = mysqli_real_escape_string($conn, $_POST['mobile']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $ref = mysqli_real_escape_string($conn, $_POST['ref']);
    $jobs = mysqli_real_escape_string($conn, $_POST['jobpro']);

    /*     $insertquery = "INSERT INTO jobreg (firname, degree, mobile, email, refer, jobpost) VALUES ('$name','$quli','$number','$email','$ref','$jobs')";
 */




    $emailQuery = "SELECT * FROM reg WHERE email = '$email'";
    $res = mysqli_query($conn, $emailQuery);
    $emailCount = mysqli_num_rows($res);


    if ($emailCount > 0) {
?>
        <script>
            alert("email already exist");
        </script>
        <?php

    } else {
        $insertquery = "INSERT INTO jobreg (firname, degree, mobile, email, refer, jobpost) VALUES ('$name','$quli','$number','$email','$ref','$jobs')";
        $iqury = mysqli_query($conn, $insertquery);
        if ($iqury = true) {
        ?>
            <script>
                alert("Data Insert Hogya ha Yaaaa");
            </script>
        <?php
        } else {

        ?>
            <script>
                alert("Data Insert nae howa");
            </script>
<?php
        }
    }
}
?>