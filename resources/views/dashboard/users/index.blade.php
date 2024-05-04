@extends('dashboard.layout.layout')

@section('title2', __('words.users'))

@section('index')

    <!-- Default box -->
    <br>
    <div>
        <div>
            <button class="btn btn-secondary btn-xs mr-3" onclick="window.location.href='{{ route('dashboard.users.create') }}';" type="submit">
                {{ __('words.usercreate') }} <i class="fas fa-plus"></i></button>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-body p-2">
            <table class="table table-striped text-center" id="table_id">
                <thead class="text-center">
                    <tr>
                        <th style="width: 4%">#</th>
                        <th style="width: 20%">{{ __('words.user') }}</th>
                        <th style="width: 23%">{{ __('words.email') }}</th>
                        <th style="width: 20%">{{ __('words.status') }}</th>
                        <th style="width: 20%">{{ __('words.action') }}</th>
                    </tr>
                </thead>
                <tbody class="text-center" >

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    {{-- DELETE --}}
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('dashboard.users.delete') }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Delete User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <p style="color: aliceblue">Are you sure you want to delete this user?</p>
                            <input type="hidden" name="id" id="id">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('javascripts')
    <script type='text/javascript'>
        $(document).ready(function() {
            $('#table_id').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('dashboard.users.getAllData') }}",
                columns: [
                    {},
                    {
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'email',
                        name: 'email',
                    },
                    {
                        data: 'status',
                        name: 'status',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                    },
                    {},

                ],
                language: {
                   search: "Custom Search # ",
                   entries: " # Enries  ",
                //    per :
                },
                columnDefs : [{
                    'targets' : '_all',
                    'defaultContent' :"-",
                }]
            });

            // Handle delete button click
            $('#table_id tbody').on('click', '#deleteBtn', function() {
                var id = $(this).data('id');
                $('#deletemodal #id').val(id);
                $('#deletemodal').modal('show');
            });
        });
    </script>
@endpush
