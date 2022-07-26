@extends('body.master')
@section('page-level-css')
@endsection()

@section('master')

    <div class="p-5 mb-4 bg-light rounded-3">
        <table id="example" class="table table-responsive-md" style="width:100%">
            <thead>
            <tr>
                <th>Title</th>
                <th>Name</th>
                <th>Email</th>
                <th>Examine</th>
            </tr>
            </thead>
        </table>
    </div>

@endsection()
@section('page-level-script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function () {

            let table = $('#example').DataTable({
                lengthMenu: [[25, 100, -1], [25, 100, "All"]],
                processing: true,
                serverSide: true,
                ajax: {
                    type: 'POST',
                    url: '{{route('task-one-examine-data')}}',
                },
                columns: [
                    {data: 'title', name: 'title'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'path', name: 'path'},
                ]

            });
            jQuery.fn.DataTable.ext.type.search.string = function (data) {
                var testd = !data ?
                    '' :
                    typeof data === 'string' ?
                        data
                            .replace(/i/g, 'İ')
                            .replace(/ı/g, 'I') :
                        data;
                return testd;
            };
            $('#example_filter input').keyup(function () {
                table
                    .search(
                        jQuery.fn.DataTable.ext.type.search.string(this.value)
                    )
                    .draw();
            });

        });
    </script>

@endsection()

