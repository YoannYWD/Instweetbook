@extends('app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tableau de bord') }}</div>
                <div class="card-body">
                <form action="{{route('user.update', auth()->id())}}" method="POST" enctype="multipart/form-data" class="mt-5 mb-4">
                @csrf
                @method('PATCH')
                <!-- avatar -->
                <div class="mb-2">
                    <label class="form-label me-5"><p class="mt-3 mb-0">Ta photo</p></label>
                    <img src="" alt="" class="rounded-circle">
                </div>
                <div class="mb-3">
                    <input class="form-control" type="file" name="image">
                </div> 
    
                <!-- nom -->
                <div class="mb-3">
                    <label class="form-label"><p class="mt-3 mb-0">Ton nom</p></label>
                    <input type="text" placeholder="Nom" class="form-control" name="lastname" value="{{$user->lastname}}" required autofocus>
                        @if($errors->has('lastname'))
                        <span class="text-danger">{{$errors->first('lastname')}}</span>
                        @endif
                </div>
    
                <!-- prénom -->
                <div class="mb-3">
                    <label class="form-label"><p class="mt-3 mb-0">Ton prénom</p></label>
                    <input type="text" placeholder="Nom" class="form-control" name="firstname" value="{{$user->firstname}}" required autofocus>
                    @if($errors->has('firstname'))
                    <span class="text-danger">{{$errors->first('firstname')}}</span>
                    @endif
                </div>
    
                <!-- pseudo -->
                <div class="mb-3">
                    <label class="form-label"><p class="mt-3 mb-0">Ton pseudo</p></label>
                    <input type="text" placeholder="Nom" class="form-control" name="nickname" value="{{$user->nickname}}" required autofocus>
                    @if($errors->has('nickname'))
                    <span class="text-danger">{{$errors->first('nickname')}}</span>
                    @endif
                </div>
    
    
                <!-- email -->
                <div class="mb-3">
                    <label class="form-label"><p class="mt-3 mb-0">Ton email</p></label>
                    <input type="text" placeholder="Nom" class="form-control" name="email" value="{{$user->email}}" required autofocus>
                    @if($errors->has('email'))
                    <span class="text-danger">{{$errors->first('email')}}</span>
                    @endif
                </div>

    
                <div class="d-grid mt-5 mx-auto">
                    <button type="submit" class="btn btnGreenBgBlue"><p class="mb-0">Enregistrer les modifications</p></button>
                </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
