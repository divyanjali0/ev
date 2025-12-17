<?php
require_once __DIR__ . '/assets/libs/tcpdf/tcpdf.php';

// Add Oldenburg font
$cinzelvariablefont_wght = TCPDF_FONTS::addTTFfont(__DIR__ . '/assets/fonts/Cinzel-VariableFont_wght.ttf', 'TrueTypeUnicode', '', 96);
echo "Oldenburg font added: $cinzelvariablefont_wght\n";

// Add Roboto font
$roboto = TCPDF_FONTS::addTTFfont(__DIR__ . '/assets/fonts/Roboto-Regular.ttf', 'TrueTypeUnicode', '', 96);
echo "Roboto font added: $roboto\n";
