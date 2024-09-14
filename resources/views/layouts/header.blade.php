<div class="">
    <div class="">
        <h3>Social Publishing Platform</h3>
    </div>
    @if(auth()->check())
    <div class="">
        <ul class="">
            <li><a href="/posts/clear">All Posts</a></li>
            <li><a href="/posts/user/{{ Auth::user()->username }}">My Posts</a></li>
            <li><a href="/posts/create">New Post</a></li>
            <li><a href="/users/logout">Sign Out</a></li>
        </ul>
    </div>
    @else
    <div class="">
        <ul class="">
            <li><a href="/users/signup">Register</a></li>
            <li><a href="/users/signin">Sign In</a></li>
        </ul>
    </div>
    @endif
</div>


