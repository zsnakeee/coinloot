@extends('layouts.dashboard')

@section('title', 'Settings')

@section('content')
    <!-- profile -->
    <div class="card">
        <div class="card-header border-bottom">
            <h4 class="card-title">Profile Details</h4>
        </div>
        <div class="card-body py-1">
            <form class="validate-form" method="POST" action="{{ route('user.settings.update') }}"
                  enctype="multipart/form-data">
                @csrf

                @if(session('success'))
                    <div class="alert alert-success opacity-100">
                        <div class="alert-body">
                            <p>{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                @if (count($errors) > 0)
                    <div class="alert alert-danger opacity-100">
                        <div class="alert-body">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="d-flex">
                    <a href="#" class="me-25">
                        <img src="{{ auth()->user()->avatar() }}" id="account-upload-img"
                             class="uploadedAvatar rounded me-50" alt="profile image" height="100" width="100"/>
                    </a>

                    <div class="d-flex align-items-end mt-75 ms-1">
                        <div>
                            <label for="account-upload" class="btn btn-sm btn-success mb-75 me-75">Upload</label>
                            <input type="file" id="account-upload" hidden accept="image/*" name="image"/>
                            <button type="button" id="account-reset" class="btn btn-sm btn-outline-secondary mb-75">
                                Reset
                            </button>
                            <p class="mb-0">Allowed file types: png, jpg, jpeg.</p>
                        </div>
                    </div>

                </div>

                <div class="row mt-2 pt-50">
                    <div class="col-12 col-sm-6 mb-1">
                        <label class="form-label" for="accountEmail">Email</label>
                        <input type="email" class="form-control" id="accountEmail" name="email" placeholder="Email"
                               value="{{ auth()->user()->email }}" disabled/>
                    </div>
                    <div class="col-12 col-sm-6 mb-1">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                               placeholder="********" data-msg=""/>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-success mt-1 me-1">Save changes</button>
                        <button type="reset" class="btn btn-outline-secondary mt-1">Discard</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        let accountUploadImg = $('#account-upload-img'),
            accountUploadBtn = $('#account-upload'),
            accountUserImage = $('.uploadedAvatar'),
            accountResetBtn = $('#account-reset');


        if (accountUserImage) {
            let resetImage = accountUserImage.attr('src');
            accountUploadBtn.on('change', function (e) {
                let reader = new FileReader(),
                    files = e.target.files;
                reader.onload = function () {
                    if (accountUploadImg) {
                        accountUploadImg.attr('src', reader.result);
                    }
                };
                reader.readAsDataURL(files[0]);
            });

            accountResetBtn.on('click', function () {
                accountUserImage.attr('src', resetImage);
            });
        }
    </script>
@endpush
