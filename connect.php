<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (!empty($username)){
        if (!empty($password)){
            $host = "localhost";
            $dbusername = "root";
            $dbpassword = "";
            $dbname = "testforme";
            // Create connection
            $conn = new mysqli ('localhost', 'root', '', 'testforme');
            if ($conn->connect_error){
                die('Connection Failed : '.$conn->connect_error);
            }
            else{
                $sql = $conn->prepare("INSERT INTO account (username, password)
                values (?, ?, ?)");
                $sql->bind_param("iss", $id, $username, $password);
                echo "New record is inserted sucessfully";
                $sql->close();
                $conn->close();
            }
        }
        else{
            echo "Password should not be empty";
            die();
        }
    }
    else{
        echo "Username should not be empty";
        die();
    }
?>