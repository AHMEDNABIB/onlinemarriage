<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>NSTU Admission | 2021-2022</title>
    <link rel="shortcut icon" href="{{ asset('logos/nstu-logo.jpg') }}" type="image/x-icon">
    <!-- Custom fonts for this template-->
    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/newstyle.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <header id="loginheader">
        <div id="logincontainer">
            <div id="gst">
                NSTU Admission | 2021-2022
            </div>
            <div id="loginimg">
                <div>
                    <img src="{{ asset('admin/img/nstu.gif') }}" width="40px" height="57px" style="" alt="">
                </div>
                <div class="nstutitle">
                    <span style="font-size:24px;"><b>নোয়াখালী বিজ্ঞান ও প্রযুক্তি বিশ্ববিদ্যালয়</b></span> <br>
                    <span>Noakhali Science and Technology University</span><br>
                    <span>নোয়াখালী ৩৮১৪, বাংলাদেশ</span>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

</body>
</html>