<?php

namespace App\Http\Controllers;

use App\Http\Requests\QueryRequest;
use Illuminate\Http\Request;
use App\Models\Query;
use Illuminate\Contracts\View\View;

class QueryController extends Controller
{

    public function index()
    {
        return view('queries');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('queries');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QueryRequest $request)
    {
        $query = Query::create($request->validated());
        return redirect()->route('query.index')->with('success', 'Query published successfully!');
    }   

    /**
     * Display the specified resource.
     */
    public function show(Query $query)
    {
        return view('query-show', compact('query'));
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
