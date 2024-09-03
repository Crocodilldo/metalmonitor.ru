@extends('layouts.MainLayout')
@section('Content')
    <div class="wrapper row3">
        <main class="hoc container clear">
            <div class="sidebar one_quarter first">

                <h6>Панель управления:</h6>
                <nav class="sdb_holder">
                    <ul>
                        <li><a href="/admin/shops">Магазины</a></li>

                        <li><a href="/admin/categorys">Категории</a></li>

                        <li><a href="{{route('show_all_update_links')}}">Ссылки для парсинга</a></li>

                        <li><a href="{{route('test')}}">TEST</a></li>
                    </ul>
                </nav>
                <div class="sdb_holder">
                    <h6>Lorem ipsum dolor</h6>
                    <address>
                        Full Name<br>
                        Address Line 1<br>
                        Address Line 2<br>
                        Town/City<br>
                        Postcode/Zip<br>
                        <br>
                        Tel: xxxx xxxx xxxxxx<br>
                        Email: <a href="#">contact@domain.com</a>
                    </address>
                </div>
                <div class="sdb_holder">
                    <article>
                        <h6>Lorem ipsum dolor</h6>
                        <p>Nuncsed sed conseque a at quismodo tris mauristibus sed habiturpiscinia sed.</p>
                        <ul>
                            <li><a href="#">Lorem ipsum dolor sit</a></li>
                            <li>Etiam vel sapien et</li>
                            <li><a href="#">Etiam vel sapien et</a></li>
                        </ul>
                        <p>Nuncsed sed conseque a at quismodo tris mauristibus sed habiturpiscinia sed.
                            Condimentumsantincidunt dui mattis magna intesque purus orci augue lor nibh.</p>
                        <p class="more"><a href="#">Continue Reading &raquo;</a></p>
                    </article>
                </div>
                <!-- ################################################################################################ -->
            </div>
            @yield('AdminContent')
        </main>
    </div>

@endsection
