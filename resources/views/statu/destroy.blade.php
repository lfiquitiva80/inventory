{!! Form::open(['route' => ['statu.destroy', $row->id],'method'=>'DELETE']) !!}


<button  onclick="return confirm('Esta seguro de Eliminar el statu')"><i class="fa fa-trash" aria-hidden="true"></i> </button>
{!! Form::close() !!}