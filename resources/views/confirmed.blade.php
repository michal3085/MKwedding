@extends('app.app')

@section('content')
    <div id="fh5co-started" class="fh5co-bg" style="background-image:url({{asset('images/karolina_pierscien.jpg')}});">
    </div>
    <div id="fh5co-couple">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                    <h2>Dziękujemy!</h2>
                    <h3>Widzimy się 05 Sierpnia 2023 o godz. 16.00</h3>
                    <p>Jeżeli chcesz nas poinformować o alergiach, masz jakieś uwagi</p>
                    <p>lub potrzebujesz transportu to wypełnij poniższy formularz!</p>
                </div>
                <div class="col-md-10 col-md-offset-1">
                    <a href="{{ route('home') }}"><button type="" class="btn btn-default btn-block">Powrót do strony głównej</button></a>
                </div>
            </div>
            <hr>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Potrzebujesz noclegu?</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>TAK</option>
                        <option>NIE</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Transport z:</label>
                    <select multiple class="form-control" id="exampleFormControlSelect2">
                        <option>Nie potrzebuję</option>
                        <option>Ryki</option>
                        <option>Stalowa Wola</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Informacje o alergiach/Uwagi:</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </form>
        </div>
@endsection
