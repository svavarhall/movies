// variable to hold request
var request;

var titleHeader = '<div class="panel panel-default" ><div class="panel-heading">' +
                '<h4 class="panel-title">';
var titleFooter = '</h4></div>';

var star = '<div class="pull-right"><button id="save" type="button" class="btn btn-default btn-xs">' +
        '<span id="save" class="glyphicon glyphicon-star"></span></button></div>';

var bodyHeader = ' <div data-toggle="collapse" id="';
var bodyMiddle = '" class="panel-collapse collapse in"><div class="panel-body">';
var bodyFooter = '</div></div></div>';


// bind to the submit event of our form
$("#search").submit(function(event){
    $( "#results" ).empty();

    if (request) {
        request.abort();
    }

    // setup some local variables
    var $form = $(this);
    // let's select and cache all the fields
    var $inputs = $form.find("input, select, button, textarea");
    // serialize the data in the form
    var serializedData = $inputs.serialize();

    console.log(serializedData);
    // let's disable the inputs for the duration of the ajax request
    $inputs.prop("disabled", true);

    var url =  "http://mymovieapi.com/?type=json&limit=10&" + serializedData;
    request = $.getJSON(url, null, function(movies) {
        if(movies.error) { $("#results").append( '<div class="alert alert-warning">' +
        'Mynd fannst ekki.</div>');
        } else {
            for(var i in movies) {
            movie = movies[i];
            if(!movie.year) movie.year = "Engar upplýsingar";
            if(!movie.rating) movie.rating = "Engar upplýsingar";
            if(!movie.genres) movie.genres = "Engar upplýsingar";
            if(!movie.plot_simple) movie.plot_simple = "Engar upplýsingar";
            $("#results").append(titleHeader + movie.title +
                star+ titleFooter + bodyHeader + i + bodyMiddle +
                '<dl class="dl-horizontal">' +
                '<dt>Útgáfuár</dt><dd id="year">'+ movie.year +'</dd>' +
                '<dt>IMDB einkunn</dt><dd>'+ movie.rating +'</dd>' +
                '<dt>Tegund</dt><dd>'+ movie.genres +'</dd>' +
                '<dt>Söguþráður</dt><dd>'+ movie.plot_simple +'</dd>' +
                '</dl>' + bodyFooter);
            }
        }
        }).fail(function(d) {
        $("#results").append( '<div class="alert alert-danger">' +
        'Ekki náðist samband við þjónustu.</div>');
    });
    // callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // log a message to the console
        console.log("Hooray, it worked!");
    });

    // callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // log the error to the console
        console.error(
            "The following error occured: "+
            textStatus, errorThrown
        );
    });

    // callback handler that will be called regardless
    // if the request failed or succeeded
    request.always(function () {
        // reenable the inputs
        $inputs.prop("disabled", false);
    });

    // prevent default posting of form
    event.preventDefault();
    
});

$(document).ready(function() {
    $('#title').keyup(function() {

        var empty = false;
        $('#title').each(function() {
            if ($(this).val().length === 0) {
                empty = true;
            }
        });

        if (empty) {
            $('#search button').attr('disabled', 'disabled');
        } else {
            $('#search button').removeAttr('disabled');
        }
    });

    var prefix = "localStorage-";
    $("#results").on("click", function (evt) {
        if ($(evt.target).attr('id') === 'save') {
            var key = uniqueId();
            var value = $(evt.target).closest("h4").text();
            var indexString = localStorage["index"];
            var index;
            var exists = false;
            $("#notice").empty();

            if(indexString === undefined) {
                index = [];

            } else {
                index = JSON.parse(indexString);
                for(var i = 0; i < index.length; i++) {
                    var prefixKey = prefix + index[i];
                    if (localStorage[prefixKey] === value) { exists = true; }
                }
            }
            
            if(!exists) {
                index.push(key);
                localStorage["index"] = JSON.stringify(index);
                localStorage[prefix + key] = value;
                $("#notice").append('<div class="alert alert-success">Mynd skráð í mínar myndir.</div>');
            } else {
                $("#notice").append('<div class="alert alert-warning">Mynd er nú þegar á skrá.</div>'); 
            }
            $(evt.target).closest("button")
                .css("background-color", "#5cb85c")
                .css("color", "white"); 
        }
        
    });

});

function uniqueId(){
    // always start with a letter (for DOM friendlyness)
    var idstr=String.fromCharCode(Math.floor((Math.random()*25)+65));
    do {
        // between numbers and characters (48 is 0 and 90 is Z (42-48 = 90)
        var ascicode=Math.floor((Math.random()*42)+48);
        if (ascicode<58 || ascicode>64){
            // exclude all chars between : (58) and @ (64)
            idstr+=String.fromCharCode(ascicode);
        }
    } while (idstr.length<32);

    return (idstr);
}