@extends('layout.app-dashboard')

@section('title', $title)

@push('css')
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Meals table</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Transaction ID</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Amount</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
{{--                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
{{--                                {{dd($item)}}--}}
                                <tr>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$item['user_name']}}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$item['transaction_id']}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold mb-0">{{$item['amount']}}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{$item['status']}}</span>
                                    </td>
{{--                                    <td class="align-middle text-center">--}}
{{--                                        <div class="d-flex justify-content-center align-items-center gap-2">--}}
{{--                                            <a href="{{ route('dashboard.edit-meal', $item->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit meal">--}}
{{--                                                Edit--}}
{{--                                            </a>--}}
{{--                                            <form action="{{ route('dashboard.delete-meal', $item->id) }}" method="POST" class="d-inline">--}}
{{--                                                @csrf--}}
{{--                                                @method('DELETE')--}}
{{--                                                <button type="submit" class="text-danger font-weight-bold text-xs border-0 bg-transparent" onclick="return confirm('Are you sure you want to delete this meal?');">--}}
{{--                                                    Delete--}}
{{--                                                </button>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush
