<?php

namespace App\Traits;

use App\Helpers\ToastrHelper;

trait AlertMessages
{
    /**
     * Flash a success message.
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
     * Flash an error message.
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
     * Flash an info message.
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
     * Flash a warning message.
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
