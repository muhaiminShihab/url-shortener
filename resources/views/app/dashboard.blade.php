@extends('layout.app')

@section('page_section')
    <section class="main-area">
        <div class="container">
            {{-- include menu --}}
            @include('layout.menu')

            <div class="col-md-6 mx-auto mt-150">
                <form action="{{ route('create_short_url') }}" method="POST">
                    @csrf

                    <div class="text-center mb-5">
                        <h2 class="fw-bold">Welcome to URL Shortener</h2>
                        <p>Make your long URL's short, easy and free !!</p>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
