<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
       <!--Optional theme--> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <title></title>
    </head>
    <body>
        <?php
                
        require_once './functions/dbconnect.php';
        require_once './functions/until.php';
        
        $address_id = getAllAddress();
            
            
        
                //include 'views/add-address.php';
             include './views/view-address.php';
             
        ?>
        <a href="./views/add-address.php">Add Address</a> 
    </body>
</html>
