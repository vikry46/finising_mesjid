<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mesjid Taqwim</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" /> <!-- https://fonts.google.com/ -->
    <link href="{{ asset('landing_page') }}/css/bootstrap.min.css" rel="stylesheet" /> <!-- https://getbootstrap.com/ -->
    <link href="{{ asset('landing_page') }}/fontawesome/css/all.min.css" rel="stylesheet" /> <!-- https://fontawesome.com/ -->
    <link href="{{ asset('landing_page') }}/css/templatemo-diagoona.css" rel="stylesheet" />
<!--

TemplateMo 550 Diagoona

https://templatemo.com/tm-550-diagoona

-->
</head>

<body background="landing_page/img/index.jpg">
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
                  @include('layouts.landing')
                </div>
            </div>
            
            <div class="tm-row">
                <div class="tm-col-left"></div>
                <main class="tm-col-right">
                    <section class="tm-content">
                        <h2 class="mb-5 tm-content-title">Visi</h2>
                        <p class="mb-5">Terwujudnya masjid yang makmur sebagai sentra peribadatan dan pemberdayaan umat islam.</p>
                        <hr class="mb-5">
                        <h2 class="mb-5 tm-content-title">Misi</h2>
                        <p class="mb-5">a.	Mengembangkan dakwah dan pembinaan ummat Islam, melalui Khutbah Jumat, kegiatan hari-hari besar Islam, Majelis Ta’lim, dan kajian-kajian yang berkesinambungan.</p>                      
                        <p class="mb-5">b.	Mengajak seluruh masyarakat untuk bersama-sama memakmurkan masjid dalam peningkatan kualitas keimanan dan ketaqwaan melalui berbagai kegiatan keagamaan.</p>                      
                        <p class="mb-5">c.	Menjaga dan memelihara keindahan, ketertiban dan kebersihan masjid sehingga memberikan suasanan yang nyaman, aman dan kondusif bagi jamaah dan siapa saja yang datang ke Masjid Taqwim.</p>                      
                    </section>
                </main>
            </div>
        </div>        

        <div class="tm-row">
            {{-- <div class="tm-col-left text-center">            
                <ul class="tm-bg-controls-wrapper">
                    <li class="tm-bg-control active" data-id="0"></li>
                    <li class="tm-bg-control" data-id="1"></li>
                    <li class="tm-bg-control" data-id="2"></li>
                </ul>            
            </div>         --}}
            <div class="tm-col-right tm-col-footer">
                <footer class="tm-site-footer text-right">
                    <p class="mb-0"> 
                        by: vikry Verdinal Hadrian
                     <a rel="nofollow" target="_parent" class="tm-text-link"></a></p>
                </footer>
            </div>  
        </div>

        <!-- Diagonal background design -->
        <div class="tm-bg">
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