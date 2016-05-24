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
                           <?php $values2 = $db->allMeme();
    for ($i = 0; $i <= sizeof($values2)-1; $i++) : ?>        
        
                <h2><?php echo $values2[$i]['title']; ?></h2>
                <p>uploaded on <?php echo  $values2[$i]['created']; ?></p>
              
               
             
             
            
                   <img src="./uploads/<?php echo $values2[$i]['filename']?>" class = 'img-rounded' width='100' height='100'/> 
                 
                       <?php endfor;
?>
    </body>
</html>
