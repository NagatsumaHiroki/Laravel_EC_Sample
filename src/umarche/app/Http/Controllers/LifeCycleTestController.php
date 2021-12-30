<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//サービスコンテナサンプルコード
class LifeCycleTestController extends Controller
{
    public function showsSrviceProviderContainerTest()
    {
        //既存サービスを使用
        $encrypt = app()->make('encrypter');
        //暗号化
        $password = $encrypt->encrypt('password');

        //オリジナルProvider呼び出し
        $sample = app()->make('serviceProviderTest');


        //復号化
        dd($sample, $password,$encrypt->decrypt($password));

    }
    public function showsSrviceContainerTest()
    {
        app()->bind('lifeCycleTest',function(){
            return 'ライフサイクルテスト';
        });

        //サービスコンテナから取り出し
        $test = app()->make('lifeCycleTest');
        //サービスコンテナなしのパターン
        $message = new Message();
        $sample = new Sample($message);
        $sample->run();

        //サービスコンテナありのパターン
        app()->bind('sample',Sample::class);
        $sample = app()->make('sample');
        $sample->run();

        dd(app());
    }
}

class Sample
{
    public $message;
    //DI記法を用いている
    public function __construct(Message $message)
    {
        $this->message = $message;
    }
    public function run(){
        $this->message->send();
    }
}
class Message
{
    public function send()
    {
        echo('メッセージ表示');
    }

}
