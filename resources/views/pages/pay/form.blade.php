@extends('layout.app')

@section('body')
    <body>
    <!--::header part start::-->
    @include('layout.nav')
    <!-- Header part end-->
    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Оплата</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->
    @include('layout.errors')
    <!--================login_part Area =================-->
    <section class="login_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 offset-md-3 offset-lg-3">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Пожалуйста, заполните свои данные чтобы мы с вами связались после оплаты.</h3>

                            <form class="row contact_form" action="{{ route('sent_payment') }}" method="post">
                                @csrf
                                @if(app('request')->has('practice'))
                                    <input type="text" name="practice" hidden value="{{app('request')->input('practice')}}"/>
                                @endif
                                <div class="col-md-12 form-group p_star">
                                    <input type="number" class="form-control" id="amount" name="amount" value="990.00"
                                           placeholder="Сумма*">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="name"
                                           value="{{ old('name') }}"
                                           placeholder="ФИО*">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="phone" name="phone"
                                           value="{{ old('phone') }}"
                                           placeholder="Телефон*">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="email" name="email"
                                           value="{{ old('email') }}"
                                           placeholder="Email*">
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="creat_account d-flex align-items-center">
                                        <input type="checkbox" id="f-option" name="approval" required>
                                        <label for="f-option">Подтверждаю согласие на <a href="{{ route('privacy') }}">обработку
                                                персональных данных</a></label>
                                    </div>
                                    <div class="creat_account d-flex align-items-center">
                                        <input type="checkbox" id="f-option" name="offer" required>
                                        <label for="f-option">Подтверждаю согласие с <a href="{{ route('offer') }}">Договором
                                                публичной оферты</a></label>
                                    </div>
                                    <button type="submit" value="submit" class="btn_3">
                                        Сформировать платеж
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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

