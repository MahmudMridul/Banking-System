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

    $accountNo = $_REQUEST['accnumber'];

    if($accountNo!="")
    {
        $query = "SELECT LoanNo, Amount, Paid, Remaining FROM Loan WHERE AccountNo = '{$accountNo}'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result)!=0)
        {
            $row = mysqli_fetch_assoc($result);
            $remaining = $row['Remaining'];

            if($remaining>0)
            {
                echo "<h1>" . "Customer needs to pay " . $remaining ." BDT before closing account". "</h1>" ;
            }

        }
        else
        {
            $querySavings = "SELECT Savings FROM Account WHERE AccountNo = '{$accountNo}'";
            $saving = mysqli_query($conn, $querySavings);
            $row = mysqli_fetch_assoc($saving);
            $save = $row['Savings'];


            $queryDelete = "DELETE FROM Account WHERE AccountNo = '{$accountNo}'";
            if(mysqli_query($conn, $queryDelete))
            {
                    echo "<h1>" . "Account was closed" . "</h1>" ;
            }
            else echo "<h1>" . "Something went wront with delete" . "</h1>" ;

            if($save>0)
            {
                echo "<h1>" . "Customer had " . $save ." BDT in account". "</h1>" ;
            }

        }

    }
    else echo "<h1>" . "Please enter an account number" . "</h1>" ;
?>
</body>
<html>
