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
          
          
            include './autoload.php';
            $error = new Message();
            $error->addMessage("email", "Email is valid");
            var_dump($error->getAllMessages());
            
            $error->removeMessage('email');
             var_dump($error->getAllMessages());
        ?>
    </body>
</html>
