<!DOCTYPE html>
<html>
<head>
<?php 
	// Inicializando algunas variables:
	$texto_titulo = theme_get_setting('texto_titulo');
	$firma_grande = theme_get_setting('firma_grande');
	if($firma_grande != "si")
		$class_desplazado = " class=\"desplazado\"";
	else
		$class_desplazado = "";
	$AZUL = false;
	$BLANCO = false;
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
	
	$browser = $variables['browser'];
	if($browser['name'] == "msie" && floatval($browser['version']) >= 8 && floatval($browser['version']) < 9)
		$IE8 = true;
	else
		$IE8 = false;

?>
<title><?php echo $head_title; ?></title>
<?php echo $head ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link rel="image_src" href="<?php echo $UBICACION_WEB.$PLANTILLA; ?>/imagenes/firma-ucr-ico.png" />
<link rel="icon" href="<?php echo $UBICACION_WEB.$PLANTILLA; ?>/imagenes/ucr-favicon.png" type="image/png" />
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $UBICACION_WEB.$PLANTILLA; ?>/imagenes/ucr-favicon.ico" />
<?php echo $styles ?>
<?php echo $scripts ?>
<?php if($IE8) : ?>
<script language="javascript" type="text/javascript">
<!--
	var resolucion = '';	
	if (document.documentElement.offsetWidth <= <?php echo $MEDIUM; ?>)
		resolucion = 'medium';		
	else if (document.documentElement.offsetWidth <= <?php echo $LARGE; ?>)
		resolucion = 'large';
	else if (document.documentElement.offsetWidth <= <?php echo $X_LARGE; ?>)
		resolucion = 'x-large';
	else
		resolucion = 'xx-large';
-->
</script>
<?php endif; ?>
<?php
	echo "<link rel=\"stylesheet\" href=\"".$UBICACION_WEB.$PLANTILLA."/css/comun".$COMPRIMIR.".css\" />";
	if($AZUL)
		echo "<link rel=\"stylesheet\" href=\"".$UBICACION_WEB.$PLANTILLA."/css/azul".$COMPRIMIR.".css\" />";
	if($BLANCO)
		echo "<link rel=\"stylesheet\" href=\"".$UBICACION_WEB.$PLANTILLA."/css/blanco".$COMPRIMIR.".css\" />";
	if($IE8) /* IE 8 no soporta mediaquieries */
	{		
		echo "
	<script language=\"javascript\" type=\"text/javascript\">	
	document.write ('<link rel=\"stylesheet\" type=\"text/css\" href=\"".$UBICACION_WEB.$PLANTILLA."/css/comun-' + resolucion + '".$COMPRIMIR.".css\" />');
		</script>				
	<link rel=\"stylesheet\" href=\"".$UBICACION_WEB.$PLANTILLA."/css/ie8".$COMPRIMIR.".css\" />
		";
	}   /* FIN IE 8 */
	else
	{
		echo "
	<link rel=\"stylesheet\" media=\"screen and (min-width: ".($X_LARGE + 1)."px)\" href=\"".$UBICACION_WEB.$PLANTILLA."/css/comun-xx-large".$COMPRIMIR.".css\" />
	<link rel=\"stylesheet\" media=\"screen and (max-width: ".$X_LARGE."px) and (min-width: ".($LARGE + 1)."px)\" href=\"".$UBICACION_WEB.$PLANTILLA."/css/comun-x-large".$COMPRIMIR.".css\" />
	<link rel=\"stylesheet\" media=\"screen and (max-width: ".$LARGE."px) and (min-width: ".($MEDIUM + 1)."px)\" href=\"".$UBICACION_WEB.$PLANTILLA."/css/comun-large".$COMPRIMIR.".css\" />
	<link rel=\"stylesheet\" media=\"screen and (max-width: ".$MEDIUM."px)\" href=\"".$UBICACION_WEB.$PLANTILLA."/css/comun-medium".$COMPRIMIR.".css\" />
	<link rel=\"stylesheet\" media=\"screen and (max-width: ".$TABLETA."px)\" href=\"".$UBICACION_WEB.$PLANTILLA."/css/tableta".$COMPRIMIR.".css\" />
	<link rel=\"stylesheet\" media=\"screen and (width: ".$HD_CEL."px)\" href=\"".$UBICACION_WEB.$PLANTILLA."/css/cel-large".$COMPRIMIR.".css\" />
	<link rel=\"stylesheet\" media=\"screen and (max-width: ".($HD_CEL - 1)."px)\" href=\"".$UBICACION_WEB.$PLANTILLA."/css/cel-medium".$COMPRIMIR.".css\" />
	<link rel=\"stylesheet\" media=\"screen and (max-width: ".$CEL."px)\" href=\"".$UBICACION_WEB.$PLANTILLA."/css/cel-small".$COMPRIMIR.".css\" />
		";
	}

	echo "<link rel=\"stylesheet\" media=\"print\" href=\"".$UBICACION_WEB.$PLANTILLA."/css/comun-x-large".$COMPRIMIR.".css\" />";
?>
</head>

<body id="ucr">
	<?php echo $page_top; ?>
	<?php echo $page; ?>
	<?php echo $page_bottom; ?>
<?php if($IE8) : ?>
<script type="text/javascript" src="<?php echo $UBICACION_WEB.$PLANTILLA; ?>/js/raphael<?php echo $COMPRIMIR; ?>.js"></script>
<?php endif; ?>
<script type="text/javascript" src="<?php echo $UBICACION_WEB.$PLANTILLA; ?>/js/jquery.hoverIntent-1.6.0.js"></script>
<script language="javascript" type="text/javascript">
<!--
	
	function Tactil()
	{
		return (Modernizr.touch || Modernizr.testAllProps('pointerEvents'));
	}
	
	var escondidoMenuArriba = null;
	var abiertoMenuArriba = false;
	var abiertoMenuArribaInterno = false;  // Esta abierto un submenu
	var ultimoSubmenu = -1;
	var menuSuperiorGrande = true;
	var estadoAnteriorMenuSuperior = true;
	
	jQuery(document).ready(function() 
	{
		if(jQuery(window).width() <= <?php echo $HD_CEL; ?>)
		{
			menuSuperiorGrande = false;
			estadoAnteriorMenuSuperior = false;
			mostrarOpcionesBuscar = true;
		}
		
		jQuery.fn.slideFadeToggle = function(speed, easing, estado, callback) 
		{					
			return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback);
		};			
		
		function alternarMenuArriba(estado)
		{
			if(estado == 0 || (estado == -1 && abiertoMenuArriba === true) || (estado == 1 && abiertoMenuArriba === false))
			{
				if(jQuery(window).width() <= <?php echo $HD_CEL; ?>)
				{					
					jQuery('#centro-arriba').slideFadeToggle('fast', 'linear');
					if(escondidoMenuArriba === null)
					{
						if(estado == -1)
							escondidoMenuArriba = true;
						else
							escondidoMenuArriba = false;
					}
					else
						escondidoMenuArriba = !escondidoMenuArriba;
				}
				else
				{
					jQuery('#centro-arriba ul.menu ul').slideFadeToggle('fast', 'linear');
					abiertoMenuArriba = !abiertoMenuArriba;
				}
			}
		}
		
		function abrirMenuArriba()
		{
			alternarMenuArriba(1);
		}
		
		function cerrarMenuArriba()
		{
			alternarMenuArriba(-1);
		}

		jQuery('a.mostrar-menu').live('click', function () 
		{		
			alternarMenuArriba(0);
			if(abiertoMenuArribaInterno)
			{
				jQuery('#centro-arriba ul.menu ul').slideFadeToggle('fast', 'linear');
				abiertoMenuArribaInterno = !abiertoMenuArribaInterno;
			}
		});	
	
		AcondicionarMenus = function()
		{			
			if(jQuery(window).width() > <?php echo $HD_CEL; ?>)
			{
				if(ultimoSubmenu > -1)
				{
					jQuery('#centro-arriba ul.menu li.expanded').eq(ultimoSubmenu).children('ul.menu ul').slideFadeToggle('fast', 'linear');
					ultimoSubmenu = -1;
				}
				if(escondidoMenuArriba !== null && escondidoMenuArriba)
				{
					jQuery('#centro-arriba').slideFadeToggle('fast', 'linear');
					escondidoMenuArriba = false;
				}
				abiertoMenuArriba = false;				
				jQuery('#centro-arriba ul.menu li.expanded').unbind('click');
				jQuery('#centro-arriba ul.menu li.expanded').children().unbind('click');
				jQuery('#menus-principales').hoverIntent(abrirMenuArriba, cerrarMenuArriba);				
				jQuery('#marco-principal').removeClass('movil');				
			}
			else
			{
				if(escondidoMenuArriba !== null && !escondidoMenuArriba)
				{
					jQuery('#centro-arriba').slideFadeToggle('fast', 'linear');
					escondidoMenuArriba = true;
				}
				jQuery('#marco-principal').addClass('movil');
				jQuery('#menus-principales').unbind('mouseenter').unbind('mouseleave');
				jQuery('#centro-arriba ul.menu > li').bind('click', function(event) {
					if(event.target === this) 
					{
						if(ultimoSubmenu > -1)
							jQuery('#centro-arriba ul.menu > li').eq(ultimoSubmenu).children('ul.menu ul').slideFadeToggle('fast', 'linear');
						if(ultimoSubmenu != jQuery(this).index())
						{		
							ultimoSubmenu = jQuery(this).index();
							jQuery(this).children('ul.menu ul').slideFadeToggle('fast', 'linear');							
						}
						else
							ultimoSubmenu = -1;
					}
				});
				
				jQuery('#centro-arriba ul.menu li.expanded').children().bind('click', function(event) {
					event.stopPropagation();
				});				
			}
		}		
		
		jQuery('.lateral ul li.expanded').hoverIntent(function ()
		{
			jQuery(this).children('ul').animate({opacity: 'toggle', height: 'toggle'}, 'fast', 'linear');
		}, function ()
		{
			jQuery(this).children('ul').animate({opacity: 'toggle', height: 'toggle'}, 'fast', 'linear');
		});
		
		jQuery('#menus-principales').focusin(function()
		{
			if(escondidoMenuArriba === null || escondidoMenuArriba)
				abrirMenuArriba();
		});	
		
		jQuery('#menus-principales').focusout(function()
		{
			if(!jQuery(document.activeElement).closest('#menus-principales').length && !escondidoMenuArriba)			
				cerrarMenuArriba();
		});
		
		jQuery(window).resize(function() 
		{
			if(jQuery(window).width() > <?php echo $HD_CEL; ?>)
				menuSuperiorGrande = true;
			else
				menuSuperiorGrande = false;
			if(estadoAnteriorMenuSuperior != menuSuperiorGrande)
			{
				AcondicionarMenus();
			}
			estadoAnteriorMenuSuperior = menuSuperiorGrande;
		});
		
		AcondicionarMenus();
		<?php if($IE8) : ?>
		jQuery.getScript('<?php echo $UBICACION_WEB.$PLANTILLA; ?>/js/firma-ucr.js');
		<?php endif; ?>
	});	
-->
</script>
	
</body>
</html>