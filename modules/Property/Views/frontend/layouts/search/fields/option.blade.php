<li class="mb-3">
    <div class="search_option_two">
        <div class="candidate_revew_select">
            <select name="{{$name}}" class="selectpicker w100 show-tick">
                <option value="0">{{$holder}}</option>
                @foreach($list as $item)
                    <option value="{{$item->id}}" 
                        @if(Request::input('location_id') == $item->id && $name == 'location_id') selected @endif
                        @if(Request::input('category_id') == $item->id && $name == 'category_id') selected @endif
                        @if(Request::input('property_type') == $item->id && $name == 'property_type') selected @endif
                        @if(Request::input('bathroom') == $item->id && $name == 'bathroom') selected @endif
                        @if(Request::input('bedroom') == $item->id && $name == 'bedroom') selected @endif
                        @if(Request::input('garage') == $item->id && $name == 'garage') selected @endif
                        @if(Request::input('year_built') == $item->id && $name == 'year_built') selected @endif
                    >{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</li>