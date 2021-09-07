<?php include "header.php"; ?>

<?php

$conn= mysqli_connect("localhost", "root", "", "task2") or die("Connection Error");

$sql="SELECT * from user_info";

$query = mysqli_query($conn, $sql) or die("Query Error");

if(mysqli_num_rows($query)>0){
?>
    <table class="table" cellpadding="5px">
            <thead>
            <th>ID</th>
            <th>Name</th>
            <th>EMAIL</th>
            <th>DOB</th>
            <th>PHONE NO.</th>
            <th>Designation</th>
            <th>Gender</th>    
            <th>Hobbies</th>    
            <th>Action</th>    
             </thead>
            <tbody>
            <?php   while ($row = mysqli_fetch_assoc($query)){ ?>
                <tr><td><?php echo $row["id"] ?></td>
                <td><?php echo $row["fname"] ." ". $row["lname"] ?></td>
                <td><?php echo $row["email"] ?></td>
                <td><?php echo $row["dob"] ?></td>
                <td><?php echo $row["phone"] ?></td>
                <td><?php echo $row["designation"] ?></td>
                <td><?php echo $row["gender"] ?></td>
                <td><?php echo $row["hobbies"] ?> </td>
                <td><a href='deletedata.php?id=<?php echo $row["id"]?>'>Delete</a></td>
                </tr>
            </tbody>
    <?php } }?>
    </table>
    </div>

    </body>
    </html>