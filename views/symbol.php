<script>
  var path_images = "<?php echo plugin_dir_url( __DIR__ )."images" ?>";
  var origin = "<?php isset($params['origin']['origin']) ? $params['origin']['origin'] : '' ?>";
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

<div class="container-fluid">
    <div class="row symbol <?= $params['origin']['origin'] ?>-<?= $params['origin']['symbol'] ?>" data-origin="<?= $params['origin']['origin'] ?>" data-symbol="<?= $params['origin']['symbol'] ?>"></div>
</div>