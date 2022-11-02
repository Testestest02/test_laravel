<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Logger
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
        logger()->info('スタート！');
        $this->output($request);
        $request =$next($request);
        logger()->info('エンドってね！');
        return $request;
    }


    /**
     * リクエストパロメータ出力
     * @param Request $request
     */
    public function output(Request $request)
    {
        $requestMethod = $request->method();
        $requestParam = json_encode($request->all());
        logger()->info("{$requestMethod} : {$requestParam}");
    }
}
