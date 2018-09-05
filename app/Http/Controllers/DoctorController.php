<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Specialization;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{

    public function __construct() {

        $this->middleware('auth');

    }

    public function index(UserRepository $userRepo){
                
        //$users = User::all();
        //$users = $userRepo->getAll();
        //$users = User::where('type','doctor')->orderBy('id','desc')->get();
        $data['doctors'] = $userRepo->getAllDoctors();
        $data['stats'] = $userRepo->getDoctorsStats();
        
        $data['footerYear'] = date("Y");
        $data['title'] = 'doktorzy';

        return view('doctors.list', $data);
    }

    public function listBySpecialization(UserRepository $userRepo, $id){
                
        $data['doctors'] = $userRepo->getDoctorsBySpecialization($id);
        $data['stats'] = $userRepo->getDoctorsStats();
        
        $data['footerYear'] = date("Y");
        $data['title'] = 'doktorzy';

        return view('doctors.list', $data);
    }

    public function show(UserRepository $userRepo, $id){
        //$doctor = User::find($id);

        if(Auth::user()->type != 'doctor' && Auth::user()->type != 'admin') {
            return redirect()->route('login');
        }

        $data['doctor'] = $userRepo->find($id);

        $data['footerYear'] = date("Y");
        $data['title'] = 'doktor';

        return view('doctors.show', $data);
    }

    public function create(){

        $data['specializations'] = Specialization::all();

        $data['footerYear'] = date("Y");
        $data['title'] = 'doctor';

        return view('doctors.create', $data);
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'phone' => 'required'
        ]);

        $doctor = new User;
        $doctor->name = $request->input('name');
        $doctor->email = $request->input('email');
        $doctor->password = bcrypt($request->input('password'));
        $doctor->phone = $request->input('phone');
        $doctor->address = $request->input('address');
        $doctor->status = 'Active';
        $doctor->pesel = $request->input('pesel');
        $doctor->type = 'doctor';
        $doctor->save();

        $doctor->specializations()->sync($request->input('specializations'));
        
        return redirect()->action('DoctorController@index');
    }

    public function edit(UserRepository $userRepo, $id){

        $data['doctor'] = $userRepo->find($id);
        $data['specializations'] = Specialization::all();
        $data['footerYear'] = date("Y");
        $data['title'] = 'doctor';

        return view('doctors.edit', $data);
    }

    public function editStore(Request $request) {

        $request->validate([
            'name' => 'required|alpha|max:255',
            'phone' => 'required'
        ]);

        $doctor = User::find($request->input('id'));
        $doctor->name = $request->input('name');
        $doctor->email = $request->input('email');
        $doctor->phone = $request->input('phone');
        $doctor->address = $request->input('address');
        $doctor->pesel = $request->input('pesel');
        $doctor->save();

        $doctor->specializations()->sync($request->input('specializations'));
        
        return redirect()->action('DoctorController@index');
    }

    public function delete(UserRepository $userRepo, $id){
        $doctor = $userRepo->delete($id);
        return redirect('doktorzy');
    }
}
