var prefix = "localStorage-";
function RewriteFromStorage() {
    $("#results").empty();
    for(var i = 0; i < localStorage.length; i++)    //******* length
    {
        var key = localStorage.key(i);              //******* key()
        if(key.indexOf(prefix) === 0) {
            var value = localStorage.getItem(key);  //******* getItem()
            //var value = localStorage[key]; also works
            var shortkey = key.replace(prefix, "");
            $("#results").append('<li class="list-group-item">' + value +
                "<input key='"+ key +"'type='button' value='Delete'></li>");
        }
    }
}

$("#results").on("click", function (evt) {
    localStorage.removeItem($(evt.target).attr('key'));
    RewriteFromStorage();
});

RewriteFromStorage();