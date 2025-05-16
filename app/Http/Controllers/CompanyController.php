<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    // Display a listing of companies
  public function index(Request $request)
{
    // Get the number of records per page, default to 10
    $perPage = $request->get('perPage', 10);

    // Get sorting column and direction, default to 'id' and 'asc'
    $sortBy = $request->get('sortBy', 'id');
    $sortDirection = $request->get('sortDirection', 'asc');

    // Fetch companies with sorting and pagination
    $companies = Company::orderBy($sortBy, $sortDirection)->paginate($perPage);

    // Pass data to the view
    return view('companies.index', compact('companies', 'perPage', 'sortBy', 'sortDirection'));
}

    // Show the form for creating a new company
    public function create()
    {
        return view('companies.create');
    }

    // Store a newly created company
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'website' => 'required|url',
            'address' => 'required',
        ]);

        Company::create($request->all());
        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }

    // Display the specified company
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    // Show the form for editing the specified company
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    // Update the specified company
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'website' => 'required|url',
            'address' => 'required',
        ]);

        $company->update($request->all());
        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    // Remove the specified company
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}