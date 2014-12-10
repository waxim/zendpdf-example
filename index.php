<?php

/*
 * We're using Zend PDF - http://framework.zend.com/manual/2.0/en/modules/zendpdf.usage.html
 */

// Require our vendors
require_once "vendor/autoload.php";

// Load our PDF
$pdf = \ZendPdf\PdfDocument::load("files/cv.pdf");

// Get our first page
$page = $pdf->pages[0];

// Write some stuff
$font = \ZendPdf\Font::fontWithName(ZendPdf\Font::FONT_HELVETICA);
$page->setFont($font, 25)->drawText('Modified by Zend Framework!', 150, 0);

// Add an image
$imageFile = dirname(__FILE__) . '/stamp.jpg';
$stampImage = ZendPdf\Image::imageWithPath($imageFile);
$page->drawImage($stampImage, 500, -60, 600, 40);

// Write the file
$pdf->save('new.pdf');

// Debug
//print_r(get_class_methods($page));
