<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Dashboard1') }}
                </h2>
            </div>
            <div>
                <span>
                    Баланс: {{ $accountBalance['balance'] }} {{ $accountBalance['currency'] }}
                </span>
            </div>
        </div>

    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">

                                    <form action="/dashboard" method="get" class="flex w-48 gap-2 justify-start mb-4">
                                        <input type="text" name="dateFrom" placeholder="С">
                                        <input type="text" name="dateTo" placeholder="По">
                                        <x-button class="w-full">
                                            {{ __('Фильтр') }}
                                        </x-button>
                                    </form>

                                    <table class="min-w-full">
                                        <thead class="border-b">
                                        <tr>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                #
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Тип операции
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Сумма
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Комментарий
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Дата
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach ($transactions as $transaction)
                                            <tr class="border-b">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    {{ $transaction['id'] }}
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                                                    @if ($transaction['type'] == 1)
                                                        Пополнение
                                                    @endif

                                                    @if ($transaction['type'] == 2)
                                                        Списание
                                                    @endif

                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $transaction['amount'] }}
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $transaction['comment'] }}
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $transaction['created_at'] }}
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
        </div>
    </div>

    <script>

        document.addEventListener("DOMContentLoaded", function ()
        {
            const from = document.querySelector('input[name="dateFrom"]');
            new Datepicker(from, {
                format: 'dd-mm-yyyy'
            });

            const to = document.querySelector('input[name="dateTo"]');
            new Datepicker(to, {
                format: 'dd-mm-yyyy'
            });
        });

    </script>

</x-app-layout>
