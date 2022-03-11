@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="card-title text-center">Register</h4>
                    <form action="{{ route('registered') }}" method="post">
                        @csrf
                        <div class="form-group mb-2">
                            <label for=""><strong>Name</strong></label>
                            <input type="text" class="form-control mt-2 @error('name') is-invalid @enderror"
                                placeholder="Name" name="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for=""><strong>Email</strong></label>
                            <input type="email" class="form-control mt-2 @error('email') is-invalid @enderror"
                                placeholder="Email Address" name="email" value="{{ old('email') }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for=""><strong>Password</strong></label>
                            <input type="password" name="password"
                                class="form-control mt-2 @error('password') is-invalid @enderror" placeholder="Password"
                                name="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for=""><strong>Password Confirmation</strong></label>
                            <input type="password" name="password_confirmation" class="form-control mt-2" >
                          </div>
                        <div class="form-group mb-3">
                            <label for=""><strong>Role</strong></label>
                            <select class="form-select mt-2" name="role" aria-label="Default select example">
                                <option selected>Role</option>
                                <option >User</option>
                                <option >Student</option>
                              </select>
                        </div>
                        <div class="form-group d-grid">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                    <p class="text-center">Sudah punya akun ? <a href="{{ route('login') }}">Login</a></p>

                </div>
            </div>
        </div>
    </div>
@endsection
