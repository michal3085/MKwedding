@extends('app.app')

@section('content')
    <div id="fh5co-started" class="fh5co-bg" style="background-image:url({{asset('images/karolina_pierscien.jpg')}});">
    </div>
    <div id="fh5co-couple">
        @if (isset($status) && $status == "no_guest")
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                        <h2>Coś poszło nie tak... :(</h2>
                        <h3>W naszej bazie nie ma osoby o podanym imieniu i nazwisku...</h3>
                        <p>Jeżeli masz zaproszenie, nie przejmuj się. Być może Twoje dane nie zostały jeszcze wprowadzone.</p>
                    </div>
                    <div class="col-md-10 col-md-offset-1">
                        <a href="{{ route('main') }}"><button type="" class="btn btn-default btn-block">Powrót do strony głównej</button></a>
                    </div>
                </div>
            @else
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                    @if (isset($status) && $status == "data_saved")
                        <div class="alert alert-success" role="alert">
                            Super! Zapisaliśmy Twoje uwagi, jeżeli chcesz coś zmienić w przyszłości, wypełnij formularz na stronie głównej jeszcze raz i popraw dane.
                        </div>
                    @endif
                        @if (isset($status) && $status == "companion_added")
                            <div class="alert alert-success" role="alert">
                                Twoja osoba towarzysząca została dodana, użyj imienia i nazwiska osoby towarzyszącej w formularzu na stronie głównej, aby zmienić dane.
                            </div>
                        @endif
                    <h2>Dziękujemy, {{ $name }}!</h2>
                    <h3>Widzimy się 05 Sierpnia 2023 o godz. 16.00</h3>
                    <p>Jeżeli chcesz nas poinformować o alergiach, masz jakieś uwagi <br> lub potrzebujesz transportu to wypełnij poniższy formularz!</p>
                </div>
                <div class="col-md-10 col-md-offset-1">
                    <a href="{{ route('main') }}"><button type="" class="btn btn-default btn-block">Powrót do strony głównej</button></a>
                </div>
            </div>
                <hr>
                    <div class="form-group">
                        <a href="{{ route('add.companion', ['name' => $name, 'surname' => $surname]) }}"><button type="submit" class="btn btn-outline-success"><i class="fas fa-user-plus"></i> Dodaj osobę towarzyszącą</button></a>
                    </div>
                <hr>
            <form action="{{ route('guest.data.save', ['id' => $gid]) }}" method="GET">
{{--                @csrf--}}
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Potrzebujesz noclegu?</label>
                    <select class="form-control" name="hotel" id="exampleFormControlSelect1">
                        @if(isset($data))
                            @if ($data->hotel == 1)
                                <option selected>TAK</option>
                                <option>NIE</option>
                            @endif
                                @if ($data->hotel == 0)
                                    <option>TAK</option>
                                    <option selected>NIE</option>
                                @endif
                        @else
                            <option>TAK</option>
                            <option selected>NIE</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Transport z:</label>
                    <select multiple class="form-control" name="transport" id="exampleFormControlSelect2">
                        @if(isset($data))
                            @if ($data->transport == 0)
                                <option selected>Nie potrzebuję</option>
                                <option>Ryki</option>
                                <option>Stalowa Wola</option>
                            @endif
                            @if($data->trans_from == 'Ryki' && $data->transport !== 0)
                                    <option>Nie potrzebuję</option>
                                    <option selected>Ryki</option>
                                    <option>Stalowa Wola</option>
                            @endif
                                @if($data->trans_from == 'Stalowa Wola' && $data->transport !== 0)
                                    <option>Nie potrzebuję</option>
                                    <option>Ryki</option>
                                    <option selected>Stalowa Wola</option>
                                @endif
                        @endif
                        @if(!isset($data))
                        <option selected>Nie potrzebuję</option>
                        <option>Ryki</option>
                        <option>Stalowa Wola</option>
                            @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Menu wegańskie?</label>
                    <select class="form-control" name="vege" id="exampleFormControlSelect1">
                        @if(isset($data))
                            @if ($data->vege == 1)
                                <option selected>TAK</option>
                                <option>NIE</option>
                            @endif
                            @if ($data->vege == 0)
                                <option>TAK</option>
                                <option selected>NIE</option>
                            @endif
                        @else
                            <option>TAK</option>
                            <option selected>NIE</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Informacje o alergiach/Uwagi:</label>
                    <textarea class="form-control" name="allergies" id="exampleFormControlTextarea1" rows="3">@if (isset($data)){{ $data->allergies }}@endif</textarea>
                </div>
            <div class="col-md-10 col-md-offset-1">
                <button type="" class="btn btn-default btn-block" style="background-color: #F14E95">Wyślij</button>
            </div>
            </form>
        </div>
    @endif
@endsection
