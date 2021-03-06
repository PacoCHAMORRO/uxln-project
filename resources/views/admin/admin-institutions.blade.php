@extends('layouts.app')
@section('content')
  <div class="col-sm-12">
    <!-- DATA TABLE -->
    <div class="d-flex flex-row align-items-center m-b-55">
      <div>
        <img src="{{ url('theme/images/icon/admin-institutions-icon-2.png') }}" alt="">
      </div>
      <h2 class="add-item admin-title pl-3">Instituciones de asistencia infantil</h2>
      <div class="ml-auto">
        <button class="au-btn au-btn-icon au-btn--blue au-btn--small add-item-btn" data-toggle="modal" data-target="#addModal">
          <i class="zmdi zmdi-plus"></i>Agregar Casa Hogar
        </button>
      </div>
    </div>
    <div class="table-responsive table-responsive-data2">
      <table id="datatable" class="table table-data2 display nowrap" cellspacing="0">
        <thead>
          <tr>
            <th>logo</th>
            <th>nombre</th>
            <th style="display: none;">link</th>
            <th style="display: none;">description</th>
            <th>colaboraciones</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($institutions as $institution)
          <tr class="tr-shadow">
            <td>
              <div class="image image-table">
                <a href="{{ route('institutions.show', $institution->id) }}">
                  <img src="{{ asset('img') . '/' . $institution->logo }}" alt="LOGO">
                </a>
              </div>
            </td>
            <td>{{ $institution->name }}</td>
            <td style="display: none;">{{ $institution->link }}</td>
            <td style="display: none;">{{ $institution->description }}</td>
            <td>
              <div>Total de colaboraciones: {{ $institution->collabs->count() }}</div>
                <button class="au-btn au-btn--icon au-btn--green au-btn--small">
                  <a href="{{ route('institutions.show', $institution->id) }}">Editr o agregar</a>
                </button>
            </td>            
            <td>
              <div class="table-data-feature">
                <button class="item edit" data-placement="top" title="Editar" value="{{ $institution->id }}"
                  data-toggle="modal" data-target="#editModal">
                  <i class="zmdi zmdi-edit"></i>
                </button>
                <button class="item delete" data-toggle="modal" value="{{ $institution->id }}" data-target="#deleteModal" data-placement="top" title="Eliminar">
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
        <h5 class="modal-title" id="largeModalLabel">Agregar Casa Hogar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="{{ action('InstitutionController@store') }}" method="POST" id="addForm"
        enctype="multipart/form-data" class="form-horizontal">
        @csrf
        <div class="modal-body">
          {{-- ADD FORM --}}
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="text-input" class=" form-control-label">Nombre</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="text" name="name" placeholder="Casa Hogar A.C." class="form-control" required>
              <small class="form-text text-muted">Nombre de la casa hogar</small>
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="website-input" class=" form-control-label">Sitio web</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="url" name="link" placeholder="URL" class="form-control">
              <small class="help-block form-text">Introduzca el sitio web de la instituciones, preferentemente copiado
                del sitio web oficial</small>
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="textarea-input" class=" form-control-label">Descripción</label>
            </div>
            <div class="col-12 col-md-9">
              <textarea name="description" rows="9" placeholder="Describa el propósito de la organización..."
                class="form-control"></textarea>
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="file-input" class=" form-control-label">Logotipo</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="file" name="logo" class="form-control-file">
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
        <h5 class="modal-title" id="largeModalLabel">Editar Casa Hogar</h5>
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
              <label for="text-input" class=" form-control-label">Nombre</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="text" id="name" name="name" placeholder="Casa Hogar A.C." class="form-control">
              <small class="form-text text-muted">Nombre de la casa hogar</small>
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="website-input" class=" form-control-label">Sitio web</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="url" id="link" name="link" placeholder="URL" class="form-control">
              <small class="help-block form-text">Introduzca el sitio web de la instituciones, preferentemente copiado
                del sitio web oficial</small>
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="textarea-input" class=" form-control-label">Descripción</label>
            </div>
            <div class="col-12 col-md-9">
              <textarea name="description" id="description" rows="9"
                placeholder="Describa el propósito de la organización..." class="form-control"></textarea>
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="file-input" class=" form-control-label">Logotipo</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="file" id="logo" name="logo" class="form-control-file">
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
        <h5 class="modal-title" id="largeModalLabel">Eliminar Casa Hogar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>

      <form action="/admin/institutions/" method="POST" id="deleteForm" enctype="multipart/form-data"
        class="form-horizontal">
        @csrf
        @method('DELETE')
        <div class="modal-body">
          {{-- DELETE FORM --}}
          <p>Todas las colaboraciones relacionadas a esta institución serán borradas.</p>
          <p>¿Está seguro de que desea eliminar esta institución?</p>

          {{-- END EDIT FORM --}}
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
  // Hide columns 2 and 3
  $(document).ready(function () {
    var table = $('#datatable').DataTable( {
      "columnDefs" : [
        {
          "targets": 2,
          "visible": false,
          "searchable": false
        },
        {
          "targets": 3,
          "visible": false,
          "searchable": false
        }
      ]
    } );

    // Start Edit record
    $('#datatable').on('click', '.edit', function () {

      $id_institution = $(this).val();
      
      $tr = $(this).closest('tr');
      if ($($tr).hasClass('child')) {
        $tr = $tr.prev('.parent');
      }

      var data = table.row($tr).data();
      $('#name').val(data[1]);
      $('#link').val(data[2]);
      $('#description').val(data[3]);

      $('#editForm').attr('action', '/admin/institutions/' + $id_institution);

    });

    // Delete Record
    $('#datatable').on('click', '.delete', function () {

      $id_institution = $(this).val();
      console.log($id_institution);

      $('#deleteForm').attr('action', '/admin/institutions/' + $id_institution);

      });
  });

</script>

@endsection