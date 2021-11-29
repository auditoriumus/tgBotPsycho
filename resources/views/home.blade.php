@extends('layout.app')

@section('body')
    <body>
    <!--::header part start::-->
    @include('layout.nav')
    <!-- Header part end-->
    @include('layout.errors')
    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h1>Юлия Орлова</h1>
                            <p>Психолог и не только. Я человек, который точно знает...</p>
                            {{--                        <a href="#" class="btn_1">Как это работает?</a>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner_img">
            <img src="{{ asset('img/personal/main_photo2.jpg') }}" alt="#" class="img-fluid">
            <img src="{{ asset('img/banner_pattern.png') }} " alt="#" class="pattern_img img-fluid">
        </div>
    </section>
    <!-- banner part start-->


    <section class="trending_items">
        <section class="feature_part section_padding">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-12">
                        <div class="feature_part_content">
                            <p>Здравствуйте, друзья! Меня зовут Юлия Орлова. Я психолог, но не только. Ещё я человек,
                                который точно знает и проверил на себе, как работает психологическая помощь.
                            </p>
                            <p>
                                В своей работе, в блоге и в курсах я преследую одну большую и красивую цель: сделать
                                так,
                                чтобы изменения, которые происходят в Вашей жизни, Вас питали, а не разрушали.
                            </p>
                            <p>
                                Общаясь с людьми на самые разные темы, я вижу одну вещь: от движения вперёд
                                останавливает
                                парализующий страх изменений. И в прошлом есть опыт, в котором изменения были
                                невыносимыми.
                            </p>
                            <p>
                                Я точно знаю, что опыт может быть другим. И один из способов его таким сделать — это
                                работа
                                с психологом.
                            </p>
                            <p>
                                У меня есть травматичный опыт работы в крупной фирме, с прекрасным доходом и слезами
                                каждое
                                утро перед дверьми в офис.
                            </p>
                            <p>
                                У меня есть очень страшный опыт потери этой работы.
                            </p>
                            <p>
                                Есть опыт начала психологической практики и выхода в интернет-пространство в новой роли.
                                (Я знаю, как это, когда задают вопрос: «Ты теперь психолог? Совсем делать нечего?»)
                            </p>
                            <p>
                                Есть опыт ведения групп, на которые приходило два человека. Спасибо им огромное!
                            </p>
                            <p>
                                Есть опыт запуска курса, снятого на телефон, в первую волну коронавируса.
                            </p>
                            <p>
                                А впереди ещё много сложного и интересного. И я знаю, как, приобретая новый опыт,
                                становиться все более и более целостной.
                            </p>
                            <p>
                                Главное — быть всегда за себя. Нас этому не учили, но мы точно можем научиться этому
                                сами.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mt-5 text-center">
                    <div>
                        <a href="#single_product_list" class="btn_1">Продукты</a>
                        <a href="{{ route('questionnaire') }}" class="btn_1">Заказать консультацию</a>
                    </div>
                </div>
            </div>
        </section>
    </section>


    <!-- product list start-->
    <section class="single_product_list" id="single_product_list">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single_product_iner">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_img">
                                    <img src="img/personal/single_product_1.jpg" class="img-fluid" alt="#">
                                    <img src="img/product_overlay.png" alt="#" class="product_overlay img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-5 col-sm-6">
                                <div class="single_product_content">
                                    <h5></h5>
                                    <h2><a href="single-product.html">Личная консультация</a></h2>
                                    <a href="{{ route('questionnaire') }}" class="btn_3">Попробовать</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_product_iner">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_img">
                                    <img src="img/personal/single_product_2.jpg" class="img-fluid" alt="#">
                                    <img src="img/product_overlay.png" alt="#" class="product_overlay img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-5 col-sm-6">
                                <div class="single_product_content">
                                    <h5></h5>
                                    <h2><a href="single-product.html">Онлайн марафон</a></h2>
                                    <a href="https://orlova.ispringmarket.ru/content/8/info/%D0%9C%D0%B0%D1%80%D0%B0%D1%84%D0%BE%D0%BD_%D0%BF%D1%80%D0%BE_%D1%82%D0%B5%D0%BB%D0%BE"
                                       class="btn_3">Учавствовать</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_product_iner">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_img">
                                    <img src="img/personal/single_product_3.jpg" class="img-fluid" alt="#">
                                    <img src="img/product_overlay.png" alt="#" class="product_overlay img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-5 col-sm-6">
                                <div class="single_product_content">
                                    <h5></h5>
                                    <h2><a href="single-product.html">Лекции</a></h2>
                                    <a href="https://orlova.ispringmarket.ru/organization/1/view/6710-WRXKF-XYTGX-W1duf"
                                       class="btn_3">Посетить</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_product_iner">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_img">
                                    <img src="img/personal/single_product_4.jpg" class="img-fluid" alt="#">
                                    <img src="img/product_overlay.png" alt="#" class="product_overlay img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-5 col-sm-6">
                                <div class="single_product_content">
                                    <h5></h5>
                                    <h2><a href="single-product.html">Онлайн практики</a></h2>
                                    <a href="{{ route('who_is_hungry') }}" class="btn_3">Узнать</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product list end-->


    <!-- trending item start-->
    <section class="trending_items">
        <div class="container">
            {{--            <div class="row">--}}
            {{--                <div class="col-lg-12">--}}
            {{--                    <div class="section_tittle text-center">--}}
            {{--                        <h2>Lorem ipsum.</h2>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            <div class="row">--}}
            {{--                <div class="col-lg-4 col-sm-6">--}}
            {{--                    <div class="single_product_item">--}}
            {{--                        <div class="single_product_item_thumb">--}}
            {{--                            <img src="img/tranding_item/tranding_item_1.png" alt="#" class="img-fluid">--}}
            {{--                        </div>--}}
            {{--                        <h3><a href="single-product.html">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a></h3>--}}
            {{--                        <p>Lorem ipsum.</p>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--                <div class="col-lg-4 col-sm-6">--}}
            {{--                    <div class="single_product_item">--}}
            {{--                        <img src="img/tranding_item/tranding_item_2.png" alt="#" class="img-fluid">--}}
            {{--                        <h3><a href="single-product.html">Foam filling cotton slow rebound pillows</a></h3>--}}
            {{--                        <p>lorem ipsum</p>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--                <div class="col-lg-4 col-sm-6">--}}
            {{--                    <div class="single_product_item">--}}
            {{--                        <img src="img/tranding_item/tranding_item_3.png" alt="#" class="img-fluid">--}}
            {{--                        <h3><a href="single-product.html">Memory foam filling cotton Slow rebound pillows</a></h3>--}}
            {{--                        <p>lorem ipsum</p>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--                <div class="col-lg-4 col-sm-6">--}}
            {{--                    <div class="single_product_item">--}}
            {{--                        <img src="img/tranding_item/tranding_item_4.png" alt="#" class="img-fluid">--}}
            {{--                        <h3><a href="single-product.html">Cervical pillow for airplane--}}
            {{--                                car office nap pillow</a></h3>--}}
            {{--                        <p>lorem ipsum</p>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--                <div class="col-lg-4 col-sm-6">--}}
            {{--                    <div class="single_product_item">--}}
            {{--                        <img src="img/tranding_item/tranding_item_5.png" alt="#" class="img-fluid">--}}
            {{--                        <h3><a href="single-product.html">Foam filling cotton slow rebound pillows</a></h3>--}}
            {{--                        <p>lorem ipsum</p>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--                <div class="col-lg-4 col-sm-6">--}}
            {{--                    <div class="single_product_item">--}}
            {{--                        <img src="img/tranding_item/tranding_item_6.png" alt="#" class="img-fluid">--}}
            {{--                        <h3><a href="single-product.html">Memory foam filling cotton Slow rebound pillows</a></h3>--}}
            {{--                        <p>lorem ipsum</p>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Лекция про ценность себя</h2>
                        <iframe src="https://www.youtube.com/embed/Pvd5bCtmSMU" title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- trending item end-->

    <!-- client review part here -->
    {{--<section class="trending_items">--}}
    {{--    <div class="container">--}}
    {{--        --}}{{--        <div class="row justify-content-center">--}}
    {{--        --}}{{--            <div class="col-lg-8">--}}
    {{--        --}}{{--                <div class="client_review_slider owl-carousel">--}}
    {{--        --}}{{--                    <div class="single_client_review">--}}
    {{--        --}}{{--                        <div class="client_img">--}}
    {{--        --}}{{--                            <img src="img/client.png" alt="#">--}}
    {{--        --}}{{--                        </div>--}}
    {{--        --}}{{--                        <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, doloremque!."</p>--}}
    {{--        --}}{{--                        <h5>- Lorem ipsum</h5>--}}
    {{--        --}}{{--                    </div>--}}
    {{--        --}}{{--                </div>--}}
    {{--        --}}{{--            </div>--}}
    {{--        --}}{{--        </div>--}}
    {{--        --}}
    {{--        --}}
    {{--        <div class="row justify-content-between">--}}
    {{--            <div class="col-12">--}}
    {{--                <div class="feature_part_content">--}}
    {{--                    <p>--}}
    {{--                        Кто голоден внутри меня?--}}
    {{--                    </p>--}}
    {{--                    <p>--}}
    {{--                        Кому внутри меня не хватает внимания, тепла, ласки, заботы?--}}
    {{--                    </p>--}}
    {{--                    <p>--}}
    {{--                        А может быть кому-то внутри меня очень не хватает динамики, движения жизни?--}}
    {{--                    </p>--}}
    {{--                    <p>--}}
    {{--                        Вам знакомо это чувство внутренней пустоты?--}}
    {{--                    </p>--}}
    {{--                    <p>--}}
    {{--                        Я очень долго заполняла ее едой. Да и сейчас нет-нет да и иду по проторённой дорожке к--}}
    {{--                        холодильнику.--}}
    {{--                    </p>--}}
    {{--                    <p>--}}
    {{--                        Или можно пытаться заполнить ее знаниями. Бесконечным поглощением информации, когда уже не лезет--}}
    {{--                    </p>--}}
    {{--                    <p>--}}
    {{--                        Но легче становится не надолго.--}}
    {{--                    </p>--}}
    {{--                    <p>--}}
    {{--                        Я приглашаю Вас в путешествие. К тому, кого внутри себя мы не слышим, но чей голод , одиночество--}}
    {{--                        и тоску мы периодически ощущаем.--}}
    {{--                    </p>--}}
    {{--                    <p>--}}
    {{--                        Это будет очень интересное знакомство со своей когда-то покинутой частью. Мы будем узнавать о ее--}}
    {{--                        потребностях, выстраивать контакт и смотреть в ее силу.--}}
    {{--                    </p>--}}
    {{--                    <p>--}}
    {{--                        Из этого путешествия каждый вернётся немножко другим.--}}
    {{--                        Более целостным, лучше понимающим себя и свои чувства. Вы почувствуете ту самую внутреннюю силу:--}}
    {{--                        я могу себе помочь.--}}
    {{--                    </p>--}}
    {{--                    <p>--}}
    {{--                        А теперь самое интересное: в это путешествие мы пойдём через тело.--}}
    {{--                        В телесно-медитативной практике у нас нет возможности (и необходимости) себе врать. С помощью--}}
    {{--                        простых упражнений мы соединимся со своим телом и тем богатством ощущений, которые оно готово--}}
    {{--                        нам подарить.--}}
    {{--                    </p>--}}
    {{--                    <p>--}}
    {{--                        Мы проведём вместе, в глубокой работе 1,5 часа. Если Вы не сможете быть с нами в онлайн, у вас--}}
    {{--                        будет возможность сделать ее в записи в течении месяца.--}}
    {{--                    </p>--}}
    {{--                    <p>--}}
    {{--                        Результат работы через тело — это всегда соединенность мыслей, тела и чувств. Освобождение от--}}
    {{--                        застрявших эмоций и возвращение яркости ощущений. Мы очень много времени проводим в своей--}}
    {{--                        голове. И телесная работа помогает нам вернуться обратно в мир мурашек, бабочек в животе и мёда--}}
    {{--                        в сердце.--}}
    {{--                    </p>--}}
    {{--                    <p>--}}
    {{--                        Я никогда не могу описать подробно, как проходит практика, потому что это надо попробовать.--}}
    {{--                        Мы с Вами будем дышать, звучать, двигаться, чувствовать, проживать.--}}
    {{--                    </p>--}}
    {{--                    <p>--}}
    {{--                        Задавать вопросы и чувствовать ответы. Это будем мягко и красиво.--}}
    {{--                    </p>--}}
    {{--                    <p>--}}
    {{--                        Вы с нами?--}}
    {{--                    </p>--}}

    {{--                    <div class="mt-5 text-center">--}}
    {{--                        <div>--}}
    {{--                            <a href="#" class="btn_1">Учавствовать</a>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--</section>--}}
    <!-- client review part end -->


    <!-- feature part here -->
    {{--<section class="feature_part section_padding">--}}
    {{--    <div class="container">--}}
    {{--        <div class="row justify-content-between">--}}
    {{--            <div class="col-lg-6">--}}
    {{--                <div class="feature_part_tittle">--}}
    {{--                    <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="col-lg-5">--}}
    {{--                <div class="feature_part_content">--}}
    {{--                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur commodi deserunt doloremque,--}}
    {{--                        id laboriosam magni natus, non nulla numquam odio, pariatur perspiciatis qui rem repellat--}}
    {{--                        voluptates. Aspernatur consequatur deserunt doloremque doloribus explicabo impedit libero--}}
    {{--                        perferendis placeat ullam vero. Ex, qui?.</p>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div class="row justify-content-center">--}}
    {{--            <div class="col-lg-3 col-sm-6">--}}
    {{--                <div class="single_feature_part">--}}
    {{--                    <img src="img/icon/feature_icon_1.svg" alt="#">--}}
    {{--                    <h4>Lorem ipsum dolor.</h4>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="col-lg-3 col-sm-6">--}}
    {{--                <div class="single_feature_part">--}}
    {{--                    <img src="img/icon/feature_icon_2.svg" alt="#">--}}
    {{--                    <h4>Lorem ipsum dolor.</h4>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="col-lg-3 col-sm-6">--}}
    {{--                <div class="single_feature_part">--}}
    {{--                    <img src="img/icon/feature_icon_3.svg" alt="#">--}}
    {{--                    <h4>Lorem ipsum dolor.</h4>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="col-lg-3 col-sm-6">--}}
    {{--                <div class="single_feature_part">--}}
    {{--                    <img src="img/icon/feature_icon_4.svg" alt="#">--}}
    {{--                    <h4>Lorem ipsum dolor.</h4>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--</section>--}}
    <!-- feature part end -->

    <!-- subscribe part here -->
    {{--<section class="subscribe_part section_padding">--}}
    {{--    <div class="container">--}}
    {{--        <div class="row justify-content-center">--}}
    {{--            <div class="col-lg-8">--}}
    {{--                <div class="subscribe_part_content">--}}
    {{--                    <h2>Lorem ipsum dolor sit amet.</h2>--}}
    {{--                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque nostrum obcaecati, officia--}}
    {{--                        perferendis recusandae sit.</p>--}}
    {{--                    <div class="subscribe_form">--}}
    {{--                        <input type="email" placeholder="Введите свой email">--}}
    {{--                        <a href="#" class="btn_1">ссылка</a>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--</section>--}}
    <!-- subscribe part end -->

    <!--::footer_part start::-->
    <footer class="footer_part subscribe_part">
        @include('layout.footer')
    </footer>
    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    @include('layout.js')
    </body>
@endsection

