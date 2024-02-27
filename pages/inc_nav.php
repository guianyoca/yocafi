<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
							
							<?php if($tipo_usuario == 1 || $tipo_usuario == 2 || $tipo_usuario == 23 || $tipo_usuario == 25) { ?>
								
								<div class="sb-sidenav-menu-heading">Afiliaciones</div>
								<!-- ///////////// -->
									<a class="nav-link collapsed" href="#" data-toggle="collapse" 						data-target="#afiliaciones" aria-expanded="false" aria-controls="afiliaciones">
										<div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                		Afiliados
                                		<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>		
									</a>
										<div class="collapse" id="afiliaciones" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
											<nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="ver_afiliados.php">Ver afiliados</a><a class="nav-link" href="nuevo_afiliado.php">Agregar Afiliado</a></nav>
                            			</div>
										<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#informes_afiliaciones" aria-expanded="false" aria-controls="informes_afiliaciones">
										<div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                		Informes
                                		<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>		
									</a>
										<div class="collapse" id="informes_afiliaciones" aria-labelledby="headingOne	data-parent="#sidenavAccordion">
											<nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="estadisticas_afiliados.php">Estadisticas</a><a class="nav-link" href="resumen_afiliados.php">Resumen de Afiliados</a></nav>
                            			</div>
                            			<?php } ?>
								<!-- ///////////// -->
								<?php if($tipo_usuario == 1 || $tipo_usuario == 3 || $tipo_usuario == 23) { ?>
								<div class="sb-sidenav-menu-heading">Aportes</div>
                             <a class="nav-link" href="estados_cuentas.php"
							><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
							Estado de Cuentas</a>
							<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#informes_aportes" aria-expanded="false" aria-controls="informes_aportes">
										<div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                		Informes
                                		<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>		
									</a>
										<div class="collapse" id="informes_aportes" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
											<nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="#">1</a><a class="nav-link" href="#">2</a></nav>
                            			</div>
                                    <?php } ?>
							<!-- ///////////// -->
							<?php if($tipo_usuario == 1 || $tipo_usuario == 4) { ?>
							<div class="sb-sidenav-menu-heading">Tesoreria</div>
							<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#comprobantes" aria-expanded="false" aria-controls="comprobantes">
										<div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                		Comprobantes
                                		<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>		
									</a>
										<div class="collapse" id="comprobantes" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
											<nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="comprobantes_dia.php">Del dia</a><a class="nav-link" href="comprobantes_todos.php">Todos</a></nav>
                            			</div>
                             <a class="nav-link" href="contabilidad.php"
							><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
							Acientos</a>
							<a class="nav-link" href="libro_mayor.php"
							><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
							Libro Mayor</a>
							<a class="nav-link" href="#"
							><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
							Sueldos</a>
                                <?php } ?>
							<!-- ///////////// -->
							<?php if($tipo_usuario == 1 || $tipo_usuario == 5 || $tipo_usuario == 25) { ?>
							<div class="sb-sidenav-menu-heading">Camping</div>
                             <a class="nav-link" href="#"
							><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
							Agenda</a>
							<a class="nav-link" href="#"
							><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
							Cargos Extra</a>
                                <?php } ?>
							<!-- ///////////// -->
							<?php if($tipo_usuario == 1 || $tipo_usuario == 6) { ?>
							<div class="sb-sidenav-menu-heading">Proveduria</div>
                             <a class="nav-link" href="#"
							><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
							Venta</a>
							<a class="nav-link" href="#"
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