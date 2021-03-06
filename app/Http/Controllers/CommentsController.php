<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use App\Http\Controllers;
class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments=Comment::orderBy('created_at','desc')
                ->paginate(5);

        return view('comments',['comments'=>$comments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comment=new Comment();
        return view('commentsForm',['comment'=>$comment]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //walidacja formularza z wysłyanie komentarzy do bazy danych
       $this->validate($request,['message'=>'required|min:10|max:255',]);
    
       //Zapis komentarzy do bazy danych i wyświetlanie z bazy danych
       //jeśli użytkownik nie jest zalogowany nie dajemy mu możliwości
       //skomentowania posta
       if(\Auth::user()==null){
           return view('home');
       }
       $comment=new Comment();
       $comment->user_id=\Auth::user()->id; //id aktualnie zalogowanego usera
       $comment->message=$request->message; //nazwa pola z validatora
      if($comment->save()){
          return redirect('comments');
      }
      return view('comments');
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
        $comment=Comment::find($id);
        if(\Auth::user()->id!=$comment->user_id){
            return back()->with(['success'=>false,
                    'message_type'=>'danger',
                    'message'=>'Nie posiadasz uprawnień']);
        }
        return view('commentsEditForm',['comment'=>$comment]);
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
        $comment=Comment::find($id);
        if(\Auth::user()->id!=$comment->user_id){
            return back()->with(['succes'=>false,
                'message_type'=>'danger',
                'message'=>'Nie posiadasz uprawnień']);
        }
        $comment->message=$request->message;
        if($comment->save()){
            return redirect()->route('comments');
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
     $comment=Comment::find($id);
     
     if(\Auth::user()->id!=$comment->user_id){
         return back();
     }
     if($comment->delete()){
         return redirect()->route('comments');
     }
     else return back();
    }
}
