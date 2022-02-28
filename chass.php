<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php include 'links.php' ?>
    <title>Chase Board</title>

    <style>
        table {
            border: 1px solid black;

        }

        td {
            padding: 20px;
        }

        .bgColor {
            background-color: black;
        }
    </style>
</head>

<body>
    <form method="POST">
        <input type="text" name="cb" />
        <input type="submit" name="submit" value="GenerateChessBoard" required />
    </form>
    <br>
    <table>
        <?php
        if (isset($_POST['submit'])) {
            $data = $_POST['cb'];

            for ($row = 1; $row <= $data; $row++) {
                echo "<tr>";
                for ($col = 1; $col <= $data; $col++) {
                    if (($row + $col) % 2 == 0) {
                        echo "<td class='bgColor'> </td>";
                    } else {
                        echo "<td > </td>";
                    }
                }
                echo " </tr>";
            }
        }

        ?>
    </table>
</body>

</html>