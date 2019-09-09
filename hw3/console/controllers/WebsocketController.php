<?php


namespace console\controllers;


use backend\components\chat\ChatWebSocketMessage;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;
use yii\console\Controller;

class WebsocketController extends Controller
{
    public function actionIndex()
    {
        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                     new ChatWebSocketMessage()
            )),
            8123
        );

        echo 'starting server websocket listing' . PHP_EOL;
        $server->run();
    }

}