<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Diagoona - About Page</title>
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
                    @include('layouts.landing')
                </div>
            </div>
            
            <div class="tm-row">
                <div class="tm-col-left"></div>
                <main class="tm-col-right">
                    <section class="tm-content tm-about">
                        <h2 class="mb-5 tm-content-title">About Diagoona Template</h2>
                        <hr class="mb-4">
                        <div class="media my-3">
                            <i class="fas fa-shapes fa-3x p-3 mr-4"></i>
                            <div class="media-body">
                                <p>Cras quam urna, interdum at posuere ac, tincidunt ut ipsum. Nam condimentum placerat enim. Nullam euismod sapien.</p>
                            </div> 
                        </div>
                        <div class="media my-3">
                            <i class="fas fa-draw-polygon fa-3x p-3 mr-4"></i>
                            <div class="media-body">
                                <p>Nunc id hendrerit nunc. Etiam ultricies arcu sem, vel dapibus lacus lacinia quis. Nunc auctor placerat nisi ac ultrices.</p>
                            </div> 
                        </div>
                        <div class="media my-3">
                            <i class="fab fa-creative-commons-share fa-3x p-3 mr-4"></i>
                            <div class="media-body">
                                <p>Vestibulum imperdiet hendrerit nibh. Integer sit amet lacus et nunc auctor tincidunt eu ac sapien. Ut suscipit velit eget faucibus finibus.</p>
                            </div> 
                        </div>
                        <div class="media my-3">
                            <i class="fas fa-bookmark fa-3x p-3 mr-4"></i>
                            <div class="media-body">
                                <p>Prasent eget enim vitae sapien egestas aliquet non quis neque. Duis pharetra varius massa, ut bibendum tortor sodales ac.</p>
                            </div> 
                        </div>                        
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
                    <p class="mb-0">Copyright 2020 Diagoona Co. 
                    
                    | Design: <a rel="nofollow" target="_parent" href="https://templatemo.com" class="tm-text-link">TemplateMo</a></p>
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
</body>
</html>