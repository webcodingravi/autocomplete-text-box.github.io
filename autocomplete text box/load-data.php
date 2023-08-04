<?php

$conn = mysqli_connect("localhost", "root", "", "info") or die("connection failed");

$stu_id = $_POST['city'];

$sql = "SELECT * FROM student WHERE city = '{$stu_id}'";

$result = mysqli_query($conn, $sql) or die("query failed");

$output = "";

if(mysqli_num_rows($result) > 0) {
    $output .= '<table class="table table-bordered">
         <tr>
         <th>Id</th>
         <th>Name</th>
         <th>Age</th>
         <th>City</th>
         </tr>';
        while($row = mysqli_fetch_assoc($result)) {
            "<tr>
             <td>{$row['id']}</td>
             <td>{$row['stu_name']}</td>
             <td>{$row['last_name']}</td>
             <td>{$row['Age']}</td>
             <td>{$row['City']}</td>
            </tr>";
        }

   $output .= "</table>";

   echo $output;
}else {
    echo "No Record Found";
}






?>