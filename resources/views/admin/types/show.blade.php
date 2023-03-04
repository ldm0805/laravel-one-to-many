@extends('layouts.admin')
@inject('utils', 'App\Utils\Utils')

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
                    {{-- <h4>Titolo progetto: {{$type->title}}.</h4> --}}
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
            <h2 class="text-center">Progetti sviluppati con: {{$type->name}}</h2>
            <div id="index">
                @forelse ($type->project as $item)
                <section class="card">
                    <article class="containerDescriptionCard">
                        <p class="titleCard text-dark" >Progetto:</p>
                        <p class="titleCard text-dark">{{$item->title}}</p>
                        <p class="tecnologiesCard">Data: {{ $utils->changeDate($item->date_project) }}</p>
                        <p class="tecnologiesCard">{{$item->slug}}</p>
                        <p class="tecnologiesCard">Tipo: {{$item->type ? $item->type->name : 'Mancante'}}</p>
                        <p class="descriptionCard">Contenuto: {{$item->content}}</p>
                        <a class="btn btn-sm btn-square btn-primary" href="{{route('admin.projects.show', $item->slug)}}" title="Visualizza project"><i class="fas fa-eye"></i></a>
                        <a class="btn btn-sm btn-square btn-warning" href="{{route('admin.projects.edit', $item->slug)}}" title="Modifica project"><i class="fas fa-edit"></i></a>
                    </article>
                    <div class="d-flex justify-content-end m-3">
                        <form class="d-inline-block" action="{{route('admin.projects.destroy', $item->slug)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm btn-square confirm-delete-button" type="submit" title="Cancella project">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </section>
                @empty
                    
                @endforelse
      

            </div>
        </div>
    </div>
@endsection