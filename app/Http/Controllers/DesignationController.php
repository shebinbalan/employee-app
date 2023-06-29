<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
class DesignationController extends Controller
{
    
    public function index(): View
    {
        $designations = Designation::latest()->paginate(5);
        
        return view('designations.index',compact('designations'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('designations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            
        ]);
        
        Designation::create($request->all());
         
        return redirect()->route('designations.index')
                        ->with('success','designation created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Designation $designation): View
    {
        return view('designations.show',compact('designation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Designation $designation): View
    {
        return view('designations.edit',compact('designation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Designation $designation): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
          
        ]);
        
        $designation->update($request->all());
        
        return redirect()->route('designations.index')
                        ->with('success','designation updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Designation $designation): RedirectResponse
    {
        $designation->delete();
         
        return redirect()->route('designations.index')
                        ->with('success','designation deleted successfully');
    }
}
