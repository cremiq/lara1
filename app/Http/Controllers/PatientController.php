<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Models\User;

class PatientController extends Controller
{

    public function index(UserRepository $userRepo){
                
        $patients = $userRepo->getAllPatients();
        
        $data['patients'] = $patients;
        $data['footerYear'] = date("Y");
        $data['title'] = 'pacjenci';

        return view('patients.list', $data);
    }

    public function show(UserRepository $userRepo, $id){

        $patient = $userRepo->find($id);

        $data['patient'] = $patient;
        $data['footerYear'] = date("Y");
        $data['title'] = 'pacjenci';

        return view('patients.show', $data);
    }

    public function create(){

        $data['footerYear'] = date("Y");
        $data['title'] = 'pacjenci';

        return view('patients.create', $data);
    }

    public function store(Request $request) {

        $data['footerYear'] = date("Y");
        $data['title'] = 'pacjenci';

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'phone' => 'required'
        ]);

        $patient = new User;
        $patient->name = $request->input('name');
        $patient->email = $request->input('email');
        $patient->password = bcrypt($request->input('password'));
        $patient->phone = $request->input('phone');
        $patient->address = $request->input('address');
        $patient->status = 'Active';
        $patient->pesel = $request->input('pesel');
        $patient->type = 'patient';
        $patient->save();

        return view('patients.success', $data);
    }

    public function edit(UserRepository $userRepo, $id){

        $data['patient'] = $userRepo->find($id);
        $data['footerYear'] = date("Y");
        $data['title'] = 'pacjenci';

        return view('patients.edit', $data);
    }

    public function editStore(Request $request) {

        $request->validate([
            'name' => 'required|alpha|max:255',
            'phone' => 'required'
        ]);

        $patient = User::find($request->input('id'));
        $patient->name = $request->input('name');
        $patient->email = $request->input('email');
        $patient->phone = $request->input('phone');
        $patient->address = $request->input('address');
        $patient->pesel = $request->input('pesel');
        $patient->save();

        return redirect()->action('PatientController@index');
    }

    public function delete(UserRepository $userRepo, $id){
        $patient = $userRepo->delete($id);
        return redirect('pacjenci');
    }
}
