<?php

namespace App\Http\Middleware;

// use \Illuminate\Cache\RateLimiter;

/* ThrottleRequests */
use Closure;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;


class Throttle
{

    public $kepp_term = 0.5; //minite
    public $limit = 30; //minite

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $acc = Cache::get($this->getIpaddress($request));
        // $acc = array(uniqid() => $this->getIpaddress($request));
        if (Cache::has($this->getIpaddress($request))) {
          $acc = array_merge($acc, array(uniqid() => $this->getIpaddress($request)));
        } else {
          $acc = array(uniqid() => $this->getIpaddress($request));
        }

        Cache::store(env("CACHE_DRIVER"))->put($this->getIpaddress($request), $acc, $this->kepp_term);
        if (count($acc) > $this->limit) {
          abort(403);
        }

        return $next($request);
    }

    /**
     * IPアドレスの取得
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function getIpaddress($request)
    {
      return $request->ip();
    }











    /**
     * Determine if the user has too many failed login attempts.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function hasTooManyLoginAttempts(Request $request)
    {
        var_dump('key: '.$this->throttleKey($request));

        /* ロックするまでの回数 */
        var_dump('maxAttempts: '.$this->maxAttempts());
        $re =  $this->limiter()->tooManyAttempts($this->throttleKey($request), $this->maxAttempts());
        var_dump('limiter: '.$re);
        return $re;

        // return $this->limiter()->tooManyAttempts(
        //     $this->throttleKey($request), $this->maxAttempts()
        // );
    }

    /**
     * Increment the login attempts for the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function incrementLoginAttempts(Request $request)
    {
        var_dump($this->decayMinutes());
        $this->limiter()->hit(
            $this->throttleKey($request), $this->decayMinutes()
        );
    }

    /**
     * Redirect the user after determining they are locked out.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendLockoutResponse(Request $request)
    {
        $seconds = $this->limiter()->availableIn(
            $this->throttleKey($request)
        );

        // throw ValidationException::withMessages([
        //     $this->username() => [Lang::get('auth.throttle', ['seconds' => $seconds])],
        // ])->status(429);
    }

    /**
     * Clear the login locks for the given user credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function clearLoginAttempts(Request $request)
    {
        $this->limiter()->clear($this->throttleKey($request));
    }

    /**
     * Fire an event when a lockout occurs.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function fireLockoutEvent(Request $request)
    {
        event(new Lockout($request));
    }

    /**
     * Get the throttle key for the given request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function throttleKey(Request $request)
    {
        $anonymous = "anonymous";
        return $anonymous.'|'.$request->ip();
    }

    /**
     * Get the rate limiter instance.
     *
     * @return \Illuminate\Cache\RateLimiter
     */
    protected function limiter()
    {

        return app(RateLimiter::class);
    }

    /**
     * Get the maximum number of attempts to allow.
     *
     * @return int
     */
    public function maxAttempts()
    {
        return property_exists($this, 'maxAttempts') ? $this->maxAttempts : 5;
    }

    /**
     * Get the number of minutes to throttle for.
     *
     * @return int
     */
    public function decayMinutes()
    {
        return property_exists($this, 'decayMinutes') ? $this->decayMinutes : 1;
    }








}
