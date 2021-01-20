{!! Form::open(['route' => ['inventory.destroy', $row->id],'method'=>'DELETE']) !!}


<button  onclick="return confirm('Esta seguro de Eliminar el inventory')"><i class="fa fa-trash" aria-hidden="true"></i> </button>
{!! Form::close() !!}