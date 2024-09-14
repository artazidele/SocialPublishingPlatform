<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $post = Post::find($request->id);
        if ($user === NULL) {
            return redirect('/users/signin');
        }
        if($user->username !== $post->username) {
            return redirect('/posts/'.$request->id);
        }
        return $next($request);
    }
}
