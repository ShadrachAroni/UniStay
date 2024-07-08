<!DOCTYPE html>
<html>
<head>
    <title>Verification Link Status</title>
</head>
<body>
    @if ($verificationLinkSent)
        <p>The verification link has been sent.</p>
    @else
        <p>The verification link has not been sent.</p>
    @endif
</body>
</html>
