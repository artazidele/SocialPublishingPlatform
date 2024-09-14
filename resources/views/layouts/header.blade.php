<div id="menuDiv" class="">
    <div class="">
        <h3 class="p-4">Social Publishing Platform</h3>
    </div>
    <div class="d-none d-md-block border-bottom border-dark ">
        @if(auth()->check())
        <div class="">
            <ul class="d-flex flex-row">
                <li class="p-2 m-2 list-group-item">
                    <a class="text-decoration-none text-dark" href="/posts/clear">All Posts</a>
                </li>
                <li class="p-2 m-2 list-group-item">
                    <a class="text-decoration-none text-dark" href="/posts/user/{{ Auth::user()->username }}">My Posts</a>
                </li>
                <li class="p-2 m-2 list-group-item">
                    <a class="text-decoration-none text-dark" href="/posts/create">New Post</a>
                </li>
                <li class="p-2 m-2 list-group-item position-absolute end-0">
                    <a class="text-decoration-none text-dark" href="/users/logout">Sign Out</a>
                </li>
            </ul>
        </div>
        @else
        <div class="mx-4">
            <ul class="d-flex flex-row justify-content-end">
                <li class="p-2 m-2 list-group-item">
                    <a class="text-decoration-none text-dark" href="/users/signup">Register</a>
                </li>
                <li class="p-2 m-2 list-group-item">
                    <a class="text-decoration-none text-dark" href="/users/signin">Sign In</a>
                </li>
            </ul>
        </div>
        @endif
    </div>
    <div class="d-md-none border-bottom border-dark">
        <div class="text-end m-4">
            <a onclick="openMenu()"><i class="fa fa-bars" style="font-size:32px"></i></a>
        </div>
        <div id="menu" class="d-none">
            @if(auth()->check())
            <div class="">
                <ul class="">
                    <li class="p-2 m-2 list-group-item">
                        <a class="text-decoration-none text-dark" href="/posts/clear">All Posts</a>
                    </li>
                    <li class="p-2 m-2 list-group-item">
                        <a class="text-decoration-none text-dark" href="/posts/user/{{ Auth::user()->username }}">My Posts</a>
                    </li>
                    <li class="p-2 m-2 list-group-item">
                        <a class="text-decoration-none text-dark" href="/posts/create">New Post</a>
                    </li>
                    <li class="p-2 m-2 list-group-item">
                        <a class="text-decoration-none text-dark" href="/users/logout">Sign Out</a>
                    </li>
                </ul>
            </div>
            @else
            <div class="">
                <ul class="">
                    <li class="p-2 m-2 list-group-item">
                        <a class="text-decoration-none text-dark" href="/users/signup">Register</a>
                    </li>
                    <li class="p-2 m-2 list-group-item">
                        <a class="text-decoration-none text-dark" href="/users/signin">Sign In</a>
                    </li>
                </ul>
            </div>
            @endif
        </div>
    </div>
    <script src="{{ URL::asset('js/header.js') }}"></script>
</div>


