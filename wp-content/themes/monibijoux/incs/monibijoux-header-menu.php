<?php

class Monibijoux_Header_Menu extends Walker_Nav_Menu {
    public function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
        $menu_item = $data_object;

        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $classes   = empty( $menu_item->classes ) ? array() : (array) $menu_item->classes;
        $classes[] = 'menu-item-' . $menu_item->ID;
        $classes[] = 'menu-link';

        $class_names = implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $menu_item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $menu_item->ID, $menu_item, $args, $depth );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names . '>';

        $atts = array();
        $atts['title']  = ! empty( $menu_item->attr_title ) ? $menu_item->attr_title : '';
        $atts['target'] = ! empty( $menu_item->target ) ? $menu_item->target : '';
        $atts['rel']    = ! empty( $menu_item->xfn ) ? $menu_item->xfn : '';

        if ( ! empty( $menu_item->url ) ) {
            $atts['href'] = $menu_item->url;
        } else {
            $atts['href'] = '';
        }

        $active_class = $menu_item->current ? 'active' : '';
        $active_parent_class = $menu_item->current_item_ancestor ? ' active' : '';

        if ($this->has_children) {
            $atts['class'] = 'dropdown-item ' . $active_class . $active_parent_class;
        } else {
            $atts['class'] = 'menu-link ' . $active_class . $active_parent_class;
        }

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $menu_item, $args, $depth );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( is_scalar( $value ) && '' !== $value && false !== $value ) {
                $value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters( 'the_title', $menu_item->title, $menu_item->ID );
        $title = apply_filters( 'nav_menu_item_title', $title, $menu_item, $args, $depth );

        $item_output  = is_object($args) && isset($args->before) ? $args->before : '';
        $item_output .= '<a' . $attributes . '>';
        $item_output .= is_object($args) && isset($args->link_before) ? $args->link_before : '';
        $item_output .= $title;
        $item_output .= is_object($args) && isset($args->link_after) ? $args->link_after : '';
        $item_output .= '</a>';
        $item_output .= is_object($args) && isset($args->after) ? $args->after : '';

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $menu_item, $depth, $args );
    }

    public function start_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat( "\t", $depth );

        $classes = array( 'dropdown-menu' );
        $class_names = implode( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $output .= "\n$indent<ul$class_names>\n";
    }
}