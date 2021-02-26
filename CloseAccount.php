<!DOCTYPE html>
<html>
<head>
    <title> </title>
    <link rel = "stylesheet" href = "style.css">
</head>
<style>
body
{
    background-image: url("images/stone.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
}
</style>
<body>
    <form class = "box" action = "CheckIfAccountCanbeClosed.php" method = "post">
        <h1> Close Account </h1>
        <input type = "text" name = "accnumber" placeholder = "Account Number">
        <input type = "submit" name = "sub" value = "Check">
    </form>
</body>
<html>
