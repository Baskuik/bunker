@extends('layouts.app')

@section('content')

<div class="hero"  >
    <h1>Home</h1>
    <p>Some text</p>
    <button class="btn">Button</button>
</div>

<div class="content-section">
    <p>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
    </p>

    <div class="two-columns">
        <div class="card">
            <div class=><img src="{{ asset('img/bunker.jpg') }}" alt="Logo"> </div>
            <p>Kom meer te weten over onze bunker.</p>
            <a href="verhaal"> <button class="btn" >Ontdek meer</button> </a>
        </div>

        <div class="card">
            <div class=><img src="{{ asset('img/bunker.jpg') }}" alt="Logo"></div>
            <p>Korte tekst over tickets en info.</p>
            <a href="boeken"> <button class="btn">Tickets kopen</button> </a>
        </div>
    </div>
</div>

<div class="gallery">
    <div class=><img src="{{ asset('img/bunker.jpg') }}" alt="Logo"></div>
    <div class=><img src="{{ asset('img/bunker.jpg') }}" alt="Logo"></div>
    <div class=><img src="{{ asset('img/bunker.jpg') }}" alt="Logo"></div>
</div>
@endsection
