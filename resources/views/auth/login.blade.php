@extends('app')
@section('content')

    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-4">
                <div>
                    <h3 class="text-center">Silahkan Login</h3>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('auth.login') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="username"
                                    placeholder="" />
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="text" class="form-control" name="password" id="password"
                                    placeholder="" />
                            </div>
                            <div class="mb-3 text-center">
                                <button class="btn btn-primary btn-lg  " type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
