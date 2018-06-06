<?php
include 'includes\database.php';
include 'includes\crypt.php';
$db = new DataBase();
$name = $_GET['name'];
if (isset($_POST["key"])) {
    $get_content = $db->selectColumn("SELECT content FROM `message` WHERE name='$name'");
    $content = "$get_content";
    $crypt = new Crypt;
    $key = $_POST["key"];
    $crypt->setKey($key);
    $crypt->setData($content);
    $result = $crypt->decrypt();
    echo 'The decrypted message is: ';
    echo $result;
    echo '<br><br><a href="index.php">Go back</a>';
} else { ?>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <form action="decrypt_message.php?name=<?php echo $name ?>" method="post">
        <div>
            <label for="key">Key:</label>
            <input type="text" id="key" name="key">
        </div>

        <div class="button">
            <button type="submit">Save</button>
        </div
    </form>

    <?php
} ?>

