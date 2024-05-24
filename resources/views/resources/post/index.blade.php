<x-app-layout> 
    <div class="pagetitle">
        <h1> {{ __('My Post') }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href=" {{ route('dashboard') }}"> {{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item active"><a href=" {{ route('post.index') }}"> {{ __('Resource') }}</a></li>
                <!-- <li class="breadcrumb-item"> {{ __('Post') }}</li> -->
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card p-5">
                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('post.create') }}" class="btn btn-primary"><i class="bi bi-file-earmark-plus-fill me-1"></i> Add a New Post</a>
                        </div>
                        <hr class="my-5">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope ="col">Subject</th>
                                    <th scope ="col">Post</th>
                                    <th scope ="col">Status</th>
                                    <th scope ="col">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($posts)
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $post->subject }}</td>
                                            <td>{{ $post->post }}</td>
                                            <td>{{ ($post->status == 1 ? 'Published' : 'Unpublished') }}</td>
                                            <td class= "p-8">
                                                <a href="{{ route('post.show', $post)}}" class="btn btn-dark m-1"><i class="bi bi-folder-symlink"></i></a>
                                                <a href="{{ route('post.edit',$post)}}" class="btn btn-success m-1"><i class="bi bi-pencil-square"></i></a>
                                                <!-- <form action="{{route('post.destroy', $post)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger m-1"><i class="bi bi-trash-fill"></i></button>
                                                </form> -->              

                                                <!-- Button trigger modal -->
                                                <button type="submit" class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#modalDelete" ><i class="bi bi-trash-fill"></i></button>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                @endisset
                            </tbody>
                             <!-- Modal -->
                             @foreach ($posts as $post)
                             <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalLabel">Delete?</h5>
                                            </div>
                                        <form action="{{route('post.destroy', $post)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" id="{{$post->id}}">
                                            <div class="modal-body">Are you sure you want to delete this post?
                                                <hr>
                                                <p>{{ $post->post }}</p>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">No</button>
                                                    <button type="submit" class="btn btn-danger" data-action="{{route('post.destroy', $post->id)}}">Yes</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>