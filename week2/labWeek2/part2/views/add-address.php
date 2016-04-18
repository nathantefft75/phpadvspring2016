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
          $fullname = filter_input(INPUT_POST, 'fullname');
          $addressline1 = filter_input(INPUT_POST, 'addressline1');
           $email = filter_input(INPUT_POST, 'email');
           $city = filter_input(INPUT_POST, 'city');
           $state = filter_input(INPUT_POST, 'state');
           $zip = filter_input(INPUT_POST, 'zip');
           $birthday = filter_input(INPUT_POST, 'birthday');
               $db = new addressCRUD();
         
               $validation = new validation();
               $errors = array();
            if( $db->isPostRequest()) {
                 if ( !$validation->isBoxFilledIn($fullname) ) {
                    $errors[] = 'Sorry full name is Empty ';
                }  else if(!$validation->isNameGood($fullname))
                {
                      $errors[] = 'Sorry name is not valid ';
                }
                if ( !$validation->isBoxFilledIn($addressline1) ) {
                     $errors[] = 'Sorry address is Empty ';
                 } 
                 if ( empty($email) ) {
                     $errors[] = 'Sorry email is Empty ';
                 }else if(!$validation->isEmailGood($email))
                {
                       $errors[] = 'Sorry email is not valid ';
                 }
                 if ( !$validation->isBoxFilledIn($city)) {
                     $errors[] = 'Sorry city is Empty ';
                 }
                 if ( !$validation->isBoxFilledIn($state) ) {
                     $errors[] = 'Sorry state is Empty ';
                 }
                 if (!$validation->isBoxFilledIn($zip) ) {
                     $errors[] = 'Sorry zip is Empty ';
                 }else if(!$validation->isZipGood($zip))
                {
                      $errors[] = 'Sorry zip is not valid ';
                }
          
                 // check for erros if none add
                 if(count($errors) == 0){
                  if ($db->addAddress($fullname, $addressline1, $email, $city, $state, $zip, $birthday ) ) {
               
               
                 $errors[] = 'Address Added';
                 $fullname = '';
                 $addressline1 = '';
                 $email = '';
                 $city = '';
                 $state = 'AL';
                 $zip = '';
               
                 
                
             
                 }}
            }
             
                 include './templates/messages.html.php';
        ?>
            <div class="container">
        <h1>Add Address</h1>
             <form action="#" method="post">   
                 <table class = "table-striped">
            <tr><td> Full Name:</td><td> <input name="fullname" value="<?php echo $fullname; ?>" /> </td></tr>
             <tr><td> Address: </td><td><input name="addressline1" value="<?php echo $addressline1; ?>" /> </td></tr>
             <tr><td> Email:</td><td> <input name="email" value="<?php echo $email; ?>" /> </td></tr>
             <tr><td> City:</td><td> <input name="city" value="<?php echo $city; ?>" /> </td></tr>
           <tr><td>  State:</td><td> <select name="state" value="<?php echo $state; ?>" /> 
             <option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District Of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
             </select>
             </td></tr>
            <tr><td> Zip: </td><td><input name="zip" value="<?php echo $zip; ?>" /></td></tr>
            <tr><td>  Birthday:</td><td> <input name="birthday" type = "date" value="<?php echo $birthday; ?>" /> </td></tr>
                 </table>
            <input type="submit" value="submit" class="btn btn-danger" />
        </form>
        </div>
        <a href="../index.php">Back to Home Screen</a> 
    </body>
</html>
