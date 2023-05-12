<?php

if(!function_exists('image_path')) {
    /**
     * Return image path
     *
     * @param string $imagePath
     * @return string
     */
    function image_path(string $imagePath ): string
    {
        return config('app.url').'/'. $imagePath;
    }
}
