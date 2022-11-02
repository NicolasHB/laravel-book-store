<x-layouts.main-layout title="Book Store">

    <div class="px-32 ">
        <p class="text-xl text-orange-500 pb-5 pt-5">Bienvenue sur book store</p>
        @forelse ($books as $book )
            <a href="books/{{$book->id}}">
                <x-layouts.table-layout :title="$book->title" :price="$book->price" :author="$book->author"/>
            </a>
        @empty
            <p class="text-red-500 text-center">post is not existing</p>    
        @endforelse
    </div>

</x-layouts.main-layout>