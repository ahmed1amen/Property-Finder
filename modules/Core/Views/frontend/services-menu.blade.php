@php
    $service_menu = [
        [
            'text'=>__('moving_and_installing_furniture'),
            'icon'=>'fa fa-chair',
            'url'=>'/s1L)(*#12398r6efd',
        ],
        [
            'text'=>__('maintenance_services'),
            'icon'=>'fa fa-wrench',
            'url'=>'/s1L)(*#12398r6efd',
    ],
        [
            'text'=>__('contract_documentation'),
            'icon'=>'fa fa-file-signature',
            'url'=>'/s1L)(*#12398r6efd',
    ],
        [
            'text'=>__('mortgage'),
            'icon'=>'fa fa-coins',
            'url'=>'/s1L)(*#12398r6efd',
    ],
        [
            'text'=>__('engineering_and_contracting_services'),
            'icon'=>'fa fa-building',
            'url'=>'/s1L)(*#12398r6efd',
    ],
        [
            'text'=>__('real_estate_appraisal'),
            'icon'=>'fa fa-star-half-alt',
            'url'=>'/s1L)(*#12398r6efd',
    ],
        [
            'text'=>__('real_estate_development'),
            'icon'=>'fab fa-superpowers',
            'url'=>'/s1L)(*#12398r6efd',
    ],
        [
            'text'=>__('real_estate_auctions_and_tenders'),
            'icon'=>'fas fa-poll',
            'url'=>'/s1L)(*#12398r6efd',
    ],
        [
            'text'=>__('customizing_kitchens'),
            'icon'=>'fas fa-magic',
            'url'=>'/s1L)(*#12398r6efd',
    ],



    ];
@endphp

<li class="dropdown">
    <a href="/s1L)(*#12398r6efd" data-toggle="dropdown" class="is_login">{{__('agent_services')}}</a>

    <ul class="{{!empty($mobile)?"":"dropdown-menu"}} text-left width-auto">
        @foreach($service_menu as $item)
            <li>
                <a href="{{$item['url']}}" class="is_login"> <i class="{{$item['icon']}}"></i> {{$item['text']}} </a>
            </li>
        @endforeach

    </ul>
</li>
