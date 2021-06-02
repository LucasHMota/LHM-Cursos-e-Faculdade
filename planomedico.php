<!DOCTYPE HTML>
<!--
	Phantom by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Faça sua consulta conosco</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">

							<!-- Logo -->
								<a href="planomedico.php" class="logo">
									<span class="symbol"><center><img src="unimed.png" width="500" height="250" alt="" /></span><span class="title"><center>Faça seu orçamento abaixo</span>
								</a>
						</div>
					</header>

				<!-- Main -->
					<div id="main">
						<div class="inner">
							<br><br><br><br>
							<h1><center>Preencha com seus dados</center></h1>

							<!-- Form -->
							<section>
									<form method="POST" action="recebeplanomedico.php">
										<div class="row gtr-uniform">
											<div class="col-6 col-12-xsmall">
												<input type="text" name="nome" id="nome" value="" placeholder="Nome Completo" />
											</div>
											<div class="col-6 col-12-xsmall">
												<input type="text" name="idade" id="idade" value="" placeholder="Idade" />
											</div>
											<div class="col-12">
												<select name="plano" id="plano">
													<option value="">Categoria de plano desejada</option>
													<option name="Enfermaria">Enfermaria</option>
													<option name="Apartamento">Apartamento</option>
												</select>
											</div>
										</div>
									<ul class="actions">
										<li><input type="submit" value="Confirmar" class="primary" /></li>
										<li><input type="reset" value="Cancelar" /></li>
									</ul>
							</section>
				<!-- Footer -->
				<center>
				<footer id="footer">
						<div class="inner">
							<section>

								<h2>Qualquer dúvida ligue para nosso escritório</h2>
								<h4>(xx)0898-4565<h4>
							</section>
							<section>
								<h2>Redes Sociais</h2>
								<ul class="icons">
									<li><a href="#" class="icon brands style2 fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="icon brands style2 fa-facebook-f"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="icon brands style2 fa-instagram"><span class="label">Instagram</span></a></li>
								</ul>
							</section>
							<ul class="copyright">
								<li>&copy; LUCAS HENRIQUE MOTA. All rights reserved</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
							</ul>
						</div>
					</footer>
				</center>
			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>