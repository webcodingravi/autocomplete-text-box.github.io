<?php

$conn = mysqli_connect("localhost", "root", "", "info") or die("connection failed");

$search_trem = $_POST['city'];

$sql = "SELECT distinct(city) FROM student WHERE city LIKE '%{$search_trem}%'";

$result = mysqli_query($conn, $sql) or die("Query failed");

$output = "<ul class='list-group'>";
if(mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
    $output .= "<li class='list-group-item'>{$row['city']}</li>";
   }
    
}else{
     $output .= "<li class='list-group-item'>City Not Found</li>";
}

$output .= "</ul>";

echo $output;



?>