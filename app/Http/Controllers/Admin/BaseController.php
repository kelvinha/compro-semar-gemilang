<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ToastrHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }
    
    /**
     * Show a success message.
     *
     * @param string $message
     * @param string $title
     * @return void
     */
    protected function success($message, $title = 'Success')
    {
        ToastrHelper::success($message, $title);
    }
    
    /**
     * Show an error message.
     *
     * @param string $message
     * @param string $title
     * @return void
     */
    protected function error($message, $title = 'Error')
    {
        ToastrHelper::error($message, $title);
    }
    
    /**
     * Show an info message.
     *
     * @param string $message
     * @param string $title
     * @return void
     */
    protected function info($message, $title = 'Info')
    {
        ToastrHelper::info($message, $title);
    }
    
    /**
     * Show a warning message.
     *
     * @param string $message
     * @param string $title
     * @return void
     */
    protected function warning($message, $title = 'Warning')
    {
        ToastrHelper::warning($message, $title);
    }
}
