<?php
include ('config.php');
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
 if (strpos($result1, 'api_key_expired')){
     sendMessage($chatId, "<b>❌ DEAD KEY</b>\n<u>KEY:</u> <code>$sec</code>\n<u>REASON:</u> EXPIRED KEY\n\n<b>Bot Made by: Stowe .</b>", $message_id);
     return;
 }
 if (strpos($result1, 'Invalid API Key provided')){
 sendMessage($chatId, "<b>❌ DEAD KEY</b>\n<u>KEY:</u> <code>$sec</code>\n<u>REASON:</u> INVALID KEY\n\n<b>Bot Made by: Stowe .</b>", $message_id);
 return;
 }
if ((strpos($result, 'testmode_charges_only')) || (strpos($result, 'test_mode_live_card'))){
 sendMessage($chatId, "<b>❌ DEAD KEY</b>\n<u>KEY:</u> <code>$sec</code>\n<u>REASON:</u> Testmode Charges Only\n\n<b>Bot Made by: Stowe .</b>", $message_id);
 return;
}
 if (strpos($result1, 'Request rate limit exceeded')){
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
 if (strpos($result2, 'api_key_expired')){
     sendMessage($chatId, "<b>❌ DEAD KEY</b>\n<u>KEY:</u> <code>$sec</code>\n<u>REASON:</u> EXPIRED KEY\n\n<b>Bot Made by: Stowe .</b>", $message_id);
     return;
 }
 if (strpos($result2, 'Invalid API Key provided')){
 sendMessage($chatId, "<b>❌ DEAD KEY</b>\n<u>KEY:</u> <code>$sec</code>\n<u>REASON:</u> INVALID KEY\n\n<b>Bot Made by: Stowe .</b>", $message_id);
 return;
 }
 if ((strpos($result2, 'testmode_charges_only')) || (strpos($result, 'test_mode_live_card'))){
 sendMessage($chatId, "<b>❌ DEAD KEY</b>\n<u>KEY:</u> <code>$sec</code>\n<u>REASON:</u> Testmode Charges Only\n\n<b>Bot Made by: Stowe .</b>", $message_id);
 return;
 }
 elseif (strpos($result, 'message')){
   sendMessage($chatId, "<b>❌ Error</b>\n<u>KEY:</u> <code>$sec</code>\n<u>REASON:</u>Key cannot created maybe your SK is dead or not activated payment methods\n\n<b>Bot Made by: Stowe .</b>", $message_id); 
 }
 if (strpos($result2, 'Request rate limit exceeded')){
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
elseif (strpos($result3, 'message')){
 sendMessage($chatId, "<b>❌ Error</b>\n<u>KEY:</u> <code>$sec</code>\n<u>REASON:</u>Key cannot created maybe your SK is dead or not activated payment methods\n\n<b>Bot Made by: Stowe .</b>", $message_id); 
}
else{
 $message = "✅<b>Payment Link created</b>\n
 <b>Currency: USD</b>\n
 <b>Price: 499</b>\n
 <b>Link: $plink</b>\n
 <code>If key cannot created maybe your SK is dead or not activated payment methods</code>\n\n
 <b>Bot Made by: Stowe.</b>";
 sendMessage($chatId, $message, $message_id);
}
?>