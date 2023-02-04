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
                        @if (isset($status) && $status == "child_added")
                            <div class="alert alert-success" role="alert">
                                Dziecko zostało dodane, użyj imienia i nazwiska dziecka w formularzu na stronie głównej, aby zmienić dane.
                            </div>
                        @endif
                        @if (isset($status) && $status == "companion_not_yours")
                            <div class="alert alert-danger" role="alert">
                                To osoba towarzysząca innego gościa.
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
                        @if (\App\Models\Guest::guestIsAChild($gid) == 0)
                            @if (\App\Models\Companion::companionExists($gid) == 1)
                                <label for="exampleFormControlSelect1">Osoba Towarzysząca: </label><br>
    {{--                     {{ route('companion.data', ['id' => $gid]) }}"   --}}
                                <a href="{{ route('home') }}"><button type="submit" class="btn btn-outline-success" style="background-color: rgba(0,187,0,0.32)"><i class="far fa-kiss-wink-heart"></i> {{ \App\Models\Companion::getNameOfCompanion($gid) }}</button></a>
                            @else
                                <label for="exampleFormControlSelect1">Osoba Towarzysząca: </label><br>
                                <a href="{{ route('add.companion', ['id' => $gid]) }}"><button type="submit" class="btn btn-outline-success"><i class="fas fa-user-plus"></i> Dodaj osobę towarzyszącą</button></a>
                            @endif
                        @endif
                    </div>
                <hr>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Dodaj dziecko: </label><br>
                <a href="{{ route('add.children', ['id' => $gid]) }}"><button type="submit" class="btn btn-outline-success"><i class="fas fa-plus"></i> <i class="fas fa-baby"></i> Dadaj dziecko</button></a>
                    <br>
                @if (\App\Models\Child::doIHaveAChild($gid))
                    <br>
                    @foreach(\App\Models\Child::getChildrensData($gid) as $childs)
                        <a href="#"><button type="submit" style="background-color: rgba(77,192,241,0.4)" class="btn btn-outline-success"><i class="fas fa-baby"></i>{{ $childs->name }} {{ $childs->surname }}</button></a>
                    @endforeach
                @endif
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
                                <option>Brusów</option>
                                <option>Stalowa Wola</option>
                            @endif
                            @if($data->trans_from == 'Brusów' && $data->transport !== 0)
                                    <option>Nie potrzebuję</option>
                                    <option selected>Brusów</option>
                                    <option>Stalowa Wola</option>
                            @endif
                                @if($data->trans_from == 'Stalowa Wola' && $data->transport !== 0)
                                    <option>Nie potrzebuję</option>
                                    <option>Brusów</option>
                                    <option selected>Stalowa Wola</option>
                                @endif
                        @endif
                        @if(!isset($data))
                        <option selected>Nie potrzebuję</option>
                        <option>Brusów</option>
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
