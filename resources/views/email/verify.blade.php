<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>

    <h2>Please verify Your Email Address</h2>

    <div>
        <p>Thanks for creating an account with Peanut Butter Sandwich.</p>
        <p>Please follow the link below to verify your email address:</p>
        <p>{{ URL::to('register/verify/' . $confirmationCode) }}</p>
    </div>

</body>
</html>