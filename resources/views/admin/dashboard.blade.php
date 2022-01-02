<x-app-layout>
    <section id="services" class="services section-bg">
        <div class="container aos-init aos-animate" data-aos="fade-up">
            <div class="section-title mb-4">
                <h2>Users</h2>
            </div>
            @if (!empty($Users) && $Users->count())
                <div class="table-responsive">
                    <table id="example" class="table table-striped " style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Transactions Count</th>
                                <th scope="col">Make Admin</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Users as $User)
                                <tr>
                                    <td> {{ $User->id ?? 0 }}
                                    </td>
                                    <td> <a
                                            href=" {{ route('admin.user.show', $User->account_id) }}">{{ $User->name ?? '' }}</a>
                                    </td>
                                    <td>{{ $User->email ?? 0 }}</td>
                                    <td>{{ $User->transactions_count ?? 0 }}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-secondary"
                                            onclick="event.preventDefault(); document.getElementById('makeAdmin').submit();">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z">
                                                </path>
                                                <path
                                                    d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z">
                                                </path>
                                            </svg>
                                            <span class="visually-hidden">Button</span>
                                        </button>
                                        <form method="POST" id="makeAdmin"
                                            action="{{ route('admin.update', $User->id) }}">
                                            @csrf
                                            @method('put')
                                        </form>
                                    </td>
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
                    {{ $Users->links() }}
                </div>
            </div>
        </div>
        </div>
    </section>
</x-app-layout>
