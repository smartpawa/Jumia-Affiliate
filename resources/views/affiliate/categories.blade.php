@include('affiliate.header')

@section('content')
<div class="container">
    @if(count($errors)>0)
        @foreach ($errors->all() as $error)
            <div class="alert-danger">{{$error}}</div>
            
        @endforeach

    @endif

    @if(session('response'))
    <div class="alert-success">{{session('response')}}</div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Category') }}</div>


                <div class="card-body">
                    <form method="POST" action="{{ url('/addCategory') }}">
                     {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Enter Category') }}</label>

                            <div class="col-md-6">
                                <input id="category" type="category" class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}" name="category" value="{{ old('category') }}" required autofocus>

                                @if ($errors->has('category'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Category') }}
                                </button>

                               
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
