<?php

/*
 * Puzzle
 * Custom style colors using admin options
 *
 * The CSS here is converted into /assets/css/custom.css by functions.php if
 * the sheet does not exist yet, and then is updated every time the user
 * updates the theme customizations (see /theme/customize_theme.php).
 */

$puzzle_pieces = new PuzzlePieces;
$puzzle_default_colors = $puzzle_pieces->colors();

$primary_color = get_theme_mod('primary_color', $puzzle_default_colors['primary_color']->default_color());
$secondary_color = get_theme_mod('secondary_color', $puzzle_default_colors['secondary_color']->default_color());
$accent_color = get_theme_mod('alternative_background', $puzzle_default_colors['alternative_background']->default_color());
$alternative_background = get_theme_mod('secondary_color', $puzzle_default_colors['secondary_color']->default_color());
$headline_dark = get_theme_mod('headline_dark', $puzzle_default_colors['headline_dark']->default_color());
$text_dark = get_theme_mod('text_dark', $puzzle_default_colors['text_dark']->default_color());
$headline_light = get_theme_mod('headline_light', $puzzle_default_colors['headline_light']->default_color());
$text_light = get_theme_mod('text_light', $puzzle_default_colors['text_light']->default_color());

$footer_background_color = get_theme_mod('footer_background_color', 'primary');
?>
/* Text */

h1, h2, h3, h4, h5, h6, th,
.dark-text-color-scheme h1,
.dark-text-color-scheme h2,
.dark-text-color-scheme h3,
.dark-text-color-scheme h4,
.dark-text-color-scheme h5,
.dark-text-color-scheme h6,
.dark-text-color-scheme th {
    color: <?php echo $headline_dark; ?>;
}

body, p, li, td,
.dark-text-color-scheme,
.dark-text-color-scheme p,
.dark-text-color-scheme li,
.dark-text-color-scheme td {
    color: <?php echo $text_dark; ?>;
}

.light-text-color-scheme h1,
.light-text-color-scheme h2,
.light-text-color-scheme h3,
.light-text-color-scheme h4,
.light-text-color-scheme h5,
.light-text-color-scheme h6,
.light-text-color-scheme th {
    color: <?php echo $headline_light; ?>;
}

.light-text-color-scheme,
.light-text-color-scheme p,
.light-text-color-scheme li,
.light-text-color-scheme td,
.light-text-color-scheme a {
    color: <?php echo $text_light; ?>;
}

/* Section Backgrounds */

.alternative-background {
    background-color: <?php echo $alternative_background; ?>;
}

.primary-color-background {
    background-color: <?php echo $primary_color; ?>;
}

.secondary-color-background {
    background-color: <?php echo $secondary_color; ?>;
}

/* Links */

a {
    color: <?php echo $primary_color; ?>;
}

a:hover, a:active {
    color: <?php echo $secondary_color; ?>;
}

/* Navigation Bar */

#nav a {
    color: <?php echo $primary_color; ?>;
}

#dl-menu.dl-menuwrapper button {
    background: <?php echo $primary_color; ?>;
}

#dl-menu.dl-menuwrapper ul,
#dl-menu.dl-menuwrapper button.dl-active,
#dl-menu.dl-menuwrapper button,
#nav-menu ul ul {
    background-color: <?php echo $primary_color; ?>;
}

#dl-menu.dl-menuwrapper button:hover {
    background: <?php echo $secondary_color; ?>;
}

#dl-menu.dl-menuwrapper li a {
    color: <?php echo $text_light; ?>;
}

#dl-menu.dl-menuwrapper li a:hover,
#dl-menu.dl-menuwrapper li a:active {
    color: <?php echo $primary_color; ?>;
}

#dl-menu.dl-menuwrapper button:active,
#dl-menu.dl-menuwrapper li a:hover,
#dl-menu.dl-menuwrapper li a:active {
    background: <?php echo $nav_primary_color; ?>;
}

/* Footer */
<?php
$footer_headline_color = $headline_light;
$footer_text_color = $text_light;

if ($footer_background_color == 'gray' || $footer_background_color == 'white') {
    $footer_headline_color = $headline_dark;
    $footer_text_color = $text_dark;
}

if ($footer_background_color == 'secondary') {
    $footer_primary_color = $secondary_color;
} elseif ($footer_background_color == 'gray') {
    $footer_primary_color = '#eee';
} elseif ($footer_background_color == 'white') {
    $footer_primary_color = '#fff';
} else {
    $footer_primary_color = $primary_color;
}
?>

#footer {
    background-color: <?php echo $footer_primary_color; ?>
}

#footer h1, #footer h2, #footer h3, #footer h4, #footer h5, #footer h6 {
    color: <?php echo $footer_headline_color; ?>;
}

#footer, #footer p, #footer li, #footer th, #footer td, #footer a {
    color: <?php echo $footer_text_color; ?>
}

/* Sections */

.owl-theme .owl-controls .owl-page.active span {
    background-color: <?php echo $primary_color; ?>;
}

.owl-theme .owl-controls.clickable .owl-page:hover span {
    background-color: <?php echo $secondary_color; ?>;
}

.puzzle-header .puzzle-header-text-background-primary-color {
<?php
    $text_background_primary_color = 'rgba(' . hex2rgb($primary_color) . ', 0.8)';
    $text_background_primary_color_shadow = '10px 0 0 ' . $text_background_primary_color . ', -10px 0 0 ' . $text_background_primary_color;
?>
    background-color:   <?php echo $text_background_primary_color; ?>;
    -webkit-box-shadow: <?php echo $text_background_primary_color_shadow; ?>;
    -moz-box-shadow:    <?php echo $text_background_primary_color_shadow; ?>;
    box-shadow:         <?php echo $text_background_primary_color_shadow; ?>;
}

.puzzle-header .puzzle-header-text-background-secondary-color {
<?php
    $text_background_secondary_color = 'rgba(' . hex2rgb($secondary_color) . ', 0.75)';
    $text_background_secondary_color_shadow = '10px 0 0 ' . $text_background_secondary_color . ', -10px 0 0 ' . $text_background_secondary_color;
?>
    background-color:   <?php echo $text_background_secondary_color; ?>;
    -webkit-box-shadow: <?php echo $text_background_secondary_color_shadow; ?>;
    -moz-box-shadow:    <?php echo $text_background_secondary_color_shadow; ?>;
    box-shadow:         <?php echo $text_background_secondary_color_shadow; ?>;
}

.puzzle-header .puzzle-header-text-primary-color {
    color: <?php echo $primary_color; ?>;
}

.puzzle-header .puzzle-header-text-secondary-color {
    color: <?php echo $secondary_color; ?>;
}

.puzzle-accordions .column-inner > h5:first-child:hover .fa {
    color: <?php echo $secondary_color; ?>;
}

.puzzle-features .column-inner > i:first-child, .puzzle-accordions .column-inner > h5:first-child i {
    color: <?php echo $primary_color; ?>;
}

/* Buttons */

.puzzle-button,
input[type='button'],
input[type='submit'],
.puzzle-button.puzzle-button-secondary-color:hover,
.secondary-color-background .puzzle-button.puzzle-button-white:hover,
.secondary-color-background .puzzle-button.puzzle-button-secondary-color,
.categories .cat-item a,
.single-post-page-links a:hover,
.comment-reply-link,
a.page-numbers:hover,
#cancel-comment-reply-link,
#pagination a:hover {
    background-color: <?php echo $primary_color; ?>;
    border-color: <?php echo $primary_color; ?>;
    color: #fff;
}

.white-background .puzzle-button.puzzle-button-white,
#pagination a {
    border-color: <?php echo $primary_color; ?>;
    color: <?php echo $primary_color; ?>;
}

.puzzle-button.puzzle-button-white,
.primary-color-background .puzzle-button.puzzle-button-white {
    color: <?php echo $primary_color; ?>;
}

.white-background .puzzle-button.puzzle-button-transparent {
    border-color: <?php echo $secondary_color; ?>;
    color: <?php echo $secondary_color; ?>;
}

.puzzle-button:hover,
.puzzle-button.puzzle-button-white:hover,
.puzzle-button.puzzle-button-transparent:hover,
input[type='button']:hover,
input[type='submit']:hover,
.puzzle-button.puzzle-button-secondary-color,
.primary-color-background .puzzle-button,
.primary-color-background input[type='button'],
.primary-color-background input[type='submit'],
.primary-color-background .puzzle-button.puzzle-button-white:hover,
.categories .cat-item a:hover,
#cancel-comment-reply-link:hover,
.comment-reply-link:hover {
    background-color: <?php echo $secondary_color; ?>;
    border-color: <?php echo $secondary_color; ?>;
    color: #fff;
}

.primary-color-background .puzzle-button:hover,
.primary-color-background input[type='button']:hover,
.primary-color-background input[type='submit']:hover,
.secondary-color-background .puzzle-button:hover,
.secondary-color-background input[type='button']:hover ,
.secondary-color-background input[type='submit']:hover {
    background-color: #fff;
    border-color: #fff;
    color: <?php echo $primary_color; ?>;
}

/* Blog */

.puzzle-loop, .single-post-content, .single-post-content.comments-open, #pagination {
    border-color: <?php echo $primary_color; ?>;
}

.single-post-page-links a, .page-numbers {
    color: <?php echo $text_dark; ?>
}

/* Contact Form 7 */

.wpcf7-form div.wpcf7-response-output.wpcf7-mail-sent-ok {
    background-color: <?php echo $primary_color; ?>;
    background-color: rgba(<?php echo hex2rgb($primary_color); ?>, 0.5);
}

.primary-color-background .wpcf7-form div.wpcf7-response-output.wpcf7-mail-sent-ok {
    background-color: <?php echo $secondary_color; ?>;
    background-color: rgba(<?php echo hex2rgb($secondary_color); ?>, 0.5);
}