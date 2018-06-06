<?php
include 'includes\database.php';
include 'includes\crypt.php';
if (isset($_POST['message'], $_POST['name'], $_POST['key'])) {
    $crypt = new Crypt;
    $db = new DataBase();
    $plaintext = $_POST['message'];
    $name = $_POST['name'];
    $key = $_POST['key'];
    $crypt->setKey($key);
    $crypt->setData($plaintext);
    $result = $crypt->encrypt();
    if ($db->query("INSERT INTO `message` (`name`, `content`) VALUES ('$name','$result')")) {
        echo 'message has been saved!';
    }
    echo '<br><br><a href="index.php">Go back</a>';
} else { ?>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <form action="encrypt_message.php" method="post">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name">
        </div>
        <div>
            <label for="message">message</label>
            <textarea id="message" name="message"></textarea>
        </div>
        <div>
            <label for="key">key:</label>
            <input type="key" id="key" name="key">

        </div>
        </div>

        <div class="button">
            <button type="submit">Save</button>
        </div
    </form>
    <?php
} ?>

