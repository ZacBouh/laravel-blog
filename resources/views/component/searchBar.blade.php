<div>
    <form action="{{route('articles.search')}}" method="get" style="width: 100%; flex-shrink: 0; display: flex;" >
        @csrf
        @method('GET')
        <input  style="height: 36px; border: 1px solid #212121; border-radius: 5px; border-right: none; border-top-right-radius: 0px; border-bottom-right-radius: 0px;" type="text" name="query" placeholder="Rechercher" aria-label="recherche"  >
        <button class="btn bg-custom-button" style="height: 36px; border-top-left-radius: 0px; border-bottom-left-radius: 0px; border: 1px solid #212121; border-left: none;" type="submit">Go</button>
    </form>
</div>