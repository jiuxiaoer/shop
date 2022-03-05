<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PjaxUtf8
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        #PJAX返回script中文转码BUG解决
        $content = $response->getContent();
        $content = preg_replace_callback("/(&#[0-9]+;)/", function($m) {
            return mb_convert_encoding($m[1], "UTF-8", "HTML-ENTITIES");
        }, $content);
        $response->setContent($content);
        #PJAX返回script中文转码BUG解决

        return $response;
    }
}
