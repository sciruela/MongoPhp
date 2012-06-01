<?php
echo "<html><head><title>This is a proof</title></head></body>";
$connection = new Mongo();

$db = $connection->selectDB('mydb');

$collection = new MongoCollection($db,'things');

$example1=array(
'x'=>8908,
'j'=>10909,
);

$example2=array(
'x'=>1234,
'j'=>9876,
);


$collection->insert($example1);
$collection->insert($example2);

$items=$collection->find();

foreach($items as $item){
  echo "id ".$item['_id']." x ".$item['x']." j ".$item['j']." <br/>";
}

echo "<br/>";

$collection->remove(array('x'=>1234));
$items2=$collection->find();

foreach($items2 as $item){
  echo "id ".$item['_id']." x ".$item['x']." j ".$item['j']." <br/>";
}

$example3=array(
'x'=>1111,
'j'=>9999,
);


echo "<br/>";
$collection->update(array('j'=>9876),$example3);
$items3=$collection->find();

foreach($items3 as $item){
  echo "id ".$item['_id']." x ".$item['x']." j ".$item['j']." <br/>";
}


echo "</body></html>";

$connection->close();
?>
