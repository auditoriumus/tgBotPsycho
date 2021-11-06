@extends('layout.app')

@section('body')
    <body>
    <!--::header part start::-->
    @include('layout.nav')
    <!-- Header part end-->
    @include('layout.errors')
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Кто голоден внутри меня?</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="trending_items">
        <section class="feature_part section_padding">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-12">
                        <div class="feature_part_content">
                            <p>
                                Кому внутри меня не хватает внимания, тепла, ласки, заботы?
                            </p>
                            <p>
                                А может не хватает динамики, движения жизни?
                            </p>
                            <p>
                                Удивительно, но для того, чтобы запустить изменения в жизни, нам важно принять какую-то часть себя.
                            </p>
                            <p>
                                Я приглашаю Вас в путешествие, из которого вы вернётесь с другим отношением к себе. Вы проживете на уровне тела ощущение поддержки и принятия.
                            </p>
                            <p>
                                А это — главная точка опоры для любого движения.
                            </p>
                            <p>
                                Вы с нами?
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mt-5 text-center">
                    <div>
                        <a href="{{ route('take_a_part') }}" class="btn_1">Принять участие</a>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <!--::footer_part start::-->
    <footer class="footer_part subscribe_part">
        <div class="footer_iner">
            <div class="container">
                {{--            <div class="row justify-content-between align-items-center">--}}
                {{--                <div class="col-lg-8">--}}
                {{--                    <div class="footer_menu">--}}
                {{--                        <div class="footer_logo">--}}
                {{--                            <a href="index.html"><img src="" alt="#"></a>--}}
                {{--                        </div>--}}
                {{--                        <div class="footer_menu_item">--}}
                {{--                            <a href="index.html">ссылка</a>--}}
                {{--                            <a href="about.html">ссылка</a>--}}
                {{--                            <a href="product_list.html">ссылка</a>--}}
                {{--                            <a href="#">ссылка</a>--}}
                {{--                            <a href="blog.html">ссылка</a>--}}
                {{--                            <a href="contact.html">ссылка</a>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--                <div class="col-lg-4">--}}
                {{--                    <div class="social_icon">--}}
                {{--                        <a href="#"><i class="fab fa-instagram"></i></a>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--            </div>--}}
            </div>
        </div>
    </footer>
    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    @include('layout.js')
    </body>
@endsection
