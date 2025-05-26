<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Function to get image name
function getImageName($src)
{
    if (!$src || $src === 'Not selected') return 'Not selected';
    $parts = explode('/', $src);
    $fileName = $parts[count($parts) - 1];
    $name = explode('.', $fileName)[0];
    return 'image' . (preg_match('/\d+$/', $name, $matches) ? $matches[0] : '1');
}

// Price mappings
$suitTypePrices = [
    '1piece' => 1500,
    '2pieceTD' => 1650,
    '2pieceTB' => 1800,
    '3piece' => 2100,
];

$lacePrices = [
    'image1' => 200,
    'image2' => 250,
    'image3' => 300,
    'image4' => 350,
    'image5' => 400,
    'image6' => 450,
];

$buttonPrices = [
    'metal' => 100,
    'fabric' => 150,
    'plastic' => 80,
    'wooden' => 120,
    'pearls' => 200,
];

// Function to calculate total price
function calculateTotalPrice($activeTab, $postData)
{
    global $suitTypePrices, $lacePrices, $buttonPrices;
    $totalPrice = 0;

    if ($activeTab === 'female') {
        $suitType = $postData['female']['suitType'] ?? '';
        if (isset($suitTypePrices[$suitType])) {
            $totalPrice += $suitTypePrices[$suitType];
        }

        // Top Lace
        $topLace = $postData['female']['lace'] ?? 'no';
        $topLaceSource = $postData['female']['laceSource'] ?? '';
        $topLaceImage = $postData['female']['laceImage'] ?? '';
        if ($topLace === 'yes' && $topLaceSource === 'library' && $topLaceImage) {
            $imageName = getImageName($topLaceImage);
            if (isset($lacePrices[$imageName])) {
                $totalPrice += $lacePrices[$imageName];
            }
        }

        // Bottom Lace
        $bottomLace = $postData['female']['bottomLace'] ?? 'no';
        $bottomLaceSource = $postData['female']['bottomLaceSource'] ?? '';
        $bottomLaceImage = $postData['female']['bottomLaceImage'] ?? '';
        if ($bottomLace === 'yes' && $bottomLaceSource === 'library' && $bottomLaceImage) {
            $imageName = getImageName($bottomLaceImage);
            if (isset($lacePrices[$imageName])) {
                $totalPrice += $lacePrices[$imageName];
            }
        }

        // Dupatta Lace
        $dupattaLace = $postData['female']['dupattaLace'] ?? 'no';
        $dupattaLaceSource = $postData['female']['dupattaLaceSource'] ?? '';
        $dupattaLaceImage = $postData['female']['dupattaLaceImage'] ?? '';
        if ($dupattaLace === 'yes' && $dupattaLaceSource === 'library' && $dupattaLaceImage) {
            $imageName = getImageName($dupattaLaceImage);
            if (isset($lacePrices[$imageName])) {
                $totalPrice += $lacePrices[$imageName];
            }
        }

        // Buttons
        $buttons = $postData['female']['buttons'] ?? 'no';
        $buttonType = $postData['female']['buttonType'] ?? '';
        if ($buttons === 'yes' && isset($buttonPrices[$buttonType])) {
            $totalPrice += $buttonPrices[$buttonType];
        }
    } else if ($activeTab === 'male') {
        $totalPrice += 1500; // Fixed stitching price

        // Buttons
        $buttons = $postData['male']['buttons'] ?? 'no';
        $buttonType = $postData['male']['buttonType'] ?? '';
        if ($buttons === 'yes' && isset($buttonPrices[$buttonType])) {
            $totalPrice += $buttonPrices[$buttonType];
        }
    }

    return $totalPrice;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // SMTP Configuration
    $smtpHost = 'smtp.gmail.com';
    $smtpPort = 587;
    $smtpUsername = 'sewdhaaga@gmail.com';
    $smtpPassword = 'hplc uayn ckxu mghl';
    $adminEmail = 'sewdhaaga@gmail.com';
    $fromEmail = 'sewdhaaga@gmail.com';
    $fromName = 'Sew Dhaaga';

    // Initialize PHPMailer
    $mail = new PHPMailer(true);

    try {
        // SMTP settings
        $mail->isSMTP();
        $mail->Host = $smtpHost;
        $mail->SMTPAuth = true;
        $mail->Username = $smtpUsername;
        $mail->Password = $smtpPassword;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = $smtpPort;

        // Common email settings
        $mail->setFrom($fromEmail, $fromName);
        $mail->isHTML(true);

        // Build order summary (for customer email)
        $summary = '<h2>Order Summary</h2>';
        // Build complete data (for admin email)
        $completeData = '<h2>New Order Details</h2>';

        // Get active tab
        $activeTab = $_POST['activeTab'] ?? 'female';

        // Process Female Tab Data (only if active tab is female)
        if ($activeTab === 'female' && !empty($_POST['female'])) {
            $summary .= '<h3>Female Clothing Customization</h3><ul>';
            $completeData .= '<h3>Female Clothing Customization</h3><ul>';
            $femaleData = [
                'suitType' => $_POST['female']['suitType'] ?? 'Not selected',
                'topSize' => $_POST['female']['topSize'] ?? 'Not selected',
                'sleeveLength' => $_POST['female']['sleeveLength'] ?? 'Not selected',
                'sleeveStyleImage' => $_POST['female']['sleeveStyleImage'] ?? 'Not selected',
                'customTopLength' => $_POST['female']['customTopLength'] ?? 'Not selected',
                'style' => $_POST['female']['style'] ?? 'Not selected',
                'styleImage' => $_POST['female']['styleImage'] ?? 'Not selected',
                'neckStyle' => $_POST['female']['neckStyle'] ?? 'Not selected',
                'damaan' => $_POST['female']['damaan'] ?? 'Not selected',
                'damaanImage' => $_POST['female']['damaanImage'] ?? 'Not selected',
                'lace' => $_POST['female']['lace'] ?? 'Not selected',
            ];

            // Lace Details
            $laceDetails = 'None';
            if ($femaleData['lace'] === 'yes') {
                $laceSource = $_POST['female']['laceSource'] ?? 'Not selected';
                $laceColor = $_POST['female']['laceColor'] ?? 'Not selected';
                $laceImage = $_POST['female']['laceImage'] ?? 'Not selected';
                $laceImageName = getImageName($laceImage);
                $lacePositions = !empty($_POST['female']['lacePosition']) ? implode(', ', $_POST['female']['lacePosition']) : 'Not selected';
                $laceDetails = "Source: $laceSource, Color: $laceColor, Image: $laceImageName, Positions: $lacePositions";
                $laceDetailsAdmin = "Source: $laceSource, Color: $laceColor, Image: $laceImageName ($laceImage), Positions: $lacePositions";
                $femaleData['laceSource'] = $laceSource;
                $femaleData['laceColor'] = $laceColor;
                $femaleData['laceImage'] = $laceImage;
                $femaleData['lacePosition'] = $lacePositions;
            }
            $femaleData['laceDetails'] = $laceDetails;

            // Buttons Details
            $buttons = $_POST['female']['buttons'] ?? 'Not selected';
            $buttonDetails = 'None';
            $buttonDetailsAdmin = 'None';
            if ($buttons === 'yes') {
                $buttonType = $_POST['female']['buttonType'] ?? 'Not selected';
                $buttonStyle = $_POST['female']['buttonStyle'] ?? 'Not selected';
                $buttonImage = $_POST['female']['buttonImage'] ?? 'Not selected';
                $buttonStyleImage = $_POST['female']['buttonStyleImage'] ?? 'Not selected';
                $buttonImageName = getImageName($buttonImage);
                $buttonStyleImageName = getImageName($buttonStyleImage);
                $buttonDetails = "Type: $buttonType, Style: $buttonStyle, Image: $buttonImageName, Style Image: $buttonStyleImageName";
                $buttonDetailsAdmin = "Type: $buttonType, Style: $buttonStyle, Image: $buttonImageName ($buttonImage), Style Image: $buttonStyleImageName ($buttonStyleImage)";
                $femaleData['buttonType'] = $buttonType;
                $femaleData['buttonStyle'] = $buttonStyle;
                $femaleData['buttonImage'] = $buttonImage;
                $femaleData['buttonStyleImage'] = $buttonStyleImage;
            }
            $femaleData['buttons'] = $buttons;
            $femaleData['buttonDetails'] = $buttonDetails;

            // Bottom Details
            $femaleData['bottomType'] = $_POST['female']['bottomType'] ?? 'Not selected';
            $femaleData['bottomSize'] = $_POST['female']['bottomSize'] ?? 'Not selected';
            $femaleData['customBottomLength'] = $_POST['female']['customBottomLength'] ?? 'Not selected';
            $femaleData['bottomStyleImage'] = $_POST['female']['bottomStyleImage'] ?? 'Not selected';
            $bottomLace = $_POST['female']['bottomLace'] ?? 'Not selected';
            $bottomLaceDetails = 'None';
            $bottomLaceDetailsAdmin = 'None';
            if ($bottomLace === 'yes') {
                $bottomLaceSource = $_POST['female']['bottomLaceSource'] ?? 'Not selected';
                $bottomLaceColor = $_POST['female']['bottomLaceColor'] ?? 'Not selected';
                $bottomLaceImage = $_POST['female']['bottomLaceImage'] ?? 'Not selected';
                $bottomLaceImageName = getImageName($bottomLaceImage);
                $bottomLaceDetails = "Source: $bottomLaceSource, Color: $bottomLaceColor, Image: $bottomLaceImageName";
                $bottomLaceDetailsAdmin = "Source: $bottomLaceSource, Color: $bottomLaceColor, Image: $bottomLaceImageName ($bottomLaceImage)";
                $femaleData['bottomLaceSource'] = $bottomLaceSource;
                $femaleData['bottomLaceColor'] = $bottomLaceColor;
                $femaleData['bottomLaceImage'] = $bottomLaceImage;
            }
            $femaleData['bottomLace'] = $bottomLace;
            $femaleData['bottomLaceDetails'] = $bottomLaceDetails;

            // Dupatta Details
            $dupattaLace = $_POST['female']['dupattaLace'] ?? 'Not selected';
            $dupattaLaceDetails = 'None';
            $dupattaLaceDetailsAdmin = 'None';
            if ($dupattaLace === 'yes') {
                $dupattaLaceSource = $_POST['female']['dupattaLaceSource'] ?? 'Not selected';
                $dupattaLaceColor = $_POST['female']['dupattaLaceColor'] ?? 'Not selected';
                $dupattaLaceImage = $_POST['female']['dupattaLaceImage'] ?? 'Not selected';
                $dupattaLacePosition = $_POST['female']['dupattaLacePosition'] ?? 'Not selected';
                $dupattaLaceImageName = getImageName($dupattaLaceImage);
                $dupattaLaceDetails = "Source: $dupattaLaceSource, Color: $dupattaLaceColor, Image: $dupattaLaceImageName, Position: $dupattaLacePosition";
                $dupattaLaceDetailsAdmin = "Source: $dupattaLaceSource, Color: $dupattaLaceColor, Image: $dupattaLaceImageName ($dupattaLaceImage), Position: $dupattaLacePosition";
                $femaleData['dupattaLaceSource'] = $dupattaLaceSource;
                $femaleData['dupattaLaceColor'] = $dupattaLaceColor;
                $femaleData['dupattaLaceImage'] = $dupattaLaceImage;
                $femaleData['dupattaLacePosition'] = $dupattaLacePosition;
            }
            $femaleData['dupattaLace'] = $dupattaLace;
            $femaleData['dupattaLaceDetails'] = $dupattaLaceDetails;

            // Add to summary with prices (customer email)
            $suitType = $femaleData['suitType'];
            $suitTypePrice = $suitTypePrices[$suitType] ?? 0;
            $summary .= "<li>Suit Type: $suitType - PKR $suitTypePrice</li>";
            $completeData .= "<li>Suit Type: $suitType - PKR $suitTypePrice</li>";

            $summary .= "<li>Top Size: {$femaleData['topSize']}</li>";
            $summary .= "<li>Sleeve Length: {$femaleData['sleeveLength']}</li>";
            $summary .= "<li>Sleeve Style Image: " . getImageName($femaleData['sleeveStyleImage']) . "</li>";
            $summary .= "<li>Custom Top Length: {$femaleData['customTopLength']} inches</li>";
            $summary .= "<li>Style: {$femaleData['style']}</li>";
            $summary .= "<li>Style Image: " . getImageName($femaleData['styleImage']) . "</li>";
            $summary .= "<li>Neck Style: {$femaleData['neckStyle']}</li>";
            $summary .= "<li>Damaan: {$femaleData['damaan']}</li>";
            $summary .= "<li>Damaan Image: " . getImageName($femaleData['damaanImage']) . "</li>";
            $summary .= "<li>Lace: {$femaleData['lace']} ($laceDetails)</li>";

            if ($femaleData['lace'] === 'yes' && $femaleData['laceSource'] === 'library') {
                $laceImageName = getImageName($femaleData['laceImage']);
                $lacePrice = $lacePrices[$laceImageName] ?? 0;
                $summary .= "<li>Top Lace: $laceImageName - PKR $lacePrice per gazz</li>";
                $completeData .= "<li>Top Lace: $laceImageName - PKR $lacePrice per gazz</li>";
            }

            $summary .= "<li>Buttons: {$femaleData['buttons']} ($buttonDetails)</li>";
            if ($femaleData['buttons'] === 'yes') {
                $buttonType = $femaleData['buttonType'];
                $buttonPrice = $buttonPrices[$buttonType] ?? 0;
                $summary .= "<li>Buttons: $buttonType - PKR $buttonPrice</li>";
                $completeData .= "<li>Buttons: $buttonType - PKR $buttonPrice</li>";
            }

            $summary .= "<li>Bottom Type: {$femaleData['bottomType']}</li>";
            $summary .= "<li>Bottom Size: {$femaleData['bottomSize']}</li>";
            $summary .= "<li>Custom Bottom Length: {$femaleData['customBottomLength']} inches</li>";
            $summary .= "<li>Bottom Style Image: " . getImageName($femaleData['bottomStyleImage']) . "</li>";
            $summary .= "<li>Bottom Lace: {$femaleData['bottomLace']} ($bottomLaceDetails)</li>";

            if ($femaleData['bottomLace'] === 'yes' && $femaleData['bottomLaceSource'] === 'library') {
                $bottomLaceImageName = getImageName($femaleData['bottomLaceImage']);
                $bottomLacePrice = $lacePrices[$bottomLaceImageName] ?? 0;
                $summary .= "<li>Bottom Lace: $bottomLaceImageName - PKR $bottomLacePrice per gazz</li>";
                $completeData .= "<li>Bottom Lace: $bottomLaceImageName - PKR $bottomLacePrice per gazz</li>";
            }

            $summary .= "<li>Dupatta Lace: {$femaleData['dupattaLace']} ($dupattaLaceDetails)</li>";
            if ($femaleData['dupattaLace'] === 'yes' && $femaleData['dupattaLaceSource'] === 'library') {
                $dupattaLaceImageName = getImageName($femaleData['dupattaLaceImage']);
                $dupattaLacePrice = $lacePrices[$dupattaLaceImageName] ?? 0;
                $summary .= "<li>Dupatta Lace: $dupattaLaceImageName - PKR $dupattaLacePrice per gazz</li>";
                $completeData .= "<li>Dupatta Lace: $dupattaLaceImageName - PKR $dupattaLacePrice per gazz</li>";
            }

            // Add to complete data (admin email)
            $completeData .= "<li>Top Size: {$femaleData['topSize']}</li>";
            $completeData .= "<li>Sleeve Length: {$femaleData['sleeveLength']}</li>";
            $completeData .= "<li>Sleeve Style Image: " . getImageName($femaleData['sleeveStyleImage']) . " ({$femaleData['sleeveStyleImage']})</li>";
            $completeData .= "<li>Custom Top Length: {$femaleData['customTopLength']} inches</li>";
            $completeData .= "<li>Style: {$femaleData['style']}</li>";
            $completeData .= "<li>Style Image: " . getImageName($femaleData['styleImage']) . " ({$femaleData['styleImage']})</li>";
            $completeData .= "<li>Neck Style: {$femaleData['neckStyle']}</li>";
            $completeData .= "<li>Damaan: {$femaleData['damaan']}</li>";
            $completeData .= "<li>Damaan Image: " . getImageName($femaleData['damaanImage']) . " ({$femaleData['damaanImage']})</li>";
            $completeData .= "<li>Lace: {$femaleData['lace']} ($laceDetailsAdmin)</li>";
            $completeData .= "<li>Buttons: {$femaleData['buttons']} ($buttonDetailsAdmin)</li>";
            $completeData .= "<li>Bottom Type: {$femaleData['bottomType']}</li>";
            $completeData .= "<li>Bottom Size: {$femaleData['bottomSize']}</li>";
            $completeData .= "<li>Custom Bottom Length: {$femaleData['customBottomLength']} inches</li>";
            $completeData .= "<li>Bottom Style Image: " . getImageName($femaleData['bottomStyleImage']) . " ({$femaleData['bottomStyleImage']})</li>";
            $completeData .= "<li>Bottom Lace: {$femaleData['bottomLace']} ($bottomLaceDetailsAdmin)</li>";
            $completeData .= "<li>Dupatta Lace: {$femaleData['dupattaLace']} ($dupattaLaceDetailsAdmin)</li>";

            $summary .= '</ul>';
            $completeData .= '</ul>';
        }

        // Process Male Tab Data (only if active tab is male)
        if ($activeTab === 'male' && !empty($_POST['male'])) {
            $summary .= '<h3>Male Clothing Customization</h3><ul>';
            $completeData .= '<h3>Male Clothing Customization</h3><ul>';
            $maleData = [
                'style' => $_POST['male']['style'] ?? 'Not selected',
                'size' => $_POST['male']['size'] ?? 'Not selected',
                'customTopLength' => $_POST['male']['customTopLength'] ?? 'Not selected',
                'collarStyle' => $_POST['male']['collarStyle'] ?? 'Not selected',
                'collarImage' => $_POST['male']['collarImage'] ?? 'Not selected',
                'damaan' => $_POST['male']['damaan'] ?? 'Not selected',
                'damaanImage' => $_POST['male']['damaanImage'] ?? 'Not selected',
                'buttons' => $_POST['male']['buttons'] ?? 'Not selected',
                'sleeves' => $_POST['male']['sleeves'] ?? 'Not selected',
                'sleevesImage' => $_POST['male']['sleevesImage'] ?? 'Not selected',
                'bottomType' => $_POST['male']['bottomType'] ?? 'Not selected',
                'bottomSize' => $_POST['male']['bottomSize'] ?? 'Not selected',
                'customBottomLength' => $_POST['male']['customBottomLength'] ?? 'Not selected',
                'bottomStyleImage' => $_POST['male']['bottomStyleImage'] ?? 'Not selected',
            ];

            // Buttons Details
            $buttonDetails = 'None';
            $buttonDetailsAdmin = 'None';
            if ($maleData['buttons'] === 'yes') {
                $buttonType = $_POST['male']['buttonType'] ?? 'Not selected';
                $buttonStyle = $_POST['male']['buttonStyle'] ?? 'Not selected';
                $buttonImage = $_POST['male']['buttonImage'] ?? 'Not selected';
                $buttonStyleImage = $_POST['male']['buttonStyleImage'] ?? 'Not selected';
                $buttonImageName = getImageName($buttonImage);
                $buttonStyleImageName = getImageName($buttonStyleImage);
                $buttonDetails = "Type: $buttonType, Style: $buttonStyle, Image: $buttonImageName, Style Image: $buttonStyleImageName";
                $buttonDetailsAdmin = "Type: $buttonType, Style: $buttonStyle, Image: $buttonImageName ($buttonImage), Style Image: $buttonStyleImageName ($buttonStyleImage)";
                $maleData['buttonType'] = $buttonType;
                $maleData['buttonStyle'] = $buttonStyle;
                $maleData['buttonImage'] = $buttonImage;
                $maleData['buttonStyleImage'] = $buttonStyleImage;
            }
            $maleData['buttonDetails'] = $buttonDetails;

            // Add to summary with prices (customer email)
            $summary .= "<li>Style: {$maleData['style']}</li>";
            $summary .= "<li>Size: {$maleData['size']}</li>";
            $summary .= "<li>Custom Top Length: {$maleData['customTopLength']} inches</li>";
            $summary .= "<li>Collar Style: {$maleData['collarStyle']}</li>";
            $summary .= "<li>Collar Image: " . getImageName($maleData['collarImage']) . "</li>";
            $summary .= "<li>Damaan: {$maleData['damaan']}</li>";
            $summary .= "<li>Damaan Image: " . getImageName($maleData['damaanImage']) . "</li>";
            $summary .= "<li>Stitching: PKR 1500</li>";
            $summary .= "<li>Buttons: {$maleData['buttons']} ($buttonDetails)</li>";
            if ($maleData['buttons'] === 'yes') {
                $buttonType = $maleData['buttonType'];
                $buttonPrice = $buttonPrices[$buttonType] ?? 0;
                $summary .= "<li>Buttons: $buttonType - PKR $buttonPrice</li>";
                $completeData .= "<li>Buttons: $buttonType - PKR $buttonPrice</li>";
            }
            $summary .= "<li>Sleeves: {$maleData['sleeves']}</li>";
            $summary .= "<li>Sleeves Image: " . getImageName($maleData['sleevesImage']) . "</li>";
            $summary .= "<li>Bottom Type: {$maleData['bottomType']}</li>";
            $summary .= "<li>Bottom Size: {$maleData['bottomSize']}</li>";
            $summary .= "<li>Custom Bottom Length: {$maleData['customBottomLength']} inches</li>";
            $summary .= "<li>Bottom Style Image: " . getImageName($maleData['bottomStyleImage']) . "</li>";

            // Add to complete data with prices (admin email)
            $completeData .= "<li>Style: {$maleData['style']}</li>";
            $completeData .= "<li>Size: {$maleData['size']}</li>";
            $completeData .= "<li>Custom Top Length: {$maleData['customTopLength']} inches</li>";
            $completeData .= "<li>Collar Style: {$maleData['collarStyle']}</li>";
            $completeData .= "<li>Collar Image: " . getImageName($maleData['collarImage']) . " ({$maleData['collarImage']})</li>";
            $completeData .= "<li>Damaan: {$maleData['damaan']}</li>";
            $completeData .= "<li>Damaan Image: " . getImageName($maleData['damaanImage']) . " ({$maleData['damaanImage']})</li>";
            $completeData .= "<li>Stitching: PKR 1500</li>";
            $completeData .= "<li>Buttons: {$maleData['buttons']} ($buttonDetailsAdmin)</li>";
            $completeData .= "<li>Sleeves: {$maleData['sleeves']}</li>";
            $completeData .= "<li>Sleeves Image: " . getImageName($maleData['sleevesImage']) . " ({$maleData['sleevesImage']})</li>";
            $completeData .= "<li>Bottom Type: {$maleData['bottomType']}</li>";
            $completeData .= "<li>Bottom Size: {$maleData['bottomSize']}</li>";
            $completeData .= "<li>Custom Bottom Length: {$maleData['customBottomLength']} inches</li>";
            $completeData .= "<li>Bottom Style Image: " . getImageName($maleData['bottomStyleImage']) . " ({$maleData['bottomStyleImage']})</li>";

            $summary .= '</ul>';
            $completeData .= '</ul>';
        }

        // Process Address Data
        $addressData = [
            'fullName' => $_POST['address']['fullName'] ?? 'Not provided',
            'email' => $_POST['address']['email'] ?? 'Not provided',
            'streetAddress' => $_POST['address']['streetAddress'] ?? 'Not provided',
            'city' => $_POST['address']['city'] ?? 'Not provided',
            'postalCode' => $_POST['address']['postalCode'] ?? 'Not provided',
            'phone' => $_POST['address']['phone'] ?? 'Not provided',
        ];

        $summary .= '<h3>Address Details</h3><ul>';
        $completeData .= '<h3>Address Details</h3><ul>';
        foreach ($addressData as $key => $value) {
            $label = ucfirst(str_replace('_', ' ', $key));
            $summary .= "<li>$label: " . htmlspecialchars($value) . "</li>";
            $completeData .= "<li>$label: " . htmlspecialchars($value) . "</li>";
        }
        $summary .= '</ul>';
        $completeData .= '</ul>';

        // Calculate total price
        $totalPrice = calculateTotalPrice($activeTab, $_POST);

        // Add total price and notes to customer email
        $summary .= "<p><strong>Total Estimated Price: PKR $totalPrice</strong></p>";
        if ($activeTab === 'female') {
            $summary .= "<p>Note: Lace prices are per gazz. The total price is estimated based on standard usage.</p>";
        }
        $summary .= "<p>We will call you soon for confirmation and to arrange the unstitched suit pickup.</p>";

        // Add total price to admin email
        $completeData .= "<p><strong>Total Estimated Price: PKR $totalPrice</strong></p>";

        // 1. Send Customer Confirmation Email
        $customerEmail = $addressData['email'];
        if (!empty($customerEmail) && filter_var($customerEmail, FILTER_VALIDATE_EMAIL)) {
            $mail->addAddress($customerEmail, $addressData['fullName']);
            $mail->Subject = 'Sew Dhaaga - Order Confirmation';
            $mail->Body = "<html><body>";
            $mail->Body .= "<h1>Thank You for Your Order!</h1>";
            $mail->Body .= "<p>Dear {$addressData['fullName']},</p>";
            $mail->Body .= "<p>We have successfully received your clothing customization order. Below is a summary of your selections:</p>";
            $mail->Body .= $summary;
            $mail->Body .= "<p>Best regards,<br>Sew Dhaaga Team</p>";
            $mail->Body .= "</body></html>";

            $mail->send();
            $mail->clearAddresses();
        } else {
            throw new Exception('Invalid customer email address');
        }

        // 2. Send Admin Notification Email
        $mail->addAddress($adminEmail, 'Sew Dhaaga Admin');
        $mail->Subject = 'New Clothing Customization Order';
        $mail->Body = "<html><body>";
        $mail->Body .= "<h1>New Order Received</h1>";
        $mail->Body .= "<p>A new clothing customization order has been placed. Below are the complete details:</p>";
        $mail->Body .= $completeData;
        $mail->Body .= "<p>Please review and process the order accordingly.</p>";
        $mail->Body .= "<p>Best regards,<br>Sew Dhaaga System</p>";
        $mail->Body .= "</body></html>";

        $mail->send();

        // Redirect on success
        header("Location: services.php?status=success");
        exit();
    } catch (Exception $e) {
        // Log error
        error_log("Email sending failed: {$mail->ErrorInfo}");
        header("Location: services.php?status=error&message=" . urlencode("Failed to send emails: {$mail->ErrorInfo}"));
        exit();
    }
} else {
    // Invalid request
    header("Location: services.php?status=error&message=Invalid request");
    exit();
}
