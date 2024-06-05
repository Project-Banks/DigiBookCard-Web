@extends('layouts.back-end.app')

@section('title', translate('withdraw_Request'))

@push('css_or_js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')
    <div class="content container-fluid">
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img width="20" src="{{dynamicAsset(path: 'public/assets/back-end/img/withdraw-icon.png')}}" alt="">
                {{translate('withdraw_Request')}}
            </h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="px-3 py-4">
                        <div class="row align-items-center">
                            <div class="col-lg-4">
                                <h5>
                                    {{ translate('withdraw_Request_Table')}}
                                    <span  class="badge badge-soft-dark radius-50 fz-12 ml-1" id="withdraw-requests-count">{{ $withdrawRequests->total() }}</span>
                                </h5>
                            </div>
                            <div class="col-lg-8 mt-3 mt-lg-0 d-flex gap-3 justify-content-lg-end">
                                <button type="button" class="btn btn-outline--primary text-nowrap"
                                        data-toggle="dropdown">
                                    <i class="tio-download-to"></i>
                                    {{ translate('export') }}
                                    <i class="tio-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a class="dropdown-item withdraw-request-file-export" href="javascript:"  data-action="{{route('admin.delivery-man.withdraw-list-export')}}">
                                            <img width="14" src="{{dynamicAsset(path: 'public/assets/back-end/img/excel.png')}}" alt="">
                                            {{translate('excel')}}
                                        </a>
                                    </li>
                                </ul>
                                <select name="status" class="custom-select min-w-120 max-w-200 status-filter">
                                    <option value="all" {{ request('approved') == 'all'?'selected':''}}>{{translate('all')}}</option>
                                    <option value="approved" {{ request('approved') == 'approved' ?'selected':''}}>{{translate('approved')}}</option>
                                    <option value="denied" {{ request('approved') == 'denied'?'selected':''}}>{{translate('denied')}}</option>
                                    <option value="pending" {{ request('approved') == 'pending'?'selected':''}}>{{translate('pending')}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="status-wise-view">
                        @include('admin-views.delivery-man.withdraw._table')
                    </div>
                    <div class="table-responsive mt-4">
                        <div class="px-4 d-flex justify-content-center justify-content-md-end">
                            {{$withdrawRequests->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <span id="get-status-filter-route" data-action="{{ route('admin.delivery-man.withdraw-list') }}"></span>
    <div class="withdraw-info-sidebar-wrap withdraw-details-view">
    </div>
@endsection
@push('script_2')
    <script src="{{dynamicAsset(path: 'public/assets/back-end/js/admin/withdraw.js')}}"></script>
@endpush
