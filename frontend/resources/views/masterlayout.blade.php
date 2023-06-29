<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Joke</title>
        <link rel="stylesheet" style="style/sheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" style="style/sheet" href="{{asset('css/bootstrap.min.css.map')}}">
        <link rel="stylesheet" style="style/sheet" href="{{asset('css/home.css')}}">
        <link rel="stylesheet" style="style/sheet" href="{{asset('css/login.css')}}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <script src="{{asset('js/home.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="{{ asset('js/bootstrap.js') }}"></script>
    </head>
    <body>
        <div class="header">
            <div class="header-wrap">
                <div class="header-logo">
                    <nav class="navbar bg-body-tertiary">
                        <div class="container-fluid">
                        <a class="navbar-brand mb-0 h1" href="{{URL::to('/')}}">Logo</a>
                        </div>
                    </nav>
                </div>
                <div class="header-login">
                    @php
                        $username = Session::get('username');
                        $fullname = Session::get('fullname');
                    @endphp
                    @if(isset($username))
                        <div class="header-name">
                            <p>{{ $username }}</p>
                            <p>{{ $fullname }}</p>
                        </div>
                        <div class="header-avatar">
                            <img src="{{asset('img/1.PNG')}}" alt="{{ $fullname }}"/>
                        </div>
                    @else
                        <a class="nav-link active" href="{{URL::to('/login')}}">Login</a>
                        <a class="nav-link active" href="{{URL::to('/register')}}">Register</a>
                    @endif
                </div>
            </div>
        </div>
        <div>
            @yield('home')
            @yield('login')
            @yield('register')
        </div>
        <div class="footer">
            <div class="footer-content">
                <p>
                    This website is created as part of Hlsolutions program. The materials contained 
                    on this wwebsite are provided of general infomation only and do not constitute any form 
                    of advice. HSL assumes no responsibility for the accuracy of any particular statements 
                    and accepts no liability for nay loss or damage which may arise from reliance on the information
                    contained on this site.
                </p>
             </div>
             <div class="footer-copyright">
                Copyright 2021 HSL
             </div>
        </div>
    </body>
</html>
