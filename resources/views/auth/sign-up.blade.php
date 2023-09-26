@extends('layout.app')

@section('page_section')
    <section class="main-area">
        <div class="container">
            {{-- include menu --}}
            @include('layout.menu')

            <div class="col-md-6 mx-auto mt-150">
                <div class="card border-0 shadow px-4">
                    <div class="card-body">
                        <div class="text-center mb-5">
                            <h2 class="fw-bold">Sign-up to Account</h2>
                            <p>Make your long URL's short, easy and free !!</p>
                        </div>
                        <form action="{{ route('sign_up_page') }}" method="POST">
                            @csrf

                            <div class="form-group mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" placeholder="Muhaimin Shihab"
                                    class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" placeholder="abc@xyz.com"
                                    class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" placeholder="********"
                                    class="form-control" required>
                            </div>
                            <div class="form-group text-end">
                                <button type="submit" class="btn btn-primary">Sign-up</button>
                            </div>
                        </form>
                        <div class="text-center mt-4">
                            <a href="{{ route('sign_in_page') }}">Already have an account? Click here.</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
