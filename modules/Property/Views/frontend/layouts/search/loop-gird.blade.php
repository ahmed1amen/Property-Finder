@php
    $translation = $row->translateOrOrigin(app()->getLocale());
@endphp
<div class="item">
    <div class="feat_property">
        <div class="thumb">
            @if($row->image_url)
                <img class="img-whp" src="{{$row->image_url}}" alt="property image">
            @else
                <span class="avatar-text-large">{{$row->vendor->display_name[0]}}</span>
            @endif
            <div class="thmb_cntnt">
                <ul class="tag mb0">
                <li class="list-inline-item"><a>{{$row->property_type == 1 ? _('For Buy') : _('For Rent')}}</a></li>
                @if($row->is_featured)
                <li class="list-inline-item"><a>{{__('Featured')}}</a></li>
                @else
                <li class="d-none"></li>
                @endif
                </ul>
                <ul class="icon mb0">
                    <li class="list-inline-item"><a class="service-wishlist @if($row->hasWishList) active @endif" data-id="{{$row->id}}" data-type="property"><i class="fa fa-heart"></i></a></li>
                </ul>
                <a class="fp_price" href="#">{{ $row->display_price }}</a>
            </div>
        </div>
        <div class="details">
            <div class="tc_content">
                @if($row->Category)
                    <p class="text-thm">{{$row->Category->name}}</p>
                @endif
                <a @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl()}}">
                    <h4>{{$translation->title}}</h4>
                </a>
                @if(!empty($row->location->name))
                    @php $location =  $row->location->translateOrOrigin(app()->getLocale()) @endphp
                @endif
                <p><span class="flaticon-placeholder"></span> {{$location->name ?? ''}}</p>
                <ul class="prop_details mb0">
                    <li class="list-inline-item">{{__('Beds:')}} {{$row->bed}}</li>
                    <li class="list-inline-item">{{__('Baths:')}} {{$row->bathroom}}</li>
                    <li class="list-inline-item">{{__('Sq:')}} {!! size_unit_format($row->square) !!}</li>
                </ul>
            </div>
            <div class="fp_footer">
                <ul class="fp_meta float-left mb0">
                    <li class="list-inline-item"><a href="{{route('agent.detail', ['id' => $row->user->id])}}">
                    @if($avatar_url = $row->user->getAvatarUrl())
                        <img class="avatar" src="{{$avatar_url}}" alt="{{$row->user->getDisplayName()}}">
                    @else
                        <span class="avatar-text-list">{{ucfirst($row->user->getDisplayName()[0])}}</span>
                    @endif
                    </a></li>
                    <li class="list-inline-item"><a href="{{route('agent.detail', ['id' => $row->user->id])}}">{{$row->user->getDisplayName()}}</a></li>
                </ul>
                <div class="fp_pdate float-right">{{ display_date($row->updated_at)}}</div>
            </div>
        </div>
    </div>
</div>
