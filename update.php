<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update User</title>
    <?php
    $data_to_be_updated = $_GET['updateID'];
    getGuestBookWithId($data_to_be_updated);
    ?>

    <form action="update.php" method="post">
        <p>Name: <input type="text" name="input_name" value="aaa"></p>
        <p>Email: <input type="text" name="input_email" value=""></p>
        <p>Message: <textarea name="input_message" rows="5" cols="40">bbb</textarea></p>
        <p><input type="submit" name="update_submit" value="UPDATE"></p>
</form>

<?php
if (isset($_POST['update_submit'])) {
    $id = $_POST['update_id'];
    $name = $_POST['update_name'];
    $email = $_POST['update_email'];
    $message = $_POST['update_message'];
    $result = updateGuestBook($id, $name, $email, $message);
}
?>