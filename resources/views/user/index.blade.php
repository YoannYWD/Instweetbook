@extends('app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tableau de bord') }}</div>
                <div class="card-body">

                <!-- avatar -->
                <div class="mb-2">
                    <label class="form-label me-5"><p class="mt-3 mb-0">Ta photo</p></label>
                    <img src="" alt="" class="rounded-circle">
                </div>
    
                <!-- nom -->
                <div class="mb-3">
                    <label class="form-label"><p class="mt-3 mb-0">Ton nom :</p></label>
                    {{$user->lastname}}
                </div>
    
                <!-- prénom -->
                <div class="mb-3">
                    <label class="form-label"><p class="mt-3 mb-0">Ton prénom :</p></label>
                    {{$user->firstname}}
                </div>
    
                <!-- pseudo -->
                <div class="mb-3">
                    <label class="form-label"><p class="mt-3 mb-0">Ton pseudo :</p></label>
                    {{$user->nickname}}
                </div>
    
    
                <!-- email -->
                <div class="mb-3">
                    <label class="form-label"><p class="mt-3 mb-0">Ton email :</p></label>
                    {{$user->email}}
                </div>

                </div>
            </div>
        </div>
    </div>

    <form action="{{route('user.edit', auth()->id())}}" method="GET" enctype="multipart/form-data" class="mt-5 mb-4">
        <button type="submit" class="btn btnGreenBgBlue"><p class="mb-0">Modifier mes informations</p></button>
    </form>

    <form action="{{route('newpassword.edit', auth()->id())}}" method="GET" enctype="multipart/form-data" class="mt-5 mb-4">
        <button type="submit" class="btn btnGreenBgBlue"><p class="mb-0">Modifier mon mot de passe</p></button>
    </form>

    <form action="{{route('user.destroy', auth()->id())}}" method="POST" enctype="multipart/form-data" class="mt-5 mb-4">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btnGreenBgBlue"><p class="mb-0">Supprimer mon profil</p></button>
    </form>
</div>
@endsection
