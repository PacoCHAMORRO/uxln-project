@extends('layouts.app')
@section('content')
  <div class="col-sm-12">
    <!-- DATA TABLE -->
    <div class="d-flex flex-row align-items-center m-b-55">
      <div>
        <img src="{{ url('theme/images/icon/admin-workshop-icon.png') }}" alt="">
      </div>
      <h2 class="add-item admin-title pl-3">Talleres</h2>
      <div class="ml-auto">
        <button class="au-btn au-btn-icon au-btn--blue au-btn--small add-item-btn" data-toggle="modal" data-target="#addModal">
          <i class="zmdi zmdi-plus"></i>Agregar Taller
        </button>
      </div>
    </div>
    <div class="table-responsive table-responsive-data2">
      <table id="datatable" class="table table-data2 display nowrap" cellspacing="0">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>foto</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($workshops as $workshop)
          <tr class="tr-shadow">
            <td>{{ $workshop->title }}</td>
            <td>
            {{ \Illuminate\Support\Str::limit($workshop->content, 25, $end='...') }}
              <!-- <span class="status--process"></span> -->
            </td>
            @if ($workshop->picture)
              <td class="text-success">
                Tiene foto
              </td>
            @else
              <td class="text-danger">
                Sin foto
              </td>
            @endif
           
            <td>
              <div class="table-data-feature">
                <button class="item edit" data-placement="top" title="Editar" value="{{ $workshop->id }}"
                  data-toggle="modal" data-target="#editModal">
                  <i class="zmdi zmdi-edit"></i>
                </button>
                <button class="item delete" data-toggle="modal" value="{{ $workshop->id }}" data-target="#deleteModal" data-placement="top" title="Eliminar">
                  <i class="zmdi zmdi-delete"></i>
                </button>
              </div>
            </td>
          </tr>
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
        <h5 class="modal-title" id="largeModalLabel">Agregar Taller</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="{{ action('WorkshopController@store') }}" method="POST" id="addForm"
        enctype="multipart/form-data" class="form-horizontal">
        @csrf
        <div class="modal-body">
          {{-- ADD FORM --}}
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="text-input" class=" form-control-label">Título</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="text" name="title" class="form-control" required>
              <small class="form-text text-muted">Título del taller.</small>
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="content" class=" form-control-label">Contenido</label>
            </div>
            <div class="col-12 col-md-9">
              <textarea name="content" class="form-control" cols="30" rows="10"></textarea>
              <small class="help-block form-text">Descripción del taller.</small>
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="picture" class=" form-control-label">Fotografía</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="file" name="picture" class="form-control-file">
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
        <h5 class="modal-title" id="largeModalLabel">Editar Casa Hogar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="/admin/workshops/" method="POST" id="editForm" enctype="multipart/form-data"
        class="form-horizontal">
        @csrf
        @method('PATCH')
        <div class="modal-body">
          {{-- EDIT FORM --}}
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="text-input" class=" form-control-label">Título</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="text" name="title" class="form-control">
              <small class="form-text text-muted">Título del taller.</small>
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="content" class=" form-control-label">Contenido</label>
            </div>
            <div class="col-12 col-md-9">
              <textarea name="content" class="form-control" cols="30" rows="10"></textarea>
              <small class="help-block form-text">Descripción del taller.</small>
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="picture" class=" form-control-label">Fotografía</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="file" name="picture" class="form-control-file">
            </div>
          </div>
          {{-- END EDIT FORM --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
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
        <h5 class="modal-title" id="largeModalLabel">Eliminar Casa Hogar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>

      <form action="/admin/workshops/" method="POST" id="deleteForm" enctype="multipart/form-data"
        class="form-horizontal">
        @csrf
        @method('DELETE')
        <div class="modal-body">
          <p>¿Estás seguro que deseas eliminar este taller?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Eliminar</button>
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

      $id_workshop = $(this).val();

      $('#editForm').attr('action', '/admin/workshops/' + $id_workshop);


    });

    // Start Delete Record
    $('#datatable').on('click', '.delete', function () {

      $id_workshop = $(this).val();

      $('#deleteForm').attr('action', '/admin/workshops/' + $id_workshop);

    });
  });

</script>

@endsection