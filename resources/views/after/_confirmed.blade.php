<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
            <h2>{{ $data->name }} {{ $data->surname }}</h2>
            <p style="color: #00bb00">Twoja obecność na naszym weselu jest potwierdzona.</p>
            <hr>

            @if (\App\Models\Companion::companionExists($gid) == 1)
                <p>Osoba Towarzysząca: <a href="{{ route('show.companion', ['id' => $gid]) }}">{{\App\Models\Companion::getNameOfCompanion($gid)}}</a></p>
            @endif

            @if (\App\Models\Child::doIHaveAChild($gid))
                <br>
                <p>Dzieci: </p>
                @foreach(\App\Models\Child::getChildrensData($gid) as $childs)
                    <a href="{{ route('show.children', ['id' => $childs->id, 'gid' => $gid]) }}">
                        {{$childs->name}} {{$childs->surname}}
                    </a>
                    @if($childs->confirmed == 0)
                        (Niepotwierdzony)
                    @endif
                    |
                @endforeach
            @endif
            <br>
            <hr>
            <div class="panel panel-default">
                <div class="panel-heading">Hotel i Transport</div>
                <div class="panel-body">
                    <ul class="list-group list-group-flush">
                        @if($data->hotel == 1)
                            <li class="list-group-item list-group-item-success"><i class="fas fa-bed"></i> Masz zapewnione miejsce w hotelu.</li>
                        @else
                            <li class="list-group-item"><i class="fas fa-bed"></i> Brak</li>
                        @endif
                        @if($data->transport == 1)
                            <li class="list-group-item list-group-item-success"><i class="fas fa-bus"></i> Transport z: {{ $data->trans_from }}</li>
                        @else
                            <li class="list-group-item"><i class="fas fa-bus"></i> Brak</li>
                        @endif
                    </ul>
                </div>
            </div>

        </div>
        <div class="col-md-10 col-md-offset-1">
            <a href="{{ route('main') }}"><button type="" class="btn btn-default btn-block">Powrót do strony głównej</button></a>
        </div>
    </div>
</div>
