$(function() {
    var includes = $('[include]');


    $.each(includes, function() {
        var file = '../res/include/' + $(this).attr("include") + '.html';
        $(this).load(file);
    })
})