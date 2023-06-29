<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $departments = Department::latest()->paginate(5);
        
        return view('departments.index',compact('departments'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            
        ]);
        
        Department::create($request->all());
         
        return redirect()->route('departments.index')
                        ->with('success','Department created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department): View
    {
        return view('departments.show',compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department): View
    {
        return view('departments.edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
          
        ]);
        
        $department->update($request->all());
        
        return redirect()->route('departments.index')
                        ->with('success','Department updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department): RedirectResponse
    {
        $department->delete();
         
        return redirect()->route('departments.index')
                        ->with('success','Department deleted successfully');
    }
}
