$(document).ready(function() {
    draw();
    load("1");

    $(".tde").live("mousemove", function() {
        drawme($(this).attr('id'));
    });
    $(".metoo").live("mousemove", function() {
        drawme($(this).attr('id'));
    });

	var img = new Image();
	img.src = './cloud-imgs/1.jpg';
	
	img.onload = function () 
	{

		heroWidth = $("#hero").width();

		if(img.width > heroWidth)
		{
			ratio = heroWidth / img.width;
		
			img.width = img.width * ratio;
			img.height = img.height * ratio;
		}

		bgsize = img.width + "px " + img.height + "px";
    	canvas.style.background = "url(./cloud-imgs/1.jpg)";
    	canvas.style.backgroundSize = bgsize;
		if(img.width > heroWidth)
		{
			ratio = heroWidth / img.width;
			canvas.width = img.width * ratio;
			//$("#canvas").animate({height: img.height, width: heroWidth});
		}
		else
			canvas.width = img.width;
		canvas.height = img.height;
	}

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
