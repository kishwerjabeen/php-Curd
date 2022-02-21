<!DOCTYPE html>
<html lang="en">

<head>

    <?php include 'links.php' ?>
    <title>Display</title>
</head>

<body>

    <div class="container mt-3">

        <h2>List of Web Developer job </h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NAME</th>
                        <th>DEGREE</th>
                        <th>MOBILE</th>
                        <th>EMAIL</th>
                        <th>REFER</th>
                        <th>POST</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    include 'conn.php';

                    $selQuery = "SELECT * FROM jobreg";

                    $query =  mysqli_query($conn, $selQuery);


                    /* 
// muber of rown jany kay liya 
$nums = mysqli_num_rows($query);

echo $nums;

 */

                    /*  
$res = mysqli_fetch_array($query);

echo $res[1];
echo $res[3];
echo $res[4];

 */


                    /*  
//  check while loop kasy kam karha ha 
while ($i < 10) {
    echo $i  . "<br>";
    $i++;
}

 */

                    while ($res = mysqli_fetch_array($query)) {
                        // echo $res['firname'] . "<br>";
                    ?>
                        <tr>
                            <td><?php echo $res['id'] ?></td>
                            <td> <?php echo $res['firname'] ?></td>
                            <td> <?php echo $res['degree'] ?></td>
                            <td> <?php echo $res['mobile'] ?></td>
                            <td> <span style="background-color:turquoise;"> <?php echo $res['email'] ?> </span></td>
                            <td> <?php echo $res['refer'] ?></td>
                            <td> <?php echo $res['jobpost'] ?></td>


                            <td><a href="updates.php?id=<?php echo $res['id'] ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Update"> <i class="fas fa-edit"></i></a></td>
                            <td>
                                <a href="delete.php?idth=<?php echo $res['id'] ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                            </td>

                        </tr>



                    <?php
                    }

                    ?>


                </tbody>
            </table>

        </div>
    </div>
    </div>
</body>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>

</html>