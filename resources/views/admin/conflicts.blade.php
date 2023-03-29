@php use Illuminate\Support\Str; @endphp
@extends('admin.app')

@section('content')
    <div class="d-sm-flex justify-content-between align-items-start">
        <div>
            <h4 class="card-title card-title-dash">Różnice w wyborach gości: </h4>
        </div>
    </div>
    <div class="table-responsive  mt-1">
        <table class="table select-table">
            <thead>
            <tr>
                <th>Gość</th>
                <th>Hotel</th>
                <th>Transport</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>
                  <p style="color: black"><b>{{ $guest->name }} {{ $guest->surname }}</b></p>
              </td>
                <td>
                    @if($guest->hotel == 1)
                        <a href="{{ route('update.hotel', ['id' => $guest->id]) }}">
                            <i class="fas fa-bed" style="color: forestgreen; font-size: 15px;"></i>
                        </a>
                    @else
                        <a href="{{ route('update.hotel', ['id' => $guest->id]) }}">
                            <i class="fas fa-bed" style="color: orangered; font-size: 15px;"></i>
                        </a>
                    @endif
                </td>
                <td>
                    @if($guest->transport == 1)
                        @if($guest->trans_from == 'Stalowa Wola')
                            <div class="badge badge-opacity-success">Stalowa Wola
                            </div>
                            |
                            <a href="{{ route('update.transport', ['id' => $guest->id, 'to' => 2]) }}">
                                <div class="badge badge-opacity-warning">Brusów
                                </div>
                            </a>
                            |
                            <a href="{{ route('update.transport', ['id' => $guest->id, 'to' => 0]) }}">
                                <div class="badge badge-opacity-danger">Nie potrzebuje
                                </div>
                            </a>
                        @else
                            <a href="{{ route('update.transport', ['id' => $guest->id, 'to' => 1]) }}">
                                <div class="badge badge-opacity-warning">Stalowa Wola
                                </div>
                            </a>
                            |
                            <div class="badge badge-opacity-success">Brusów
                            </div>
                            |
                            <a href="{{ route('update.transport', ['id' => $guest->id, 'to' => 0]) }}">
                                <div class="badge badge-opacity-danger">Nie potrzebuje
                                </div>
                            </a>
                        @endif
                    @else
                        <a href="{{ route('update.transport', ['id' => $guest->id, 'to' => 1]) }}">
                            <div class="badge badge-opacity-warning">Stalowa Wola
                            </div>
                        </a>
                        |
                        <a href="{{ route('update.transport', ['id' => $guest->id, 'to' => 2]) }}">
                            <div class="badge badge-opacity-warning">Brusów
                            </div>
                        </a>
                        |
                        <a href="{{ route('update.transport', ['id' => $guest->id, 'to' => 0]) }}">
                            <div class="badge badge-opacity-danger">Nie potrzebuje
                            </div>
                        </a>
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    <p style="color: black"><b>{{ $companion->name }} {{ $companion->surname }}</b></p>
                </td>
                <td>
                    @if($companion->hotel == 1)
                        <a href="{{ route('update.hotel', ['id' => $companion->id]) }}">
                            <i class="fas fa-bed" style="color: forestgreen; font-size: 15px;"></i>
                        </a>
                    @else
                        <a href="{{ route('update.hotel', ['id' => $companion->id]) }}">
                            <i class="fas fa-bed" style="color: orangered; font-size: 15px;"></i>
                        </a>
                    @endif
                </td>
                <td>
                    @if($companion->transport == 1)
                        @if($companion->trans_from == 'Stalowa Wola')
                            <div class="badge badge-opacity-success">Stalowa Wola
                            </div>
                        |
                        <a href="{{ route('update.transport', ['id' => $companion->id, 'to' => 2]) }}">
                            <div class="badge badge-opacity-warning">Brusów
                            </div>
                        </a>
                        |
                        <a href="{{ route('update.transport', ['id' => $companion->id, 'to' => 0]) }}">
                            <div class="badge badge-opacity-danger">Nie potrzebuje
                        </div>
                        </a>
                        @else
                        <a href="{{ route('update.transport', ['id' => $companion->id, 'to' => 1]) }}">
                            <div class="badge badge-opacity-warning">Stalowa Wola
                            </div>
                        </a>
                        |
                            <div class="badge badge-opacity-success">Brusów
                            </div>
                        |
                            <a href="{{ route('update.transport', ['id' => $companion->id, 'to' => 0]) }}">
                                <div class="badge badge-opacity-danger">Nie potrzebuje
                                </div>
                            </a>
                        @endif
                    @else
                        <a href="{{ route('update.transport', ['id' => $companion->id, 'to' => 1]) }}">
                        <div class="badge badge-opacity-warning">Stalowa Wola
                        </div>
                        </a>
                    |
                        <a href="{{ route('update.transport', ['id' => $companion->id, 'to' => 2]) }}">
                        <div class="badge badge-opacity-warning">Brusów
                        </div>
                        </a>
                    |
                    <a href="{{ route('update.transport', ['id' => $companion->id, 'to' => 0]) }}">
                        <div class="badge badge-opacity-danger">Nie potrzebuje
                        </div>
                    </a>
                    @endif
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    </div>
    <div class="pagination justify-content-center">
        {{--        {{ $guests->links('pagination::bootstrap-4') }}--}}
    </div>
    </div>
    </div>
    </div>
@endsection
