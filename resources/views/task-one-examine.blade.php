@extends('body.master')
@section('page-level-css')
@endsection()

@section('master')

    <div class="p-5 mb-4 bg-light rounded-3">
        <table class="table table-responsive-md" style="width:100%">
            <thead>
            <tr>
                <th>Word</th>
                <th>Usage</th>
                <th>Percent</th>

            </tr>
            @foreach($data as $item)
                <tr>
                    <th>{{$item['word']}}</th>
                    <th>{{$item['usage']}}</th>
                    <th>{{$item['percent']}}</th>
                </tr>
            @endforeach
            </thead>
        </table>
    </div>

@endsection()
@section('page-level-script')

@endsection()
