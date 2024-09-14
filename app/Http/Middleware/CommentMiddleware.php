<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class CommentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $comment = Comment::find($request->comment_id);
        if ($user === NULL) {
            return redirect('/users/signin');
        }
        if($user->id !== $comment->user_id) {
            return redirect('/posts/'.$request->id);
        }
        return $next($request);
    }
}
