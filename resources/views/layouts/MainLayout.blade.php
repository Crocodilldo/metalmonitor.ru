
<!DOCTYPE html>
<html>
<head>
    <title>Metalmonitor</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">


    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/framework.css">
    <script src="js/jquery.backtotop.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.mobilemenu.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
</head>

<body id="top">
<!-- ################################################################################################ -->
<!-- Header########################################################################################## -->
<!-- ################################################################################################ -->
<div class="wrapper row1" style="background-image:url('images/demo/backgrounds/top-background.webp')">
    <header id="header" class="hoc clear">
        <!-- ################################################################################################ -->
        <div id="logo" class="fl_left">
            <h1><a href="/">Metalmonitor.ru</a></h1>
        </div>
        <div id="search" class="fl_right">
            <form class="clear" method="post" action="search">
                @csrf
                <fieldset>
                    <legend>Search:</legend>
                    <input name="search" type="search" value="" placeholder="Search Here ">
                    <button class="fa fa-search" type="submit" title="Search"><em>Search</em></button>
                </fieldset>
            </form>
        </div>
        <!-- ################################################################################################ -->
    </header>
</div>
<!-- ################################################################################################ -->
<!-- Menu############################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row2">
    <nav id="mainav" class="hoc clear">
        <!-- ################################################################################################ -->
        <ul class="clear">
            <li class="active"><a href="/">На главную</a></li>
            <li><a class="drop" href="#">Каталог</a>
                <ul>

                @foreach(\Illuminate\Support\Facades\Cache::get('categories') as $category)
                        <li>
                            <a href="#">
                                {{$category->name}}</a>
                        </li>
                    @endforeach

                </ul>
            </li>

            <li><a class="drop" href="#">Инструменты</a>
                <ul>
                    <li><a href="#">Калькулятор металла</a></li>
                    <li><a href="#">ГОСТы</a></li>
                </ul>
            </li>
            <li><a href="#">Статьи</a></li>
            <li><a href="#">Контакты</a></li>

        </ul>
        <!-- ################################################################################################ -->
    </nav>
</div>
<!-- ################################################################################################ -->
<!-- Content######################################################################################### -->
<!-- ################################################################################################ -->

@yield('Content')

<!-- ################################################################################################ -->
<!-- Footer########################################################################################## -->
<!-- ################################################################################################ -->
<div class="wrapper row4 bgded overlay" style="background-image:url('images/demo/middle.png');">
    <footer id="footer" class="hoc clear">
        <!-- ################################################################################################ -->
        <div id="cta" class="group">
            <div class="one_third first"><i class="fa fa-map-marker"></i>
                <p>Find us</p>
                <p><a href="#">Google Maps</a></p>
            </div>
            <div class="one_third"><i class="fa fa-phone"></i>
                <p>Call us</p>
                <p>+00 (123) 456 7890</p>
            </div>
            <div class="one_third"><i class="fa fa-envelope-o"></i>
                <p>Email us</p>
                <p>info@domain.com</p>
            </div>
        </div>

    </footer>
</div>

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row6">
    <div id="copyright" class="hoc clear">
        <!-- ################################################################################################ -->
        <p class="fl_left">Copyright &copy; 2016 - All Rights Reserved - <a href="#">Domain Name</a></p>
        <p class="fl_right">Template by <a target="_blank" href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
        <!-- ################################################################################################ -->
    </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
</body>
</html>
