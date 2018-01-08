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
for($i=1;$i<=999;$i++){
$strI = sprintf('%03d', $i);
$price = $i > 500 ? $i : $i*100;
$cat = $i % 3 +1;
$sql .= "INSERT INTO products (name, description, price,date,category,image)
VALUES ('product{$strI}', 'Basic Description{$strI}', $price,'2017-01-01',{$cat},'image{$cat}.jpg'); ";
}
//echo $sql;
if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 