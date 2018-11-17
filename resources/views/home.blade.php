@extends('layouts.app')

@section('content')
    <div class="container mx-auto h-full">
        <div class="">

            <div class="container">
                <a href="/vocabularies/create" class="bg-blue-darker hover:bg-blue-dark text-white text-sm font-semibold py-2 px-4 rounded mr-3 no-underline">Add Vocabulary</a>
                <br><br>
            </div>

            <div class="rounded shadow-lg">
                <div class="font-medium text-lg text-white bg-blue-darker p-3 rounded-t">
                    Vocabulary
                </div>
                <div class="bg-white p-3 rounded-b">



                @if (session('status'))
                        <div
                            class="bg-green-lightest border border-green-light text-green-dark text-sm px-4 py-3 rounded mb-4">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="border-t border-b border-grey-light overflow-hidden relative">
                        <div
                            class=" overflow-y-auto scrollbar-w-2 scrollbar-track-grey-lighter scrollbar-thumb-rounded scrollbar-thumb-grey scrolling-touch">
                            <table class="w-full text-left table-collapse">
                                <thead>
                                <tr>
                                    <th class="text-lg font-semibold text-grey-darker p-1 bg-grey-lightest">#</th>
                                    <th class="text-lg font-semibold text-grey-darker p-1 bg-grey-lightest">Hiragana</th>
                                    <th class="text-lg font-semibold text-grey-darker p-1 bg-grey-lightest">English</th>
                                    <th class="text-lg font-semibold text-grey-darker p-1 bg-grey-lightest">#</th>
                                </tr>
                                </thead>
                                <tbody class="align-baseline">
                                @foreach($vocabularies as $vocabulary)
                                    <tr>
                                        <td class="p-2 border-t border-grey-light font-mono text-base text-blue-dark whitespace-no-wrap">
                                            {{ $vocabulary->id }}
                                        </td>
                                        <td class="p-2 border-t border-grey-light font-mono text-base text-blue-dark whitespace-no-wrap">
                                            {{ $vocabulary->hiragana }}
                                        </td>
                                        <td class="p-2 border-t border-grey-light font-mono text-base text-blue-dark whitespace-no-wrap">
                                            {{ $vocabulary->meaning_in_english }}
                                        </td>
                                        <td class="p-2 border-t border-grey-light font-mono text-base text-blue-dark whitespace-no-wrap">
                                            <a href="/vocabularies/edit/{{ $vocabulary->id }}"
                                               class="btn btn-sm btn-primary text-blue-dark">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
