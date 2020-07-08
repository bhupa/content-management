<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\ApplicationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplicationController extends Controller
{
    protected $application;
    
    public function __construct(ApplicationRepository $application)
    {
        $this->application=$application;
    }
    public function index(){
        $perpage ='100';
        $applications = $this->application->paginate($perpage);
        return view('admin.application.index')->withApplications($applications);
    }
    
    public function show($id){
        $application= $this->application->find($id);
        return view('admin.application.show')->withApplication($application);
    }
}
