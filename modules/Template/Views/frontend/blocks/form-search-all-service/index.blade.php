

@php
    $limit_location = 15;
    $list_location     = \Modules\Location\Models\Location::where('status', 'publish')->limit($limit_location)->with(['translations'])->get()->toTree();
    $list_category     = \Modules\Property\Models\PropertyCategory::where('status', 'publish')->get()->toTree();
@endphp
<section class="home-one home1-overlay home1_bgi1" style="background-image: url('{{$bg_image_url}}');">
    <div class="container">
        <div class="row posr">

            <div class="col-lg-12">
                <div class="home_content">
                    <div class="home-text text-center">
                        <h2 class="fz55">{{$title}}</h2>
                        <p class="fz18 color-white">{{$sub_title}}</p>
                    </div>
                    @if(empty($hide_form_search))
                    <div class="home_adv_srch_opt">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-buy-tab" data-toggle="pill" href="#pills-buy" role="tab" aria-controls="pills-buy" aria-selected="true">{{__('Buy')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-rent-tab" data-toggle="pill" href="#pills-rent" role="tab" aria-controls="pills-rent" aria-selected="true">{{__('Rent')}}</a>
                            </li>
                        </ul>
                        <div class="tab-content home1_adsrchfrm" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-buy" role="tabpanel" aria-labelledby="pills-home-tab">
                                <form method="get" action="{{route('property.search')}}">
                                @csrf
                                <input type="hidden" name="property_type" value="1">
                                <div class="home1-advnc-search">
                                    <ul class="h1ads_1st_list mb0">
                                        @include('Property::frontend.layouts.search.fields.service_name', ['holder' => __('Enter keyword ...'), 'name' => 'service_name'])
                                        @include('Property::frontend.layouts.search.fields.option',['list' => $list_category,'holder' => __('Property Category'), 'name' => 'category_id'])
                                        @include('Property::frontend.layouts.search.fields.option',['list' => $list_location, 'holder' => __('Location'), 'name' => 'location_id'])
                                            <?php
                                            $price_min = $pri_from = floor ( App\Currency::convertPrice($property_min_max_price[0]) );
                                            $price_max = $pri_to = ceil ( App\Currency::convertPrice($property_min_max_price[1]) );
                                            if (!empty($price_range = Request::query('price_range'))) {
                                                $pri_from = explode(";", $price_range)[0];
                                                $pri_to = explode(";", $price_range)[1];
                                            }
                                            $currency = App\Currency::getCurrency( App\Currency::getCurrent());
                                            ?>
                                        @include('Property::frontend.layouts.search.fields.price',['list' => [],'holder' => __('Choose Price'), 'name' => 'price'])
                                        <li class="custome_fields_520 list-inline-item">
                                            <div class="navbered">
                                                  <div class="mega-dropdown">
                                                    <span id="show_advbtn" class="dropbtn">{{__('Advanced')}} <i class="flaticon-more pl10 flr-520"></i></span>
                                                    <div class="dropdown-content">
                                                        @if(!empty($attr_hide))
                                                            @foreach($attr_hide as $attr)
                                                            <div class="row p15">
                                                                <div class="col-lg-12">
                                                                <h4 class="text-thm3">{{$attr->name}}</h4>
                                                                </div>
                                                                <div class="col-xxs-6 col-sm col-lg col-xl">
                                                                    <ul class="ui_kit_checkbox selectable-list">
                                                                        @foreach($attr->terms as $term)
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input name="terms[]" type="checkbox" class="custom-control-input" value="{{$term->id}}" id="{{$term->slug}}">
                                                                                <label class="custom-control-label" for="{{$term->slug}}">{{$term->name}}</label>
                                                                            </div>
                                                                        </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        @endif
                                                          <div class="row p-md-1 pt0-xsd">
                                                              <div class="col-lg-12 col-xl-12">
                                                                  <ul class="apeartment_area_list  text-center">
                                                                    @php $property_search_fields = setting_item_array('property_search_fields');
                                                                        $property_search_fields = array_values(\Illuminate\Support\Arr::sort($property_search_fields, function ($value) {
                                                                            return $value['position'] ?? 0;
                                                                        }));
                                                                        $list_number = [
                                                                            (object)['id' => 1,'name' => '1'],
                                                                            (object)['id' => 2,'name' => '2'],
                                                                            (object)['id' => 3,'name' => '3'],
                                                                            (object)['id' => 4,'name' => '4'],
                                                                            (object)['id' => 5,'name' => '5'],
                                                                            (object)['id' => 6,'name' => '6'],
                                                                            (object)['id' => 7,'name' => '7'],
                                                                            (object)['id' => 8,'name' => '8']
                                                                        ];
                                                                        $list_garages_value = [
                                                                            (object)['id' => 1,'name' => 'Yes'],
                                                                            (object)['id' => 2,'name' => 'No'],
                                                                            (object)['id' => 3,'name' => 'Others']
                                                                        ];
                                                                        $current_year = (int)date("Y");
                                                                        $list_year = [];
                                                                        for($year = $current_year;$year >= ($current_year - 8);$year--) {
                                                                            $list_year[] = (object)['id' => $year,'name' => $year];
                                                                        }
                                                                    @endphp
                                                                    @include('Property::frontend.layouts.search.fields.option',['list' => $list_number,'holder' => __('Bathrooms'), 'name' => 'bathroom'])
                                                                    @include('Property::frontend.layouts.search.fields.option',['list' => $list_number,'holder' => __('Bedrooms'), 'name' => 'bedroom'])
                                                                    @include('Property::frontend.layouts.search.fields.option',['list' => $list_number,'holder' => __('Garages'), 'name' => 'garage'])
                                                                    @include('Property::frontend.layouts.search.fields.option',['list' => $list_year,'holder' => __('Year built'), 'name' => 'year_built'])
                                                                      <li class="mb-3">
                                                                          <label for="distance">{{__('nearest_distance')}}</label>
                                                                          <input type="number" class="form-control text-center" id="distance" name="distance" placeholder="Enter Distance ..." value="50">
                                                                      </li>
                                                                      <input type="hidden" name="map_lat">
                                                                      <input type="hidden" name="map_lng">
                                                                      <div class="h200" id="map-canvas"></div>

                                                                  </ul>
                                                              </div>
                                                              <div class="col-lg-1 col-xl-2">
                                                                  <div class="mega_dropdown_content_closer">
                                                                      <h5 class="text-thm text-right mt15"><span id="hide_advbtn" class="curp">{{__('Hide')}}</span></h5>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-inline-item">
                                            <div class="search_option_button">
                                                <button type="submit" class="btn btn-thm">{{__('Search')}}</button>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@section('footer')
    {!! App\Helpers\MapEngine::scripts() !!}
    <script>
        jQuery(function ($) {
            new BravoMapEngine('map-canvas', {
                fitBounds: true,
                center: [{{ "51.505"}}, {{  "-0.09"}}],
                zoom:{{ "8"}},
                ready: function (engineMap) {

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
