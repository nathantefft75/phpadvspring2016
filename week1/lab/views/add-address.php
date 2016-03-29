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
                require_once '../functions/dbconnect.php';
                 require_once '../functions/until.php';
          $fullname = filter_input(INPUT_POST, 'fullname');
          $addressline1 = filter_input(INPUT_POST, 'addressline1');
           $email = filter_input(INPUT_POST, 'email');
           $city = filter_input(INPUT_POST, 'city');
           $state = filter_input(INPUT_POST, 'state');
           $zip = filter_input(INPUT_POST, 'zip');
           $birthday = filter_input(INPUT_POST, 'birthday');
           $zipRegex = '/^\d{5}(?:[-\s]\d{4})?$/';
           $cityRegex = "/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/";
           $nameRegex = "/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/";
           $addressRegex = "/\d{1,5}\s\w.\s(\b\w*\b\s){1,2}\w*\./";
           $emailRegex = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
              $errors = array();
            if( isPostRequest() ) {
                 if ( empty($fullname) ) {
                    $errors[] = 'Sorry full name is Empty ';
                }  else if(!preg_match($nameRegex, $fullname))
                {
                      $errors[] = 'Sorry name is not valid ';
                }
                if ( empty($addressline1) ) {
                     $errors[] = 'Sorry address is Empty ';
                 } else if(!preg_match($addressRegex, $addressline1))
                {
                       $errors[] = 'Sorry email is not valid ';
                 }
                 if ( empty($email) ) {
                     $errors[] = 'Sorry email is Empty ';
                 }else if(!preg_match($emailRegex, $email))
                {
                       $errors[] = 'Sorry email is not valid ';
                 }
                 if ( empty($city) ) {
                     $errors[] = 'Sorry city is Empty ';
                 }else if(!preg_match($cityRegex, $city))
                {
                      $errors[] = 'Sorry city is not valid ';
                }
                 if ( empty($state) ) {
                     $errors[] = 'Sorry state is Empty ';
                 }
                 if ( empty($zip) ) {
                     $errors[] = 'Sorry zip is Empty ';
                 }else if(!preg_match($zipRegex, $zip))
                {
                      $errors[] = 'Sorry zip is not valid ';
                }
          
                 // check for erros if none add
                 if(count($errors) == 0){
                  if (addAddress($fullname, $addressline1, $email, $city, $state, $zip, $birthday ) ) {
               
               
                 $errors[] = 'Address Added';
                 $fullname = '';
                 $addressline1 = '';
                 $email = '';
                 $city = '';
                 $state = 'AL';
                 $zip = '';
               
                 
                
             
                 }}
            }
             
                 include '../templates/messages.html.php';
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
