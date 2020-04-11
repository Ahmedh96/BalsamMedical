<?php

namespace App\Http\Controllers\BackEnd;

use App\Contact;
use App\DataTables\ContactDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\BackEnd\Contacts\Store;
use App\Http\Requests\BackEnd\Contacts\Update;
use Alert;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ContactDatatable $contact)
    {
        return $contact->render('BackEnd.contacts.index' , ['title' => trans('lang.Contact Management')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("BackEnd.contacts.create" , ['title' => trans('lang.Create Contact')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $data = $request->all();
        $contact = Contact::create($data);
        Alert::success(trans('lang.record_update'));
        return redirect()->route('contacts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::findOrfail($id);
        return view('BackEnd.contacts.edit' , compact('contact'))->with('title' , trans('lang.Edit Contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, $id)
    {
        $data = $request->all();
        $contact = Contact::findOrfail($id)->update($data);
        Alert::success(trans('lang.record_update'));
        return redirect()->route('contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::findOrfail($id);
        $contact->delete();
        return redirect()->route('contacts.index');
    }
}
