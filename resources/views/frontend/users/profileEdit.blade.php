@extends('frontend.layouts.app')

@section('title')
    Edit {{ $$module_name_singular->name }}'s Profile
@endsection
@section('CustomCss')
    <style>
        .container-new {
            max-width: 60%;
            margin-left: 17%;
            background-color: #ffffff;
            padding: 103px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 18px;
        }

        .header p {
            color: #777;
            margin-bottom: 18px;
        }

        .view-profile-button {
            display: inline-block;
            padding: 3px;
            width: 100%;
            color: #464648;
            font-size: 14px;
            font-weight: 600;
            /* background-color: #333; */
            border: 2px solid #333;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .view-profile-button:hover {
            background-color: #13161c;
            color: #fff;
        }

        .form-section {
            padding: 20px;
            border-top: 1px solid #eaeaea;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }

        .col-md-6 {
            position: relative;
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
        }

        @media (min-width: 768px) {
            .col-md-6 {
                flex: 0 0 50%;
                max-width: 50%;
            }
        }

        /* Form Group */
        .form-group {
            margin-bottom: 1rem;
        }

        label {
            display: inline-block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #374151;
        }

        /* Custom Input */
        .custom-input,
        textarea,
        select,
        input {
            display: block;
            width: 100%;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #374151;
            background-color: #ffffff;
            background-clip: padding-box;
            border: 1px solid #d1d5db;
            border-radius: 0.25rem;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .custom-input:focus,
        input:focus {
            color: #374151;
            background-color: #ffffff;
            border-color: transparent;
            outline: 0;
            box-shadow: 0 0 0 1px rgba(37, 99, 235, 1);
        }

        .custom-input:focus,
        textarea:focus {
            color: #374151;
            background-color: #ffffff;
            border-color: transparent;
            outline: 0;
            box-shadow: 0 0 0 1px rgba(37, 99, 235, 1);
        }

        textarea,
        input::placeholder {
            color: #d1d5db;
            opacity: 1;
            /* Firefox */
        }

        /* Dark Mode */
        .dark .custom-input,
        textarea .dark input {
            background-color: #f3f4f6;
            color: #374151;
        }

        .dark textarea input::placeholder {
            color: #d1d5db;
        }

        /* File Input */
        input[type="file"] {
            display: block;
            width: 100%;
            padding: 0.5rem;
            font-size: 1rem;
            color: #374151;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            background-color: #fff;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input[type="file"]:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.5);
        }

        .submit-button {
            display: inline-block;
            padding: 6px;
            width: 100%;
            color: #fff;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .submit-button:hover {
            background-color: #0056b3;
        }
    </style>
@endsection

@section('content')
    <div class="container-new">
        <div class="header">
            <h4>Edit Profile</h4>
            <p>This information will be displayed publicly so be careful what you share.</p>
            <a href='{{ route('frontend.users.profile') }}' class="view-profile-button">View Profile</a>
        </div>

        <div class="form-section">
            {{ html()->modelForm($$module_name_singular, 'PATCH', route('frontend.users.profileUpdate', encode_id($$module_name_singular->id)))->acceptsFiles()->open() }}

            <form method="POST" action="{{ route('frontend.users.profileUpdate', encode_id($$module_name_singular->id)) }}"
                enctype="multipart/form-data">
                <div class="mb-10 sm:grid sm:grid-cols-3 sm:gap-6">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php
                                $field_name = 'first_name';
                                $field_lable = label_case($field_name);
                                $field_placeholder = $field_lable;
                                $required = 'required';
                                ?>
                                {{ html()->label($field_lable, $field_name) }}
                                {!! field_required($required) !!}
                                {{ html()->text($field_name)->placeholder($field_placeholder)->attributes(["$required"]) }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php
                                $field_name = 'last_name';
                                $field_lable = label_case($field_name);
                                $field_placeholder = $field_lable;
                                $required = 'required';
                                ?>
                                {{ html()->label($field_lable, $field_name) }}
                                {!! field_required($required) !!}
                                {{ html()->text($field_name)->placeholder($field_placeholder)->attributes(["$required"]) }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="first_name">Email</label>
                                <span class="text-danger text-red-600">*</span>
                                <input id="email" type="email" value="{{ $user->email }}" disabled>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php
                                // $field_name = 'mobile';
                                // $field_lable = label_case($field_name);
                                // $field_placeholder = $field_lable;
                                // $required = '';
                                ?>
                                {{ html()->label($field_lable, $field_name) }}
                                {!! field_required($required) !!}
                                {{ html()->text($field_name)->placeholder($field_placeholder)->attributes(["$required"]) }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php
                                // $field_name = 'date_of_birth';
                                // $field_lable = label_case($field_name);
                                // $field_placeholder = $field_lable;
                                // $required = '';
                                // $value = $user->date_of_birth == '' ? '' : \Carbon\Carbon::parse($user->date_of_birth)->toDateString();
                                ?>
                                {{ html()->label($field_lable, $field_name) }}
                                {!! field_required($required) !!}
                                {{ html()->text($field_name)->type('date')->value($value)->attributes(["$required"]) }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php
                                // $field_name = 'gender';
                                // $field_lable = label_case($field_name);
                                // $field_placeholder = '-- Select an option --';
                                // $required = '';
                                // $select_options = [
                                //     'Female' => 'Female',
                                //     'Male' => 'Male',
                                //     'Other' => 'Other',
                                // ];
                                ?>
                                {{ html()->label($field_lable, $field_name) }}
                                {!! field_required($required) !!}
                                {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->attributes(["$required"]) }}
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php
                                // $field_name = 'address';
                                // $field_lable = label_case($field_name);
                                // $field_placeholder = $field_lable;
                                // $required = '';
                                ?>
                                {{ html()->label($field_lable, $field_name) }}
                                {!! field_required($required) !!}
                                {{ html()->text($field_name)->placeholder($field_placeholder)->attributes(["$required"]) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php
                                // $field_name = 'url_website';
                                // $field_lable = label_case($field_name);
                                // $field_placeholder = $field_lable;
                                // $required = '';
                                ?>
                                {{ html()->label($field_lable, $field_name) }}
                                {!! field_required($required) !!}
                                {{ html()->text($field_name)->placeholder($field_placeholder)->attributes(["$required"]) }}
                            </div>
                        </div>
                    </div> --}}

                    {{-- <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php
                                // $field_name = 'url_facebook';
                                // $field_lable = label_case($field_name);
                                // $field_placeholder = $field_lable;
                                // $required = '';
                                ?>
                                {{ html()->label($field_lable, $field_name) }}
                                {!! field_required($required) !!}
                                {{ html()->text($field_name)->placeholder($field_placeholder)->attributes(["$required"]) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php
                                // $field_name = 'url_twitter';
                                // $field_lable = label_case($field_name);
                                // $field_placeholder = $field_lable;
                                // $required = '';
                                ?>
                                {{ html()->label($field_lable, $field_name) }}
                                {!! field_required($required) !!}
                                {{ html()->text($field_name)->placeholder($field_placeholder)->attributes(["$required"]) }}
                            </div>
                        </div>
                    </div> --}}

                    {{-- <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"> --}}
                                <?php
                                // $field_name = 'url_linkedin';
                                // $field_lable = label_case($field_name);
                                // $field_placeholder = $field_lable;
                                // $required = '';
                                ?>
                                {{-- {{ html()->label($field_lable, $field_name) }}
                                {!! field_required($required) !!}
                                {{ html()->text($field_name)->placeholder($field_placeholder)->attributes(["$required"]) }}
                            </div> --}}
                        {{-- </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php
                                // $field_name = 'url_instagram';
                                // $field_lable = label_case($field_name);
                                // $field_placeholder = $field_lable;
                                // $required = '';
                                ?>
                                {{ html()->label($field_lable, $field_name) }}
                                {!! field_required($required) !!}
                                {{ html()->text($field_name)->placeholder($field_placeholder)->attributes(["$required"]) }}
                            </div>
                        </div> --}}
                    {{-- </div> --}}

                    {{-- <div class="form-group">
                        <?php
                        // $field_name = 'bio';
                        // $field_lable = label_case($field_name);
                        // $field_placeholder = $field_lable;
                        // $required = '';
                        ?>
                        {{ html()->label($field_lable, $field_name) }}
                        {!! field_required($required) !!}
                        {{ html()->textarea($field_name)->placeholder($field_placeholder)->attributes(["$required", 'rows' => 5]) }}
                    </div> --}}

                    <div class="row">
                        <label for="avatar">Photo</label>
                        <div class="col-md-4">
                            <div class="form-group">
                                <img src="{{ asset('public/storage/' . $$module_name_singular->avatar) }}" alt="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="file" id="avatar" name="avatar">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="submit-button">Save</button>
            </form>
        </div>

        <div class="header">
            <h4>Account Settings</h4>
            <p>Update account information.</p>
            <a href="{{ route('frontend.users.changePassword') }}">
                <div class="view-profile-button">
                    Change Password
                </div>
            </a>
        </div>
    </div>
@endsection
