@extends('layout.app')

@section('page_section')
    <section class="main-area">
        <div class="container">
            {{-- include menu --}}
            @include('layout.menu')

            <div class="col-md-6 mx-auto mt-150">
                <form action="{{ route('create_url') }}" method="POST">
                    @csrf

                    <div class="text-center mb-5">
                        <h2 class="fw-bold">Welcome to URL Shortener</h2>
                        <p>Make your long URL's short, easy and free !!</p>
                    </div>

                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <input type="url" name="long_url" placeholder="Enter your URL here..." value="{{ session()->has('long_url') ? session()->get('long_url') : '' }}"
                                    class="form-control py-3" required>
                            </div>
                        </div>
                        <div class="col-md-2 text-end">
                            <div class="form-group mt-3 mt-md-0">
                                <button type="submit" class="col-12 btn btn-primary btn-custom px-4 py-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
