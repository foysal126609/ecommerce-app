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
            <div class="col-md-8 offset-2">
                <div class="card">
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            <h6 class="mb-0 text-uppercase">Category table</h6>
                            <a href="{{ route('admin.category.create') }}" class="btn btn-success">create Category</a>
                            <hr/>
                            <table class="table table-bordered table-striped table-hover">
                                <tr>
                                    <th>sl</th>
                                    <th>Category name</th>
                                    <th>Image</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                                @php $i=1 @endphp
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{$category->category_name}}</td>
                                    <td>
                                        <img src="{{ asset($category->image) }}" class="img-fluid" style="height: 50px;width: 50px"  alt="">
                                    </td>
                                    <td>{{ $category->status == 1 ? 'published':'Unpublished' }}</td>
                                    <td>
                                        <a href="{{ route('admin.category.edit',$category->id) }}" class="btn btn-primary btn-sm">edit</a>
                                        @if($category->status == 1)
                                            <a href="{{ route('admin.category.show',$category->id) }}" class="btn btn-success btn-sm">unPublished</a>
                                        @else
                                            <a href="{{ route('admin.category.show',$category->id) }}" class="btn btn-warning btn-sm">Published</a>
                                        @endif

                                        <form action="{{ route('admin.category.destroy',$category->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <input type="submit" value="delete" class="btn btn-danger btn-sm">
                                        </form>

                                    </td>
                                </tr>
                                    @endforeach
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
