<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
             include('./autoload.php'); 
           $db = new DBSpring();
        if($_SESSION['user'] != null || $_SESSION['user'] != '')
        {
             header('Location: index.php');
        }
            if($db->isPostRequest())
       {
                session_destroy();
            
                 header('Location: index.php');
       }
        ?>
        <h1>yay admin</h1>
              <form action="#" method="post">
      
        <input type="submit" value="logout" class="btn btn-danger" />
        </form>
        <a href="generatorView.php">Create New Meme</a> 
    </body>
</html>
