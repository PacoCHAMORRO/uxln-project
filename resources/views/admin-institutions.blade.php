@extends('theme.default')
@section('content')
<div class="col-lg-6">
  <div class="card">
    <div class="card-header">
      <strong>Agregar</strong> Casa Hogar
    </div>
    <div class="card-body card-block">
      <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="row form-group">
          <div class="col col-md-3">
            <label class=" form-control-label">Static</label>
          </div>
          <div class="col-12 col-md-9">
            <p class="form-control-static">Username</p>
          </div>
        </div>
        <div class="row form-group">
          <div class="col col-md-3">
            <label for="text-input" class=" form-control-label">Nombre</label>
          </div>
          <div class="col-12 col-md-9">
            <input type="text" id="text-input" name="text-input" placeholder="Casa Hogar A.C." class="form-control">
            <small class="form-text text-muted">Nombre de la casa hogar</small>
          </div>
        </div>
        <div class="row form-group">
          <div class="col col-md-3">
            <label for="website-input" class=" form-control-label">Sitio web</label>
          </div>
          <div class="col-12 col-md-9">
            <input type="url" id="website-input" name="website-input" placeholder="http(s)://ejemplo.com" class="form-control">
            <small class="help-block form-text">Introduzca el sitio web de la instituciones, preferentemente copiado del sitio web oficial</small>
          </div>
        </div>
        <div class="row form-group">
          <div class="col col-md-3">
            <label for="textarea-input" class=" form-control-label">Descripción</label>
          </div>
          <div class="col-12 col-md-9">
            <textarea name="textarea-input" id="textarea-input" rows="9" placeholder="Describa el propósito de la organización..." class="form-control"></textarea>
          </div>
        </div>
        <div class="row form-group">
          <div class="col col-md-3">
            <label for="file-input" class=" form-control-label">Logotipo</label>
          </div>
          <div class="col-12 col-md-9">
            <input type="file" id="file-input" name="file-input" class="form-control-file">
          </div>
        </div>
        <div class="row form-group">
          <div class="col col-md-3">
            <label for="file-multiple-input" class=" form-control-label">Fotografías de la institución (opcional)</label>
          </div>
          <div class="col-12 col-md-9">
            <input type="file" id="file-multiple-input" name="file-multiple-input" multiple="" class="form-control-file">
          </div>
        </div>
      </form>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary btn-sm">
        <i class="fa fa-dot-circle-o"></i> Agregar
      </button>
      <button type="reset" class="btn btn-danger btn-sm">
        <i class="fa fa-ban"></i> Reset
      </button>
    </div>
  </div>
</div>
  @endsection