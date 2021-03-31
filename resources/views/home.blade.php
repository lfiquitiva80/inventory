@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                    <div>
                  <a class="btn btn-warning" data-toggle="modal" href='#modal-id'><i class="fas fa-table"></i> Tabla por Fincas</a>
                  @include('inventory.tablefarm')

                </div>
                <div class="card-header"><h1>Aplicación control de activos Biológicos-Palmeras del llano</h1></div>
          

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">

                      @foreach ($query as $item)

                    

                    	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    		 <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{asset('img/tree.svg')}}" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title"><strong> {{$item->fincadesc}}</strong></h5>
                          <p class="card-text"> Plantas Vivas <span class="badge badge-success">{{round($item->Viva)}}</span>
                          <br> Plantas Muertas <span class="badge badge-danger">{{round($item->Muerta)}}</span><br></p>
                          <a href="{{route('inventory.index')}}" class="btn btn-primary">Ir a inventarios</a>
                        </div>
                      </div>
                    	</div>


                      
                      
                          
                      @endforeach


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@section('js')
<script type="text/javascript">
  
$(document).ready(function() {

   $('#modal-id').modal('show');

});

</script>

@stop

@endsection
