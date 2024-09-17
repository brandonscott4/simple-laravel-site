<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ApplicationController extends Controller
{
    public function index(){
        $applications = auth()->user()->applications;
        return view('dashboard', ['applications' => $applications]);
    }

    public function create(){
        return view('application.create');
    }

    public function store(Request $request): RedirectResponse{
        $validated = $request->validate([
            'job_title' => ['required', 'string'],
            'company' => ['nullable', 'string'],
            'location' => ['nullable', 'string'],
            'link' => ['required', 'string'],
            'status' => ['required', 'string'],
            'date_applied' => ['required', 'date'],
            'note' => ['nullable', 'string'],
        ]);

        $validated['user_id'] = $request->user()->id;
        Application::create($validated);

        return redirect('/dashboard');
    }

    public function destroy(Application $application){
        $application->delete();

        return redirect('/dashboard');
    }
}
