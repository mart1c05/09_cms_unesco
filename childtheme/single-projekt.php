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
		 	 <h3></h3>
		  	<p class="info" ></p>
			<div class="img_container1">
        	<img class="single_img" src="" alt="" />
			</div>
            <p class="beskrivelse"></p>
			<div class="img_container2">
				<img class="lille1" src="" alt="">
				<img class="lille2" src="" alt="">
				<img class="lille3" src="" alt="">
			</div>
          </article>

		  <img class="projekt_img" src="./logo/nyt-logo-grøn.png" alt="logo">
		  <button class="projekt_knap">Projekter</button>
		  <button class="materialer_knap">Undervisningsmateriale</button>
       
      </section>

		</main><!-- #main -->

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
					document.querySelector("h3").textContent = projekter.title.rendered;
					document.querySelector(".info").textContent= `Skole: ${projekter.skolenavn}, ` + `Kontaktes på email: ${projekter.kontakt}`
					document.querySelector(".single_img").src = projekter.billede.guid;
					document.querySelector(".beskrivelse").textContent = projekter.beskrivelse
					document.querySelector(".lille1").src = projekter.lilleimg1.guid;
					document.querySelector(".lille2").src = projekter.lilleimg2.guid;
					document.querySelector(".lille3").src = projekter.lilleimg3.guid;

			}

			hentData();

		</script>
	</div><!-- #primary -->

<?php
get_footer();
