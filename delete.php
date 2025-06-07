<?php include_once("connection.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update User</title>
    </head>
    <body>
    <h1>DELETE GUESTBOOK DATA</h1>
    <?php
    $data_to_be_deleted = deleteGuestBook($data_to_be_deleted);
    echo $resultDelete;
    ?>
    </body>
    </html>

