<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Models\Users\Faq;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    public function Faqs(){
        return Faq::getAllFaqs();
    }
}
