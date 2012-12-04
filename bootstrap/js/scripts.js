var clickX = new Array();
var clickY = new Array();
var clickDrag = new Array();

function iseeittoo(id)
{

      $.post("iseeittoo.php", {id:id},
        function(data) {
                document.getElementById('count' + id).innerHTML = data;
                }
        );
}

function pin(id)
{
	var canvas = document.getElementById('canvas');
        var ctx = canvas.getContext("2d");
        var image = new Image();
        var data = document.getElementById(id+'data').innerHTML;
        image.src = decodeURIComponent(data);
        ctx.drawImage(image,0,0);
}

function clearme()
{
	clickX.length = 0;
	clickY.length = 0;
	clickDrag.length = 0;
	canvas.width = canvas.width;

}

function drawme(id)
{
	clearme();	
	var canvas = document.getElementById('canvas');
	var ctx = canvas.getContext("2d");
	var image = new Image();
	var data = document.getElementById(id+'data').innerHTML;
	image.src = decodeURIComponent(data);
	ctx.drawImage(image,0,0);
}

function draw()
{
    var canvasDiv = document.getElementById('canvasDiv');
    canvas = document.createElement('canvas');
    //canvas.setAttribute('width', 500);
    //canvas.setAttribute('height', 500);
    canvas.setAttribute('id', 'canvas');
    canvasDiv.appendChild(canvas);
                
	if(typeof G_vmlCanvasManager != 'undefined') {
        canvas = G_vmlCanvasManager.initElement(canvas);
    }
    context = canvas.getContext("2d");
    canvas.onselectstart = function(){
        return false;
    };
    
    $('#canvas').mousedown(function(e){
        var mouseX = e.pageX - this.offsetLeft;
        var mouseY = e.pageY - this.offsetTop;

        paint = true;
        addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop);
        redraw();
        return false;
    });
    $('#canvas').mouseup(function(e){
        paint=false;
    });
    $('#canvas').mousemove(function(e){

        if(paint){
        	addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop, true);
        	redraw();
        }
    });
    var paint;

    function addClick(x, y, dragging)
    {
        clickX.push(x);
        clickY.push(y);
        clickDrag.push(dragging);
    }
    function redraw(){
        //canvas.width = canvas.width; // Clears the canvas

	context.lineCap = "round";
        context.strokeStyle = "rgba(0,0,0,1)";
        context.lineJoin = "round";
        context.lineWidth = 3;
	context.shadowBlur = 2;
	context.shadowColor = "rgba(0,0,0,1)";
	context.shadowOffsetX = 0;
	context.shadowOffsetY = 0;

        for(var i=0; i < clickX.length; i++)
        {               
            context.beginPath();
            if(clickDrag[i] && i)
			{
            	context.moveTo(clickX[i-1], clickY[i-1]);
            }
			else
			{
                context.moveTo(clickX[i]-1, clickY[i]);
        	}

        context.lineTo(clickX[i], clickY[i]);
        context.closePath();
        context.stroke();
        }
    }
}

function insert(imgname,label,data)
{
        
      $.post("insert.php", {imgname: imgname, label: label, data: data},
        function(data) {
                }
        );

	load(imgname);

}

function load(imgname)
{
	$.post("load.php", {imgid: imgname},
	function(data) {
		document.getElementById('prev').innerHTML = data;
	});

	$(".cheese tr").mouseover(function(){$(this).addClass("over");}).mouseout(function(){$(this).removeClass("over");});
        $(".cheese tr").addClass("alt");

}
