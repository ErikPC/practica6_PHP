<form method="POST" action="{{ route('formulario.store') }}">
    @csrf
    <div class="form-group">
        <label for="title">{{ __("post.titulo") }}</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Ingresa el título de la publicación" value="{{ old('title') }}">
        @error('title')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="extract">{{__("post.extracto")}}</label>
        <textarea class="form-control @error('extract') is-invalid @enderror" name="extract" rows="3">{{ old('extract') }}</textarea>
        @error('extract')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="content">{{__("post.contenido")}}</label>
        <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="6">{{ old('content') }}</textarea>
        @error('content')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="access" value="true" checked="{{ old('access')}}">
        <label class="form-check-label" for="access">{{__("post.acceso")}}</label>
    </div>
    <button type="submit" class="btn btn-primary">{{__("post.publicar")}}</button>
</form>