@extends('KNTuser.KNTlayouts.KNTmaster')

@section('title', 'Trang chủ')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="banner">
                <div class="banner-slide">
                    <div class="banner-item" style="background-image: ">
                        <img src="{{ asset('img/banner-1.jpg') }}" class="d-block w-100 h-200 opacity-75" alt="banner-1">
                        <div class="carousel-caption d-none d-md-block text-black">
                            <h5 class="fs-3" style="color: #000; text-shadow: 1px 1px 2px #fff">🌿 Không gian xanh - Thổi hồn vào ngôi nhà bạn</h5>
                            <p style="color: #000; text-shadow: 1px 1px 2px #fff">Tìm kiếm những chậu cây hoàn hảo để làm dịu tâm hồn và nâng tầm không gian sống của bạn ngay hôm nay!</p>
                        </div>
                    </div>
                    <div class="banner-item">
                        <img src="{{ asset('img/banner-2.jpg') }}" class="d-block w-100 h-200 opacity-75" alt="banner-2">
                        <div class="carousel-caption d-none d-md-block text-dark">
                            <h5 class="fs-3" style="color: #000; text-shadow: 1px 1px 2px #fff">🌱 Cây xanh, cuộc sống xanh</h5>
                            <p style="color: #000; text-shadow: 1px 1px 2px #fff">Đa dạng cây cảnh từ để bàn đến trang trí sân vườn, mang thiên nhiên đến gần bạn hơn.</p>
                        </div>
                    </div>
                    <div class="banner-item">
                        <img src="{{ asset('img/banner-3.jpg') }}" class="d-block w-100 h-200 opacity-75" alt="banner-3">
                        <div class="carousel-caption d-none d-md-block text-dark">
                            <h5 class="fs-3" style="color: #000; text-shadow: 1px 1px 2px #fff">🌳 Vườn nhỏ trong tầm tay bạn</h5>
                            <p style="color: #000; text-shadow: 1px 1px 2px #fff" >Khám phá bộ sưu tập cây cảnh độc đáo, chăm sóc dễ dàng, giao hàng tận nơi!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row my-5">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <h1 class="fs-1 my-2 text-uppercase text-center">
                Sản phẩm nổi bật
            </h1>
            <div class="product-slider">
                @foreach ($KNTSanpham as $item)
                    <div class="product-item text-center">
                        <a href="{{ route('KNTuser.show', ['id' => $item->kntMaSP]) }}" class="text-decoration-none">
                            <div class="product-image">
                                <img src="{{ asset('storage/' . $item->kntHinhAnh) }}"
                                     alt="{{ $item->kntTenSP }}"
                                     class="img-fluid rounded">
                            </div>
                            <h5 class="caption mt-2 text-uppercase">
                                {{ $item->kntTenSP }}
                            </h5>
                            <p class="price text-muted">
                                {{ number_format($item->kntDongia, 0, ',', '.') }} VNĐ
                            </p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-sm-1"></div>
    </div>

</div>

@endsection
