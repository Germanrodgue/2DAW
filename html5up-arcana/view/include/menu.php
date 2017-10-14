
	
					<nav id="nav">
						<ul>
						<?php

						if (!isset($_GET['module'])) {
							?>
							<li  class="current"><a href="<?php amigable('?module=homepage');?>">Home</a></li>

							<li ><a href="<?php amigable('?module=photosbackend&function=form_photos');?>">Formulario</a></li>

							<li ><a href="<?php amigable('?module=photosfrontend&function=list_photos');?>">List</a></li>

<?php
						} else {
							if ($_GET['module']==="homepage"){
									?>
										<li class="current" ><a href="<?php amigable('?module=homepage');?>">Home</a></li>

										<li><a href="<?php amigable('?module=photosbackend&function=form_photos');?>">Formulario</a></li>

										<li ><a href="<?php amigable('?module=photosfrontend&function=list_photos');?>">List</a></li>



									<?php
								}elseif ($_GET['module']==="photosbackend"){
									?>
										<li ><a href="<?php amigable('?module=homepage');?>">Home</a></li>

										<li class="current" ><a href="<?php amigable('?module=photosbackend&function=form_photos');?>">Formulario</a></li>

										<li ><a href="<?php amigable('?module=photosfrontend&function=list_photos');?>">List</a></li>

									<?php
								} elseif ($_GET['module']==="photosfrontend") {
									?>
										<li  ><a href="<?php amigable('?module=homepage');?>">Home</a></li>

										<li><a href="<?php amigable('?module=photosbackend&function=form_photos');?>">Formulario</a></li>

										<li class="current"><a href="<?php amigable('?module=photosfrontend&function=list_photos');?>">List</a></li>

									<?php

								}
						}

						?>
						</ul>
					</nav>

			</div>
