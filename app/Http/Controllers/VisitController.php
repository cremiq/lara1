<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\VisitRepository;
use App\Repositories\UserRepository;
use App\Models\Visit;
use App\Models\User;
use Mail;

class VisitController extends Controller
{
    public function index(VisitRepository $visitRepo){
       
        $data['visits'] = $visitRepo->getAll();
        $data['footerYear'] = date("Y");
        $data['title'] = 'wizyty';

        return view('visits.list', $data);
    }

    public function create(UserRepository $userRepo) {

        $data['doctors'] = $userRepo->getAllDoctors();
        $data['patients'] = $userRepo->getAllPatients();
        $data['footerYear'] = date("Y");
        $data['title'] = 'wizyty';

        return view('visits.create', $data);
    }

    public function store(Request $request) {

        $visit = new Visit;
        $visit->doctor_id = $request->input('doctor');
        $visit->patient_id = $request->input('patient');
        $visit->date = $request->input('date');
        $visit->save();
        $data['visit'] = $visit;

        $patient = User::find($visit->patient_id);

        Mail::send('emails.visit', $data, function ($message) use ($visit, $patient) {
            //$message->to($patient->mail, $patient->name);
            //$message->subject('Nowa wizyta');

            $message->to($patient->email, $patient->name)->subject('Nowa wizyta');

        });

        return redirect()->action('VisitController@index');
    }
}
