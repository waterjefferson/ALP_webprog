<?php

function my_connectDB() {
    $host = 'localhost';
    $user = 'root';
    $pwd = '';
    $db = 'webprog';

    $conn = mysqli_connect($host, $user, $pwd, $db);

    // Check for connection errors
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}

function my_closeDB($conn) {
    if ($conn) {
        mysqli_close($conn);
    }
}

function readGuestBook() {
    $conn = my_connectDB();
    $sql_query = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql_query) or die("Query failed: " . mysqli_error($conn));

    if ($result->num_rows > 0) {
        $entries = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $entries[] = $row;
        }
        return $entries;
    } else {
        return [];
    }

    function deleteGuestBook($guestbook_id) {
        if ($guestbook_id > 0) {
            $conn = my_connectDB();
            $sql_query = "DELETE FROM 'guestbook' WHERE 'guestbook_id' = ".$guestbook_id;
            $result = mysqli_query($conn, $sql_query) or die("Query failed: " . mysqli_error($conn));
            my_closeDB($conn);
        }
        return $result;
    }

    function updateGuestBook($id, $name, $email, $message) {
        if ($id!= '' && $name != '' && $email != '' && $message != '') {
            $conn = my_connectDB();
            $sql_query = "UPDATE 'guestbook' SET 'name' = '$name', 'email' = '$email', 'message' = '$message' WHERE 'guestbook_id' = ".$id;
            $result = mysqli_query($conn, $sql_query) or die("Query failed: " . mysqli_error($conn));
            my_closeDB($conn);
        }
        return $result;
    }

    function getGuestBookWithId($guestbook_id) {
        if ($guestbook_id > 0) {
        $conn = my_connectDB();
        $sql_query = "DELETE FROM 'guestbook' WHERE 'guestbook_id' = ".$guestbook_id;
            $result = mysqli_query($conn, $sql_query) or die("Query failed: " . mysqli_error($conn));

            if ($result->num_rows > 0) {
                $row = mysqli_fetch_assoc($result);
                $data['id'] = $row["guestbook_id"];
                $data['name'] = $row["name"];
                $data['email'] = $row["email"];
                $data['message'] = $row["message"];
            }
        }
        my_closeDB($conn);

    }
}