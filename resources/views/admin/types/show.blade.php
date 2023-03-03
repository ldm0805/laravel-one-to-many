@extends('layouts.admin')
@section('content')
    <div class="show">
        <div class="row">
            <div class="col-12">
                <div class="mb-4">
                    <a href="{{route('admin.types.index')}}" class="btnblue">
                        Torna all'elenco
                    </a>
                </div>
                <div class="d-flex justify-content-center gap-2">
                    <h4>Titolo progetto: {{$type->title}}.</h4>
                </div>
            </div>
            <div class="col-12">
                <p>
                    <strong>
                       ID:
                    </strong>
                    {{$type->id}}
                </p>
                <p>
                    <strong>
                        Nome:
                    </strong>
                    {{$type->name}}
                </p>
                <p>
                    <strong>
                        Slug:
                    </strong>
                    {{$type->slug}}
                </p>
            </div>
        </div>
    </div>
@endsection