<?php
require 'vendor/autoload.php';
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Chat implements MessageComponentInterface {
    public function onOpen(ConnectionInterface $conn) {
        echo "New connection!\n";
    }
    public function onMessage(ConnectionInterface $from, $msg) {
        echo "Message: $msg\n";
    }
    public function onClose(ConnectionInterface $conn) {
        echo "Connection closed.\n";
    }
    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }
}

$server = new Ratchet\App('localhost', 8080);
$server->route('/chat', new Chat);
$server->run();
?>
