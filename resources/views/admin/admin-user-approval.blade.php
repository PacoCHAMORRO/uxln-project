@extends('layouts.app')

@section('content')
<div class="col-sm-12">
    <!-- DATA TABLE -->
    <div class="d-flex flex-row align-items-center m-b-55">
        <div>
            <img src="{{ url('theme/images/icon/admin-users-icon.png') }}" alt="">
        </div>
        <h2 class="add-item admin-title pl-3">Usuarios pendientes de aprobación</h2>
    </div>
    <div class="table-responsive table-responsive-data2">
        <table id="datatable" class="table table-data2">
            <thead>
                <tr>
                    <th>nombre</th>
                    <th>email</th>
                    <th>estatus</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users_pending as $user)
                <tr class="tr-shadow">
                    <td>
                        {{ $user->name }}
                    </td>
                    <td>{{ $user->email }}</td>

                    @if ($user->admin == true)
                    <td class="text-success">Administrador</td>

                    @else
                    <td class="text-danger">Regular</td>
                    @endif
                    <td>
                        <div class="table-data-feature">
                            <form action="/admin/users-approval/{{ $user->id }}" method="post">
                                @csrf
                                <button type="submit" id="approve" class="au-btn au-btn--small au-btn--blue"
                                    data-toggle="tooltip" data-placement="top" title="Aprobar usuario"
                                    value="{{ $user->id }}">
                                    Aprobar
                                </button>
                            </form>
                            <form action="/admin/users-approval/{{ $user->id }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="au-btn au-btn--small au-btn--red" data-toggle="tooltip"
                                    value="{{ $user->id }}" data-target="#deleteModal" data-placement="top"
                                    title="Declinar usuario">
                                    Declinar
                                </button>
                            </form>
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

@section('script')
<script src="{{ asset('theme/js/custom.js') }}"></script>
@endsection