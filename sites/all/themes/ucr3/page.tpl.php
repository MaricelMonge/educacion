<?php

	$arriba = render($page['arriba']);
	$header_left = render($page['header_left']);
	$titulo_izquierda_arriba = render($page['titulo_izquierda_arriba']);
	$header_center = render($page['header_center']);
	$header_right = render($page['header_right']);
	$banner_principal = render($page['banner_principal']);
	$banner_sobre_ruta = render($page['banner_sobre_ruta']);
	$ruta = render($page['ruta']);
	$bajo_ruta = render($page['bajo_ruta']);
	$logo = render($page['logo']);
	$left = render($page['left']);
	$izquierda_arriba = render($page['izquierda_arriba']);
	$izquierda_abajo = render($page['izquierda_abajo']);
	$logo_banner = render($page['logo_banner']);
	$arriba_izquierda = render($page['arriba_izquierda']);
	$arriba_centro = render($page['arriba_centro']);
	$arriba_derecha = render($page['arriba_derecha']);
	$centro_arriba = render($page['centro_arriba']);
	$centro_abajo = render($page['centro_abajo']);
	$content = render($page['content']);
	$right = render($page['right']);
	$derecha = render($page['derecha']);
	$pie_derecha = render($page['pie_derecha']);
	$footer = render($page['footer']);
	$pie = render($page['pie']);
	$abajo = render($page['abajo']);
	$abajo_centro = render($page['abajo_centro']);
	$page_top = render($page['page_top']);
	$page_bottom = render($page['page_bottom']);
	
	$texto_titulo = theme_get_setting('texto_titulo');
	$firma_grande = theme_get_setting('firma_grande');
	if($firma_grande != "si")
		$class_desplazado = " class=\"desplazado\"";
	else
		$class_desplazado = "";
	$columna_izquierda = false;
	$columna_derecha = false;
	$AZUL = false;
	$BLANCO = false;
	$con_izquierda = "";
	$con_derecha = "";
	if ($left != "" || $izquierda_abajo != "")
	{
		$columna_izquierda = true;
		$con_izquierda = " con-IZQUIERDA";
	}
	if($right != "")
	{
		$columna_derecha = true;
		$con_derecha = " con-DERECHA";
	}
	
	$COLOR = theme_get_setting('color');
	switch($COLOR)
	{
		case "azul": $AZUL = true; break;
		case "blanco": $BLANCO = true; break;
	}
	
	$UBICACION_WEB = $GLOBALS['base_url']."/";
	$PLANTILLA = path_to_theme();//base_path().path_to_theme();
	$COMPRIMIR = "";
	$XX_LARGE = 2586;
	$X_LARGE = 2585;
	$LARGE = 1348;
	$MEDIUM = 1145;
	$TABLETA = 1024;
	$HD_CEL = 640;
	$CEL = 392;

?>
<a name="up" id="up"></a>
	<div id="marco-principal"<?php echo $class_desplazado; ?>>   

		<?php if($arriba) : ?>
		<div class="divisor_encabezado">
		<?php echo $arriba; ?>
		</div> <!-- divisor_encabezado -->			
		<?php endif; ?>	<!-- arriba -->
			
		<div id="encabezado"<?php echo $class_desplazado; ?>>
			<div class="contenido-interno">
				<?php echo $header_left; ?>
				<?php echo $arriba_izquierda; ?>
				<div id="firma" class="izquierda"><a href="http://www.ucr.ac.cr/" id="firma-ucr" title="Universidad de Costa Rica - Página principal"><span>Universidad de Costa Rica</span></a></div>
				<?php if($logo != "") : ?>
				<div class="logo">
					<?php echo "<img src=\"".$logo."\" style=\"max-height:80px\"/>"; ?>
				</div>	
				<?php elseif($texto_titulo == "si") : ?>
				<div class="logo"><?php echo $site_name; ?></div>
				<?php endif; ?> <!-- logo -->
				<?php if($header_center != "" || $arriba_centro != "") : ?>				
				<div class="centro">				
					<?php echo $header_center; ?>
					<?php echo $arriba_centro; ?>
				</div>
				<?php endif; ?>				
				<div class="derecha" id="menus-iconos-funciones">
					<?php echo $header_right; ?>
					<?php echo $arriba_derecha; ?>
				<div class="movil"><a class="mostrar-menu"><img src="<?php echo $UBICACION_WEB.$PLANTILLA; ?>/imagenes/menu.png" alt="Mostrar Enlaces" title="Mostrar Enlaces" /></a></div>
				</div> <!-- arriba-derecha -->
			</div> <!-- contenido-interno -->
		</div>	<!-- encabezado -->	
		
		<?php 
			$class_menu	= "";
			if($centro_arriba == "")
			{
				if($class_desplazado == "")
					$class_menu	= " class=\"sin-menu\"";
				else
					$class_desplazado	= " class=\"desplazado sin-menu\"";
			}
			
		?>
		<div id="centro-arriba"<?php echo $class_desplazado.$class_menu; ?>>			
			<div id="menus-principales">
				<div class="contenido-interno">
				<?php echo $centro_arriba ?>
				</div>
			</div>
		</div>
		<div id="inicio-contenidos"></div><!-- CENTRO_ARRIBA -->	
		<?php if($banner_principal != "") : ?>
		<div class="banner_principal">
		<?php echo $banner_principal ?>
		</div>
		<?php endif; ?>
		<!-- BANNER_ARRIBA -->	
		<div id="contenidos" class="contenido-interno">
			<?php if($left != "" || $izquierda_abajo) : ?>
			<div class="columna-izquierda lateral" id="columna-izquierda">					
				<?php echo $left.$izquierda_abajo; ?>
			</div> <!-- columna_izquierda -->
			<?php endif; ?>			

			<div class="columna-principal<?php echo $con_izquierda.$con_derecha; ?>" id="columna-principal">
			<?php if($banner_sobre_ruta != "") : ?>
			<div class="banner_sobre_ruta">
			<?php echo $banner_sobre_ruta; ?>
			</div>
			<?php endif; ?>
			<div class="borde">
				<div class="ruta">
					<nobr><?php echo $breadcrumb; ?>&nbsp;<div class="breadcrumb"></div></nobr>
				</div>
				<?php if($bajo_ruta != "") : ?>
				<div class="bajo-ruta">
					<?php echo $bajo_ruta; ?>
				</div>
				<?php endif; ?>
				<div class="divisor">&nbsp;</div>
				<h1 class="title"></h1>
				<div class="tabs"><?php echo render($tabs); ?></div>
				<?php if ($show_messages) { echo $messages; } ?>
				<?php echo $content; ?>
			</div> <!-- columna_principal -->
			</div><!-- centro -->
			
			<?php if($right) : ?>
			<div class="columna-derecha lateral" id="columna-derecha">
				<?php echo $right; ?>
			</div> <!-- columna_derecha -->
			<?php endif; ?>

			<?php if($feed_icons) : ?>
			<div class="suscripciones">
				<?php echo $feed_icons; ?>
			</div>
			<?php endif; ?>
		</div>  <!-- contenidos -->
		
		<?php  if($pie_derecha != "" || $footer != "") : ?>
		<div id="pie-pagina">
			<div class="contenido-interno" >
			<?php  if($footer != "") : ?>
			<div class="izquierda">
				<?php echo $pie_derecha; ?>
			</div>	
			<?php endif; ?>
			<?php if($pie_derecha != "") : ?>
			<div class="derecha">
				<?php echo $pie_derecha; ?>
			</div>
			<?php endif; ?>
			</div>
		</div>
		<?php endif; ?>	<!-- pies --> 	
    </div> <!-- marco-principal -->	
	
	<?php if($abajo != "") : ?>
	<div class="divisor_inferior">
		<?php echo $abajo; ?>
	</div> <!-- divisor_inferior -->		
	<?php endif; ?>	<!-- abajo -->	
	<?php echo $page_bottom ?>	
	<a name="down" id="down"></a>
