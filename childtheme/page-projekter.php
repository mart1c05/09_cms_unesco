<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		</main><!-- #main -->
		<h1>TEST FOR HELVEE</h1>

		<script>
			let projekter =[];
			const fil = "http://marthascales.dk/kea/09_cms/09_cms_unesco-wp/wp-json/wp/v2/projekt";



			async function hentData() {
  			const resultat = await fetch(fil);
  			projekter = await resultat.json();
 			vis();
			}

			function vis(){
				console.log(projekter);
				console.log("hej");
			}


			hentData(fil);








		</script>
	</div><!-- #primary -->

<?php
get_footer();
