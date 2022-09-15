<?php
include "connect.php";

if (isset($_POST['submit'])){   
    $user_name=$_POST['id'];
    $email=$_POST['email'];

    $sql="insert into`users` (user_name, email) values('$user_name','$email')";
    $result=mysqli_query($con, $sql);
        
    if(!$result){
        die(mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" </head>

<body>
    <div class="container">
        <button class="btn btn-primary my-5"><a href="users.php" class="text-light">Add user</a></button>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">user_name</th>
                    <th scope="col">email</th>
                    <th scope="col">operations</th>
                </tr>
            </thead>
            <tbody>

                <?php
                //sunt afisate datele
                $sql = "Select * from `users`";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $user_name = $row['user_name'];
                        $email = $row['email'];

                        echo '<tr>
                    <th scope="row">' . $id . '</th>
                    <td>' . $user_name . '</td>
                    <td>' . $email . '</td>
                    <td>
                       <button class="btn btn-primary"><a href="update.php?updateuser_name=' . $id . '" class="text-light">Update</a></button>
                       <button class="btn btn-danger"><a href="delete.php?deleteuser_name=' . $id . '" class="text-light">Delete</a></button>
                    </td>
                </tr>';
                    }
                }
                ?>

            </tbody>
        </table>

    </div>
</body>

</html>