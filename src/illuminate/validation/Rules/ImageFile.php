<?php

namespace Fy97Validation\Illuminate\Validation\Rules;

class ImageFile extends File
{
    /**
     * Create a new image file rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->rules('image');
    }

    /**
     * The dimension constraints for the uploaded file.
     *
     * @param  \Fy97Validation\Illuminate\Validation\Rules\Dimensions  $dimensions
     */
    public function dimensions($dimensions)
    {
        $this->rules($dimensions);

        return $this;
    }
}