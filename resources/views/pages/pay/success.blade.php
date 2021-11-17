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
                        <h2>Успех</h2>
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
                        <h1>Благодарим вас за оплату. Мы скоро с вами свяжемся.</h1>
                        <h3>Не забудь подписаться на мои письма чтобы не упустить ничего важного.</h3>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-3"></div><!--Пустой блок с права-->
                <div class="col-md-6 p-3">
                    <div data-sendsay-form-embedded="x_1635889843932493/2"></div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-3"></div><!--Пустой блок с лева-->
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
