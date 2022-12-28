@extends('app.app')

@section('content')
    <div id="fh5co-couple">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                    <h2>Cześć!</h2>
                    <h3>05 Sierpnia 2023 godz. 16.00 - Stalowa Wola, Polska</h3>
                    <p>We invited you to celebrate our wedding</p>
                </div>
            </div>
            <div class="couple-wrap animate-box">
                <div class="couple-half">
                    <div class="groom">
                        <img src="images/maciej.jpg" alt="groom" class="img-responsive">
                    </div>
                    <div class="desc-groom">
                        <h3>Maciej Cuch</h3>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove</p>
                    </div>
                </div>
                <p class="heart text-center"><i class="icon-heart2"></i></p>
                <div class="couple-half">
                    <div class="bride">
                        <img src="images/karolinka.jpg" alt="groom" class="img-responsive">
                    </div>
                    <div class="desc-bride">
                        <h3>Karolina Nieradka</h3>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div id="fh5co-started" class="fh5co-bg" style="background-image:url(images/img_bg_4.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>Będziesz?</h2>
                    <p>Wypełnij oba pola aby potwierdzic swoją obecność na naszym weselu, później dowiesz się tu jakie masz miejsce itd.</p>
                </div>
            </div>
            <div class="row animate-box">
                <div class="col-md-10 col-md-offset-1">
                    <form class="form-inline">
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <label for="name" class="sr-only">Imię</label>
                                <input type="name" class="form-control" id="name" placeholder="Imię">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <label for="email" class="sr-only">Nazwisko</label>
                                <input type="email" class="form-control" id="email" placeholder="Nazwisko">
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
@endsection
