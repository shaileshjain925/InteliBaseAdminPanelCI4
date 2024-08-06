<?php

namespace App\Traits;

use App\Models\FunctionModel;

trait CommonTraits
{
    /**
     * Return Model Instance
     * @return FunctionModel
     */
    public static function get_function_model()
    {
        return new FunctionModel();
    }
}
