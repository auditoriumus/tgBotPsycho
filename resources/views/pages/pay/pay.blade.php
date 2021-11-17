@extends('layout.app')

@section('body')
    <body>
    <section class="trending_items">
        <section class="feature_part">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="align-content-center">
                        @include('pages.robokassa')
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
