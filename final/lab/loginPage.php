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
        session_start();
           include('./autoload.php');     
           $db = new DBSpring();
         
           $password = filter_input(INPUT_POST, 'password');
           $email = filter_input(INPUT_POST, 'email');
       if($db->isPostRequest())
       {
           $actualUser = $db->getUsers($email);
           $thePassword = $actualUser[0]['password'];
           if(password_verify($password, $thePassword))
           {
               $_SESSION['user'] = $actualUser[0]['user_id'];
               header('Location: Administrator.php');
             
           }
           else
           {
        
               $errors[] = $actualUser[0]['password'] . 'test';
           }
       }
   
        
            
            include './templates/messages.html.php';   
        ?>
        <h3>Login:</h3>
        <form action="#" method="post">
          <table class = "table-striped">
     
             <tr><td> Email:</td><td> <input name="email" value="<?php echo $email; ?>" /> </td></tr>
             <tr><td> Password:</td><td> <input name="password" value="<?php echo $password; ?>" /> </td></tr>
           
          </table>  
              <br/>
        <input type="submit" value="login" class="btn btn-danger" />
        </form>
        <br/>
        
        <a href="./newUserForm.php">Create New User</a> 
     
    </body>
</html>

