<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        //DIRECTORY_SEPARATOR 


         
        //var_dump($directory);
         $folder = './uploads';
        if ( !is_dir($folder) ) {
            die('Folder <strong>' . $folder . '</strong> does not exist' );
        }
        $directory = new DirectoryIterator($folder);
           
        ?>


        
        <?php foreach ($directory as $file) : ?>        
            <?php if ( is_file($folder . DIRECTORY_SEPARATOR . $file) ) : ?>
                <h2><?php echo $file; ?></h2>
                <img src="./uploads/<?php echo $file; ?>" width='100' height='100' />
                <p>uploaded on <?php echo date("l F j, Y, g:i a", $file->getMTime()); ?></p>
                <p>This file is <?php echo $file->getSize(); ?> byte's</p>
               <object src=" ./uploads/'+<?php echo $file ?> + '"><embed src="./uploads/'+<?php echo $file ?>+'"></embed></object>
            <?php endif; ?>
        <?php endforeach; ?>

    </body>
</html>
