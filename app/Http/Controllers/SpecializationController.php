<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialization;

use App\Repositories\SpecializationRepository;

class SpecializationController extends Controller
{
    public function index(SpecializationRepository $specializationRepo){
                
        $specializations = $specializationRepo->getAll();
        
        $data['specializations'] = $specializations;
        $data['footerYear'] = date("Y");
        $data['title'] = 'specjalizacje';

        return view('specializations.list', $data);
    }

    public function create() {
        $data['footerYear'] = date("Y");
        $data['title'] = 'specjalizacje';

        return view('specializations.create', $data);
    }

    public function store(Request $request) {
        $specialization = new Specialization;
        $specialization->name = $request->input('name');
        $specialization->save();
        
        return redirect()->action('SpecializationController@index');
    }
}
