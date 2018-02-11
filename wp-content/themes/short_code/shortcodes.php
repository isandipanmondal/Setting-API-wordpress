<?php


function demo_short_code_func( $atts, $content ) {


		$pairs = [

			'position' => 'left',

		];

		$position = extract( shortcode_atts( $pairs, $atts ) );

		return "<h1 align = '".$position."'>" . $content . "</h1>";
}

	add_shortcode( 'demo_new', 'demo_short_code_func' );




function new_slider_shotcode() { 

ob_start(); ?>


<div class="container-fluid">
  <h2 align="center">Carousel Example</h2>  

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

   <!--  Wrapper for slides -->

    <div class="carousel-inner">
      <div class="item active">
        <img src="<?php echo get_template_directory_uri() ?>/images/la.jpg" alt="Los Angeles" style="width:100%; height: 500px;"> 
      </div>

      <div class="item">
        <img src="<?php echo get_template_directory_uri() ?>/images/chicago.jpg" alt="Chicago" style="width:100%; height: 500px;">
      </div>
    
      <div class="item">
        <img src="<?php echo get_template_directory_uri() ?>/images/ny.jpg" alt="New york" style="width:100%; height: 500px;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


<?php $con = ob_get_clean();

	return $con;

}

add_shortcode( $tag = 'slider', $func = 'new_slider_shotcode' );






function test_content() {

	ob_start(); ?>

		<div class="container">
      <div class="row">
        <div class="col-sm-6">
          <h1 class="text_color_test">This is a testing document here.</h1>
        </div>
      </div>  
    </div>

	<?php $text = ob_get_clean();

	return $text; 

}


add_shortcode( $tag = 'text', $func = 'test_content' );

