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

        // Validate total price
        $totalPrice = isset($_POST['totalPrice']) && is_numeric($_POST['totalPrice'])
            ? (int)$_POST['totalPrice']
            : 0;
        if ($totalPrice < 0 || $totalPrice > 100000) {
            throw new Exception('Invalid total price');
        }

        // Build order summary (for customer email)
        $summary = '<h2>Order Summary</h2>';
        // Build complete data (for admin email)
        $completeData = '<h2>New Order Details</h2>';

        // Get active tab
        $activeTab = $_POST['activeTab'] ?? 'female';

        // Process Female Tab Data
        if ($activeTab === 'female' && !empty($_POST['female'])) {
            $summary .= '<h3>Female Clothing Customization</h3><ul>';
            $completeData .= '<h3>Female Clothing Customization</h3><ul>';

            $suitType = $_POST['female']['suitType'] ?? '';
            $topSize = $_POST['female']['topSize'] ?? '';
            $style = $_POST['female']['style'] ?? '';
            $neckStyle = $_POST['female']['neckStyle'] ?? '';
            $styleImage = $_POST['female']['styleImage'] ?? '';
            $customTopLength = $_POST['female']['customTopLength'] ?? '';
            $sleeveLength = $_POST['female']['sleeveLength'] ?? '';
            $sleeveStyleImage = $_POST['female']['sleeveStyleImage'] ?? '';
            $customSleeveLength = $_POST['female']['customSleeveLength'] ?? '';
            $damaan = $_POST['female']['damaan'] ?? '';
            $damaanImage = $_POST['female']['damaanImage'] ?? '';
            $lace = $_POST['female']['lace'] ?? '';
            $laceSource = $_POST['female']['laceSource'] ?? '';
            $laceColor = $_POST['female']['laceColor'] ?? '';
            $topLaceImage = $_POST['female']['topLaceImage'] ?? '';
            $lacePosition = !empty($_POST['female']['lacePosition']) ? implode(', ', $_POST['female']['lacePosition']) : '';
            $buttons = $_POST['female']['buttons'] ?? '';
            $buttonStyle = $_POST['female']['buttonStyle'] ?? '';
            $buttonImage = $_POST['female']['buttonImage'] ?? '';
            $buttonStyleImage = $_POST['female']['buttonStyleImage'] ?? '';
            $bottomType = $_POST['female']['bottomType'] ?? '';
            $bottomSize = $_POST['female']['bottomSize'] ?? '';
            $customBottomLength = $_POST['female']['customBottomLength'] ?? '';
            $bottomStyleImage = $_POST['female']['bottomStyleImage'] ?? '';
            $bottomLace = $_POST['female']['bottomLace'] ?? '';
            $bottomLaceSource = $_POST['female']['bottomLaceSource'] ?? '';
            $bottomLaceColor = $_POST['female']['bottomLaceColor'] ?? '';
            $bottomLaceImage = $_POST['female']['bottomLaceImage'] ?? '';
            $dupattaLace = $_POST['female']['dupattaLace'] ?? '';
            $dupattaLaceSource = $_POST['female']['dupattaLaceSource'] ?? '';
            $dupattaLaceColor = $_POST['female']['dupattaLaceColor'] ?? '';
            $dupattaLaceImage = $_POST['female']['dupattaLaceImage'] ?? '';
            $dupattaLacePosition = $_POST['female']['dupattaLacePosition'] ?? '';

            if ($suitType) {
                $suitNames = [
                    '1piece' => '1 Piece Top Piece',
                    '2pieceTD' => '2 Piece Top and Dupatta',
                    '2pieceTB' => '2 Piece Top and Bottom',
                    '3piece' => '3 Piece Top, Bottom, and Dupatta',
                ];
                $summary .= "<li>Suit Type: " . ($suitNames[$suitType] ?? 'Not selected') . "</li>";
                $completeData .= "<li>Suit Type: " . ($suitNames[$suitType] ?? 'Not selected') . "</li>";
            }
            if ($topSize) {
                $summary .= "<li>Top Size: $topSize</li>";
                $completeData .= "<li>Top Size: $topSize</li>";
            }
            if ($style) {
                $summary .= "<li>Style: $style</li>";
                $completeData .= "<li>Style: $style</li>";
            }
            if ($neckStyle) {
                $summary .= "<li>Neck Style: $neckStyle</li>";
                $completeData .= "<li>Neck Style: $neckStyle</li>";
            }
            if ($styleImage) {
                $imageName = getImageName($styleImage);
                $summary .= "<li>Neck Style Preview: $imageName</li>";
                $completeData .= "<li>Neck Style Preview: $imageName ($styleImage)</li>";
            }
            if ($customTopLength) {
                $summary .= "<li>Custom Top Length: $customTopLength inches</li>";
                $completeData .= "<li>Custom Top Length: $customTopLength inches</li>";
            }
            if ($sleeveLength) {
                $summary .= "<li>Sleeve Length: $sleeveLength inches</li>";
                $completeData .= "<li>Sleeve Length: $sleeveLength inches</li>";
            }
            if ($sleeveStyleImage) {
                $imageName = getImageName($sleeveStyleImage);
                $summary .= "<li>Sleeve Style Preview: $imageName</li>";
                $completeData .= "<li>Sleeve Style Preview: $imageName ($sleeveStyleImage)</li>";
            }
            if ($customSleeveLength) {
                $summary .= "<li>Custom Sleeve Length: $customSleeveLength inches</li>";
                $completeData .= "<li>Custom Sleeve Length: $customSleeveLength inches</li>";
            }
            if ($damaan) {
                $summary .= "<li>Damaan: $damaan</li>";
                $completeData .= "<li>Damaan: $damaan</li>";
            }
            if ($damaanImage) {
                $imageName = getImageName($damaanImage);
                $summary .= "<li>Damaan Preview: $imageName</li>";
                $completeData .= "<li>Damaan Preview: $imageName ($damaanImage)</li>";
            }
            if ($lace) {
                $summary .= "<li>Add Lace on Damaan: " . ($lace === 'yes' ? 'Yes' : 'No') . "</li>";
                $completeData .= "<li>Add Lace on Damaan: " . ($lace === 'yes' ? 'Yes' : 'No') . "</li>";
            }
            if ($lace === 'yes') {
                $summary .= "<li>Lace Source: " . ($laceSource ?: 'Not selected') . "</li>";
                $completeData .= "<li>Lace Source: " . ($laceSource ?: 'Not selected') . "</li>";
                if ($laceSource === 'library') {
                    $summary .= "<li>Lace Color: " . ($laceColor ?: 'Not selected') . "</li>";
                    $completeData .= "<li>Lace Color: " . ($laceColor ?: 'Not selected') . "</li>";
                    $imageName = getImageName($topLaceImage);
                    $summary .= "<li>Top Lace Preview: $imageName</li>";
                    $completeData .= "<li>Top Lace Preview: $imageName ($topLaceImage)</li>";
                }
                $summary .= "<li>Lace Position: " . ($lacePosition ?: 'Not selected') . "</li>";
                $completeData .= "<li>Lace Position: " . ($lacePosition ?: 'Not selected') . "</li>";
            }
            if ($buttons) {
                $summary .= "<li>Add Buttons: " . ($buttons === 'yes' ? 'Yes' : 'No') . "</li>";
                $completeData .= "<li>Add Buttons: " . ($buttons === 'yes' ? 'Yes' : 'No') . "</li>";
            }
            if ($buttons === 'yes') {
                $summary .= "<li>Button Style: " . ($buttonStyle ?: 'Not selected') . "</li>";
                $completeData .= "<li>Button Style: " . ($buttonStyle ?: 'Not selected') . "</li>";
                $imageName = getImageName($buttonImage);
                $summary .= "<li>Button Preview: $imageName</li>";
                $completeData .= "<li>Button Preview: $imageName ($buttonImage)</li>";
                $imageName = getImageName($buttonStyleImage);
                $summary .= "<li>Button Placket Style Preview: $imageName</li>";
                $completeData .= "<li>Button Placket Style Preview: $imageName ($buttonStyleImage)</li>";
            }
            if ($bottomType) {
                $summary .= "<li>Bottom Type: $bottomType</li>";
                $completeData .= "<li>Bottom Type: $bottomType</li>";
            }
            if ($bottomSize) {
                $summary .= "<li>Bottom Size: $bottomSize</li>";
                $completeData .= "<li>Bottom Size: $bottomSize</li>";
            }
            if ($customBottomLength) {
                $summary .= "<li>Custom Bottom Length: $customBottomLength inches</li>";
                $completeData .= "<li>Custom Bottom Length: $customBottomLength inches</li>";
            }
            if ($bottomStyleImage) {
                $imageName = getImageName($bottomStyleImage);
                $summary .= "<li>Bottom Style Preview: $imageName</li>";
                $completeData .= "<li>Bottom Style Preview: $imageName ($bottomStyleImage)</li>";
            }
            if ($bottomLace) {
                $summary .= "<li>Add Lace on Bottom: " . ($bottomLace === 'yes' ? 'Yes' : 'No') . "</li>";
                $completeData .= "<li>Add Lace on Bottom: " . ($bottomLace === 'yes' ? 'Yes' : 'No') . "</li>";
            }
            if ($bottomLace === 'yes') {
                $summary .= "<li>Bottom Lace Source: " . ($bottomLaceSource ?: 'Not selected') . "</li>";
                $completeData .= "<li>Bottom Lace Source: " . ($bottomLaceSource ?: 'Not selected') . "</li>";
                if ($bottomLaceSource === 'library') {
                    $summary .= "<li>Bottom Lace Color: " . ($bottomLaceColor ?: 'Not selected') . "</li>";
                    $completeData .= "<li>Bottom Lace Color: " . ($bottomLaceColor ?: 'Not selected') . "</li>";
                    $imageName = getImageName($bottomLaceImage);
                    $summary .= "<li>Bottom Lace Preview: $imageName</li>";
                    $completeData .= "<li>Bottom Lace Preview: $imageName ($bottomLaceImage)</li>";
                }
            }
            if ($dupattaLace) {
                $summary .= "<li>Add Lace on Dupatta: " . ($dupattaLace === 'yes' ? 'Yes' : 'No') . "</li>";
                $completeData .= "<li>Add Lace on Dupatta: " . ($dupattaLace === 'yes' ? 'Yes' : 'No') . "</li>";
            }
            if ($dupattaLace === 'yes') {
                $summary .= "<li>Dupatta Lace Source: " . ($dupattaLaceSource ?: 'Not selected') . "</li>";
                $completeData .= "<li>Dupatta Lace Source: " . ($dupattaLaceSource ?: 'Not selected') . "</li>";
                if ($dupattaLaceSource === 'library') {
                    $summary .= "<li>Dupatta Lace Color: " . ($dupattaLaceColor ?: 'Not selected') . "</li>";
                    $completeData .= "<li>Dupatta Lace Color: " . ($dupattaLaceColor ?: 'Not selected') . "</li>";
                    $imageName = getImageName($dupattaLaceImage);
                    $summary .= "<li>Dupatta Lace Preview: $imageName</li>";
                    $completeData .= "<li>Dupatta Lace Preview: $imageName ($dupattaLaceImage)</li>";
                }
                $summary .= "<li>Dupatta Lace Position: " . ($dupattaLacePosition ?: 'Not selected') . "</li>";
                $completeData .= "<li>Dupatta Lace Position: " . ($dupattaLacePosition ?: 'Not selected') . "</li>";
            }

            $summary .= '</ul>';
            $completeData .= '</ul>';
        }

        // Process Male Tab Data
        if ($activeTab === 'male' && !empty($_POST['male'])) {
            $summary .= '<h3>Male Clothing Customization</h3><ul>';
            $completeData .= '<h3>Male Clothing Customization</h3><ul>';

            $style = $_POST['male']['style'] ?? '';
            $size = $_POST['male']['size'] ?? '';
            $customTopLength = $_POST['male']['customTopLength'] ?? '';
            $collarStyle = $_POST['male']['collarStyle'] ?? '';
            $collarImage = $_POST['male']['collarImage'] ?? '';
            $damaan = $_POST['male']['damaan'] ?? '';
            $damaanImage = $_POST['male']['damaanImage'] ?? '';
            $buttons = $_POST['male']['buttons'] ?? '';
            $buttonSource = $_POST['male']['maleButtonSource'] ?? '';
            $buttonStyle = $_POST['male']['maleButtonStyle'] ?? '';
            $buttonImage = $_POST['male']['maleButtonImage'] ?? '';
            $buttonStyleImage = $_POST['male']['maleButtonStyleImage'] ?? '';
            $sleeves = $_POST['male']['sleeves'] ?? '';
            $sleevesImage = $_POST['male']['sleevesImage'] ?? '';
            $bottomType = $_POST['male']['bottomType'] ?? '';
            $bottomSize = $_POST['male']['bottomSize'] ?? '';
            $customBottomLength = $_POST['male']['customBottomLength'] ?? '';
            $bottomStyleImage = $_POST['male']['bottomStyleImage'] ?? '';

            if ($style) {
                $summary .= "<li>Style: $style</li>";
                $completeData .= "<li>Style: $style</li>";
            }
            if ($size) {
                $summary .= "<li>Size: $size</li>";
                $completeData .= "<li>Size: $size</li>";
            }
            if ($customTopLength) {
                $summary .= "<li>Custom Top Length: $customTopLength inches</li>";
                $completeData .= "<li>Custom Top Length: $customTopLength inches</li>";
            }
            if ($collarStyle) {
                $summary .= "<li>Collar Style: $collarStyle</li>";
                $completeData .= "<li>Collar Style: $collarStyle</li>";
            }
            if ($collarImage) {
                $imageName = getImageName($collarImage);
                $summary .= "<li>Collar Preview: $imageName</li>";
                $completeData .= "<li>Collar Preview: $imageName ($collarImage)</li>";
            }
            if ($damaan) {
                $summary .= "<li>Damaan: $damaan</li>";
                $completeData .= "<li>Damaan: $damaan</li>";
            }
            if ($damaanImage) {
                $imageName = getImageName($damaanImage);
                $summary .= "<li>Damaan Preview: $imageName</li>";
                $completeData .= "<li>Damaan Preview: $imageName ($damaanImage)</li>";
            }
            if ($buttons) {
                $summary .= "<li>Add Buttons: " . ($buttons === 'yes' ? 'Yes' : 'No') . "</li>";
                $completeData .= "<li>Add Buttons: " . ($buttons === 'yes' ? 'Yes' : 'No') . "</li>";
            }
            if ($buttons === 'yes') {
                $summary .= "<li>Button Source: " . ($buttonSource ?: 'Not selected') . "</li>";
                $completeData .= "<li>Button Source: " . ($buttonSource ?: 'Not selected') . "</li>";
                if ($buttonSource === 'library') {
                    $imageName = getImageName($buttonImage);
                    $summary .= "<li>Button Preview: $imageName</li>";
                    $completeData .= "<li>Button Preview: $imageName ($buttonImage)</li>";
                }
                $summary .= "<li>Button Style: " . ($buttonStyle ?: 'Not selected') . "</li>";
                $completeData .= "<li>Button Style: " . ($buttonStyle ?: 'Not selected') . "</li>";
                if ($buttonStyle) {
                    $imageName = getImageName($buttonStyleImage);
                    $summary .= "<li>Button Style Preview: $imageName</li>";
                    $completeData .= "<li>Button Style Preview: $imageName ($buttonStyleImage)</li>";
                }
            }
            if ($sleeves) {
                $summary .= "<li>Sleeves: $sleeves</li>";
                $completeData .= "<li>Sleeves: $sleeves</li>";
                if ($sleeves === 'Cuff') {
                    $summary .= "<li>Cuff Sleeves Extra: PKR 100 (includes 2 buttons per sleeve, total 4 buttons)</li>";
                    $completeData .= "<li>Cuff Sleeves Extra: PKR 100 (includes 2 buttons per sleeve, total 4 buttons)</li>";
                }
            }
            if ($sleevesImage) {
                $imageName = getImageName($sleevesImage);
                $summary .= "<li>Sleeves Preview: $imageName</li>";
                $completeData .= "<li>Sleeves Preview: $imageName ($sleevesImage)</li>";
            }
            if ($bottomType) {
                $summary .= "<li>Bottom Type: $bottomType</li>";
                $completeData .= "<li>Bottom Type: $bottomType</li>";
            }
            if ($bottomSize) {
                $summary .= "<li>Bottom Size: $bottomSize</li>";
                $completeData .= "<li>Bottom Size: $bottomSize</li>";
            }
            if ($customBottomLength) {
                $summary .= "<li>Custom Bottom Length: $customBottomLength inches</li>";
                $completeData .= "<li>Custom Bottom Length: $customBottomLength inches</li>";
            }
            if ($bottomStyleImage) {
                $imageName = getImageName($bottomStyleImage);
                $summary .= "<li>Bottom Style Preview: $imageName</li>";
                $completeData .= "<li>Bottom Style Preview: $imageName ($bottomStyleImage)</li>";
            }

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

        // Add total price to emails
        $summary .= "<p><strong>Total Estimated Price: PKR $totalPrice</strong></p>";
        $completeData .= "<p><strong>Total Estimated Price: PKR $totalPrice</strong></p>";

        // Add confirmation message to customer email
        $summary .= "<p>We will call you soon for confirmation and to arrange the unstitched suit pickup.</p>";
        if ($activeTab === 'female') {
            $summary .= "<p>Note: Lace prices are per gazz. The total price is estimated based on standard usage via call.</p>";
        }

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
