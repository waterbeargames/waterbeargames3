<?php

/*
 * Puzzle
 * Default Colors
 */

$primary_color = new PuzzleColor;
$primary_color->set_id('primary_color')
    ->set_label('Primary Color')
    ->set_default_color('#06539d');

$secondary_color = new PuzzleColor;
$secondary_color->set_id('secondary_color')
    ->set_label('Secondary Color')
    ->set_default_color('#0faeb2');

$accent_color = new PuzzleColor;
$accent_color->set_id('accent_color')
    ->set_label('Accent Color')
    ->set_default_color('#f7e992');

$alternative_background = new PuzzleColor;
$alternative_background->set_id('alternative_background')
    ->set_label('Alternative Background Color')
    ->set_default_color('#dbe4eb');

$headline_dark = new PuzzleColor;
$headline_dark->set_id('headline_dark')
    ->set_label('Dark Headlines')
    ->set_default_color('#06539d');

$text_dark = new PuzzleColor;
$text_dark->set_id('text_dark')
    ->set_label('Dark Body Text')
    ->set_default_color('#4d4d4d');

$headline_light = new PuzzleColor;
$headline_light->set_id('headline_light')
    ->set_label('Light Headlines')
    ->set_default_color('#fff');

$text_light = new PuzzleColor;
$text_light->set_id('text_light')
    ->set_label('Light Body Text')
    ->set_default_color('#fff');

$puzzle_colors = new PuzzleColors;
$puzzle_colors->add_colors(array($primary_color, $secondary_color, $accent_color, $alternative_background, $headline_dark, $text_dark, $headline_light, $text_light));
?>
