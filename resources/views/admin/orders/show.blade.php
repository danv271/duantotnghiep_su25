@extends('admin.layouts.app') {{-- Đảm bảo bạn đang extend đúng layout của admin --}}

@section('title', 'Trang Chi Tiết Đơn Hàng | Larkon - Responsive Admin Dashboard Template')
@section('page-title', 'Chi tiết đơn hàng #' . $order->id) {{-- Đảm bảo biến $order được truyền vào --}}

@section('content')
<div class="page-content">

    <div class="container-xxl">

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
                                            @if($order->status_payment == 'paid')
                                                <span class="badge bg-success-subtle text-success px-2 py-1 fs-13">Đã Thanh Toán</span>
                                            @elseif($order->status_payment == 'unpaid')
                                                <span class="badge bg-danger-subtle text-danger px-2 py-1 fs-13">Chưa Thanh Toán</span>
                                            @else
                                                <span class="badge bg-secondary-subtle text-secondary px-2 py-1 fs-13">{{ ucfirst($order->status_payment) }}</span>
                                            @endif

                                            @if($order->status_order == 'pending')
                                                <span class="badge border border-warning text-warning fs-13 px-2 py-1 rounded">Chờ xử lý</span>
                                            @elseif($order->status_order == 'processing')
                                                <span class="badge border border-info text-info fs-13 px-2 py-1 rounded">Đang xử lý</span>
                                            @elseif($order->status_order == 'shipped')
                                                <span class="badge border border-primary text-primary fs-13 px-2 py-1 rounded">Đã giao hàng</span>
                                            @elseif($order->status_order == 'completed')
                                                <span class="badge border border-success text-success fs-13 px-2 py-1 rounded">Hoàn thành</span>
                                            @elseif($order->status_order == 'cancelled')
                                                <span class="badge border border-danger text-danger fs-13 px-2 py-1 rounded">Đã hủy</span>
                                            @else
                                                <span class="badge border border-secondary text-secondary fs-13 px-2 py-1 rounded">{{ ucfirst($order->status_order) }}</span>
                                            @endif
                                        </h4>
                                        <p class="mb-0">Order / Order Details / #{{ $order->id }} - {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y \l\ú\c H:i') }}</p>
                                    </div>
                                    <div>
                                        <a href="#!" class="btn btn-outline-secondary">Hoàn tiền</a>
                                        <a href="#!" class="btn btn-outline-secondary">Trả hàng</a>
                                        {{-- Thay thế bằng route edit thực tế nếu có --}}
                                        <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-primary">Chỉnh sửa đơn hàng</a>
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
                                            <div class="progress-bar {{ $order->status_order == 'pending' || $order->status_order == 'processing' || $order->status_order == 'shipped' || $order->status_order == 'completed' ? 'bg-success' : 'bg-secondary' }}" role="progressbar" style="width: {{ $order->status_order == 'pending' || $order->status_order == 'processing' || $order->status_order == 'shipped' || $order->status_order == 'completed' ? '100%' : '0%' }}" aria-valuenow="70" aria-valuemin="0" aria-valuemax="70"></div>
                                        </div>
                                        <p class="mb-0 mt-2">Xác nhận đơn hàng</p>
                                    </div>
                                    <div class="col">
                                        <div class="progress mt-3" style="height: 10px;">
                                            <div class="progress-bar {{ $order->status_payment == 'paid' ? 'bg-success' : 'bg-warning' }}" role="progressbar" style="width: {{ $order->status_payment == 'paid' ? '100%' : '60%' }}" aria-valuenow="70" aria-valuemin="0" aria-valuemax="70"></div>
                                        </div>
                                        <p class="mb-0 mt-2">Chờ thanh toán</p>
                                        @if($order->status_payment == 'unpaid')
                                            <div class="d-flex align-items-center gap-2 mt-2">
                                                <div class="spinner-border spinner-border-sm text-warning" role="status">
                                                    <span class="visually-hidden">Loading...</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col">
                                        <div class="progress mt-3" style="height: 10px;">
                                            <div class="progress-bar {{ $order->status_order == 'shipped' || $order->status_order == 'completed' ? 'bg-success' : 'bg-primary' }}" role="progressbar" style="width: {{ $order->status_order == 'shipped' || $order->status_order == 'completed' ? '100%' : '0%' }}" aria-valuenow="70" aria-valuemin="0" aria-valuemax="70"></div>
                                        </div>
                                        <p class="mb-0 mt-2">Đang xử lý</p>
                                    </div>
                                    <div class="col">
                                        <div class="progress mt-3" style="height: 10px;">
                                            <div class="progress-bar {{ $order->status_order == 'shipped' || $order->status_order == 'completed' ? 'bg-success' : 'bg-primary' }}" role="progressbar" style="width: {{ $order->status_order == 'shipped' || $order->status_order == 'completed' ? '100%' : '0%' }}" aria-valuenow="70" aria-valuemin="0" aria-valuemax="70"></div>
                                        </div>
                                        <p class="mb-0 mt-2">Đang giao hàng</p>
                                    </div>
                                    <div class="col">
                                        <div class="progress mt-3" style="height: 10px;">
                                            <div class="progress-bar {{ $order->status_order == 'completed' ? 'bg-success' : 'bg-primary' }}" role="progressbar" style="width: {{ $order->status_order == 'completed' ? '100%' : '0%' }}" aria-valuenow="70" aria-valuemin="0" aria-valuemax="70"></div>
                                        </div>
                                        <p class="mb-0 mt-2">Đã giao</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex flex-wrap align-items-center justify-content-between bg-light-subtle gap-2">
                                {{-- Bạn có thể thay thế bằng ngày giao hàng ước tính thực tế từ $order --}}
                                <p class="border rounded mb-0 px-2 py-1 bg-body"><i class="bx bx-arrow-from-left align-middle fs-16"></i> Ngày giao hàng ước tính : <span class="text-dark fw-medium">{{ \Carbon\Carbon::parse($order->expected_delivery_date ?? $order->created_at->addDays(3))->format('d M , Y') }}</span></p>
                                <div>
                                    <a href="#!" class="btn btn-primary">Chuẩn bị giao hàng</a> {{-- Nút này cần xử lý logic backend --}}
                                </div>
                            </div>
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
                                                <th>Tên sản phẩm & Kích thước</th>
                                                <th>Trạng thái</th>
                                                <th>Số lượng</th>
                                                <th>Giá</th>
                                                <th>Thuế</th>
                                                <th>Thành tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($order->products as $product) {{-- Giả sử $order có mối quan hệ với products --}}
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div class="rounded bg-light avatar-md d-flex align-items-center justify-content-center">
                                                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="avatar-md"> {{-- Sử dụng ảnh sản phẩm thật --}}
                                                        </div>
                                                        <div>
                                                            <a href="#!" class="text-dark fw-medium fs-15">{{ $product->name }}</a>
                                                            <p class="text-muted mb-0 mt-1 fs-13"><span>Size : </span>{{ $product->pivot->size ?? 'N/A' }}</p> {{-- Lấy size từ pivot table nếu có --}}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-success-subtle text-success px-2 py-1 fs-13">Sẵn sàng</span> {{-- Trạng thái sản phẩm trong kho --}}
                                                </td>
                                                <td>{{ $product->pivot->quantity }}</td> {{-- Số lượng sản phẩm --}}
                                                <td>{{ number_format($product->pivot->price) }} đ</td> {{-- Giá sản phẩm --}}
                                                <td>{{ number_format($product->pivot->tax ?? 0) }} đ</td> {{-- Thuế nếu có --}}
                                                <td>{{ number_format($product->pivot->quantity * $product->pivot->price + ($product->pivot->tax ?? 0)) }} đ</td> {{-- Tổng thành tiền cho SP này --}}
                                            </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center">Không có sản phẩm nào trong đơn hàng này.</td>
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
                                    {{-- Mỗi div này là một mốc thời gian --}}
                                    <div class="position-relative ps-4 mb-4">
                                        <span class="position-absolute start-0 avatar-sm translate-middle-x bg-light d-inline-flex align-items-center justify-content-center rounded-circle text-success fs-20">
                                            <i class="bx bx-check-circle"></i>
                                        </span>
                                        <div class="ms-2 d-flex flex-wrap gap-2 align-items-center justify-content-between">
                                            <div>
                                                <h5 class="mb-1 text-dark fw-medium fs-15">Đơn hàng được tạo</h5>
                                                <p class="mb-0">Đơn hàng đã được đặt thành công.</p>
                                            </div>
                                            <p class="mb-0">{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y, H:i') }}</p>
                                        </div>
                                    </div>
                                    {{-- Các mốc thời gian khác có thể được thêm vào đây dựa trên lịch sử trạng thái của $order --}}
                                    {{-- Ví dụ: --}}
                                    @if($order->status_order == 'processing' || $order->status_order == 'shipped' || $order->status_order == 'completed')
                                    <div class="position-relative ps-4 mb-4">
                                        <span class="position-absolute start-0 avatar-sm translate-middle-x bg-light d-inline-flex align-items-center justify-content-center rounded-circle text-success fs-20">
                                            <i class="bx bx-check-circle"></i>
                                        </span>
                                        <div class="ms-2 d-flex flex-wrap gap-2 align-items-center justify-content-between">
                                            <div>
                                                <h5 class="mb-1 text-dark fw-medium fs-15">Đơn hàng đang được xử lý</h5>
                                                <p class="mb-0">Đơn hàng đang được chuẩn bị để đóng gói.</p>
                                            </div>
                                            {{-- Bạn cần lưu lại thời gian chuyển trạng thái trong DB để hiển thị chính xác --}}
                                            <p class="mb-0">{{ \Carbon\Carbon::parse($order->updated_at)->format('d/m/Y, H:i') }}</p>
                                        </div>
                                    </div>
                                    @endif
                                    {{-- Tương tự cho shipped, delivered, v.v. --}}
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
                                            <p class="d-flex mb-0 align-items-center gap-1"><iconify-icon icon="solar:clipboard-text-broken"></iconify-icon> Tổng phụ : </p>
                                        </td>
                                        <td class="text-end text-dark fw-medium px-0">{{ number_format($order->total_price - ($order->shipping_fee ?? 0) + ($order->discount_amount ?? 0)) }} đ</td>
                                    </tr>
                                    <tr>
                                        <td class="px-0">
                                            <p class="d-flex mb-0 align-items-center gap-1"><iconify-icon icon="solar:ticket-broken" class="align-middle"></iconify-icon> Giảm giá : </p>
                                        </td>
                                        <td class="text-end text-dark fw-medium px-0">-{{ number_format($order->discount_amount ?? 0) }} đ</td>
                                    </tr>
                                    <tr>
                                        <td class="px-0">
                                            <p class="d-flex mb-0 align-items-center gap-1"><iconify-icon icon="solar:kick-scooter-broken" class="align-middle"></iconify-icon> Phí giao hàng : </p>
                                        </td>
                                        <td class="text-end text-dark fw-medium px-0">{{ number_format($order->shipping_fee ?? 0) }} đ</td>
                                    </tr>
                                    {{-- Nếu có thuế, bạn có thể thêm dòng này --}}
                                    {{-- <tr>
                                        <td class="px-0">
                                            <p class="d-flex mb-0 align-items-center gap-1"><iconify-icon icon="solar:calculator-minimalistic-broken" class="align-middle"></iconify-icon> Thuế ({{ $order->tax_rate ?? '0' }}%) : </p>
                                        </td>
                                        <td class="text-end text-dark fw-medium px-0">{{ number_format($order->tax_amount ?? 0) }} đ</td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between bg-light-subtle">
                        <div>
                            <p class="fw-medium text-dark mb-0">Tổng cộng</p>
                        </div>
                        <div>
                            <p class="fw-medium text-dark mb-0">{{ number_format($order->total_price) }} đ</p>
                        </div>
                    </div>
                </div>

                {{-- Thông tin thanh toán (Payment Information) --}}
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Thông tin thanh toán</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            {{-- Bạn có thể hiển thị icon dựa trên $order->type_payment --}}
                            <div class="rounded-3 bg-light avatar d-flex align-items-center justify-content-center">
                                @if($order->type_payment == 'cod')
                                    <i class="bx bx-money fs-3"></i> {{-- Icon tiền mặt --}}
                                @elseif($order->type_payment == 'bank_transfer')
                                    <i class="bx bx-bank fs-3"></i> {{-- Icon ngân hàng --}}
                                @else
                                    <img src="{{ asset('assets/images/card/mastercard.svg') }}" alt="" class="avatar-sm"> {{-- Icon thẻ --}}
                                @endif
                            </div>
                            <div>
                                <p class="mb-1 text-dark fw-medium">
                                    @if($order->type_payment == 'cod')
                                        Thanh toán khi nhận hàng (COD)
                                    @elseif($order->type_payment == 'bank_transfer')
                                        Chuyển khoản ngân hàng
                                    @else
                                        Thẻ tín dụng (Master Card) {{-- Giả sử là Master Card nếu không phải COD/Bank --}}
                                    @endif
                                </p>
                                <p class="mb-0 text-dark">{{ $order->card_number ?? 'N/A' }}</p> {{-- Hiển thị 4 số cuối thẻ nếu có --}}
                            </div>
                            <div class="ms-auto">
                                @if($order->status_payment == 'paid')
                                    <iconify-icon icon="solar:check-circle-broken" class="fs-22 text-success"></iconify-icon>
                                @else
                                    <iconify-icon icon="solar:clock-circle-broken" class="fs-22 text-warning"></iconify-icon>
                                @endif
                            </div>
                        </div>
                        <p class="text-dark mb-1 fw-medium">ID Giao dịch : <span class="text-muted fw-normal fs-13"> #{{ $order->transaction_id ?? 'N/A' }}</span></p>
                        <p class="text-dark mb-0 fw-medium">Tên chủ thẻ/Người thanh toán : <span class="text-muted fw-normal fs-13"> {{ $order->user_name ?? 'N/A' }}</span></p>
                    </div>
                </div>

                {{-- Thông tin khách hàng (Customer Details) --}}
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Thông tin khách hàng</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-2">
                            <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="" class="avatar rounded-3 border border-light border-3"> {{-- Ảnh đại diện --}}
                            <div>
                                <p class="mb-1">{{ $order->user_name ?? 'N/A' }}</p>
                                <a href="mailto:{{ $order->user_email }}" class="link-primary fw-medium">{{ $order->user_email }}</a>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <h5 class="">Số điện thoại liên hệ</h5>
                            <div>
                                <a href="#!"><i class="bx bx-edit-alt fs-18"></i></a> {{-- Nút chỉnh sửa --}}
                            </div>
                        </div>
                        <p class="mb-1">{{ $order->user_phone }}</p>

                        <div class="d-flex justify-content-between mt-3">
                            <h5 class="">Địa chỉ giao hàng</h5>
                            <div>
                                <a href="#!"><i class="bx bx-edit-alt fs-18"></i></a> {{-- Nút chỉnh sửa --}}
                            </div>
                        </div>
                        <div>
                            <p class="mb-1">{{ $order->user_name ?? 'N/A' }}</p>
                            <p class="mb-1">{{ $order->user_address ?? 'N/A' }}</p>
                            <p class="mb-1">{{ $order->user_city ?? 'N/A' }}, {{ $order->user_zip ?? 'N/A' }}</p>
                            <p class="mb-1">{{ $order->user_country ?? 'N/A' }}</p>
                            <p class="">{{ $order->user_phone ?? 'N/A' }}</p>
                        </div>

                        <div class="d-flex justify-content-between mt-3">
                            <h5 class="">Địa chỉ thanh toán</h5>
                            <div>
                                <a href="#!"><i class="bx bx-edit-alt fs-18"></i></a> {{-- Nút chỉnh sửa --}}
                            </div>
                        </div>
                        <p class="mb-1">{{ $order->billing_address ?? 'Giống địa chỉ giao hàng' }}</p> {{-- Nếu có địa chỉ thanh toán riêng --}}
                    </div>
                </div>

                {{-- Bản đồ (Map) - Nếu bạn muốn hiển thị vị trí trên bản đồ --}}
                <div class="card">
                    <div class="card-body">
                        <div class="mapouter">
                            {{-- Bạn cần thay đổi src của iframe để hiển thị địa chỉ của đơn hàng --}}
                            <div class="gmap_canvas">
                                <iframe class="gmap_iframe rounded" width="100%" style="height: 418px;" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                                    src="https://maps.google.com/maps?q={{ urlencode($order->user_address ?? '') }}&t=&z=14&ie=UTF8&iwloc=B&output=embed"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection