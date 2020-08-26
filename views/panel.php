<script>
  var path_images = "<?php echo plugin_dir_url( __DIR__ )."images" ?>";
  var origin = "<?php isset($params['origin']['name']) ? $params['origin']['name'] : '' ?>";
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

<?php if($params['nav']): ?>
<nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
  <div class="container">
    <div class="col-md-12">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="logo-absolute">
            </div>

            <ul class="navbar-nav mr-auto">
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

        </div>
    </div>
  </div>
</nav>
<?php endif; ?>

<div class="container-fluid">
    <div class="row" id="symbols-container" data-origin="<?= $params['origin']['name'] ?>"></div>
</div>