@extends('admin.master')
@section('title')
    Category
@endsection

@section('style')
    <style></style>
@endsection

@section('script')
    <script></script>
@endsection

@section('content')
    <main class="page-content">
        <div class="row ">
            <div class="col-md-6 offset-3">
                <div class="card">
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            <h6 class="mb-0 text-uppercase">Category Form</h6>
                            <a href="{{ route('admin.category.index') }}" class="btn btn-success">All Category Table</a>
                            <hr/>
                            <form class="row g-3" action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="col-12">
                                    <label class="form-label">Category Name</label>
                                    <input type="text" name="category_name" class="form-control">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>


@endsection
