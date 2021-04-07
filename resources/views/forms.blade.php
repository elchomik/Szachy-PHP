
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Szachy| Komentarze</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
    <style>
        body{
            background-color: #e8e8e8;
        }
        .title{
            text-align: center;
            background-color: transparent
        }
        .table-center{
            margin: auto;
            width: 50%;
            border: 3px solid green;
            padding: 10px;
        }
        .table-container{
            background-color:white;
            max-width: 1200px;
            margin: 0 auto;
        } 
       
        .footer-button{
            background-color: transparent;
            float: left;
            margin-top: 3%;
        }
        table{
            max-width: 800px;
            margin: 0 auto;
        }
    </style>
</head>
@include('layouts.navbar')
<body>
    <div class="table-container">
        <div class="title">
            <h3>Formularze</h3>
        </div>
        @auth
        <table data-toggle="table">
            <thead>
                <tr>
                    <th>Użytkownik</th>
                    <th>Klub</th>
                    <th>Kategoria</th>
                    <th>Ranking</th>
                    <th>FIDE ELO</th>
                    <th>Data dodania</th>
                    <th>Nazwa Turnieju</th>
                   
                </tr>
            </thead>
            <tbody>
                    @foreach($forms as $form)
                    <tr>
  
                        <td>{{$form->imie}} {{$form->nazwisko}}</td>
                        <td>{{$form->klub}}</td>
                        <td>{{$form->kategoria}}</td>
                        <td>{{$form->ranking}}</td>
                        <td>{{$form->elo}}</td>
                        <td>{{$form->created_at}}</td>
                        <td>{{$form->turniej}}
                        @if($form->form_id==\Auth::user()->id)
                       <a href="{{route('editForm',$form)}}" class=" btn btn-success btn-xs"
                               title="Edytuj">Edytuj</a>
                               
                               <a href="{{route('deleteForm',$form->id)}}"
                            class="btn btn-danger btn-xs"
                            onclick="return confirm('Jesteś pewny?')"
                            title="Skasuj">Usuń
                              
                                   </a></td>
                       @endif
                        
                        
                    </tr>   
                  @endforeach
           
             </tbody>
        </table>
      {{$forms->render('vendor.pagination.simple-bootstrap-4')}}
        <div class="footer-button">
            <a href="{{route('createForms')}}" class="btn btn-secondary">Dodaj</a>
        </div>
        <br>       
        @endauth
    </div>     
  
    @guest
    <div class="table-center">
         <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQw3ACFb4CmF6vKyHbjZHQK01cXS9qlTkV_cw&usqp=CAU" alt="image"/>
    </div>
    <div class="table-container">
        
        <b>Zaloguj się aby przejrzeć formularze.</b>
    </div>    
    @endguest       
</body>
</html>
