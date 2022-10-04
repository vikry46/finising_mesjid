<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Diagoona Template - Contact page</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" /> <!-- https://fonts.google.com/ -->
    <link href="{{ asset('landing_page') }}/css/bootstrap.min.css" rel="stylesheet" /> <!-- https://getbootstrap.com/ -->
    <link href="{{ asset('landing_page') }}/fontawesome/css/all.min.css" rel="stylesheet" /> <!-- https://fontawesome.com/ -->
    <link href="{{ asset('landing_page') }}/css/templatemo-diagoona.css" rel="stylesheet" />
<!--

TemplateMo 550 Diagoona

https://templatemo.com/tm-550-diagoona

-->
</head>
<body>
    <div class="tm-container">
        <div>
            <div class="tm-row pt-4">
                <div class="tm-col-left">
                    <div class="tm-site-header media">
                        <div class="media-body">
                            <h1 class="tm-sitename text-uppercase">{{ config('app.name') }}</h1>
                            <p class="tm-slogon">dangau baru kamang hilir</p>
                        </div>        
                    </div>
                </div>
                <div class="tm-col-right">
                    <nav class="navbar navbar-expand-lg" id="tm-main-nav">
                        <button class="navbar-toggler toggler-example mr-0 ml-auto" type="button" 
                            data-toggle="collapse" data-target="#navbar-nav" 
                            aria-controls="navbar-nav" aria-expanded="false" aria-label="Toggle navigation">
                            <span><i class="fas fa-bars"></i></span>
                        </button>
                        <div class="collapse navbar-collapse tm-nav" id="navbar-nav">
                            @include('layouts.landing')
                        </div>                        
                    </nav>
                </div>
            </div>
            
            <div class="tm-row">
                <div class="tm-col-left"></div>
                <main class="tm-col-right tm-contact-main"> <!-- Content -->
                    <section class="tm-content tm-contact">
                        <h2 class="mb-4 tm-content-title">Contact Us</h2>
                        <p class="mb-85">Masukan saran terbaik Anda dan insyaallah kami akan merespon saran anda</p>
                        <form id="contact-form" action="{{ route('kontak.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-4">
                                <input type="text" name="nama" class="form-control" placeholder="Nama" required="" />
                            </div>
                            <div class="form-group mb-4">
                                <input type="email" name="email" class="form-control" placeholder="Email" required="" />
                            </div>
                            <div class="form-group mb-5">
                                <textarea rows="6" name="masukan" class="form-control" placeholder="Masukan" required=""></textarea>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-big btn-primary">Kirim Masukan</button>
                            </div>
                        </form>
                    </section>
                </main>
            </div>
        </div>        

        <div class="tm-row">
            <div class="tm-col-left text-center">            
                <ul class="tm-bg-controls-wrapper">
                    <li class="tm-bg-control active" data-id="0"></li>
                    <li class="tm-bg-control" data-id="1"></li>
                    <li class="tm-bg-control" data-id="2"></li>
                </ul>            
            </div>        
            <div class="tm-col-right tm-col-footer">
                <footer class="tm-site-footer text-right">
                    <p class="mb-0"> 
                    by : Vikry Verdinal Hadrian
                     <a rel="nofollow" target="_parent" href="" class="tm-text-link"></a></p>
                </footer>
            </div>  
        </div>

        <div class="tm-bg"> <!-- Diagonal background design -->
            <div class="tm-bg-left"></div>
            <div class="tm-bg-right"></div>
        </div>
    </div>

    <script src="{{ asset('landing_page') }}/js/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('landing_page') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('landing_page') }}/js/jquery.backstretch.min.js"></script>
    <script src="{{ asset('landing_page') }}/js/templatemo-script.js"></script>
    @include('sweetalert::alert')

</body>
</html>