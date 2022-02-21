<?php
include 'conn.php';

$delid = $_GET['idth'];

$delQuery = "DELETE FROM jobreg WHERE id = $delid";

$dquery = mysqli_query($conn, $delQuery);

if ($dquery) {
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

header('location:display.php');
?>