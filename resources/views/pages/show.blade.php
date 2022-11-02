<x-layouts.main-layout
:title="$book->title"
:price="$book->price"
:actor="$book->author"
:nombrepages="$book->nombre_pages"
>
<div class="pt-10 p-10  ">
    <img src="{{ asset('storage/'. $book->url_img) }}" alt="{{$book->title}}">
    <div class="pt-5">
        <p class="font-bold text-2xl">{{$book->title}}</p>
        <p class="pt-5">{!! nl2br(e($book->description))!!}</p>  
        <div class="flex gap-5 pt-10">    
            <p class=""> auteur: {{ $book->author}}</p>      
            <p class="">prix: {{ $book->price}}</p>
            <p class="">Nombre de pages: {{ $book->nombre_pages}}</p>  
        </div> 
    </div>
    @auth
        @if(Auth::user())
            <div class="pt-5">
                <x-btn-delete :book="$book" />
                <a href="{{$book->id}}/edit" class="btn btn-success">Update</a>
            </div> 
        @endif
    @endauth
</div>
</x-layouts.main-layout>