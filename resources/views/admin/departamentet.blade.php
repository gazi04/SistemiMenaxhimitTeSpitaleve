@extends('layout')

@section('content')
<div class="main-wrapper">
    @include('admin.includes.header')
    @include('admin.includes.sidebar')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-5 col-5">
                    <h4 class="page-title">Departamentet</h4>
                </div>
                <div class="col-sm-7 col-7 text-right m-b-30">
                    <a href="{{ route('create-departament-view' )}}" class="btn btn-primary btn-rounded">Shto Departament</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Emri i Departamentit</th>
                                    <th>Pershkrimi</th>
                                    <th class="text-right">Veprime</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($departaments as $dep)
                                    <tr>
                                        <td>{{ $dep->id }}</td>
                                        <td>{{ $dep->name }}</td>
                                        <td class="sorting_1 description">{{ $dep->description }}</td>
                                        <td class="text-right">
                                            <div class="action-buttons">
                                                <a href="{{ route('edit-departament-view', $dep->id) }}" class="btn btn-primary">
                                                    <i class="fa fa-pencil"></i>
                                                    Modifiko
                                                </a>
                                                {{--TODO- te butoni fshirjes ekziston nje problem --}}
                                                {{--butoni me posht hap pop up-in duhet te i jepet edhe id e departamentit te cilit eshte --}}
                                                {{--klikuar Fshij butoni--}}
                                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete_doctor" data-id="{{ $dep->id }}">
                                                    <i class="fa fa-trash-o"></i>
                                                    Fshij
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="delete_doctor" class="modal fade delete-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="assets/img/sent.png" alt="" width="50" height="46" />
                    <h3>A jeni i sigurt qe deshironi te fshini dhenat e Departamentit?</h3>
                    <div class="m-t-20">
                        <a href="#" class="btn btn-white" data-dismiss="modal">Mbylle</a>
                        <form id="delete-form" action="" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Fshij</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#delete_modal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var form = $('#delete-form');

            var actionUrl = "{{ route('delete-departament', ':id') }}";
            actionUrl = actionUrl.replace(':id', id);

            form.attr('action', actionUrl);
        });
    });
</script>
@endsection
