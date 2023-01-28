@extends('app.app')

@section('content')
{{--    <header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url({{asset('images/img_bg_2.jpg')}});" data-stellar-background-ratio="0.5">--}}
    <header id="fh5co-header" class="fh5co-cover" role="banner" style="" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1>Karolina & Maciek</h1>
                            <h2>Pobieramy się za:</h2>
                            <div class="simply-countdown simply-countdown-one"></div>
{{--                            <p><a href="#" class="btn btn-default btn-sm">Save the date</a></p>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div id="fh5co-couple">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                    <h2>Cześć!</h2>
                    <p>Nasz Ślub i Wesele odbędą się w:</p>
                    <h3>05 Sierpnia 2023 godz. 16.00</h3>
                    <h3>Klasztor: Zakonu Braci Mniejszych Kapucynów, Stalowa Wola</h3>
                    <h3>Sala: Rezydencja Sosnowa w Janowie Lubelskim</h3>
                </div>
            </div>
            <div class="couple-wrap animate-box">
                <div class="couple-half">
                    <div class="groom">
                        <img src="images/karolinka.jpg" alt="groom" class="img-responsive">
                    </div>
                    <div class="desc-groom">
                        @if(\Carbon\Carbon::parse(\Carbon\Carbon::now())->lt('08/05/2023 15:30:00'))
                            <h3>Karolina Nieradka</h3>
                        @else
                            <h3>Karolina Cuch</h3>
                        @endif
                        <p>Pysznica, Podkarpackie<br>663 618 912</p>
                    </div>
                </div>
                <p class="heart text-center"><i class="icon-heart2"></i></p>
                <div class="couple-half">
                    <div class="bride">
                        <img src="images/maciej.jpg" alt="groom" class="img-responsive">
                    </div>
                    <div class="desc-groom">
                        <h3>Maciej Cuch</h3>
                        <p>Brusów, Lubelskie<br>796 304 910</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br id="confirm">
    <div id="fh5co-started" class="fh5co-bg" style="background-image:url(images/img_bg_4.jpg);">
        <div class="overlay" ></div>
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>Będziesz?</h2>
                    <p>Wypełnij oba pola, aby potwierdzić swoją obecność na naszym weselu, później dowiesz się tu jakie masz miejsce itd.</p>
                </div>
            </div>
            <div class="row animate-box">
                <div class="col-md-10 col-md-offset-1">
                    <form action="{{ route('guest.confirm') }}" class="form-inline" method="POST">
                        @csrf
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <label for="name" class="sr-only">Imię</label>
                                <input  class="form-control" id="name" name="name" placeholder="Imię" required>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <label for="surname" class="sr-only">Nazwisko</label>
                                <input  class="form-control" id="surname" name="surname" placeholder="Nazwisko" required>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <button type="submit" class="btn btn-default btn-block">Biorę udział!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    .
    <div class="wrapper">
        <div class="divider div-transparent div-dot"></div>
    </div>
{{--    SLUB --}}
    <div id="fh5co-event" class="fh5co-bg" style="background-image:url({{asset('images/klasztor.jpg')}});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
{{--                    <span>Our Special Events</span>--}}
                    <h2>Ceremonia</h2>
                </div>
            </div>
            <div class="row">
                <div class="display-t">
                    <div class="display-tc">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="col-md-6 col-sm-6 text-center">
                                <div class="event-wrap animate-box">
                                    <h3>Ślub</h3>
                                    <div class="event-col">
                                        <i class="icon-clock"></i>
                                        <span>o godz.: 16:00</span>
                                        <span>do godz.: 17:00</span>
                                    </div>
                                    <div class="event-col">
                                        <i class="icon-calendar"></i>
                                        <span>Sobota 05</span>
                                        <span>Sierpnia, 2023</span>
                                    </div>
                                    <p>Ceremonia zaślubin odbędzie się w Klasztorze Zakonu Braci Mniejszych Kapucynów w Stalowej Woli</p>
                                    <p><a href="https://www.google.com/maps/place/Klasztor+Zakonu+Braci+Mniejszych+Kapucyn%C3%B3w/@50.5865475,22.0463182,15z/data=!4m5!3m4!1s0x0:0xdba68f4f81b6bd20!8m2!3d50.5865319!4d22.0464231">ul. Klasztorna 27, 37-450 Stalowa Wola<br>(Kliknij aby wyświetlić mapę)<a/></p>
                                </div>
                            </div>
{{--                            <div class="col-md-6 col-sm-6 text-center">--}}
{{--                                <div class="event-wrap animate-box">--}}
{{--                                    <h3>Wesele</h3>--}}
{{--                                    <div class="event-col">--}}
{{--                                        <i class="icon-clock"></i>--}}
{{--                                        <span>od godz.: 17:30</span>--}}
{{--                                        <span>do godz.: 5:00</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="event-col">--}}
{{--                                        <i class="icon-calendar"></i>--}}
{{--                                        <span>Sobota 05</span>--}}
{{--                                        <span>Sierpnia, 2023</span>--}}
{{--                                    </div>--}}
{{--                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--  SALA WESELNA  --}}
    <br>
    .
    <div class="wrapper">
        <div class="divider div-transparent div-dot"></div>
    </div>
    <div id="fh5co-event" class="fh5co-bg" style="background-image:url({{asset('images/sala_weselna.jpg')}});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                    {{--                    <span>Our Special Events</span>--}}
{{--                    <h2>Ceremonia</h2>--}}
                </div>
            </div>
            <div class="row">
                <div class="display-t">
                    <div class="display-tc">
                        <div class="col-md-10 col-md-offset-1">
{{--                            <div class="col-md-6 col-sm-6 text-center">--}}
{{--                                <div class="event-wrap animate-box">--}}
{{--                                    <h3>Ślub</h3>--}}
{{--                                    <div class="event-col">--}}
{{--                                        <i class="icon-clock"></i>--}}
{{--                                        <span>o godz.: 16:00</span>--}}
{{--                                        <span>do godz.: 17:00</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="event-col">--}}
{{--                                        <i class="icon-calendar"></i>--}}
{{--                                        <span>Sobota 05</span>--}}
{{--                                        <span>Sierpnia, 2023</span>--}}
{{--                                    </div>--}}
{{--                                    <p>Ceremonia zaślubin odbędzie się w Klasztorze Zakonu Braci Mniejszych Kapucynów w Stalowej Woli</p>--}}
{{--                                    <p><a href="https://www.google.com/maps/place/Klasztor+Zakonu+Braci+Mniejszych+Kapucyn%C3%B3w/@50.5865475,22.0463182,15z/data=!4m5!3m4!1s0x0:0xdba68f4f81b6bd20!8m2!3d50.5865319!4d22.0464231">Klasztorna 27, 37-450 Stalowa Wola<a/></p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="col-md-6 col-sm-6 text-center">
                                <div class="event-wrap animate-box">
                                    <h3>Wesele</h3>
                                    <div class="event-col">
                                        <i class="icon-clock"></i>
                                        <span>od godz.: 17:30</span>
                                        <span>do godz.: 5:00</span>
                                    </div>
                                    <div class="event-col">
                                        <i class="icon-calendar"></i>
                                        <span>Sobota 05</span>
                                        <span>Sierpnia, 2023</span>
                                    </div>
                                    <p>Na przyjęcie weselne zapraszamy Państwa do Rezydencji Sosnowa w Janowie Lubelskim</p>
                                    <p><a href="https://www.google.com/maps/place/Rezydencja+Sosnowa/@50.687751,22.4021869,15z/data=!4m8!3m7!1s0x0:0x38da81c0e7c7e32a!5m2!4m1!1i2!8m2!3d50.687751!4d22.4021869">ul. Turystyczna 8d, 23-300 Janów Lubelski<br>(Kliknij aby wyświetlić mapę)</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--Transport info--}}

{{-- Prezenty --}}

.
<div class="wrapper">
    <div class="divider div-transparent div-dot"></div>
</div>
{{--      background-size: cover;
  background-repeat: no-repeat;
  position: relative;--}}
<div id="fh5co-gallery" class="fh5co-section-gray" style="background-image: url('/images/czad.png'); background-size: 130%; background-repeat: no-repeat;">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                <h2>A zamiast kwiatów</h2>
                <p style="color: #0b0b0b">W dniu ślubu, prowadzona będzie zbiórka pieniędzy na fundację "Czadowa Para"</p>
            </div>
        </div>
        <div class="row row-bottom-padded-md">
            <div class="col-md-12">
{{--                <ul id="fh5co-gallery-list">--}}
{{--                    <li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url('{{ asset('/images/czadowalogo.jpg') }}'); ">--}}
{{--                    </li>--}}
{{--                        <li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url('{{ asset('/images/czad.jpg') }}'); ">--}}
{{--                        </li>--}}
{{--                    <li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url('{{ asset('/images/czadowa_para.jpg') }}'); width: 50%;">--}}
{{--                    </li>--}}
{{--                </ul>--}}
                <img class="img-czadowa" src="{{ asset('/images/czadowa_para.jpg') }}">
            </div>
        </div>
    </div>
</div>

@endsection
