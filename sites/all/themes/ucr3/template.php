<?php

if (is_null(theme_get_setting('texto_titulo'))) {  // <-- change this line
  global $theme_key;

  /*
   * The default values for the theme variables. Make sure $defaults exactly
   * matches the $defaults in the theme-settings.php file.
   */
  $defaults = array(             // <-- change this array
    'texto_titulo' => 'no',
    'firma_grande' => 'no',
	'color' => 'celeste',
  );

  // Get default theme settings.
  $settings = theme_get_settings($theme_key);
  // Don't save the toggle_node_info_ variables.
  if (module_exists('node')) {
    // NOTE: node_get_types() is renamed to node_type_get_types() in Drupal 7
    foreach (node_type_get_types() as $type => $name) {    
      unset($settings['toggle_node_info_' . $type]);
    }
  }
  // Save default theme settings.
  variable_set(
    str_replace('/', '_', 'theme_'. $theme_key .'_settings'),
    array_merge($defaults, $settings)
  );
  // Force refresh of Drupal internals.
  theme_get_setting('', TRUE);
}

/**
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return a string containing the breadcrumb output.
 */
function ucr3_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];

  if (!empty($breadcrumb)) {
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';

    $output .= '<div class="breadcrumb">' . implode(' › ', $breadcrumb) . '</div>';
    return $output;
  }
}

/**
 * Override or insert variables into the maintenance page template.
 */
function ucr3_preprocess_maintenance_page(&$vars) {
  // While markup for normal pages is split into page.tpl.php and html.tpl.php,
  // the markup for the maintenance page is all in the single
  // maintenance-page.tpl.php template. So, to have what's done in
  // ucr3_preprocess_html() also happen on the maintenance page, it has to be
  // called here.
  ucr3_preprocess_html($vars);
}

  	class Browser 
	{ 
		public static function detect() { 
			$userAgent = strtolower($_SERVER['HTTP_USER_AGENT']); 

			// Identify the browser. Check Opera and Safari first in case of spoof. Let Google Chrome be identified as Safari. 
			if (preg_match('/opera/', $userAgent)) { 
				$name = 'opera'; 
			} 
			elseif (preg_match('/webkit/', $userAgent)) { 
				$name = 'safari'; 
			} 
			elseif (preg_match('/msie/', $userAgent)) { 
				$name = 'msie'; 
			} 
			elseif (preg_match('/mozilla/', $userAgent) && !preg_match('/compatible/', $userAgent)) { 
				$name = 'mozilla'; 
			} 
			else { 
				$name = 'unrecognized'; 
			} 

			// What version? 
			if($name == 'mozilla')
			{
				if(preg_match('/.+firefox\/([\d.]+)/', $userAgent, $matches))
					$version = $matches[1];
				elseif(preg_match('/.+(?:rv|it|ra|ie)[\/: ]([\d.]+)/', $userAgent, $matches)) 
					$version = $matches[1]; 
				else
					$version = 'unknown'; 
			}
			elseif($name == 'opera')
			{
				if(preg_match('/.+version\/([\d.]+)/', $userAgent, $matches))
					$version = $matches[1];
				elseif(preg_match('/.+(?:rv|it|ra|ie)[\/: ]([\d.]+)/', $userAgent, $matches)) 
					$version = $matches[1]; 
				else
					$version = 'unknown'; 
			}			
			elseif(preg_match('/.+(?:rv|it|ra|ie)[\/: ]([\d.]+)/', $userAgent, $matches)) 
				$version = $matches[1]; 
			else 
				$version = 'unknown'; 

			// Running on what platform? 
			if (preg_match('/linux/', $userAgent)) { 
				$platform = 'linux'; 
			} 
			elseif (preg_match('/macintosh|mac os x/', $userAgent)) { 
				$platform = 'mac'; 
			} 
			elseif (preg_match('/windows|win32/', $userAgent)) { 
				$platform = 'windows'; 
			} 
			else { 
				$platform = 'unrecognized'; 
			} 

			return array( 
				'name'      => $name, 
				'version'   => $version, 
				'platform'  => $platform, 
				'userAgent' => $userAgent 
			); 
		} 
	}

	
	
/**
 * Override or insert variables into the html template.
 */
function ucr3_preprocess_html(&$vars) 
{	  
  // Add conditional CSS for IE6.
  //drupal_add_css(path_to_theme() . '/fix-ie.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lt IE 7', '!IE' => FALSE), 'preprocess' => FALSE));
  
  	$vars['arriba'] = render($page['arriba']);
	$vars['header_left'] = render($page['header_left']);
	$vars['titulo_izquierda_arriba'] = render($page['titulo_izquierda_arriba']);
	$vars['header_center'] = render($page['header_center']);
	$vars['header_right'] = render($page['header_right']);
	$vars['banner_principal'] = render($page['banner_principal']);
	$vars['banner_sobre_ruta'] = render($page['banner_sobre_ruta']);
	$vars['ruta'] = render($page['ruta']);
	$vars['bajo_ruta'] = render($page['bajo_ruta']);
	$vars['logo'] = render($page['logo']);
	$vars['left'] = render($page['left']);
	$vars['izquierda_arriba'] = render($page['izquierda_arriba']);
	$vars['izquierda_abajo'] = render($page['izquierda_abajo']);
	$vars['logo_banner'] = render($page['logo_banner']);
	$vars['arriba_izquierda'] = render($page['arriba_izquierda']);
	$vars['arriba_centro'] = render($page['arriba_centro']);
	$vars['arriba_derecha'] = render($page['arriba_derecha']);
	$vars['centro_arriba'] = render($page['centro_arriba']);
	$vars['centro_abajo'] = render($page['centro_abajo']);
	$vars['content'] = render($page['content']);
	$vars['right'] = render($page['right']);
	$vars['derecha'] = render($page['derecha']);
	$vars['pie_derecha'] = render($page['pie_derecha']);
	$vars['footer'] = render($page['footer']);
	$vars['pie'] = render($page['pie']);
	$vars['abajo'] = render($page['abajo']);
	$vars['abajo_centro'] = render($page['abajo_centro']);
	$vars['page_top'] = render($page['page_top']);
	$vars['page_bottom'] = render($page['page_bottom']);
	
	if (module_exists('path')) 
	{
		$alias = drupal_get_path_alias(str_replace('/edit','',$_GET['q']));
		if ($alias != $_GET['q']) 
		{
			$template_filename = 'html';
			foreach (explode('/', $alias) as $path_part) 
			{
				$template_filename = $template_filename . '__' . $path_part;
				$vars['theme_hook_suggestions'][] = "html.tpl.php";
			}
		}
	}  
	
	$browser = Browser::detect(); 
	
	/*if($browser['name'] == "msie" && floatval($browser['version']) >= 9)
	{
		$navegador = "ie9";
	}	
	elseif($browser['name'] == "msie" && floatval($browser['version']) >= 8 && floatval($browser['version']) < 9)
	{
		$navegador = "ie8";
		$ie = true;
	}
	elseif($browser['name'] == "msie" && floatval($browser['version']) >= 7 && floatval($browser['version']) < 8)
	{
		$navegador = "ie7";
		$ie = true;
		$noCSSTable = true;
	}
	elseif($browser['name'] == "msie" && floatval($browser['version']) >= 5 && floatval($browser['version']) < 7)
	{
		$navegador = "ie6";	
		$img_ext = "gif";
		$ie = true;
		$noCSSTable = true;
	}
	elseif($browser['name'] == "opera" && floatval($browser['version']) >= 8)
	{
		$navegador = "opera";
		if(version_compare($browser['version'], "10.5", ">="))
			$opera10_5 = true;
	}
	elseif( $browser['name'] == "mozilla" )
	{		
		$navegador = "firefox";
		if(version_compare($browser['version'], "3.5", ">="))
			$firefox3_5 = true;
		elseif(version_compare($browser['version'], "3.5", "<") && version_compare($browser['version'], "3", ">"))
			$firefox3_1 = true;
		elseif (floatval($browser['version']) < 3)
		{
			$firefox2 = true;
			$noCSSTable = true;
		}
	}
	elseif($browser['name'] == "safari")
	{
		$navegador = "safari";
		if(version_compare($browser['version'], "528", "<"))  // Safari 4
			$safari_antiguo = true;
	}
	elseif($browser['name'] == "chrome")
	{
		$navegador = "safari";
		$chrome = true;
	}	
	else
		$navegador = "general";
		
	if($navegador == "ie7" || $navegador == "ie6")
		$blank_alt = "";*/

	$vars['browser'] = $browser;
}

/**
 * Override or insert variables into the html template.
 */
function ucr3_process_html(&$vars) {
  // Hook into color.module
  if (module_exists('color')) {
    _color_html_alter($vars);
  }
}

/**
 * Override or insert variables into the page template.
 */
function ucr3_preprocess_page(&$vars) {
  // Move secondary tabs into a separate variable.
  $vars['tabs2'] = array(
    '#theme' => 'menu_local_tasks',
    '#secondary' => $vars['tabs']['#secondary'],
  );
  unset($vars['tabs']['#secondary']);

  if (isset($vars['main_menu'])) {
    $vars['primary_nav'] = theme('links__system_main_menu', array(
      'links' => $vars['main_menu'],
      'attributes' => array(
        'class' => array('links', 'inline', 'main-menu'),
      ),
      'heading' => array(
        'text' => t('Main menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      )
    ));
  }
  else {
    $vars['primary_nav'] = FALSE;
  }
  if (isset($vars['secondary_menu'])) {
    $vars['secondary_nav'] = theme('links__system_secondary_menu', array(
      'links' => $vars['secondary_menu'],
      'attributes' => array(
        'class' => array('links', 'inline', 'secondary-menu'),
      ),
      'heading' => array(
        'text' => t('Secondary menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      )
    ));
  }
  else {
    $vars['secondary_nav'] = FALSE;
  }

  // Prepare header.
  $site_fields = array();
  if (!empty($vars['site_name'])) {
    $site_fields[] = $vars['site_name'];
  }
  if (!empty($vars['site_slogan'])) {
    $site_fields[] = $vars['site_slogan'];
  }
  $vars['site_title'] = implode(' ', $site_fields);
  if (!empty($site_fields)) {
    $site_fields[0] = '<span>' . $site_fields[0] . '</span>';
  }
  $vars['site_html'] = implode(' ', $site_fields);

  // Set a variable for the site name title and logo alt attributes text.
	$slogan_text = $vars['site_slogan'];
	$site_name_text = $vars['site_name'];
	$vars['site_name_and_slogan'] = $site_name_text . ' ' . $slogan_text;
  
	$browser = Browser::detect(); 
	
	/*$navegador = "";
	$opera10_5 = false;
	$firefox2 = false;
	$firefox3 = false;
	$noCSSTable = false;
	
	$blank_alt = "alt=\"&nbsp;\"";
	
	if($browser['name'] == "msie" && floatval($browser['version']) >= 9)
	{
		$navegador = "ie9";
	}	
	elseif($browser['name'] == "msie" && floatval($browser['version']) >= 8 && floatval($browser['version']) < 9)
	{
		$navegador = "ie8";
		$ie = true;
	}
	elseif($browser['name'] == "msie" && floatval($browser['version']) >= 7 && floatval($browser['version']) < 8)
	{
		$navegador = "ie7";
		$ie = true;
		$noCSSTable = true;
	}
	elseif($browser['name'] == "msie" && floatval($browser['version']) >= 5 && floatval($browser['version']) < 7)
	{
		$navegador = "ie6";	
		$img_ext = "gif";
		$ie = true;
		$noCSSTable = true;
	}
	elseif($browser['name'] == "opera" && floatval($browser['version']) >= 8)
	{
		$navegador = "opera";
		if(version_compare($browser['version'], "10.5", ">="))
			$opera10_5 = true;
	}
	elseif( $browser['name'] == "mozilla" )
	{		
		$navegador = "firefox";
		if(version_compare($browser['version'], "3.5", ">="))
			$firefox3_5 = true;
		elseif(version_compare($browser['version'], "3.5", "<") && version_compare($browser['version'], "3", ">"))
			$firefox3_1 = true;
		elseif (floatval($browser['version']) < 3)
		{
			$firefox2 = true;
			$noCSSTable = true;
		}
	}
	elseif($browser['name'] == "safari")
	{
		$navegador = "safari";
		if(version_compare($browser['version'], "528", "<"))  // Safari 4
			$safari_antiguo = true;
	}
	elseif($browser['name'] == "chrome")
	{
		$navegador = "safari";
		$chrome = true;
	}	
	else
		$navegador = "general";
		
	if($navegador == "ie7" || $navegador == "ie6")
		$blank_alt = "";

	$vars['noCSSTable'] = $noCSSTable;  */
	$vars['browser'] = $browser;
}

/**
 * Override or insert variables into the node template.
 */
function ucr3_preprocess_node(&$vars) {
  $vars['submitted'] = $vars['date'] . ' — ' . $vars['name'];
}

/**
 * Override or insert variables into the comment template.
 */
function ucr3_preprocess_comment(&$vars) {
  $vars['submitted'] = $vars['created'] . ' — ' . $vars['author'];
}

/**
 * Override or insert variables into the block template.
 */
function ucr3_preprocess_block(&$vars) {
  $vars['title_attributes_array']['class'][] = 'title';
  $vars['classes_array'][] = 'clearfix';
}

/**
 * Override or insert variables into the page template.
 */
function ucr3_process_page(&$vars) {
  // Hook into color.module
  if (module_exists('color')) {
    _color_page_alter($vars);
  }
}

/**
 * Override or insert variables into the region template.
 */
function ucr3_preprocess_region(&$vars) {
  if ($vars['region'] == 'header') {
    $vars['classes_array'][] = 'clearfix';
  }
}

/**
 * Override theme_menu_link()
 */
function ucr3_menu_link(array $variables) 
{
	$element = $variables['element'];
	$sub_menu = '';

	if ($element['#below']) 
	{
		$sub_menu = drupal_render($element['#below']);
	}
	$titulo = strtolower($element['#title']);
	// Allows for images as menu items. Just supply the path to the image as the title
	if (strpos($titulo, '.png') !== false || strpos($titulo, '.jpg') !== false || strpos($titulo, '.gif') !== false) 
	{
		$element['#title'] = '<img alt="'. $element['#localized_options']['attributes']['title'] .'" title="'. $element['#localized_options']['attributes']['title'] .'" src="'. url($element['#title']) .'" />';
		$element['#localized_options']['html'] = TRUE;
	}
	//return theme_menu_link($variables);
	$output = l($element['#title'], $element['#href'], $element['#localized_options']);
	return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
} 
