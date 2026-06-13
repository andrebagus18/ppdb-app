<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        $registrations = Registration::with([
            'student',
            'jalur',
            'documents'
        ])->get();
        return view('public.panitia', compact('registrations'));
    }
    public function show(Registration $registration)
    {
        $registration->load([
            'student',
            'documents',
            'jalur'
        ]);
        return view('public.panitia', [
            'registrations' => Registration::with(['student', 'documents'])->get(),
            'selected' => $registration
        ]);
    }
}
