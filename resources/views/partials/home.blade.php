<section>
    @foreach ($images as $image)
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('storage/' . $image->src) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">image</h5>
            </div>
        </div>
        <form action="/delete/{{$image->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger">Delete</button>
            <a href="/archive/{{$image->id}}" class="btn btn-outline-warning">Archived</a>
            <a href="/edit/{{$image->id}}" class="btn btn-outline-secondary">EDIT</a>
        </form>
    @endforeach
</section>
