<?php
require('db.php');
include("auth.php");
$status = "";
if (isset($_POST['new']) && $_POST['new'] == 1) {
    $trn_date = date("Y-m-d H:i:s");
    $name = $_REQUEST['name'];
    $age = $_REQUEST['age'];
    $submittedby = $_SESSION["username"];
    $ins_query = "insert into product
    (`trn_date`,`name`,`age`,`submittedby`)values
    ('$trn_date','$name','$age','$submittedby')";
    mysqli_query($con, $ins_query)
    or die(mysql_error());
    $status = "New Record Inserted Successfully.
    </br></br><a href='manage-user.php'>View Inserted Record</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Insert New Record</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<div class="form">
    <p><a href="dashboard.php">Dashboard</a>
        | <a href="manage-user.php">View User lists</a>
        | <a href="logout.php">Logout</a></p>
    <div>
        <h1>Insert New User</h1>
        <form name="form" method="post" action="">
            <input type="hidden" name="new" value="1"/>
            <p><input type="text" name="name" placeholder="Enter Name" required/></p>
            <p><input type="text" name="age" placeholder="Enter Age" required/></p>
            <p><input name="submit" type="submit" value="Submit"/></p>
        </form>
        <p style="color:#FF0000;"><?php echo $status; ?></p>
    </div>
</div>
</body>
</html>