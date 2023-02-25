<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Levels;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Application::class, 'application');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        Paginator::useBootstrap();
        $applications = Application::paginate(10);
        return view('application.index', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('application.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'message' => 'required|string|max:255',
        ]);
        $applciation = new Application();
        $applciation->message = $request->message;
        $applciation->user_id = \auth()->user()->id;
        $applciation->save();
        $manager = User::where('level_id', Levels::MANAGER)->pluck('id')->first();
        (new ActionController())->new_notification($applciation->user_id, 'Application sent successfully', 'application/' . $applciation->id);
        (new ActionController())->new_notification($manager, 'New Application', 'application/' . $applciation->id);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application $application
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        return view('application.show', compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application $application
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        return view('application.edit', compact('application'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application $application
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Application $application)
    {
       Application::where('id', $application->id)->update([
           'status' => 1]);
        (new ActionController())->new_notification($application->user_id, 'Application accepted', 'application/' . $application->id);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application $application
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Application $application)
    {
        $application->delete();
        return redirect()->back();
    }
}
