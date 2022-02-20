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
        <a href="display.php" class="btn btn-success btn-block">Link Button</a>
    </div>

</body>

</html>

<?php
include 'conn.php';
if (isset($_POST['submit'])) {
    $name = $_POST['user'];
    $quli = $_POST['deg'];
    $number = $_POST['mobile'];
    $email = $_POST['email'];
    $ref = $_POST['ref'];
    $jobs = $_POST['jobpro'];

    $insertquery = "INSERT INTO jobreg (firname, degree, mobile, email, refer, jobpost) VALUES ('$name','$quli','$number','$email','$ref','$jobs')";



    $res = mysqli_query($conn, $insertquery);



    if ($res) {
?>
        <script>
            alert("Data Insert Hogya ha Yaaaa");
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Data Insert Hogya ha Yaaaa");
        </script>
<?php
    }
}
?>