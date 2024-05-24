<x-app-layout>
    <div class="pagetitle">
        <h1>{{ __('All Post') }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href=" {{ route('dashboard') }}"> {{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item active"><a href=" {{ route('post.index') }}"> {{ __('Resource') }}</a></li>
                <li class="breadcrumb-item">{{ __('All Post') }}</li>
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
                        <hr class="my-5" />
                        @isset($posts) @foreach ($posts as $post)
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{$post -> subject}}</h5>
                                <p>
                                    <small><b>Author:</b>{{$post-> user->name}}</small>
                                </p>
                                {{$post -> post}}
                                <hr />
                                <button type="submit" class="btn btn-primary m-1 font-monospace" data-bs-toggle="modal" data-bs-target="#modalComment"><i class="bi bi-chat"></i> Comment</button>
                                <!-- Modal -->
                                <div class="modal fade" id="modalComment" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalLabel">Comment</h5>
                                            </div>
                                            <form action="{{route('post.destroy', $post)}}" method="post">
                                                @csrf @method('DELETE')
                                                <div class="modal-body">
                                                    
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">No</button>
                                                        <button type="submit" class="btn btn-danger">Yes</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach @endisset
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>