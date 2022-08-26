<link rel="stylesheet" href="{{asset('css/style.css')}}">
<script src="https://kit.fontawesome.com/27a1814684.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
{{-- <script src="js/app/js"></script> --}}
<script>
    $(document).ready(function(){
        $('#icon').click(function(){
            $('ul').toggleClass('show');
        })
    })
</script>
<nav>
    <label class="logo">StoryTime</label>
    <ul>
        <li><a class="active" href="{{route('user_home')}}">Home</a></li>
         
        {{-- <li><a href="{{route('categories.comments')}}">Comments</a></li> --}}
    </ul>
    <label id="icon">
        <i class="fa-solid fa-bars"></i>
    </label>
</nav>


