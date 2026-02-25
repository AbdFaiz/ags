<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Jangan catat kalau ini request ke admin dashboard atau file aset
        if (!$request->is('admin*') && !$request->is('api*')) {
            
            $ip = $request->ip();
            $today = now()->format('Y-m-d');

            // 2. Cek apakah IP ini sudah mampir hari ini?
            $alreadyVisited = Visitor::where('ip_address', $ip)
                                    ->whereDate('created_at', $today)
                                    ->exists();

            if (!$alreadyVisited) {
                Visitor::create([
                    'ip_address' => $ip,
                    'user_agent' => substr($request->userAgent(), 0, 255),
                ]);
            }
        }

        return $next($request);
    }
}
