<!DOCTYPE html>
<html>
<head> <title> </title>
</head>
<style>
    table
    {
        margin: auto;
        text-align: center;
        table-layout: auto;
    }
    table, tr, td,th
    {
        padding: 10px;
        color: white;
        border: 1px solid #080808;
        border-collapse: collapse;
        font-size: 12px;
        font-family: Arial;
        background: linear-gradient(top, #3c3c3c 0%, #222222 100%);
        background: -webkit-linear-gradient(top, #3c3c3c 0%, #222222 100%);
    }
    tr:hover td
    {
        background-color: Purple;
        color : White;
    }
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
<body>

<?php
    require('connectionmaking.php');
    error_reporting(E_PARSE | E_ERROR);

    if($_POST['search']!="" && $_POST['value']!="")
    {
        if($_POST['search']=="NID")
        {
            $nid = $_POST['value'];
            $queryCustomer = "SELECT * FROM Customer WHERE NID = '{$nid}'";
            $customerResult = mysqli_query($conn, $queryCustomer);
            if(mysqli_num_rows($customerResult) > 0)
            {
                echo "<h1 style='text-align: center;'>" . "Customer Information" . "</h1>";
                echo "<table align = 'center' width = '1200' cellspacing='1'>";
                echo "<tr> <th> Name </th> <th> NID </th> <th> Profession </th> <th> Location </th> <th> House No. </th> <th> Road No. </th> <th> E-Mail </th> <th> Password </th> <th> Contact Number </th> </tr>";
                while($row = mysqli_fetch_assoc($customerResult))
                {
                    echo "<tr>";
                    echo "<td>" .$row['Name']. "</td>";
                    echo "<td>" .$row['NID']. "</td>";
                    echo "<td>" .$row['Profession']. "</td>";
                    echo "<td>" .$row['Location']. "</td>";
                    echo "<td>" .$row['HouseNo']. "</td>";
                    echo "<td>" .$row['RoadNo']. "</td>";
                    echo "<td>" .$row['E_mail']. "</td>";
                    echo "<td>" .$row['Password']. "</td>";
                    echo "<td>" .$row['ContactNumber']. "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else echo "<h1>" . "No match found!" . "</h1>";
            echo "<br>" . "<br>";
            $queryAccount = "SELECT Account.AccountNo,Account.AccountType,Account.Savings,Branch.BranchName,Branch.BranchNo FROM Account,Branch
            WHERE Account.BranchNo = Branch.BranchNo AND Account.NID = '{$nid}'";
            $accountResult = mysqli_query($conn, $queryAccount);
            if(mysqli_num_rows($accountResult)>0)
            {
                echo "<h1 style='text-align: center;'>" . "Account Information" . "</h1>";
                echo "<table align = 'center' width = '800' cellspacing='2'>";
                echo "<tr> <th> Account No. </th> <th> Account Type </th> <th> Savings </th> <th> Branch </th> <th> Branch No. </th> </tr>";
                while($row = mysqli_fetch_assoc($accountResult))
                {
                    echo "<tr>";
                    echo "<td>" .$row['AccountNo']. "</td>";
                    echo "<td>" .$row['AccountType']. "</td>";
                    echo "<td>" .$row['Savings']. "</td>";
                    echo "<td>" .$row['BranchName']. "</td>";
                    echo "<td>" .$row['BranchNo']. "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else echo "<h1>" . "No account information found!" . "</h1>";

            echo "<br>" . "<br>";
            $queryLoan = "SELECT  Loan.LoanNo, Loan.AccountNo, Loan.Amount, Loan.Paid, Loan.Remaining, Branch.BranchName, Branch.BranchNo FROM Loan,Branch
            WHERE Loan.BranchNo = Branch.BranchNo AND Loan.NID = '{$nid}'";
            $loanResult = mysqli_query($conn, $queryLoan);

            if(mysqli_num_rows($loanResult)>0)
            {
                echo "<h1 style='text-align: center;'>" . "Loan Status" . "</h1>";
                echo "<table align = 'center' width = '800' cellspacing='2'>";
                echo "<tr> <th> Loan No. </th> <th> Account No. </th> <th> Amount </th> <th> Paid </th> <th> Remaining </th> <th> Branch </th> <th> Branch No. </th> </tr>";
                while($row = mysqli_fetch_assoc($loanResult))
                {
                    echo "<tr>";
                    echo "<td>" .$row['LoanNo']. "</td>";
                    echo "<td>" .$row['AccountNo']. "</td>";
                    echo "<td>" .$row['Amount']. "</td>";
                    echo "<td>" .$row['Paid']. "</td>";
                    echo "<td>" .$row['Remaining']. "</td>";
                    echo "<td>" .$row['BranchName']. "</td>";
                    echo "<td>" .$row['BranchNo']. "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else echo "<h1>" . "Currently this customer doesn't have any loan!" . "</h1>";
            echo "<br>" . "<br>";
        }

        else if($_POST['search']=="AccountNo")
        {
            $accountno = $_POST['value'];
            $queryCustomer = "SELECT * FROM Customer WHERE NID =
            (SELECT NID FROM Account WHERE AccountNo = '{$accountno}')";
            $customerResult = mysqli_query($conn, $queryCustomer);
            if(mysqli_num_rows($customerResult) > 0)
            {
                echo "<h1 style='text-align: center;'>" . "Customer Information" . "</h1>";
                echo "<table align = 'center' width = '1200' cellspacing='1'>";
                echo "<tr> <th> Name </th> <th> NID </th> <th> Profession </th> <th> Location </th> <th> House No. </th> <th> Road No. </th> <th> E-Mail </th> <th> Password </th> <th> Contact Number </th> </tr>";
                while($row = mysqli_fetch_assoc($customerResult))
                {
                    echo "<tr>";
                    echo "<td>" .$row['Name']. "</td>";
                    echo "<td>" .$row['NID']. "</td>";
                    echo "<td>" .$row['Profession']. "</td>";
                    echo "<td>" .$row['Location']. "</td>";
                    echo "<td>" .$row['HouseNo']. "</td>";
                    echo "<td>" .$row['RoadNo']. "</td>";
                    echo "<td>" .$row['E_mail']. "</td>";
                    echo "<td>" .$row['Password']. "</td>";
                    echo "<td>" .$row['ContactNumber']. "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else echo "<h1>" . "No match found!" . "</h1>";
            echo "<br>" . "<br>";

            $queryAccount = "SELECT Account.AccountNo,Account.AccountType,Account.Savings,Branch.BranchName,Branch.BranchNo FROM Account,Branch
            WHERE Account.BranchNo = Branch.BranchNo AND Account.AccountNo = '{$accountno}'";
            $accountResult = mysqli_query($conn, $queryAccount);
            if(mysqli_num_rows($accountResult)>0)
            {
                echo "<h1 style='text-align: center;'>" . "Account Information" . "</h1>";
                echo "<table align = 'center' width = '800' cellspacing='2'>";
                echo "<tr> <th> Account No. </th> <th> Account Type </th> <th> Savings </th> <th> Branch </th> <th> Branch No. </th> </tr>";
                while($row = mysqli_fetch_assoc($accountResult))
                {
                    echo "<tr>";
                    echo "<td>" .$row['AccountNo']. "</td>";
                    echo "<td>" .$row['AccountType']. "</td>";
                    echo "<td>" .$row['Savings']. "</td>";
                    echo "<td>" .$row['BranchName']. "</td>";
                    echo "<td>" .$row['BranchNo']. "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else echo "<h1>" . "No account information found!" . "</h1>";
            echo "<br>" . "<br>";

            $queryLoan = "SELECT Loan.LoanNo, Loan.AccountNo, Loan.Amount, Loan.Paid, Loan.Remaining, Branch.BranchName,
            Branch.BranchNo FROM Loan,Branch WHERE Loan.BranchNo = Branch.BranchNo AND Loan.AccountNo = '{$accountno}'";

            $loanResult = mysqli_query($conn, $queryLoan);

            if(mysqli_num_rows($loanResult)>0)
            {
                echo "<h1 style='text-align: center;'>" . "Loan Status" . "</h1>";
                echo "<table align = 'center' width = '800' cellspacing='2'>";
                echo "<tr> <th> Loan No. </th> <th> Account No. </th> <th> Amount </th> <th> Paid </th> <th> Remaining </th> <th> Branch </th> <th> Branch No. </th> </tr>";
                while($row = mysqli_fetch_assoc($loanResult))
                {
                    echo "<tr>";
                    echo "<td>" .$row['LoanNo']. "</td>";
                    echo "<td>" .$row['AccountNo']. "</td>";
                    echo "<td>" .$row['Amount']. "</td>";
                    echo "<td>" .$row['Paid']. "</td>";
                    echo "<td>" .$row['Remaining']. "</td>";
                    echo "<td>" .$row['BranchName']. "</td>";
                    echo "<td>" .$row['BranchNo']. "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else echo "<h1>" . "Currently this customer doesn't have any loan!" . "</h1>";
            echo "<br>" . "<br>";
        }
        else if($_POST['search']=="LoanNo")
        {
            $loanno = $_POST['value'];

            $queryCustomer = "SELECT * FROM Customer WHERE NID =
            (SELECT NID FROM Loan WHERE LoanNo = '{$loanno}')";
            $customerResult = mysqli_query($conn, $queryCustomer);
            if(mysqli_num_rows($customerResult) > 0)
            {
                echo "<h1 style='text-align: center;'>" . "Customer Information" . "</h1>";
                echo "<table align = 'center' width = '1200' cellspacing='1'>";
                echo "<tr> <th> Name </th> <th> NID </th> <th> Profession </th> <th> Location </th> <th> House No. </th> <th> Road No. </th> <th> E-Mail </th> <th> Password </th> <th> Contact Number </th> </tr>";
                while($row = mysqli_fetch_assoc($customerResult))
                {
                    echo "<tr>";
                    echo "<td>" .$row['Name']. "</td>";
                    echo "<td>" .$row['NID']. "</td>";
                    echo "<td>" .$row['Profession']. "</td>";
                    echo "<td>" .$row['Location']. "</td>";
                    echo "<td>" .$row['HouseNo']. "</td>";
                    echo "<td>" .$row['RoadNo']. "</td>";
                    echo "<td>" .$row['E_mail']. "</td>";
                    echo "<td>" .$row['Password']. "</td>";
                    echo "<td>" .$row['ContactNumber']. "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else echo "<h1>" . "No match found!" . "</h1>";
            echo "<br>" . "<br>";

            $queryAccount = "SELECT Account.AccountNo,Account.AccountType,Account.Savings,Branch.BranchName,Branch.BranchNo
            FROM Account,Branch WHERE Account.BranchNo = Branch.BranchNo AND Account.AccountNo =
            (SELECT AccountNo FROM Loan WHERE LoanNo = '{$loanno}')";
            $accountResult = mysqli_query($conn, $queryAccount);
            if(mysqli_num_rows($accountResult)>0)
            {
                echo "<h1 style='text-align: center;'>" . "Account Information" . "</h1>";
                echo "<table align = 'center' width = '800' cellspacing='2'>";
                echo "<tr> <th> Account No. </th> <th> Account Type </th> <th> Savings </th> <th> Branch </th> <th> Branch No. </th> </tr>";
                while($row = mysqli_fetch_assoc($accountResult))
                {
                    echo "<tr>";
                    echo "<td>" .$row['AccountNo']. "</td>";
                    echo "<td>" .$row['AccountType']. "</td>";
                    echo "<td>" .$row['Savings']. "</td>";
                    echo "<td>" .$row['BranchName']. "</td>";
                    echo "<td>" .$row['BranchNo']. "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else echo "<h1>" . "No account information found!" . "</h1>";
            echo "<br>" . "<br>";

            $queryLoan = "SELECT Loan.LoanNo, Loan.AccountNo, Loan.Amount, Loan.Paid, Loan.Remaining, Branch.BranchName,
            Branch.BranchNo FROM Loan,Branch WHERE Loan.BranchNo = Branch.BranchNo AND Loan.LoanNo = '{$loanno}'";
            $loanResult = mysqli_query($conn, $queryLoan);

            if(mysqli_num_rows($loanResult)>0)
            {
                echo "<h1 style='text-align: center;'>" . "Loan Status" . "</h1>";
                echo "<table align = 'center' width = '800' cellspacing='2'>";
                echo "<tr> <th> Loan No. </th> <th> Account No. </th> <th> Amount </th> <th> Paid </th> <th> Remaining </th> <th> Branch </th> <th> Branch No. </th> </tr>";
                while($row = mysqli_fetch_assoc($loanResult))
                {
                    echo "<tr>";
                    echo "<td>" .$row['LoanNo']. "</td>";
                    echo "<td>" .$row['AccountNo']. "</td>";
                    echo "<td>" .$row['Amount']. "</td>";
                    echo "<td>" .$row['Paid']. "</td>";
                    echo "<td>" .$row['Remaining']. "</td>";
                    echo "<td>" .$row['BranchName']. "</td>";
                    echo "<td>" .$row['BranchNo']. "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else echo "<h1>" . "Currently this customer doesn't have any loan!" . "</h1>";
            echo "<br>" . "<br>";
        }
        else if($_POST['search']=="AccountType")
        {
            $acctype = $_POST['value'];

            $queryCustomer = "SELECT * FROM Customer WHERE NID IN
            (SELECT NID FROM Account WHERE AccountType = '{$acctype}')";
            $customerResult = mysqli_query($conn, $queryCustomer);
            if(mysqli_num_rows($customerResult) > 0)
            {
                echo "<h1 style='text-align: center;'>" . "Customer Information" . "</h1>";
                echo "<table align = 'center' width = '1200' cellspacing='1'>";
                echo "<tr> <th> Name </th> <th> NID </th> <th> Profession </th> <th> Location </th> <th> House No. </th> <th> Road No. </th> <th> E-Mail </th> <th> Password </th> <th> Contact Number </th> </tr>";
                while($row = mysqli_fetch_assoc($customerResult))
                {
                    echo "<tr>";
                    echo "<td>" .$row['Name']. "</td>";
                    echo "<td>" .$row['NID']. "</td>";
                    echo "<td>" .$row['Profession']. "</td>";
                    echo "<td>" .$row['Location']. "</td>";
                    echo "<td>" .$row['HouseNo']. "</td>";
                    echo "<td>" .$row['RoadNo']. "</td>";
                    echo "<td>" .$row['E_mail']. "</td>";
                    echo "<td>" .$row['Password']. "</td>";
                    echo "<td>" .$row['ContactNumber']. "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else echo "<h1>" . "No match found!" . "</h1>";
            echo "<br>" . "<br>";

            $queryAccount = "SELECT Account.AccountNo,Account.AccountType,Account.Savings,Branch.BranchName,Branch.BranchNo
            FROM Account,Branch WHERE Account.BranchNo = Branch.BranchNo AND Account.AccountType = '{$acctype}'";
            $accountResult = mysqli_query($conn, $queryAccount);
            if(mysqli_num_rows($accountResult)>0)
            {
                echo "<h1 style='text-align: center;'>" . "Account Information" . "</h1>";
                echo "<table align = 'center' width = '800' cellspacing='2'>";
                echo "<tr> <th> Account No. </th> <th> Account Type </th> <th> Savings </th> <th> Branch </th> <th> Branch No. </th> </tr>";
                while($row = mysqli_fetch_assoc($accountResult))
                {
                    echo "<tr>";
                    echo "<td>" .$row['AccountNo']. "</td>";
                    echo "<td>" .$row['AccountType']. "</td>";
                    echo "<td>" .$row['Savings']. "</td>";
                    echo "<td>" .$row['BranchName']. "</td>";
                    echo "<td>" .$row['BranchNo']. "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else echo "<h1>" . "No account information found!" . "</h1>";
            echo "<br>" . "<br>";

            $queryLoan = "SELECT Loan.LoanNo, Loan.AccountNo, Loan.Amount, Loan.Paid, Loan.Remaining, Branch.BranchName,
            Branch.BranchNo FROM Loan,Branch WHERE Loan.BranchNo = Branch.BranchNo AND Loan.NID IN
            (SELECT NID FROM Account WHERE AccountType = '{$acctype}')";
            $loanResult = mysqli_query($conn, $queryLoan);

            if(mysqli_num_rows($loanResult)>0)
            {
                echo "<h1 style='text-align: center;'>" . "Loan Status" . "</h1>";
                echo "<table align = 'center' width = '800' cellspacing='2'>";
                echo "<tr> <th> Loan No. </th> <th> Account No. </th> <th> Amount </th> <th> Paid </th> <th> Remaining </th> <th> Branch </th> <th> Branch No. </th> </tr>";
                while($row = mysqli_fetch_assoc($loanResult))
                {
                    echo "<tr>";
                    echo "<td>" .$row['LoanNo']. "</td>";
                    echo "<td>" .$row['AccountNo']. "</td>";
                    echo "<td>" .$row['Amount']. "</td>";
                    echo "<td>" .$row['Paid']. "</td>";
                    echo "<td>" .$row['Remaining']. "</td>";
                    echo "<td>" .$row['BranchName']. "</td>";
                    echo "<td>" .$row['BranchNo']. "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else echo "<h1>" . "Currently this customer doesn't have any loan!" . "</h1>";
            echo "<br>" . "<br>";
        }
    }
    else echo "<h1>" . "Please enter data" . "</h1>";
?>

</body>
</html>
