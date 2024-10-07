<?php
// Include the QR code library
include('../phpqrcode/qrlib.php');

// Set the path to save the QR code
$path = '../QRCode/'; 

// The file name for the generated QR code image
$filename = $path . 'user_qrcode.png'; 

// The data for the QR code (e.g., user info, URL, etc.)
$data = 'https://example.com/user_profile'; // Change this to dynamic data if needed

// Generate the QR code and save it as an image
QRcode::png($data, $filename, QR_ECLEVEL_L, 4);

// Return the filename as the path to be displayed
echo $filename;
?>
