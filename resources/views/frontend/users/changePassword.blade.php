@extends('frontend.layouts.app')

@section('title')
    @lang('Change Password: ') {{ $$module_name_singular->name }}
@endsection
@section('CustomCss')
    <style>
        .profile-container {
            max-width: 800px;
            margin-left: 20%;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 120px;
            /* margin-top: 12%; */
        }

        .profile-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #eee;
        }

        .profile-name {
            font-size: 2em;
            margin: 10px 0;
        }

        .profile-address,
        .profile-website {
            color: #777;
        }

        .profile-website {
            text-decoration: none;
            color: #0066cc;
        }

        .profile-social-links {
            text-align: center;
            margin: 20px 0;
        }

        .social-link {
            text-decoration: none;
            margin: 0 10px;
            color: #0066cc;
        }

        .profile-info {
            border-top: 1px solid #eee;
            padding-top: 20px;
        }

        .profile-info h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            margin: 10px 0;
        }

        .info-label {
            font-weight: bold;
        }

        .info-value {
            color: #555;
        }

        .bio .info-value {
            text-align: justify;
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

        .header {
            text-align: center;
            margin-bottom: 18px;
        }

        .view-profile-button {
            color: #e65302;
            font-size: 14px;
            font-weight: 600;
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
    <div class="profile-container">
        @include('frontend.includes.messages')
        <div class="header">
            <h4>There is no doubt that</h4>
            <p>Use the following form to change your account password!</p>
            <a href="{{ route('frontend.users.profile') }}">
                <div class="view-profile-button">
                    View Profile
                </div>
            </a>
        </div>

        <div class="form-section">
            {{ html()->modelForm($$module_name_singular, 'PATCH', route('frontend.users.changePasswordUpdate', encode_id($$module_name_singular->id)))->acceptsFiles()->open() }}

            <form method="POST" action="{{ route('frontend.users.changePasswordUpdate', encode_id($$module_name_singular->id)) }}"
                enctype="multipart/form-data">
                <div class="mb-10 sm:grid sm:grid-cols-3 sm:gap-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php
                                $field_name = 'password';
                                $field_lable = __('labels.backend.users.fields.' . $field_name);
                                $field_placeholder = $field_lable;
                                $required = 'required';
                                ?>
                                {{ html()->label($field_lable, $field_name) }}
                                {!! field_required($required) !!}
                                {{ html()->password($field_name)->placeholder($field_placeholder)->attributes(["$required"]) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php
                                $field_name = 'password_confirmation';
                                $field_lable = __('labels.backend.users.fields.' . $field_name);
                                $field_placeholder = $field_lable;
                                $required = 'required';
                                ?>
                                {{ html()->label($field_lable, $field_name) }}
                                {!! field_required($required) !!}
                                {{ html()->password($field_name)->placeholder($field_placeholder)->attributes(["$required"]) }}
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="submit-button">Update Password</button>
            </form>
        </div>
        <div class="header">
            <h4>Edit Profile</h4>
            <p>Update account information.</p>
            <a href="{{ route('frontend.users.profileEdit') }}">
                <div class="view-profile-button">
                    Edit Profile
                </div>
            </a>
        </div>
    </div>
@endsection
