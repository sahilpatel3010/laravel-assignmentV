@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary" href="{{ route('blog.create') }}">New Blog</a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">BlogName</th>
                            <th scope="col">BlogContent</th>
                            <th width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;?>
                            @foreach($blogs as $blog)
                                <tr>
                                    <th scope="row">{{$no++}}</th>
                                    <td>{{$blog->name}}</td>
                                    <td>{{$blog->content}}</td>
                                    <td>
                                        <form action="{{ route('blog.destroy',$blog->id) }}" method="POST">

                                            <a class="btn btn-success" href="{{ route('blog.edit',$blog->id) }}">Edit</a>
                        
                                            @csrf
                                            @method('DELETE')
                            
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
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
@endsection
