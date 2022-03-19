@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Post</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                      @csrf
                      <div>
                        <input type="text" placeholder="Enter title" name="title">
                      </div>
                     <div>
                        <input type="text" placeholder="Enter body" name="body">
                     </div>
                      <div>
                        <input type="file" name="image" onchange="readURL(this);">
                      </div>
                      <div style="height: 100px;width:100px">
                        <img id="preview-img" src="https://www.slntechnologies.com/wp-content/uploads/2017/08/ef3-placeholder-image.jpg" alt="img" height="100%" width="100%">
                      </div>
                      <div>
                        <button>Save</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Posts</div>

                <div class="card-body">
                   @foreach ($posts as $p)
                       <div style="padding: 12px;margin:10px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;border-radius:8px;display:flex;height:300px;justify-content:space-around;padding:20px">   
                        <div style="flex: 1">
                            <p>title: {{ $p->title }}</p>
                           <p>body: {{ $p->body }}</p>
                        </div>
                        <div style="flex:1">
                            <img src="{{ asset('uploads/images/').'/'.$p->image }}" alt="image" height="100%" width="100%">
                        </div>
                       </div>
                   @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview-img').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
