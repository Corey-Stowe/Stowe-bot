<?php
    include ('config.php');
    $sec = substr($message, 4);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payouts');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERPWD, $sec. ':' . '');
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'amount=1100&currency=usd');
    $headers = array();
    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);
    $data = json_decode($result); // Chuyển đổi chuỗi JSON thành đối tượng
    if (strpos($result, 'api_key_expired')){
      sendMessage($chatId, "<b>❌ DEAD KEY</b>\n<u>KEY:</u> <code>$sec</code>\n<u>REASON:</u> EXPIRED KEY\n\n<b>Bot Made by: Stowe .</b>", $message_id);
      }
      elseif (strpos($result, 'Invalid API Key provided')){
      sendMessage($chatId, "<b>❌ DEAD KEY</b>\n<u>KEY:</u> <code>$sec</code>\n<u>REASON:</u> INVALID KEY\n\n<b>Bot Made by: Stowe .</b>", $message_id);
      }
      elseif ((strpos($result, 'payouts_not_allowed')) || (strpos($result, 'test_mode_live_card'))){
      sendMessage($chatId, "<b>❌ DEAD KEY</b>\n<u>KEY:</u> <code>$sec</code>\n<u>REASON:</u> Testmode Charges Only\n\n<b>Bot Made by: Stowe .</b>", $message_id);
      }
      elseif (strpos($result, 'Request rate limit exceeded')){
      sendMessage($chatId, "<b>⚠️ LIVE KEY</b>\n<u>KEY:</u> <code>$sec</code>\n<u>REASON:</u> Rate Limit Key\n\n<b>Bot Made by: Stowe .</b>", $message_id);
      }else{
      sendMessage($chatId, "<b>✅ LIVE KEY</b>\n<u>KEY:</u> <code>$sec</code>\n<u>RESPONSE:</u> SK LIVE!!\n\n<b>Bot Made by: Stowe .</b>", $message_id);
      };
?>