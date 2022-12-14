@extends('body.layout.master')
@section('title', 'home')
@section('content')
    <div class="home_page">
        <h1>ABC BANK</h1>

        <!-- Source: https://getbootstrap.com/docs/5.1/components/accordion/#example -->
        <!-- Accordion Begin -->
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    {{-- <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Accordion Item #1
          </button> --}}
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">

                        <!-- Source: https://getbootstrap.com/docs/5.1/components/navs-tabs/#javascript-behavior (2nd example using <nav>) -->
                        <!-- Tabs Begin -->
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                    aria-selected="true"><i class="las la-home"></i>Home</button>
                                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                                    aria-selected="false"><i class="las la-cloud-upload-alt"></i>Deposit</button>
                                <button class="nav-link" id="nav-withdraw-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-withdraw" type="button" role="tab" aria-controls="nav-contact"
                                    aria-selected="false"><i class="las la-cloud-download-alt"></i>Withdraw</button>
                                <button class="nav-link" id="nav-transfer-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-transfer" type="button" role="tab"
                                    aria-controls="nav-transfer" aria-selected="false"><i class="las la-exchange-alt"></i>Transfer</button>
                                <button class="nav-link" id="nav-statement-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-statement" type="button" role="tab"
                                    aria-controls="nav-statement" aria-selected="false"><i class="lar la-file-alt"></i>Statement</button>
                                <a class="nav-link" href="{{url('account_signout')}}" type="button" aria-controls="nav-logout"
                                    aria-selected="false"><i class="las la-sign-out-alt"></i>Logout</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <div class="home-table">
                                    <div class="data-align">
                                        <div>
                                            <h5>Welcome {{ ucfirst($user->name) }}</h5>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-6">YOUR ID</div>
                                            <div class="col-6"><b>{{ $user->email }}</b></div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-6">YOUR BALANCE</div>
                                            <div class="col-6">
                                                <b>{{ $balance }}
                                                    INR</b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="home-table">
                                    <div class="data-align">
                                        <form action="{{ url('deposite-money') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <!-- Name input -->
                                            <div class="form-outline mb-4">
                                                <label class="form-label label" for="form5Example1">Amount</label>
                                                <input type="text" id="form5Example1" class="form-control"
                                                    name="amount" />

                                            </div>
                                            <!-- Submit button -->
                                            <button type="submit" class="btn btn-primary btn-block mb-4">Deposite</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-withdraw" role="tabpanel" aria-labelledby="nav-withdraw-tab">
                                <div class="home-table">
                                    <div class="data-align">
                                        <form action="{{ url('withdraw-money') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <!-- Name input -->
                                            <div class="form-outline mb-4">
                                                <label class="form-label label" for="form5Example1">Amount</label>
                                                <input type="text" id="form5Example1" class="form-control"
                                                    name="w_amount" />

                                            </div>
                                            <!-- Submit button -->
                                            <button type="submit"
                                                class="btn btn-primary btn-block mb-4">Withdraw</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-transfer" role="tabpanel"
                                aria-labelledby="nav-transfer-tab">
                                <div class="transfer_table">
                                    <div class="data-align">
                                        <form action="{{ url('transfer-money') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <!-- email -->
                                            <div class="form-outline mb-4">
                                                <label class="form-label label" for="form5Example1">Email</label>
                                                <input type="email" id="form5Example1" class="form-control"
                                                    name="email_id" />

                                            </div>
                                            <!-- Name input -->
                                            <div class="form-outline mb-4">
                                                <label class="form-label label" for="form5Example1">Amount</label>
                                                <input type="text" id="form5Example1" class="form-control"
                                                    name="T_amount" />

                                            </div>
                                            <!-- Submit button -->
                                            <button type="submit"
                                                class="btn btn-primary btn-block mb-4">Transfer</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-statement" role="tabpanel"
                                aria-labelledby="nav-statement-tab">
                                <div class="statement_table">
                                    <div class="data-align">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>DATETIME</th>
                                                        <th>AMOUNT</th>
                                                        <th>TYPE</th>
                                                        <th>DETAILS</th>
                                                        <th>BALANCE</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- {{$slno=0}} -->
                                                    @if(!empty($transactions))
                                                    @foreach ($transactions as $transaction)
                                                        <tr>
                                                            <td>{{$slno+=1}}</td>
                                                            <td>{{ \Carbon\Carbon::parse($transaction->created_at)->toDayDateTimeString() }}</td>
                                                            <td>{{ $transaction->amount }}</td>
                                                            <td>
                                                                @if($transaction->transaction_type == 2)
                                                                <label for="">Debit</label>
                                                                @else
                                                                <label for="">Credit</label>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($transaction->transaction_type == 1)
                                                                <label for="">Deposite</label>
                                                                @elseif($transaction->transaction_type == 2)
                                                                <label for="">Withdraw</label>
                                                                @else
                                                                <label for="">Transfer From {{$transaction->details}}</label>
                                                                @endif
                                                            </td>
                                                            <td>{{number_format((float) $transaction->balance, 2, '.', '')  }}</td>
                                                        </tr>
                                                    @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="tab-pane fade" id="nav-logout" role="tabpanel" aria-labelledby="nav-logout-tab">
                                Logout
                            </div> --}}
                            <!-- Tabs End -->

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Accordion End -->
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
        </script>
    @endsection
