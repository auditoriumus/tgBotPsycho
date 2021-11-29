<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    {{--                                        <a class="navbar-brand" href="#"> <img src="" alt="logo"> </a>--}}
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_icon"><i class="fas fa-bars"></i></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/">Главная</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_1"
                                   role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Консультация
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                    <a class="dropdown-item" href="{{ route('questionnaire') }}">Анкета</a>
                                </div>
                            </li>
{{--                            <li class="nav-item dropdown">--}}
{{--                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_3"--}}
{{--                                   role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                    Лекции--}}
{{--                                </a>--}}
{{--                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">--}}
{{--                                    <a class="dropdown-item" href="https://orlova.ispringmarket.ru/organization/1/view/6710-WRXKF-XYTGX-W1duf">--}}
{{--                                        --}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </li>--}}

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_2"
                                   role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Онлайн практика
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                    <a class="dropdown-item" href="{{ route('who_is_hungry') }}">Кто голоден внутри меня</a>
                                    <a class="dropdown-item" href="{{ route('i_allow') }}">Я разрешаю себе удовольствие и наслаждение</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_2"
                                   role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Информация
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                    <a class="dropdown-item" href="{{ route('service_rules') }}">Порядок оказания услуг</a>
                                    <a class="dropdown-item" href="{{ route('offer') }}">Договор-оферта</a>
                                    <a class="dropdown-item" href="{{ route('privacy') }}">Политика конфиденциальности</a>
                                </div>
                            </li>

                        </ul>
                    </div>
                    {{--                                        <div class="hearer_icon d-flex align-items-center">--}}
                    {{--                                            <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>--}}
                    {{--                                            <a href="cart.html">--}}
                    {{--                                                <i class="flaticon-shopping-cart-black-shape"></i>--}}
                    {{--                                            </a>--}}
                    {{--                                        </div>--}}
                </nav>
            </div>
        </div>
    </div>
    {{--        <div class="search_input" id="search_input_box">--}}
    {{--            <div class="container ">--}}
    {{--                <form class="d-flex justify-content-between search-inner">--}}
    {{--                    <input type="text" class="form-control" id="search_input" placeholder="Search Here">--}}
    {{--                    <button type="submit" class="btn"></button>--}}
    {{--                    <span class="ti-close" id="close_search" title="Close Search"></span>--}}
    {{--                </form>--}}
    {{--            </div>--}}
    {{--        </div>--}}
</header>
