<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link
            href="{{ asset('css/app.css?v=1.4') }}"
            rel="stylesheet"
            type="text/css"
        />
        <link
            rel="shortcut icon"
            href="{{{ asset('img/People-Doctor-Female-icon.png') }}}"
        />

        <title>Laravel</title>

        <!-- Fonts -->
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,600"
            rel="stylesheet"
        />
    </head>
    <body>
        <div>
            <div class="header_container">
                <div class="header_top">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                            
                        </div>
                    </div>
                </div>
                <div class="header_top2"></div>
                <div class="header_top3">
                    <div class="row">
                        <div class="col">
                                <img
                                height="50"
                                class="mr-3 promo"
                                src="{{ asset('img/iconos/home.png') }}?v=2"
                                alt=""
                            />

                            <img
                                height="50"
                                class="mr-3 promo"
                                src="{{ asset('img/iconos/what.png') }}?v=2"
                                alt=""
                            />
                            <img
                                height="50"
                                class="mr-3 promo"
                                src="{{ asset('img/iconos/requisitos.png') }}?v=2"
                                alt=""
                            />
                            <img
                                height="50"
                                class="mr-3 promo"
                                src="{{ asset('img/iconos/procesos.png') }}?v=2"
                                alt=""
                            />
                            <img
                                height="50"
                                class="mr-3 promo"
                                src="{{ asset('img/iconos/preguntas.png') }}?v=2"
                                alt=""
                            />
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>
            <div class="title m-b-md"></div>
        </div>

        <div class="container-fluid">
            <div class="row"></div>
        </div>
        <div class="footer  text-center">
            &copy Derechos reservados.
        </div>
    </div>
    </body>
</html>
