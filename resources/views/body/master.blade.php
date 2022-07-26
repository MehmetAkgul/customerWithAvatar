<!DOCTYPE html>
<html lang="tr">

<head>
    @include('body.head')
    @yield('page-level-css')
</head>
<body>

<main>
    <div class="container py-4">

        @include('body.header')

        @yield('master')

        <footer class="pt-3 mt-4 text-muted border-top text-center">
            Mehmet Akgül © July 2022
        </footer>

    </div>
</main>

<script src="{{asset('assets/js/jquery.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

</script>
</body>

@yield('page-level-script')

</html>



