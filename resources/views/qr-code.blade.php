<!DOCTYPE html>
<html>
<head>
    <title>How to generate QR Code with example in Laravel PHP</title>
</head>
<body>

<div class="visible-print text-center">

    {!! QrCode::size(200)->generate('Qr code content - anything you want'); !!}

</div>

</body>
</html>
