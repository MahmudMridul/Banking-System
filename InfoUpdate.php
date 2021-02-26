<!DOCTYPE html>
<html>
<head>
    <style>
    body
    {
        background-image: url("images/londonbridge.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
    h1
    {
        color: Black;
        text-align: center;
    }
    </style>
</head>
<body>

<?php
    require('connectionmaking.php');

    if($_POST['nid']!="")
    {
        if($_POST['value']!="")
        {
            if(isset($_POST['update']) && isset($_POST['nid']) && isset($_POST['value']))
            {
                $nid = $_POST['nid'];
                $val = $_POST['value'];

                if($_POST['update'] == "E_mail")
                {
                    $query = "UPDATE Customer SET E_mail = '{$val}' WHERE NID = '{$nid}'";
                    if(mysqli_query($conn, $query))
                    {
                        echo "<h1>" . "Your E-Mail was updated successfully!" . "</h1>";
                    }
                    else echo "<h1>" . "Something went wrong!" . "</h1>";
                }
                else if($_POST['update'] == "Password")
                {
                    $query = "UPDATE Customer SET Password = '{$val}' WHERE NID = '{$nid}'";
                    if(mysqli_query($conn, $query))
                    {
                        echo "<h1>" . "Your Password was updated successfully!" . "</h1>";
                    }
                    else echo "<h1>" . "Something went wrong!" . "</h1>";
                }
                else if($_POST['update'] == "Location")
                {
                    $query = "UPDATE Customer SET Location = '{$val}' WHERE NID = '{$nid}'";
                    if(mysqli_query($conn, $query))
                    {
                        echo "<h1>" . "Your Location was updated successfully!" . "</h1>";
                    }
                    else echo "<h1>" . "Something went wrong!" . "</h1>";
                }
                else if($_POST['update'] == "HouseNo")
                {
                    $query = "UPDATE Customer SET HouseNo = '{$val}' WHERE NID = '{$nid}'";
                    if(mysqli_query($conn, $query))
                    {
                        echo "<h1>" . "Your House No. was updated successfully!" . "</h1>";
                    }
                    else echo "<h1>" . "Something went wrong!" . "</h1>";
                }
                else if($_POST['update'] == "RoadNo")
                {
                    $query = "UPDATE Customer SET RoadNo = '{$val}' WHERE NID = '{$nid}'";
                    if(mysqli_query($conn, $query))
                    {
                        echo "<h1>" . "Your Road No. was updated successfully!" . "</h1>";
                    }
                    else echo "<h1>" . "Something went wrong!" . "</h1>";
                }
                else if($_POST['update'] == "Profession")
                {
                    $query = "UPDATE Customer SET Profession = '{$val}' WHERE NID = '{$nid}'";
                    if(mysqli_query($conn, $query))
                    {
                        echo "<h1>" . "Your Profession was updated successfully!" . "</h1>";
                    }
                    else echo "<h1>" . "Something went wrong!" . "</h1>";
                }
                else if($_POST['update'] == "Con")
                {
                    $query = "UPDATE Customer SET ContactNumber = '{$val}' WHERE NID = '{$nid}'";
                    if(mysqli_query($conn, $query))
                    {
                        echo "<h1>" . "Your Contact Number was updated successfully!" . "</h1>";
                    }
                    else echo "<h1>" . "Something went wrong!" . "</h1>";
                }
            }
            else echo "<h1>" . "Something went wrong!" . "</h1>";
        }
        else echo "<h1>" . "Please enter new data" . "</h1>";
    }
    else echo "<h1>" . "Please enter your NID" . "</h1>";
?>

</body>
</html>
