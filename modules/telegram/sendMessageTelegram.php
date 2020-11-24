<?php

// токен бота
define('TELEGRAM_TOKEN', '1253741126:AAG_S179PvAVgCF6vEPshsgriZkOmJUtkr0');
  
// внутренний айди
define('TELEGRAM_CHATID', '599738652');

function message_to_telegram($text) {
    $data = [
        'chat_id' => TELEGRAM_CHATID,
        'text' => $text,
        'parse_mode' => "HTML"
    ];
     
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, 'https://api.telegram.org/bot' . TELEGRAM_TOKEN . '/sendMessage' );
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $data ); 
 
    $result = curl_exec( $ch );
    
    curl_close( $ch );
   

}