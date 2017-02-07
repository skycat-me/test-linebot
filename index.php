<?php
require_once __DIR__ . '/vendor/autoload.php';

error_log("start");

// POSTを受け取る
$postData = file_get_contents('php://input');
error_log($postData);

// jeson化
$json = json_decode($postData);
$event = $json->events[0];
error_log(var_export($event, true));

// ChannelAccessTokenとChannelSecret設定
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient(getenv('LineMessageAPIChannelAccessToken'));
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => getenv('LineMessageAPIChannelSecret')]);

// イベントタイプがmessage以外はスルー
if ($event->type != "message")
    return;

$replyMessage = null;
// メッセージタイプが文字列の場合
if ($event->message->type == "text") {
    //とりあえず今回は少し加工するだけ
    $replyMessage = "「".$event->message->text."」といいました";
} else {
    $replyMessage = "テキストしかわからない";
}

// メッセージ作成
$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($replyMessage);

// メッセージ送信
$response = $bot->replyMessage($event->replyToken, $textMessageBuilder);
error_log(var_export($response,true));
return;
