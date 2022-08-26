<link rel="stylesheet" href="{{asset('css/style.css')}}">

<div class="container">
    <header class="heading">
        <h1>Login</h1>
    </header>
    <div class="contain">
        <form action="{{ route('home.index') }}" method="POST" id="login_form">
            @csrf
            <label>Username:</label>
            <input type="text" placeholder="username"><br/>
            <label>Password:</label>
            <input type="text" placeholder="password"><br/>
            <button>Login</button>
        </form>
    </div>
</div>
