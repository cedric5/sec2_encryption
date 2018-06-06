<?php
include 'includes\database.php';
include 'models\message.php';

$db = new DataBase();
$message_list = [];
$messages = $db->query('SELECT * FROM message');
while ($row = mysqli_fetch_array($messages)) {
   array_push($message_list, new Message($row["name"], $row['content']));
}
echo '<h2>Select a message to decrypt!</h2>';
foreach ($message_list as $message){
     echo '<a href="decrypt_message.php?name=', $message->name,'">', $message->name, '</a><br>';
}
echo '<br><br><a href="/">Go back</a>';

?>