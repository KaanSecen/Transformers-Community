<x-app-layout>
    <link href="{{ url('/css/layout.css') }}" rel="stylesheet">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <style>
        table {
        border-collapse: collapse;
        width: 100%;
        }

        th, td {
        text-align: left;
        padding: 8px;
        }

        tr:nth-child(even) {background-color: #f2f2f2;}
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-purple-200 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-purple-200 border-b border-gray-200">
                    Hallo {{ Auth::user()->name }},
                </div>
            </div>
        </div>
    </div>

        <div class="py3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-10">
                <div class="bg-purple-200 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-purple-200 border-b border-gray-200">
                        <h1 class="text-2xl">Anonieme vragen ({{ $forms->count()}}):</h1>
                        <table class="table-auto">
                                <thead>
                                    <tr>
                                    <th>Vraag:</th>
                                    <th>Naam:</th>
                                    <th>Tijd:</th>
                                    @if (Auth::user()->admin == 1)
                                        <th>Email:</th>
                                    @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($forms as $form)
                                    <tr>
                                        <td>{{ $form->question }}</td>
                                        <td>{{ $form->name}}</td>
                                        <td>{{ $form->created_at->format('d-m-Y') }}</td>
                                        @if (Auth::user()->admin == 1)
                                            <td><a href="mailto: {{ $form->email }}" class="topic" style="color: black !important;">{{ $form->email }}</a></td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if (Auth::user()->admin == 1)
                                <form action="/delete-question" class="flex flex-col" method="POST">
                                    @csrf
                                    <label for="form" class="m-2">Selecteer een vraag:</label>
                                    <select id="form" name="form_id" class="m-2">
                                    @foreach ($forms as $form)
                                        <option value="{{$form->id}}" name="form_id">{{ $form->question }}</option>
                                    @endforeach
                                    </select>
                                    <button class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded m-2">Verwijder Vraag</button>
                                </form>
                            @endif
                    </div>
                </div>
            </div>
        </div>

    @if (Auth::user()->access == 1)
        <div class="py3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-purple-200 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-purple-200 border-b border-gray-200">
                        <h1 class="text-2xl">Maak een bericht:</h1>
                            <form action="/create-post" class="flex flex-col" method="POST">
                                @csrf
                                <label for="category" class="m-2">Selecteer een categorie:</label>
                                <select id="category" name="category_id" class="m-2">
                                @foreach ($categories as $cat)
                                    <option value="{{$cat->id}}" name="category_id">{{ $cat->name }}</option>
                                @endforeach
                                </select>
                                <input type="text" name="title" class="m-2" placeholder="Titel..."></input>
                                <input type="text" name="excerpt" class="m-2" placeholder="korte beschrijving..." rows="10"></input>
                                <textarea name="body" class="m-2" placeholder="Tekst..." rows="10"></textarea>
                                <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded m-2">Verstuur</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (Auth::user()->admin == 1)
        <div class="py3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-10">
                <div class="bg-purple-200 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-purple-200 border-b border-gray-200">
                        <h1 class="text-2xl">Maak een Onderwerp:</h1>
                        <form action="/create-category" class="flex flex-col" method="POST">
                            @csrf
                            <input type="text" name="name" class="m-2" placeholder="Naam"></input>
                            <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded m-2">Voeg Toe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (Auth::user()->admin == 1)
        <div class="py3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-10">
                <div class="bg-purple-200 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-purple-200 border-b border-gray-200">
                        <h1 class="text-2xl">Geef een Gebruiker Access</h1>
                            <form action="/update-user" class="flex flex-col" method="POST">
                                @csrf
                                <label for="user" class="m-2">Selecteer een gebruikersnaam:</label>
                                <select id="user" name="user_id" class="m-2">
                                @foreach ($users as $use)
                                    <option value="{{ $use->id }}" name="user_id">{{ $use->username }}</option>
                                @endforeach
                                </select>
                                <button class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded m-2">Update Toegang</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (Auth::user()->admin == 1)
        <div class="py3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-10">
                <div class="bg-purple-200 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-purple-200 border-b border-gray-200">
                        <h1 class="text-2xl">Geef een Gebruiker Admin</h1>
                        <p style="color: crimson;">Admins op deze website kunnen alles beheren.</p>
                            <form action="/update-admin-user" class="flex flex-col" method="POST">
                                @csrf
                                <label for="user" class="m-2">Selecteer een gebruikersnaam:</label>
                                <select id="user" name="user_id" class="m-2">
                                @foreach ($users as $use)
                                    <option value="{{ $use->id }}" name="user_id">{{ $use->username }}</option>
                                @endforeach
                                </select>
                                <button class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded m-2">Update Toegang</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (Auth::user()->admin == 1)
        <div class="py3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-10">
                <div class="bg-purple-200 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-purple-200 border-b border-gray-200">
                        <h1 class="text-2xl">Verwijder een Gebruiker</h1>
                            <form action="/delete-user" class="flex flex-col" method="POST">
                                @csrf
                                <label for="category" class="m-2">Selecteer een gebruikersnaam:</label>
                                <select id="user" name="user_id" class="m-2">
                                @foreach ($users as $use)
                                    <option value="{{ $use->id }}" name="user_id">{{ $use->username }}</option>
                                @endforeach
                                </select>
                                <button class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded m-2">Verwijder Gebruiker</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (Auth::user()->admin == 1)
        <div class="py3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-10">
                <div class="bg-purple-200 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-purple-200 border-b border-gray-200">
                        <h1 class="text-2xl">Verwijder een Bericht</h1>
                            <form action="/delete-post" class="flex flex-col" method="POST">
                                @csrf
                                <label for="post" class="m-2">Selecteer een bericht link posts/'link' :</label>
                                <select id="post" name="post_id" class="m-2">
                                @foreach ($posts as $post)
                                    <option value="{{ $post->id }}" name="post_id">{{ $post->slug }}</option>
                                @endforeach
                                </select>
                                <button class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded m-2">Verwijder Bericht</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (Auth::user()->admin == 1)
        <div class="py3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-10">
                <div class="bg-purple-200 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-purple-200 border-b border-gray-200">
                        <h1 class="text-2xl">Verwijder een Onderwerp</h1>
                            <form action="/delete-topic" class="flex flex-col" method="POST">
                                @csrf
                                <label for="category" class="m-2">Selecteer een categorie:</label>
                                <select id="category" name="category_id" class="m-2">
                                    @foreach ($categories as $cat)
                                        <option value="{{$cat->id}}" name="category_id">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                </select>
                                <button class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded m-2">Verwijder Onderwerp</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
<div class="mb-10">
</x-app-layout>
