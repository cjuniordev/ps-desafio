{{-- Nome --}}
<div class="row">
    <label class="col-sm-2 col-form-label">{{ __('Nome da Nacionalidade') }}</label>
    <div>
        <input type="text" id="nome" name="nome" value="{{ isset($nacionalidade) ? $nacionalidade->nome : old('nome') }}"
               class="form-control @error('nome') is-invalid @enderror" placeholder="Nome da nacionalidade" required>
        @if ($errors->has('nome'))
            <span id="email-error" class="error text-danger"
                  for="nome">{{ $errors->first('nome') }}</span>
        @endif
    </div>
</div>

{{-- Sigla --}}
<div class="row">
    <label class="col-sm-2 col-form-label">{{ __('Sigla') }}</label>
    <div>
        <input id="sigla" name="sigla" class="form-control @error('sigla') is-invalid @enderror"
                  placeholder="Digite a sigla da nacionalidade"
                    value="{{ isset($nacionalidade) ? $nacionalidade->sigla : old('sigla') }}"
                  required></input>
        @if ($errors->has('sigla'))
            <span id="email-error" class="error text-danger"
                  for="sigla">{{ $errors->first('sigla') }}</span>
        @endif
    </div>
</div>
