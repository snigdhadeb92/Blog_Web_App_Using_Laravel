@include('category.nav')
{{-- <link rel="stylesheet" href="css/post.css"> --}}
@if(isset($data))
<h2>Edit Post</h2>

<form action="{{ route('addposts.update',$data->id) }}" method="POST" id="post_form1" enctype="multipart/form-data">
    @csrf
    @method('PUT') 
  
    <div class="row">
       <div class="col-xs-12 col-sm-12 col-md-12">
           <div class="form-group"> 
            <strong>Add Post:</strong>
            <input type="text" name="title" class="form-control" value="{{ $data->name}}" placeholder="Enter category">
            {{-- <input type="hidden" name="id" value="{{isset($data) ? $data->id : ''}}"> --}}
            @if ($errors->has('name'))
                <span class="help-block" style="color:red;">*Please provide category</span>
            @endif
           </div>
           <div class="form-group"> 
            <label for="cars">Choose Category:</label>
<select name="cars" id="cars">
  <option value="volvo">Volvo</option>
</select>
           </div>

       </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@else
<h2>Add Post</h2>

<form action="{{ route('addposts.store') }}" method="POST" id="post_form2" enctype="multipart/form-data">
    @csrf

  
    <div class="row">
       <div class="col-xs-12 col-sm-12 col-md-12">
           <div class="form-group"> 
            <strong>Title:</strong>
            <input type="text" name="title" class="form-control"  placeholder="Enter title">
            @if ($errors->has('title'))
                <span class="help-block" style="color:red;">*Please provide title</span>
            @endif
           </div>
           <div class="form-group"> 
            <label>Choose Category:</label>
                <select name="cat_id" id="cat">
                    @if($categories)
                        @foreach($categories as $tkey=>$tval)
                          <option value="{{$tval->id}}">{{$tval->name}}</option>
                        @endforeach
                    @endif
                </select>
           </div>
           <div class="form-group"> 
            <strong>Image:</strong>
            <input type="file" name="image" class="form-control"  placeholder="Enter image">
            @if ($errors->has('image'))
                <span class="help-block" style="color:red;">*Please provide image</span>
            @endif
           </div>
           <div class="form-group"> 
            <strong>Description:</strong>
            <textarea name="desc" id="" class="form-control" cols="30" rows="10" placeholder="Enter Description"></textarea>
            @if ($errors->has('desc'))
                <span class="help-block" style="color:red;">*Please provide description</span>
            @endif
           </div>
       </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endif