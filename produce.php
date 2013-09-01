<?php

require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPConnection;
use PhpAmqpLib\Message\AMQPMessage;

$queueName = $_POST['queueName'];
$message = $_POST['message'];

if (!$queueName || !$message) {
    echo 'Define queue name and message! <a href="/">back</a>';
    die;
}

define('MESSAGE_DURABILITY', true);
define('MESSAGE_PERSISTENT', 2);

$connection = new AMQPConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare($queueName, false, MESSAGE_DURABILITY, false, false);

$msg = new AMQPMessage(
    $message,
    array('delivery_mode' => MESSAGE_PERSISTENT)
);

$channel->basic_publish($msg, '', $queueName);

$channel->close();
$connection->close();

header('Location: /?confirm=1&queueName=' . $queueName . '&message=' . $message);