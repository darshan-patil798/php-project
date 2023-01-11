@extends('master')
@section("content")
<div class="container-fluid">
    <div class="heading-block mx-auto w-80 bg-primary text-center">
        <h1>Welcome {{Session::get('user')['name']}}</h1>
        <p>Here are your notes presereved, add new noters below to preserve</p>
    </div>
    <div class="addnotes-block" style="width:70%;margin: 2rem auto;padding: 2rem;">
        <form action="add-note" method="post" style="display: flex;gap:2rem">
            @csrf
            <input type="text" name="note" style="flex:1" />
            <button class="btn btn-success" t type="submit">ADD</button>
        </form>

    </div>
    <div class="shownotes-block" style="
    padding: 2rem;
    display: flex;
    background-color: aqua;
    gap:2rem;
    justify-content:space-around;
    flex-wrap: wrap;
    ">
        @forelse ($notes as $note)
        <a
        href="complete/{{$note->id}}"
            style="font-size:2rem;border-radius:50%;flex:1 1 20%; background-color: bisque;padding:2rem;display: flex;justify-content: center;align-items: center;max-width: 20%;">
            {{$note->note}}</a>
        @empty
        <p>You dont have any note right now</p>
        @endforelse


    </div>
</div>
<!-- <h1 class="text-center"> You logged in {{Session::get('user')['name']}}</h2> -->
@endsection