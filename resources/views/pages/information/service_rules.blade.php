@extends('layout.app')

@section('body')
    <body>
    <!--::header part start::-->
    @include('layout.nav')
    <!-- Header part end-->
    @include('layout.errors')

    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Порядок оказания услуг</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

    <!-- Start Sample Area -->
    <section class="sample-text-area">
        <div class="container box_1170">
            <h3 class="text-heading  m-3">1. Консультация</h3>
            <p class="sample-text">
                На этапе консультации клиент, попадая на страницу сайта https://orlova.pro оставляет заявку (свои
                данные) через раздел "Консультация", исполнитель в лице ИП ДЕТКОВСКАЯ ЮЛИЯ ВЛАДИМИРОВНА перезванивает
                клиенту в течении 3х календарных дней,
                и в удобное для клиента время, обсуждаются цели, а также даты и время консультаций.
            </p>
            <h3 class="text-heading  m-3">2. Оплата</h3>
            <p class="sample-text">
                2. Если клиента все устраивает и заключены договоренности о получении консультаций, клиент выбирает
                практику оплачивает услуги на портале https://orlova.pro в разделе "Онлайн практика".
            </p>
            <h3 class="text-heading  m-3">3. Условия возврата</h3>
            <p class="sample-text">
                3. За полученную услугу средства возвращаются согласно Договору оферты.
            </p>
            <p class="sample-text">
                Подробный порядок оказания услуг читайте в <a href="{{ route('offer') }}">Договоре публичной оферты</a>
            </p>
        </div>
    </section>
    <!-- End Sample Area -->


    <!--::footer_part start::-->
    <footer class="footer_part subscribe_part">
        @include('layout.footer')
    </footer>
    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    @include('layout.js')
    </body>
@endsection
