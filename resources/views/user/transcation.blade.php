<x-app-layout>
  <div
    class="row col-lg-12 d-flex align-items-stretch  p-4 one"
    data-aos="zoom-in"
    data-aos-delay="200"
  >
      <div class="section-title">
        <h2>Transactions</h2>
      </div>

 <div class="table-responsive">
  <table id="example" class="table table-striped text-white" style="width:100%">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">type</th>
        <th scope="col">amount</th>

        <th scope="col">date</th>

      </tr>
    </thead>
    <tbody>
      @foreach ($userTransactions as $user_transactions)
      <tr>
        <td> {{ $user_transactions->id ?? 0}}</td>
        <td>{{ $user_transactions->tr_name?? 0}}</td>
        <td>{{ $user_transactions->tr_amount ?? 0}}</td>
        <td>{{ $user_transactions->created_at ?? 0}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>  
      <div class="row form-group col-lg-12">
        <div class="col-lg-9">
            <div class="col-lg-9 mt-2">
              {{ $userTransactions->links()}}
            </div>
        </div>
        <div class="col-lg-3  ">
          <a  href=" {{ route('user.dashboard')}}" type="button" class="btn btn-secondary">Go Back</a>
        </div>
      </div>
  </div>
<!--      <link rel="stylesheet" rel="preload" type="text/css" as="style" onload="this.rel='stylesheet'"
    href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">--> <!-- dataTables -->
@push('scripts')
<!-- 
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
  </script>-->
@endpush 
</x-app-layout>
