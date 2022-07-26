@extends('body.master')
@section('page-level-css')
@endsection()

@section('master')

    <div class="p-5 mb-4 bg-light rounded-3">
        <table id="example" class="table table-responsive-md" style="width:100%">
            <thead>
            <tr>
                <th>Avatar</th>
                <th>Title</th>
                <th>Name</th>
                <th>Email</th>
                <th>Is Subscribe</th>
            </tr>
            </thead>
        </table>
    </div>

    <div class="row align-items-md-stretch">
        <div class="col-md-6">
            <div class="h-100 p-5 text-white bg-dark rounded-3">
                <h2>
                    How can we increase the speed?
                </h2>
                <p>We have a table in CRM with 1.000 employees. Each of them has a picture (avatar). The page with employees is too big, so it loads very slowly.
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="h-100 p-5 bg-light border rounded-3">
                <h2>
                    MY Solution : Use DataTable And Yajra With Query
                </h2>
                <ol>
                    <li> In order to increase the query speed, we pull only the necessary fields in the table with the select command during the query.
                    <li> We can use cache.</li>
                    <li>
                        AWS can be used as the pictures will come from the server anyway. (I haven't personally applied it before)
                    </li>
                    <li>
                        A picture placeholder (company logo) can be used as a starting point in the lists, and when the item is hovered, the picture can be uploaded separately via ajax.
                    </li>
                    <li>
                        Or we can use Yajra and Datatable as I have implemented. Here, by doing Model::query, not the whole list, but as pagination with ajax (25 items come by
                        default when I apply it) as many items as desired can be drawn.
                    </li>
                    </li>
                </ol>
            </div>
        </div>
    </div>
@endsection()
@section('page-level-script')

    <script>
        $(document).ready(function () {

            $("body").on("click", ".is_subscribe", function () {
                $.ajax(
                    {
                        url: $(this).data("link"),
                        method: "post",
                        success: function (response) {
                            alert(response)
                            table.ajax.reload();
                        },
                        error: function (res) {
                            alert("System error occurred")
                        }

                    }
                )
            })

            let table = $('#example').DataTable({
                lengthMenu: [[10,25, 100, -1], [10,25, 100, "All"]],
                processing: true,
                serverSide: true,
                ajax: {
                    type: 'POST',
                    url: '{{route('task-two-data')}}',
                },
                columns: [
                    {data: 'avatar', name: 'avatar'},
                    {data: 'title', name: 'title'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'is_subscribe', name: 'is_subscribe'},
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


