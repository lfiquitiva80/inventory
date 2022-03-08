@extends('adminlte::page')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                    <div>
                      <br> 
                  {{-- &nbsp;&nbsp;&nbsp;<a class="btn btn-outline-primary col-lg-offset-2" data-toggle="modal" href='#modal-id'><i class="fas fa-table"></i> Tabla por Fincas</a>
                  @include('inventory.tablefarm') --}}
                  <hr>

                </div>
                <div class="card-header"><h1>Aplicación control de Inventarios Propios y Terceros</h1></div>
          

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">

                      
                      Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquid eveniet molestias quibusdam! Fugit quam voluptatum sint illo, maxime doloribus dolores delectus laudantium reiciendis aut obcaecati cumque, itaque maiores aliquam iusto?
                      

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@section('js')
<script type="text/javascript">
  



</script>

@stop

@endsection
