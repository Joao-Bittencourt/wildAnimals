<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class CustomValidationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Validator::extend('rangeAnimalsStats', function ($attribute, $value, $parameters, $validator) {
            return $this->validateRangeAnimalsStats($attribute, $value, $parameters, $validator);
        });
    }

    // @ToDo: refatorar
    private function validateRangeAnimalsStats($attribute, $value, $parameters, $validator)
    {

        $operador = $parameters[0];
        $valorReferencia = $parameters[1];

        switch ($operador) {
            case '>':
                return $value > $validator->getData()[$valorReferencia];
            case '<':
                return $value < $validator->getData()[$valorReferencia];
        }

        return false;
    }
}
