@extends('admin.app')

@section('content')
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="{{ asset('/admin/images/man.png') }}"><span class="font-weight-bold">{{ $guest->name }} {{ $guest->surname }}</span>
                    @if ($guest->confirmed == 1)
                        <span class="" style="color: #3c763d">Potwierdzony</span><span> </span>
                @else
                    <span class="" style="color: orangered">Niepotwierdzony</span><span> </span>
                    @endif
                        <br>
                    <hr>
                    @if(\App\Models\Guest::doIHaveRelatives($guest->id) && $guest->child !== 1)
                        Osoby powiązane:<br>
                        @foreach(\App\Models\Guest::myRelativesData($guest->id) as $relatives)
                            <a href="{{ route('guest.profile', ['id' => $relatives->id]) }}">@if($relatives->child == 1) <i class="fas fa-baby"></i> @endif
                                @if( \App\Models\Companion::getNameOfCompanion($guest->id) == $relatives->name . ' ' . $relatives->surname)
                                    <i class="far fa-kiss-wink-heart"></i> @endif
                                {{ $relatives->name }} {{ $relatives->surname }}</a><br>
                        @endforeach
                    @elseif($guest->child == 1)
                        Rodzice:<br>
                        @foreach(\App\Models\Guest::myParentsData($guest->id) as $parent)
                            <a href="{{ route('guest.profile', ['id' => $parent->id]) }}">{{ $parent->name }} {{ $parent->surname }}</a><br>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Informacje</h4>
                    </div>
                    @if ($guest->confirmed == 0)
                        <a href="{{ route('panel.confirm', ['id' => $guest->id]) }}"><button type="button" class="btn btn-outline-success">Potwierdź</button></a>
                            @else
                        <a href="{{ route('panel.del.confirm', ['id' => $guest->id]) }}"><button type="button" class="btn btn-outline-danger">Anuluj potwierdzenie</button></a>
                        @if (\App\Models\Companion::companionExists($guest->id) || \App\Models\Child::doIHaveAChild($guest->id))
                            <a href="{{ route('panel.del.confirm', ['id' => $guest->id, 'with_all' => 1]) }}"><button type="button" class="btn btn-outline-danger">Anuluj potwierdzenie z powiązanymi</button></a><br><br>
                        @endif
                    @endif
                    <button type="button" class="btn btn-outline-danger guest_delete" data-id="{{ $guest->id }}">Usuń</button>
                    <hr>
                    <div class="text-right">
                        <b>Uwagi/Alergie:</b>
                        <br>
                        {{ $guest->allergies }}
                    </div>
                    <hr>
                    <form action="{{ route('guest.data.save', ['id' => $guest->id, 'admin' => '1']) }}" method="GET">
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="{{$guest->name}}" value="{{$guest->name}}" name="name"></div>
                            <div class="col-md-6"><label class="labels">Surname</label><input type="text" class="form-control" value="{{$guest->surname}}" placeholder="{{$guest->surname}}" name="surname"></div>
                        </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Potrzebny HOTEL:</label>
                                    <select class="form-control" style="background-color: white; color: black;" name="hotel" id="hotel">
                                        @if(isset($guest))
                                            @if ($guest->hotel == 1)
                                                <option selected>TAK</option>
                                                <option>NIE</option>
                                            @endif
                                            @if ($guest->hotel == 0)
                                                <option>TAK</option>
                                                <option selected>NIE</option>
                                            @endif
                                        @else
                                            <option>TAK</option>
                                            <option selected>NIE</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Menu Vege::</label>
                                <select class="form-control" style="background-color: white; color: black;" name="vege" id="vege">
                                    @if(isset($guest))
                                        @if ($guest->vege == 1)
                                            <option selected>TAK</option>
                                            <option>NIE</option>
                                        @endif
                                        @if ($guest->vege == 0)
                                            <option>TAK</option>
                                            <option selected>NIE</option>
                                        @endif
                                    @else
                                        <option>TAK</option>
                                        <option selected>NIE</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Dziecko:</label>
                                <select class="form-control" style="background-color: white; color: black;" name="child" id="child">
                                    @if(isset($guest))
                                        @if ($guest->child == 1)
                                            <option value="1" selected>TAK</option>
                                            <option value="0">NIE</option>
                                        @endif
                                        @if ($guest->child == 0)
                                            <option value="1">TAK</option>
                                            <option value="0" selected>NIE</option>
                                        @endif
                                    @else
                                        <option value="1">TAK</option>
                                        <option value="0" selected>NIE</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Transport z:</label>
                            <select class="form-control" style="background-color: white; color: black;" name="transport" id="vege">
                                @if(isset($guest))
                                    @if ($guest->transport == 0)
                                        <option selected>Nie potrzebuję</option>
                                        <option>Brusów</option>
                                        <option>Stalowa Wola</option>
                                    @endif
                                    @if($guest->trans_from == 'Brusów' && $guest->transport !== 0)
                                        <option>Nie potrzebuję</option>
                                        <option selected>Brusów</option>
                                        <option>Stalowa Wola</option>
                                    @endif
                                    @if($guest->trans_from == 'Stalowa Wola' && $guest->transport !== 0)
                                        <option>Nie potrzebuję</option>
                                        <option>Brusów</option>
                                        <option selected>Stalowa Wola</option>
                                    @endif
                                @endif
                                @if(!isset($guest))
                                    <option selected>Nie potrzebuję</option>
                                    <option>Brusów</option>
                                    <option>Stalowa Wola</option>
                                @endif
                            </select>
                            </div>
                        </div>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Zapisz zmiany</button></div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience"><span>Dodatkowe informacje</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                    <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                    <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
                </div>
                Tu w przyszłości będziecie mogli wprowadzic nr stolika, hotel lub informacje o transporcie.
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
@section('javascript')
    $( function()  {
    $('.guest_delete').click( function () {
    Swal.fire({
    title: '{{ __('Napewno chcecie usunąć tę osobe z listy gości?') }}',
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: '{{ __('Tak') }}',
    cancelButtonText: '{{ __('Nie') }}'
    }).then((result) => {
    if (result.value) {
    $.ajax({
    method: "DELETE",
    url: "/panel/delete/guest/" + $(this).data("id")
    })
    .done(function( response ) {
    Swal.fire({
    title: '{{ __('Gość usunięty z listy') }}',
    icon: 'success',
    showCancelButtonText: true,
    confirmButtonText: 'OK'
    }).then((result) => {
    window.location.href = "/panel/";
    })

    })
    .fail(function( response ) {
    Swal.fire('Ups', '{{ __('Something went wrong') }}', 'error');
    });
    }
    })
    });
    });
@endsection
