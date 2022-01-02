<x-app-layout>
        @foreach ($user as $info)@endforeach
    <section id="services" class="services section-bg">
        <div class="container aos-init aos-animate" data-aos="fade-up">
            <div class="section-title mb-4">
                <h2>Transactions For Client ( {{ $info->name ?? ''}})</h2>
            </div>
            @if (!empty($transactions) &&$transactions->count())
                <div class="table-responsive">
                    <table id="example" class="table table-striped " style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Account ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Type</th>
                                <th scope="col">Balance</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Balance After Transaction</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as  $transaction)
                                <tr>
                                    <td> {{ $transaction->id ?? 0 }}
                                    </td>
                                    <td> {{ $transaction->account_id ?? 0 }}
                                    </td>
                                    <td>{{ $info->name ?? '' }}</td>
                                    <td>{{ $transaction->tr_name ?? '' }}</td>
                                    <td>{{ $transaction->balance ?? 0 }}</td>
                                    <td>{{ $transaction->tr_amount ?? 0 }}</td>
                                    <td>{{ $transaction->balance_after_tr ?? 0 }}</td>

                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>
                                    There are no data to show .
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
               
           
            <div class="row form-group col-lg-12">
                <div class="col-lg-9">
                    <div class="col-lg-9 mt-2">
                        {{ $transactions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
