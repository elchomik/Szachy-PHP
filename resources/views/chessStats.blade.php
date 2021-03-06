

    



<html>
    <head>
    <title>Statystyki na Chess.com</title>
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
        .table-container{
            background-color: white;
            max-width: 1050px;
            margin: 0 auto;
        }   
        .footer-button{
            background-color: transparent;
            float: right;
            margin-top: 3%;
        }
        table{
            max-width: 800px;
            margin: 0 auto;
        }
    </style>
</head>
 @include('layouts.navbar');  
    <body>
        <div class="table-container">
            <div class="title">
                <h3>Chess.com statystyki z wykorzystaniem API </h3>
            </div>
            <table data-toggle="table">
                <thead>
                    <tr>
                       
                        <th>U??ytkownik</th>
                        <th>Obecny ranking</th>
                        <th>Najwy??szy ranking</th>
                        <th>Zwyci??stwa</th>
                        <th>Pora??ki</th>
                        <th>Remisy</th>
                        <th>Ranking najwy??ej rozwi??zanego zadania</th>
                    </tr>
                </thead>
                <tbody>
                    
                        <td>C3P03</td>
                        <td>{{$responseBody->chess_blitz->last->rating}}</td>
                        <td>{{$responseBody->chess_blitz->best->rating}}</td>
                        <td>{{$responseBody->chess_blitz->record->win}}</td>
                        <td>{{$responseBody->chess_blitz->record->loss}}</td>
                        <td>{{$responseBody->chess_blitz->record->draw}}</td>
                        <td>{{$responseBody->tactics->highest->rating}}</td>
                            
                   
                </tbody>
            </table>
           
           
        </div>
    </body>
    
</html>

