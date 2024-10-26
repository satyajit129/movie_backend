@extends('backend.global.master')
@section('title', 'Settings')
@section('custom_css')
@endsection


@section('content')
<div class="container-fluid">
    @include('backend.global.get_greetings')
    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                @include('backend.global.alert')
                <div class="card-header">
                    <h4 class="card-title">Settings</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('settingsSave', isset($settings) ? $settings->id : '') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="basic-form">
                            <div class="form-group">
                                <label for="name">Website Name</label>
                                <input type="text" class="form-control " name="website_name" value="{{ old('website_name', isset($settings) ? $settings->website_name : '') }}"placeholder="Enter Website Name" required>
                            </div>
                            <div class="form-group">
                                <label for="value">About Us</label>
                                <textarea type="text" class="form-control " name="about_us" placeholder="Enter About Us" rows="5"> {{ old('about_us', isset($settings) ? $settings->about_us : '') }} </textarea>
                            </div>
                            <div class="form-group">
                                <label for="value">Privacy Policy</label>
                                <textarea type="text" class="form-control " name="privacy_policy"placeholder="Enter Privacy Policy" rows="5">{{  old('privacy_policy', isset($settings) ? $settings->privacy_policy : '') }} </textarea>
                            </div>
                            <div class="form-group">
                                <label for="value">Terms & Conditions</label>
                                <textarea type="text" class="form-control " name="terms_and_conditions"  placeholder="Enter Terms & Conditions" rows="5">{{  old('terms_and_conditions', isset($settings) ? $settings->terms_and_conditions : '') }} </textarea>
                            </div>
                            <div class="form-group">
                                <label for="website_email">Website Email</label>
                                <input type="email" class="form-control " name="website_email" value="{{ old('website_email', isset($settings) ? $settings->website_email : '') }}" placeholder="Enter Website Email" required>
                            </div>
                            <div class="form-group">
                                <label for="website_copy_right_text">Website Copy Right Text</label>
                                <input type="text" class="form-control " name="website_copy_right_text" value="{{ old('website_copy_right_text', isset($settings) ? $settings->website_copy_right_text : '') }}" placeholder="Enter Website Copy Right Text" required>
                            </div>
                            <div class="form-group">
                                <label for="website_logo">Website Logo</label>
                                <input type="file" class="form-control " name="website_logo" value=""placeholder="Enter Website Logo" >
                            </div>
                        </div>
                        <div class="rounded-button">
                            <button type="submit" class="btn btn-rounded btn-outline-primary pl-4 pr-4">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('custom_scripts')
@endsection
