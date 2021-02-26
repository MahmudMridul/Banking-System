
<!DOCTYPE html>
<html>
<head> <title> DATA from DATABASE </title> </head>
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
        background-image: url("images/londonbridge.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
</style>

<body>

    <?php
        error_reporting(E_PARSE | E_ERROR);
        require('connectionmaking.php');
        $user = $_REQUEST['user'];
        $passwd = $_REQUEST['pass'];
        $query = "SELECT * FROM Customer WHERE E_mail = '{$user}' AND password = '{$passwd}'";
        $checkResult = mysqli_query($conn, $query);
        if(mysqli_num_rows($checkResult) > 0)
        {
            if($user!="" && $passwd!="")
            {
                $sql = "SELECT * FROM Customer WHERE E_mail = '{$user}' AND password = '{$passwd}'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0)
                {
                    echo "<h1 style='text-align: center;'>" . "Customer Information" . "</h1>";
                    echo "<table align = 'center' width = '1200' cellspacing='1'>";
                    echo "<tr> <th> Name </th> <th> NID </th> <th> Profession </th> <th> Location </th> <th> House No. </th> <th> Road No. </th> <th> E-Mail </th> <th> Password </th> <th> Contact Number </th> </tr>";
                    while($row = mysqli_fetch_assoc($result))
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
                else echo "<h3 align = 'center'>"."No Match Found!"."</h3>";

                echo "<br>" . "<br>";


                $sql = "SELECT Account.AccountNo,Account.AccountType,Account.Savings,Branch.BranchName,Branch.BranchNo FROM Account,Branch WHERE Account.BranchNo = Branch.BranchNo AND Account.NID = (SELECT NID FROM Customer WHERE E_mail = '{$user}' AND Password = '{$passwd}')";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0)
                {
                    echo "<h1 style='text-align: center;'>" . "Account Information" . "</h1>";
                    echo "<table align = 'center' width = '800' cellspacing='2'>";
                    echo "<tr> <th> Account No. </th> <th> Account Type </th> <th> Savings </th> <th> Branch </th> <th> Branch No. </th> </tr>";
                    while($row = mysqli_fetch_assoc($result))
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
                else echo "<h3 align = 'center'>" ."Currently you don't have any account information,<p> make sure that you have an account in our bank</p>"."</h3>";

                echo "<br>" . "<br>";


                $sql = "SELECT  Loan.LoanNo, Loan.AccountNo, Loan.Amount, Loan.Paid, Loan.Remaining, Branch.BranchName, Branch.BranchNo FROM Loan,Branch WHERE Loan.BranchNo = Branch.BranchNo AND Loan.NID = (SELECT NID FROM Customer WHERE E_mail = '{$user}' AND Password = '{$passwd}')";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0)
                {
                    echo "<h1 style='text-align: center;'>" . "Loan Status" . "</h1>";
                    echo "<table align = 'center' width = '800' cellspacing='2'>";
                    echo "<tr> <th> Loan No. </th> <th> Account No. </th> <th> Amount </th> <th> Paid </th> <th> Remaining </th> <th> Branch </th> <th> Branch No. </th> </tr>";
                    while($row = mysqli_fetch_assoc($result))
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
                else echo "<h3 align = 'center'>" . "Currently you don't have any loan to pay!"."</h3>";


                echo "<br>" . "<br>";
                echo "<h3 style='text-align: center; color: white;'> If you want to update any data please <a href = 'CustomerInfoUpdate.php'> CLICK HERE <a> </h3>";

            }
            else
            {
                echo "<h1 align = 'center'>" . "Wrong email or password!" . "</h1>";
            }
        }
        else
        {
            echo "<h1 align = 'center'>" . "Wrong email or password!" . "</h1>";
        }
    ?>

</body>
</html>
