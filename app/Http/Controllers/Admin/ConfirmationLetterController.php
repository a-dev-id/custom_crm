<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ConfirmationLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationLetterMail;
use App\Models\Guest;
use App\Models\Villa;

class ConfirmationLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin/confirmation-letter/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/confirmation-letter/create');
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
        ]);

        return redirect()->route('confirmation-letter.show', $request->confirmation_number)->with('message', $request->title . ' created Successfully');
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

        return view('admin/confirmation-letter/show')->with(compact('data', 'villa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
