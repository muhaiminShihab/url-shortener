@extends('layout.app')

@section('page_section')
    <section class="main-area">
        <div class="container">
            {{-- include menu --}}
            @include('layout.menu')

            <div class="col-12 mt-150">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="text-end mb-3">
                            <a href="{{ route('home_page') }}" class="btn btn-primary">Add URL</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table tablde-bordered table-striped">
                                <tr>
                                    <th>SL</th>
                                    <th>Main URL</th>
                                    <th>Short URL</th>
                                    <th>Total Click</th>
                                    <th>Actions</th>
                                </tr>
                                @foreach ($urls as $key => $url)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $url->main_url }}</td>
                                        <td>{{ URL::to('/') . '/' . $url->short_url }}</td>
                                        <td>{{ number_format($url->total_click, 2) }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('remove_url', $url->id) }}" class="btn btn-sm btn-custom border">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
