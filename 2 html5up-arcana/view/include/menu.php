
				<!-- Nav -->
					<nav id="nav">
						<ul>
						<?php

						if (!isset($_GET['module'])) {
							?>
							<li  class="current"><a href="index.php?module=homepage">Home</a></li>

							<li ><a href="index.php?module=photos&view=create_photos">Formulario</a></li>
<?php
						} else {
							if ($_GET['module']==="homepage"){
									?>
										<li  class="current"><a href="index.php?module=homepage">Home</a></li>

										<li ><a href="index.php?module=photos&view=create_photos">Formulario</a></li>


									<?php
								}elseif ($_GET['module']==="photos"){
									?>
										<li ><a href="index.php?module=homepage">Home</a></li>

										<li class="current" ><a href="index.php?module=photos&view=create_photos">Formulario</a></li>
									<?php
								} else {
									?>
										<li  class="current" ><a href="index.php?module=homepage">Home</a></li>

										<li><a href="index.php?module=photos&view=create_photos">Formulario</a></li>
									<?php

								}
						}

						?>
						</ul>
					</nav>

			</div>
