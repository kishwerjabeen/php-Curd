<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap 5 Example</title>
    <?php include 'links.php' ?>
</head>

<body>

    <div class="container mt-3">
        <h2>Stacked form</h2>

        <?php
        include 'conn.php';
        $ids = $_GET['id'];
        $showQuery = "SELECT * FROM jobreg WHERE id={$ids}";
        $showData =   mysqli_query($conn, $showQuery);
        $arrData = mysqli_fetch_array($showData);


        if (isset($_POST['submit'])) {
            $name = $_POST['user'];
            $quli = $_POST['deg'];
            $number = $_POST['mobile'];
            $email = $_POST['email'];
            $ref = $_POST['ref'];
            $jobs = $_POST['jobpro'];

            // $insertquery = "INSERT INTO jobreg (firname, degree, mobile, email, refer, jobpost) VALUES ('$name','$quli','$number','$email','$ref','$jobs')";

            $updateQuery = "UPDATE jobreg SET id=$ids, firname='$name',degree='$quli', mobile='$number', email='$email', refer= '$ref',jobpost ='$jobs' WHERE id=$ids";

            // $res = mysqli_query($conn, $insertquery);

            $res = mysqli_query($conn, $updateQuery);



            if ($res) {
        ?>
                <script>
                    alert("Data Update Hogya ha Yaaaa");
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert("Data Updaate Nahe howa  Naaaayyyyy");
                </script>
        <?php
            }
        }
        ?>





        <form action="#" method="POST">

            <div class="mb-3">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Name" name="user" value=" <?php echo $arrData['firname'] ?>" required />
            </div>

            <div class="mb-3">
                <label for="deg">Degree:</label>
                <input type="text" class="form-control" id="deg" placeholder="Enter Degree" name="deg" value="<?php echo $arrData['degree'] ?>" required />
            </div>

            <div class="mb-3">
                <label for="numb">Mobile Number:</label>
                <input type="tel" class="form-control" id="numb" placeholder="mobile Number" name="mobile" value="<?php echo $arrData['mobile'] ?>" required />
            </div>

            <div class="mb-3 mt-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Any refference" name="email" value="<?php echo $arrData['email'] ?>" required />
            </div>

            <div class="mb-3">
                <label for="ref">Refference:</label>
                <input type="text" class="form-control" id="ref" placeholder="Any Refference" name="ref" value="<?php echo $arrData['refer'] ?>" required />
            </div>

            <div class="mb-3">
                <label for="jobpro">Job Profile:</label>
                <input type="text" class="form-control" id="jobpro" placeholder="Webdeveloper Post" name="jobpro" value="<?php echo $arrData['jobpost'] ?>" required />
            </div>



            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>

        <br>
        <a href="display.php" class="btn btn-success btn-block">Display</a>
    </div>

</body>

</html>