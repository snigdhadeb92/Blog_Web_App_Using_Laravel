@include('category.nav')

@if(isset($data))
<h2>Edit Categories</h2>

<form action="{{ route('categories.update',$data->id) }}" method="POST" id="cat_form1">
    @csrf
    @method('PUT') 
  
    <div class="row">
       <div class="col-xs-12 col-sm-12 col-md-12">
           <div class="form-group"> 
            <strong>category:</strong>
            <input type="text" name="name" class="form-control" value="{{ $data->name}}" placeholder="Enter category">
            {{-- <input type="hidden" name="id" value="{{isset($data) ? $data->id : ''}}"> --}}
            @if ($errors->has('name'))
                <span class="help-block" style="color:red;">*Please provide category</span>
            @endif
           </div>
       </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@else
<h2>Add Categories</h2>

<form action="{{ route('categories.store') }}" method="POST" id="cat_form2">
    @csrf

  
    <div class="row">
       <div class="col-xs-12 col-sm-12 col-md-12">
           <div class="form-group"> 
            <strong>category:</strong>
            <input type="text" name="name" class="form-control"  placeholder="Enter category">
            @if ($errors->has('name'))
                <span class="help-block" style="color:red;">*Please provide category</span>
            @endif
           </div>
       </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endif