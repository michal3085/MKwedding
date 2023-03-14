@extends('app.app')

@section('content')
{{--    <header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url({{asset('images/img_bg_2.jpg')}});" data-stellar-background-ratio="0.5">--}}
    <header id="fh5co-header" class="fh5co-cover" role="banner" style="" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container" style="margin-left: -10px;">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1>Karolina & Maciek</h1>
                            <div class="simply-countdown simply-countdown-one"></div>
                            <p></p><a href="#confirm" class="btn btn-default btn-sm save-date"><b>Potwierdź obecność</b></a></p>
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
                        <img src="images/k6.jpg" alt="groom" class="img-responsive">
                    </div>
                    <div class="desc-groom">
                        @if (isset($data))
                            @if(\Carbon\Carbon::parse(\Carbon\Carbon::now())->lt('08/05/2023 15:30:00'))
                                <h3><b>{{ $data->bride }}</b></h3>
                            @else
                                <h3><b>{{ $data->bride_after }}</b></h3>
                            @endif
                            <p>{{ $data->bride_from }}<br>{{ $data->bride_phone }}</p>
                        @else
                            @if(\Carbon\Carbon::parse(\Carbon\Carbon::now())->lt('08/05/2023 15:30:00'))
                                <h3><b>Bride Name</b></h3>
                            @else
                                <h3><b>Bride Name After Ceremony</b></h3>
                            @endif
                            <p>Bride Come From<br>Bride Phone Number</p>
                        @endif
                    </div>
                </div>
                <p class="heart text-center"><i class="icon-heart2"></i></p>
                <div class="couple-half">
                    <div class="bride">
                        <img src="images/m.bmp" alt="groom" class="img-responsive">
                    </div>
                    <div class="desc-groom">
                        @if (isset($data))
                            <h3><b>{{ $data->groom }}</b></h3>
                            <p>{{ $data->groom_from }}<br>{{ $data->groom_phone }}</p>
                        @else
                            <h3><b>Groom Name</b></h3>
                            <p>Groom Come From<br>Groom Phone Number</p>
                            <a href="{{ route('bride.and.groom') }}">Go Here And Enter the Data</a>
                        @endif
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
                    <h2 style="color: #F14E95;">Będziesz?</h2>
                    <p style="color: white">Wypełnij oba pola, aby potwierdzić swoją obecność. Więcej informacji o zakwaterowaniu i transporcie znajdziesz poniżej.
                    <br/>
                        (Proszę potwierdzać osoby pojedynczo)
                    </p>
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
<div id="fh5co-services" class="fh5co-section-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="feature-left animate-box" data-animate-effect="fadeInLeft">
						<span class="icon">
                            <i class="fas fa-bus"></i>
						</span>
                    <div class="feature-copy">
                        <h3 style="color:  #F14E95">Transport</h3>
                        <p align="justify">W dniu wesela będzie zorganizowany transport z: <b>Brusowa (i okolic)</b> i <b>Stalowej Woli</b>.<br> Zapewniamy również transport powrotny. Podczas potwierdzania swojej obecności prosimy o zaznaczenie tej opcji, jeśli chcesz skorzystać z busa. Dalsze szczegóły podamy bliżej daty ślubu. </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 animate-box">
                <div class="feature-left animate-box" data-animate-effect="fadeInLeft">
					<span class="icon">
							<i class="fas fa-bed"></i>
						</span>
                    <div class="feature-copy">
                        <h3 style="color:  #F14E95">Nocleg</h3>
                        <p align="justify">Dla gości dojeżdzających z dalszych miejscowości, zapewniamy nocleg w pobliżu sali weselnej. Podczas potwierdzania swojej obecności prosimy o zaznaczenie, że potrzebujesz noclegu.</p>
                    </div>
                </div>
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
                </div>
            </div>
            <div class="row">
                <div class="display-t">
                    <div class="display-tc">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="col-md-6 col-sm-6 text-center">
                                <div class="event-wrap animate-box">
                                    <p style="font-family: Sacramento,serif,Arial; font-size: 35px; color: #F14E95;"><b>Ceremonia</b></p>
                                    <hr>
                                    <div class="event-col">
                                        <i class="icon-clock"></i>
                                        <span>o godz.: 16:00</span>
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
                                    <p style="font-family: Sacramento,serif,Arial; font-size: 35px; color: #F14E95;"><b>Wesele</b></p>
                                    <hr>
                                    <div class="event-col">
                                        <i class="icon-clock"></i>
                                        <span>o godz: 17:30</span>
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
<div id="fh5co-gallery" class="fh5co-section-gray" style="">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                <h2>A zamiast kwiatów</h2>
                <p style="color: #0b0b0b">Zachęcamy do wsparcia akcji "Czadowa Para". W dniu ślubu prowadzona będzie zbiórka na budowę szkoły w Czadzie.</p>
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
