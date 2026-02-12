<?php 
/*
  Plugin Name: Yato - Post Types
  Plugin Uri:
  Descripcion: Añade Post Types al sitio Yato
  Version: 1.0.0
  Author: Rodrigo Silva Murillo
  Author Uri:
  Text Domain: yato
*/

if (!defined('ABSPATH')) {
    exit;
}

//pruebaaaaa
// Registrar Custom Post Type de Productos
function yato_custom_post_type_productos() {
    $labels = array(
        'name'                  => _x('Productos', 'Post type general name', 'yato'),
        'singular_name'         => _x('Producto', 'Post type singular name', 'yato'),
        'menu_name'            => _x('Productos', 'Admin Menu text', 'yato'),
        'add_new'              => __('Añadir nuevo', 'yato'),
        'add_new_item'         => __('Añadir nuevo Producto', 'yato'),
        'edit_item'            => __('Editar Producto', 'yato'),
        'new_item'             => __('Nuevo Producto', 'yato'),
        'view_item'            => __('Ver Producto', 'yato'),
        'search_items'         => __('Buscar Productos', 'yato'),
        'not_found'            => __('No se encontraron productos', 'yato'),
        'not_found_in_trash'   => __('No hay productos en la papelera', 'yato'),
        'featured_image'       => __('Imagen destacada del producto', 'yato'),
        'set_featured_image'   => __('Establecer imagen del producto', 'yato'),
        'remove_featured_image'=> __('Eliminar imagen del producto', 'yato'),
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'producto'),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-cart',
        'supports'            => array('title', 'editor', 'thumbnail'),
        'show_in_rest'        => true,
    );

    register_post_type('producto', $args);
}
add_action('init', 'yato_custom_post_type_productos', 0);

// Registrar Custom Post Type de Productos
function yato_custom_post_type_servicios() {
    $labels = array(
        'name'                  => _x('Servicios', 'Post type general name', 'yato'),
        'singular_name'         => _x('servicio', 'Post type singular name', 'yato'),
        'menu_name'            => _x('Servicios', 'Admin Menu text', 'yato'),
        'add_new'              => __('Añadir nuevo', 'yato'),
        'add_new_item'         => __('Añadir nuevo servicio', 'yato'),
        'edit_item'            => __('Editar servicio', 'yato'),
        'new_item'             => __('Nuevo servicio', 'yato'),
        'view_item'            => __('Ver servicio', 'yato'),
        'search_items'         => __('Buscar Servicios', 'yato'),
        'not_found'            => __('No se encontraron Servicios', 'yato'),
        'not_found_in_trash'   => __('No hay Servicios en la papelera', 'yato'),
        'featured_image'       => __('Imagen destacada del servicio', 'yato'),
        'set_featured_image'   => __('Establecer imagen del servicio', 'yato'),
        'remove_featured_image'=> __('Eliminar imagen del servicio', 'yato'),
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'servicio'),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-cart',
        'supports'            => array('title', 'editor', 'thumbnail'),
        'show_in_rest'        => true,
    );

    register_post_type('servicio', $args);
}
add_action('init', 'yato_custom_post_type_servicios', 0);

// Registrar Taxonomía Jerárquica para Categorías
function yato_registrar_taxonomia_categorias() {
    $labels = array(
        'name'              => _x('Categorías de Productos', 'taxonomy general name', 'yato'),
        'singular_name'     => _x('Categoría', 'taxonomy singular name', 'yato'),
        'search_items'      => __('Buscar Categorías', 'yato'),
        'all_items'         => __('Todas las Categorías', 'yato'),
        'parent_item'       => __('Categoría Padre', 'yato'),
        'parent_item_colon' => __('Categoría Padre:', 'yato'),
        'edit_item'         => __('Editar Categoría', 'yato'),
        'update_item'       => __('Actualizar Categoría', 'yato'),
        'add_new_item'      => __('Añadir Nueva Categoría', 'yato'),
        'new_item_name'     => __('Nombre de Nueva Categoría', 'yato'),
        'menu_name'         => __('Categorías', 'yato'),
    );

    $args = array(
        'hierarchical'      => true,  // Esto permite subcategorías
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'categoria-producto'),
        'show_in_rest'      => true, // Soporte para Gutenberg
    );

    register_taxonomy('categoria_producto', array('producto'), $args);
}
add_action('init', 'yato_registrar_taxonomia_categorias', 0);


function yato_registrar_post_type_mensajes() {
    $labels = array(
        'name'               => 'Mensajes',
        'singular_name'      => 'Mensaje',
        'menu_name'          => 'Mensajes de Contacto',
        'add_new'           => 'Añadir nuevo',
        'add_new_item'      => 'Añadir nuevo mensaje',
        'edit_item'         => 'Editar mensaje',
        'view_item'         => 'Ver mensaje',
        'search_items'      => 'Buscar mensajes',
        'not_found'         => 'No se encontraron mensajes',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'menu_icon'          => 'dashicons-email',
        'supports'           => array('title'),
    );

    register_post_type('mensaje', $args);
}
add_action('init', 'yato_registrar_post_type_mensajes');

// Función para la activación del plugin
function yato_activar_plugin() {
    yato_custom_post_type_productos();
    yato_custom_post_type_servicios();
    yato_registrar_taxonomia_categorias();
    yato_registrar_post_type_mensajes();
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'yato_activar_plugin');

// Función para la desactivación del plugin
function yato_desactivar_plugin() {
    flush_rewrite_rules();
}
register_deactivation_hook(__FILE__, 'yato_desactivar_plugin');