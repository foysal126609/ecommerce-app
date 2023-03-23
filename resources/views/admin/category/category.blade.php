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
                            <form class="row g-3" action="{{ isset($category) == null ? route('admin.category.store')  : route('admin.category.update',$category->id)  }}" method="post" enctype="multipart/form-data">
                                @if(isset($category))
                                    @method('put')
                                @endif
                                @csrf
                                <div class="col-12">
                                    <label class="form-label">Category Name</label>
                                    <input type="text" name="category_name" value="{{ isset($category) ? $category->category_name : ' ' }}" class="form-control">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Image</label>
                                    <input type="file" name="image" class="form-control">
                                    @if(isset($category))
                                    <img src="{{ asset($category->image) }}" class="img-fluid" style="height: 50px; height: 50px" alt="">
                                    @endif
                                </div>
                                @if(isset($category))
                                <div class="col-12">
                                    <label class="form-label">Status</label>
                                    <input type="radio" name="status" value= "1"  {{$category->status ==1 ? 'checked' :''  }}>Published
                                    <input type="radio" name="status" value= "0"  {{$category->status ==0 ? 'checked' :''  }}>UnPublished
                                </div>
                                @endif
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
