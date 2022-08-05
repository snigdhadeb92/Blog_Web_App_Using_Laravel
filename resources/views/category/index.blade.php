@include('category.nav')

<a href="{{route('categories.create')}}"><button>add category</button></a>
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Status</th>
        <th width="280px">Action</th>
    </tr>
    
    @foreach ($data as $key => $value)
    <tr>
        <td>{{ $value->id }}</td>
        <td>{{ $value->name }}</td>
        <td>{{ $value->status }}</td>
        <td>
            <form action="{{ route('categories.destroy',$value->id) }}" method="POST">   
                  
                <a class="btn btn-primary" href="{{ route('categories.edit',$value->id) }}">Edit</a>   
                @csrf
                @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table> 
    