@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Quer mesmo remover?') }} <a href="{{ route('car.index') }}">Cancelar</a></div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif

            <form method="post" action="{{ route('car.remove', $car->getKey()) }}">
              {{ csrf_field() }}

              <div class="row">
                <div class="col-6">
                  <div class="mb-3">
                    <label for="brand" class="form-label">Marca</label>
                    <input type="text"
                           id="brand"
                           name="brand"
                           class="form-control"
                           value="{{ $car->brand }}"
                           readonly>
                  </div>
                  <div class="mb-3">
                    <label for="model" class="form-label">Modelo</label>
                    <input type="text"
                           id="model"
                           name="model"
                           class="form-control"
                           value="{{ $car->model }}"
                           readonly>
                  </div>
                  <div class="mb-3">
                    <label for="plate" class="form-label">Placa</label>
                    <input type="text"
                           id="plate"
                           name="plate"
                           class="form-control"
                           value="{{ $car->plate }}"
                           readonly>
                  </div>
                </div>
                <div class="col-6">
                  <div class="mb-3">
                    <label for="year" class="form-label">Ano</label>
                    <input type="number"
                           id="year"
                           name="year"
                           class="form-control"
                           value="{{ $car->year }}"
                           readonly>
                  </div>

                  <div class="mb-3">
                    <label for="manufactured" class="form-label">Fabricação</label>
                    <input type="text"
                           id="manufactured"
                           name="manufactured"
                           class="form-control"
                           value="{{ $car->manufactured }}"
                           readonly>
                  </div>
                </div>
                <div class="col-12 pt-3">
                  <button type="submit" class="btn btn-danger">Remover</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection