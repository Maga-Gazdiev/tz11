<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeadRequest;
use App\Models\Lead;
use App\Models\Status;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function showLeads()
    {
        $leads = Lead::with('status')->get();
        $statuses = Status::all();
        $leadsCount = $leads->count();
        $statusCounts = [
            'new' => $leads->where('status_id', 1)->count(),
            'in_progress' => $leads->where('status_id', 2)->count(),
            'completed' => $leads->where('status_id', 3)->count(),
        ];

        return view('leads.index', compact('leads', 'statuses', 'leadsCount', 'statusCounts'));
    }

    public function store(StoreLeadRequest $request)
    {
        Lead::create([
            'status_id' => 1,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->message
        ]);

        return redirect()->route('home')->with('success', 'Заявка отправлена');
    }

    public function edit(Lead $lead)
    {
        $statuses = Status::all();
        return view('leads.edit', compact('lead', 'statuses'));
    }

    public function update(Request $request, Lead $lead)
    {
        $lead->update($request->all());
        return redirect()->route('leads.index')->with('success', 'Данные лида обновлены');
    }

    public function destroy(Lead $lead)
    {
        $lead->delete();
        return redirect()->route('leads.index')->with('success', 'Лид удален');
    }
}
