<?php

$botToken = "5020014857:AAEKpsdaG879QntGTTXbK3qgbc5c6nxB46k"; // Enter ur bot token
$website = "https://api.telegram.org/bot".$botToken;
error_reporting(0);
$update = file_get_contents('php://input');
$update = json_decode($update, TRUE);
$print = print_r($update);
$chatId = $update["message"]["chat"]["id"];
$gId = $update["message"]["from"]["id"];
$userId = $update["message"]["from"]["id"];
$firstname = $update["message"]["from"]["first_name"];
$usernamee = $update["message"]["from"]["username"];
$message = $update["message"]["text"];
$message_id = $update["message"]["message_id"];
function GetStr($string, $start, $end){
    $str = explode($start, $string);
    $str = explode($end, $str[1]);  
    return $str[0];
    };
    function multiexplode($delimiters, $string)
    {
      $one = str_replace($delimiters, $delimiters[0], $string);
      $two = explode($delimiters[0], $one,$string);
      return $two;
    }
    function random_strings($length_of_string) 
    {
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
        return substr(str_shuffle($str_result),  
                           0, $length_of_string); 
    }

//////////=========[Start Command]=========//////////

if (strpos($message, "/start") === 0){
 sendMessage($chatId, "<b>Hello @$usernamee!!%0AType /help to know all my commands!!%0A%0ABot Made by: Stowe .</b>", $message_id);
sendMessage($chatId, "<b><u> Bot Maintenance mode is enabled !.</u></b>%0A%0A <b> The are 4 commands available for you use. Please use <code>/help</code> to show available commands</b>", $message_id);
}

//////////=========[help Command]=========//////////
 elseif (strpos($message, "/help") === 0){
sendMessage($chatId, "<b><u> LIST OF COMMANDS AVAILABE</u></b>%0A%0A%0A<b>check bin:<code>/bin xxxxx</code></b>%0A<b>Check sk: <code>/sk sk_livexxxxxxxxxxx</code></b>%0A <b>Your info: <code>/info</code></b>%0<b>Change Log version: <code>/log</code></b> %0A%0A<b><code>Maintenance mode is enabled</code></b>%0A<b>Bot version:</b> <code>2.0 - DEBUG</code> ", $message_id);
}
//////////=========[Info Command]=========//////////

elseif (strpos($message, "/info") === 0){
sendMessage($chatId, "<u>ID:</u> <code>$userId</code>%0A<u>First Name:</u> $firstname%0A<u>Username:</u> @$usernamee%0A%0A<b>Bot Made by: Stowe .</b>%0A%0A<b><code>Maintenance mode is enabled</code></b>%0A<b>Bot version:</b> <code>2.0 - DEBUG</code>", $message_id);
}
//////////=========[web Command]=========//////////

elseif (strpos($message, "/web") === 0){
  sendMessage($chatId, "<b>COMMING SOON </b>%0A%0A<b><code>Maintenance mode is enabled</code></b>%0A<b>Bot version:</b> <code>2.0 - DEBUG</code>", $message_id);
  }

//////////=========[log Command]=========//////////

elseif (strpos($message, "/log") === 0){
 sendMessage($chatId, "What's new in this version 2.0 <code>(DEBUG VERSION)</code> ?%0A%0A<b>Re-Wirte all command</b>%0A%0A<b>Remove not working command</b>%0A%0A<b>receipt url added</b>%0A%0A<b>Fix Ris kcore not working </b>%0A%0A<b> CCN CHAGRES </b>%0A%0A<b><code>Maintenance mode is enabled</code></b>%0A<b>Bot version:</b> <code>2.0 - DEBUG</code>", $message_id);
}

//////////=========[Bin Command]=========//////////

elseif (strpos($message, "/bin") === 0){
$bin = substr($message, 5);
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);  
return $str[0];
};
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$bin.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$fim = curl_exec($ch);
$bank = GetStr($fim, '"bank":{"name":"', '"');
$name = GetStr($fim, '"name":"', '"');
$brand = GetStr($fim, '"brand":"', '"');
$country = GetStr($fim, '"country":{"name":"', '"');
$scheme = GetStr($fim, '"scheme":"', '"');
$type = GetStr($fim, '"type":"', '"');
if(strpos($fim, '"type":"credit"') !== false){
$bin = 'Credit';
}else{
$bin = 'Debit';
};
sendMessage($chatId, '<b>✅ Valid Bin</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Checked By:</b> @'.$usernamee.'%0A%0A<b>Bot Made by: Stowe .</b>%0A%0A<b><code>Maintenance mode is enabled</code></b>%0A<b>Bot version:</b> <code>2.0 - DEBUG</code>', $message_id);
}
//=====================[SK]=============================//
elseif (strpos($message, "/sk") === 0){
    $sec = substr($message, 4);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "card[number]=5154620061414478&card[exp_month]=01&card[exp_year]=2023&card[cvc]=235");
    curl_setopt($ch, CURLOPT_USERPWD, $sec. ':' . '');
    $headers = array();
    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);
    if (strpos($result, 'api_key_expired')){
    sendMessage($chatId, "<b>❌ DEAD KEY</b>%0A<u>KEY:</u> <code>$sec</code>%0A<u>REASON:</u> EXPIRED KEY%0A%0A<b>Bot Made by: Stowe .</b>%0A%0A<b><code>Maintenance mode is enabled</code></b>%0A<b>Bot version:</b> <code>2.0 - DEBUG</code>", $message_id);
    }
    elseif (strpos($result, 'Invalid API Key provided')){
    sendMessage($chatId, "<b>❌ DEAD KEY</b>%0A<u>KEY:</u> <code>$sec</code>%0A<u>REASON:</u> INVALID KEY%0A%0A<b>Bot Made by: Stowe .</b>%0A%0A<b><code>Maintenance mode is enabled</code></b>%0A<b>Bot version:</b> <code>2.0 - DEBUG</code>", $message_id);
    }
    elseif ((strpos($result, 'testmode_charges_only')) || (strpos($result, 'test_mode_live_card'))){
    sendMessage($chatId, "<b>❌ DEAD KEY</b>%0A<u>KEY:</u> <code>$sec</code>%0A<u>REASON:</u> Testmode Charges Only%0A%0A<b>Bot Made by: Stowe .</b>%0A%0A<b><code>Maintenance mode is enabled</code></b>%0A<b>Bot version:</b> <code>2.0 - DEBUG</code>", $message_id);
    }
    elseif (strpos($result, 'Request rate limit exceeded')){
    sendMessage($chatId, "<b>⚠️ LIVE KEY</b>%0A<u>KEY:</u> <code>$sec</code>%0A<u>REASON:</u> Rate Limit Key%0A%0A<b>Bot Made by: Stowe .</b>%0A%0A<b><code>Maintenance mode is enabled</code></b>%0A<b>Bot version:</b> <code>2.0 - DEBUG</code>", $message_id);
    }else{
    sendMessage($chatId, "<b>✅ LIVE KEY</b>%0A<u>KEY:</u> <code>$sec</code>%0A<u>RESPONSE:</u> SK LIVE!!%0A%0A<b>Bot Made by: Stowe .</b>%0A%0A<b><code>Maintenance mode is enabled</code></b>%0A<b>Bot version:</b> <code>2.0 - DEBUG</code>", $message_id);
    };
}

//=====================[aut]=============================//
elseif (strpos($message, "/aut") === 0){
 $message = substr($message, 4);
 $amt = multiexplode(array("/", ":", " ", "|"), $message)[0];
 $cc = multiexplode(array(":", "/", " ", "|"), $message)[1];
 $mm = multiexplode(array(":", "/", " ", "|"), $message)[2];
 $yy = multiexplode(array(":", "/", " ", "|"), $message)[3];
 $cvv = multiexplode(array(":", "/", " ", "|"), $message)[4];
 sendMessage($chatId, "<b><u> Bot Maintenance mode is enabled !.</u></b>%0A%0A <b> The are 4 commands available for you use. Please use <code>/help</code> to show available commands</b>%0A%0A<b><code>Maintenance mode is enabled</code></b>%0A<b>Bot version:</b> <code>2.0 - DEBUG</code>", $message_id);
}
//=====================[chg]=============================//
elseif (strpos($message, "/chg") === 0){
    $message = substr($message, 4);
    $amt = multiexplode(array("/", ":", " ", "|"), $message)[0];
    $cc = multiexplode(array(":", "/", " ", "|"), $message)[1];
    $mm = multiexplode(array(":", "/", " ", "|"), $message)[2];
    $yy = multiexplode(array(":", "/", " ", "|"), $message)[3];
    $cvv = multiexplode(array(":", "/", " ", "|"), $message)[4];
    sendMessage($chatId, "<b><u> Bot Maintenance mode is enabled !.</u></b>%0A%0A <b> The are 4 commands available for you use. Please use <code>/help</code> to show available commands</b>%0A%0A<b><code>Maintenance mode is enabled</code></b>%0A<b>Bot version:</b> <code>2.0 - DEBUG</code>", $message_id);
   }
//=====================[rape]=============================//
elseif (strpos($message, "/rape") === 0){
    $message = substr($message, 4);
    $amt = multiexplode(array("/", ":", " ", "|"), $message)[0];
    $cc = multiexplode(array(":", "/", " ", "|"), $message)[1];
    $mm = multiexplode(array(":", "/", " ", "|"), $message)[2];
    $yy = multiexplode(array(":", "/", " ", "|"), $message)[3];
    $cvv = multiexplode(array(":", "/", " ", "|"), $message)[4];
    sendMessage($chatId, "<b><u> Bot Maintenance mode is enabled !.</u></b>%0A%0A <b> The are 4 commands available for you use. Please use <code>/help</code> to show available commands</b>%0A%0A<b><code>Maintenance mode is enabled</code></b>%0A<b>Bot version:</b> <code>2.0 - DEBUG</code>", $message_id);
   }

//=====================[kcc]=============================//
elseif (strpos($message, "/kcc") === 0){
    $message = substr($message, 4);
    $amt = multiexplode(array("/", ":", " ", "|"), $message)[0];
    $cc = multiexplode(array(":", "/", " ", "|"), $message)[1];
    $mm = multiexplode(array(":", "/", " ", "|"), $message)[2];
    $yy = multiexplode(array(":", "/", " ", "|"), $message)[3];
    $cvv = multiexplode(array(":", "/", " ", "|"), $message)[4];
    sendMessage($chatId, "<b><u> Bot Maintenance mode is enabled !.</u></b>%0A%0A <b> The are 4 commands available for you use. Please use <code>/help</code> to show available commands</b>%0A%0A<b><code>Maintenance mode is enabled</code></b>%0A<b>Bot version:</b> <code>2.0 - DEBUG</code>", $message_id);
   }
//=====================[ccn]=============================//
elseif (strpos($message, "/ccn") === 0){
    $message = substr($message, 4);
    $amt = multiexplode(array("/", ":", " ", "|"), $message)[0];
    $cc = multiexplode(array(":", "/", " ", "|"), $message)[1];
    $mm = multiexplode(array(":", "/", " ", "|"), $message)[2];
    $yy = multiexplode(array(":", "/", " ", "|"), $message)[3];
    $cvv = multiexplode(array(":", "/", " ", "|"), $message)[4];
    sendMessage($chatId, "<b><u> Bot Maintenance mode is enabled !.</u></b>%0A%0A <b> The are 4 commands available for you use. Please use <code>/help</code> to show available commands</b>%0A%0A<b><code>Maintenance mode is enabled</code></b>%0A<b>Bot version:</b> <code>2.0 - DEBUG</code>", $message_id);
   }

function sendMessage ($chatId, $message, $message_id){
    $url = $GLOBALS[website]."/sendMessage?chat_id=".$chatId."&text=".$message."&reply_to_message_id=".$message_id."&parse_mode=HTML";
    file_get_contents($url);
    };
?>