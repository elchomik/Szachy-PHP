@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Kilka słów o szachach') }}</div>
                 <div class="col-md-8 mb-5">
        <h2>Szachy</h2>
        <hr>
        <p>Szachy – rodzina strategicznych gier planszowych rozgrywanych przez dwóch graczy na 64-polowej szachownicy, za pomocą zestawu bierek (pionów i figur). Popularnie, choć nieprecyzyjnie, szachami nazywa się również wspomniane bierki. Międzynarodowy Komitet Olimpijski uznaje szachy za dyscyplinę sportu.</p>
        <h3>Reguły gry</h3>
        <p>Grę zawsze rozpoczynają białe, co daje im pewną inicjatywę w początkowej fazie partii. Gracze na zmianę wykonują posunięcia swoimi bierkami zgodnie z zasadami ruchu dla danej bierki i jeśli wejdzie ona na pole zajmowane przez przeciwnika, zbija jego bierkę.

Szach jest groźbą zbicia króla, która musi być zażegnana przez przeciwnika w następnym posunięciu (króla nie można zbić). Mat, czyli postawienie króla przeciwnika w szachu, przed którym nie ma obrony, kończy partię i oznacza zwycięstwo gracza, którego bierka matuje króla przeciwnika. Remis występuje w przypadku, gdy:

    gracze uzgodnili taki wynik partii,
    na planszy wystąpił pat (jedna ze stron nie może wykonać prawidłowych posunięć, a jej król nie jest szachowany),
    żadna ze stron nie posiada środków niezbędnych do wygranej (choćby teoretycznej),
    powstała tzw. martwa pozycja, czyli żaden z graczy nie jest w stanie dać mata nawet przy najlepszej grze.

Partia może zakończyć się remisem (na wniosek jednej ze stron), gdy:

    identyczna pozycja na planszy pojawiła się trzykrotnie,
    jedna ze stron daje wiecznego szacha,
    wykonano pięćdziesiąt posunięć bez ruchu pionem i bicia dowolną bierką.</p>
       
      </div>
                <div>
                <h4>Ranking szachowy</h4>
            <p>Ranking szachowy (elo) – metoda obliczania relatywnej siły gry szachistów w punktacji elo. Nazwa „elo” pochodzi od nazwiska Arpada Elo – amerykańskiego naukowca węgierskiego pochodzenia, którego prace ukształtowały szachowy system rankingowy oparty na naukowych podstawach. </p>
          </div>
                <div>
            <h4>Otwarcia Szachowe</h4>
            <p>Otwarcie szachowe – początkowa faza partii szachów, zwana również debiutem. W większości szachowych partii można wyróżnić jej trzy fazy: otwarcie (debiut), grę środkową i końcową.  </p>
          </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection
