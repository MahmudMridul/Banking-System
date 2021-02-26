<!DOCTYPE html>
<html>
<head> <title> </title>
    <link rel = "stylesheet" href = "UpdateStyle.css">
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
    input[type=text]
    {
        top: 50%
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
    </style>
</head>
<body>

    <div style="background-color: Black; opacity: 0.8; color: White; text-align: center; font-size: 60px; line-height:1.3; font-weight:700;"> Update Information </div>
    <form action = "InfoUpdate.php" method = "post">
        <div class = "box">
       <select name = "update">
           <option value = "E_mail"> E-Mail </option>
           <option value = "Password"> Password </option>
           <option value = "Location"> Location </option>
           <option value = "HouseNo"> House No. </option>
           <option value = "RoadNo"> Road No. </option>
           <option value = "Profession"> Profession </option>
           <option value = "Con"> Contact Number </option>
       </select>
   </div>
   <br><br><br><br><br><br>
       <input type = "text" name = "value" placeholder= "Updated Data">
       <h1> Please enter your NID to make sure that it's you </h1>
       <input type = "text" name = "nid" placeholder = "NID">
       <input type = "submit" name = "sub" value = "Submit">
    </form>

</body>
</html>
