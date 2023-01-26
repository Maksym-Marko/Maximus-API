<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MAXIMUS API</title>

        <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/png" >
        
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body>
       
        <div class="container max-w-screen-xl mx-auto mb-20">

            <header class="mt-4 border-b-2 border-gray-300 py-5">
                <div class="flex items-center">
                    <h1 class="inline-block text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight dark:text-slate-200">MAXIMUS API</h1>
                </div>
            </header>

            <!-- Introduction -->
            <div class="mt-10">
                <div class="flex items-center">
                    <h2 class="inline-block text-2xl sm:text-3xl text-slate-900 tracking-tight dark:text-slate-200">
                        What is Maximus API?
                    </h2>
                </div>
            </div>

            <div>
                <p class="mt-2 text-lg text-slate-700 dark:text-slate-400">
                    Maximus API provides authentication, authorization for your web apps. Your users can sign in directly with a username and password.
                </p>
                <p class="mt-2 text-lg text-slate-700 dark:text-slate-400">
                    There is a user data pull for authorized users. You as a developer can manage the user's data in your web application (use username, email, id, created_at and updated_at for your purposes).
                </p>
                <p class="mt-2 text-lg text-slate-700 dark:text-slate-400">
                    User authorization through Maximus API based on API authentication using a random token assigned to each user of your application.
                </p>
            </div>

            <!--  Getting started -->
            <div class="mt-10">
                <div class="flex items-center">
                    <h2 class="inline-block text-2xl sm:text-3xl text-slate-900 tracking-tight dark:text-slate-200">
                        Getting started with Maximus API?
                    </h2>
                </div>
            </div>

            <div>
                <p class="mt-2 text-lg text-slate-700 dark:text-slate-400">
                    The Maximus API provides endpoint URLs for registration, authorization, email verification, password reset.
                </p>
                <p class="mt-2 text-lg text-slate-700 dark:text-slate-400">
                    Due to user authorization, after successful authentication, the server response contains a token. This token must be saved by your application and used for each future request as the "Bearer Token".
                </p>
                <p class="mt-2 text-lg text-slate-700 dark:text-slate-400">
                    The front-end part is fully under developer's responsibility, however you can use prebuilt starter kit for Vue.js 3 Single Page Application (SPA) - Maximus SPA (more details you can find here <a href="https://github.com/Maxim-us/Maximus-SPA" target="_blank" class="text-sky-500 hover:underline"><b>https://github.com/Maxim-us/Maximus-SPA</b></a>).
                </p>                

            </div>

            <!-- URLs -->
            <div>
                <p class="mt-2 text-lg text-slate-700 dark:text-slate-400 font-bold mt-5">
                    There are several API URLs you should know about:                    
                </p>                
            </div>

            <!-- Registration -->
            <div class="mb-6">
                <h3 class="text-2xl mt-4" id="Registration">
                    Registration:
                </h3>

                <div class="rounded-lg border-gray-300 bg-gray-100 p-4 my-2">                    
                    <span class="text-gray-300">POST:</span> https://api.markomaksym.com.ua/api/register
                </div>

                <p class="mt-2 text-lg text-slate-700 dark:text-slate-400">
                    For user registration, you must use an <b>unauthorized</b> POST request with the following parameters:
                </p>

                <ul class="list-disc pl-10">
                    <li>
                        <em>name</em>
                    </li>
                    <li>
                        <em>email</em>
                    </li>
                    <li>
                        <em>password</em>
                    </li>
                    <li>
                        <em>password_confirmation</em>
                    </li>
                </ul>
            </div>

            <!-- Login -->
            <div class="mb-6">
                <h3 class="text-2xl mt-4" id="login">
                    Login:
                </h3>

                <div class="rounded-lg border-gray-300 bg-gray-100 p-4 my-2">                    
                    <span class="text-gray-300">POST:</span> https://api.markomaksym.com.ua/api/login
                </div>

                <p class="mt-2 text-lg text-slate-700 dark:text-slate-400">
                    For user login, you must use an <b>unauthorized</b> POST request with the following parameters:
                </p>

                <ul class="list-disc pl-10">
                    <li>
                        <em>email</em>
                    </li>
                    <li>
                        <em>password</em>
                    </li>
                    <li>
                        <em>remember</em>
                    </li>
                </ul>
            </div>

            <!-- Sign out -->
            <div class="mb-6">
                <h3 class="text-2xl mt-4" id="sign_out">
                    Sign out:
                </h3>

                <div class="rounded-lg border-gray-300 bg-gray-100 p-4 my-2">                    
                    <span class="text-gray-300">POST:</span> https://api.markomaksym.com.ua/api/logout
                </div>

                <p class="mt-2 text-lg text-slate-700 dark:text-slate-400">
                    For sign out user, you must use an <b>authorized</b> POST request without any parameters.
                </p>
            </div>

            <!-- Email Verification (send url) -->
            <div class="mb-6">
                <h3 class="text-2xl mt-4" id="email_verification_send_url">
                    Email Verification (send url):
                </h3>

                <div class="rounded-lg border-gray-300 bg-gray-100 p-4 my-2">                    
                    <span class="text-gray-300">POST:</span> https://api.markomaksym.com.ua/api/send-email-verification-url
                </div>

                <p class="mt-2 text-lg text-slate-700 dark:text-slate-400">
                    To send email verification URL to user's email address, you must use an <b>authorized</b> POST request with following:
                </p>

                <ul class="list-disc pl-10">
                    <li>
                        <em>verificationUrl</em>
                    </li>
                </ul>

                <p class="mt-2 text-lg text-slate-700 dark:text-slate-400">
                    "verificationUrl" is an Base url of a page where user will be redirected from his/her email address (eg. http://domain.com/verify-email-check).
                </p>

            </div>

            <!-- Email Verification (check url) -->
            <div class="mb-6">
                <h3 class="text-2xl mt-4" id="email_verification_check_url">
                    Email Verification (check url):
                </h3>

                <div class="rounded-lg border-gray-300 bg-gray-100 p-4 my-2">                    
                    <span class="text-gray-300">POST:</span> https://api.markomaksym.com.ua/api/send-email-verification-check
                </div>

                <p class="mt-2 text-lg text-slate-700 dark:text-slate-400">
                    To check email verification URL from user's email address, you can use an <b>unauthorized</b> or an <b>authorized</b> POST request with following parameters:
                </p>

                <ul class="list-disc pl-10">
                    <li>
                        <em>id</em>
                    </li>
                    <li>
                        <em>hash</em>
                    </li>
                </ul>

                <p class="mt-2 text-lg text-slate-700 dark:text-slate-400">
                    "id" is an id of the current user. "hash" is an automatically generated string from email verification URL (eg. http://domain.com/verify-email-check?id=24&hash=d1D/2aMqY5AVUNjRsaqsK.W56oYS5ltgnJUod3IgJVjKcfxBkJXPu).
                </p>

            </div>

            <!-- Forgot password -->
            <div class="mb-6">
                <h3 class="text-2xl mt-4" id="forgot_password">
                    Forgot password:
                </h3>

                <div class="rounded-lg border-gray-300 bg-gray-100 p-4 my-2">                    
                    <span class="text-gray-300">POST:</span> https://api.markomaksym.com.ua/api/forgot-password
                </div>

                <p class="mt-2 text-lg text-slate-700 dark:text-slate-400">
                    To send forgot password URL to user's email address, you must use an <b>authorized</b> POST request with following parameters:
                </p>

                <ul class="list-disc pl-10">
                    <li>
                        <em>email</em>
                    </li>
                    <li>
                        <em>resetPasswordUrl</em>
                    </li>
                </ul>

                <p class="mt-2 text-lg text-slate-700 dark:text-slate-400">
                    "email" is an email of the current user. "resetPasswordUrl" is an Base url of a page where user will be redirected from his/her email address (eg. http://domain.com/reset-password).
                </p>

            </div>

            <!-- Reset password -->
            <div class="mb-6">
                <h3 class="text-2xl mt-4" id="reset_password">
                    Reset password:
                </h3>

                <div class="rounded-lg border-gray-300 bg-gray-100 p-4 my-2">                    
                    <span class="text-gray-300">POST:</span> https://api.markomaksym.com.ua/api/reset-password
                </div>

                <p class="mt-2 text-lg text-slate-700 dark:text-slate-400">
                    To reset password you must handle reset password URL from user's email address, using an <b>authorized</b> POST request with following parameters:
                </p>

                <ul class="list-disc pl-10">
                    <li>
                        <em>email</em>
                    </li>
                    <li>
                        <em>password</em>
                    </li>
                    <li>
                        <em>password_confirmation</em>
                    </li>
                    <li>
                        <em>token</em>
                    </li>
                </ul>

                <p class="mt-2 text-lg text-slate-700 dark:text-slate-400">
                    "token" is an automatically generated string in URL (eg. http://domain.com/reset-password?token=y10$oGbE99vXTLTeTC.k7QVgiOFvtmB1dLY4dXRnteLgTzRKNKYjfLQWS).
                </p>

            </div>

            <!-- Get User Data -->
            <div class="mb-6">
                <h3 class="text-2xl mt-4" id="get_user_data">
                    Get User Data:
                </h3>

                <div class="rounded-lg border-gray-300 bg-gray-100 p-4 my-2">                    
                    <span class="text-gray-300">GET:</span> https://api.markomaksym.com.ua/api/user
                </div>

                <p class="mt-2 text-lg text-slate-700 dark:text-slate-400">
                    To get user's data you must use an <b>authorized</b> GET request with Bearer Token generated after successful login request.
                </p>

            </div>
        
        </div>

        <div class="container max-w-screen-xl mx-auto mb-20">
            <h3 class="text-2xl mt-4" id="get_user_data">
                Video guide:
            </h3><br>

            <iframe width="100%" height="600" src="https://www.youtube.com/embed/A4qdZJFNWu8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

        </div>

        <div class="container max-w-screen-xl mx-auto mb-20 italic">
            <p>
                If you want to configure the API and run it on your own host, please find the code here: 
                <a href="https://github.com/Maxim-us/Laravel-Vue3-Breeze" target="_blank">https://github.com/Maxim-us/Laravel-Vue3-Breeze</a>
            </p>
            
        </div>

        <!-- Footer -->
        <footer class="bg-gray-600">
            <div class="max-w-screen-xl mx-auto text-center text-base text-white py-10">
                E-mail: support@markomaksym.com.ua | Copyright © 2023 | <a href="https://markomaksym.com.ua/" target="_blank">markomaksym.com.ua</a> 
            </div>
        </footer>

    </body>
</html>