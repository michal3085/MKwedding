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
                    <button type="button" class="btn btn-outline-success">Potwierdź</button>
                    <button type="button" class="btn btn-outline-danger">Anuluj potwierdzenie</button>
                    <form action="{{ route('guest.data.save', ['id' => $guest->id]) }}">
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="{{$guest->name}}" value="{{$guest->name}}"></div>
                        <div class="col-md-6"><label class="labels">Surname</label><input type="text" class="form-control" value="{{$guest->surname}}" placeholder="{{$guest->surname}}"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="enter phone number" value=""></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Nocleg</label><input type="text" class="form-control" placeholder="country" value=""></div>
                        <div class="col-md-6"><label class="labels">Vege</label><input type="text" class="form-control" value="" placeholder="state"></div>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience"><span>Dodatkowe informacje</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                    <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                    <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
