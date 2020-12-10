@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">Usuarios</h3>
        <div class="table-data__tool">
            <div class="table-data__tool-right">
                <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal"
                    data-target="#addModal">
                    <i class="zmdi zmdi-plus"></i>Agregar Usuario</button>
                <button class="btn btn-danger">
                    <i class="fa-trahs-o"></i>Eliminar</button>
            </div>
        </div>
        <div class="table-responsive table-responsive-data2">
            <table id="datatable" class="table table-data2">
                <thead>
                    <tr>
                        <th>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </th>
                        <th>nombre</th>
                        <th>email</th>
                        <th>admin</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="tr-shadow">
                        <td>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </td>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->admin)

                            @endif
                            @if ($user->admin)
                            <span class="success">Admin</span>
                            @else
                            <span class="primary">User</span>
                            @endif
                        </td>
                        <td>
                            <div class="table-data-feature">
                                <button class="item edit" data-placement="top" title="Editar" value="{{ $user->id }}"
                                    data-toggle="modal" data-target="#editModal" disabled>
                                    <i class="zmdi zmdi-edit"></i>
                                </button>
                                <button class="item delete" data-toggle="modal" value="{{ $user->id }}"
                                    data-target="#deleteModal" data-placement="top" title="Eliminar">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>
                                <button class="item" data-toggle="tooltip" data-placement="top" title="Más">
                                    <i class="zmdi zmdi-more"></i>
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
                <h5 class="modal-title" id="largeModalLabel">Agregar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ action('UserController@store') }}" method="POST" id="addForm" enctype="multipart/form-data"
                class="form-horizontal">
                @csrf
                <div class="modal-body">
                    {{-- ADD FORM --}}
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Nombre</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="name" placeholder="Nombre" class="form-control">
                            <small class="form-text text-muted">Nombre del usuario</small>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="email" class=" form-control-label">email</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="email" name="email" placeholder="email@email.com" class="form-control">
                            <small class="help-block form-text">Introduzca el email de el usuario</small>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="password" class="col-md-3 col-form-label">Contraseña</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="password-confirm" class="col-md-3">Confirmar Contraseña</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">

                        </div>
                        <div class="col-12 col-md-9">
                            <div class="form-check">
                                <div class="checkbox">
                                    <label for="admin" class="form-check-label">
                                        <input type="checkbox" name=admin class="form-check-input">
                                        Admin
                                    </label>
                                </div>
                            </div>

                            <small class="help-block form-text">Marque la casilla si desea que el usuario tenga permisos
                                de administrador</small>
                        </div>
                    </div>
                    {{-- END ADD FORM --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
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
                <h5 class="modal-title" id="largeModalLabel">Editar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form action="/admin/users" method="POST" id="editForm" enctype="multipart/form-data"
                class="form-horizontal">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    {{-- EDIT FORM --}}
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Nombre</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="name" placeholder="Nombre" class="form-control">
                            <small class="form-text text-muted">Nombre del usuario</small>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="email" class=" form-control-label">email</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="email" name="email" placeholder="email@email.com" class="form-control">
                            <small class="help-block form-text">Introduzca el email de el usuario</small>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">

                        </div>
                        <div class="col-12 col-md-9">
                            <div class="form-check">
                                <div class="checkbox">
                                    <label for="admin" class="form-check-label">
                                        <input type="checkbox" name=admin class="form-check-input">
                                        Admin
                                    </label>
                                </div>
                            </div>

                            <small class="help-block form-text">Marque la casilla si desea que el usuario tenga permisos
                                de administrador</small>
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
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Eliminar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form action="/admin/users/" method="POST" id="deleteForm" enctype="multipart/form-data"
                class="form-horizontal">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    {{-- DELETE FORM --}}
                    <p>Seguro que sedea eliminar esto?</p>
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
    // Start Edit record
    $('#datatable').on('click', '.edit', function () {

      $id_user = $(this).val();
      $('#editForm').attr('action', '/admin/users/' + $id_user);

    });

    // Start Delete Record
    $('#datatable').on('click', '.delete', function () {

      $id_user = $(this).val();
      console.log($id_user);

      $('#deleteForm').attr('action', '/admin/users/' + $id_user);

      });
  });

</script>

@endsection