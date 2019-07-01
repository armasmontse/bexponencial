<?php

namespace App\Http\Helpers\Conekta\Traits;

use Conekta\Conekta;
use App;

trait CltvoConektaSetTrait {

    public static function setConekta()
    {
        Conekta::setApiKey(config("services.conekta.secret"));
        Conekta::setLocale(cltvoCurrentLanguageIso());
    }
}
