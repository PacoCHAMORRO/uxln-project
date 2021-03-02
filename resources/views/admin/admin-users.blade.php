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
                        <th>admin</th>
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
                        
                        @if ($user->admin == 'true')
                            <td class="text-success">Administrador</td>
                       
                        @else
                            <td class="text-danger">Regular</td>
                        @endif
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
                                        <input type="checkbox" name=admin class="form-check-input" checked>
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
<script src="{{ asset('theme/js/custom.js') }}"></script>
<script type="text/javascript">
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