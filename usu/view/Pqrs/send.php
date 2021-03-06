<link rel="stylesheet" type="text/css" href="styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
<!-- Home -->

<div class="home">
	<div class="home_background_container prlx_parent">
		<div class="home_background prlx" style="background-image:url(images/PQRS.jpg)"></div>
	</div>
</div>

<div class="container">
	<!-- Contact -->
	<div class="contact">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">

					<!-- Contact Form -->
					<div class="contact_form">
						<div class="contact_title">Radica tu PQRSF</div>
						<?php
						if (isset($_SESSION['mensaje'])) {
						?>
							<div class="alert alert-success mt-4 alert-dismissible fade show" id="alerta" role="alert">
								<?= $_SESSION['mensaje'] ?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						<?php
							unset($_SESSION['mensaje']);
						}
						?>
						<div class="contact_form_container">
							<form action="<?php echo getUrl("Pqrs", "Pqrs", "postSend"); ?>" method="POST">
								<?php
								if (isset($_SESSION['user_id'])) {
								?>
									<div class="row">
										<input class="input_field contact_form_name col-md-4" name="nombre" type="text" value="<?php echo $_SESSION['nombre']; ?> <?php echo $_SESSION['apellidos']; ?>" required="required" data-error="Se requiere el nombre.">
										<input type="hidden" name="usu_id" value="<?php echo $_SESSION['user_id']; ?>">
										<!-- <input type="hidden" name="pqrsf_fecha"> -->
										<input class="input_field contact_form_email col-md-4 mx-1" name="correo" type="email" value="<?php echo $_SESSION['correo']; ?>" required="required" data-error="Valid email is required.">
										<select id="contact_form_message" required="required" data-error="Complete este campo." class="input_field col-md-3" name="tipopqrsf">
											<option value="">Seleccione</option>
											<?php
											foreach ($tipoPQRSF as $tpq) {
												echo "<option value='" . $tpq['cod_pqrsf_tipo'] . "'>" . $tpq['desc_pqrsf_tipo'] . "</option>";
											}
											?>
										</select>
										<textarea id="contact_form_message" class="text_field contact_form_message" name="pqrsf_desc" placeholder="Radique aqu?? su PQRSF" required="required" data-error="Por favor escribe el asunto."></textarea>
									</div>
								<?Php
								}
								?>
								<button id="contact_send_btn" type="submit" class="contact_send_btn trans_200" value="Enviar">Radicar</button>
							</form>
						</div>
					</div>

				</div>

				<div class="col-lg-4">
					<div class="about">
						<div class="about_title">??Qu?? son los PQRSF?</div>
						<p class="about_text">Las PQRSF son las solicitudes, quejas, reclamos, sugerencias y felicitaciones que los usuarios pueden enviar de manera escrita a trav??s de los canales de contacto de PQRSF</p>

						<div class="contact_info">
							<ul>
								<li class="contact_info_item">
									<div class="contact_info_icon">
										<img src="images/smartphone.svg" alt="https://www.flaticon.com/authors/lucy-g">
									</div>
									+57 2 4315800.
								</li>
								<li class="contact_info_item">
									<div class="contact_info_icon">
										<img src="images/envelope.svg" alt="https://www.flaticon.com/authors/lucy-g">
									</div>senatelgestion@gmail.com
								</li>
							</ul>
						</div>

					</div>
				</div>

			</div>

			<!-- Google Map -->

			<div class="row">
				<div class="col">
					<div id="google_map">
						<p><b>Visita nuestras instalaciones.</b></p>
						<div class="map_container">
							<center>
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.6684695040644!2d-76.49362068524188!3d3.430634397502953!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e30a71a83f469d3%3A0xeb602ca40963938!2sSena%20Pondaje!5e0!3m2!1ses-419!2sco!4v1631251912479!5m2!1ses-419!2sco" width="1000" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
							</center>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>