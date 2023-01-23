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
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Informacje</h4>
                    </div>
                    @if ($guest->confirmed == 0)
                        <a href="{{ route('panel.confirm', ['id' => $guest->id]) }}" methods="GET"><button type="button" class="btn btn-outline-success">Potwierdź</button></a>
                            @else
                        <a href="{{ route('panel.del.confirm', ['id' => $guest->id]) }}" methods="GET"><button type="button" class="btn btn-outline-danger">Anuluj potwierdzenie</button></a>
                    @endif
                    <hr>
                    <div class="text-right">
                        <b>Uwagi/Alergie:</b>
                        <br>
                        {{ $guest->allergies }}
                    </div>
                    <hr>
                    <form action="{{ route('guest.data.save', ['id' => $guest->id, 'admin' => '1']) }}" method="POST">
                        @csrf
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="{{$guest->name}}" value="{{$guest->name}}" name="name"></div>
                            <div class="col-md-6"><label class="labels">Surname</label><input type="text" class="form-control" value="{{$guest->surname}}" placeholder="{{$guest->surname}}" name="surname"></div>
                        </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Potrzebny HOTEL:</label>
                                    <select class="form-control" style="background-color: white; color: black;" name="hotel" id="hotel">
                                        @if ($guest->hotel == 1)
                                            <option selected><b>Tak</b></option>
                                            <option>Nie</option>
                                        @elseif ($guest->hotel == 0)
                                            <option>Tak</option>
                                            <option selected>Nie</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Menu Vege::</label>
                                <select class="form-control" style="background-color: white; color: black;" name="vege" id="vege">
                                    @if ($guest->vege == 1)
                                        <option selected><b>Tak</b></option>
                                        <option>Nie</option>
                                    @elseif ($guest->vege == 0)
                                        <option>Tak</option>
                                        <option selected>Nie</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Transport z:</label>
                            <select class="form-control" style="background-color: white; color: black;" name="transport" id="vege">
                                @if ($guest->transport == 0 && $guest->trans_from == NULL)
                                    <option selected><b>Nie potrzebuje</b></option>
                                    <option>Ryki</option>
                                    <option>Stalowa Wola</option>
                                @endif
                                @if ($guest->transport != 0 && $guest->trans_from == 'Ryki')
                                    <option>Tak</option>
                                    <option selected>Ryki</option>
                                    <option>Stalowa Wola</option>
                                @endif
                                @if($guest->transport != 0 && $guest->trans_from == 'Stalowa Wola')
                                        <option>Tak</option>
                                        <option>Ryki</option>
                                        <option selected>Stalowa Wola</option>
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
