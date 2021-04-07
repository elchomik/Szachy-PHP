<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\User;
use App\Http\Controllers;
class FormsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms=Form::orderBy('elo','desc')
                ->orderBY('ranking','desc')
                ->orderBy('kategoria','desc')
                ->orderBy('nazwisko','asc')
                ->paginate(5);
        return view('forms',['forms'=>$forms]);
    }
    
   
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form=new Form();
        return view('createForm',['form'=>$form]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'imie'=>'required',
            'nazwisko'=>'required',
            'klub'=>'required',
            'kategoria'=>'required',
            'ranking'=>'required|numeric|min:0|max:3000',
            'elo'=>'nullable|numeric|min:0|max:3200',
            'turniej'=>'required'
        ]);
        
        if(\Auth::user()==null){
            return view('home');
        }
        $form=new Form();
        $form->form_id=\Auth::user()->id;
        $form->imie=$request->imie;
        $form->nazwisko=$request->nazwisko;
        $form->klub=$request->klub;
        $form->kategoria=$request->kategoria;
        $form->ranking=$request->ranking;
        $form->elo=$request->elo;
        $form->turniej=$request->turniej;
        
        if($form->save()){
            return redirect('forms');
        }
        return view('forms');
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
        $form=Form::find($id);
        if(\Auth::user()->id!=$form->form_id){
            return back();
        }
        return view('formsEditForm',['form'=>$form]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $form=Form::find($id);
        
        if(\Auth::user()->id!=$form->form_id){
            return back();
        }
        $form->klub=$request->klub;
        $form->kategoria=$request->kategoria;
        $form->ranking=$request->ranking;
        $form->elo=$request->elo;
        
        if($form->save()){
            return redirect()->route('formularz');
        }
        
        return "Wystąpił błąd";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $form=Form::find($id);
     if(\Auth::user()->id!=$form->form_id){
          return back();
      }
      if($form->delete()){
          return redirect()->route('formularz');
      }
     else return back();
    }
}
