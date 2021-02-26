<!DOCTYPE html>
<html>
<head>
    <title> </title>
    <link rel = "stylesheet" href = "style.css">
    <style>
    body
    {
        background-image: url("images/stone.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
    </style>
</head>
<body>
    <form class = "box" action = "UpdateAccountStatus.php" method = "post">
        <h1> Update Account Status </h1>
        <input type = "text" name = "accnumber" placeholder = "Account Number">
        <input type = "text" name = "saving" placeholder = "Add to Savings">
        <input type = "text" name = "loan" placeholder = "Pay Loan">
        <input type = "text" name = "withdraw" placeholder = "Withdraw Saving">
        <input type = "text" name = "giveLoan" placeholder = "Provide Loan">
        <input type = "submit" name = "sub" value = "Update">
    </form>
</body>
<html>
