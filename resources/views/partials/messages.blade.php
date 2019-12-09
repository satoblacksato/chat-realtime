<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session()->has('info'))
        <div class="alert alert-primary">
              {{session('info')}}
        </div>
        @endif

        </div>
    </div>
</div>