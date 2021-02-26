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
        color:black;
        text-align: center;
    }
    </style>
</head>
<body>
<?php
    error_reporting(E_PARSE | E_ERROR);
    require('connectionmaking.php');

    $accountNumber = $_REQUEST['accnumber'];
    $saving = $_REQUEST['saving'];
    $loan = $_REQUEST['loan'];
    $withdraw = $_REQUEST['withdraw'];
    $provide = $_REQUEST['giveLoan'];

    if($accountNumber!="")
    {
        $queryAccount = "SELECT * FROM Account WHERE AccountNo = '{$accountNumber}'";
        $resultAccount = mysqli_query($conn, $queryAccount);

        if(mysqli_num_rows($resultAccount)>0)
        {
            $row = mysqli_fetch_assoc($resultAccount);
            $save = $row['Savings'];
            if($saving>0)
            {
                $save = $save + $saving;
                $addSaving = "UPDATE Account SET Savings = '{$save}' WHERE AccountNo = '{$accountNumber}'";
                if(mysqli_query($conn, $addSaving))
                {
                    echo "<h1>" . "Savings got updated! current savings is " .$save. " BDT" . "</h1>";
                }
                else echo "<h1>" . "Savings update went wrong!" . "</h1>";
            }


            $queryLoan = "SELECT * FROM Loan WHERE AccountNo = '{$accountNumber}'";
            $resultLoan = mysqli_query($conn, $queryLoan);
            if($loan>0)
            {
                if(mysqli_num_rows($resultLoan)>0)
                {
                    $row = mysqli_fetch_assoc($resultLoan);
                    $rem = $row['Remaining'];
                    $paid = $row['Paid'];
                    if($loan>0)
                    {
                        if($loan<=$rem)
                        {
                            $newRem = $rem - $loan;
                            $newPaid = $paid + $loan;
                            $queryPayment = "UPDATE Loan SET Remaining = '{$newRem}', Paid = '{$newPaid}' WHERE AccountNo = '{$accountNumber}'";

                            if(mysqli_query($conn, $queryPayment))
                            {
                                echo "<h1>" . "Payment done successfully!" . "</h1>" . "<br>";
                                echo "<h1>" . "Loan remaining " .$newRem. " BDT" . "</h1>";
                            }
                            else echo "<h1>" . "Something got wrong with payment" . "</h1>";
                        }
                        else echo "<h1>" . "Invalid Payment!" . "</h1>";
                    }
                }
                else echo "<h1>" . "This account doesn't have a loan currently" . "</h1>";
            }

            $queryAccount = "SELECT * FROM Account WHERE AccountNo = '{$accountNumber}'";
            $resultAccount = mysqli_query($conn, $queryAccount);
            $row = mysqli_fetch_assoc($resultAccount);
            $currentBalance = $row['Savings'];

            if($withdraw>0)
            {
                if($withdraw<=$currentBalance)
                {
                    $newBalance = $currentBalance - $withdraw;
                    $queryWithdraw = "UPDATE Account SET Savings = '{$newBalance}' WHERE AccountNo = '{$accountNumber}'";

                    if(mysqli_query($conn, $queryWithdraw))
                    {
                        echo "<h1>" . "Withdraw successful!" . "</h1>" . "<br>";
                        echo "<h1>" . "New balance is " . $newBalance . " BDT" . "</h1>";
                    }
                    else echo "<h1>" . "Something went wrong while withdrawing" . "</h1>";
                }
                else echo "<h1>" . "Invalid amount to withdraw!" . "</h1>";
            }

            if($provide>0)
            {
                $queryAccount = "SELECT * FROM Account WHERE AccountNo = '{$accountNumber}'";
                $resultAccount = mysqli_query($conn, $queryAccount);
                $rowAccount = mysqli_fetch_assoc($resultAccount);

                $nid = $rowAccount['NID'];
                $branchno = $rowAccount['BranchNo'];
                $currentBalance = $rowAccount['Savings'];

                $queryLoan = "SELECT * FROM Loan WHERE AccountNo = '{$accountNumber}'";
                $resultLoan = mysqli_query($conn, $queryLoan);
                $rowLoan = mysqli_fetch_assoc($resultLoan);

                if(mysqli_num_rows($resultLoan)>0)
                {
                    $remaining = $rowLoan['Remaining'];
                    echo "<h1>" . "This account already has loan! " . "</h1>" . "<br>";
                    echo "<h1>" . "Needs to pay " . $remaining . " BDT to get next loan" . "</h1>";
                }
                else
                {
                    if($currentBalance>=10000)
                    {
                        $queryProvide = "INSERT INTO Loan(Amount, Paid, Remaining, NID, AccountNo, BranchNo)
                        VALUES('{$provide}', 0, '{$provide}', '{$nid}', '{$accountNumber}', '{$branchno}')";

                        if(mysqli_query($conn, $queryProvide))
                        {
                            echo "<h1>" . "Loan provided successfully!" . "</h1>";
                        }
                        else echo "<h1>" . "Something went wrong while providing loan!" . "</h1>";
                    }
                }
            }
        }
        else echo "<h1>" . "Sorry, this account doesn't exist" . "</h1>";
    }
    else echo "<h1>" . "Please enter an account number" . "</h1>";
?>
</body>
<html>
