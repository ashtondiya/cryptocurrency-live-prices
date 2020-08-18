<script>
  var path_images = "<?php echo plugin_dir_url( __DIR__ )."images" ?>";
</script>

<style>
  body {
    min-height: 75rem;
    padding-top: 2.5rem;
    font-family: Arial, Helvetica, sans-serif;
  }

  th {
    color: grey;
    font-size: 13px;
    opacity: 0.7;
  }

  td {
    font-size: 15px;
  }

  .text-icon {
    position: relative;
    margin-top: -10px;
    margin-left: 35px;
    font-size: 12px;
    color: grey;
    padding: 0px;
    height: 0px;
  }

  .jumbotron {
    height: 280px;
    background-color: #7f53ac;
    background-image: linear-gradient(315deg, #7f53ac 0%, #647dee 74%);        }

  .logo-absolute {
    position:absolute;width:30%;text-align:center;z-index:0;left:35%;cursor:pointer;opacity:0.9;
  }
  .logo-absolute:hover{opacity: 1;}

  .logo-1p { padding:0.4em 2em 0.4em 2em;border-radius:0.3em;color:#fff;
    background-color: #7f53ac; display:inline-block;
    background-image: linear-gradient(315deg, #7f53ac 0%, #647dee 74%);        }

  .logo-2p { font-size:0.6em;margin-top:0.2em; text-transform: uppercase;}

  @media only screen and (max-width: 991px) {
    .logo-absolute { display:none;}
    .mobileonly { display:none;}
  }

  .prehd1{font-size:0.8em;}
  .prehd2{font-size:1.4em;font-weight:bold;}

</style>

<nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
  <div class="container">
    <div class="col-md-12">

      <div class="row">
        <div class="col-sm-6 col-lg-4">
          <div class="card" style="">
            <div class="card-header bg-behance content-center">
              <div class="" style="margin-right: 5px; float: right;">
                <img src="https://cdn.executium.com/media/brands/icons/btc.png" class="" style="max-height: 50px; margin:10px;"/>
              </div>
              <div class="">
                <div class="text-value-xl">BTC/USD</div>
                <div class="text-muted small">BTC</div>
                <div class="text-uppercase text-muted small">Bitfinex</div>
              </div>
            </div>
            <div class="card-body row text-center">
              <div class="col-12">
                <div class="text-value-xl">BID <span class="text-uppercase text-muted small">11,898</span></div>
              </div>
              <div class="vr"></div>
              <div class="col-12">
                <div class="text-value">459 <span class="text-uppercase text-muted small">feeds</span></div>
              </div>
              <div class="col-12">
                <div class="text-value-xl">Diff <span class="text-uppercase text-muted small">0.03600000</span></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
              aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="logo-absolute">
        </div>

        <!-- <ul class="navbar-nav mr-auto">
           <li class="nav-item" style="padding-right: 20px;">
             <a class="nav-link" href="?exchange=bitfinex">Home</a>
           </li>
           <li class="nav-item" style="padding-right: 20px;">
             <a class="nav-link" href="https://github.com/executium/real-time-cryptocurrency-market-prices-websocket" target="_blank">API</a>
           </li>
         </ul>
         <ul class="navbar-nav ml-auto">
           <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">Exchanges</a>
             <div class="dropdown-menu" aria-labelledby="dropdown01">
               <a class="dropdown-item" href="?exchange=binance"> <img src="assets/circle/binance.png" class="imgcheck" style="width:30px;height:30px;" /> Binance</a>
               <a class="dropdown-item" href="?exchange=bitfinex"><img src="assets/circle/bitfinex.png" class="imgcheck" style="width:30px;height:30px;" /> Bitfinex</a>
               <a class="dropdown-item" href="?exchange=bitmex"><img src="assets/circle/bitmex.png" class="imgcheck" style="width:30px;height:30px;" /> Bitmex</a>
               <a class="dropdown-item" href="?exchange=coinbasepro"><img src="assets/circle/coinbasepro.png" class="imgcheck" style="width:30px;height:30px;" /> Coinbase Pro</a>
               <a class="dropdown-item" href="?exchange=huobipro"><img src="assets/circle/huobipro.png" class="imgcheck" style="width:30px;height:30px;" /> Huobi Pro</a>
               <a class="dropdown-item" href="?exchange=bittrex"><img src="assets/circle/bittrex.png" class="imgcheck" style="width:30px;height:30px;" /> Bittrex</a>
               <a class="dropdown-item" href="?exchange=ftx"><img src="assets/circle/ftx.png" class="imgcheck" style="width:30px;height:30px;" /> FTX</a>
               <a class="dropdown-item" href="?exchange=gateio"><img src="assets/circle/gateio.png" class="imgcheck" style="width:30px;height:30px;" /> Gate.io</a>
             </div>
           </li>

         </ul>
         -->

      </div>
    </div>
  </div>
</nav>
<div class="" >
  <div class="container">
    <div class="row">
      <div class="col-md-2">
        <div class="prehd1">Exchange:</div>
        <div class="prehd2 exchange-name">&hellip;</div>
      </div>
      <div class="col-md-2">
        <div class="prehd1">Symbols Showing:</div>
        <div class="prehd2 symbols-showing">&hellip;</div>
      </div>
      <div class="col-md-2">
        <div class="prehd1">Symbols Supported:</div>
        <div class="prehd2 symbols-supported">&hellip;</div>
      </div>
      <div class="col-md-2">
        <div class="prehd1">Last Updated:</div>
        <div class="prehd2"><span class="last-update ago">&hellip;</span>ms</div>
      </div>
    </div>
  </div>
  <div class="table-content mt-2" style="max-width:auto;margin:0 auto">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">

            <div class="table-responsive">
              <div id="table">

                <div class="spinner-grow text-primary" role="status">
                  <span class="sr-only">Loading...</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
