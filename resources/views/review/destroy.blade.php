{!! Form::open(['route' => ['review.destroy', $row->id],'method'=>'DELETE']) !!}


<button  onclick="return confirm('Esta seguro de Eliminar el review')"><i class="fa fa-trash" aria-hidden="true"></i> </button>
{!! Form::close() !!}