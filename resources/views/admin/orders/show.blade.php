@extends('admin.layouts.app') {{-- Đảm bảo bạn đang extend đúng layout của admin --}}

@section('title', 'Trang Chi Tiết Đơn Hàng | Larkon - Responsive Admin Dashboard Template')
@section('page-title', 'Chi tiết đơn hàng #' . $order->id) {{-- Đảm bảo biến $OrderDetail được truyền vào --}}

@section('content')

    <div class="container p-0">

        <div class="row">
            <div class="col-xl-9 col-lg-8">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
                                    <div>
                                        <h4 class="fw-medium text-dark d-flex align-items-center gap-2">
                                            #{{ $order->id }}
                                            @if ($order->status_payment == 'đã thanh toán')
                                                <span class="badge bg-success-subtle text-success px-2 py-1 fs-13">{{$order->status_payment}}</span>
                                            @else
                                                <span class="badge bg-danger-subtle text-danger px-2 py-1 fs-13">{{$order->status_payment}}</span>
                                            @endif
                                            @if ($order->status_order == 'chờ xử lý')
                                                <span
                                                    class="badge border border-warning text-warning fs-13 px-2 py-1 rounded">{{$order->status_order}}</span>
                                            @elseif($order->status_order == 'đang xử lý')
                                                <span
                                                    class="badge border border-info text-info fs-13 px-2 py-1 rounded">{{$order->status_order}}</span>
                                            @elseif($order->status_order == 'đang vận chuyển')
                                                <span
                                                    class="badge border border-primary text-primary fs-13 px-2 py-1 rounded">{{$order->status_order}}</span>
                                            @elseif($order->status_order == 'đang giao')
                                                <span
                                                    class="badge border border-success text-success fs-13 px-2 py-1 rounded">{{$order->status_order}}</span>
                                            @elseif($order->status_order == 'đã hủy')
                                                <span
                                                    class="badge border border-danger text-danger fs-13 px-2 py-1 rounded">{{$order->status_order}}</span>
                                            @elseif($order->status_order == 'giao hàng thanh công')
                                                <span
                                                    class="badge border border-danger text-danger fs-13 px-2 py-1 rounded">{{$order->status_order}}</span>
                                            @elseif($order->status_order == 'giao hàng thất bại')
                                                <span
                                                    class="badge border border-danger text-danger fs-13 px-2 py-1 rounded">{{$order->status_order}}</span>
                                            @elseif($order->status_order == 'hoàn thành')
                                                <span
                                                    class="badge border border-danger text-danger fs-13 px-2 py-1 rounded">{{$order->status_order}}</span>
                                            @else
                                                <span
                                                    class="badge border border-secondary text-secondary fs-13 px-2 py-1 rounded">{{ ucfirst($order->status_order) }}</span>
                                            @endif
                                        </h4>
                                        <p class="mb-0">Order / Order Details / #{{ $order->id }} -
                                            {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y \l\ú\c H:i') }}
                                        </p>
                                    </div>
                                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                                        @if($order->status_order == 'chờ xử lý')
                                            <span class="text-white px-2 py-1 fs-13"
                                            style="cursor: pointer;">
                                                <form id="statusForm" action="{{route('admin.orders.update-status',$order->id)}}" method="POST"> {{-- Đảm bảo route này chính xác --}}
                                                    <div class="modal-body">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="order_id" id="orderId">
                                                        <input type="hidden" name="status" value="đang xử lý">
                                                        {{-- <div class="mb-3">
                                                            <label for="status" class="form-label">Trạng thái</label>
                                                            <select name="status" id="status" class="form-select">
                                                                <option {{$order->status_order == 'đã hủy' ? 'selected':''}} value="đã hủy">đã hủy</option>
                                                                <option {{$order->status_order == 'chờ xử lý' ? 'selected':''}} value="chờ xử lý">chờ xử lý</option>
                                                                <option {{$order->status_order == 'đang xử lý' ? 'selected':''}} value="đang xử lý">đang xử lý</option>
                                                                <option {{$order->status_order == 'chờ vận chuyển' ? 'selected':''}} value="chờ vận chuyển">chờ vận chuyển</option>
                                                                <option {{$order->status_order == 'đang vận chuyển' ? 'selected':''}} value="đang vận chuyển">đang vận chuyển</option>
                                                                <option {{$order->status_order == 'đã giao' ? 'selected':''}} value="đã giao">đã giao</option>
                                                                
                                                            </select>
                                                        </div> --}}
                                                        <button type="submit" class="btn btn-primary">Xác nhận đơn hàng</button>
                                                    </div>
                                                            {{-- <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Lưu</button>
                                                            </div> --}}
                                                </form>
                                            </span>
                                        <span class="text-white px-2 py-1 fs-13"
                                            style="cursor: pointer;">
                                            <form id="statusForm" action="{{route('admin.orders.update-status',$order->id)}}" method="POST"> {{-- Đảm bảo route này chính xác --}}
                                                <div class="modal-body">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="order_id" id="orderId">
                                                    <input type="hidden" name="status" value="đã hủy">
                                                    {{-- <div class="mb-3">
                                                        <label for="status" class="form-label">Trạng thái</label>
                                                        <select name="status" id="status" class="form-select">
                                                            <option {{$order->status_order == 'đã hủy' ? 'selected':''}} value="đã hủy">đã hủy</option>
                                                            <option {{$order->status_order == 'chờ xử lý' ? 'selected':''}} value="chờ xử lý">chờ xử lý</option>
                                                            <option {{$order->status_order == 'đang xử lý' ? 'selected':''}} value="đang xử lý">đang xử lý</option>
                                                            <option {{$order->status_order == 'chờ vận chuyển' ? 'selected':''}} value="chờ vận chuyển">chờ vận chuyển</option>
                                                            <option {{$order->status_order == 'đang vận chuyển' ? 'selected':''}} value="đang vận chuyển">đang vận chuyển</option>
                                                            <option {{$order->status_order == 'đã giao' ? 'selected':''}} value="đã giao">đã giao</option>
                                                            
                                                        </select>
                                                    </div> --}}
                                                    <button type="submit" class="btn btn-primary">Hủy đơn hàng</button>
                                                </div>
                                                        {{-- <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Lưu</button>
                                                        </div> --}}
                                            </form>
                                        </span>
                                        @elseif($order->status_order == 'đang xử lý')
                                            <span class="text-white px-2 py-1 fs-13"
                                            style="cursor: pointer;">
                                                <form id="statusForm" action="{{route('admin.orders.update-status',$order->id)}}" method="POST"> {{-- Đảm bảo route này chính xác --}}
                                                    <div class="modal-body">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="order_id" id="orderId">
                                                        <input type="hidden" name="status" value="đang vận chuyển">
                                                        {{-- <div class="mb-3">
                                                            <label for="status" class="form-label">Trạng thái</label>
                                                            <select name="status" id="status" class="form-select">
                                                                <option {{$order->status_order == 'đã hủy' ? 'selected':''}} value="đã hủy">đã hủy</option>
                                                                <option {{$order->status_order == 'chờ xử lý' ? 'selected':''}} value="chờ xử lý">chờ xử lý</option>
                                                                <option {{$order->status_order == 'đang xử lý' ? 'selected':''}} value="đang xử lý">đang xử lý</option>
                                                                <option {{$order->status_order == 'chờ vận chuyển' ? 'selected':''}} value="chờ vận chuyển">chờ vận chuyển</option>
                                                                <option {{$order->status_order == 'đang vận chuyển' ? 'selected':''}} value="đang vận chuyển">đang vận chuyển</option>
                                                                <option {{$order->status_order == 'đã giao' ? 'selected':''}} value="đã giao">đã giao</option>
                                                                
                                                            </select>
                                                        </div> --}}
                                                        <button type="submit" class="btn btn-primary">Đã giao cho đơn vị vận chuyển</button>
                                                    </div>
                                                            {{-- <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Lưu</button>
                                                            </div> --}}
                                                </form>
                                            </span>
                                        @elseif($order->status_order == 'đang vận chuyển')
                                            <span class="text-white px-2 py-1 fs-13"
                                            style="cursor: pointer;">
                                                <form id="statusForm" action="{{route('admin.orders.update-status',$order->id)}}" method="POST"> {{-- Đảm bảo route này chính xác --}}
                                                    <div class="modal-body">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="order_id" id="orderId">
                                                        <input type="hidden" name="status" value="đang giao">
                                                        {{-- <div class="mb-3">
                                                            <label for="status" class="form-label">Trạng thái</label>
                                                            <select name="status" id="status" class="form-select">
                                                                <option {{$order->status_order == 'đã hủy' ? 'selected':''}} value="đã hủy">đã hủy</option>
                                                                <option {{$order->status_order == 'chờ xử lý' ? 'selected':''}} value="chờ xử lý">chờ xử lý</option>
                                                                <option {{$order->status_order == 'đang xử lý' ? 'selected':''}} value="đang xử lý">đang xử lý</option>
                                                                <option {{$order->status_order == 'chờ vận chuyển' ? 'selected':''}} value="chờ vận chuyển">chờ vận chuyển</option>
                                                                <option {{$order->status_order == 'đang vận chuyển' ? 'selected':''}} value="đang vận chuyển">đang vận chuyển</option>
                                                                <option {{$order->status_order == 'đã giao' ? 'selected':''}} value="đã giao">đã giao</option>
                                                                
                                                            </select>
                                                        </div> --}}
                                                        <button type="submit" class="btn btn-primary">Đang giao</button>
                                                    </div>
                                                            {{-- <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Lưu</button>
                                                            </div> --}}
                                                </form>
                                            </span>
                                        @elseif($order->status_order == 'đang giao')
                                            <span class="text-white px-2 py-1 fs-13"
                                            style="cursor: pointer;">
                                                <form id="statusForm" action="{{route('admin.orders.update-status',$order->id)}}" method="POST"> {{-- Đảm bảo route này chính xác --}}
                                                    <div class="modal-body">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="order_id" id="orderId">
                                                        <input type="hidden" name="status" value="giao hàng thành công">
                                                        {{-- <div class="mb-3">
                                                            <label for="status" class="form-label">Trạng thái</label>
                                                            <select name="status" id="status" class="form-select">
                                                                <option {{$order->status_order == 'đã hủy' ? 'selected':''}} value="đã hủy">đã hủy</option>
                                                                <option {{$order->status_order == 'chờ xử lý' ? 'selected':''}} value="chờ xử lý">chờ xử lý</option>
                                                                <option {{$order->status_order == 'đang xử lý' ? 'selected':''}} value="đang xử lý">đang xử lý</option>
                                                                <option {{$order->status_order == 'chờ vận chuyển' ? 'selected':''}} value="chờ vận chuyển">chờ vận chuyển</option>
                                                                <option {{$order->status_order == 'đang vận chuyển' ? 'selected':''}} value="đang vận chuyển">đang vận chuyển</option>
                                                                <option {{$order->status_order == 'đã giao' ? 'selected':''}} value="đã giao">đã giao</option>
                                                                
                                                            </select>
                                                        </div> --}}
                                                        <button type="submit" class="btn btn-primary">Giao hàng thành công</button>
                                                    </div>
                                                            {{-- <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Lưu</button>
                                                            </div> --}}
                                                </form>
                                            </span>
                                            <span class="text-white px-2 py-1 fs-13"
                                            style="cursor: pointer;">
                                                <form id="statusForm" action="{{route('admin.orders.update-status',$order->id)}}" method="POST"> {{-- Đảm bảo route này chính xác --}}
                                                    <div class="modal-body">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="order_id" id="orderId">
                                                        <input type="hidden" name="status" value="giao hàng thất bại">
                                                        {{-- <div class="mb-3">
                                                            <label for="status" class="form-label">Trạng thái</label>
                                                            <select name="status" id="status" class="form-select">
                                                                <option {{$order->status_order == 'đã hủy' ? 'selected':''}} value="đã hủy">đã hủy</option>
                                                                <option {{$order->status_order == 'chờ xử lý' ? 'selected':''}} value="chờ xử lý">chờ xử lý</option>
                                                                <option {{$order->status_order == 'đang xử lý' ? 'selected':''}} value="đang xử lý">đang xử lý</option>
                                                                <option {{$order->status_order == 'chờ vận chuyển' ? 'selected':''}} value="chờ vận chuyển">chờ vận chuyển</option>
                                                                <option {{$order->status_order == 'đang vận chuyển' ? 'selected':''}} value="đang vận chuyển">đang vận chuyển</option>
                                                                <option {{$order->status_order == 'đã giao' ? 'selected':''}} value="đã giao">đã giao</option>
                                                                
                                                            </select>
                                                        </div> --}}
                                                        <button type="submit" class="btn btn-primary">Giao hàng thất bại</button>
                                                    </div>
                                                            {{-- <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Lưu</button>
                                                            </div> --}}
                                                </form>
                                            </span>
                                        @elseif($order->status_order == 'giao hàng thất bại')
                                            <span class="text-white px-2 py-1 fs-13"
                                            style="cursor: pointer;">
                                                <form id="statusForm" action="{{route('admin.orders.update-status',$order->id)}}" method="POST"> {{-- Đảm bảo route này chính xác --}}
                                                    <div class="modal-body">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="order_id" id="orderId">
                                                        <input type="hidden" name="status" value="đang giao">
                                                        {{-- <div class="mb-3">
                                                            <label for="status" class="form-label">Trạng thái</label>
                                                            <select name="status" id="status" class="form-select">
                                                                <option {{$order->status_order == 'đã hủy' ? 'selected':''}} value="đã hủy">đã hủy</option>
                                                                <option {{$order->status_order == 'chờ xử lý' ? 'selected':''}} value="chờ xử lý">chờ xử lý</option>
                                                                <option {{$order->status_order == 'đang xử lý' ? 'selected':''}} value="đang xử lý">đang xử lý</option>
                                                                <option {{$order->status_order == 'chờ vận chuyển' ? 'selected':''}} value="chờ vận chuyển">chờ vận chuyển</option>
                                                                <option {{$order->status_order == 'đang vận chuyển' ? 'selected':''}} value="đang vận chuyển">đang vận chuyển</option>
                                                                <option {{$order->status_order == 'đã giao' ? 'selected':''}} value="đã giao">đã giao</option>
                                                                
                                                            </select>
                                                        </div> --}}
                                                        <button type="submit" class="btn btn-primary">Giao lại</button>
                                                    </div>
                                                            {{-- <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Lưu</button>
                                                            </div> --}}
                                                </form>
                                            </span>
                                        @endif
                                        {{-- Thay thế bằng route edit thực tế nếu có --}}
                                        {{-- <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-primary">Chỉnh
                                            sửa đơn hàng</a> --}}
                                        {{-- <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-primary" style="cursor: pointer;" onclick="showStatusForm('{{ $order->id }}', '{{ $order->status_order }}'>Sửa trạng thái</a> --}}
                                        {{-- <span class="btn btn-primary text-white px-2 py-1 fs-13"
                                            style="cursor: pointer;" onclick="showStatusForm()">
                                            Thay đổi trạng thái đơn hàng
                                        </span> --}}
                                        {{-- Modal để cập nhật trạng thái đơn hàng --}}
                                        {{-- <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="statusModalLabel">Cập nhật trạng thái đơn hàng</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form id="statusForm" action="{{route('admin.orders.update-status',$order->id)}}" method="POST">
                                                        <div class="modal-body">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="order_id" id="orderId">
                                                            <div class="mb-3">
                                                                <label for="status" class="form-label">Trạng thái</label>
                                                                <select name="status" id="status" class="form-select">
                                                                    <option {{$order->status_order == 'đã hủy' ? 'selected':''}} value="đã hủy">đã hủy</option>
                                                                    <option {{$order->status_order == 'chờ xử lý' ? 'selected':''}} value="chờ xử lý">chờ xử lý</option>
                                                                    <option {{$order->status_order == 'đang xử lý' ? 'selected':''}} value="đang xử lý">đang xử lý</option>
                                                                    <option {{$order->status_order == 'chờ vận chuyển' ? 'selected':''}} value="chờ vận chuyển">chờ vận chuyển</option>
                                                                    <option {{$order->status_order == 'đang vận chuyển' ? 'selected':''}} value="đang vận chuyển">đang vận chuyển</option>
                                                                    <option {{$order->status_order == 'đã giao' ? 'selected':''}} value="đã giao">đã giao</option>
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                                            <button type="submit" class="btn btn-primary">Lưu</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>

                                {{-- Phần tiến trình (Progress) - giữ lại cấu trúc từ HEAD, có thể cần dữ liệu động sau này --}}
                                <div class="mt-4">
                                    <h4 class="fw-medium text-dark">Tiến trình đơn hàng</h4>
                                </div>
                                <div class="row row-cols-xxl-5 row-cols-md-2 row-cols-1">
                                    {{-- Các cột tiến trình này đang dùng dữ liệu tĩnh, bạn có thể cần cập nhật chúng với dữ liệu động từ $order->status_order --}}
                                    <div class="col">
                                        <div class="progress mt-3" style="height: 10px;">

                                            <div class="progress-bar {{ $order->status_order == 'chờ xử lý' || $order->status_order == 'đang xử lý' || $order->status_order == 'chờ vận chuyển' || $order->status_order == 'đang giao' ? 'bg-success' : 'bg-secondary' }}"
                                                role="progressbar"
                                                style="width: {{ $order->status_order == 'chờ xử lý' || $order->status_order == 'đang xử lý' || $order->status_order == 'chờ vận chuyển' || $order->status_order == 'đang giao' ? '100%' : '0%' }}"

                                                aria-valuenow="70" aria-valuemin="0" aria-valuemax="70"></div>
                                            </div>
                                        <p class="mb-0 mt-2">Đặt hàng thành công</p>
                                    </div>
                                    <div class="col">
                                        <div class="progress mt-3" style="height: 10px;">
                                            <div class="progress-bar {{  $order->status_order == 'đang xử lý' || $order->status_order == 'chờ vận chuyển' ? 'bg-success' : 'bg-warning' }}"
                                                role="progressbar"
                                                style="width: {{ $order->status_order == 'đang xử lý' ? '100%' : '60%' }}"
                                                aria-valuenow="70" aria-valuemin="0" aria-valuemax="70"></div>
                                        </div>
                                        <p class="mb-0 mt-2">Đang xử lý</p>
                                        @if ($order->status_payment == 'unpaid')
                                            <div class="d-flex align-items-center gap-2 mt-2">
                                                <div class="spinner-border spinner-border-sm text-warning" role="status">
                                                    <span class="visually-hidden">Loading...</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col">
                                        <div class="progress mt-3" style="height: 10px;">
                                            <div class="progress-bar {{ $order->status_order == 'chờ vận chuyển' || $order->status_order == '' ? 'bg-success' : 'bg-primary' }}"
                                                role="progressbar"
                                                style="width: {{ $order->status_order == 'shipped' || $order->status_order == 'completed' ? '100%' : '0%' }}"
                                                aria-valuenow="70" aria-valuemin="0" aria-valuemax="70"></div>
                                        </div>
                                        <p class="mb-0 mt-2">Chờ vận chuyển</p>
                                    </div>
                                    <div class="col">
                                        <div class="progress mt-3" style="height: 10px;">
                                            <div class="progress-bar {{ $order->status_order == 'shipped' || $order->status_order == 'completed' ? 'bg-success' : 'bg-primary' }}"
                                                role="progressbar"
                                                style="width: {{ $order->status_order == 'shipped' || $order->status_order == 'completed' ? '100%' : '0%' }}"
                                                aria-valuenow="70" aria-valuemin="0" aria-valuemax="70"></div>
                                        </div>
                                        <p class="mb-0 mt-2">Đang giao hàng</p>
                                    </div>
                                    <div class="col">
                                        <div class="progress mt-3" style="height: 10px;">
                                            <div class="progress-bar {{ $order->status_order == 'completed' ? 'bg-success' : 'bg-primary' }}"
                                                role="progressbar"
                                                style="width: {{ $order->status_order == 'completed' ? '100%' : '0%' }}"
                                                aria-valuenow="70" aria-valuemin="0" aria-valuemax="70"></div>
                                        </div>
                                        <p class="mb-0 mt-2">Đã giao</p>
                                    </div>
                                </div>
                            </div>
                            {{-- <div
                                class="card-footer d-flex flex-wrap align-items-center justify-content-between bg-light-subtle gap-2">
                               
                                <p class="border rounded mb-0 px-2 py-1 bg-body"><i
                                        class="bx bx-arrow-from-left align-middle fs-16"></i> Ngày giao hàng ước tính :
                                    <span class="text-dark fw-medium">{{ $order->created_at->addDays(3) }}</span>
                                </p>
                                <div>
                                    <a href="#!" class="btn btn-primary">Chuẩn bị giao hàng</a>
                                </div>
                            </div> --}}
                        </div>

                        {{-- Phần Sản Phẩm trong Đơn Hàng --}}
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Sản phẩm</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table align-middle mb-0 table-hover table-centered">
                                        <thead class="bg-light-subtle border-bottom">
                                            <tr>
                                                <th>Tên sản phẩm & Loại</th>
                                                <th>Trạng thái</th>
                                                <th>Số lượng</th>
                                                <th>Giá(vnđ)</th>
                                                <th>Tổng(vnđ)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($OrderDetail as $orderItem)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div
                                                                class="rounded bg-light avatar-md d-flex align-items-center justify-content-center">
                                                                @if ($orderItem->variant->product->images->count() > 0)
                                                                    <img src="{{ asset('storage/' . $orderItem->variant->product->images->first()->path) }}"
                                                                        alt="{{ $orderItem->variant->product->name }}"
                                                                        class="avatar-md">
                                                                @else
                                                                    <img src="{{ asset('default-product.jpg') }}"
                                                                        alt="{{ $orderItem->variant->product->name }}"
                                                                        class="avatar-md">
                                                                @endif
                                                            </div>
                                                            <div>
                                                                <a href="#!"
                                                                    class="text-dark fw-medium fs-15">{{ $orderItem->variant->product->name }}</a>
                                                                <p class="text-muted mb-0 mt-1 fs-13">
                                                                    @foreach ($orderItem->variant->attributesValue as $item)
                                                                         <span>{{$item->value }} </span>
                                                                    @endforeach
                                                                       

                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="badge bg-success-subtle text-success px-2 py-1 fs-13">Sẵn
                                                            sàng</span>
                                                    </td>
                                                    <td>{{ $orderItem->quantity }}</td>
                                                    <td>{{ number_format($orderItem->variant_price,0,',','.') }}</td>
                                                    <td>{{ number_format($orderItem->quantity * $orderItem->variant_price,0,',','.') }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center">Không có sản phẩm nào trong
                                                        đơn hàng này.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        {{-- Phần Dòng Thời Gian Đơn Hàng (Order Timeline) --}}
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Dòng thời gian đơn hàng</h4>
                            </div>
                            <div class="card-body">
                                <div class="position-relative ms-2">
                                    <span class="position-absolute start-0 top-0 border border-dashed h-100"></span>
                                    
                                    <div class="position-relative ps-4 mb-4">
                                        <span
                                            class="position-absolute start-0 avatar-sm translate-middle-x bg-light d-inline-flex align-items-center justify-content-center rounded-circle text-success fs-20">
                                            <i class="bx bx-check-circle"></i>
                                        </span>
                                        <div
                                            class="ms-2 d-flex flex-wrap gap-2 align-items-center justify-content-between">
                                            <div>
                                                <h5 class="mb-1 text-dark fw-medium fs-15">Đơn hàng được tạo</h5>
                                                <p class="mb-0">Đơn hàng đã được đặt thành công.</p>
                                            </div>
                                            <p class="mb-0">
                                                {{ \Carbon\Carbon::parse(time: $order->created_at)->format('d/m/Y, H:i') }}
                                            </p>
                                        </div>
                                    </div>

                                    @if ($order->status_order == 'processing' || $order->status_order == 'shipped' || $order->status_order == 'completed')
                                        <div class="position-relative ps-4 mb-4">
                                            <span
                                                class="position-absolute start-0 avatar-sm translate-middle-x bg-light d-inline-flex align-items-center justify-content-center rounded-circle text-success fs-20">
                                                <i class="bx bx-check-circle"></i>
                                            </span>
                                            <div
                                                class="ms-2 d-flex flex-wrap gap-2 align-items-center justify-content-between">
                                                <div>
                                                    <h5 class="mb-1 text-dark fw-medium fs-15">Đơn hàng đang được xử lý
                                                    </h5>
                                                    <p class="mb-0">Đơn hàng đang được chuẩn bị để đóng gói.</p>
                                                </div>

                                                <p class="mb-0">
                                                    {{ \Carbon\Carbon::parse($order->updated_at)->format('d/m/Y, H:i') }}
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Cột bên phải: Tổng quan đơn hàng, Thông tin thanh toán, Thông tin khách hàng --}}
            <div class="col-xl-3 col-lg-4">
                {{-- Tổng quan đơn hàng (Order Summary) --}}
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tổng quan đơn hàng</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <tbody>
                                    <tr>
                                        <td class="px-0">
                                            <p class="d-flex mb-0 align-items-center gap-1"><iconify-icon
                                                    icon="solar:clipboard-text-broken"></iconify-icon> Tổng phụ : </p>
                                        </td>
                                        {{-- <td class="text-end text-dark fw-medium px-0">
                                            {{ number_format($order->total_price) }}
                                            đ</td> --}}
                                        </td>
                                        <td class="text-end text-dark fw-medium px-0">
                                            @php
                                                $subTotal = 0;
                                                foreach ($OrderDetail as $item) {
                                                    $subTotal += $item->variant_price * $item->quantity;
                                                }    
                                            @endphp
                                            {{ number_format($subTotal, 0, ',', '.') }} vnđ
                                        </td>
                                    </tr>
                                    @php
                                        $totalDiscount = 0;
                                        $productDiscount = $order->product_discount ?? 0;
                                        $shippingDiscount = $order->shipping_discount ?? 0;
                                        $totalDiscount = $productDiscount + $shippingDiscount;
                                        
                                        // Lấy thông tin voucher đã áp dụng
                                        $appliedVouchers = [];
                                        if ($order->applied_vouchers) {
                                            $appliedVouchers = json_decode($order->applied_vouchers, true);
                                        }
                                    @endphp
                                    @if($totalDiscount > 0)
                                    <tr>
                                        <td class="px-0">
                                            <p class="d-flex mb-0 align-items-center gap-1"><iconify-icon
                                                    icon="solar:ticket-broken" class="align-middle"></iconify-icon>
                                                Tổng giảm : </p>
                                        </td>
                                        <td class="text-end text-dark fw-medium px-0">
                                            -{{ number_format($totalDiscount, 0, ',', '.') }} vnđ
                                        </td>
                                    </tr>
                                    @if($productDiscount > 0)
                                    <tr>
                                        <td class="px-0">
                                            <p class="d-flex mb-0 align-items-center gap-1"><iconify-icon
                                                    icon="solar:ticket-broken" class="align-middle"></iconify-icon>
                                                Giảm giá sản phẩm : </p>
                                        </td>
                                        <td class="text-end text-dark fw-medium px-0">
                                            -{{ number_format($productDiscount, 0, ',', '.') }} vnđ
                                        </td>
                                    </tr>
                                    @endif
                                    @if($shippingDiscount > 0)
                                    <tr>
                                        <td class="px-0">
                                            <p class="d-flex mb-0 align-items-center gap-1"><iconify-icon
                                                    icon="solar:kick-scooter-broken" class="align-middle"></iconify-icon>
                                                Giảm phí vận chuyển : </p>
                                        </td>
                                        <td class="text-end text-dark fw-medium px-0">
                                            -{{ number_format($shippingDiscount, 0, ',', '.') }} vnđ
                                        </td>
                                    </tr>
                                    @endif
                                    @endif
                                    @if(!empty($appliedVouchers))
                                    <tr>
                                        <td class="px-0" colspan="2">
                                            <div class="mt-2">
                                                <p class="mb-1 fw-medium text-dark">Voucher đã áp dụng:</p>
                                                @foreach($appliedVouchers as $voucher)
                                                <div class="d-flex justify-content-between align-items-center mb-1">
                                                    <span class="text-muted fs-13">{{ $voucher['name'] ?? $voucher['code'] }}</span>
                                                    <span class="badge bg-success-subtle text-success fs-11">{{ $voucher['type_label'] ?? $voucher['type'] }}</span>
                                                </div>
                                                @endforeach
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td class="px-0">
                                            <p class="d-flex mb-0 align-items-center gap-1"><iconify-icon
                                                    icon="solar:kick-scooter-broken" class="align-middle"></iconify-icon>
                                                Phí giao hàng : </p>
                                        </td>
                                        <td class="text-end text-dark fw-medium px-0">
                                            @if($shippingDiscount > 0)
                                                <span class="text-decoration-line-through text-muted">{{ number_format(30000, 0, ',', '.') }} vnđ</span>
                                                <span class="text-success">{{ number_format($order->shipping_cost ?? 0, 0, ',', '.') }} vnđ</span>
                                            @else
                                                {{ number_format($order->shipping_cost ?? 30000, 0, ',', '.') }} vnđ
                                            @endif
                                        </td>
                                    </tr>
                                    {{-- Nếu có thuế, bạn có thể thêm dòng này --}}
                                    {{-- <tr>
                                        <td class="px-0">
                                            <p class="d-flex mb-0 align-items-center gap-1"><iconify-icon icon="solar:calculator-minimalistic-broken" class="align-middle"></iconify-icon> Thuế ({{ $OrderDetail->tax_rate ?? '0' }}%) : </p>
                                        </td>
                                        <td class="text-end text-dark fw-medium px-0">{{ number_format($OrderDetail->tax_amount ?? 0) }} đ</td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between bg-light-subtle">
                        <div>
                            <p class="fw-medium text-dark mb-0">Tổng cộng</p>
                            @if($totalDiscount > 0)
                            <small class="text-success">Đã tiết kiệm: {{ number_format($totalDiscount, 0, ',', '.') }} vnđ</small>
                            @endif
                        </div>
                        <div>
                            <p class="fw-medium text-dark mb-0">{{ number_format($order->total_price) }} vnđ</p>
                            @if($totalDiscount > 0)
                            <small class="text-muted">Giá gốc + ship: {{ number_format($subTotal + 30000, 0, ',', '.') }} vnđ</small>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Thông tin thanh toán (Payment Information) --}}
                {{-- <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Thông tin thanh toán</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            
                            <div class="rounded-3 bg-light avatar d-flex align-items-center justify-content-center">
                                @if ($order->type_payment == 'cod')
                                    <i class="bx bx-money fs-3"></i> 
                                @elseif($order->type_payment == 'bank_transfer')
                                    <i class="bx bx-bank fs-3"></i> 
                                @else
                                    <img src="{{ asset('assets/images/card/mastercard.svg') }}" alt=""
                                        class="avatar-sm"> 
                                @endif
                            </div>
                            <div>
                                <p class="mb-1 text-dark fw-medium">
                                    @if ($order->type_payment == 'cod')
                                        Thanh toán khi nhận hàng (COD)
                                    @elseif($order->type_payment == 'bank_transfer')
                                        Chuyển khoản ngân hàng
                                    @else
                                        Thẻ tín dụng (Master Card) 
                                    @endif
                                </p>
                                <p class="mb-0 text-dark">{{ $order->card_number ?? 'N/A' }}</p>


                            </div>
                            <div class="ms-auto">
                                @if ($order->status_payment == 'paid')
                                    <iconify-icon icon="solar:check-circle-broken"
                                        class="fs-22 text-success"></iconify-icon>
                                @else
                                    <iconify-icon icon="solar:clock-circle-broken"
                                        class="fs-22 text-warning"></iconify-icon>
                                @endif
                            </div>
                        </div>
                        <p class="text-dark mb-1 fw-medium">ID Giao dịch : <span class="text-muted fw-normal fs-13">
                                #</span></p>
                        <p class="text-dark mb-0 fw-medium">Tên chủ thẻ/Người thanh toán : <span
                                class="text-muted fw-normal fs-13"> </span></p>
                    </div>
                </div> --}}

                {{-- Thông tin khách hàng (Customer Details) --}}
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Thông tin khách hàng</h4>
                    </div>
                    <div class="card-body">

                        <div class="d-flex justify-content-between mt-3">
                            <h5 class="">Tên người nhận</h5>
                            {{-- <div>
                                <a href="#!"><i class="bx bx-edit-alt fs-18"></i></a>
                            </div> --}}
                        </div>
                        <div>
                            <p class="mb-1">{{ $order->user_name }}</p>
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <h5 class="">Email</h5>
                            {{-- <div>
                                <a href="#!"><i class="bx bx-edit-alt fs-18"></i></a>
                            </div> --}}
                        </div>
                        <div>
                            <a href="mailto:{{ $order->username_email }}"
                                    class="link-primary fw-medium">{{ $order->user_email }}</a>
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <h5 class="">Số điện thoại liên lạc</h5>
                            {{-- <div>
                                <a href="#!"><i class="bx bx-edit-alt fs-18"></i></a>
                            </div> --}}
                        </div>
                        <div>
                            <p class="mb-1">{{ $order->user_phone }}</p>
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <h5 class="">Địa chỉ giao hàng</h5>
                            {{-- <div>
                                <a href="#!"><i class="bx bx-edit-alt fs-18"></i></a> 
                            </div> --}}
                        </div>
                        <div>
                            <p class="mb-1">{{ $order->user_address ?? 'N/A' }}</p>
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <h5 class="">Ghi chú</h5>
                            {{-- <div>
                                <a href="#!"><i class="bx bx-edit-alt fs-18"></i></a> 
                            </div> --}}
                        </div>
                        <div>
                            <p class="mb-1">{{ $order->user_note ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>

                {{-- Bản đồ (Map) - Nếu bạn muốn hiển thị vị trí trên bản đồ --}}
                {{-- <div class="card">
                    <div class="card-body">
                        <div class="mapouter">
                            <div class="gmap_canvas">
                                <iframe class="gmap_iframe rounded" width="100%" style="height: 418px;"
                                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                                    src="https://maps.google.com/maps?q={{ urlencode($order->user_address ?? '') }}&t=&z=14&ie=UTF8&iwloc=B&output=embed"></iframe>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

    <script>
        function showStatusForm() {
        // gán giá trị cho phần tử có id 'orderId'
        // document.getElementById('orderId').value = orderId;
        // // 
        // document.getElementById('status').value = currentStatus; // Chọn trạng thái hiện tại
        var modal = new bootstrap.Modal(document.getElementById('statusModal'));
        modal.show();
    }
    </script>
@endsection
