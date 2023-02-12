@extends('admin.app')

@section('content')
    <div class="card-body">
        <div class="row">
            <form action="{{ route('bride.data.save') }}" class="form-inline" method="POST">
                @csrf
                <div class="col-md-4 col-sm-4" style="float: left">
                    <div class="form-group">
                        <label for="name" class="sr-only">Pan Młody:</label>
                        <input class="form-control" autofocus="autofocus" id="groom" name="groom" placeholder="@if(isset($data)) {{ $data->groom }} @endif"
                               required><br>
                    </div>
                    <br>
                </div>
                <div class="col-md-4 col-sm-4" style="float: left">
                    <div class="form-group">
                        <label for="surname" class="sr-only">Panna Młoda</label>
                        <input class="form-control" id="bride" name="bride"
                               placeholder="@if(isset($data)) {{ $data->bride }} @endif" required><br>
                    </div>
                    <br>
                </div>
                <div class="col-md-4 col-sm-4" style="float: left">
                    <div class="form-group">
                        <label for="surname" class="sr-only">Panna Młoda po ceremonii:</label>
                        <input class="form-control" id="bride_after" name="bride_after"
                               placeholder="@if(isset($data)) {{ $data->bride_after }} @endif" required><br>
                    </div>
                    <br>
                </div>
                <div class="col-md-4 col-sm-4" style="float: left">
                    <div class="form-group">
                        <label for="surname" class="sr-only">Panna Młoda z:</label>
                        <input class="form-control" id="bride_from" name="bride_from"
                               placeholder="@if(isset($data)) {{ $data->bride_from }} @endif" required><br>
                    </div>
                    <br>
                </div>
                <div class="col-md-4 col-sm-4" style="float: left">
                    <div class="form-group">
                        <label for="surname" class="sr-only">Pan Młody z:</label>
                        <input class="form-control" id="groom_from" name="groom_from"
                               placeholder="@if(isset($data)) {{ $data->groom_from }} @endif" required><br>
                    </div>
                    <br>
                </div>
                <div class="col-md-4 col-sm-4" style="float: left">
                    <div class="form-group">
                        <label for="surname" class="sr-only">Telefon do Panny Młodej:</label>
                        <input class="form-control" id="bride_phone" name="bride_phone"
                               placeholder="@if(isset($data)) {{ $data->bride_phone }} @endif" required><br>
                    </div>
                    <br>
                </div>
                <div class="col-md-4 col-sm-4" style="float: left">
                    <div class="form-group">
                        <label for="surname" class="sr-only">Telefon do Pana Młodego:</label>
                        <input class="form-control" id="groom_phone" name="groom_phone"
                               placeholder="@if(isset($data)) {{ $data->groom_phone }} @endif" required><br>
                    </div>
                    <br>
                </div>
                <div class="col-md-4 col-sm-4">
                    <button type="submit"
                            class="btn btn-primary btn-lg text-white mb-0 me-0"><i
                            class="mdi mdi-account-plus"></i>Dodaj gościa
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
