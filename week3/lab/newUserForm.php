<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>
    <body>
    
        <?php
               require_once './autoload.php';
       
     
            $values = filter_input_array(INPUT_POST);
            $password = $values['password'];
             $email = $values['email'];
               $db = new DBSpring();
         
               $validation = new validation();
               $errors = array();
            if( $db->isPostRequest()) {
                  if ( empty($email) ) {
                     $errors[] = 'Sorry email is Empty ';
                 }else if(!$validation->isEmailGood($email))
                {
                       $errors[] = 'Sorry email is not valid ';
                 }
                 if ( !$validation->isBoxFilledIn($password)) {
                     $errors[] = 'Sorry password is Empty ';
                 }
                
                 // check for erros if none add
                 if(count($errors) == 0){
                   
                  if ($db->create($values) ) {
               
               
                 $errors[] = 'user Added';
             
                 $password= '';
                 $email = '';
               
                 
                
             
                 }}
            }
             
                 include './templates/messages.html.php';
        ?>
            <div class="container">
        <h1>Add Address</h1>
             <form action="#" method="post">   
                 <table class = "table-striped">
     
             <tr><td> Email:</td><td> <input name="email" value="<?php echo $email; ?>" /> </td></tr>
             <tr><td> Password:</td><td> <input name="password" value="<?php echo $password; ?>" /> </td></tr>
                 </table>
            <input type="submit" value="submit" class="btn btn-danger" />
        </form>
        </div>
        <a href="./index.php">Back to Home Screen</a> 
    </body>
</html>

