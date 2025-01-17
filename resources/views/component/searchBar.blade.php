<div>
    <form action="{{route('articles.search')}}" method="get" >
        @csrf
        @method('GET')
        <input type="text" name="query" placeholder="Rechercher" aria-label="recherche"  >
        <button type="submit">Go</button>
    </form>
</div>