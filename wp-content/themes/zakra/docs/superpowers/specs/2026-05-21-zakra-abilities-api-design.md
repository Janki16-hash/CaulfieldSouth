# Zakra Abilities API — Design Spec

**Date:** 2026-05-21  
**Status:** Approved

---

## Overview

Single static PHP class `Zakra_Abilities` that wraps all `get_theme_mod()` calls from the Customizer options system and exposes them as typed, named static methods. Consumed by templates, dynamic CSS generator, enqueue scripts, hooks, and admin code.

---

## Architecture

### File
`inc/base/class-zakra-abilities.php`

Loaded from `functions.php` alongside existing `inc/base/` classes (after constants are defined).

### Class Structure

```php
class Zakra_Abilities {
    private static $cache = [];

    private static function mod( string $key, $default = null ) {
        if ( ! array_key_exists( $key, self::$cache ) ) {
            self::$cache[ $key ] = get_theme_mod( $key, $default );
        }
        return self::$cache[ $key ];
    }

    // public static methods grouped by prefix...
}
```

### Caching
Static `$cache` array prevents duplicate `get_theme_mod()` calls when the same setting is read by multiple consumers (template + dynamic CSS) in a single request. Cache is per-request (not persistent).

---

## Method Surface (~38 methods)

### `global_*` — Site-wide layout, color, container

| Method | Return | Setting key |
|--------|--------|-------------|
| `get_primary_color()` | `string` | `zakra_primary_color` |
| `get_base_color()` | `string` | `zakra_base_color` |
| `get_border_color()` | `string` | `zakra_border_color` |
| `get_container_layout()` | `string` | `zakra_global_container_layout` |
| `get_container_width()` | `int` | `zakra_container_width` |
| `get_sidebar_layout()` | `string` | `zakra_global_sidebar_layout` |
| `get_sidebar_width()` | `int` | `zakra_sidebar_width` |
| `get_content_area_layout()` | `string` | `zakra_content_area_layout` |

### `header_*` — Header features and layout

| Method | Return | Setting key |
|--------|--------|-------------|
| `has_builder()` | `bool` | `zakra_enable_builder` |
| `has_top_bar()` | `bool` | `zakra_enable_top_bar` |
| `get_top_bar_col1_type()` | `string` | `zakra_top_bar_column_1_content_type` |
| `get_top_bar_col2_type()` | `string` | `zakra_top_bar_column_2_content_type` |
| `get_main_layout()` | `string` | `zakra_main_header_layout` |
| `get_main_layout_style()` | `string` | `zakra_main_header_layout_1_style` |
| `has_search()` | `bool` | `zakra_enable_header_search` |
| `has_product_search()` | `bool` | `zakra_enable_product_search_search` |
| `has_button()` | `bool` | `zakra_enable_header_button` |
| `get_button_text()` | `string` | `zakra_header_button_text` |
| `get_button_link()` | `string` | `zakra_header_button_link` |
| `has_page_header()` | `bool` | `zakra_enable_page_header` |
| `get_page_header_layout()` | `string` | `zakra_page_header_layout` |
| `has_breadcrumb()` | `bool` | `zakra_enable_breadcrumb` |

### `footer_*` — Footer features and layout

| Method | Return | Setting key |
|--------|--------|-------------|
| `has_builder()` | `bool` | `zakra_enable_builder` (same toggle as header) |
| `has_scroll_to_top()` | `bool` | `zakra_enable_scroll_to_top` |
| `has_widget_column()` | `bool` | `zakra_enable_footer_column` |
| `get_widget_column_layout()` | `string` | `zakra_footer_column_layout_1_style` |
| `get_bar_col1_type()` | `string` | `zakra_footer_bar_column_1_content_type` |
| `get_bar_col2_type()` | `string` | `zakra_footer_bar_column_2_content_type` |

### `blog_*` — Blog archive and single post

| Method | Return | Setting key |
|--------|--------|-------------|
| `get_container_layout()` | `string` | `zakra_blog_container_layout` |
| `get_sidebar_layout()` | `string` | `zakra_blog_sidebar_layout` |
| `get_excerpt_type()` | `string` | `zakra_blog_excerpt_type` |
| `has_read_more()` | `bool` | `zakra_enable_blog_button` |
| `get_post_date_type()` | `string` | `zakra_blog_post_date_type` |

### `page_*` — Static pages

| Method | Return | Setting key |
|--------|--------|-------------|
| `get_container_layout()` | `string` | `zakra_single_page_container_layout` |
| `get_sidebar_layout()` | `string` | `zakra_single_page_sidebar_layout` |

### `woo_*` — WooCommerce (only called when WooCommerce active)

| Method | Return | Setting key |
|--------|--------|-------------|
| `get_page_sidebar_layout()` | `string` | `zakra_woocommerce_page_sidebar_layout` |
| `get_global_sidebar_layout()` | `string` | `zakra_woocommerce_global_sidebar_layout` |
| `get_single_product_sidebar_layout()` | `string` | `zakra_single_product_sidebar_layout` |

---

## Return Type Conventions

- `has_*` / `is_*` methods always return `bool` — cast with `(bool)`.
- `get_*` color methods return `string` (hex or empty string).
- `get_*` layout methods return `string` (slug value, e.g. `'right-sidebar'`).
- `get_*` dimension methods return `int` (px value without unit).

---

## Default Values

Each method passes the same default used by the corresponding Customizer setting registration. Defaults are defined as constants at the top of the class to keep them co-located and easy to update.

---

## Loading

In `functions.php`, require after `class-zakra-constants.php` and before template-tags or hooks files:

```php
require_once ZAKRA_PARENT_INC_DIR . 'base/class-zakra-abilities.php';
```

---

## Out of Scope

- Typography, button padding, border width settings — these are read only by `class-zakra-dynamic-css.php` and not needed in templates. Add to API only if a future use case arises.
- No global helper function (`zakra_abilities()`) — static class only per user decision.
- No persistent/transient caching — per-request static cache is sufficient.
