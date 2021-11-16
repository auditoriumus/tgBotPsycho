@extends('layout.app')

@section('body')
    <!--::header part start::-->
    @include('layout.nav')
    <!-- Header part end-->
    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Анкета</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <body>
    <!-- breadcrumb part end-->
    @include('layout.errors')
    <!--================login_part Area =================-->
    <section class="login_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 offset-md-3 offset-lg-3">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Оставьте свои данные и мы свяжемся с вами.</h3>

                            <form class="row contact_form" action="{{ route('add_questionnaire') }}" method="post">
                                @csrf
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                                           placeholder="Имя*">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}"
                                           placeholder="Фамилия*">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="patronymic" name="patronymic" value="{{ old('patronymic') }}"
                                           placeholder="Отчество">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}"
                                           placeholder="Телефон*">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}"
                                           placeholder="Email*">
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="creat_account d-flex align-items-center">
                                        <input type="checkbox" id="f-option" name="approval" checked required>
                                        <label for="f-option">Подтверждаю согласие на обработку персональных данных</label>
                                    </div>
                                    <div class="creat_account d-flex align-items-center">
                                        <input type="checkbox" id="f-option" name="offer" checked required>
                                        <label for="f-option">Подтверждаю согласие с <a href="{{ route('offer') }}">Договором публичной оферты</a></label>
                                    </div>
                                    <button type="submit" value="submit" class="btn_3">
                                        отправить
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

