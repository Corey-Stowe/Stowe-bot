<?php
include ('config.php');
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
//==========================[Global function]==========================//
function GetStr($string, $start, $end){
    include ('config.php');
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
//============================================================================//
//==========================[Command Lits]==========================//
    //==================[Start Command]==================//
    if (strpos($message, "/start") === 0){
        sendMessage($chatId, "<b>✅Bot Started succedfully</b>\n\n<b>Hello @$usernamee!!</b>Type <code>/help</code> to know all my commands!!\n\n <b>Bot Made by: Stowe .</b>", $message_id);
        sendMessage($chatId, "<b>⚠️ BEFORE YOU USE ⚠️</b> \n\n
        ℹ️ <b>This bot make for educational purposes and should not be used for any illegal or unethical activities.</b> The information and code provided are for learning and understanding purposes only. It is important to respect the terms of service and guidelines of any platform or service you interact with.\n 
        Using this bot or any code snippets provided responsibly and in compliance with applicable laws and regulations is the responsibility of the user. The creators and maintainers of this bot are not liable for any misuse or illegal activities conducted with the help of this bot.\n
        Remember to always seek proper authorization and permissions before interacting with any third-party services or systems. Be mindful of privacy, security, and ethical considerations when using the bot or any code provided . <b>education purpse only</b>", $message_id);
        sendMessage($chatId, "<b>✅ Update V3.2 info</b>\n\n
        <b>Update stripe API to V2.1</b>\n
        <b>Update SK check API1</b>
        <b>Remove unsupported commands</b>
        For more information type command <code>/log </code> to show all information", $message_id);
    }
    //==================[Help Command]==================//
    elseif (strpos($message, "/help") === 0){
      sendMessage($chatId, "-----[<b>SK Tool</b>]-----\n
      <u>Check SK Live</u>:<code>/sk sk_live_xxxxxxx</code>\n
      <u>Check balance Stripe account</u>:<code>/bal sk_live_xxxxx</code>\n
      <u>Create Payment Session page</u>:<code>/pmc sk_live_xxxxx|[ammount]</code>Currency is USD \n
      <u>Check integration</u>:<code>/int sk_live_xxxxxx</code>\n\n
      -----[<b>Cards Tool</b>]-----\n
      <u>Card bin check:</u> <code>/bin xxxxxxx</code>\n
      <u>Card algorithm check:</u> <code>/agt xxxxxxxxxxxxxxxx|xx|xx|xxx</code>\n
      <u>Auth card</u>:<code>/aut xxxxxxxxxxxxxxxx|xx|xx|xxx</code>\n
      <u>CCN Auth</u>:<code>/cut xxxxxxxxxxxxxxxx|xx|xx|xxx</code>\n
      <u>Charge 1$</u>:<code>/chg xxxxxxxxxxxxxxxx|xx|xx|xxx</code>\n
      <u>Charge 5$</u>:<code>/chf xxxxxxxxxxxxxxxx|xx|xx|xxx</code>\n
      <u>CCN charge 5$</u>:<code>/nch xxxxxxxxxxxxxxxx|xx|xx|xxx</code>\n\n
      -----[<b>Other</b>]-----\n
      <u>Show all commands</u>:<code>/help</code>\n
      <u>your info</u>:<code>/info</code>\n
      <u>Update Logs</u>:<code>/log</code>\n
      <u>Befor you use</u>:<code>/beu</code>\n
      <u>Generate info</u>:<code>/inf [country code]</code>\n
      <u>Service Status</u>:<code>/sta</code>\n\n
      <b>Bot Made By: Stowe</b>\n
      <b>Bot version</b>:<code>3.2</code>", $message_id);
  }
  //==================[SK Command]==================//
  elseif (strpos($message, "/sk") === 0){
        require('cmds/sk.php');
    }
  //==================[Balance Command]==================//
  elseif (strpos($message, "/bal") === 0){
    require('cmds/bal.php');
    
  }
    //==================[agt Command]==================//
    elseif (strpos($message, "/agt") === 0){
      require('cmds/agt.php');
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
       require('cmds/aut.php'); 
    }
    //==================[cut Command]==================//
    elseif (strpos($message, "/cut") === 0){
      require('cmds/cut.php');
    }
    //==================[chg Command]==================//
    elseif (strpos($message, "/chg") === 0){
      require('cmds/chg.php');
    }
    //==================[chf Command]==================//
    elseif (strpos($message, "/chf") === 0){
      require('cmds/chf.php');
    }
    //==================[nch Command]==================//
    elseif (strpos($message, "/nch") === 0){
      require('cmds/nch.php');
    }
    //==================[pmc Command]==================//
    elseif (strpos($message, "/pmc") === 0){
      require('cmds/pmc.php');
    }
//==================[info Command]==================//
elseif (strpos($message, "/info") === 0){
    sendMessage($chatId, "<u>ID:</u> <code>$userId</code>\n<u>First Name:</u> $firstname\n<u>Username:</u> @$usernamee\n\n<b>Bot Made by: Stowe .</b>", $message_id);
    }
  //==================[log Command]==================//
  elseif (strpos($message, "/log") === 0){
    sendMessage($chatId, "<b>✅ Update V3.2 info</b>\n\n
      <code>(bug old version still there) API V3 will update soon </code>\n
      <b>Update engine check</b>\n
    <b>Update SK check API1</b>\n
    <b>Remove custom SK charge Commands</b>\\n
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
//==================[sta Command]==================//
    elseif (strpos($message, "/sta") === 0){
        sendMessage($chatId, "<b>❕Service status❕</b>\n <b>SK Tool:</b>Alaways ON ✅ \n\n Card Tool \n <b>AGT:</b>Alaways ON ✅\n<b>ck & NK:</b>Alaways ON ✅ \n <b>Charge & Auth</b>ON ✅", $message_id);
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
  
function sendMessage($chatId, $message, $message_id) {
 require('config.php');
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
function sendLog($admin_id, $message, $message_id) {
  //check setting
  require('config.php');
  if ($buger == true || $pmsend == true){
    $url = $GLOBALS['website'] . "/sendMessage";

    $postData = array(
        'chat_id' => $admin_id,
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
  } else {
    die();
  }
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
?>