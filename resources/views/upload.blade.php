@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Upload</div>

                    <div class="card-body bg-dark text-white">
                        <form method="POST" action="{{ url('store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">NAME GIF</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name" required
                                           autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="url" class="col-md-4 col-form-label text-md-end">URL GIF</label>

                                <div class="col-md-6">
                                    <input id="url" type="text" class="form-control @error('url') is-invalid @enderror"
                                           name="url">

                                    @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="category_id" class="col-md-4 col-form-label text-md-end">CATEGORY</label>

                                <div class="col-md-6">
                                    <select name="category_id" required id="category_id"
                                            class="
                                            form-select appearance-none
                                              block
                                              w-full
                                              px-3
                                              py-1.5
                                              text-base
                                              font-normal
                                              text-gray-700
                                              bg-purple bg-clip-padding bg-no-repeat
                                              border border-solid border-purple-300
                                              rounded
                                              transition
                                              ease-in-out
                                              m-0
                                        focus:text-gray-700 focus:bg-white focus:border-purple-600 focus:outline-none"
                                            aria-label="Default select example">
                                        @foreach($categories as $category)
                                            @if($category->name != "All")
                                                <option class="hover:bg-purple-700"
                                                        value="{{$category->id}}">{{$category->name}}</option>
                                            @endif

                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="file" class="col-md-4 col-form-label text-md-end">FILE</label>

                                <div class="col-md-6">
                                    <input id="file" type="file"
                                           class="form-control @error('file') is-invalid @enderror" name="file"
                                           >

                                    @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <input id="user_id" type="hidden" class="form-control" name="user_id" required
                                           value="{{Auth::id()}}">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit"
                                            class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
                                        Upload
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
