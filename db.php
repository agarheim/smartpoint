<?php


class db
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "root";
    private $dbname = "smartpoint";

    public function insertTimestamp($t)
    {
        // Create connection
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

          $sql = "INSERT INTO timestamp (timestamp) values ('$t')";

        if ($conn->query($sql) === TRUE) {
            $er = "New record created successfully";
        } else {
            $er = "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        return $er;
    }

    public function getLastTime()
    {
        // Create connection
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT timestamp FROM timestamp ORDER by timestamp DESC ";
        $q = $conn->query($sql);

        $conn->close();
        return $q->fetch_row();
    }
}