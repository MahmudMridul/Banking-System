<!DOCTYPE html>
<html>
<head>
    <title> </title>
    <style>
    input[type=text]
    {
        width: 100%;
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
        background-color: Black;
        opacity: 0.8;
        color: White;
        text-align: center;
        font-size: 60px;
        line-height:1.3;
        font-weight:700;
    }

    </style>
</head>
    <body>
        <div> Registration Form </div>
        <form  style="text-align: left; padding: 20px 0; font-size: 20px;" action="InsertCustomer.php" method="post">
            Name: <input type = "text" name = "name" placeholder="Name"> <br><br>
            NID: <input type = "text" name = "nid" placeholder="NID"> <br><br>
            Profession: <input type = "text" name = "profession" placeholder="profession"> <br><br>
            Email: <input type = "text" name = "email" placeholder="E-Mail"> <br><br>
            Password: <input type = "text" name = "password" placeholder="Password"> <br><br>
            Location: <input type = "text" name = "location" placeholder="Location"> <br><br>
            House No.: <input type = "text" name = "houseno" placeholder="House No."> <br><br>
            Road No.:<input type = "text" name = "roadno" placeholder="Road No."> <br><br>
            Contact Number: <input type = "text" name = "contact" placeholder= "Contace Number"> <br><br>
            Account Type: <input type = "text" name = "acctype" placeholder= "Account Type"> <br><br>
            Initial Amount: <input type = "text" name = "iniamount" placeholder= "Amount"> <br><br>
            Branch No.: <input type = "text" name = "bno" placeholder= "Branch No."> <br><br>
            <input type = "submit" name = "sub" value= "Register"> <br><br>
        </form>
    </body>
</html>
