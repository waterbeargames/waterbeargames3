<?php

/*
 * Water Bear Games
 * Custom style colors using admin options
 *
 * The CSS here is converted into /assets/css/custom.css by functions.php if
 * the sheet does not exist yet, and then is updated every time the user
 * updates the theme customizations (see /theme/customize_theme.php).
 */

$wbg_colors = wbg_theme_colors();

$primary_color = $wbg_colors['primary_color'];
$secondary_color = $wbg_colors['secondary_color'];
$accent_color = $wbg_colors['accent_color'];
$alternative_background = $wbg_colors['alternative_background'];;

$colors = array(
    'primary'       => $primary_color,
    'secondary'     => $secondary_color,
    'accent'        => $accent_color,
    'alternative'   => $alternative_background
);

$headline_dark = $wbg_colors['headline_dark'];
$text_dark = $wbg_colors['text_dark'];
$headline_light = $wbg_colors['headline_light'];
$text_light = $wbg_colors['text_light'];

$footer_background_color = get_theme_mod('footer_background_color', 'primary');
?>
/* Text */

h1, h2, h3, h4, h5, th {
    color: <?php echo $headline_dark; ?>;
}

body, h6, .pz-dark-text h6, p, li, td {
    color: <?php echo $text_dark; ?>;
}

.pz-light-text h1,
.pz-light-text h2,
.pz-light-text h3,
.pz-light-text h4,
.pz-light-text h5,
.pz-light-text th {
    color: <?php echo $headline_light; ?>;
}

.pz-light-text,
.pz-light-text h6,
.pz-light-text p,
.pz-light-text li,
.pz-light-text td {
    color: <?php echo $text_light; ?>;
}

/* Links */

a {
    color: <?php echo $secondary_color; ?>;
}

a:hover, a:active {
    color: <?php echo $primary_color; ?>;
}

.pz-light-text a:not(.wbg-button) {
    color: <?php echo $accent_color; ?>;
}

.pz-light-text a:not(.wbg-button):hover {
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

.pz-accent-background {
    background-color: <?php echo $accent_color; ?>;
}

.pz-alternative-background {
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
.pz-one-column .pz-columns-content .col-inner.<?php echo $label; ?>-background {
    background-color: rgba(<?php echo hex2rgb($color); ?>, 0.95);
}

<?php endforeach; ?>

.wbg-story {
    background-color: <?php echo $alternative_background; ?>;
}

.wbg-featured-story .wbg-story {
    background-color: <?php echo $accent_color; ?>;
}

.wbg-story-image {
    background-color: <?php echo $primary_color; ?>;
}

/* Buttons */

.wbg-button,
button,
input[type='button'],
input[type='submit'],
.wbg-button.wbg-button-primary:hover,
.pz-primary-background .wbg-button.wbg-button-primary,
.pz-primary-background .wbg-button.wbg-button-accent:hover,
.pz-alternative-background .wbg-button:hover,
.pz-alternative-background button:hover,
.pz-alternative-background input[type='button']:hover,
.pz-alternative-background input[type='submit']:hover,
.pz-alternative-background .wbg-button.wbg-button-secondary,
.pz-alternative-background .wbg-button.wbg-button-accent:hover,
.pz-alternative-background .wbg-button.wbg-button-alternative:hover,
.wbg-story .wbg-button:hover,
.wbg-loop .wbg-button:hover,
.pz-alternative-background .wbg-story .wbg-button,
.pz-alternative-background .wbg-loop .wbg-button,
.categories .cat-item a,
.single-post-page-links a:hover,
.comment-reply-link,
#cancel-comment-reply-link {
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
.pz-secondary-background .wbg-button,
.pz-secondary-background button,
.pz-secondary-background input[type='button'],
.pz-secondary-background input[type='submit'],
.pz-secondary-background .wbg-button.wbg-button-accent:hover,
.pz-alternative-background .wbg-button,
.pz-alternative-background button,
.pz-alternative-background input[type='button'],
.pz-alternative-background input[type='submit'],
.pz-alternative-background .wbg-button.wbg-button-secondary:hover,
.pz-alternative-background .wbg-button.wbg-button-alternative,
.wbg-story .wbg-button,
.wbg-loop .wbg-button,
.pz-alternative-background .wbg-story .wbg-button:hover,
.pz-alternative-background .wbg-loop .wbg-button:hover,
.categories .cat-item a:hover,
.comment-reply-link:hover
#cancel-comment-reply-link:hover {
    background-color: <?php echo $primary_color; ?>;
    color: #fff;
}

.wbg-button.wbg-button-accent,
.pz-primary-background .wbg-button:hover,
.pz-primary-background button:hover,
.pz-primary-background input[type='button']:hover,
.pz-primary-background input[type='submit']:hover,
.pz-secondary-background .wbg-button:hover,
.pz-secondary-background button:hover,
.pz-secondary-background input[type='button']:hover,
.pz-secondary-background input[type='submit']:hover {
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
.circle-button-container:hover .circle-button.pz-<?php echo $label; ?>-background,
.circle-button.pz-<?php echo $label; ?>-background:hover {
    -webkit-box-shadow: 0 0 0 8px rgba(<?php echo hex2rgb($color); ?>, 0.5);
    box-shadow: 0 0 0 8px rgba(<?php echo hex2rgb($color); ?>, 0.5);
}

<?php endforeach; ?>

/* Blog */

.wbg-loop {
    background-color: rgba(<?php echo hex2rgb($alternative_background); ?>, 0.5);
}

.wbg-loop h3 a {
    color: <?php echo $primary_color; ?>;
}

.wbg-loop h3 a:hover {
    color: <?php echo $secondary_color; ?>;
}

.single-post-content.comments-open, .single-news-content.has-news-link {
    border-color: <?php echo $primary_color; ?>;
}

.single-post-page-links a, .page-numbers {
    color: <?php echo $text_dark; ?>
}

.page-numbers.current {
    background-color: <?php echo $accent_color; ?>;
}

.page-numbers.disabled {
    color: rgba(<?php echo hex2rgb($text_dark); ?>, 0.25);
}

.pagination a {
    background-color: <?php echo $secondary_color; ?>;
    color: #fff;
}

.pagination a:hover {
    background-color: <?php echo $primary_color; ?>;
    color: #fff;
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
