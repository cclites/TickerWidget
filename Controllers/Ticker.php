<?php

  function getTicker($get){

      if($get["selector"] == "BITSTAMP"){
          $url = "https://www.bitstamp.net/api/ticker/";
          curl($url, $ticker);
          echo json_encode($ticker);
      }
      else if($get["selector"] == "BTCE"){
          $url = "https://btc-e.com/api/2/btc_usd/ticker‎";
          curl($url, $ticker);
          $nTicker = array("last"=>$ticker->ticker->last, "ask"=>$ticker->ticker->buy, "bid"=>$ticker->ticker->sell);
          return json_encode($nTicker);
      }
  }

  function curl($url, &$result)
  {
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $result = json_decode(curl_exec($ch));
      curl_close($ch);
      return 1;
  }

  function pCurl($url, $str, &$result)
  {
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_POST,1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $str);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
      curl_setopt($ch, CURLOPT_HEADER,0);  // DO NOT RETURN HTTP HEADERS
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);  // RETURN THE CONTENTS OF THE CALL
      $result = json_decode(curl_exec($ch), true);
      return 1;
  }

  function rawPCurl($url, $str = "", &$result){
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_POST,1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $str);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
      curl_setopt($ch, CURLOPT_HEADER,0);  // DO NOT RETURN HTTP HEADERS
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);  // RETURN THE CONTENTS OF THE CALL
      $result = curl_exec($ch);

      print_r($result);

  }
?>