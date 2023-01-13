<?php

namespace App\Http\Controllers\HandleCache;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class CacheController extends Controller
{
    /**
     * Clear all type of caches
     *
     * @return \Illuminate\Http\Response
     */
    public function clearCache($command)
    {
        if ($command === 'clear-all') {
            // To clear all caches
            Artisan::call('optimize:clear');
            return back()->with('success', 'Cleard all caches!');
        } elseif ($command === 'event-clear') {
            // To clear laravel event cache
            Artisan::call('event:clear');
            return back()->with('success', 'Event cache cleard!');
        } elseif ($command === 'cache-clear') {
            // To clear laravel application cache
            Artisan::call('cache:clear');
            return back()->with('success', 'Application cache cleard!');
        } elseif ($command === 'route-clear') {
            // To clear route cache
            Artisan::call('route:clear');
            return back()->with('success', 'Route cache cleard!');
        } elseif ($command === 'config-clear') {
            // To clear configuration cache
            Artisan::call('config:clear');
            return back()->with('success', 'Config cache cleard!');
        } elseif ($command === 'view-clear') {
            // To clear view cache
            Artisan::call('view:clear');
            return back()->with('success', 'View cache cleard!');
        } elseif ($command === 'clear-compiled') {
            // To clear compiled services and packages files
            Artisan::call('clear-compiled');
            return back()->with('success', 'Compiled cleard!');
        } else {
            return back()->with('error', 'The given command not related to the laravel cache family');
        }
    }
}
