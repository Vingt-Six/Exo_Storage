<section class="mx-5 mt-5">
    <form action="/store" method="POST" enctype="multipart/form-data">
        @csrf
        <h2>Choose a image</h2>
        <div class="mb-3 mx-5 mt-4">
            <input class="form-control" type="file" id="formFile" name="src">
            <button type="submit" class="btn btn-outline-dark w-100 mt-3">Add</button>
        </div>
    </form>
    <a href="/corbeille" class="btn btn-outline-danger fixed-bottom">Corbeille</a>
</section>
