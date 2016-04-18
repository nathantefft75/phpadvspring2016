<?php if ( count($address_id) > 0 ) : ?>
<h1>Address</h1>
 <table class = "table table-striped">
     <tr><td>Full Name</td><td> Address</td><td>Email</td><td>City</td><td>State</td><td>Zip</td><td>Birthday</td></tr>  
<?php 
    foreach( $address_id as $key => $values ) : ?>
   
     <tr><td> <?php echo $values['fullname'];?> </td><td><?php echo $values['addressline1'];?></td><td> <?php echo $values['email'];?> </td><td> <?php echo $values['city'];?> </td><td> <?php echo $values['state'];?> </td> <td><?php echo $values['zip'];?> </td> <td><?php echo $values['birthday'];?> </td></tr>
<?php endforeach; ?>
 </table>
<?php endif; ?>