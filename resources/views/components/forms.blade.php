<div class="card shadow border-0 ft-card p-4">
    <form action="{{ route('transactions.store') }}" method="POST" id="transactionForm">
        @csrf
        <div class="row gy-4">
            <div class="col-6">
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">
                        Type
                    </label>
                    <select class="form-select ft-select" id="transactionType" name="type"
                        aria-label="Select type of transaction">
                        @foreach ($data['types'] as $type)
                            <option value="{{ $type->value }}" {{ old('type') == $type->value ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('type')
                        <div class="text-danger fst-italic">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">
                        Category
                    </label>
                    <select class="form-select {{ old('type', 'EXPENSE') == 'EXPENSE' ? '' : 'd-none' }}" name="category" id="categoryExpense"
                        aria-label="Select category of expense">
                        @foreach ($data['expenses'] as $expense)
                            <option value="{{ $expense->id }}" {{ old('category') == $expense->id ? 'selected' : '' }}>
                                {{ $expense->name }}
                            </option>
                        @endforeach
                    </select>
                    <select class="form-select {{ old('type', 'EXPENSE') == 'INCOME' ? '' : 'd-none' }}" name="category" id="categoryIncome" aria-label="Select category of income">
                        @foreach ($data['incomes'] as $income)
                            <option value="{{ $income->id }}" {{ old('category') == $income->id ? 'selected' : '' }}>
                                {{ $income->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="text-danger fst-italic">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="amountInput" class="form-label">
                        Amount
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">$</span>
                        <input type="text" name="amount" class="form-control amount-input" id="amountInput" value="{{ old('amount') }}">
                    </div>
                    @error('amount')
                        <div class="text-danger fst-italic">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="dateInput" class="form-label">
                        Date
                    </label>
                    <input type="date" name="date" class="form-control" id="dateInput" value="{{ old('date') }}">
                    @error('date')
                        <div class="text-danger fst-italic">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-outline-primary mt-4 w-100" id="buttonSubmit">
            <span class="btn-text">
                Create
            </span>
            <div class="spinner-border btn-loading spinner-border-sm ms-3 d-none" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </button>
    </form>
    <hr class="mt-4">
    <div class="ft-transactions-list">
        @forelse($transactions as $data)
            <div class="ft-transaction-item mb-3 d-flex">
                <div
                    class="ft-transaction-icon ft-transaction-{{ $data->transaction_type->value == 'INCOME' ? 'success' : 'danger' }} d-flex justify-content-center align-items-center">
                    <i class="bi bi-coin"></i>
                </div>
                <div class="ft-transaction-info ms-3">
                    <h6 class="ft-fw-bold ft-transaction-title mt-2">
                        {{ $data->category->name }}
                        <br>
                        <span class="ft-fw-light ft-transaction-desc mt-2">
                            ${{ format_amount($data->amount) }} - {{ date('l, d F Y', strtotime($data->transaction_date)) }}
                        </span>
                    </h6>
                </div>
                <div class="ft-transaction-action align-items-end ms-auto my-auto">
                    <form action="{{ route('transactions.delete', ['code' => $data->code]) }}" method="POST" id="transactionDelete">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger" id="buttonDelete">
                            <span class="btn-icon">
                                <i class="bi bi-trash"></i>
                            </span>
                            <div class="spinner-border btn-loading spinner-border-sm d-none" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <h5 class="ft-fw-semibold text-center mt-5">
                Transactions is Empty
            </h5>
        @endforelse
    </div>
</div>

@push('scripts')
    <script>
        $('#transactionType').change(function(e) {
            let value = $(this).val()

            if (value == 'INCOME') {
                $('#categoryIncome').removeClass('d-none');
                $('#categoryExpense').addClass('d-none');
            } else {
                $('#categoryIncome').addClass('d-none');
                $('#categoryExpense').removeClass('d-none');
            }
        });

        $('#transactionForm').on('submit', function() {
            let btn = $('#buttonSubmit');

            btn.find('.btn-text').text('Processing...');
            btn.find('.btn-loading').removeClass('d-none');
            btn.prop('disabled', true);
        });

        $('#transactionDelete').on('submit', function() {
            let btn = $('#buttonDelete');

            btn.find('.btn-icon').addClass('d-none');
            btn.find('.btn-loading').removeClass('d-none');
            btn.prop('disabled', true);
        });

        $('.amount-input').inputmask("currency", {
            placeholder: '0',
            numericInput: true,
            digits: '0',
            autoUnmask: true,
            removeMaskOnSubmit: true,
            rightAlign: false
        });
    </script>
@endpush
