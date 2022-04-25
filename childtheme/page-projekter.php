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
			<section id="filtrering">
				<button class="filter" data-klassetrin="alle">Alle</button>
			</section>


		<section id="container">
        <template>
          <article>
            <img src="" alt="" />
            <h3></h3>
            <p class="aargang"></p>
            <p class="fag"></p>
          </article>
        </template>
      </section>

		</main><!-- #main -->
		<h1>TEST FOR HELVEE</h1>

		<script>
			let projekter;
			let kategorier;
			let filterKnap = "alle";
			const fil = "http://marthascales.dk/kea/09_cms/09_cms_unesco-wp/wp-json/wp/v2/projekt";
			const catUrl = "http://marthascales.dk/kea/09_cms/09_cms_unesco-wp/wp-json/wp/v2/klassetrin";

			const container = document.querySelector("#container");
			const template = document.querySelector("template");

			async function hentData() {
  			const resultat = await fetch(fil);
			const catresultat =await fetch(catUrl);
  			projekter = await resultat.json();
			kategorier = await catresultat.json();

			console.log(kategorier);

 			vis();
			lavKnapper();
			}

			function lavKnapper(){
				kategorier.forEach((kategori)=>{
					document.querySelector("#filtrering").innerHTML += `<button class="filter" data-klassetrin="${kategori.id}">${kategori.name}</button>`
				});
				lavEventlistener();
			}

			function lavEventlistener(){
				document.querySelectorAll("#filtrering button").forEach((knap)=>{
					knap.addEventListener("click", filtrer);
				})
				console.log("eventlistenerFunktion");
			}

			function filtrer(){
			filterKnap=this.dataset.klassetrin;
			console.log(filterKnap);
			console.log("virker det?")
			vis();
			 }

			function vis(){
				console.log(projekter);
				console.log("visFunktion");

				container.textContent = "";

				projekter.forEach((projekt)=>{
					if(filterKnap=="alle"||projekt.klassetrin.includes(parseInt(filterKnap))){
					const klon = template.cloneNode(true).content;
					klon.querySelector("img").src = projekt.billede.guid;
					klon.querySelector("h3").textContent = projekt.title.rendered;
					klon.querySelector(".aargang").textContent = projekt.aargang[0].name;
					klon.querySelector(".fag").textContent = projekt.fagvalg[0].name;

					klon.querySelector("article").addEventListener("click", ()=>{location.href=projekt.link;})
					container.appendChild(klon);
				}})

			}

			hentData(fil);

		</script>
	</div><!-- #primary -->

<?php
get_footer();
