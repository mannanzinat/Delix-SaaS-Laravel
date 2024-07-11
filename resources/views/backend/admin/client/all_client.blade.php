@extends('backend.layouts.master')
@section('title', __('clients'))
@section('content')
    <section class="oftions">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-top d-flex justify-content-between align-items-center">
                        <h3 class="section-title">{{__('client_list') }}</h3>
                        @can('client.create')
                        <div class="oftions-content-right mb-12">
                            <a href="{{ route('clients.create') }}" class="d-flex align-items-center btn sg-btn-primary gap-2">
                                <i class="las la-plus"></i>
                                <span>{{__('add_client') }}</span>
                            </a>
                        </div>
                        @endcan
                    </div>
                    <div class="row">
                        <div class="col-xxl-3 col-lg-6 col-md-6 mb-20 mb-xxl-0">
                            <div class="bg-white redious-border p-20 p-sm-30">
                                <div class="analytics clr-1">
                                    <div class="analytics-icon">
                                        <i class="las la-landmark"></i>
                                    </div>

                                    <div class="analytics-content">
                                        <h4>{{ $client }}</h4>
                                        <p>{{__('total_client') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-lg-6 col-md-6 mb-20 mb-xxl-0">
                            <div class="bg-white redious-border p-20 p-sm-30">
                                <div class="analytics clr-2">
                                    <div class="analytics-icon">
                                        <i class="lar la-thumbs-up"></i>
                                    </div>

                                    <div class="analytics-content">
                                        <h4>{{ $approved_clients }}</h4>
                                        <p>{{__('approved_client') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-lg-6 col-md-6 mb-20 mb-lg-0">
                            <div class="bg-white redious-border p-20 p-sm-30">
                                <div class="analytics clr-3">
                                    <div class="analytics-icon">
                                        <i class="las la-user"></i>
                                    </div>

                                    <div class="analytics-content">
                                        <h4>{{ $users }}</h4>
                                        <p>{{__('total_team') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-lg-6 col-md-6">
                            <div class="bg-white redious-border p-20 p-sm-30">
                                <div class="analytics clr-4">
                                    <div class="analytics-icon">
                                        <i class="las la-ban"></i>
                                    </div>

                                    <div class="analytics-content">
                                        <h4>{{ $inactive_clients }}</h4>
                                        <p>{{__('inactive_client') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white redious-border p-20 p-sm-30 mt-30">
                        <div class="row mb-20">
                            <div class="col-lg-12">
                                <div class="default-list-table table-responsive yajra-dataTable">
                                    {{ $dataTable->table() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <button class="btn testpurpose">submit</button> --}}
@endsection
@include('backend.common.change-status-script')
@include('backend.common.delete-script')
@push('js')
    {{ $dataTable->scripts() }}
    <script>
        $(document).ready(function() {
            $(document).on('change', 'input[name="active_domain"]', function() {
                var clientId    = $(this).data('client-id');
                var field       = $(this).data('field');
                var value       = $(this).is(':checked') ? 1 : 0;

                $.ajax({
                    url: '/clients/update-active-domain-status',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        client_id: clientId,
                        field: field,
                        value: value
                    },
                    success: function(response) {
                        console.log('Active domain update successful:', response);
                    },
                    error: function(xhr, status, error) {
                        console.error('Active domain update failed:', error);
                    }
                });
            });

            $(document).on('change', 'input[name="deployed_script"]', function() {
                var clientId    = $(this).data('client-id');
                var field       = $(this).data('field');
                var value       = $(this).is(':checked') ? 1 : 0;

                $.ajax({
                    url: '/clients/update-deployed-script-status',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        client_id: clientId,
                        field: field,
                        value: value
                    },
                    success: function(response) {
                        console.log('Deployed script update successful:', response);
                    },
                    error: function(xhr, status, error) {
                        console.error('Deployed script update failed:', error);
                    }
                });
            });

            $(document).on('change', 'input[name="ssl_active"]', function() {
                var clientId    = $(this).data('client-id');
                var field       = $(this).data('field');
                var value       = $(this).is(':checked') ? 1 : 0;

                $.ajax({
                    url: '/clients/update-ssl-active-status',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        client_id: clientId,
                        field: field,
                        value: value
                    },
                    success: function(response) {
                        console.log('SSL active update successful:', response);
                    },
                    error: function(xhr, status, error) {
                        console.error('SSL active update failed:', error);
                    }
                });
            });
        });
    </script>
@endpush



