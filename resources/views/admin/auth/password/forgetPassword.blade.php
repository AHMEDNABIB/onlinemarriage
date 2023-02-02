<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="Rubik, sans-serif;background:#f4f4f4;">
    <div style="margin:0 auto;text-align:center; padding:25px;width:70%;background:#fff; border-radius:5px;">
        <h2>We received a request to reset the password for your account.</h2>
        <p style="margin:25px;">
            We received a request to reset the password for your account. To reset Password, Please click the link below.
        </p>
        <br>
        <a href="{{ route('admin.reset.password.get', $token) }}" style="background:#0078c1; text-decoration:none;color:#fff;padding:10px 25px;">Reset Password</a> 
        <br><br>
        <p style="margin-top:15px; text-align:justify;">
            A password reset request can be made by anyone, and while it does not indicate that your account is in any danger of being accessed by someone else, we do recommend that you ensure that you are using a secure and unique password to protect your account. We also suggest using a different password for every online account that you have.
        </p>
        <br>
        <p style="text-align:left;">
           <strong> Best Regards,</strong><br>
            -Noakhali Science and Technology University

        </p>
    </div>
</body>
</html>