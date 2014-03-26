var tlast = "",
    task = "",
    tbid = "";

var symbols = {
    usd : "USD",
    gbp : "GBP",
    eur: "EUR",
    aus: "AUD"
};

var currentExchange = "BITSTAMP",
    interval;

var getTicker = function(){

    url = "Dispatch/Dispatcher.php";

    $.ajax({
        type: "GET",
        url: url,
        data: { func:"getTicker", selector:currentExchange }
        /*dataType: JSON*/
    }).success(function(data){

            //alert(data);
            formatData(JSON.parse(data));

        }).error(function(data, error, message){
            alert(data + " ||| " + error + " ||| " + message);
        });
}

var isScrolledIntoView = function(elem)
{
    var p = $(".slider").offset();
    //alert(p.top);

    var docViewTop = p.top,
        docViewBottom = docViewTop + $(".slider").height(),
        elemTop = $(elem).offset().top,
        elemBottom = elemTop + $(elem).height();

    if ((elemBottom <= docViewBottom) && (elemTop >= docViewTop)){
      return true;
    }
}

var checkVisibility = function(){

   //alert($(".thumb").each(isScrolledIntoView()));
    if(isScrolledIntoView( $("#BITSTAMP") )){
        currentExchange = "BITSTAMP";
    }
    else if(isScrolledIntoView( $("#BTCE") )){
        currentExchange = "BTCE";
    }
}


var formatData = function(data){

    tlast = data.last;
    task = data.ask;
    tbid = data.bid;

    var id = $(".selected-icon").attr("id"),
        symbol = symbols[id];

    $("#last").text(symbol + "   " + (parseFloat(data.last).toFixed(2)));
    $("#ask").text(symbol + "   " + (parseFloat(data.ask).toFixed(2)));
    $("#bid").text(symbol + "   " + (parseFloat(data.bid).toFixed(2)));
}

$(function(){
    $(".up-arrow").click(
        function(){
            scroll = $(".slider").scrollTop();
            $(".slider").animate({'scrollTop': scroll-80},500, function(){checkVisibility();});

        }
    );

    $(".down-arrow").click(
        function(){
            scroll = $(".slider").scrollTop();
            $(".slider").animate({'scrollTop': scroll+80},500, function(){checkVisibility();});
        }
    );

    $(".flags").click(function(){

        $(".currency .flags").removeClass("selected-icon");
        $(".currency .flags").addClass("unselected-icon");
        $(this).removeClass("unselected-icon");
        $(this).addClass("selected-icon");

        var id = $(this).attr("id"),
            rate = rates[id],
            last = tlast,
            ask = task,
            bid = tbid,
            symbol = symbols[id];

        $("#last").text(symbol + "   " + (parseFloat(tlast).toFixed(2)));
        $("#ask").text(symbol + "   " + (parseFloat(task).toFixed(2)));
        $("#bid").text(symbol + "   " + (parseFloat(tbid).toFixed(2)));

    });

    getTicker();
    interval = setInterval(function(){getTicker();}, 10000);
});