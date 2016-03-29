<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="container">
        <h1>Add Address</h1>
             <form action="#" method="post">   
             Full Name: <input name="fullname" value="<?php echo $fullname; ?>" /> <br />
              Address: <input name="addressline1" value="<?php echo $addressline1; ?>" /> <br />
              Email: <input name="city" value="<?php echo $email; ?>" /> <br />
              City: <input name="city" value="<?php echo $city; ?>" /> <br />
             State: <input name="state" value="<?php echo $state; ?>" /> <br />
             Zip: <input name="zip" value="<?php echo $zip; ?>" /> <br />
              Birthday: <input name="birthday" value="<?php echo $birthday; ?>" /> <br />
            <input type="submit" value="submit" class="btn btn-primary" />
        </form>
        </div>
        <?php
                require_once '../functions/dbconnect.php';
                 require_once '../functions/until.php';
          $fullname = filter_input(INPUT_POST, 'fullname');
          $addressline1 = filter_input(INPUT_POST, 'addressline1');
           $email = filter_input(INPUT_POST, 'email');
           $city = filter_input(INPUT_POST, 'city');
           $state = filter_input(INPUT_POST, 'state');
           $zip = filter_input(INPUT_POST, 'zip');
           $birthday = filter_input(INPUT_POST, 'birthday');
         
            $errors = array();
            if( isPostRequest() ) {
                 if ( empty($fullname) ) {
                    $errors[] = 'Sorry full name is Empty ';
                }  if ( empty($addressline1) ) {
                     $errors[] = 'Sorry address is Empty ';
                 } 
                 if ( empty($email) ) {
                     $errors[] = 'Sorry email is Empty ';
                 }
                 // check for erros if none add
                 if(count($errors) == 0){
                  if (addAddress($fullname, $addressline1, $email, $city, $state, $zip, $birthday ) ) {
               
               
                 $errors[] = 'Address Added';
              
                
             
                 }}
            }
             
                 include '../templates/messages.html.php';
        ?>
    
    </body>
</html>
