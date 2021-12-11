<x-app-layout>
        @foreach ($userAccount as $account)@endforeach

 <div class="row  col-lg-12 " data-aos="zoom-in" data-aos-delay="200">
            <div class=" d-flex col-lg-12 ">
                <a href=" {{ route('user.withdraw.create')}} " class="col-lg-5 btn-get-started scrollto" data-bs-whatever="Withdraw">Withdraw</a>
                <a href="{{ route('user.deposit.create')}}" class="col-lg-5 btn-get-started scrollto" data-bs-whatever="Deposit"style="margin-left: 10px;">Deposit</a>
            </div>
              <div class=" d-flex col-lg-12 ">
                <a href="#staticBackdrop" class="col-lg-5 btn-get-started scrollto"
                data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-whatever="Balance Inquire">Balance Inquire</a>
                <a href="{{ route('user.transaction.index')}} " class="col-lg-5 btn-get-started scrollto" data-bs-whatever="Transactions"style="margin-left: 10px;">Transactions</a>
            </div>
              <div class=" d-flex col-lg-12 ">
                <a href="#about" class="col-lg-5 btn-get-started scrollto"data-bs-whatever="Information">Information</a>
                <a href="#about" class="col-lg-5 btn-get-started scrollto" data-bs-whatever="Change PIN"style="margin-left: 10px;">Change PIN</a>
            </div>
        </div>

@push('Modal')
  <!-- Modal modal-fullscreen-->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg " >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <div class="col-lg-12 mt-5 mt-lg-0 ">
                <div class="row form-group col-lg-12">
                    <div class="col-lg-6" >
                        <h3>Balance</h3>
                        <h4 class="text-primary"><sup></sup>{{ $account->balance ?? 0}} <span>EGP</span></h4>
                    </div>
                    <div class="col-lg-6" >
                        <h3>Available Balance </h3>
                        <h4 class="text-primary"><sup></sup>{{ $account->available_balance ?? 0}} <span>EGP</span></h4>
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
</x-app-layout>
