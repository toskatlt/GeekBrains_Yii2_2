<?php
namespace backend\components\chat;

use backend\models\Messages;
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;
use yii\helpers\Console;

class ChatWebSocketMessage implements MessageComponentInterface
{

    /** @var \SplObjectStorage */
    protected $clients;

    public function __construct()
    {
        $this->clients= new \SplObjectStorage();
    }

    /**
     * When a new connection is opened it will be passed to this method
     * @param ConnectionInterface $conn The socket/connection that just connected to your application
     * @throws \Exception
     */
    function onOpen(ConnectionInterface $conn)
    {
        echo 'open connect'.PHP_EOL;
        $this->clients->attach($conn);
    }

    /**
     * This is called before or after a socket is closed (depends on how it's closed).  SendMessage to $conn will not result in an error if it has already been closed.
     * @param ConnectionInterface $conn The socket/connection that is closing/closed
     * @throws \Exception
     */
    function onClose(ConnectionInterface $conn)
    {
        echo 'close connect '.$conn->resourceId.PHP_EOL;
        $this->clients->detach($conn);
    }

    /**
     * If there is an error with one of the sockets, or somewhere in the application where an Exception is thrown,
     * the Exception is sent back down the stack, handled by the Server and bubbled back up the application through this method
     * @param ConnectionInterface $conn
     * @param \Exception $e
     * @throws \Exception
     */
    function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo 'error connect'.PHP_EOL;
    }

    /**
     * Triggered when a client sends data through the socket
     * @param \Ratchet\ConnectionInterface $from The socket/connection that sent the message to your application
     * @param string $msg The message received
     * @throws \Exception
     */
    function onMessage(ConnectionInterface $from, $msg)
    {
        echo Console::ansiFormat('Получено сообщение от пользователя '.$from->resourceId.' '.$msg, [Console::FG_GREEN]).PHP_EOL;

        foreach ($this->clients as $client) {
            $client->send(date('H:i:s').': ['.$from->resourceId.'] '.$msg);
        }

        $messages = new Messages();
        $messages->id_user = $from->resourceId;
        $messages->message = $msg;
        $messages->created_at = '1111111111';
        if ($messages->validate()) {
            $messages->save();
        } else {
            echo $messages->getErrors();
        }
    }
}