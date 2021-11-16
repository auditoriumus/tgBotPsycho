<section class="mt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if($errors)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @if(Session::has('success'))
                    <div class="success alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <div class="col-lg-12">
                    @if(Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
