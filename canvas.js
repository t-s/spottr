$(document).ready(function() {
    draw();
    load("1");

    $(".tde").live("mousemove", function() {
        drawme($(this).attr('id'));
    });
    $(".metoo").live("mousemove", function() {
        drawme($(this).attr('id'));
    });

    canvas.style.background = "url(./imgs/1.jpg)";
    canvas.style.backgroundSize = "500px 500px";

    $(".cheese td").mouseover(function(){$(this).addClass("over");}).mouseout(function(){$(this).removeClass("over");});
    $(".cheese td").addClass("alt");

    $(".cheese td").live("mouseover", function () {
        if (!($(this).hasClass("pin")))
        {
            $(this).addClass("over");
        }
    });
    $(".cheese td").live("mouseout", function () {
        $(this).removeClass("over");
    });

});
