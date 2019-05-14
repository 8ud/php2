<?php
$client = new Redis();
$client->connect('172.20.255.210');


$client->set('message',$_POST['message']);
echo "Message reçu : " . $client->get('message');

?>

<form action="" method="post">
<input type="text" name="message">
<input type="submit" value="Envoyer">
</form>

