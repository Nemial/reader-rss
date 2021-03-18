@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Top 10 most used words</h1>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Position</th>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($words as $key => $word)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$word->name}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
    </div>
    <div class="container mt-5">
        <h2 class="text-center">Elements RSS</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Author</th>
                <th>Title</th>
                <th>Summary</th>
            </tr>
            </thead>
            <tbody>
            @foreach($elements as $key => $element)
                <tr>
                    <td>{{$element->author}}</td>
                    <td><a href="{{$element->link}}">{{$element->title}}</a></td>
                    <td><?php echo $element->summary ?></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
