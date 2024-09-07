@extends('layouts.app')
@section('title', 'Banned')

@section('content')
    <div class="content-body">
        <div class="misc-wrapper"><a class="brand-logo" href="javascript:void(0);">
                <img src="{{ asset('app-assets/images/logo/logo2.png') }}" alt="">
            </a>
            <div class="misc-inner p-2 p-sm-3">
                <div class="row w-100 text-center">
                    <div class="col">
                        <h2 class="mb-1">You are banned! 🚫</h2>
                        <p class="mb-2">Your account has been suspended due to suspicious activity</p>
                        <a class="btn btn-danger btn-sm-block" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        <div class="col">
                            <img class="img-fluid" src="{{ asset('app-assets/images/pages/not-authorized-dark.svg') }}"
                                 alt="Not authorized page"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

