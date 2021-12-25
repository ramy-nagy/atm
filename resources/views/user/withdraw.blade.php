<x-app-layout>
  <div class="row col-lg-12 d-flex align-items-stretch  p-4 one" data-aos="zoom-in" data-aos-delay="200">
    <form action="{{ route('user.withdraw.store')}}" method="post" id="myForm">
      @csrf
      <div class="section-title">
        <h2>Withdraw</h2>
      </div>

      <div class="col-lg-12 text-center">
        <h4>Please enter the 50EGP and double it.</h4>
      </div>
      <div class="form-group mb-5">
        <label class="form-lable-control h6" for="name">Amount</label>
        <input type="number" min="50" max="3000" class="form-control" name="amount" id="amount" required=""
          placeholder="0" />
      </div>
      @foreach ($userAccount as $account)@endforeach
      <div class="row form-group col-lg-12">
        <div class="col-lg-9">
          <div class="col-lg-9">
            <div class="alert alert-primary" role="alert">
              Balance : <span class="alert-link">{{ $account->balance ?? 0}}</span> EGP
            </div>
            <div class="alert alert-primary" role="alert">
              Available Balance : <span class="alert-link"> {{ $account->available_balance ?? 0}} </span> EGP
            </div>
          </div>
        </div>
        <div class="col-lg-3  ">
          <button type="submit" class="btn btn-primary mb-2">Confirm</button>
          <button type="button" class="btn btn-warning mb-2"
            onclick="document.getElementById('myForm').reset();">Re-enter</button>
          <a href=" {{ route('user.dashboard')}}" type="button" class="btn btn-secondary mb-2">Go Back</a>
        </div>
      </div>
    </form>
  </div>

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