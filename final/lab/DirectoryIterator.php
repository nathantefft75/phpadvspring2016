<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
  
        <?php
        session_start();
        // http://php.net/manual/en/class.directoryiterator.php
        //DIRECTORY_SEPARATOR 
            
             $db = new DBSpring();
             $values = $db->pullUserImages($_SESSION['user']);
        $folder = './uploads';
        if ( !is_dir($folder) ) {
            die('Folder <strong>' . $folder . '</strong> does not exist' );
        }
        $directory = new DirectoryIterator($folder);
           
      
    if (array_key_exists('deleteFile', $_POST)){
       
            
        $filename =  $directory . "/uploads"."/" . $_POST['deleteFile']; // build the full path here
        $testName =  $_POST['deleteFile'];
        if (file_exists($filename)){
             $db->delete($testName);
             unlink($filename);
           
            echo "<h4 class='text-center'> 'File ' . $filename . ' has been deleted'</h4>";
            
            } 
            else{
        echo "<h4 class='text-center'> 'Could not delete ' . $filename . ', file does not exist'</h4>";
            }
        }
        ?> <?php
         if($_SESSION['user'] != null || $_SESSION['user'] != '')
         {      
             for ($i = 0; $i <= sizeof($values)-1; $i++) : ?>        
        
                <h2><?php echo $values[$i]['title']; ?></h2>
                <p>uploaded on <?php echo  $values[$i]['created']; ?></p>
              
               
             
                <?php
                      
                    echo '<form method="post"><input type="hidden" value="'. $values[$i]['filename'] .'" name="deleteFile" /><input type="submit" value="Delete" class= "btn btn-warning"/></form>';
                       
                   ?>
            
                   <img src="./uploads/<?php echo $values[$i]['filename']?>" class = 'img-rounded' width='100' height='100'/> 
                 
                       <?php endfor;}
   
?>
                
        
          

    </body>
</html>
