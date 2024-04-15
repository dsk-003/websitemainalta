<?php defined( 'ABSPATH' ) OR die( 'This script cannot be accessed directly.' );

/**
 * Template header
 */

$us_layout = US_Layout::instance();
?>
<!DOCTYPE HTML>
<html class="<?php echo $us_layout->html_classes() ?>" <?php language_attributes( 'html' ) ?>>
<head>
	<meta charset="UTF-8">

	<?php wp_head() ?>

	<?php if ( ( defined( 'US_DEV' ) AND US_DEV ) OR us_get_option( 'optimize_assets', 0 ) == 0 ): ?>
		<style id='us-theme-options-css' type="text/css"><?php echo us_get_theme_options_css() ?></style>
	<?php endif; ?>
	<?php if ( $us_layout->header_show != 'never' ): ?>
		<style id='us-header-css' type="text/css"><?php echo us_minify_css( us_get_template( 'config/header.css' ) ) ?></style>
	<?php endif; ?>
	<?php if ( us_get_option( 'optimize_assets', 0 ) == 0 AND ( $us_custom_css = us_get_option( 'custom_css', '' ) ) != '' ): ?>
		<style id='us-custom-css' type="text/css"><?php echo us_minify_css( $us_custom_css ) ?></style>
	<?php endif; ?>
<style>
* {box-sizing: border-box;}
.img-zoom-container {
  position: relative;
}
.img-zoom-lens {
  position: absolute;
  border: 1px solid #d4d4d4;
  /*set the size of the lens:*/
  width: 40px;
  height: 40px;
}
.img-zoom-result {
  border: 1px solid #d4d4d4;
  /*set the size of the result div:*/
  width: 300px;
  height: 300px;
}

</style>
<script>
function imageZoom(imgID, resultID) {
  var img, lens, result, cx, cy;
  img = document.getElementById(imgID);
  result = document.getElementById(resultID);
  /*create lens:*/
  lens = document.createElement("DIV");
  lens.setAttribute("class", "img-zoom-lens");
  /*insert lens:*/
  img.parentElement.insertBefore(lens, img);
  /*calculate the ratio between result DIV and lens:*/
  cx = result.offsetWidth / lens.offsetWidth;
  cy = result.offsetHeight / lens.offsetHeight;
  /*set background properties for the result DIV:*/
  result.style.backgroundImage = "url('" + img.src + "')";
  result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
  /*execute a function when someone moves the cursor over the image, or the lens:*/
  lens.addEventListener("mousemove", moveLens);
  img.addEventListener("mousemove", moveLens);
  /*and also for touch screens:*/
  lens.addEventListener("touchmove", moveLens);
  img.addEventListener("touchmove", moveLens);
  function moveLens(e) {
    var pos, x, y;
    /*prevent any other actions that may occur when moving over the image:*/
    e.preventDefault();
    /*get the cursor's x and y positions:*/
    pos = getCursorPos(e);
    /*calculate the position of the lens:*/
    x = pos.x - (lens.offsetWidth / 2);
    y = pos.y - (lens.offsetHeight / 2);
    /*prevent the lens from being positioned outside the image:*/
    if (x > img.width - lens.offsetWidth) {x = img.width - lens.offsetWidth;}
    if (x < 0) {x = 0;}
    if (y > img.height - lens.offsetHeight) {y = img.height - lens.offsetHeight;}
    if (y < 0) {y = 0;}
    /*set the position of the lens:*/
    lens.style.left = x + "px";
    lens.style.top = y + "px";
    /*display what the lens "sees":*/
    result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
  }
  function getCursorPos(e) {
    var a, x = 0, y = 0;
    e = e || window.event;
    /*get the x and y positions of the image:*/
    a = img.getBoundingClientRect();
    /*calculate the cursor's x and y coordinates, relative to the image:*/
    x = e.pageX - a.left;
    y = e.pageY - a.top;
    /*consider any page scrolling:*/
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return {x : x, y : y};
  }
}
</script>
<!-- jQuery core, needed if not already present! -->


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-105114470-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-105114470-1');
</script>


</head>
<body <?php body_class( 'l-body ' . $us_layout->body_classes() );
if ( us_get_option( 'schema_markup' ) ) {
	echo ' itemscope itemtype="https://schema.org/WebPage"';
} ?>>
<?php
global $us_iframe;
if ( ! ( isset( $us_iframe ) AND $us_iframe ) AND us_get_option( 'preloader' ) != 'disabled' ) {
	add_action( 'us_before_canvas', 'us_display_preloader', 100 );
	function us_display_preloader() {
		$preloader_type = us_get_option( 'preloader' );
		if ( ! in_array( $preloader_type, array_merge( us_get_preloader_numeric_types(), array( 'custom' ) ) ) ) {
			$preloader_type = 1;
		}

		$preloader_image = us_get_option( 'preloader_image' );
		$preloader_image_html = '';
		$img = usof_get_image_src( $preloader_image, 'medium' );
		if ( $preloader_type == 'custom' AND $img[0] != '' ) {
			$preloader_image_html .= '<img src="' . esc_url( $img[0] ) . '"';
			if ( ! empty( $img[1] ) AND ! empty( $img[2] ) ) {
				// Image sizes may be missing when logo is a direct URL
				$preloader_image_html .= ' width="' . $img[1] . '" height="' . $img[2] . '"';
			}
			$preloader_image_html .= ' alt="" />';
		}

		?>
		<div class="l-preloader"><div class="l-preloader-spinner">
			<div class="g-preloader type_<?php echo $preloader_type ?>"><div><?php echo $preloader_image_html ?></div></div>
		</div></div>
		<?php
	}
}

do_action( 'us_before_canvas' ) ?>

<div class="l-canvas <?php echo $us_layout->canvas_classes() ?>">

	<?php if ( $us_layout->header_show != 'never' ): ?>

		<?php do_action( 'us_before_header' ) ?>

		<?php us_load_template( 'templates/l-header' ) ?>

		<?php do_action( 'us_after_header' ) ?>

	<?php endif/*( $us_layout->header_show != 'never' )*/
	; ?>
