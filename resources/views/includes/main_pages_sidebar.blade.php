<div class="col-lg-4">
    <!-- Search widget-->
    <div class="card mb-4">
        <div class="card-header">جستجو</div>
        <div class="card-body">
            <form>
                <input class="form-control" type="text" placeholder="جستجو..." aria-label="جستجو..." aria-describedby="button-search" /><br>
                <input type="submit" value="جستجو" class="btn btn-primary">
            </form>
        </div>
    </div>
    <!-- Categories widget-->
    <div class="card mb-4">
        <div class="card-header">دسته بندی ها</div>
        <div class="card-body">
            <div class="row">
                <ul class="list-unstyled mb-0">
                    @foreach ($categories as $category)
                        <li><a href="{{ route('category', ['category' => $category->id]) }}" style="text-decoration: none;">{{ $category->category_name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
