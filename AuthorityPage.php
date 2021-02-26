<!DOCTYPE html>
<html>
    <head> <title> </title>
        <style>
        a
        {
            text-decoration: none;
        }
        ul
        {
            list-style: none;
        }
        ul li
        {
            float: left;
            width: 200px;
            height: 40px;
            opacity: .8;
            line-height: 30px;
            text-align: center;
            font-size: 20px;
            text-decoration:  none;
            color: white;
            display: block;
            background-color: Black;
            margin-right: 4px;

        }
        ul li a
        {
            text-decoration: none;
            color: white;
            display: block;
        }
        ul li:hover
        {
            background-color: dodgerblue;
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
        <div> Bank Authority </div>
        <?php
            require('connectionmaking.php');
            $user = $_REQUEST['user'];
            $passwd = $_REQUEST['pass'];

            if($user=="admin" && $passwd=="admin")
            {
                echo "<ul style = 'font-size:30px; padding: 70px 0'>";
        		echo 	"<li style = 'text-align:center;'> <a href = 'RegisterCustomer.php'> <abbr title = 'Register a new customer in bank'>  Resgister </abbr> </li>";
        		echo 	"<li style = 'text-align:center;'> <a href = 'GetCustomerInfo.php'> <abbr title = 'Find information about a customer, an account, loan status of an account'> Find </abbr>  </li>";
        		echo 	"<li style = 'text-align:center; '> <a href = 'CloseAccount.php'> <abbr title = 'Close an account if it doesn't have loan'>  Close Account <abbr/> </li>";
                echo 	"<li style = 'text-align:center; '> <a href = 'UpdateAccount.php'> <abbr title = 'Add to current balance, withdraw money, pay loan, provide a loan'> Update </abbr> </li>";
        		echo "</ul>";
            }
            else echo "<h1>" ."Access Denied!". "</h1>";
        ?>
    </body>
</html>
