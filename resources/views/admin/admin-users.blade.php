@extends('layouts.app')
@section('content')
<div class="col-sm-12">
    <!-- DATA TABLE -->
    <div class="d-flex flex-row align-items-center m-b-55">
        <div>
            <img src="{{ url('theme/images/icon/admin-users-icon.png') }}" alt="">
        </div>
        <h2 class="add-item admin-title pl-3">Usuarios</h2>
        <div class="ml-auto">

            <a href="/admin/users-approval" class="au-btn au-btn-icon au-btn--blue au-btn--small add-item-btn">
                <i class="zmdi zmdi-plus"></i>Aprobar Usuario
            </a>

        </div>
    </div>
    <div class="table-responsive table-responsive-data2">
        <table id="datatable" class="table table-data2">
            <thead>
                <tr>
                    <th>nombre</th>
                    <th>email</th>
                    <th>Permisos</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="tr-shadow">
                    <td>
                        {{ $user->name }}
                    </td>
                    <td>{{ $user->email }}</td>

                    @if ($user->isAdmin())
                    <td class="text-success">Administrador</td>
                    @else
                    <td class="text-danger">Regular</td>
                    @endif
                    <td>
                        <div class="table-data-feature">
                            <button class="item edit" data-placement="top" title="Editar" value="{{ $user->id }}"
                                data-toggle="modal" data-target="#editModal">
                                <i class="zmdi zmdi-edit"></i>
                            </button>
                            <button class="item delete" data-toggle="modal" value="{{ $user->id }}"
                                data-target="#deleteModal" data-placement="top" title="Eliminar">
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

@endsection

@section('modals')
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
                            <input type="text" name="name" id="name" placeholder="Nombre" class="form-control">
                            <small class="form-text text-muted">Nombre del usuario</small>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="admin" class="form-control-label">Permisos</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <div class="form-check" id="givePermissions">
                                <div class="checkbox">
                                    <label for="admin" class="form-check-label">
                                        <input type="checkbox" name="admin" value="1" class="form-check-input">
                                        Dar permisos de administrador.
                                    </label>
                                </div>
                            </div>
                            <div class="form-check" id="removePermissions">
                                <div class="checkbox">
                                    <label for="admin" class="form-check-label">
                                        <input type="checkbox" name="admin" value="0" class="form-check-input">
                                        Remover permisos de administrador.
                                    </label>
                                </div>
                            </div>
                            <small class="help-block form-text">Marque la casilla si desea editar los permisos de administrador del usuario.</small>
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
                    <p>¿Está seguro que desea eliminar este usuario?</p>
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
<script src="{{ asset('theme/js/custom.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {

    var table = $('#datatable').DataTable();
    // Start Edit record
    $('#datatable').on('click', '.edit', function () {

        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
            $tr = $tr.prev('.parent');
        }

        var data = table.row($tr).data();

        $('#name').val(data[0]);

        if (data[2] == "Administrador") {
            $('#givePermissions').css("display", "none");
        } else {
            $('#removePermissions').css("display", "none");
        }

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