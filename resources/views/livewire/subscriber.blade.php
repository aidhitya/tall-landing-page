<div class="p-6 bg-white border-b border-gray-200">
    <div class="px-8">
        <x-input wire:model="search" class="float-right w-1/3 pl-8 mb-4 border border-gray-500 rounded-lg" placeholder="Search Email" type="text"></x-input>
        @if ($subscribers->isEmpty())
            <div class="w-3/5 p-3 bg-red-100 rounded-lg">
                <p class="text-red-600">
                    Subscriber Not Found
                </p>
            </div>
        @else
            <table class="w-full table-auto">
                <thead class="border-b-2 border-collapse border-indigo-700">
                    <tr>
                        <th class="p-5">No</th>
                        <th class="p-5">Email</th>
                        <th class="p-5">Verified</th>
                        <th class="p-5">Action</th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($subscribers as $key => $item)
                        <tr class="border-b-2 border-collapse border-indigo-300">
                            <td class="p-5 text-center">{{ $key + 1 }}</td>
                            <td class="p-5 text-center">{{ $item->email }}</td>
                            <td class="p-5 text-center">
                                {{ $item->email_verified_at->diffForHumans() ?? 'Not Verified' }}
                            </td>
                            <td class="p-5 text-center">
                                <x-button class="px-4 py-1 text-red-600 border-red-600 hover:bg-red-200 bg-red-50" wire:click="delete({{ $item->id }})">
                                    Delete
                                </x-button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>