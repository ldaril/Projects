@extends('core::admin.master')

@section('title', __('projects::global.categories'))

@section('content')

<div ng-app="typicms" ng-cloak ng-controller="ListController">

    <a href="{{ route('admin::index-projects') }}" title="{{ __('projects::global.Back') }}" class="btn-back">
        <span class="text-muted fa fa-arrow-circle-left"></span><span class="sr-only">{{ __('projects::global.Back') }}</span>
    </a>
    @include('core::admin._button-create', ['module' => 'project-categories'])

    <h1>@lang('projects::global.categories')</h1>

    <div class="btn-toolbar">
        @include('core::admin._lang-switcher')
    </div>

    <div class="table-responsive">

        <table st-persist="projectCategoriesTable" st-table="displayedModels" st-safe-src="models" st-order st-filter class="table table-condensed table-main">
            <thead>
                <tr>
                    <th class="delete"></th>
                    <th class="edit"></th>
                    <th st-sort="status" class="status st-sort">{{ __('Status') }}</th>
                    <th st-sort="image" class="image st-sort">{{ __('Image') }}</th>
                    <th st-sort="position" st-sort-default="true" class="position st-sort">{{ __('Position') }}</th>
                    <th st-sort="title" class="title st-sort">{{ __('Title') }}</th>
                </tr>
            </thead>

            <tbody>
                <tr ng-repeat="model in displayedModels">
                    <td typi-btn-delete action="delete(model)"></td>
                    <td>
                        @include('core::admin._button-edit', ['module' => 'categories'])
                    </td>
                    <td typi-btn-status action="toggleStatus(model)" model="model"></td>
                    <td>
                        <img ng-src="@{{ model.thumb }}" alt="">
                    </td>
                    <td>
                        <input class="form-control input-sm" min="0" type="number" name="position" ng-model="model.position" ng-change="update(model)">
                    </td>
                    <td>@{{ model.title | translated }}</td>
                </tr>
            </tbody>
        </table>

    </div>

</div>

@endsection