@extends('admin.layout.master')

@section('head-tag')
    <title>مدیران سایت</title>
@endsection

@section('contain')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="{{route('admin.home')}}">خانه</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">مدیریت</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        مدیران سایت
                    </h5>
                </section>

                @include('admin.alerts.alert-section.success')

                @if($LoggedUserInfo['role']==1)
                    <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                        <a href="{{ route('admin.user.create') }}" class="btn btn-info btn-sm">ایجاد مدیر جدید</a>
                    @endif
                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </div>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام</th>
                            <th>تصویر</th>
                            <th>شماره تماس</th>
                            <th>ایمیل</th>
                            <th>نقش</th>
                            <th class="max-width-16-rem text-left pl-5"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $key=> $user)

                            <tr>
                                <th>{{$key +=1}}</th>
                                <td>{{ $user->name }}</td>
                                <td>
                                    <img src="{{ asset($user->image['indexArray']['small'] ) }}" alt="" width="100" height="70">
                                </td>
                                <td>{{ $user->mobile }}</td>
                                <td>{{ $user->email }}</td>
                               @if($user->role ==1) <td>مدیر کل</td> @endif
                                @if($user->role ==0) <td>مدیر </td> @endif
                                @if($user->role==1 || $LoggedUserInfo['role']==0)
                                    <td class="width-16-rem text-left">
                                            <button class="btn btn-danger btn-sm delete" disabled><i class="fa fa-trash-alt"></i> حذف</button>
                                    </td>
                                @endif
                               @if($user->role==0 && $LoggedUserInfo['role']==1 )
                                    <td class="width-16-rem text-left">
                                        <form class="d-inline" action="{{ route('admin.user.destroy', $user->id) }}" method="post">
                                            @csrf
                                            {{ method_field('delete') }}
                                            <button class="btn btn-danger btn-sm delete" type="submit"><i class="fa fa-trash-alt"></i> حذف</button>
                                        </form>
                                    </td>
                                   @endif

                            </tr>

                        @endforeach


                        </tbody>
                    </table>
                </section>

            </section>
        </section>
    </section>



@endsection
@section('script')
    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])
    @endsection
