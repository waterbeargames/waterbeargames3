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
.light-text-color-scheme td {
    color: <?php echo $text_light; ?>;
}

/* Links */

a {
    color: <?php echo $secondary_color; ?>;
}

a:hover, a:active {
    color: <?php echo $primary_color; ?>;
}

.light-text-color-scheme a:not(.wbg-button) {
    color: <?php echo $accent_color; ?>;
}

.light-text-color-scheme a:not(.wbg-button):hover {
    color: rgba(<?php echo hex2rgb($text_light); ?>, 0.6);
}

/* Forms */

input, select, textarea {
    border-color: rgba(<?php echo hex2rgb($text_dark); ?>, 0.5);
}

input:focus, select:focus, textarea:focus {
    border-color: <?php echo $secondary_color; ?>;
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

/* Navigation Bar */

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
    background: <?php echo $secondary_color; ?>;
}

#nav-menu ul li a {
    color: <?php echo $primary_color; ?>;
}

#nav-menu ul li a:hover {
    color: <?php echo $secondary_color; ?>;
}

.nav-social-media a {
    background-color: <?php echo $primary_color; ?>;
}

.nav-social-media a:hover {
    background-color: <?php echo $secondary_color; ?>;
}

/* Header */

.header-bubble.primary-header-bubble {
    background-color: rgba(<?php echo hex2rgb($primary_color); ?>, 0.11);
}

.header-bubble.secondary-header-bubble {
    background-color: rgba(<?php echo hex2rgb($secondary_color); ?>, 0.11);
}

.header-bubble.accent-header-bubble {
    background-color: rgba(<?php echo hex2rgb($accent_color); ?>, 0.4);
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

#footer, #footer p, #footer li, #footer th, #footer td {
    color: <?php echo $footer_text_color; ?>
}

<?php if ($footer_text_color == $text_light) : ?>
#footer a {
    color: <?php echo $accent_color; ?>;
}

#footer a:hover {
    color: rgba(<?php echo hex2rgb($footer_text_color); ?>, 0.6);
}

<?php endif; ?>
/* Sections */

<?php foreach ($colors as $label => $color) : ?>
.puzzle-one-column .puzzle-columns-content .column-inner.<?php echo $label; ?>-background {
    background-color: rgba(<?php echo hex2rgb($color); ?>, 0.95);
}

<?php endforeach; ?>

.puzzle-story {
    background-color: <?php echo $alternative_background; ?>;
}

.puzzle-featured-story .puzzle-story {
    background-color: <?php echo $accent_color; ?>;
}

.puzzle-story-image {
    background-color: <?php echo $primary_color; ?>;
}

/* Buttons */

.wbg-button,
button,
input[type='button'],
input[type='submit'],
.wbg-button.wbg-button-primary:hover,
.primary-background .wbg-button.wbg-button-primary,
.primary-background .wbg-button.wbg-button-accent:hover,
.alternative-background .wbg-button:hover,
.alternative-background button:hover,
.alternative-background input[type='button']:hover,
.alternative-background input[type='submit']:hover,
.alternative-background .wbg-button.wbg-button-secondary,
.alternative-background .wbg-button.wbg-button-accent:hover,
.alternative-background .wbg-button.wbg-button-alternative:hover,
.puzzle-story .wbg-button:hover,
.puzzle-loop .wbg-button:hover,
.alternative-background .puzzle-story .wbg-button,
.alternative-background .puzzle-loop .wbg-button,
.categories .cat-item a,
.single-post-page-links a:hover,
.comment-reply-link,
a.page-numbers:hover,
#cancel-comment-reply-link,
#pagination a {
    background-color: <?php echo $secondary_color; ?>;
    color: #fff;
}

.wbg-button:hover,
button:hover,
input[type='button']:hover,
input[type='submit']:hover,
.wbg-button.wbg-button-primary,
.wbg-button.wbg-button-accent:hover,
.wbg-button.wbg-button-alternative:hover,
.secondary-background .wbg-button,
.secondary-background button,
.secondary-background input[type='button'],
.secondary-background input[type='submit'],
.secondary-background .wbg-button.wbg-button-accent:hover,
.alternative-background .wbg-button,
.alternative-background button,
.alternative-background input[type='button'],
.alternative-background input[type='submit'],
.alternative-background .wbg-button.wbg-button-secondary:hover,
.alternative-background .wbg-button.wbg-button-alternative,
.puzzle-story .wbg-button,
.puzzle-loop .wbg-button,
.alternative-background .puzzle-story .wbg-button:hover,
.alternative-background .puzzle-loop .wbg-button:hover,
.categories .cat-item a:hover,
.comment-reply-link:hover
#cancel-comment-reply-link:hover,
#pagination a:hover {
    background-color: <?php echo $primary_color; ?>;
    color: #fff;
}

.wbg-button.wbg-button-accent,
.primary-background .wbg-button:hover,
.primary-background button:hover,
.primary-background input[type='button']:hover,
.primary-background input[type='submit']:hover,
.secondary-background .wbg-button:hover,
.secondary-background button:hover,
.secondary-background input[type='button']:hover,
.secondary-background input[type='submit']:hover {
    background-color: <?php echo $accent_color; ?>;
    color: <?php echo $headline_dark; ?>;
}

.wbg-button.wbg-button-alternative {
    background-color: <?php echo $alternative_background; ?>;
    color: <?php echo $primary_color; ?>;
}

.circle-button .fa {
    color: <?php echo $primary_color; ?>;
}

<?php foreach ($colors as $label => $color) : ?>
.circle-button-container:hover .circle-button.<?php echo $label; ?>-background,
.circle-button.<?php echo $label; ?>-background:hover {
    -webkit-box-shadow: 0 0 0 8px rgba(<?php echo hex2rgb($color); ?>, 0.5);
    box-shadow: 0 0 0 8px rgba(<?php echo hex2rgb($color); ?>, 0.5);
}

<?php endforeach; ?>

/* Blog */

.puzzle-loop {
    background-color: rgba(<?php echo hex2rgb($alternative_background); ?>, 0.5);
}

.puzzle-loop h3 a {
    color: <?php echo $primary_color; ?>;
}

.puzzle-loop h3 a:hover {
    color: <?php echo $secondary_color; ?>;
}

.single-post-content.comments-open, .single-news-content.has-news-link {
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