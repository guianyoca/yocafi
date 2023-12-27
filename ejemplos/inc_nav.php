 <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <!-- <a class="nav-link" href="index.html"
							><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                DSS</a
							> -->
							
							<?php if($tipo_usuario == 1) { ?>
								
								<div class="sb-sidenav-menu-heading">Instructor</div>
								<a class="nav-link" href="turno_nuevo.php"
							><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
								SIS Fechas</a>
								
								<a class="nav-link" href="total_aptos_medicos.php"
							><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
								Aptos Médicos</a>
								
								<a class="nav-link" href="turno_manual.php"
							><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
								Cargar Turno</a>

								<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Asistencia
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="asistencia_dia.php">Del Dia</a><a class="nav-link" href="turnos_cancelados.php">Cancelados</a><a class="nav-link" href="asistencias.php">Totales</a></nav>
                            </div>

                             <a class="nav-link" href="usuarios.php"
							><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
								Usuarios</a>
								
							<a class="nav-link" href="blanquear_clave.php"
							><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
								Blanquear Clave</a>	
								
										
							<?php } ?>
							
							<div class="sb-sidenav-menu-heading">Afiliado</div>
							<!-- <a class="nav-link" href="estado.php"
							><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
								Mi estado</a> -->

								

								<a class="nav-link" href="apto_medico.php"
							><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
								Apto Médico</a>

									<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#turnos_dis" aria-expanded="false" aria-controls="turnos_dis"
                                ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Turnos GYM
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="turnos_dis" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="turnos_gym.php">Turnos Disponibles</a><a class="nav-link" href="mis_turnos.php">Mis Turnos</a></nav>
                            </div>
									
							</div>

					</div>
                    <div class="sb-sidenav-footer">
                        <div class="small">DSS</div>
                        División Servicios Sociales
					</div>
				</nav>
			</div>