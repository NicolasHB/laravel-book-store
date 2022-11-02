<x-layouts.main-layout
title="Add book"
> 
<div class="container">
    <h1 class="font-bold text-4xl pb-10 py-10 text-center">New book</h1>
    <form class="" action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="">
            {{-- Title --}}
            <input class="block w-full rounded-lg border border-gray-400" type="text" name="title" id="" placeholder="Nom du livre" value="{{ old('title') }}">
            <x-error-msg name="title" />
            {{-- description --}}
            <textarea name="description" id="" cols="30" rows="10" class="mt-5 block w-full rounded-lg border border-gray-400" placeholder="Enter to the text">{{ old('description')}}</textarea>
            <x-error-msg name="description" />
            {{-- IMG --}}
            <div class="">
                <label for="">choose to picture</label>
                <input type="file" name="url_img" id="" class="block w-full rounded-lg border border-gray-400 mt-5">
            <x-error-msg name="url_img" />
            </div>
            <div class="flex pt-10 gap-5 ">
                {{-- price --}}
                <div class="">
                    <input type="text" name="price" id="" class="block w-full rounded-lg border border-gray-400 mt-5" placeholder="price">
                </div>
                {{-- authors --}}
                <div class="">
                    <input type="text" name="author" id="" class="block w-full rounded-lg border border-gray-400 mt-5" placeholder="auteurs">
                </div>
            </div>
            {{-- nombre de pages --}}
            <div class="">
                <input type="text" name="nombre_pages" id="" class="block w-full rounded-lg border border-gray-400 mt-5" placeholder="nombre de pages">
            </div>
            {{-- <input type="text" name="url_img" id="" class="block w-full rounded-lg border border-gray-400 mt-5" placeholder="insérer votre image" value="https://source.unsplash.com/640x480/?person?/1"> --}}
            <div class="pt-5">
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
</x-layouts.main-layout>