<?php


class db
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "root";
    private $dbname = "smartpoint";

    public function insertTimestamp($t,$key)
    {
        // Create connection
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql1 = "INSERT INTO api_key (api) VALUES('$key')";
        $sql2="INSERT INTO timestamp (timestamp, api_key_id) VALUES('$t' , LAST_INSERT_ID())";

//$conn->begin_transaction(MYSQLI_TRANS_START_READ_ONLY);
$conn->query($sql1);
$conn->query($sql2);
 //       $conn->commit();
//        if ($conn->query($sql) === TRUE) {
//            $er = "New record created successfully";
//        } else {
//            $er = "Error: " . $sql . "<br>" . $conn->error;
//        }

        $conn->close();
        return ;
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