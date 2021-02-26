<!DOCTYPE html>
<html>
<head>
<style>
body
{
    background-image: url("images/stone.jpg");
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
    error_reporting(E_PARSE | E_ERROR);
    require('connectionmaking.php');
        if(isset($_POST['name']) && isset($_POST['nid']) && isset($_POST['profession']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['location']) && isset($_POST['houseno']) )
        {

            if(isset($_POST['roadno']) && isset($_POST['contact']) && isset($_POST['acctype']) && isset($_POST['iniamount']) && isset($_POST['bno']))
            {
                $name = $_POST['name'];
                $nid = $_POST['nid'];
                $profession = $_POST['profession'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $location = $_POST['location'];
                $houseno = $_POST['houseno'];
                $roadno = $_POST['roadno'];
                $contact = $_POST['contact'];
                $acctype = $_POST['acctype'];
                $iniamount = $_POST['iniamount'];
                $bno = $_POST['bno'];

                if($name!="" && $nid!="" && $profession!="" && $location!="" && $houseno!="" && $roadno!="" && $email!="" && $password!="")
                {
                    if($contact!="" && $acctype!="" && $iniamount!="" && $bno!="")
                    {
                        $queryCustomer = "INSERT INTO Customer VALUES('{$name}', '{$nid}','{$profession}', '{$email}', '{$password}', '{$location}','{$houseno}', '{$roadno}', '{$contact}')";

                        $queryAccount = "INSERT INTO Account(AccountType, Savings, NID, BranchNo) VALUES('{$acctype}','{$iniamount}', '{$nid}','{$bno}')";

                        if(mysqli_query($conn, $queryCustomer) )
                        {
                            echo "<h1>" . "Customer information added!" . "</h1>";
                        }
                        else echo "<h1>" . "Something went wrong with customer information!" . "</h1>";
                        if(mysqli_query($conn, $queryAccount))
                        {
                            echo "<h1>" . "Account information added!" . "</h1>";
                        }
                        else echo "<h1>" . "Something went wrong with account information!" . "</h1>";
                    }
                    else echo "<h1>" . "You must provide all informations in the form" . "</h1>";
                }
                else echo "<h1>" . "You must provide all informations in the form" . "</h1>";
            }
            else echo "<h1>" . "You must provide all informations in the form" . "</h1>";
        }
        else echo "<h1>" . "You must provide all informations in the form" . "</h1>";
?>

</body>
</html>
