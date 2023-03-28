@php use Illuminate\Support\Str; @endphp
@extends('admin.app')

@section('content')
    <div class="d-sm-flex justify-content-between align-items-start">
        <div>
            <h4 class="card-title card-title-dash">Goście i ich osoby towarzyszące:</h4>
        </div>
    </div>
    <div class="table-responsive  mt-1">
        <table class="table select-table">
            <thead>
            <tr>
                <th>lp.</th>
                <th>Gość</th>
                <th>Osoba Towarzysząca</th>
                <th>Hotel</th>
                <th>Transport</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            @foreach($guests as $key => $guest)
                <td>
                    {{ 1 + $key }}
                </td>
                <td>
                    <div class="d-flex ">
                        <img src="{{asset('/admin/images/couple.png')}}" alt="">
                        <div>
                            <h6><a href="">{{ \App\Models\Guest::getGuestName($guest) }}</a></h6>
                            @if(!\App\Models\Companion::companionConfirmedCheck($guest))
                                <div class="badge badge-opacity-warning">Niepotwierdzony
                                </div>
                            @else
                                <div class="badge badge-opacity-success">Potwierdzony
                                </div>
                            @endif
                        </div>
                    </div>
                </td>
                    <td>
                        <div class="d-flex ">
                            <img src="{{asset('/admin/images/couple.png')}}" alt="">
                            <div>
                                <h6><a href="">{{ \App\Models\Guest::getGuestName($companions[$key]) }} </a></h6>
                                @if(!\App\Models\Companion::companionConfirmedCheck($companions[$key]))
                                    <div class="badge badge-opacity-warning">Niepotwierdzony
                                    </div>
                                @else
                                    <div class="badge badge-opacity-success">Potwierdzony
                                    </div>
                                @endif
                            </div>
                        </div>
                    </td>
                <td>
                    @if(\App\Models\Guest::hotelDifferences($guest, $companions[$key]) == 0)
                        <i class="fas fa-bed" style="font-size: 15px;"></i>
                    @elseif(\App\Models\Guest::hotelDifferences($guest, $companions[$key]) == 1)
                        <i class="fas fa-bed" style="color: orangered; font-size: 15px;"></i>
                    @elseif(\App\Models\Guest::hotelDifferences($guest, $companions[$key]) == 3)
                        <i class="fas fa-bed" style="color: forestgreen; font-size: 15px;"></i>
                    @endif
                </td>
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
{{--        {{ $guests->links('pagination::bootstrap-4') }}--}}
    </div>
    </div>
    </div>
    </div>
@endsection
