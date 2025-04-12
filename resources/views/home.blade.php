@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center mt-5">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <h3 class="ft-fw-bold text-center">Fintrack</h3>
                <p class="ft-fw-light text-center">Track your income and expense</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                @include('components.income')
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                @include('components.forms')
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                @include('components.expense')
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @if (session('success'))
        <script>
            toastr.success("{{ session('success') }}");
        </script>
    @endif

    @if (session('error'))
        <script>
            toastr.error("{{ session('error') }}");
        </script>
    @endif
@endpush
