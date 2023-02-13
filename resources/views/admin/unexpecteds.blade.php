@php use Illuminate\Support\Str; @endphp
@extends('admin.app')

@section('content')
<div class="d-sm-flex justify-content-between align-items-start">
    <div>
        <h4 class="card-title card-title-dash">Wasi Nieoczekiwani Goście:</h4>
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
                                    <h6><a href="">{{ $guest->name }} {{ $guest->surname }}</a></h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            @if ($guest->child == 1)
                                <img src="{{asset('/admin/images/playtime.png')}}" alt="" style="height: 30px; width: 30px;">
                                @if(\App\Models\Child::amIaChild($guest->id) || $guest->child == 1 && $guest->age !== NULL)
                                    <br>{{ $guest->age }} lat
                                @endif
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
                                <i class="fas fa-bus" style="color: green; font-size: 15px;"></i>
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
@endsection