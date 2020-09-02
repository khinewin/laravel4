<ul class="list-group list-group-flush small">
    <li class="list-group-item">
        <a href="{{url('/home')}}"><i class="fas fa-user-circle"></i>  {{Auth::user()->name}}</a>
    </li>
   
    <li class="list-group-item">
        <a href="{{route('categories')}}"><i class="fas fa-clipboard-list"></i> Categories</a>
    </li>
    <li class="list-group-item">
        <a href="{{route('posts')}}"><i class="fab fa-artstation"></i> Posts</a>
    </li>
</ul>