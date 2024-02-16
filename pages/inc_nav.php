 <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
							
							<?php if($tipo_usuario == 1) { ?>
								
								<div class="sb-sidenav-menu-heading">Afiliaciones</div>
								<!-- ///////////// -->
									<a class="nav-link collapsed" href="#" data-toggle="collapse" 						data-target="#afiliaciones" aria-expanded="false" aria-controls="afiliaciones">
										<div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                		Afiliados
                                		<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>		
									</a>
										<div class="collapse" id="afiliaciones" aria-labelledby="headingOne" 		data-parent="#sidenavAccordion">
											<nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="ver_afiliados.php">Ver afiliados</a><a class="nav-link" href="nuevo_afiliado.php">Agregar Afiliado</a></nav>
                            			</div>
										<a class="nav-link collapsed" href="#" data-toggle="collapse" 						data-target="#informes" aria-expanded="false" aria-controls="informes">
										<div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                		Informes
                                		<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>		
									</a>
										<div class="collapse" id="informes" aria-labelledby="headingOne" 		data-parent="#sidenavAccordion">
											<nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="#">1</a><a class="nav-link" href="#">2</a></nav>
                            			</div>
								<!-- ///////////// -->
								<div class="sb-sidenav-menu-heading">Aportes</div>
                             <a class="nav-link" href="estados_cuentas.php"
							><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
							Estado de Cuentas</a>
							<a class="nav-link collapsed" href="#" data-toggle="collapse" 						data-target="#informes" aria-expanded="false" aria-controls="informes">
										<div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                		Informes
                                		<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>		
									</a>
										<div class="collapse" id="informes" aria-labelledby="headingOne" 		data-parent="#sidenavAccordion">
											<nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="#">1</a><a class="nav-link" href="#">2</a></nav>
                            			</div>

							<!-- ///////////// -->
							<div class="sb-sidenav-menu-heading">Tesoreria</div>
                             <a class="nav-link" href="acientos.php"
							><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
							Acientos</a>
							<a class="nav-link" href="libro_mayor.php"
							><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
							Libro Mayor</a>
							<a class="nav-link" href="liquidacion_sueldos.php"
							><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
							Sueldos</a>

							<!-- ///////////// -->
							<div class="sb-sidenav-menu-heading">Camping</div>
                             <a class="nav-link" href="agenda_camping.php"
							><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
							Agenda</a>
							<a class="nav-link" href="cargo_extra.php"
							><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
							Cargos Extra</a>

							<!-- ///////////// -->
							<div class="sb-sidenav-menu-heading">Proveduria</div>
                             <a class="nav-link" href="ventas_proveduria.php"
							><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
							Venta</a>
							<a class="nav-link" href="stock_proveduria.php"
							><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
							Stock</a>
								
								
										
							<?php } ?>
									
						</div>

					</div>
			
        	        <div class="sb-sidenav-footer">
                        <div class="small">YOCAFI</div>
                        Plataforma de Gestion de Afiliados o Socios
					</div>
				</nav>
			</div>