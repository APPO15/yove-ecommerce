@extends('layouts.app')

@section('title', 'جميع التصنيفات - Yove Store')

@section('content')
<div class="container my-4">
    <!-- عنوان الصفحة مع زر تصفح جميع المنتجات -->
    <div class="d-flex justify-content-between align-items-center mb-5 pb-2 border-bottom">
        <div>
            <h3 class="fw-bold mb-1 border-start border-primary border-4 ps-3">تصفح حسب الأقسام</h3>
            <p class="text-muted small mb-0 ms-3">اكتشف منتجاتنا المتنوعة المصنفة بعناية لتسهيل عملية تسوقك</p>
        </div>
        <a href="{{ url('/products') }}" class="btn btn-outline-primary rounded-pill px-4 btn-sm" style="color: #5856d6; border-color: #5856d6;">
            تصفح كل المنتجات <i class="fas fa-th-large ms-1"></i>
        </a>
    </div>

    <!-- شبكة التصنيفات -->
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">

        <!-- تصنيف 1: الإلكترونيات -->
        <div class="col">
            <a href="#" class="text-decoration-none text-dark">
                <div class="card h-100 border-0 shadow-sm rounded-4 text-center p-4 category-card position-relative overflow-hidden">
                    <div class="category-icon-wrapper mx-auto mb-4 bg-light-purple">
                        <i class="fas fa-laptop fa-2x" style="color: #5856d6;"></i>
                    </div>
                    <h5 class="fw-bold mb-2">إلكترونيات</h5>
                    <span class="badge rounded-pill bg-light text-dark px-3 py-2 border">120 منتج</span>
                    <div class="category-hover-effect"></div>
                </div>
            </a>
        </div>

        <!-- تصنيف 2: الملابس والأزياء -->
        <div class="col">
            <a href="#" class="text-decoration-none text-dark">
                <div class="card h-100 border-0 shadow-sm rounded-4 text-center p-4 category-card position-relative overflow-hidden">
                    <div class="category-icon-wrapper mx-auto mb-4 bg-light-success">
                        <i class="fas fa-tshirt fa-2x" style="color: #2e7d32;"></i>
                    </div>
                    <h5 class="fw-bold mb-2">ملابس وأزياء</h5>
                    <span class="badge rounded-pill bg-light text-dark px-3 py-2 border">350 منتج</span>
                    <div class="category-hover-effect"></div>
                </div>
            </a>
        </div>

        <!-- تصنيف 3: الساعات والإكسسوارات -->
        <div class="col">
            <a href="#" class="text-decoration-none text-dark">
                <div class="card h-100 border-0 shadow-sm rounded-4 text-center p-4 category-card position-relative overflow-hidden">
                    <div class="category-icon-wrapper mx-auto mb-4 bg-light-warning">
                        <i class="fas fa-clock fa-2x" style="color: #ef6c00;"></i>
                    </div>
                    <h5 class="fw-bold mb-2">ساعات وإكسسوارات</h5>
                    <span class="badge rounded-pill bg-light text-dark px-3 py-2 border">85 منتج</span>
                    <div class="category-hover-effect"></div>
                </div>
            </a>
        </div>

        <!-- تصنيف 4: المنزل والأثاث -->
        <div class="col">
            <a href="#" class="text-decoration-none text-dark">
                <div class="card h-100 border-0 shadow-sm rounded-4 text-center p-4 category-card position-relative overflow-hidden">
                    <div class="category-icon-wrapper mx-auto mb-4 bg-light-danger">
                        <i class="fas fa-couch fa-2x" style="color: #c62828;"></i>
                    </div>
                    <h5 class="fw-bold mb-2">أثاث ومنزل</h5>
                    <span class="badge rounded-pill bg-light text-dark px-3 py-2 border">140 منتج</span>
                    <div class="category-hover-effect"></div>
                </div>
            </a>
        </div>

        <!-- تصنيف 5: الرياضة والأنشطة الخارجية -->
        <div class="col">
            <a href="#" class="text-decoration-none text-dark">
                <div class="card h-100 border-0 shadow-sm rounded-4 text-center p-4 category-card position-relative overflow-hidden">
                    <div class="category-icon-wrapper mx-auto mb-4 bg-light-info">
                        <i class="fas fa-running fa-2x" style="color: #00838f;"></i>
                    </div>
                    <h5 class="fw-bold mb-2">رياضة وأنشطة</h5>
                    <span class="badge rounded-pill bg-light text-dark px-3 py-2 border">95 منتج</span>
                    <div class="category-hover-effect"></div>
                </div>
            </a>
        </div>

        <!-- تصنيف 6: الصحة والجمال -->
        <div class="col">
            <a href="#" class="text-decoration-none text-dark">
                <div class="card h-100 border-0 shadow-sm rounded-4 text-center p-4 category-card position-relative overflow-hidden">
                    <div class="category-icon-wrapper mx-auto mb-4 bg-light-pink">
                        <i class="fas fa-spa fa-2x" style="color: #d81b60;"></i>
                    </div>
                    <h5 class="fw-bold mb-2">الصحة والجمال</h5>
                    <span class="badge rounded-pill bg-light text-dark px-3 py-2 border">210 منتج</span>
                    <div class="category-hover-effect"></div>
                </div>
            </a>
        </div>

        <!-- تصنيف 7: ألعاب الأطفال -->
        <div class="col">
            <a href="#" class="text-decoration-none text-dark">
                <div class="card h-100 border-0 shadow-sm rounded-4 text-center p-4 category-card position-relative overflow-hidden">
                    <div class="category-icon-wrapper mx-auto mb-4 bg-light-teal">
                        <i class="fas fa-gamepad fa-2x" style="color: #00695c;"></i>
                    </div>
                    <h5 class="fw-bold mb-2">ألعاب فيديو وأطفال</h5>
                    <span class="badge rounded-pill bg-light text-dark px-3 py-2 border">75 منتج</span>
                    <div class="category-hover-effect"></div>
                </div>
            </a>
        </div>

        <!-- تصنيف 8: الكتب والأدوات المكتبية -->
        <div class="col">
            <a href="#" class="text-decoration-none text-dark">
                <div class="card h-100 border-0 shadow-sm rounded-4 text-center p-4 category-card position-relative overflow-hidden">
                    <div class="category-icon-wrapper mx-auto mb-4 bg-light-dark">
                        <i class="fas fa-book fa-2x" style="color: #37474f;"></i>
                    </div>
                    <h5 class="fw-bold mb-2">الكتب والأدوات</h5>
                    <span class="badge rounded-pill bg-light text-dark px-3 py-2 border">115 منتج</span>
                    <div class="category-hover-effect"></div>
                </div>
            </a>
        </div>

    </div>
</div>

<!-- تنسيقات جمالية إضافية لصفحة التصنيفات -->
<style>
    /* حاويات الأيقونات بخلفيات ملونة خفيفة متناسقة */
    .category-icon-wrapper {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.3s ease;
    }

    .bg-light-purple { background-color: #f3f2ff; }
    .bg-light-success { background-color: #e8f5e9; }
    .bg-light-warning { background-color: #fff3e0; }
    .bg-light-danger  { background-color: #ffebee; }
    .bg-light-info    { background-color: #e0f7fa; }
    .bg-light-pink    { background-color: #fce4ec; }
    .bg-light-teal    { background-color: #e0f2f1; }
    .bg-light-dark    { background-color: #eceff1; }

    /* حركات تفاعلية عند مرور الماوس على البطاقة */
    .category-card {
        transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275), box-shadow 0.3s ease;
        border: 1px solid rgba(0,0,0,0.03) !important;
        cursor: pointer;
        z-index: 1;
    }
    .category-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(88, 86, 214, 0.1) !important;
    }
    .category-card:hover .category-icon-wrapper {
        transform: scale(1.1) rotate(5deg);
    }

    /* تأثير خلفية خفيف ومميز عند التحويم */
    .category-hover-effect {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background-color: #5856d6;
        transform: scaleX(0);
        transition: transform 0.3s ease;
        transform-origin: center;
    }
    .category-card:hover .category-hover-effect {
        transform: scaleX(1);
    }
</style>
@endsection
