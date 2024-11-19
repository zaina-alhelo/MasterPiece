@extends('land_page')
@section('title', 'تواصل معنا ')

@section('content')


  <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4">تواصل معنا </h1>
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active text-white">Contact</li>
                </ol>    
            </div>
        </div>


    <div class="container-fluid contact bg-light py-5 "  style="background-color: #f4f9fb;">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">  تواصل معنا</h5>
                    <h1 class="mb-0 " >اتصل بنا لأي استفسار</h1>
                </div>
                <div class="row g-5 align-items-center">
                    <div class="col-lg-4">
                        <div class="bg-white rounded p-4">
                            <div class="text-center mb-4">
                                <i class="fa fa-map-marker-alt fa-3x text-success"></i>
                                <h4 class="text-success"><Address></Address></h4>
                                <p class="mb-0">مركز الغذاء المثالي<br>  الأردن, العقبة</p>
                            </div>
                            <div class="text-center mb-4">
                                <i class="fa fa-phone-alt fa-3x text-success mb-3"></i>
                                <h4 class="text-success">Mobile</h4>
                                <a class="text-muted" href="tel:+962123456789" target="_blank"> +962 123 456 789</a>

                            </div>
                           
                            <div class="text-center">
                                <i class="fa fa-envelope-open fa-3x text-success mb-3"></i>
                                <h4 class="text-success">Email</h4>
                              <a href="mailto:zainaalhelo00@gmail.com" class="text-muted">Rubaalhelo@gmail.com</a>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 rtl">
                  <h3 class="mb-2 text-success">أرسل لنا رسالة</h3>
<p class="mb-4">نحن هنا للإجابة على استفساراتك وتقديم الدعم لك. إذا كان لديك أي أسئلة أو تعليقات بشأن خدماتنا الصحية والتغذوية، لا تتردد في إرسال رسالة لنا عبر نموذج .
        نقدم لك كل الدعم لتحقيق أهدافك الصحية والتغذوية</p>

                        <form action="{{ route('contact.store') }}" method="POST">
                        @csrf

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0  " id="name" name="name">
                                        <label for="name">الأسم </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control border-0 " id="email" name="email" >
                                        <label for="email">البريد الألكتروني</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="subject" name="subject" >
                                        <label for="subject">العنوان</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control border-0" placeholder="Leave a message here" id="message" name="message" style="height: 160px"></textarea>
                                        <label for="message">الرسالة</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-success w-100 py-3" type="submit">أرسل الرسالة  </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-12">
                        <div class="rounded">
                            <iframe class="rounded w-100" 
                            style="height: 450px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d18906.400333511934!2d35.00546175545596!3d29.532665820410415!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1500703a6c8d6313%3A0x8e19bccd0175f5ad!2z2YXYsdmD2LIg2KfZhNi62LDYp9ihINin2YTZhdir2KfZhNmKINmE2YTYp9iz2KrYtNin2LHYp9iqINin2YTYutiw2KfYptmK2Kk!5e0!3m2!1sar!2sjo!4v1730925315301!5m2!1sar!2sjo" 
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>






@endsection