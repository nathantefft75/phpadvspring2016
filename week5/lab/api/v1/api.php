<?php

include_once './bootstrap.php';

$restServer = new RestServer();

try {
    
    $restServer->setStatus(200);
    
    $resource = $restServer->getResource();
    $verb = $restServer->getVerb();
    $id = $restServer->getId();
    $serverData = $restServer->getServerData();
    
    
  
    
    
    
    
    if ( 'corps' === $resource ) {
        
        $resourceData = new CorpResoruce();
        
        if ( 'GET' === $verb ) {
            
            if ( NULL === $id ) {
                
                $restServer->setData($resourceData->getAll());                           
                
            } else {
                
                $restServer->setData($resourceData->get($id));
                
            }            
            
        }
                
        if ( 'POST' === $verb ) {
            

            if ($resourceData->post($serverData)) {
                $restServer->setMessage('Corps Added');
                $restServer->setStatus(201);
            } else {
                throw new Exception('Corps could not be added');
            }
        
        }
        
        
        if ( 'PUT' === $verb ) {
            
            if ( NULL === $id ) {
                throw new InvalidArgumentException('corps id ' . $id . ' was not found');
            }
            if($resourceData->put($id, $serverData))
            {
                $restServer->setMessage('Corp updated');
                 $restServer->setStatus(202);        
            }
            
        }
          if ( 'DELETE' === $verb ) {
            
            if ( NULL === $id ) {
                throw new InvalidArgumentException('corps id ' . $id . ' was not found');
            }
            if($resourceData->delete($id))
            {
                $restServer->setMessage('Corp deleted');
                 $restServer->setStatus(202);        
            }
            
        }
        
    } else {
        throw new InvalidArgumentException($resource . ' Resource Not Found');
        //$response['errors'] = 'Resource Not Found';
        //$status = 404;
    }
   
    
    
} catch (InvalidArgumentException $e) {
    $restServer->setStatus(400);
    $restServer->setErrors($e->getMessage());
} catch (Exception $ex) {    
    $restServer->setStatus(500);
    $restServer->setErrors($ex->getMessage());   
}


echo $restServer->getReponse();
die();