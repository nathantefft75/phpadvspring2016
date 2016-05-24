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
             $random = $db->allMeme();
             $maxMeme = sizeof($random) -1;
             $randomImageID = rand(0, $maxMeme);
           
        
        $folder = './uploads';
        if ( !is_dir($folder) ) {
            die('Folder <strong>' . $folder . '</strong> does not exist' );
        }
        $directory = new DirectoryIterator($folder);
           
      

       
            
       
        ?>  <div style="border-style: solid"
                          <h1>Random MEME of the moment</h1>
                <h2><?php echo $random[$randomImageID]['title']; ?></h2>
                <p>uploaded on <?php echo  $random[$randomImageID]['created']; ?></p>
              
               
             
       
            
                   <img src="./uploads/<?php echo $random[$randomImageID]['filename']?>" width='100' height='100'/> 
                 
        </div>
  