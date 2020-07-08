<?php

namespace App\Http\Controllers;

use App\Repositories\FaqRepository;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    protected $faq;
    
    public function __construct(FaqRepository $faq)
    {
        $this->faq = $faq;
    }
    
    public function index(){
        $faqs = $this->faq->orderBy('display_order','asc')->where('is_active','1')->get();
        
        return view('faq.index')->withFaqs($faqs);
    }
}
