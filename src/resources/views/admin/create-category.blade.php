@extends('core::admin.master')

@section('title', __('projects::global.New category'))

@section('content')

    @include('core::admin._button-back', ['module' => 'project_categories'])
    <h1>
        @lang('projects::global.New category')
    </h1>

    {!! BootForm::open()->action(route('admin::index-project_categories'))->multipart()->role('form') !!}
        @include('projects::admin._form-category')
    {!! BootForm::close() !!}

@endsection
