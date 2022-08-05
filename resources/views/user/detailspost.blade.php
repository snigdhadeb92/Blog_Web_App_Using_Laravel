<h1>Post is details</h1>
<table class="table table-bordered">
    <tr>
        {{-- <th>No</th> --}}
        <th>Title</th>
        <th>Category Name</th>
        <th>Description</th>
        <th>Image</th>
    </tr>
    
    @foreach ($data as $key => $value)
        {{-- @dd($value->categoryDetails->name) --}}
        <tr>
            {{-- <td>{{ $value->id }}</td> --}}
            <td>{{ $value->title }}</td>
            <td>{{ $value->categoryDetails->name }}</td> 
            <td>{{ $value->desc }} </td>
            {{-- <td>{{ substr($value->desc,0,150) }}...<a href="{{route('details.show',$value->id)}}">Read more</a></td> --}}
            <td><img src="{{ url('images/'.$value->image) }}" style="height: 100px; width: 150px;"></td>
        </tr>
   @endforeach
    </table> 