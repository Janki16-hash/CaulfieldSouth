<?php
$html_1 = get_theme_mod( 'zakra_header_html_1', '' );
echo '<div class="zak-html-1">';
echo $html_1; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- already sanitized via wp_kses_post() at save time (Sanitization::get_sanitization_callback() for the 'customind-editor' control).
echo '</div>';
