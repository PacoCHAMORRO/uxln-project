@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-sm-12">
    <!-- DATA TABLE -->
    <div class="d-flex flex-row align-items-center m-b-55">
      <div>
        <img src="{{ url('theme/images/icon/collabs-icon.png') }}" alt="">
      </div>
      <h2 class="add-item admin-title pl-3">Colaboraciones con Casas Hogar</h2>
      <div class="ml-auto">
        <button class="au-btn au-btn-icon au-btn--blue au-btn--small add-item-btn" data-toggle="modal" data-target="#addModal">
          <i class="zmdi zmdi-plus"></i>Agregar Colaboración
        </button>
      </div>
    </div>
    <div class="table-responsive table-responsive-data2">
      <table id="datatable" class="table table-data2">
        <thead>
          <tr>
            <th>institución</th>
            <th>título</th>
            <th>categoría</th>
            <th>fecha</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($collabs as $collab)
          <tr class="tr-shadow">
            <td class="desc">{{ $collab->institution->name }}</td>
            <td>
              {{ $collab->title }}
            </td>
            <td>
              {{ $collab->category }}
            </td>
            <td>
              {{ $collab->date }}
            </td>
            <td>
              <div class="table-data-feature">
                <button class="item edit" data-placement="top" title="Editar" value="{{ $collab->id }}"
                  data-toggle="modal" data-target="#editModal">
                  <i class="zmdi zmdi-edit"></i>
                </button>
                <button class="item delete" data-toggle="modal" value="{{ $collab->id }}" data-target="#deleteModal" data-placement="top" title="Eliminar">
                  <i class="zmdi zmdi-delete"></i>
                </button>
              </div>
            </td>
          </tr>
          {{-- <tr class="spacer"></tr> --}}
           @endforeach
        </tbody>
      </table>
    </div>
    <!-- END DATA TABLE -->
  </div>
</div>
@endsection

@section('modals')

{{-- START ADD MODAL --}}
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="largeModalLabel">Agregar Colaboración</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="{{ action('CollabController@store') }}" method="POST" id="addForm"
        enctype="multipart/form-data" class="form-horizontal">
        @csrf
        <div class="modal-body">
          {{-- ADD FORM --}}
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="category" class=" form-control-label">Institución</label>
            </div>
            <div class="col-12 col-md-9">
              <select name="institution_id">
                @foreach ($institutions as $institution)
                    <option value="{{ $institution->id }}">{{ $institution->name }}</option>
                @endforeach
              </select>
              <small class="form-text text-muted">Nombre de la institución</small>
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="title" class=" form-control-label">Categoría</label>
            </div>
            <div class="col-12 col-md-9">
              <select name="category">
                <option value="Salud">Salud</option>
                <option value="Educación">Educación</option>
                <option value="Desarrollo Social">Desarrollo Social</option>
                <option value="Recreación">Recreación</option>
              </select>
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="title" class=" form-control-label">Título</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="text" name="title" placeholder="Título" class="form-control">
              <small class="help-block form-text">Título del evento/colaboración</small>
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="date" class=" form-control-label">Fecha</label>
            </div>
            <div class="col-12 col-md-9">
              <input class="form-control" type="date" name="date">
            </div>
          </div>
          {{-- END ADD FORM --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- END ADD MODAL --}}



{{-- START EDIT MODAL --}}
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="largeModalLabel">Editar Colaboración</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>

      <form action="/admin/institutions/" method="POST" id="editForm" enctype="multipart/form-data"
        class="form-horizontal">
        @csrf
        @method('PATCH')
        <div class="modal-body">
          {{-- EDIT FORM --}}
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="category" class=" form-control-label">Institución</label>
            </div>
            <div class="col-12 col-md-9">
              <select name="institution_id">
                @foreach ($institutions as $institution)
                    <option value="{{ $institution->id }}">{{ $institution->name }}</option>
                @endforeach
              </select>
              <small class="form-text text-muted">Nombre de la institución</small>
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="title" class=" form-control-label">Categoría</label>
            </div>
            <div class="col-12 col-md-9">
              <select name="category">
                <option value="Salud">Salud</option>
                <option value="Educación">Educación</option>
                <option value="Desarrollo Social">Desarrollo Social</option>
                <option value="Recreación">Recreación</option>
              </select>
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="title" class=" form-control-label">Título</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="text" name="title" placeholder="Título" class="form-control">
              <small class="help-block form-text">Título del evento/colaboración</small>
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="date" class=" form-control-label">Fecha</label>
            </div>
            <div class="col-12 col-md-9">
              <input class="form-control" type="date" name="date">
            </div>
          </div>
          {{-- END EDIT FORM --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- END EDIT MODAL --}}



{{-- START DELETE MODAL --}}
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="largeModalLabel">Eliminar Colaboración</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>

      <form action="/admin/collabs/" method="POST" id="deleteForm" enctype="multipart/form-data"
        class="form-horizontal">
        @csrf
        @method('DELETE')
        <div class="modal-body">
          {{-- DELETE FORM --}}
          <p>Seguro que sedea eliminar esto?</p>

          {{-- END EDIT FORM --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Sí</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- END EDIT MODAL --}}

@endsection

@section('script')
<script type="text/javascript">

  $.extend(true, $.fn.dataTable.defaults, {
    "language": {
      "decimal": ",",
      "thousands": ".",
      "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
      "infoPostFix": "",
      "infoFiltered": "(filtrado de un total de _MAX_ registros)",
      "loadingRecords": "Cargando...",
      "lengthMenu": "Mostrar _MENU_ registros",
      "paginate": {
        "first": "Primero",
        "last": "Último",
        "next": "Siguiente",
        "previous": "Anterior"
      },
      "processing": "Procesando...",
      "search": "Buscar:",
      "searchPlaceholder": "Término de búsqueda",
      "zeroRecords": "No se encontraron resultados",
      "emptyTable": "Ningún dato disponible en esta tabla",
      "aria": {
        "sortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sortDescending": ": Activar para ordenar la columna de manera descendente"
      },
      //only works for built-in buttons, not for custom buttons
      "buttons": {
        "create": "Nuevo",
        "edit": "Cambiar",
        "remove": "Borrar",
        "copy": "Copiar",
        "csv": "fichero CSV",
        "excel": "tabla Excel",
        "pdf": "documento PDF",
        "print": "Imprimir",
        "colvis": "Visibilidad columnas",
        "collection": "Colección",
        "upload": "Seleccione fichero...."
      },
      "select": {
        "rows": {
          _: '%d filas seleccionadas',
          0: 'clic fila para seleccionar',
          1: 'una fila seleccionada'
        }
      }
    }
  });


  $(document).ready(function () {

    var table = $('#datatable').DataTable();
    console.log(table)

    console.log("sale de tabla");

    // Start Edit record
    $('#datatable').on('click', '.edit', function () {
      $id_collab = $(this).val();
      $('#editForm').attr('action', '/admin/collabs/' + $id_collab);
    });

    // Start Delete Record
    $('#datatable').on('click', '.delete', function () {

      $id_collab = $(this).val();

      $('#deleteForm').attr('action', '/admin/collabs/' + $id_collab);

      });
  });

</script>

@endsection