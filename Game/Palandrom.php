<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palidrome</title>
</head>

<body>
    <div class="container">

        <h4>Palidrome Checker </h4>
        <h4>

            <?php


            if (isset($_POST['submit'])) {

                $words = $_POST['plain'];

                $reword = strrev($words);



                if ($words === $reword) {
                    echo "Yes Its plaindrome";
                } else {
                    echo "no $words its not ";
                }
            }

            ?>
        </h4>
        <form action="" id="contact" action="" method="POST">
            <textarea name="plain" id="" placeholder="Type your word...." required cols="30" rows="10"></textarea>


            <button id="contacct-submit" name="submit" type="submit">Submit</button>


        </form>


    </div>
</body>

</html>