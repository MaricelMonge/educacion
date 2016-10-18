<?php

/**
 * @file
 * Theme setting callbacks for the garland theme.
 */

/**
 * Implements hook_form_FORM_ID_alter().
 *
 * @param $form
 *   The form.
 * @param $form_state
 *   The form state.
 */
function ucr3_form_system_theme_settings_alter(&$form, &$form_state) {

  // Merge the saved variables and their default values
  // Create the form widgets using Forms API
  $form['texto_titulo'] = array(
    '#default_value' => theme_get_setting('no'),
	'#type' => 'select',
    '#title' => t('Nombre sitio arriba'),
	'#description' => t('Desplegar el título del sitio arriba.'),
    '#options' => array(      
      'no' => t('No'),
	  'si' => t('Si'),
    ),
    '#default_value' => theme_get_setting('texto_titulo'),	
  );
  
  $form['firma_grande'] = array(
	'#type' => 'select',
    '#title' => t('Firma Grande'),
	'#description' => t('Desplegar el encabezado con una firma UCR grande.'),
    '#options' => array(      
      'no' => t('No'),
	  'si' => t('Si'),
    ),
    '#default_value' => theme_get_setting('firma_grande'),	
  ); 
  
  $form['color'] = array(
	'#type' => 'select',
    '#title' => t('Color'),
    '#description' => t('Color del tema de la plantilla.'),
    '#options' => array(
      'celeste' => t('Celeste'),
      'azul' => t('Azul'),
	  'blanco' => t('Blanco'),
    ),
    '#default_value' => theme_get_setting('color'),
  );

}
