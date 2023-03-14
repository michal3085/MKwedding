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
                                @if (isset($error) && $error == "child_yours_companion")
                                    <div class="alert alert-warning" role="alert">
                                        Wpisane dane dziecka, odpowiadają Twojej osobie Towarzyszącej.
                                    </div>
                                @endif
                                    @if (isset($error) && $error == "child_someone_companion")
                                        <div class="alert alert-warning" role="alert">
                                            Wpisane dane dziecka, odpowiadają czyjejś osobie Towarzyszącej.
                                        </div>
                                    @endif
                                <h2>Dodaj dziecko</h2>
                                <p>Wypełnij dane i dodaj swoje dziecko do listy gości!</p>
                            </div>
                            <div class="col-md-10 col-md-offset-1">
                                <a href="{{ route('main') }}"><button type="" class="btn btn-default btn-block">Anuluj</button></a>
                            </div>
                        </div>
                        <hr>
                        <form action="{{ route('save.child', ['id' => $gid]) }}" method="GET">
                            {{--                @csrf--}}
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Imię" name="name" required>
                                @if($errors->first('name'))
                                    <p style="color: red"> Imię dziecka nie powinno składać się z więcej jak 30 znaków </p>
                                @endif
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Nazwisko" name="surname" required>
                                @if($errors->first('surname'))
                                    <p style="color: red"> Nazwisko dziecka nie powinno składać się z więcej jak 40 znaków </p>
                                @endif
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="number" placeholder="Wiek" name="age" required>
                                @if($errors->first('age'))
                                    <p style="color: red"> Dzieci powyżej 18 lat, należy potwierdzać osobno </p>
                                @endif
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleFormControlSelect1">Potrzebujesz noclegu?</label>--}}
{{--                                <select class="form-control" name="hotel" id="exampleFormControlSelect1">--}}
{{--                                    <option value="1">TAK</option>--}}
{{--                                    <option value="0" selected>NIE</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
                            <div class="form-group" hidden="hidden">
                                <select class="form-control" name="hotel" id="exampleFormControlSelect1" hidden="hidden">
                                    <option value="0" selected>0</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect2">Transport z:</label>
                                <select multiple class="form-control" name="transport" id="exampleFormControlSelect2">
                                    <option selected>Nie potrzebuję</option>
                                    <option>Brusów</option>
                                    <option>Stalowa Wola</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Menu wegańskie?</label>
                                <select class="form-control" name="vege" id="exampleFormControlSelect1">
                                    <option value="1" >TAK</option>
                                    <option value="0" selected>NIE</option>
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
