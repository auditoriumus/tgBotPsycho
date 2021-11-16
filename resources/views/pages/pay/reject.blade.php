@extends('layout.app')

@section('body')
    <!--::header part start::-->
    @include('layout.nav')
    <!-- Header part end-->
    <body>
    @include('layout.errors')
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Ошибка</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="trending_items">
        <section class="feature_part">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h1>Мы не смогли принять оплату. Проверьте ваш счет или свяжитесь с нами.</h1>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <!--::footer_part start::-->
    <footer class="footer_part subscribe_part">
        @include('layout.footer')
    </footer>
    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    @include('layout.js')
    </body>
@endsection
