<x-app-layout>
    @foreach ($userAccount as $account)@endforeach

    <div class="row  col-lg-12 " data-aos="zoom-in" data-aos-delay="200">
        <div class=" d-flex col-lg-12 ">
            <a href=" {{ route('user.withdraw.create') }} " class="col-lg-5 btn-get-started scrollto"
                data-bs-whatever="Withdraw">Withdraw</a>
            <a href="{{ route('user.deposit.create') }}" class="col-lg-5 btn-get-started scrollto"
                data-bs-whatever="Deposit" style="margin-left: 10px;">Deposit</a>
        </div>
        <div class=" d-flex col-lg-12 ">
            <a href="#staticBackdrop" class="col-lg-5 btn-get-started scrollto" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop" data-bs-whatever="Balance Inquire">Balance Inquire</a>
            <a href="{{ route('user.transaction.index') }} " class="col-lg-5 btn-get-started scrollto"
                data-bs-whatever="Transactions" style="margin-left: 10px;">Transactions</a>
        </div>
        <div class=" d-flex col-lg-12 ">
            <a href="#exampleModal" type="button" class="col-lg-5 btn-get-started scrollto" data-bs-toggle="modal"
                data-bs-target="#exampleModal">Information</a>
            <a href="#staticBackdropp" class="col-lg-5 btn-get-started scrollto" data-bs-toggle="modal"
                data-bs-target="#staticBackdropp" data-bs-whatever="Change PIN" style="margin-left: 10px;">Change
                PIN</a>

        </div>
    </div>

    @push('Modal')
        <!-- Modal modal-fullscreen-->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg-12 mt-5 mt-lg-0 ">
                            <div class="row form-group col-lg-12">
                                <div class="col-lg-6">
                                    <h3>Balance</h3>
                                    <h4 class="text-primary"><sup></sup>{{ $account->balance ?? 0 }} <span>EGP</span>
                                    </h4>
                                </div>
                                
                            </div>
                            <div class="my-3 form-group">
                                <a type="button" class="mx-3" data-bs-dismiss="modal">Close</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal modal-fullscreen-->
        <div class="modal fade" id="staticBackdropp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdroppLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdroppLabel">Change PIN</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg-12 mt-5 mt-lg-0 ">
                            <form action="{{ route('user.update.password') }}" method="post" id="myForm">
                                @csrf
                                <div class="section-title">
                                    <h2>Change Your Password</h2>
                                </div>

                                <div class="col-lg-12 text-center">
                                    <h4>Please enter the 50EGP and double it.</h4>
                                </div>
                                <div class="form-group mb-5">
                                    <label class="form-lable-control h6" style="color: black" for="name">type new
                                        password</label>
                                    <input type="password" class="form-control" name="password" id="password" required />
                                </div>
                           
                        </div>
                        <div class="my-3 form-group">
                            <button type="submit" class="btn btn-primary mb-2">Confirm</button>
                            <a type="button" class="mx-3" data-bs-dismiss="modal">Close</a>
                             </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg-12 mt-5 mt-lg-0 ">
                            <div class="row form-group col-lg-12">
                                <div class="col-lg-6">
                                    <h5>Number Of Transaction</h5>
                                    <h6 class="text-primary"><sup></sup>{{ $account->transactions_count ?? 0 }}
                                    </h6>
                                </div>
                                <div class="col-lg-6">
                                    <h5>Last Transaction In </h5>
                                    <h6 class="text-primary"><sup></sup>{{ $lastTransactions[0]->created_at ?? 'no transactions yet' }}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endpush
        <!--  <div class="row  col-lg-12 " data-aos="zoom-in" data-aos-delay="200">
            <div class=" d-flex col-lg-12 ">
                <a href="#about" class="col-lg-5 btn-get-started scrollto" data-bs-whatever="Withdraw">Withdraw</a>
                <a href="#about" class="col-lg-5 btn-get-started scrollto" data-bs-whatever="Deposit"style="margin-left: 10px;">Deposit</a>
            </div>
              <div class=" d-flex col-lg-12 ">
                <a href="#about" class="col-lg-5 btn-get-started scrollto"data-bs-whatever="Balance Inquire">Balance Inquire</a>
                <a href="#about" class="col-lg-5 btn-get-started scrollto" data-bs-whatever="Transactions"style="margin-left: 10px;">Transactions</a>
            </div>
              <div class=" d-flex col-lg-12 ">
                <a href="#about" class="col-lg-5 btn-get-started scrollto"data-bs-whatever="Information">Information</a>
                <a href="#about" class="col-lg-5 btn-get-started scrollto" data-bs-whatever="Change PIN"style="margin-left: 10px;">Change PIN</a>
            </div>
        </div> -->

        @push('scripts')
            <script type="text/javascript">
                var exampleModal = document.getElementById('staticBackdrop')
                exampleModal.addEventListener('show.bs.modal', function(event) {
                    // Button that triggered the modal
                    var button = event.relatedTarget
                    // Extract info from data-bs-* attributes
                    var recipient = button.getAttribute('data-bs-whatever')
                    // If necessary, you could initiate an AJAX request here
                    // and then do the updating in a callback.
                    //
                    // Update the modal's content.
                    var modalTitle = exampleModal.querySelector('.modal-title')
                    //var modalBodyInput = exampleModal.querySelector('.modal-body input')

                    modalTitle.textContent = recipient
                    //modalBodyInput.value = recipient
                })
            </script>
        @endpush
</x-app-layout>
