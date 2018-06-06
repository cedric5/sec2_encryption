<?php
include 'includes\database.php';
include 'includes\crypt.php';
if(isset($_POST['message'], $_POST['name'], $_POST['key'])){
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
    echo '<br><br><a href="/">Go back</a>';
} else { ?>
<style>
    form {
        /* Just to center the form on the page */
        margin: 0 auto;
        width: 400px;
        /* To see the outline of the form */
        padding: 1em;
        border: 1px solid #CCC;
        border-radius: 1em;
    }

    form div + div {
        margin-top: 1em;
    }

    label {
        /* To make sure that all labels have the same size and are properly aligned */
        display: inline-block;
        width: 90px;
        text-align: right;
    }

    input, textarea {
        /* To make sure that all text fields have the same font settings
           By default, textareas have a monospace font */
        font: 1em sans-serif;

        /* To give the same size to all text fields */
        width: 300px;
        box-sizing: border-box;

        /* To harmonize the look & feel of text field border */
        border: 1px solid #999;
    }

    input:focus, textarea:focus {
        /* To give a little highlight on active elements */
        border-color: #000;
    }

    textarea {
        /* To properly align multiline text fields with their labels */
        vertical-align: top;

        /* To give enough room to type some text */
        height: 5em;
    }

    .button {
        /* To position the buttons to the same position of the text fields */
        padding-left: 90px; /* same size as the label elements */
    }

    button {
        /* This extra margin represent roughly the same space as the space
           between the labels and their text fields */
        margin-left: .5em;
    }
</style>
<form action="/encrypt_message.php" method="post">
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
<?php } ?>

