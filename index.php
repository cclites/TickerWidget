<?php
    $currency = json_decode( file_get_contents("http://www.getexchangerates.com/api/latest.json") );
    $currency = $currency[0];
?>

<!DOCTYPE html>
<html>
<head>
<title>Modobot.com Ticker</title>

    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=Rammetto+One' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Just+Me+Again+Down+Here' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
    <link href='Content/ticker.css' rel='stylesheet' type='text/css'>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div class="container text-center">
    <div>
        <div class="circles">
            <div id="circle1">
                <img class="widget-bot" src="Content/Images/widget-bot.png" alt="modobot logo">
            </div>
            <div id="circle2"></div>
        </div>
    </div>

    <div id="widget-ribbon1"></div>
    <div id="modo">
        <span class="letter">M</span>
        <span class="letter">O</span>
        <span class="letter">D</span>
        <span class="letter">O</span>
    </div>

    <div id="bot">
        <span class="letter">B</span>
        <span class="letter">O</span>
        <span class="letter">T</span>
    </div>

    <div class="control-panel">

        <div class="span3">
            <div class="data">
                <div class="label">Last:</div><div id="last" class="output">0</div>
                <div class="label">Ask:</div><div id="ask" class="output">0</div>
                <div class="label">Bid:</div><div id="bid" class="output">0</div>
            </div>
            <div class="slider">
                <div class="thumb" id="BITSTAMP"></div>
                <div class="thumb" id="BTCE"></div>
            </div>
            <div class="slider-buttons">
                <div class="up-arrow glyphicon-chevron-up"></div>
                <div class="down-arrow glyphicon-chevron-down"></div>
            </div>
        </div>

        <div class="currency row span4">
            <div id="usd" class="flags usd selected-icon" title="Click to see prices in USD">
                <img src="Content/Images/usd.png" alt="usd"/>
            </div>
            <div id="gbp" class="flags gbp unselected-icon" title="Click to see prices in GBP">
                <img src="Content/Images/gbp.png" alt="gbp" />
            </div>
            <div id="eur" class="flags eur unselected-icon" title="Click to see prices in EUR">
                <img src="Content/Images/eur.png" alt="eur" />
            </div>
            <div id="aus" class="flags aus unselected-icon" title="Click to see prices in AUD">
                <img src="Content/Images/aus.png" alt="aud" />
            </div>
        </div>

    </div>

    <div id="widget-ribbon2"><span>Bitcoin Ticker</span></div>
  </div>
  
  <div class="container instructions">
      This is a simple ticker that pulls in the price of a Bitcoin and displays the price in a variety of currencies. 
	  The prices are pulled from either Bitstamp or BTC-e, and are updated every 10 seconds. Exchange rates are pulled 
	  from www.getexchangerates.com. Vector graphics were pulled from a forgotten public resource, but are much appreciated.
  </div>

  <script>
      rates = {
          gbp: <?= $currency->GBP ?>,
          eur: <?= $currency->EUR ?>,
          aus: <?= $currency->AUD ?>
      }
  </script>


  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  <script src="Js/widget-ticker.js"></script>

</body>
</html>