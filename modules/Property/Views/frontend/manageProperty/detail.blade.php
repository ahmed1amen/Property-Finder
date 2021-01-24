<?php $container = 1 ?>
@extends('layouts.user')
@section('head')

@endsection
@section('content')
    <div class="col-lg-12 mb10">
    </div>
    <div class="mb-3">
        @if($row->id)
            @include('Language::admin.navigation')
        @endif
    </div>
    <form class="" action="{{route('property.vendor.store',['id'=>($row->id) ? $row->id : '-1','lang'=>request()->query('lang')])}}" method="post">
        @csrf
            @include('Property::admin.property.content',['hide_gallery'=>true,'property_type'=>1])
            @include('Property::admin.property.location')
            @include('Property::admin.property.pricing')

            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="mb30">{{ __('Property media') }}</h4>
                        </div>
                        <div class="col-lg-12">
                            {!! \Modules\Media\Helpers\FileHelper::fieldGalleryUpload('gallery',$row->gallery) !!}
                        </div>

                        <div class="col-lg-12">
                            <h4 class="mb30">{{ __('Property Image') }}</h4>
                        </div>
                        <div class="col-lg-12">
                            {!! \Modules\Media\Helpers\FileHelper::fieldUpload('image_id',$row->image_id) !!}
                        </div>
                    </div>
                </div>
            </div>
            @include('Property::admin.property.attributes')
            <div class="my_profile_setting_input">
                <button type="submit" class="btn btn2 float-right">{{ _('Save') }}</button>
            </div>
    </form>

@endsection
@section('script.body')
    <script type="text/javascript" src="{{ asset('libs/tinymce/js/tinymce/tinymce.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('js/condition.js?_ver='.config('app.version')) }}"></script>
    <script type="text/javascript" src="{{url('module/core/js/map-engine.js?_ver='.config('app.version'))}}"></script>
    {!! App\Helpers\MapEngine::scripts() !!}
    <script>
        jQuery(function ($) {
            new BravoMapEngine('map_content', {
                fitBounds: true,
                center: [{{$row->map_lat ?? "51.505"}}, {{$row->map_lng ?? "-0.09"}}],
                zoom:{{$row->map_zoom ?? "8"}},
                ready: function (engineMap) {
                    @if($row->map_lat && $row->map_lng)
                    engineMap.addMarker([{{$row->map_lat}}, {{$row->map_lng}}], {
                        icon_options: {}
                    });
                    @endif
                    engineMap.on('click', function (dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {}
                        });
                        $("input[name=map_lat]").attr("value", dataLatLng[0]);
                        $("input[name=map_lng]").attr("value", dataLatLng[1]);
                    });
                    engineMap.on('zoom_changed', function (zoom) {
                        $("input[name=map_zoom]").attr("value", zoom);
                    });
                    engineMap.searchBox($('.bravo_searchbox'),function (dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {}
                        });
                        $("input[name=map_lat]").attr("value", dataLatLng[0]);
                        $("input[name=map_lng]").attr("value", dataLatLng[1]);
                    });
                }
            });
        })
    </script>
@endsection
