<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Greendow</title>
		<link rel="shortcut icon" href="img/GW.ico" />
		<meta name="viewport"
			content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<style type="text/css">
			* {
				margin: 0;
				padding: 0;
			}

			body {
				font-size: 14px;
				color: #444;
			}

			/* 栅格 */
			.col-1,
			.col-2,
			.col-3,
			.col-4,
			.col-5,
			.col-6,
			.col-7,
			.col-8,
			.col-9
				{
				display: block;
				position: relative;
				min-height: 1px;
				float: left;
			}

			.col-1 {
				width: 10%;
			}

			.col-2 {
				width: 20%;
			}

			.col-3 {
				width: 30%;
			}

			.col-4 {
				width: 40%;
			}

			.col-5 {
				width: 50%;
			}

			.col-6 {
				width: 60%;
			}

			.col-7 {
				width: 70%;
			}

			.col-8 {
				width: 80%;
			}

			.col-9 {
				width: 90%;
			}

			.col-f {
				display: block;
				position: relative;
				min-height: 1px;
				float: left;
			}

			.col-f{
				width: 26%;
			}





			@media screen and (min-width:1280px) {
				.top-nav {
					display: flex;
					flex-direction: row;
					flex-wrap: wrap;
					width: 100%;
				}

				.top-nav a {
					width: 7.69vw;
					color: black;
					text-decoration: none;
					line-height: 100px;
					height: 100px;
					text-align: center;
					font-size: 23px;
					position: relative;
					margin: 0 calc(100% / 50);
					font-family: Century Gothic;
				}

				.top-nav a:before {
					content: "";
					position: absolute;
					left: 0;
					bottom: 0;
					height: 3px;
					width: 100%;
					background-color: green;

					visibility: hidden;
					transform: scaleX(0);
					-webkit-transition: all 0.3s ease-in-out 0s;
					z-index: -1;
				}

				.top-nav a:hover {
					color: green;
					transition: all 0.3s ease;
				}

				.top-nav a:hover:before {
					visibility: visible;
					color: green;
					transform: scaleX(1);
					-webkit-transition: all 0.3s ease-in-out 0s;

				}

				.top1 {
					margin-left: calc(100% / 12)!important;
				}

				.top2 {
					margin-left: calc(100% / 6)!important;
				}


				.header {
					height: 800px;
					width: 100%;
					position: relative;
					background-image: url(img/try.jpg);
					background-repeat: no-repeat;
					background-size: 100%;
					margin-top: 20px;
					-webkit-transition: all 0.6s ease-out;
					background-position: center;
				}


				.head {
					font-family: helvetica;
					position: absolute;
					height: 100%;
					width: 100%;
					border-radius: 25px;
					text-align: center;
					color: white;
					text-decoration: none;
				}

				.header:hover {
					background-size: 115%;
				}
				#h1{
					font-size: 75px;
					margin-top: 350px;
				}
				#h2{
					font-size: 80px;
				}
				#h3{
					font-size: 20px; 
					width: 15%;
					height: 7%;
					background-color: white;
					border-radius: 10px;color: #5eaf4d;
					border: 3px solid #5eaf4d;
					line-height: 54px;
					margin: 25px auto;
				}
				.header:hover #h1 {
					font-size: 85px !important;
					margin-top: 330px !important;
					color: #5eaf4d !important;
					-webkit-transition: all 0.6s ease;
				}

				.header:hover span {
					color: white !important;
					font-size: 85px !important;
					-webkit-transition: all 0.6s ease;
				}

				.header:hover #h2 {
					color: #5eaf4d !important;
					font-size: 90px !important;
					-webkit-transition: all 0.6s ease;
				}

				.header:hover #h3 {
					font-size: 25px !important;
					border: none !important;
					background-color: #5eaf4d !important;
					color: white !important;
					-webkit-transition: all 0.6s ease;
				}

				.btn {
					background-color: #5eaf4d;
					border-radius: 14px;
					height: 50px;
					width: 200px;
					font-size: 18px;
					margin-top: 70px;
					color: white;
				}

				.btn:hover {
					background-color: forestgreen;
				}

				.pourquoi {
					box-sizing: content-box;
					height: 700px;
					width: 100%;
					background-color: #5eaf4d;
					position: relative;
					font-family: Century Gothic;
				}

				.les3 {
					display: flex;
					margin-top: 50px;
					height: 533px;
					width: 100%;
					justify-content: space-around;
				}

				.les {
					width: 20%;
					text-align: center;
					color: white;
				}

				.intro {
					display: grid;
					font-family: Century Gothic;
					grid-template-rows: 1fr 1fr;
					grid-template-columns: 1fr 1fr;
					grid-template-areas:
						"choisir foire"
						"support revendeur";
					height: 700px;
					width: 100%;
					position: relative;
					margin-top: 50px;
				}

				.choisir {
					grid-area: choisir;
					/* background-color: red; */
					text-align: left;
					color: #228B22;
				}

				.foire {
					grid-area: foire;
					/* background-color: orange; */
					color: #228B22;
				}

				.support {
					grid-area: support;
					/* background-color: yellow; */
					color: #228B22;
				}

				.revendeur {
					grid-area: revendeur;
					/* background-color: green; */
					color: #228B22;
				}

				.footer {
					display: flex;
					font-family: Century Gothic;
					justify-content: space-around;
					width: 100%;
					background-color: #228B22;
					position: relative;
					margin-top: 20px;
				}

				.col {
					width: 20%;
				}
				.footer1{
					width: 20%;
				}
				.footer1 img{
					width: 60%;
					margin: 10% 20%;
				}
				.f2 {
					color: white;
					margin-top: 30px;
					font-size: 14px;
				}

				.f3 div {
					width: 100%;
					font-size: 25px;
					margin-top: 35px;
					margin-left: 80px;
				}

				.footer a {
					text-decoration: none;
					color: white;
				}

				.f4 {
					margin: 100px auto;
					height: 50px;
					width: 100px;
					background-color: #5eaf4d;
					border-radius: 10px;
					font-size: 22px;
					text-align: center;
					line-height: 50px;
				}
				.footer5{
					width: 20%;
				}
				.footer5 img{
					width: 60%;
					margin: 10% 20%;
				}
				.footer a:hover {
					color: yellow;
				}
			}










			@media screen and (max-width:1279px) {
				.top-nav {
					display: flex;
					flex-direction: column;
					flex-wrap: wrap;
					width: 100%;
				}

				.top-nav a {
					width: 40%;
					color: black;
					text-decoration: none;
					line-height: 75px;
					height: 75px;
					text-align: center;
					font-size: 25px;
					position: relative;
					margin: 0 auto;
				}

				.top-nav a:before {
					content: "";
					position: absolute;
					left: 0;
					bottom: 0;
					height: 3px;
					width: 100%;
					background-color: green;

					visibility: hidden;
					transform: scaleX(0);
					-webkit-transition: all 0.3s ease-in-out 0s;
					z-index: -1;
				}

				.top-nav a:hover {
					color: green;
					transition: all 0.3s ease;
				}

				.top-nav a:hover:before {
					visibility: visible;
					color: green;
					transform: scaleX(1);
					-webkit-transition: all 0.3s ease-in-out 0s;

				}

				.top1 {
					margin-left: calc(100% / 12);
				}

				.top2 {
					margin-left: calc(100% / 6);
				}


				.header {
					height: 500px;
					width: 100%;
					position: relative;
					background-image: url(img/try.jpg);
					background-repeat: no-repeat;
					background-size: cover;
					margin-top: 20px;
					-webkit-transition: all 0.6s ease-out;
					background-position: center;
				}


				.head {
					font-family: helvetica;
					position: absolute;
					height: 100%;
					width: 100%;
					border-radius: 25px;
					text-align: center;
					color: white;
					text-decoration: none;
				}

				#h1{
					font-size: 50px;
					margin-top: 18%;
				}
				#h2{
					font-size: 50px;
				}
				#h3{
					font-size: 10px; 
					width: 40%;
					max-width: 250px;
					height: 7%;
					background-color: white;
					border-radius: 10px;color: #5eaf4d;
					border: 3px solid #5eaf4d;
					line-height: 250%;
					margin: 25px auto;
				}
				
				.btn {
					background-color: #5eaf4d;
					border-radius: 14px;
					height: 50px;
					width: 200px;
					font-size: 18px;
					margin-top: 70px;
					color: white;
				}

				.btn:hover {
					background-color: forestgreen;
				}

				.pourquoi {
					box-sizing: content-box;
					width: 100%;
					background-color: #5eaf4d;
					position: relative;
				}

				.les3 {
					display: flex;
					flex-direction: column;
					width: 100%;
					justify-content: space-around;
				}

				.les {
					width: 100%;
					text-align: center;
					color: white;
				}
				.les p{
					margin-bottom: 100px;
				}
				.les h2{
					margin-top: 2vh!important;
				}
				.intro {
					display: grid;
					grid-template-rows: 1fr 1fr;
					grid-template-columns: 1fr 1fr;
					grid-template-areas:
						"choisir foire"
						"support revendeur";
					width: 100%;
					position: relative;
					margin-top: 1vh;
				}

				.choisir {
					grid-area: choisir;
					/* background-color: red; */
					text-align: left;
					color: #228B22;
				}

				.foire {
					grid-area: foire;
					/* background-color: orange; */
					color: #228B22;
				}

				.support {
					grid-area: support;
					/* background-color: yellow; */
					color: #228B22;
				}

				.revendeur {
					grid-area: revendeur;
					/* background-color: green; */
					color: #228B22;
				}

				.footer {
					display: flex;
					flex-direction: column;
					width: 100%;
					background-color: #228B22;
					position: relative;
				}
				.footer1 img{
					width: 20%;
					margin: 0 40%;
				}
				.f2 {
					color: white;
					margin-top: 30px;
					font-size: 12px;
					display: none;
				}

				.f3 div {
					font-size: 25px;
					width: 60%;
					margin: 10px auto;
					text-align: center;
				}

				.footer a {
					text-decoration: none;
					color: white;
				}

				.f4 {
					margin: 10px auto;
					height: 50px;
					width: 100px;
					background-color: #5eaf4d;
					border-radius: 10px;
					font-size: 22px;
					text-align: center;
					line-height: 50px;
				}
				.footer a:hover {
					color: yellow;
				}
				.footer5{
					display: none!important;
				}
			}
		</style>
	</head>
	<body>
		<div class="top-nav">
			<a href="" style="margin-left: calc(100% / 12);background-color: white;"><img
					src="img/Capture_d_écran_2021-09-29_à_11.34.09-removebg-preview.png" style="height: 100px;"></a>
			<a href="" class="top1" style="line-height: 40px;transform: translateY(15%)">Pourquoi Greendow</a>
			<a href="">FAQ</a>
			<a href="">Acheter</a>
			<a href="" class="top2">Connexion</a>
			<a href="">Support</a>
		</div>


		<div class="header">
			<a href="#" class="head">
				<p id="h1"><b>Green<span style="color: #5eaf4d;">dow</span></b>
				</p>
				<p id="h2"><b>Votre&emsp;fenêtre&emsp;connectée</b></p>
				<p id="h3">
					<b>Decouvrez Greendow</b>
				</p>
			</a>
		</div>


		<div class="pourquoi">
			<div style="font-size: 50px;text-align: center;color: white;margin-bottom: 100px;">Pourquoi
				Greendow?</div>
			<div class="les3">
				<div class="les">
					<div><img src=" img/Fonctionnalités.svg"></div>
					<h2 style="margin-top: 80px;font-size: 30px;">fonctionnalité</h2>
					<p style="margin-top: 50px;font-size: 20px;">Avez un contrôle total <br>sur votre fenêtre et sa
						<br>configuration
					</p>
				</div>
				<div class="les" >
					<div><img src=" img/Avantages.svg"></div>
				<h2 style="margin-top: 80px;font-size: 30px;">Avantages</h2>
				<p style="margin-top: 50px;font-size: 20px;">Avez un contrôle total <br>sur votre fenêtre et sa
					<br>configuration
				</p>
			</div>
			<div class="les">
				<div><img src=" img/sécurité.svg"></div>
				<h2 style="margin-top: 80px;font-size: 30px;">Sécurité</h2>
				<p style="margin-top: 50px;font-size: 20px; ">Nos fenêtre sont <br> sécurisées afin que vous
					<br>puissiez
					avoir
					l'esprit tranquille</p>
			</div>
		</div>
		</div>

		<div class="intro">
			<div class="choisir">
				<h2 style="margin: 165px 0 0 calc(100% / 9);font-size:30px">Pourquoi choisir Greendow</h2>
				<p style="margin: 30px 0 0 calc(100% / 9);font-size:15px">Greendow améliore la quqlité de votre air
					intérieur,
					limitant ainsi les problèmes
					<br>respiratoires liés à la pollution.
				</p>
				<a href="#" style="margin: 30px 0 0 calc(100% / 9)">En savoir plus &gt;</a>
			</div>
			<div class="foire">
				<h2 style="margin: 165px 0 0 calc(100% / 9);font-size:30px">Foire aux questions</h2>
				<p style="margin: 30px 0 0 calc(100% / 9);font-size:15px">Avez-vous une question? Retrouvez nos réponses
					aux
					question fréquemment
					<br>posées sur le fonctionnement de notre fenêtre Greendow
				</p>
				<a href="#" style="margin: 30px 0 0 calc(100% / 9)">FAQ &gt;</a>
			</div>
			<div class="support">
				<h2 style="margin: 50px 0 0 calc(100% / 9);font-size:30px">Support</h2>
				<p style="margin: 30px 0 0 calc(100% / 9);font-size:15px">Vous avez acheté une fenêtre Greendow et vous
					avez
					besoin d'aide concermant le
					fonctionnement de Greendow ou son installation? Notre support technique se fera
					<br>un plaisir de vous répondre.
				</p>
				<a href="#" style="margin: 50px 0 0 calc(100% / 9)">Contacter le support &gt;</a>
			</div>
			<div class="revendeur">
				<h2 style="margin: 50px 0 0 calc(100% / 9);font-size:30px">Trouver un revendeur</h2>
				<p style="margin: 30px 0 0 calc(100% / 9);font-size:15px">Nos fenêtre Greendow sont commercialiées
					paetout en
					France. Trouvez un
					<br>revendeur proche de chez vous
				</p>
				<a href="#" style="margin: 50px 0 0 calc(100% / 9)">Liste des revendeur &gt;</a>
			</div>

		</div>
		<div class="footer">
			<div class="footer1"><input type="image" src="./img/EPA%20rogné.png"
				style="height:200px;margin:35px 0 0 -30px" /></div>
			<div class="col-f f2">
				Lorem ipsum dolor sit amet, consectetur <br>
				adipiscing elit, sed do eiusmod tempor <br>
				incididunt ut labore et dolore magna aliqua. <br>
				Ut enim ad minim veniam, quis nostrud <br>
				exercitationullamco laboris nisi ut aliquip <br>
				ex ea commodoconsequat. Duis aute irure dolor <br>
				in reprehenderit in voluptate velit esse cillum <br>
				dolore eu fugiatnulla pariatur. Excepteur sint <br>
				occaecat cupidatat non proident, sunt in culpa <br>
				qui officia deserunt mollit anim id est laborum.
			</div>
			<div class="col-f f3">
				<div><a href="#">Qui sommes-nous?</a></div>
				<div><a href="#">FAQ Assistance</a></div>
				<div><a href="#">Mentions légales CGU</a></div>

			</div>
			<div class="col footer4">
				<div class="f4">
					<a href="mailto:Xqy1402494129@gmil.com">Contact</a>
				</div>
			</div>
			<div class="col-f f3">
				<img src="img/Capture_d_écran_2021-09-29_à_11.34.09-removebg-preview.png"
					style="height:130px;margin:40px 0 0 40px">
			</div>
		</div>
	</body>
</html>
