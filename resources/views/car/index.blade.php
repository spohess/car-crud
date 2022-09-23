@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Cadastro') }}</div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif

            <form method="post" action="{{ route('car.create') }}">
              {{ csrf_field() }}

              <div class="row">
                <div class="col-6">
                  <div class="mb-3">
                    <label for="brand" class="form-label">Marca</label>
                    <input type="text"
                           id="brand"
                           name="brand"
                           class="form-control @error('brand') is-invalid @enderror"
                           value="{{ old('brand') }}"
                           max="128"
                           required
                           autofocus>
                    @error('brand')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="model" class="form-label">Modelo</label>
                    <input type="text"
                           id="model"
                           name="model"
                           class="form-control @error('model') is-invalid @enderror"
                           value="{{ old('model') }}"
                           max="128"
                           required>
                    @error('model')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="plate" class="form-label">Placa</label>
                    <input type="text"
                           id="plate"
                           name="plate"
                           class="form-control @error('plate') is-invalid @enderror"
                           value="{{ old('plate') }}"
                           max="32"
                           required>
                    @error('plate')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                  </div>
                </div>
                <div class="col-6">
                  <div class="mb-3">
                    <label for="year" class="form-label">Ano</label>
                    <input type="number"
                           id="year"
                           name="year"
                           class="form-control @error('year') is-invalid @enderror"
                           value="{{ old('year') }}"
                           min="1886"
                           max="2886"
                           required
                           autofocus>
                    @error('year')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label for="manufactured" class="form-label">Fabricação</label>
                    <input type="text"
                           id="manufactured"
                           name="manufactured"
                           class="form-control @error('manufactured') is-invalid @enderror"
                           value="{{ old('manufactured') }}"
                           min="1886"
                           max="2886"
                           required
                           autofocus>
                    @error('manufactured')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                  </div>
                </div>
                <div class="col-12 pt-3">
                  <button type="submit" class="btn btn-primary">Criar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="row justify-content-center mt-5">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Carros') }}</div>

          <div class="card-body">

            <table class="table">
              <thead>
              <tr>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Ano</th>
                <th>Fabricação</th>
                <th>Placa</th>
                <th>Ações</th>
              </tr>
              </thead>
              <tbody>
              @foreach($carCollect->all() as $car)
                <tr>
                  <td>{{ $car->brand }}</td>
                  <td>{{ $car->model }}</td>
                  <td>{{ $car->year }}</td>
                  <td>{{ $car->manufactured }}</td>
                  <td>{{ $car->plate }}</td>
                  <td>
                    <a href="{{ route('car.edit', $car->getKey()) }}">Editar</a>
                    <a href="{{ route('car.confirmation', $car->getKey()) }}">Excluir</a>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection