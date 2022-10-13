{{-- Nome --}}
<div class="row">
    <label class="col-sm-2 col-form-label">{{ __('Nome') }}</label>
    <div>
        <input type="text" id="nome" name="nome" value="{{ isset($jogador) ? $jogador->nome : old('nome') }}"
               class="form-control @error('nome') is-invalid @enderror" placeholder="Nome" required>
        @if ($errors->has('nome'))
            <span id="email-error" class="error text-danger"
                  for="nome">{{ $errors->first('nome') }}</span>
        @endif
    </div>
</div>

{{-- Idade --}}
<div class="row">
    <label class="col-sm-2 col-form-label">{{ __('Idade') }}</label>
    <div>
        <input id="idade" name="idade" class="form-control @error('idade') is-invalid @enderror"
                  placeholder="Digite a idade"
                    value="{{ isset($jogador) ? $jogador->idade : old('idade') }}"
                  required></input>
        @if ($errors->has('idade'))
            <span id="email-error" class="error text-danger"
                  for="idade">{{ $errors->first('idade') }}</span>
        @endif
    </div>
</div>

{{-- Nacionalidade --}}
<div class="row">
    <label class="col-sm-2 col-form-label">{{ __('Nacionalidade') }}</label>
    <div>
        <select id="nacionalidade_id" name="nacionalidade_id" class="form-control @error('nacionalidade_id') is-invalid @enderror"
                required>
            <option value="">--- Selecione uma Nacionalidade ---</option>
            @isset($nacionalidades)
                @foreach ($nacionalidades as $nacionalidade)
                    <option @if (isset($jogador) && $jogador->nacionalidade_id == $nacionalidade->id) selected @endif value="{{ $nacionalidade->id }}">
                        {{ $nacionalidade->nome }}
                    </option>
                @endforeach
            @endisset
        </select>
        @error('nacionalidade_id')
        <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


{{-- Imagem --}}
<div class="row">
    <div class="col-sm-2 col-form-label">
        <label class="@if (!isset($jogador)) required @endif" for="image">Imagens</label>
        <input type="file" name="imagem" class="form-control" accept="image/*"
               @if (!isset($jogador)) required @endif>
    </div>
</div>

