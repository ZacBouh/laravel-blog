@push('script')
<script>
    
    $( '#tag-filter-bar' ).select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
    } );
        
    $( '#tag-filter-bar-button' ).hide();

    $( '#tag-filter-bar' ).on('change', function(){
       $( '#tag-filter-form' ).submit();
    })

</script>
@endpush

<form action="{{ route('articles.filter')}}" method="get" id='tag-filter-form'>
    @csrf
    @method('GET')
    <select class="form-select" multiple id="tag-filter-bar" data-placeholder="Filtrer" name='filterTags[]'>
            @foreach ($tags as $tag )
                <option value="{{ $tag->id }}"
                    {{ isset($selectedFilters) && in_array($tag->id, $selectedFilters) ? 'selected' : '' }}
                    >{{ $tag->name }}</option>
            @endforeach
    </select>
    <button type="submit" id='tag-filter-bar-button'>Filtrer</button>
</form>