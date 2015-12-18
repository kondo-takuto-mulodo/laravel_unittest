<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\TodoServiceInterface;

class TodoController extends Controller
{
    private $todoservice;

    public function __construct(TodoServiceInterface $todoservice)
    {
        $this->todoservice = $todoservice;
    }
    public function getListByStatus()
    {
        $todos = $this->todoservice->getByStatus(Input::get('status'));
        //        return $todos->toJson();
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(TodoServiceInterface $todo)
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}

//use App;

//if (App::environment('test')) {
//    App::bind('TodoServiceInterface', 'TodoServiceMock');
//} else {
//    App::bind('TodoServiceInterface', 'TodoService');
//}
