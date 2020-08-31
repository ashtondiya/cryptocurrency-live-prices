jQuery.noConflict();

var symDiff = [];
// Content Delivery Network Option
var iconUrl='https://cdn.executium.com/media/brands/icons/';

jQuery(document).ready(function($){
  var symDiff = [];
// Content Delivery Network Option
  var iconUrl='https://cdn.executium.com/media/brands/icons/';

  function tableSymbols(exchange) {
    $('.exchange-name').empty().html('<img src="../images/circle/'+exchange.toLowerCase()+'.png" class="imgcheck" style="width:30px;height:30px;" /> '+capitalize(exchange));
    $('.symbols-supported,.symbols-showing').empty().html('&hellip;');

    //var table = $('#table');
    //table.empty().html('<div class="spinner-grow text-primary" role="status"><span class="sr-only">Loading &hellip;</span></div>');

    var url = 'https://marketdata.executium.com/api/v2/system/symbols';
    $.ajax({
      type: "POST",
      url: url,
      data: 'exchange=' + exchange,
      cache: false,
      crossDomain: true,
      xhrFields: {withCredentials: true},
      timeout: 6000,
      error: function (data) {
        if (typeof data.responseJSON.data.error !== 'undefined') {
          //table.empty().html(data.responseJSON.data.error);
        } else {
          //table.empty().html('Failed to load; Please view console.');
        }

        /*
            Error can occur due to rate limiting.
            We wait 1 second then try again
        */

        setTimeout(function() { tableSymbols(exchange); },1500);

      },
      scriptCharset: "script", dataType: "json",
      success: function (data) {
        $('.symbols-supported').empty().html(data.data.length);

        var showing=0;
        var symbol_container = $("#symbols-container");

        $.each(data.data, function (i, v) {
          // We do not want to show everything
          if(rnd(1,20)==1 || i<5 || data.data.length<40) {
            //
            var code = exchange + '-' + v.id;

            if( v.base != undefined) {
              /*let symbol = `<div class="col-lg-4 col-md-4 col-sm-12" style="margin-bottom: 10px;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="" id="` + iconUrl + v.base.toLowerCase() + `"></div>
                                        <div class="">
                                            <div class="" style="margin-right: 5px; float: left;">
                                                <img src="` + iconUrl + v.base.toLowerCase() + `.png" onerror="this.onerror=null;this.src='https://cdn.executium.com/media/brands/icons/none.png';" class="" style="max-height: 50px; margin:10px;"/>
                                            </div>
                                            <div class="col-4 pull-left" style="">
                                                <div class="text-value-xl">` + v.quote + `</div>
                                                <div class="text-muted small">` + v.base + `</div>
                                                <div class="text-uppercase text-muted small">` + capitalize(exchange) + `</div>
                                            </div>
                                            
                                           <div class="">
                                                <div class="">BID <span style="font-size: 12px;" class="text-uppercase text-muted small bids-` + code + `-price"></span></div>
                                                <div class="text-value">Asks <span style="font-size: 12px;" class="text-uppercase text-muted small asks-` + code + `-price"></span></div>
                                                <div class="">Diff <span style="font-size: 12px;" class="text-uppercase text-muted small diff-` + code + `">0.0</span></div>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
              */

              let symbol = `<div class="" style="width: 45%;display: flex;float: left;margin:1%;">
                               
                                <img src="` + iconUrl + v.base.toLowerCase() + `.png" onerror="this.onerror=null;this.src='https://cdn.executium.com/media/brands/icons/none.png';" class="" 
                                style="max-height: 50px; margin:10px;"/>
                            
                            <div class="" style="width: 30%;float: left">
                                <div class="">` + v.quote + `</div>
                                <div class="">` + v.base + `</div>
                                <div class="">` + capitalize(exchange) + `</div>
                            </div>
                           <div class="" style="width: 50%;display:;float: left;">
                                <div class="">BID <span style="font-size: 12px;" class="bids-` + code + `-price"></span></div>
                                <div class="">Asks <span style="font-size: 12px;" class="asks-` + code + `-price"></span></div>
                                <div class="">Diff <span style="font-size: 12px;" class="diff-` + code + `">0.0</span></div>
                           </div>
                        </div></div>`;


              symDiff['bids/' + exchange + '/' + v.id + '-1'] = 0;
              symDiff['asks/' + exchange + '/' + v.id + '-1'] = 0;

              // Always plural. Always asks, or bids, never ask or bid
              request_orderbook_server(exchange, v.id, 'bids');
              request_orderbook_server(exchange, v.id, 'asks');
              //
              showing++;

              symbol_container.append(symbol);
            }

          }
        });

        $('.symbols-showing').empty().html(showing);

        // Image Check
        imageCheck('.imgcheck');
      }

    });

    return true;
  }


  function customSymbol(exchange, symbols) {
    let url = 'https://marketdata.executium.com/api/v2/system/symbols';

    $.ajax({
      type: "POST",
      url: url,
      data: 'exchange=' + exchange,
      cache: false,
      crossDomain: true,
      xhrFields: {withCredentials: true},
      timeout: 6000,
      error: function (data) {
        setTimeout(function() { customSymbol(exchange, symbols) },1500);
      },
      scriptCharset: "script", dataType: "json",
      success: function (data) {
        $('.symbols-supported').empty().html(data.data.length);

        let showing = 0;
        let container = $("."+exchange+"-"+symbols);

        let add = false;

        $.each(data.data, function (i, v) {
          //if(rnd(1,20)==1 || i<5 || data.data.length < 40) {
            //
            var code = exchange + '-' + v.id;

            if( v.base != undefined && symbols == v.base.toLowerCase()) {
              add = true;
              let symbol = `<div class="" style="width: 33%;display: flex;">
                                <img src="` + iconUrl + v.base.toLowerCase() + `.png" onerror="this.onerror=null;this.src='https://cdn.executium.com/media/brands/icons/none.png';" class="" style="max-height: 50px; margin:10px;"/>
                            </div>
                            <div class="" style="width: 33%;">
                                <div class="">` + v.quote + `</div>
                                <div class="">` + v.base + `</div>
                                <div class="">` + capitalize(exchange) + `</div>
                            </div>
                           <div class="" style="width: 33%;display:;">
                                <div class="">BID <span style="font-size: 12px;" class="bids-` + code + `-price"></span></div>
                                <div class="text-value">Asks <span style="font-size: 12px;" class="asks-` + code + `-price"></span></div>
                                <div class="">Diff <span style="font-size: 12px;" class="diff-` + code + `">0.0</span></div>
                           </div>
                        </div>`;

              symDiff['bids/' + exchange + '/' + v.id + '-1'] = 0;
              symDiff['asks/' + exchange + '/' + v.id + '-1'] = 0;

              // Always plural. Always asks, or bids, never ask or bid
              request_orderbook_server(exchange, v.id, 'bids');
              request_orderbook_server(exchange, v.id, 'asks');
              //
              showing++;

              container.append(symbol);
            }

            if(add) {
              return false;
            }
          //}
        });

        $('.symbols-showing').empty().html(showing);

        // Image Check
        imageCheck('.imgcheck');
      }

    });

    return true;
  }

// Temporary function for this test so that we do not load all 600+ symbols. This would result in unfair usage and a ban for your domain. Please becareful.
  function rnd(min, max)
  {
    return Math.floor(Math.random() * (max - min + 1) + min);
  }

// Check we have the icons on the cdn
  function imageCheck(cls) {
    $.each($(cls), function () {
      var image = $(this);
      var addImage = path => {
        image.attr("src", path)
      }
      image.on('load', function () {
        console.clear();
      }).on('error', function () {
        console.clear();
        addImage(iconUrl+'/none.png');
      });
    });
  }

  function capitalize(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
  }


// Global Varialbes
  var sockets = new Array();
  var subscription_property = new Array();
  var subscription_location = new Array();
  var monitor = [];
  var wssBASE = 'wss-public.executium.com';


  function socket_connect(id, wss, out) {
    try {
      //console.log('ID: '+id+' | Attempting: '+wss);

      let config = {'reconnection': true,'reconnectionDelay': 500,'reconnectionDelayMax':500,'reconnectionAttempts': 100};

      sockets[id] = io(wss, config);


      sockets[id].on('connect', function() {
        //console.log('ID: '+id+' | Connected: '+wss);

        socket_output(id,out,'connect');

        for(let i in subscription_location[id]) {
          subscribe_to_orderbook(id,i);
          //console.log('Connecting to '+id+' -> '+i);
        }
      });

      sockets[id].on(id,'disconnect', function() {
        //console.log('ID: '+id+' Disconnected: '+wss);
        socket_output(id,out,'disconnect');
      });

      sockets[id].on('connect_error', function(e) {
        //console.log('ID: '+id+' | Error: '+wss);
        socket_output(id,out,'connectionerror');
      });

    } catch(e) {
      console.log('Socket - Internal Data Issue',e);
    }
  }

  function socket_output(id,oc,rsp)
  {
    switch(oc) {
      case 'obreq':
        manage_orderbook_request(id,rsp);
        break;
      case 'ob':
        manage_orderbook_data(id,rsp);
        break;
    }
  }

  function request_orderbook_server(exchange,symbol,side)
  {
    let output = side+'-'+exchange+'-'+symbol;
    sockets[wssBASE].send({'req':exchange,'s':symbol,'o':output});
  }

  function manage_orderbook_data(id,rsp)
  {
    sockets[id].on('mvsym', function(data) {
      console.log('Symbol Moved Server ->'+data.n,data,subscription_property[data.n],a);

      unsubscribe_from_orderbook(id,subscription_property[data.n]);

      let a = data.n.split('-');

      $('.'+data.n+'-price').empty().html('');
      $('.'+data.n+'-qty').empty().html('');
      $('.'+data.n+'-ago').empty().html('');

      request_orderbook_server(a[1],a[2],a[0]);
    });

    sockets[id].on('dp', function(data) {
      try {
        let j=JSON.parse(data.d);
        let n=data.n.replace('/','-');
        let ago = new Date().getTime()-j[2];
        let split = n.split('-');
        let side = split[0];

        console.log(n);
        let price = parseFloat(j[0]).toFixed(8);

        if(price > 1) {
          price = numeral(price).format('0,0.00000000');
        }

        let tc ='/'+split[1]+'-'+split[2]+'-'+split[3];
        symDiff[data.n]=parseFloat(price);
        let diff = (symDiff['asks'+tc]-symDiff['bids'+tc]).toFixed(8);

        if(!isNaN(diff)) {
          $('.diff-' + split[1] + '-' + split[2]).empty().html(diff);
        }

        let qty = numeral(j[1]);

        $('.price-'+n).empty().html( trimNumber(price) );
        $('.qty-'+n).empty().html( qty.format('0,0.00000000') );
        $('.last-update').empty().html( ago );
        $('.server-'+n).empty().html( id );

        console.log('aaaa');
        // Only for bids in this example
        if(side=='bids') {
          if(typeof monitor[n] === 'undefined') {
            monitor[n] = price;
          }

          let transition = '';
          let rm = true;

          if(price < monitor[n]) {
            transition = 'table-danger';
          }

          if(price > monitor[n]) {
            transition = 'table-success';
          }

          if (transition != '') {
            $('.row-' + n).addClass(transition);

            if(rm === true) {
              setTimeout(function () {
                $('.row-' + n).removeClass(transition).removeClass('transition-bad');
              }, 110);
            }
          }

          monitor[n] = price;
        }
      }catch(e){
        console.log('error', e);
      }
    });

  }


  function manage_orderbook_request(id,rsp)
  {

    sockets[id].on('obreq', function(data) {
      var delay = 0;

      if(typeof sockets[data.n] === 'undefined') {
        if(data.n=='notavailable') {
          console.warn('Issue',data);
          $('.'+data.o+'-price').empty().html( 'Not available or running - '+data.s);
          delay=-1;
        }else{
          socket_connect(data.n,'https:\/\/'+data.n+':2083','ob');
          delay = 1000;
        }
      }

      if(delay > -1) {
        setTimeout(function(){
          var s = data.o.split('-');

          if(s[0]=='bids' || s[0]=='asks') {
            controllerOb(data.n, data.o, s[0], data.s, 1, data.o);
          }
        },delay);
      }

    });
  }


  function controllerOb(id,cid,side,sym,lvl,a)
  {
    var subtag=side+'/'+sym+'-'+lvl;

    if(typeof subscription_property[cid] !== 'undefined') {
      unsubscribe_from_orderbook(id, subscription_property[cid]);
    }

    $('.'+a+'-price').empty().html('<span class="price-'+subtag.replace("/","-")+'"></span>');
    $('.'+a+'-qty').empty().html('<span class="qty-'+subtag.replace("/","-")+'"></span>');
    $('.'+a+'-ago').empty().html('<span class="ago-'+subtag.replace("/","-")+' ago"></span>');
    $('.'+a+'-com').empty().html('<span class="com-'+subtag.replace("/","-")+'"></span>');

    if(typeof subscription_location[id] === 'undefined') {
      subscription_location[id] = new Array();
    }

    subscription_property[cid] = subtag;
    subscription_location[id][subtag] = sym;

    subscribe_to_orderbook(id, subtag);
  }

  function unsubscribe_from_orderbook(id, a)
  {
    console.log('Inarea', 'Unsubscribe', id, a);

    if(typeof subscription_location[id] != 'undefined') {
      delete subscription_property[a];
      if(typeof subscription_location[id][a] != 'undefined') { delete subscription_location[id][a]; }
    }

    sockets[id].send({'unsubscribe':a});
  }

  function subscribe_to_orderbook(id,tag)
  {
    sockets[id].send({'subscribe':tag});
  }

  socket_connect(wssBASE,'https:\/\/'+wssBASE+':2083','obreq');

  var exchange='bitfinex';

  if (window.location.href.indexOf("exchange=") > -1) {
    var queryString = window.location.search;
    var urlParams = new URLSearchParams(queryString);
    //
    exchange = urlParams.get('exchange');
    if (exchange == '') {
      exchange = 'bitfinex';
    }
  }

  //

  var customized_query = [];

  if($("#symbols-container").length > 0 && $("#symbols-container").data('origin') != undefined) {
    exchange = $("#symbols-container").data('origin');
  }

  tableSymbols(exchange);

  $.each($(".symbol"),function(i, v) {
    customSymbol($(this).data('origin'), $(this).data('symbol'));
  });

  setInterval(function() {
    $.each($('.ago'),function() {
      var v = parseInt($(this).html());
      if(v > 0){
        $(this).empty().html(parseInt(v + 25));
      }
    });
  }, 25);


  function trimNumber(value) {
    value = value.toString();

    if (value.indexOf('.') === -1) {
      return value;
    }

    while((value.slice(-1) === '0' || value.slice(-1) === '.') && value.indexOf('.') !== -1) {
      value = value.substr(0, value.length - 1);
    }
    return value;
  }

});

