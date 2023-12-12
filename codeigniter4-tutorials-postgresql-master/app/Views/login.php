<?php
include 'common/head.php';
include 'common/navbar.php';
echo '<script type="text/javascript">var base_url = "'.base_url().'";</script>'
?>

<div class="container mt-5">
	<div class="row justify-content-center">
		<div class="col-md-5">
			<div id="form-login" class="mt-3 mb-5">
				<form method="post" enctype="multipart/form-data" id="form-login-user" name="form-login-user" accept-charset="utf-8">
					<div class="row">
						<div class="col-md-12">
							<img class="img-fluid" src="" width="50">
						</div>
					</div>
					<fieldset>
						<legend class="text-center mb-4"> Inicio de Sesión </legend>
						<div id="div-cnt-login" class="row p-3">
							<div class="col-12" id="div-cnt-msg-login"></div>
							<div class="col-md-12">
								<div class="form-group input-group">
									<span class="has-float-label">
										<input type="email" class="form-control float-form" placeholder=" " required="required" autocomplete="off" id="email" name="txt-email"/>
										<label for="email">Usuario</label>
										<i class="fa fa-user form-control-feedback"></i>
									</span>
								</div>
							</div>
							
							<div class="col-md-12">
								<div class="form-group input-group">
									<span class="has-float-label">
										<input type="password" placeholder=" " class="form-control float-form" id="password" name="txt-password" size="30" autocomplete="off">
										<label for="password">Contraseña</label>
										<i id="icon-eye" class="fa fa-eye-slash form-control-feedback btn-show-passwd" data-passwd="password"></i>
									</span>
								</div>
							</div>
							<div class="col-md-12">
								<button type="submit" class="btn btn-primary btn-block" name="btn-login" id="btn-login">
									<i class="fa fa-sign-in"></i> Iniciar sesión 
								</button>
							</div>
							<div class="col-md-12 mt-3 mb-2">
								<a class="float-right text-muted" href="#" id="a-to-recover-passwd">
									Recupear contraseña? <i class="fa fa-chevron-right"></i>
								</a>

								<a href="#" id="a-cnt-register"><i class="fa fa-plus"></i> Registráte</a>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
			
			<div style="display: none;" id="form-olvidado" class="mt-5 mb-5">
				<form method="post" enctype="multipart/form-data" id="form-recover-passwd" name="form-recover-passwd" accept-charset="utf-8">
					<fieldset>
						<legend class="text-center mb-4">¿Olvidaste la contraseña?</legend>
						<div class="row p-3">
							<div class="col-md-12">
								<p class="help-block text-justify">
									Ingresa tu correo electrónico y se te enviará una contraseña temporal para reestablecer tu acceso.
								</p>
							</div>
							<div class="col-md-12" id="div-msg-recover-passwd"></div>

							<div class="col-md-12">
								<div class="form-group mt-1">
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<span><i class="fa fa-user"></i></span>
											</div>
										</div>
										<input type="email" class="form-control" name="txt-email-recover" id="txt-email-recover" placeholder="Correo electrónico" required="">
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<button type="submit" class="btn btn-primary btn-block" id="btn-recover-passwd" name="btn-recover-passwd">
									<i class="fa fa-floppy-o"></i> Continuar
								</button>
								<div class="d-flex justify-content-between rememberme mt-3">
									<a class="text-muted" href="#" id="a-cnt-forget-login">
										<i class="fa fa-chevron-left"></i> 
										Iniciar sesión
									</a>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			</div>

			<div style="display: none;" id="div-cnt-register" class="mt-5 mb-5">
				<form method="post" enctype="multipart/form-data" id="singup" name="singup" accept-charset="utf-8">
					<fieldset>
						<legend class="text-center mb-4">Crear cuenta</legend>
						<div class="row p-3">
							<div class="col-12" id="div-cnt-msg-singup"></div>
							<div class="col-md-12">
								<div class="form-group input-group">
									<span class="has-float-label">
										<input type="text" class="form-control" id="txt-nom-user" name="txt-nom-user" placeholder=" " required="" autocomplete="off" placeholder=" ">
										<label for="txt-nom-user">Nombre completo</label>
										<i class="fa fa-user form-control-feedback"></i>
									</span>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group input-group">
									<span class="has-float-label">
										<input type="email" class="form-control" id="txt-email" name="txt-email" placeholder=" " required="" autocomplete="off">
										<label for="txt-email">Email</label>
										<i class="fa fa-at form-control-feedback"></i>
									</span>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group input-group">
									<span class="has-float-label">
										<input type="password" class="form-control" id="txt-password" name="txt-password" placeholder=" " required="required" maxlength="26" autocomplete="off">
										<label for="txt-password">Contraseña</label>
										<i class="fa fa-eye-slash form-control-feedback btn-show-passwd" data-passwd="txt-password"></i>
									</span>
								</div>
							</div>
							<div class="col-md-12">
								<button type="submit" class="btn btn-primary btn-block" id="btn-singup" name="btn-singup">
									<i class="fa fa-check"></i> Registrarse
								</button>
							</div>

							<div class="col-md-12 mb-2 mt-3">
								<a class="text-muted" href="#" id="a-cnt-login">
									<i class="fa fa-chevron-left"></i> Iniciar sesión
								</a>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>

<script src="<?=base_url('assets/app/ajax/ajxlogin.js');?>"></script>
<script type="text/javascript">
	$(document).ready(function() {
		
	});
</script>

<?php
include 'common/foot.php';
mostrarMensaje();
?>