@include('user.nav')
<link rel="stylesheet" href="{{asset('css/detailsblog.css')}}">

<div class="containe">
    @foreach ($data as $key => $value)
        <header>
            <h1>{{ $value->title }}</h1>
        </header>
        <div>
            <span>
                <img src="{{ url('images/'.$value->image) }}">
            </span>
            <p>
                {{ $value->desc }}
            </p>
        </div>
        
   @endforeach
    
</div>
    