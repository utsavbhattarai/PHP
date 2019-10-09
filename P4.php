<?php
$FirstName = $_POST['FirstName'];
$LastName  = $_POST['LastName'];
$qp1 = $_POST['qp1'];
$qp2 = $_POST['qp2'];
$qp3 = $_POST['qp3'];
$qp4 = $_POST['qp4'];
$qp5 = $_POST['qp5'];
$qp6 = $_POST['qp6'];
$qp7 = $_POST['qp7'];
$qp8 = $_POST['qp8'];
$qp9 = $_POST['qp9'];
$qp10 = $_POST['qp10'];
$time =    
$scoreTotal = 0;
$correctAns = array("a","c","a","a","c","b","a","c","a","P4.php");

if(!empty($FirstName) || !empty($LastName))
{
    if($correctAns[0] == $qp1){
        ++$scoreTotal; 
    }
    if($correctAns[1] == $qp2){
        ++$scoreTotal; 
    }
    if($correctAns[2] == $qp3){
        ++$scoreTotal; 
    }
    if($correctAns[3] == $qp4){
        ++$scoreTotal; 
    }
    if($correctAns[4] == $qp5){
        ++$scoreTotal; 
    }
    if($correctAns[5] == $qp6){
        ++$scoreTotal; 
    }
    if($correctAns[6] == $qp7){
        ++$scoreTotal; 
    }
    if($correctAns[7] == $qp8){
        ++$scoreTotal; 
    }
    if($correctAns[8] == $qp9){
        ++$scoreTotal; 
    }
    if($correctAns[9] == $qp10){
        ++$scoreTotal; 
    }
    echo $scoreTotal;
    /* $host = "localhost";
    $dbUsername = "cmps401";
    $dbPassword = "Mycmps401db";
    $dbName = "cmps401"; */

    //create connection
    //add the above credential to the following mysqli_connect params.
    $conn = mysqli_connect("localhost", "root", "","cmps401");
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }else{
        echo "connection successfull!";
    }

    // sql to create table
    $q = "CREATE TABLE g101 (
    FirstName varchar(20),
    LastName varchar(20),
    Score int,
    Time varchar(20),
    PRIMARY KEY (FirstName)
    )"; 
    if (mysqli_query($conn, $q)) {
        echo "Table g101 created successfully";
    } else {
        echo "Table already exists! " . mysqli_error($conn);
    }
   
    
    //insert query
   /*  $sql = "INSERT INTO g101 (FirstName, LastName, Score, Time)
    VALUES ('$FirstName', '$LastName', $scoreTotal, $time)"; */
    $sql = "INSERT INTO g101 (FirstName, LastName, Score, Time) 
    VALUES ('$FirstName', '$LastName',$scoreTotal, $time)
    ON DUPLICATE KEY UPDATE Score = $scoreTotal, Time= $time";
    sendQuery($conn, $sql); 
    echo "Print done!";
    

    //close the connection.
    mysqli_close($conn);
}
//push to the database.
function sendQuery($conn, $q) {
    if ($r = mysqli_query($conn, $q))
    echo "<br>Success Query: ".$q;
    else
    echo "<br>Failure Query: ".$q;
    return $r;
}

?>