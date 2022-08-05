@include('category.nav')
<a href="{{route('addposts.create')}}"><button>add post</button></a>

<h2>This is post</h2>

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Title</th>
        <th>Category Name</th>
        <th>Status</th>
        <th width="280px">Action</th>
    </tr>
    
    @foreach ($data as $key => $value)
    <tr>
        <td>{{ $value->id }}</td>
        <td>{{ $value->title }}</td>
        <td>{{ $value->categoryDetails->name }} </td>
        <td>{{ $value->status }}</td>
        <td>
            <form action="{{ route('addposts.destroy',$value->id) }}" method="POST">   
                  
                <a class="btn btn-primary" href="{{ route('addposts.edit',$value->id) }}">Edit</a>   
                @csrf
                @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
    </table> 