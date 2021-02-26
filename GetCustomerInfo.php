<!DOCTYPE html>
<html>
<head>
    <title> </title>
    <link rel = "stylesheet" href = "SelectStyle.css">
    <style>
    input[type=text]
    {
        left: 50%;
        width: 30%;
        border: 2px solid #aaa;
        border-radius: 4px;
        margin: 8px 0;
        outline: none;
        padding: 8px;
        box-sizing: border-box;
        transition: 0.25s;
    }
    input[type=text]:focus
    {
        border-color: dodgerBlue;
        box-shadow: 0 0 8px 0 dodgerBlue;
    }
    input[type=submit]
    {
        width: 10%;
        border: 2px solid #aaa;
        border-radius: 4px;
        margin: 8px 0;
        outline: none;
        padding: 8px;
        box-sizing: border-box;
        transition: 0.25s;
    }
    body
    {
        background-image: url("images/stone.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
    div
    {







    }

    </style>
</head>
<body>
<div style="background-color: Black; opacity: 0.8; color: White; text-align: center; font-size: 60px; line-height:1.3; font-weight:700;"> Search Page </div>
<h1 > Search by </h1> <br><br><br>

    <form action = "SearchResult.php" method = "post">
        <div class = "box">
       <select class = "box" name = "search">
           <option value = "NID"> NID </option>
           <option value = "AccountNo"> Account No. </option>
           <option value = "LoanNo"> Loan No. </option>
           <option value = "AccountType"> Account Type </option>
       </select>
   </div>
       <input type = "text" name = "value" placeholder= "Enter Data Here">
       <input type = "submit" name = "sub" value = "Submit">
   </form>


</body>
</html>
