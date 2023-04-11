<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Types') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="">

            @if (session()->has('success'))
                <div id="flash-message" style="width: 400px; position: fixed; top: 150px; right: 10px"
                    class="bg-green-500 text-white py-2 px-4 rounded">
                    {{ session()->get('success') }}
                </div>
            @endif

            <center>
                <h1 class="text-4xl font-bold text-white">Types List</h1>
            </center>
            <a href="/Types/Add"
                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 p-20">Add Type</a>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">

                <table class="w-full text-sm text-center text-gray-500">
                    <thead class="text-xs text-white uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                        <tr>
                            <th scope="col" class="px-6 py-3">ID</th>
                            <th scope="col" class="px-6 py-3">Type</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($Types as $Type)
                            <tr>
                                <td class="px-6 py-4">{{ $Type->id }}</td>
                                <td class="px-6 py-4">{{ $Type->type }}</td>
                                <td class="px-6 py-4" style="">
                                    <a href="{{ route('TypesEdit' , $Type->id) }}" style="color: green; margin-right: 10px;">Edit</a>
                                    <form action="{{ route('TypesDestroy', $Type->id) }}" method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" style="color: red; cursor:pointer;">delete</button>
                                    </form>
                                  </td>
                                  
                                  
                            @empty
                                <td colspan="4" class="px-6 py-4">
                                    <center class="text-2xl font-bold">There is no Type yet !</center>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <script>
        setTimeout(function() {
            document.getElementById('flash-message').style.display = 'none';
        }, 4000);
    </script>

</x-app-layout>
