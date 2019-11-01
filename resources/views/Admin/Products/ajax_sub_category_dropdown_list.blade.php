<option value="0">---------- Please Select  ----------</option>
@foreach($sub_category_list as $list)
    <option value="{{ $list->id }}">{{ $list->category_name }}</option>
@endforeach