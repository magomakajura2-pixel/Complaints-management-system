<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function index()
    {
        $states = State::all();

        return view('admin.state.index', compact('states'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'stateName' => 'required|string|max:255',
            'stateDescription' => 'nullable|string',
        ]);

        State::create($request->only('stateName', 'stateDescription'));

        return back()->with('success', 'State created successfully.');
    }

    public function edit($id)
    {
        $state = State::findOrFail($id);

        return view('admin.state.edit', compact('state'));
    }

    public function update(Request $request, $id)
    {
        $state = State::findOrFail($id);

        $request->validate([
            'stateName' => 'required|string|max:255',
            'stateDescription' => 'nullable|string',
        ]);

        $state->update($request->only('stateName', 'stateDescription'));

        return back()->with('success', 'State updated successfully.');
    }

    public function destroy($id)
    {
        $state = State::findOrFail($id);
        $state->delete();

        return back()->with('success', 'State deleted successfully.');
    }
}
