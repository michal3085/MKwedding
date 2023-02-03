@php use Illuminate\Support\Str; @endphp
@extends('admin.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a @if($mode == 0) class="nav-link active ps-0" @else class="nav-link ps-0" @endif id="home-tab"  href="{{ route('admin') }}"
                               role="tab" aria-controls="overview" aria-selected="true">Wszyscy</a>
                        </li>
                        <li class="nav-item">
                            <a @if($mode == 1) class="nav-link active" @else class="nav-link" @endif id="profile-tab" href="{{ route('filter.guests', ['filter' => 1]) }}" role="tab"
                               aria-selected="false">Potwierdzeni</a>
                        </li>
                        <li class="nav-item">
                            <a @if($mode == 2) class="nav-link active" @else class="nav-link" @endif id="contact-tab"  href="{{ route('filter.guests', ['filter' => 2]) }}" role="tab"
                               aria-selected="false">Niepotwierdzeni</a>
                        </li>
                        <li class="nav-item">
                            <a @if($mode == 3) class="nav-link active" @else class="nav-link" @endif id="more-tab"  href="{{ route('filter.guests', ['filter' => 3]) }}" role="tab"
                               aria-selected="false">Transport</a>
                        </li>
                        <li class="nav-item">
                            <a @if($mode == 4) class="nav-link active" @else class="nav-link" @endif id="more-tab"  href="{{ route('filter.guests', ['filter' => 4]) }}" role="tab"
                               aria-selected="false">Hotel</a>
                        </li>
                        <li class="nav-item">
                            <a @if($mode == 6) class="nav-link active" @else class="nav-link" @endif id="profile-tab" href="{{ route('filter.guests', ['filter' => 6]) }}" role="tab"
                               aria-selected="false">Uwagi/Alergie</a>
                        </li>
                        <li class="nav-item">
                            <a @if($mode == 5) class="nav-link active border-0" @else class="nav-link" @endif id="a-tab" href="{{ route('filter.guests', ['filter' => 5]) }}" role="tab"
                               aria-selected="false">Vege</a>
                        </li>
                        <li class="nav-item">
                            <a @if($mode == 7) class="nav-link active border-0" @else class="nav-link border-0" @endif id="a-tab" href="{{ route('filter.guests', ['filter' => 7]) }}" role="tab"
                               aria-selected="false">Dzieci</a>
                        </li>
                    </ul>
                    <div>
                        <div class="btn-wrapper">
                            <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
                            <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                            <a href="{{ route('excel.export') }}" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>
                        </div>
                    </div>
                </div>
                <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="statistics-details d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="statistics-title">Zaproszeni</p>
                                        <h3 class="rate-percentage">{{ \App\Models\Guest::all()->count() }}</h3>
                                        <p class="text-success d-flex"><span style="color: rgba(10,6,6,0.37)"><i class="mdi mdi-menu-swap"></i>100%</span></p>
                                    </div>
                                    <div>
                                        <p class="statistics-title">Potwierdzeni Goście</p>
                                        <h3 class="rate-percentage">{{ \App\Models\Guest::where('confirmed', 1)->count() }}</h3>
                                        <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>{{ \App\Models\Guest::getGuestsPrecentage(1) }}%</span></p>
                                    </div>
                                    <div>
                                        <p class="statistics-title">Niepotwierdzeni</p>
                                        <h3 class="rate-percentage">{{ \App\Models\Guest::where('confirmed', 0) ->count() }}</h3>
                                        <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>{{ \App\Models\Guest::getGuestsPrecentage(2) }}%</span></p>
                                    </div>
                                    <div class="d-none d-md-block">
                                        <p class="statistics-title">Transport Brusów
                                        <h3 class="rate-percentage">{{ \App\Models\Guest::where('transport', 1)->where('trans_from', 'Brusów')->count() }}</h3>
                                        <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>{{ \App\Models\Guest::getGuestsPrecentage(3) }}%</span></p>
                                    </div>
                                    <div class="d-none d-md-block">
                                        <p class="statistics-title">Stalowa Wola
                                        <h3 class="rate-percentage">{{ \App\Models\Guest::where('transport', 1)->where('trans_from', 'Stalowa Wola')->count() }}</h3>
                                        <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>{{ \App\Models\Guest::getGuestsPrecentage(4) }}%</span></p>
                                    </div>
                                    <div class="d-none d-md-block">
                                        <p class="statistics-title">Hotel
                                        <h3 class="rate-percentage">{{ \App\Models\Guest::where('hotel', 1)->count() }}</h3>
                                        <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>{{ \App\Models\Guest::getGuestsPrecentage(5) }}%</span></p>
                                    </div>
                                    <div class="d-none d-md-block">
                                        <p class="statistics-title">Menu Wegańskie</p>
                                        <h3 class="rate-percentage">{{ \App\Models\Guest::where('vege', 1)->count() }}</h3>
                                        <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>{{ \App\Models\Guest::getGuestsPrecentage(6) }}%</span></p>
                                    </div>
                                    <div class="d-none d-md-block">
                                        <p class="statistics-title">Alergie/Uwagi</p>
                                        <h3 class="rate-percentage">{{ \App\Models\Guest::where('allergies', '!=', NULL)->count() }}</h3>
                                        <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>{{ \App\Models\Guest::getGuestsPrecentage(7) }}%</span></p>
                                    </div>
                                    <div class="d-none d-md-block">
                                        <p class="statistics-title">Dzieci</p>
                                        <h3 class="rate-percentage">{{ \App\Models\Guest::where('child', 1)->count() }}</h3>
                                        <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>{{ \App\Models\Guest::getGuestsPrecentage(8) }}%</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
{{--                        @if (isset($error) && $error == 1)--}}
{{--                            <div class="alert alert-danger" role="alert">--}}
{{--                                <i class="fas fa-user-check"></i>--}}
{{--                                Jest już taka osoba na liście gości.--}}
{{--                            </div>--}}
{{--                        @endif--}}
                        @if(isset($success) && $success = 1)
                            <div class="alert alert-success" role="alert">
                                <i class="fas fa-user-check"></i>
                                Osoba dodana prawidłowo.
                            </div>
                        @endif
                        @if($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <i class="fas fa-user-check"></i>
                                Ta osoba jest już na liście gości.
                            </div>
                        @endif
                        @if (isset($search) && $search == 0)
                            <div class="alert alert-danger" role="alert">
                                <i class="fas fa-user-times"></i>
                                Nie znalazłem takiej osoby.
                            </div>
                        @endif
                        {{--                        <div class="alert alert-success" role="alert">--}}
{{--                            Jegomość dodany :)--}}
{{--                        </div>--}}
                        <div class="row flex-grow">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card card-rounded">
                                    <div class="card-body">
                                        <div class="row">
                                            <form action="{{ route('add.guest') }}" class="form-inline" method="POST">
                                                @csrf
                                                <div class="col-md-4 col-sm-4" style="float: left">
                                                    <div class="form-group">
                                                        <label for="name" class="sr-only">Imię</label>
                                                        <input class="form-control" autofocus="autofocus" id="name" name="name" placeholder="Imię"
                                                               required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4" style="float: left">
                                                    <div class="form-group">
                                                        <label for="surname" class="sr-only">Nazwisko</label>
                                                        <input class="form-control" id="surname" name="surname"
                                                               placeholder="Nazwisko" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4" style="float: left">
                                                <select class="form-control form-control-sm" style="width: 200px; color: #0B0F32" name="child">
                                                    <option value="0" selected>Dorosły</option>
                                                    <option value="1">Dziecko</option>
                                                </select>
                                                </div>
                                                <div class="col-md-4 col-sm-4">
                                                    <button type="submit"
                                                            class="btn btn-primary btn-lg text-white mb-0 me-0"><i
                                                            class="mdi mdi-account-plus"></i>Dodaj gościa
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        <hr>
                                        <br>
                                        <div class="d-sm-flex justify-content-between align-items-start">
                                            <div>
                                                <h4 class="card-title card-title-dash">Wasi Goście:</h4>
                                            </div>
                                        </div>
                                        <div class="table-responsive  mt-1">
                                            <table class="table select-table">
                                                <thead>
                                                <tr>
                                                    <th>Imię i Nazwisko</th>
                                                    <th>Dziecko</th>
                                                    <th>Alergie/Uwagi</th>
                                                    <th>Menu Vege</th>
                                                    <th>Hotel</th>
                                                    <th>Transport</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    @foreach($guests as $guest)
                                                        <td>
                                                            <div class="d-flex ">
                                                                <img src="{{asset('/admin/images/couple.png')}}" alt="">
                                                                <div>
                                                                    <h6><a href="{{ route('guest.profile', ['id' => $guest->id]) }}">{{ $guest->name }} {{ $guest->surname }}</a></h6>
                                                                    @if (\App\Models\Companion::companionExists($guest->id) == 1)
                                                                    <p>{{ \App\Models\Companion::getNameOfCompanion($guest->id) }}</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            @if ($guest->child == 1)
                                                                <img src="{{asset('/admin/images/playtime.png')}}" alt="" style="height: 30px; width: 30px;">
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($guest->allergies !== NULL)
                                                                <img src="{{asset('/admin/images/allergies.png')}}" alt="" style="height: 30px; width: 30px;">
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($guest->vege == 1)
                                                                <img src="{{asset('/admin/images/vegetable.png')}}" alt="" style="height: 30px; width: 30px;">
                                                            @else
{{--                                                                <img src="{{asset('/admin/images/meat.png')}}" alt="" style="height: 30px; width: 30px;">--}}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($guest->hotel == 1)
                                                                <h6 style="color: #3c763d">TAK</h6>
                                                                <p>Hotel: ??</p>
                                                            @else
                                                                <h6 style="color: orangered">NIE</h6>
                                                                <p></p>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($guest->transport == 1)
                                                                <h6 style="color: #3c763d">TAK</h6>
                                                                <p>Z: {{ $guest->trans_from }}</p>
                                                            @else
                                                                <h6 style="color: orangered">NIE</h6>
                                                                <p></p>
                                                            @endif
                                                        </td>
                                                        @if ($guest->confirmed == 1)
                                                            <td>
                                                                <div class="badge badge-opacity-success">Potwierdzony
                                                                </div>
                                                            </td>
                                                        @else
                                                            <td>
                                                                <div class="badge badge-opacity-warning">Niepotwierdzony
                                                                </div>
                                                            </td>
                                                        @endif
                                                        </tr>
                                                    <tr>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <p class="card-subtitle card-subtitle-dash"><p class="wysiwyg-text-align-center">"Icon made by&nbsp;<a target="_blank" href="https://www.flaticon.com/authors/pixel-perfect">Pixel perfect</a>&nbsp;from&nbsp;<a target="_blank" href="http://www.flaticon.com/">www.flaticon.com</a>"</p></p>
                                    </div>
                                    <div class="pagination justify-content-center">
                                        {{ $guests->links('pagination::bootstrap-4') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row flex-grow">
                            <div class="col-md-6 col-lg-6 grid-margin stretch-card">
                                <div class="card card-rounded">
                                    <div class="card-body card-rounded">
                                        {{ \Carbon\Carbon::now() }}
                                        <h4 class="card-title  card-title-dash">Recent Events</h4>
                                        <div class="list align-items-center border-bottom py-2">
                                            <div class="wrapper w-100">
                                                <p class="mb-2 font-weight-medium">
                                                    Change in Directors
                                                </p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <i class="mdi mdi-calendar text-muted me-1"></i>
                                                        <p class="mb-0 text-small text-muted">Mar 14, 2019</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list align-items-center border-bottom py-2">
                                            <div class="wrapper w-100">
                                                <p class="mb-2 font-weight-medium">
                                                    Other Events
                                                </p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <i class="mdi mdi-calendar text-muted me-1"></i>
                                                        <p class="mb-0 text-small text-muted">Mar 14, 2019</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list align-items-center border-bottom py-2">
                                            <div class="wrapper w-100">
                                                <p class="mb-2 font-weight-medium">
                                                    Quarterly Report
                                                </p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <i class="mdi mdi-calendar text-muted me-1"></i>
                                                        <p class="mb-0 text-small text-muted">Mar 14, 2019</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list align-items-center border-bottom py-2">
                                            <div class="wrapper w-100">
                                                <p class="mb-2 font-weight-medium">
                                                    Change in Directors
                                                </p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <i class="mdi mdi-calendar text-muted me-1"></i>
                                                        <p class="mb-0 text-small text-muted">Mar 14, 2019</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="list align-items-center pt-3">
                                            <div class="wrapper w-100">
                                                <p class="mb-0">
                                                    <a href="#" class="fw-bold text-primary">Show all <i
                                                            class="mdi mdi-arrow-right ms-2"></i></a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 grid-margin stretch-card">
                                <div class="card card-rounded">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <h4 class="card-title card-title-dash">Activities</h4>
                                            <p class="mb-0">20 finished, 5 remaining</p>
                                        </div>
                                        <ul class="bullet-line-list">
                                            <li>
                                                <div class="d-flex justify-content-between">
                                                    <div><span class="text-light-green">Ben Tossell</span> assign you a
                                                        task
                                                    </div>
                                                    <p>Just now</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex justify-content-between">
                                                    <div><span class="text-light-green">Oliver Noah</span> assign you a
                                                        task
                                                    </div>
                                                    <p>1h</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex justify-content-between">
                                                    <div><span class="text-light-green">Jack William</span> assign you a
                                                        task
                                                    </div>
                                                    <p>1h</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex justify-content-between">
                                                    <div><span class="text-light-green">Leo Lucas</span> assign you a
                                                        task
                                                    </div>
                                                    <p>1h</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex justify-content-between">
                                                    <div><span class="text-light-green">Thomas Henry</span> assign you a
                                                        task
                                                    </div>
                                                    <p>1h</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex justify-content-between">
                                                    <div><span class="text-light-green">Ben Tossell</span> assign you a
                                                        task
                                                    </div>
                                                    <p>1h</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex justify-content-between">
                                                    <div><span class="text-light-green">Ben Tossell</span> assign you a
                                                        task
                                                    </div>
                                                    <p>1h</p>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="list align-items-center pt-3">
                                            <div class="wrapper w-100">
                                                <p class="mb-0">
                                                    <a href="#" class="fw-bold text-primary">Show all <i
                                                            class="mdi mdi-arrow-right ms-2"></i></a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
