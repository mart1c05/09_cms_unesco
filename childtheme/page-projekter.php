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


		<section id="container">
        <template>
          <article>
            <img src="" alt="" />
            <h3></h3>
            <p id="aargang"></p>
            <p id="fag"></p>
          </article>
        </template>
      </section>

		</main><!-- #main -->
		<h1>TEST FOR HELVEE</h1>

		<script>
			let projekter;
			const fil = "http://marthascales.dk/kea/09_cms/09_cms_unesco-wp/wp-json/wp/v2/projekt";

			const container = document.querySelector("#container");
			const template = document.querySelector("template");



			async function hentData() {
  			const resultat = await fetch(fil);
  			projekter = await resultat.json();
 			vis();
			}

			function vis(){
				console.log(projekter);
				console.log("hej");

				container.textContent = "";

				projekter.forEach((projekt)=>{
					const klon = template.cloneNode(true).content;
					klon.querySelector("img").src = projekt.billede.guid;
					klon.querySelector("h3").textContent = projekt.title.rendered;
					klon.querySelector("#aargang").textContent = projekt.aargang[0].name;
					klon.querySelector("#fag").textContent = projekt.fagvalg[0].name;
					container.appendChild(klon);
				})

			}

			hentData(fil);

		</script>
	</div><!-- #primary -->

<?php
get_footer();
