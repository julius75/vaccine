<!DOCTYPE html>
<html>
<head>
    <title>How to generate QR Code with example in Laravel PHP</title>
</head>
<body>

<div class="visible-print text-center">
    <h1>Laravel PHP - QR Code Generator Example</h1>

    {!! QrCode::size(250)->generate('Qr code content - anything you want'); !!}

    <p>QR Code Example generated by laravel package</p>
</div>

</body>
</html>