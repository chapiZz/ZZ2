<!doctype html>
    <head>
        <title>Title</title>

        <style type="text/css" media="screen">
            .slides_container {
                width:570px;
                height:270px;
				z-index:1;
            }
            .slides_container div {
                width:570px;
                height:270px;
                display:block;
            }
			img
			{

			z-index:1;
			}
			.test
			{

				position: absolute;
				margin-top: 230px;
				margin-left: 0px; 
				width: 570px;
				height: 50px;
	
				background-image: url(images/Sans.png);
				z-index: 3;
				opacity: 0.5;
				filter:alpha(opacity=50);
			}
			.test2
			{
				position: absolute;
				margin-top: 242px;
				margin-left: 150px; 
				width: 30px;
				height: 50px;
				z-index: 4;
			}
			
			

        </style>
    
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>

        <script src="scripts/slides.js"></script>
    
        <script>
            $(function(){
			  $("#slides").slides({
				    preload: true,
					preloadImage: '/img/loading.gif',
					play: 5000,
					pause: 2500,
					pagination: true,
					hoverPause: true
			  });
            });
        </script>
    </head>
    <body>
        <div id="slides">
		<div class="test"></div><div class="test2">eee</div>
            <div class="slides_container">
			
                <div>
                    <img src="images/slide-7.jpg">
                </div>
                <div>
                    <img src="http://placehold.it/570x270">
                </div>
                <div>
                    <img src="http://placehold.it/570x270">
                </div>
                <div>
                    <img src="http://placehold.it/570x270">
                </div>
            </div>
        </div>
		<p align="center"><img src="http://placehold.it/570x270" /></p>
    </body>