@extends('app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tableau de bord') }}</div>
                <div class="card-body">
                <form action="{{route('newpassword.update', auth()->id())}}" method="POST" enctype="multipart/form-data" class="mt-5 mb-4">
                @csrf
                @method('PATCH')
    
                <!-- Ancien mot de passe -->
                <div class="mb-3">
                    <label class="form-label"><p class="mt-3 mb-0">Ancien mot de passe</p></label>
                    <input type="password" placeholder="Ancien mot de passe" class="form-control" name="old-password" required autofocus>
                        @if($errors->has('old-password'))
                        <span class="text-danger">{{$errors->first('old-password')}}</span>
                        @endif
                </div>
    
                <!-- Nouveau mot de passe -->
                <div class="mb-3">
                    <label class="form-label"><p class="mt-3 mb-0">Nouveau mot de passe</p></label>
                    <input type="password" placeholder="Nouveau mot de passe" class="form-control" name="new-password" required autofocus>
                    @if($errors->has('new-password'))
                    <span class="text-danger">{{$errors->first('new-password')}}</span>
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
