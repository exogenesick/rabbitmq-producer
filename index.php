<?php

$queueName = '';
$message = '';

if (isset($_GET['confirm'])) {
    $queueName = $_GET['queueName'];
    $message = $_GET['message'];
}

?>

<html>
<body>
    <form action="produce.php" method="POST">
        <label for="queueName">Queue name</label> <input type="text" id="queueName" name="queueName" value="<?php echo $queueName?>" />
        <label for="message">Message</label> <input type="text" id="message" name="message" value="<?php echo $message ?>" />
        <input type="submit" value="Publish">
    </form>

    <?php if (isset($_GET['confirm'])) : ?>
        <p>Message <b><?php echo $message ?></b> was published on queue <b><?php echo $queueName ?></b></p>
    <?php endif ?>

</body>
</html>