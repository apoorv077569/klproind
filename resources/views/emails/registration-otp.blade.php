@component('mail::message')

# Email Verification

Please use the OTP below to verify your email address for registration.

<div style="text-align:center; margin: 30px 0;">
    <h1 style="letter-spacing: 10px; font-size: 40px; color: #333333; font-weight: bold;">{{ $otp }}</h1>
</div>

This OTP is valid for **10 minutes** only. Do not share it with anyone.

If you did not request this, please ignore this email.

@endcomponent
