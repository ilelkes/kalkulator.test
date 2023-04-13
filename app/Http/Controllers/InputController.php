<?php

namespace App\Http\Controllers;

use App\Models\Input;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Else_;

class InputController extends Controller
{
    protected function getInputs()
    {
        return [
            '1' => ['id' => 1, 'success' => true, 'title' => 'adat 1', 'description' => 'adat 1 leírás...'],
            '2' => ['id' => 2, 'success' => true, 'title' => 'adat 2', 'description' => 'adat 2 leírás...'],
            '3' => ['id' => 3, 'success' => false, 'title' => 'adat 3', 'description' => 'adat 3 leírás...'],
            '4' => ['id' => 4, 'success' => false, 'title' => 'adat 4', 'description' => 'adat 4 leírás...']
        ];
    }

    public function index()
    {
        $inputs = $this->getInputs();
        return view('inputs.index', compact('inputs'));
    }

    public function nodata()
    {
        $inputs = [];
        return view('inputs.index', compact('inputs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        $inputs = $this->getInputs();
        if (!isset($inputs[$id]) || count($inputs[$id]) == 0) {
            $inputs[$id] = null;
        }
        return view('inputs.show', ['input' => $inputs[$id]]);
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
