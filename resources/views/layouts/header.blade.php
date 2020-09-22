<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('meta')
    @include('feed::links')
    <title>
        @if (setting())
            {{setting()->sitename}}
        @endif
        | @yield('title')
    </title>
    {{-- <link rel="apple-touch-icon" sizes="76x76" href="{{url('design/FrontEnd')}}/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{url('design/FrontEnd')}}/assets/img/favicon.png">
     --}}
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="{{url('design/FrontEnd')}}/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="{{url('design/FrontEnd')}}/css/animate.css">

    <link rel="stylesheet" href="{{url('design/FrontEnd')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{url('design/FrontEnd')}}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{url('design/FrontEnd')}}/css/magnific-popup.css">

    <link rel="stylesheet" href="{{url('design/FrontEnd')}}/css/aos.css">

    <link rel="stylesheet" href="{{url('design/FrontEnd')}}/css/ionicons.min.css">

    <link rel="stylesheet" href="{{url('design/FrontEnd')}}/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{url('design/FrontEnd')}}/css/jquery.timepicker.css">


    <!--<link rel="stylesheet" href="{{url('design/FrontEnd')}}/css/flaticon.css">-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('design/FrontEnd')}}/css/icomoon.css">
    <link rel="stylesheet" href="{{url('design/FrontEnd')}}/css/style.css">
    @if (setting())
    <link rel="icon" href="{{url('public/uploads/Settings/Logo/' . setting()->logo)}}">
    {{-- <img src="{{url('public/uploads/Settings/Logo/' . setting()->logo)}}" height="70" width="70" alt="{{setting()->logo}}"> --}}
    @endif
    {{-- <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&display=swap" rel="stylesheet">
    <style>
        * {
        font-family: 'Cairo', sans-serif;
        font-weight: bold;
        font-size: 14px;
        }
    </style> --}}
    <style>
        /* Photo Banner */
        .photobanner img  {
            -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            -ms-transition: all 0.5s ease;
            transition: all 0.5s ease;
        }
         
        .photobanner img:hover {
            -webkit-transform: scale(1.2);
            -moz-transform: scale(1.2);
            -o-transform: scale(1.2);
            -ms-transform: scale(1.2);
            transform: scale(1.2);
            cursor: pointer;
         
            -webkit-box-shadow: 0px 3px 5px rgba(0,0,0,0.2);
            -moz-box-shadow: 0px 3px 5px rgba(0,0,0,0.2);
            box-shadow: 0px 3px 5px rgba(0,0,0,0.2);
        }
    </style>
    @if(app()->getLocale() == 'ar')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css">
    @endif
</head>

