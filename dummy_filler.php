 <?php
$servername = "localhost";
$username = "root";
$password = "system";
$dbname = "ecommerce01";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "";
for($i=1;$i<1000;$i++){
$sql .= "INSERT INTO products (name, description, price,date,category,image)
VALUES (\"product $i\",\"product $i\",".(($i%3+1)*100).",\"2017-11-25 07:00:00\",".($i%3+1).",\"flower0".($i%3+1).".jpeg\");";
}

if ($conn->multi_query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
echo $sql;
$conn->close();
?> 