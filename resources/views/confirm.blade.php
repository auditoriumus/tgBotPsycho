@extends('layout.app')

@section('body')
    <body>
    <!--::header part start::-->
    @include('layout.nav')
    <!-- Header part end-->
    @include('layout.errors')
    <!--================login_part Area =================-->
    <section class="login_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3"></div><!--Пустой блок с права-->
                <div class="col-md-6 p-3">
                    <div data-sendsay-form-embedded="x_1635889843932493/2"></div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-3"></div><!--Пустой блок с лева-->
            </div>
        </div>
    </section>
    <!--================login_part end =================-->

    <!--::footer_part start::-->
    <footer class="footer_part subscribe_part">
        @include('layout.footer')
    </footer>
    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    @include('layout.js')
    </body>
@endsection

