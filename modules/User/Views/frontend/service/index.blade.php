@extends('layouts.user')
@section('content')
    <div class="my_dashboard_review">
        <div class="mb40">
            <div class="row justify-content-center text-center">
                <a href="" class="btn btn-thm mx-3 my-3">Service Control</a>
                <a href="" class="btn btn-thm mx-3 my-3">Service Requests</a>
            </div>
            @include('admin.message')
            <div class="property_table">
                <div class="table-responsive mt0">
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">{{ __('Listing Title') }}</th>
                            <th scope="col">{{ __('Date published') }}</th>
                            <th scope="col">{{ __('Status') }}</th>
                            <th scope="col">{{ __('View') }}</th>
                            <th scope="col">{{ __('Action') }}</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <div class="mbp_pagination">

                </div>
            </div>
        </div>
    </div>
@endsection
