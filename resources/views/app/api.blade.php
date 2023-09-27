@extends('layout.app')

@section('page_section')
    <section class="main-area">
        <div class="container">
            {{-- include menu --}}
            @include('layout.menu')

            <div class="col-12 mt-150">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table tablde-bordered table-striped">
                                <tr>
                                    <th>API URL</th>
                                    <th>Method</th>
                                    <th>Description</th>
                                    <th>Required Fields</th>
                                </tr>
                                <tr>
                                    <td>{{ URL::to('/') . '/api/sign-in' }}</td>
                                    <td>POST</td>
                                    <td>This is for authentication and get access token.</td>
                                    <td>
                                        <div class="btn btn-sm bg-black text-white m-2">email</div>
                                        <div class="btn btn-sm bg-black text-white m-2">password</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{ URL::to('/') . '/api/sign-out' }}</td>
                                    <td>POST</td>
                                    <td>This is for sign-out and remove access token.</td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{ URL::to('/') . '/api/user' }}</td>
                                    <td>GET</td>
                                    <td>This is to get authenticated user details.</td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{ URL::to('/') . '/api/create-short-url' }}</td>
                                    <td>POST</td>
                                    <td>This is for create short url.</td>
                                    <td>
                                        <div class="btn btn-sm bg-black text-white m-2">long_url</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{ URL::to('/') . '/api/remove-short-url' }}</td>
                                    <td>POST</td>
                                    <td>This is for remove short url.</td>
                                    <td>
                                        <div class="btn btn-sm bg-black text-white m-2">id</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{ URL::to('/') . '/api/short-urls' }}</td>
                                    <td>GET</td>
                                    <td>This is to get users all url.</td>
                                    <td>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
