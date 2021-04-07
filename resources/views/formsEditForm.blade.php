<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Szachy|Zgłoszenie na Turniej</title>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
         <link rel="text/css" href="{{asset('css/forms.css')}}">
         <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
         <style>
             .title{
                  text-align: center;
                background-color: transparent
             }
             </style>
    </head>
     @include('layouts.navbar')
    <body>
        <div class="container mt-5">
            <div class="title"><h1>Zgłoszenie na Turniej</h1></div>
            <form role="form" method="post" action="{{route('updateForm',$form)}}">
                  {{ csrf_field() }}
                  <input name="_method" type="hidden" value="PUT">
        
                  <div class="form-group">
                      <label>Klub</label>
                      <input type="text" class="form-control" name="klub" id="klub">
                      {{$form->klub}}
                  </div>
                   <div class="form-group">
                      <label>Kategoria<select name="kategoria">
                      <option>Brak</option>
                      <option>V</option>
                      <option>IV</option>
                      <option>III</option>
                      <option>II</option>
                      <option>II+</option>
                      <option>II++</option>
                      <option>I</option>
                      <option>I+</option>
                      <option>I++</option>
                      <option>k</option>
                      <option>k+</option>
                      <option>k++</option>
                      <option>m</option>
                      <option>FM</option>
                      <option>WFM</option>
                      <option>IM</option>
                      <option>WIM</option>
                      <option>GM</option>
                      <option>WGM</option>
                          </select></label>
                              {{$form->kategoria}}
         
                  </div>
                  <div class="form-group">
                      <label>Ranking</label>
                      <input type="text" class="form-control" name="ranking" id="ranking">
                      {{$form->ranking}}
                  </div>
                  <div class="form-group">
                      <label>FIDE ELO</label>
                      <input type="text" class="form-control" name="elo" id="elo">
                      {{$form->elo}}
                  </div>
      
                  <div class="box-footer"><button type="submit" class="btn btn-success">Utwórz</button>
                  </div>
            </form>
        </div>
    </body>
    
</html>
