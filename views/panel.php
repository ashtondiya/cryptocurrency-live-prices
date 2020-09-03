<script>
  var path_images = "<?php echo plugin_dir_url( __DIR__ )."images" ?>";
  var origin = "<?php isset($params['origin']) ? $params['origin'] : '' ?>";
</script>

<div class="items-no-decoration">
    <a class="none-style" href="?exchange=binance"> <img src="<?= plugin_dir_url( __DIR__ ) ?>assets/images/circle/binance.png" class="imgcheck" style="width:30px;height:30px;" /> Binance</a>
    <a class="" href="?exchange=bitfinex"><img src="<?= plugin_dir_url( __DIR__ ) ?>assets/images/circle/bitfinex.png" class="imgcheck" style="width:30px;height:30px;" /> Bitfinex</a>
    <a class="" href="?exchange=bitmex"><img src="<?= plugin_dir_url( __DIR__ ) ?>assets/images/circle/bitmex.png" class="imgcheck" style="width:30px;height:30px;" /> Bitmex</a>
    <a class="" href="?exchange=coinbasepro"><img src="<?= plugin_dir_url( __DIR__ ) ?>assets/images/circle/coinbasepro.png" class="imgcheck" style="width:30px;height:30px;" /> Coinbase Pro</a>
    <a class="" href="?exchange=huobipro"><img src="<?= plugin_dir_url( __DIR__ ) ?>assets/images/circle/huobipro.png" class="imgcheck" style="width:30px;height:30px;" /> Huobi Pro</a>
    <a class="" href="?exchange=bittrex"><img src="<?= plugin_dir_url( __DIR__ ) ?>assets/images/circle/bittrex.png" class="imgcheck" style="width:30px;height:30px;" /> Bittrex</a>
    <a style="" class="" href="?exchange=ftx"><img src="<?= plugin_dir_url( __DIR__ ) ?>assets/images/circle/ftx.png" class="imgcheck" style="width:30px;height:30px;" /> FTX</a>
    <a class="" href="?exchange=gateio"><img src="<?= plugin_dir_url( __DIR__ ) ?>assets/images/circle/gateio.png" class="imgcheck" style="width:30px;height:30px;" /> Gate.io</a>
</div>

<div class="">
    <div class="" id="symbols-container" data-origin="<?= $params['origin'] ?>"></div>
</div>