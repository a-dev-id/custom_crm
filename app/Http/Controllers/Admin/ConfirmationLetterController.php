<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ConfirmationLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationLetterMail;
use App\Models\Country;
use App\Models\Guest;
use App\Models\Title;
use App\Models\Villa;

class ConfirmationLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $confirmation_letters = ConfirmationLetter::all();
        return view('admin.confirmation-letter.index')->with(compact('confirmation_letters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $villa_list = Villa::all();
        $title_list = Title::all();
        $country_list = Country::all();
        return view('admin.confirmation-letter.create')->with(compact('villa_list', 'title_list', 'country_list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ConfirmationLetter::create([
            'confirmation_number' => $request->confirmation_number,
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'villa_id' => $request->villa_id,
            'adult' => $request->adult,
            'child' => $request->child,
            'total_charge' => $request->total_charge,
            'payment_status' => $request->payment_status,
            'campaign_name' => $request->campaign_name,
            'campaign_benefit' => $request->campaign_benefit,
            'remarks' => $request->remarks,
            'title' => $request->title,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'check_in_out' => $request->check_in_out,
            'terms_conditions' => $request->terms_conditions,
            'status' => $request->status,
        ]);

        Guest::create([
            'title' => $request->title,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'birth_date' => $request->birth_date,
            'reservation_date' => $request->check_in_date,
            'confirmation_number' => $request->confirmation_number,
        ]);

        return redirect()->route('confirmation-letter.show', $request->confirmation_number);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = ConfirmationLetter::where('confirmation_number', $id)->first();
        $villa = Villa::where('id', $data->villa_id)->first();

        // $mailData = [
        //     'title' => 'Mail from ItSolutionStuff.com',
        //     'body' => 'This is for testing email using smtp.'
        // ];

        // Mail::to($data->email)
        //     ->cc('reservation@nandinibali.com')
        //     ->cc('info@nandinibali.com')
        //     ->send(new ConfirmationLetterMail($mailData));

        return view('admin.confirmation-letter.show')->with(compact('data', 'villa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = ConfirmationLetter::find($id);
        $villa_list = Villa::all();
        $title_list = Title::all();
        $country_list = Country::all();
        $guest = Guest::where('confirmation_number', '=', $data->confirmation_number)->first();
        return view('admin.confirmation-letter.edit')->with(compact('data', 'villa_list', 'title_list', 'country_list', 'guest'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $confirmation_letter = ConfirmationLetter::find($id);
        $confirmation_letter->confirmation_number = $request->confirmation_number;
        $confirmation_letter->check_in_date = $request->check_in_date;
        $confirmation_letter->check_out_date = $request->check_out_date;
        $confirmation_letter->villa_id = $request->villa_id;
        $confirmation_letter->adult = $request->adult;
        $confirmation_letter->child = $request->child;
        $confirmation_letter->total_charge = $request->total_charge;
        $confirmation_letter->payment_status = $request->payment_status;
        $confirmation_letter->campaign_name = $request->campaign_name;
        $confirmation_letter->campaign_benefit = $request->campaign_benefit;
        $confirmation_letter->remarks = $request->remarks;
        $confirmation_letter->title = $request->title;
        $confirmation_letter->full_name = $request->full_name;
        $confirmation_letter->email = $request->email;
        $confirmation_letter->phone = $request->phone;
        $confirmation_letter->check_in_out = $request->check_in_out;
        $confirmation_letter->terms_conditions = $request->terms_conditions;
        $confirmation_letter->status = $request->status;
        $confirmation_letter->save();

        $guest = Guest::where('confirmation_number', '=', $request->confirmation_number)->first();
        $guest->title = $request->title;
        $guest->full_name = $request->full_name;
        $guest->email = $request->email;
        $guest->phone = $request->phone;
        $guest->country = $request->country;
        $guest->birth_date = $request->birth_date;
        $guest->reservation_date = $request->check_in_date;
        $guest->save();

        return redirect()->route('confirmation-letter.show', $request->confirmation_number);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
