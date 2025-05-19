<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Session;

class ToastrHelper
{
    /**
     * Flash a success message.
     *
     * @param string $message
     * @param string $title
     * @return void
     */
    public static function success($message, $title = 'Success')
    {
        self::flash('success', $message, $title);
    }
    
    /**
     * Flash an error message.
     *
     * @param string $message
     * @param string $title
     * @return void
     */
    public static function error($message, $title = 'Error')
    {
        self::flash('error', $message, $title);
    }
    
    /**
     * Flash an info message.
     *
     * @param string $message
     * @param string $title
     * @return void
     */
    public static function info($message, $title = 'Info')
    {
        self::flash('info', $message, $title);
    }
    
    /**
     * Flash a warning message.
     *
     * @param string $message
     * @param string $title
     * @return void
     */
    public static function warning($message, $title = 'Warning')
    {
        self::flash('warning', $message, $title);
    }
    
    /**
     * Flash a message.
     *
     * @param string $type
     * @param string $message
     * @param string $title
     * @return void
     */
    protected static function flash($type, $message, $title)
    {
        Session::flash('toastr', true);
        Session::flash("toastr.$type", true);
        Session::flash('toastr.message', $message);
        Session::flash('toastr.title', $title);
    }
}
