@if(!empty($Users) && $Users->count())
<div class="table-responsive">
    <table id="example" class="table table-striped " style="width:100%">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Transactions Count</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($Users as $User)
            <tr>
                <td> {{ $User->id ?? 0}}
                </td>
                <td> <a href="#" role="button" data-bs-toggle="modal"
                        data-bs-target="#exampleModal" data-bs-whatever="{{ $User->name ?? ''}}">{{
                        $User->name ?? ''}}</a>
                </td>
                <td>{{ $User->email ?? 0}}</td>
                <td>{{ $User->transactions_count ?? 0}}</td>
            </tr>
            @endforeach
            @else
            <tr>
                <td>
                    There are no data to show .
                </td>
            </tr>
            
        </tbody>
    </table>
</div>
@endif
