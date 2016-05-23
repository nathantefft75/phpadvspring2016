<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
  
        <?php
        // http://php.net/manual/en/class.directoryiterator.php
        //DIRECTORY_SEPARATOR 

        $folder = './uploads';
        if ( !is_dir($folder) ) {
            die('Folder <strong>' . $folder . '</strong> does not exist' );
        }
        $directory = new DirectoryIterator($folder);
           
      
    if (array_key_exists('deleteFile', $_POST)){
       
            
        $filename =  $directory . "/uploads"."/" . $_POST['deleteFile']; // build the full path here
        if (file_exists($filename)){
            unlink($filename);
            echo "<h4 class='text-center'> 'File ' . $filename . ' has been deleted'</h4>";
            } 
            else{
        echo "<h4 class='text-center'> 'Could not delete ' . $filename . ', file does not exist'</h4>";
            }
        }
        ?>
        <?php foreach ($directory as $fileInfo) : ?>        
            <?php if ( $fileInfo->isFile() ) : ?>
                <h2><?php echo $fileInfo->getFilename(); ?></h2>
                <p>uploaded on <?php echo date("l F j, Y, g:i a", $fileInfo->getMTime()); ?></p>
                <p>This file is <?php echo $fileInfo->getSize(); ?> byte's</p>
                <p> This is a <?php echo $fileInfo->getExtension();?> file type</p>
             
                <?php
                       if($_SESSION['user'] != null || $_SESSION['user'] != '')
                    echo '<form method="post"><input type="hidden" value="'.$fileInfo.'" name="deleteFile" /><input type="submit" value="Delete" class= "btn btn-warning"/></form>';
                
                   ?>
                <?php if( $fileInfo->getExtension() =='jpg' || $fileInfo->getExtension() =='png' || $fileInfo->getExtension() =='gif' ):?>
                
                   <img src="<?php echo $fileInfo->getPathname();?>" class = 'img-rounded' width='100' height='100'/> 
               
             <?php endif;?>
             <?php if( $fileInfo->getExtension() =='pdf' ):?>
                <embed src=" <?php echo $fileInfo->getPathname()?>"width='300' height='300'></embed>
              
               
             <?php endif;?>
                  <?php if( $fileInfo->getExtension() =='txt'):?>
                <textarea rows='30' columns='20'><?php echo file_get_contents($fileInfo->getPathname());?></textarea> 
            <?php endif;?>
                <?php if( $fileInfo->getExtension() =='docx'||$fileInfo->getExtension() =='html'||$fileInfo->getExtension() =='xls'||$fileInfo->getExtension() =='xlsx'||$fileInfo->getExtension() =='doc'):?>
                <a href='<?php echo $fileInfo->getPathname();?>'download>Download</a>
            <?php endif;?> 
              <?php endif;?>
         <?php endforeach; ?>
        
          

    </body>
</html>
