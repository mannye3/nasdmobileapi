<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/newNasdIcon.jpg">
    <!-- Page Title  -->
    <title>Login</title>
    <!-- StyleSheets  -->
    <link href="{{ asset('assets/assets/css/dashlite.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/assets/css/theme.css')}}" rel="stylesheet" type="text/css" />
</head>

<body class="nk-body bg-white npc-general pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
            @yield('content')
            <div class="nk-block nk-auth-footer">

                <div class="mt-3">
                    <p>&copy; 2021 NASD PLC. All Rights Reserved.</p>
                </div>
            </div><!-- .nk-block -->
        </div><!-- .nk-split-content -->
        <div class="nk-split-content nk-split-stretch bg-lighter d-flex toggle-break-lg toggle-slide toggle-slide-right" data-content="athPromo" data-toggle-screen="lg" data-toggle-overlay="true">
            <div class="">
                <div class="">
                    <div class="slider-item">
                        <div class="nk-feature nk-feature-center">
                            <div class="">
                                <img class="" src="{{ asset('assets/images/slides/stockmarket.jpg')}}" height="719" alt="">
                            </div>

                        </div>
                    </div><!-- .slider-item -->


                </div><!-- .slider-init -->

            </div><!-- .slider-wrap -->
        </div><!-- .nk-split-content -->
    </div><!-- .nk-split -->
</div>
<!-- wrap @e -->
</div>
<!-- content @e -->
</div>
<!-- main @e -->
</div>
<!-- app-root @e -->
<!-- JavaScript -->
<script src="{{ asset('assets/assets/js/bundle.js')}}"></script>
<script src="{{ asset('assets/assets/js/scripts.js')}}"></script>

</html>
