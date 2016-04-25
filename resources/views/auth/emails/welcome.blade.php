<h1>Welcome to Ismartz.com</h1>
<h3>We warmly welcome you to our website.</h3>
<p>
    You need to just complete final step for completing your registration. Please Activate Your Account to enjoy our website services.
    <a href="{{ url('signup/activate/',$user->activate_token) }}"><button>Activate Your Account</button></a>
</p>

if you the button doesn't work please goto this link --------->>>-------- {{ route('signup.activate',$user->activate_token) }} -----------<<<---------