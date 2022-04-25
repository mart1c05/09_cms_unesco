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


		<section id="single_container">
     
          <article>
            <img class="single_img" src="" alt="" />
            <h3></h3>
            <p class="aargang"></p>
            <p class="fag"></p>
          </article>
       
      </section>

		</main><!-- #main -->
		<h1>SINGLE VIEW</h1>

		<script>
			let projekter;
			const fil = "http://marthascales.dk/kea/09_cms/09_cms_unesco-wp/wp-json/wp/v2/projekt/"+<?php echo get_the_ID()?>;

			const container = document.querySelector("#single_container");
			const template = document.querySelector("template");


			async function hentData() {
  			const resultat = await fetch(fil);
  			projekter = await resultat.json();
 			vis();
			} 

			function vis(){
				console.log(projekter);
				console.log("hej");
					document.querySelector(".single_img").src = projekter.billede.guid;
					document.querySelector("h3").textContent = projekter.title.rendered;
					document.querySelector(".aargang").textContent = projekter.aargang[0].name;
					document.querySelector(".fag").textContent = projekter.fagvalg[0].name;
					

			}

			hentData();

		</script>
	</div><!-- #primary -->

<?php
get_footer();
