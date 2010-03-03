<?php
// $Id: menutree.admin.inc,v 1.1 2008/01/22 02:56:59 crell Exp $

/**
 * @file
 * Administrative page callbacks for menutree module.
 */

/**
 * Form builder; Display menutree settings form.
 */
function menutree_settings() {
  $form = array();

  $form['menutree'] = array('#tree' => FALSE);

  $menus = menu_get_menus();
  foreach ($menus as $menu_name => $menu_title) {
    $open = trim(variable_get('menutree_title_'. $menu_name, '') . variable_get('menutree_intro_text_'. $menu_name, ''));

    $form['menutree'][$menu_name] = array(
      '#type' => 'fieldset',
      '#title' => $menu_title,
      '#collapsible' => TRUE,
      '#collapsed' => ($open ? FALSE : TRUE),
      '#description' => t('The path <a href="@link">@path</a> will provide a complete tree of all menu items in this menu.  If you wish to set a custom title or header text, do so here.', array(
        '@link' => url('menutree/'. $menu_name),  
        '@path' => 'menutree/'. $menu_name,
      )),
    );
    $form['menutree'][$menu_name]['menutree_title_'. $menu_name] = array(
      '#type' => 'textfield',
      '#title' => t('Page title'),
      '#default_value' => variable_get('menutree_title_'. $menu_name, ''),
      '#description' => t('A page title that is displayed instead of the root menu item title.'),
    );
    $form['menutree'][$menu_name]['menutree_intro_text_'. $menu_name] = array(
      '#type' => 'textarea',
      '#title' => t('Intro text'),
      '#default_value' => variable_get('menutree_intro_text_'. $menu_name, ''),
      '#resizable' => TRUE,
      '#description' => t('An intro text that is displayed below the page title.'),
    );
  }

  return system_settings_form($form);
}

