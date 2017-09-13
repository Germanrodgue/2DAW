
				<!-- Nav -->
					<nav id="nav">
						<ul>
						<?php


						if ($_GET['module']==="homepage"){
								?>
									<li  class="current"><a href="index.php?module=homepage">Home</a></li>

									<li ><a href="index.php?module=photos">CRUD</a></li>


								<?php
							}

						if ($_GET['module']==="photos"){
								?>
									<li ><a href="index.php?module=homepage">Home</a></li>

									<li class="current" ><a href="index.php?module=photos">CRUD</a></li>
								<?php
							}
						?>
						</ul>
					</nav>

			</div>
