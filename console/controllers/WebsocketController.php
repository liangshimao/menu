<?php

/**
 * Created by PhpStorm.
 * User: leexb
 * Date: 17-1-9
 * Time: 下午1:01
 */
namespace console\controllers;


use common\models\basic\Client;
use common\models\order\Order;
use common\models\order\OrderDetail;
use Yii;
use yii\console\Controller;
use yii\helpers\Json;

class WebsocketController extends Controller{

    private $server;

    public function init(){
        parent::init();
        $this->server = new \swoole_websocket_server(HOST,PORT);
    }

    public function actionIndex()
    {
        $this->server->on('open', function ( $server, $request) {
            //echo "server: handshake success with fd{$request->fd}\n";

        });

        $this->server->on('message', function ( $server, $frame) {
            $params = Json::decode($frame->data);
            switch ($params['type']){
                case 'newBackend':
                    $this->newBackend($frame->fd);
                    break;
                case 'newFrontend':
                    $this->newFrontend($frame->fd);
                    break;
                case 'newOrder':
                    $this->newOrder($frame->fd,$params);
                    break;
            }
        });

        $this->server->on('close', function ($ser, $fd) {
            echo "client {$fd} closed\n";
        });
        $this->server->start();
    }

    //新的后台上线了
    private function newBackend($fd)
    {
        //fd存入数据库中.
        Client::addOne($fd);
        echo "client backend {$fd} online\n";
    }
    
    private function newFrontend($fd)
    {
        echo "client frontend {$fd} online\n";
    }
    
    private function newOrder($fd,$params)
    {
        $tableId = $params['tableId'];
        $detail = $params['detail'];
        $orderModel = new Order();
        $orderModel->setAttributes([
            'table_id' => $tableId,
            'start_time' => date('Y-m-d H:i:s'),
        ],false);
        $orderModel->save();
        foreach ($detail as $value){
            $value['count'] = intval($value['count']);
            if(empty($value['food_id']) || empty($value['count'])){
                continue;
            }
            $value['order_id'] = $orderModel->id;
            OrderDetail::addRecord($value);
        }
        $val = ['type'=>'','data'=> 'success'];
        $this->server->push($fd, Json::encode($val));
        
        $clientId = Client::getFd();
        $value = ['type'=>'newOrder'];
        $this->server->push($clientId,Json::encode($value));
    }

}