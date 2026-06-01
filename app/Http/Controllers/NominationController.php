<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nomination;


class NominationController extends Controller
{
    public function create()
    {
        return view('nomination.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_name'        => 'required|string|max:255',
            'contact_person'      => 'required|string|max:255',
            'designation'         => 'nullable|string|max:255',
            'email'               => 'required|email',
            'phone'               => 'nullable|string|max:30',
            'country'             => 'required|string|max:100',
            'industry_sector'     => 'nullable|string|max:255',
            'company_description' => 'nullable|string',
            'website'             => 'nullable|url',
        ]);

        Nomination::create($validated);

        return redirect('/nominate')->with('success', 'Your nomination has been submitted successfully. We will contact you shortly.');

        
    }

    public function index()
    {
    $nominations = Nomination::latest()->get();
    return view('nomination.admin', compact('nominations'));
     }

    public function destroy($id)
    {
    Nomination::findOrFail($id)->delete();
    return redirect('/admin/nominations')->with('success', 'Record deleted successfully.');
    }

    public function export()
   {
    $nominations = Nomination::latest()->get();

    $headers = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="nominations.csv"',
    ];

    $callback = function() use ($nominations) {
        $file = fopen('php://output', 'w');
        fputcsv($file, ['#', 'Company', 'Contact Person', 'Designation', 'Email', 'Phone', 'Country', 'Sector', 'Website', 'Submitted']);
        foreach ($nominations as $i => $n) {
            fputcsv($file, [
                $i + 1,
                $n->company_name,
                $n->contact_person,
                $n->designation,
                $n->email,
                $n->phone,
                $n->country,
                $n->industry_sector,
                $n->website,
                $n->created_at->format('d M Y'),
            ]);
        }
        fclose($file);
    };

    return response()->stream($callback, 200, $headers);
}
}
