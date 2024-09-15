@extends('layouts.dashboard')

@section('title', 'Earn Money')

@push('css')
    <style>
        .offerwall-btn {
            width: auto;
            height: 150px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            box-shadow: 0 0 5px 3px rgb(0 0 0 / 10%);
            border-radius: 10px;
            overflow: hidden;
            cursor: pointer;
            user-select: none;
            border: 3px solid transparent;
            box-sizing: border-box;
            transition: all 0.4s cubic-bezier(0.19, 1, 0.22, 1);
        }

        .offer-img {
            width: 60%;
            height: auto;
            display: block;
            user-select: none;
            pointer-events: none;
        }

        .offer-btn {
            background: rgb(51 60 88);
            width: auto;
            height: 150px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            box-shadow: 0 0 5px 3px rgb(0 0 0 / 10%);
            border-radius: 10px;
            overflow: hidden;
            cursor: pointer;
            user-select: none;
            border: 3px solid transparent;
            box-sizing: border-box;
            transition: all 0.4s cubic-bezier(0.19, 1, 0.22, 1);
        }

        .offer-btn::before {
            background: transparent;
            content: '';
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            mix-blend-mode: hue;
        }

        section.fixed {
            background: transparent;
            width: 100%;
            height: auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-template-rows: auto;
            grid-gap: 30px;
            margin-top: 20px;
        }

        @media screen and (max-width: 1366px) {
            section.fixed {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media screen and (max-width: 1200px) {
            section.fixed {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media screen and (max-width: 700px) {
            section.fixed {
                grid-template-columns: repeat(1, 1fr);
            }
        }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Offer walls</h4>
                </div>
                <div class="card-body">
                    @if(count($offerwalls) == 0)
                        <p class="text-center text-muted">No offerwalls available</p>
                    @endif
                    <section class="fixed">
                        @foreach($offerwalls as $offerwall)
                            @if($offerwall->name == 'CPX Research')
                                @continue
                            @endif

                            <button class="offer-btn" data-bs-toggle="modal" data-bs-target="#model1"
                                    onclick="showOfferwall('{{ Str::replace('{user_id}', auth()->user()->id, $offerwall->iframe_url) }}')">
                                <img class="offer-img" src="{{ Storage::Url($offerwall->photo_path) }}" alt="">
                            </button>
                        @endforeach
                    </section>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Survey</h4>
                </div>
                <div class="card-body">
                    <section class="fixed">
                        @foreach($offerwalls as $offerwall)
                            @if($offerwall->name == 'CPX Research')
                                <button class="offer-btn" data-bs-toggle="modal" data-bs-target="#model1"
                                        onclick="showOfferwall('{{ Str::replace('{user_id}', auth()->user()->id, $offerwall->iframe_url) }}')">
                                    <img class="offer-img" src="{{ Storage::Url($offerwall->photo_path) }}" alt="">
                                </button>
                            @endif
                        @endforeach
                    </section>
                </div>
            </div>
        </div>
    </div>

    <div class="form-modal-ex">
        <!-- Modal -->
        <div class="modal fade text-start" id="model1" tabindex="-1"
             aria-labelledby="myModalLabel33"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="offerwall">
                            <h3>Loading...</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function showOfferwall($url) {
            document.getElementById("offerwall").innerHTML = '<iframe src="' + $url + '" style="width:100%; height:800px; border:none;" frameborder="0"></iframe>';
            setTimeout(function () {
                $('.offerwall').show();
            }, 100);
        }
    </script>


@endpush
