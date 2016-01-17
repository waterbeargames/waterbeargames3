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
$accent_color = get_theme_mod('accent_color', $puzzle_default_colors['accent_color']->default_color());
$alternative_background = get_theme_mod('alternative_background', $puzzle_default_colors['alternative_background']->default_color());

$colors = array(
    'primary'       => $primary_color,
    'secondary'     => $secondary_color,
    'accent'        => $accent_color,
    'alternative'   => $alternative_background
);

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
.dark-text-color-scheme th {
    color: <?php echo $headline_dark; ?>;
}

body, p, li, td,
.dark-text-color-scheme,
.dark-text-color-scheme h6,
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
.light-text-color-scheme th {
    color: <?php echo $headline_light; ?>;
}

.light-text-color-scheme,
.light-text-color-scheme h6,
.light-text-color-scheme p,
.light-text-color-scheme li,
.light-text-color-scheme td,
.light-text-color-scheme a {
    color: <?php echo $text_light; ?>;
}

/* Section Backgrounds */

.primary-background {
    background-color: <?php echo $primary_color; ?>;
}

.secondary-background {
    background-color: <?php echo $secondary_color; ?>;
}

.accent-background {
    background-color: <?php echo $accent_color; ?>;
}

.alternative-background {
    background-color: <?php echo $alternative_background; ?>;
}

/* Links */

a {
    color: <?php echo $secondary_color; ?>;
}

a:hover, a:active {
    color: <?php echo $primary_color; ?>;
}

/* Navigation Bar */

#nav a {
    color: <?php echo $primary_color; ?>;
}

#nav .vector-container path {
    fill: <?php echo $primary_color; ?>;
}

#nav .vector-container a:hover path {
    fill: <?php echo $secondary_color; ?>;
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
    background: <?php echo $primary_color; ?>;
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

<?php foreach ($colors as $label => $color) : ?>
.puzzle-one-column .puzzle-columns-content .column-inner.<?php echo $label; ?>-background {
    background-color: rgba(<?php echo hex2rgb($color); ?>, 0.85);
}

<?php endforeach; ?>

.puzzle-story {
    background-color: <?php echo $alternative_background; ?>;
}

.puzzle-story-image {
    background-color: <?php echo $primary_color; ?>;
}

/* Buttons */

.wbg-button,
button,
input[type='button'],
input[type='submit'],
.wbg-button.wbg-button-secondary:hover,
.secondary-background .wbg-button.wbg-button-secondary,
.alternative-background .wbg-button.wbg-button-alternative,
.secondary-background .wbg-button.wbg-button-accent:hover,
.secondary-background .wbg-button.wbg-button-alternative:hover,
.secondary-background .wbg-button.wbg-button-black:hover,
.categories .cat-item a,
.single-post-page-links a:hover,
.comment-reply-link,
a.page-numbers:hover,
#cancel-comment-reply-link,
#pagination a:hover {
    background-color: <?php echo $primary_color; ?>;
    color: #fff;
}

#pagination a {
    color: <?php echo $primary_color; ?>;
}

.wbg-button.wbg-button-alternative,
.primary-background .wbg-button.wbg-button-alternative {
    background-color: <?php echo $alternative_background; ?>;
    color: <?php echo $primary_color; ?>;
}

.wbg-button.wbg-button-accent,
.primary-background .wbg-button.wbg-button-accent,
.primary-background .wbg-button:hover,
.primary-background .wbg-button.wbg-button-primary:hover,
.primary-background .wbg-button.wbg-button-secondary:hover,
.primary-background button:hover,
.primary-background input[type='button']:hover,
.primary-background input[type='submit']:hover,
.secondary-background .wbg-button:hover,
.secondary-background .wbg-button.wbg-button-primary:hover,
.secondary-background .wbg-button.wbg-button-secondary:hover,
.secondary-background button:hover,
.secondary-background input[type='button']:hover,
.secondary-background input[type='submit']:hover {
    background-color: <?php echo $accent_color; ?>;
    color: <?php echo $headline_dark; ?>;
}

.wbg-button:hover,
button:hover,
input[type='button']:hover,
input[type='submit']:hover,
.wbg-button.wbg-button-accent:hover
.wbg-button.wbg-button-alternative:hover,
.primary-background .wbg-button.wbg-button-alternative:hover,
.alternative-background .wbg-button.wbg-button-alternative:hover,
.wbg-button.wbg-button-secondary,
.primary-background .wbg-button,
.primary-background .wbg-button.wbg-button-primary,
.primary-background button,
.primary-background input[type='button'],
.primary-background input[type='submit'],
.primary-background .wbg-button.wbg-button-accent:hover,
.primary-background .wbg-button.wbg-button-black:hover,
.categories .cat-item a:hover,
#cancel-comment-reply-link:hover,
.comment-reply-link:hover {
    background-color: <?php echo $secondary_color; ?>;
    color: #fff;
}

.circle-button .fa {
    color: <?php echo $primary_color; ?>;
}

<?php foreach ($colors as $label => $color) : ?>
.circle-button-container:hover .circle-button.<?php echo $label; ?>-background,
.circle-button.<?php echo $label; ?>-background:hover {
    box-shadow: 0 0 0 8px rgba(<?php echo hex2rgb($color); ?>, 0.5);
}

<?php endforeach; ?>

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