@push('script')
<script>
    
    $( '#tag-filter-bar' ).select2({
        placeholder: 'Filtrer'
    });
        
    $( '#tag-filter-bar-button' ).hide();

    $( '#tag-filter-bar' ).on('change', function(){
       $( '#tag-filter-form' ).submit();
        $( '.select2-selection').removeClass('filter-placeholder')
    })

    $( '.select2-selection__choice').css('background',  '#004D40').css('color','white').css('border', 'none')
    $( '.select2-selection__choice__remove').css('background',  '#004D40').css('color','white').css('border', 'none')
    $( '.select2-selection').css('height', '36px').css('border', '1px solid #212121')
    if( $('#tag-filter-bar').val() === null || $('#tag-filter-bar').val().length === 0 ){
        $( '.select2-selection').addClass('filter-placeholder')
    }
    
</script>
@endpush

<form action="{{ route('articles.filter')}}" method="get" id='tag-filter-form' style="width: 100%; max-height: 50px; overflow: hidden;">
    @csrf
    @method('GET')
    <select class="form-select" multiple='multiple' id="tag-filter-bar" name='filterTags[]'>
            @foreach ($tags as $tag )
                <option value="{{ $tag->id }}"
                    {{ isset($selectedFilters) && in_array($tag->id, $selectedFilters) ? 'selected' : '' }}
                    >{{ $tag->name }}</option>
            @endforeach
    </select>
    <button type="submit" id='tag-filter-bar-button'>Filtrer</button>
</form>