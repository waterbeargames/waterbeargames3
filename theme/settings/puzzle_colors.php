<?php

/*
 * Puzzle
 * Default Colors
 */

$primary_color = new puzzleColor;
$primary_color->set_id('primary_color')
    ->set_label('Primary Color')
    ->set_default_color('#06539d');

$secondary_color = new puzzleColor;
$secondary_color->set_id('secondary_color')
    ->set_label('Secondary Color')
    ->set_default_color('#0faeb2');

$accent_color = new puzzleColor;
$accent_color->set_id('accent_color')
    ->set_label('Accent Color')
    ->set_default_color('#f7e992');

$alternative_background = new puzzleColor;
$alternative_background->set_id('alternative_background')
    ->set_label('Alternative Background Color')
    ->set_default_color('#dbe4eb');

$headline_dark = new puzzleColor;
$headline_dark->set_id('headline_dark')
    ->set_label('Dark Headlines')
    ->set_default_color('#06539d');

$text_dark = new puzzleColor;
$text_dark->set_id('text_dark')
    ->set_label('Dark Body Text')
    ->set_default_color('#4d4d4d');

$headline_light = new puzzleColor;
$headline_light->set_id('headline_light')
    ->set_label('Light Headlines')
    ->set_default_color('#fff');

$text_light = new puzzleColor;
$text_light->set_id('text_light')
    ->set_label('Light Body Text')
    ->set_default_color('#fff');

$puzzle_pieces = new PuzzlePieces;
$puzzle_pieces->add_colors(array($primary_color, $secondary_color, $accent_color, $alternative_background, $headline_dark, $text_dark, $headline_light, $text_light));
?>