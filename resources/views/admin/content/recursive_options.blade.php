@foreach($parents as $parent)
    @if($parent->parent_id == '')
    <option value="{{ $parent->id }}" {{ ($selected_id == $parent->id) ? "selected" : "" }}>  -{{ $parent->title }}</option>

    @endif
       @include('admin.content.recursive_options', ['parents' => $parent->child, 'selected_id' => $selected_id ?? ""])
@endforeach