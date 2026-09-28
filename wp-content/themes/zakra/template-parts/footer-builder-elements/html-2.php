<?php
$html_2 = get_theme_mod( 'zakra_footer_html_2', '' );
echo '<div class="zak-html-2">';
echo $html_2; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- already sanitized via wp_kses_post() at save time (Sanitization::get_sanitization_callback() for the 'customind-editor' control).
echo '</div>';
