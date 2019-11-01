<option value="0">--------------  Please Select  -------------------------</option>
@foreach($sub_categories as $sub_category)
	<option value="{{ $sub_category->id }}">{{ $sub_category->category_name }}</option>
@endforeach