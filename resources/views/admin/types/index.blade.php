@extends('layouts.admin')
@inject('utils', 'App\Utils\Utils')
@section('content')
<div class="container-fluid">
    <div class="text-center text-white mt-4">
        <h1 class="mb-4">Benvenuto nelle tue categorie!</h1>
    </div>
    <div>
        <a href="{{route('admin.types.create')}}" class="btnblue">
            <i class="fa-solid fa-plus-square fa-fw fa-lg mr-2"></i>
            Aggiungi un nuovo type
        </a>
        <div class="mt-3">
            @if(session('message'))
            <div class="alert alert-primary">
                {{session('message')}}
            </div>
            @endif
        </div>
    </div>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark text-white">
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Slug</th>
            <th>Azioni</th>
          </tr>
        </thead>
    @foreach ($types as $type)
        <tbody>
          <tr>
            <td class="text-white">{{$type->id}}</td>
            <td class="text-white">{{$type->name}}</td>
            <td class="text-white">{{$type->slug}}</td>
            <td class="text-white"> 
                <a class="btn btn-sm btn-square btn-primary" href="{{route('admin.types.show', $type->slug)}}" title="Visualizza type"><i class="fas fa-eye"></i></a>
                <a class="btn btn-sm btn-square btn-warning" href="{{route('admin.types.edit', $type->slug)}}" title="Modifica type"><i class="fas fa-edit"></i></a>
                <form class="d-inline-block" action="{{route('admin.types.destroy', $type->slug)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm btn-square confirm-delete-button" type="submit" title="Cancella">
                    <i class="fas fa-trash"></i>
                </button>
            </form></td>
          </tr>
        </tbody>
        @endforeach
    </table>
    {{-- <div id="index">
        @forelse($projects as $project)
        <section class="card">
            <article class="containerImagenCard">
                <img src="https://cdn.pixabay.com/photo/2018/02/07/14/27/pension-3137209_640.jpg" alt="">
            </article>
            <article class="containerDescriptionCard">
                <p class="titleCard">Progetto:</p>
                <p class="titleCard">{{$project->title}}</p>
                <p class="tecnologiesCard">Data: {{ $utils->changeDate($project->date_project) }}</p>
                <p class="tecnologiesCard">{{$project->slug}}</p>
                <p class="descriptionCard">Contenuto: {{$project->content}}</p>
                <a class="btn btn-sm btn-square btn-primary" href="{{route('admin.projects.show', $project->slug)}}" title="Visualizza project"><i class="fas fa-eye"></i></a>
                <a class="btn btn-sm btn-square btn-warning" href="{{route('admin.projects.edit', $project->slug)}}" title="Modifica project"><i class="fas fa-edit"></i></a>
            </article>
            <div class="d-flex justify-content-end m-3">
                <form class="d-inline-block" action="{{route('admin.projects.destroy', $project->slug)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger bnt-sm btn-square confirm-delete-button" type="submit" title="Cancella project">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </div>
        </section>
        @empty
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-lg-8 col-md-10 col-sm-12">
                    <div class="alert alert-primary text-center" role="alert">
                        <h4 class="alert-heading mb-4">Il database dei tuoi project è vuoto</h4>
                        <p class="lead">Clicca sul pulsante "Aggiungi Project" per aggiungerli.</p>
                    </div>
                </div>
            </div>
        </div>
        @endforelse
    </div> --}}
    @include ('admin.partials.modals')
</div>
    @endsection