<?php
// connect
$dsn='mongodb://127.0.0.1/test';
$manager=new \mongoDB\Driver\Manager($dsn);//var_dump($manager);

// IO input
$write=new \MongoDB\Driver\BulkWrite();
$wc = new MongoDB\Driver\WriteConcern(1);//var_dump($wc->bsonSerialize());
// add
$write->insert(['_id'=>new \MongoDB\BSON\ObjectID(),'content'=>'test_content_1']);
//$write->insert(['_id'=>'new_id','content'=>'test_content_2']);
// update
//$write->update(['_id'=>'new_id'],['content'=>'test_content_3']);
// delete
//$write->delete(['_id'=>'new_id']);
// execute
$manager->executeBulkWrite('test.t2',$write,$wc);

// IO output
$query=new \MongoDB\Driver\Query(['content'=>['$exists'=>true]]);
// select
$cursors = $manager->executeQuery('test.t2',$query);
foreach($cursors as $cursor){
    echo $cursor->_id."\n";
}

// server
$servers=$manager->getServers();//var_dump($servers);
$server=$servers[0];//var_dump($server->getType());


