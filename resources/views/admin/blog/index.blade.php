@extends('admin.layout.master')

@section('head-tag')
    <title> مقالات</title>
@endsection

@section('contain')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="{{route('admin.home')}}">خانه</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">  مقالات</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        مقالات
                    </h5>
                </section>

                @include('admin.alerts.alert-section.success')

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.blog.create') }}" class="btn btn-info btn-sm">نوشتن مقاله جدید</a>
                    <div class="max-width-16-rem">
                        <form action="">
                            <div class="float-left">
                                <div class="input-group">
                                    <input type="search" name="search" class="form-control" placeholder=" جستجو کنید" value="{{$search}}">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-success" type="submit"> جستجو کن</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>عنوان</th>
                            <th>خلاصه </th>
                            <th> تصویر</th>
                            <th> تگ ها</th>
                            <th>نمایش در سایت</th>
                            <th class="max-width-16-rem text-left pl-5"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($blogs as $key=> $blog)

                            <tr>
                                <th>{{$key +=1}}</th>
                                <td>{{ $blog->name }}</td>
                                <td>{{Str::limit($blog->body, 100)}}</td>
                                <td>
{{--                                    //=================> baray namayesh size hay dg faghat kafie bezjay [$blog->image['currentImage']]  az ['small']  stefade konim--}}
                                    <img src="{{ asset($blog->image['indexArray']['small'] ) }}" alt="" width="100" height="70">
{{--                                    <img src="{{ asset($blog->image['indexArray'][$blog->image['currentImage']] ) }}" alt="" width="100" height="50">--}}
                                </td>
                                <td>{{ $blog->tags }}</td>
                                <td>
                                    <label>
                                        <input id="{{ $blog->id }}" onchange="changeStatus({{ $blog->id }})" data-url="{{ route('admin.blog.status', $blog->id) }}" type="checkbox" @if ($blog->status === 1)
                                        checked
                                            @endif>
                                    </label>
                                </td>
                                <td class="width-16-rem text-left">
                                    <a href="{{ route('admin.blog.edit', $blog->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                    <form class="d-inline" action="{{ route('admin.blog.destroy', $blog->id) }}" method="post">
                                        @csrf
                                        {{ method_field('delete') }}
                                        <button class="btn btn-danger btn-sm delete" type="submit"><i class="fa fa-trash-alt"></i> حذف</button>
                                    </form>
                                </td>
                            </tr>

                        @endforeach


                        </tbody>
                    </table>
                </section>

            </section>
        </section>
    </section>
    {{ $blogs->appends(Request::except('page'))->links('vendor.pagination.custom') }}

@endsection
@section('script')

    <script type="text/javascript">
        function changeStatus(id){
            var element = $("#" + id)
            var url = element.attr('data-url')
            var elementValue = !element.prop('checked');

            $.ajax({
                url : url,
                type : "GET",
                success : function(response){
                    if(response.status){
                        if(response.checked){
                            element.prop('checked', true);
                            successToast(' نمایش مقاله با موفقیت فعال شد')
                        }
                        else{
                            element.prop('checked', false);
                            successToast(' نمایش مقاله با موفقیت غیر فعال شد')
                        }
                    }
                    else{
                        element.prop('checked', elementValue);
                        errorToast('هنگام ویرایش مشکلی بوجود امده است')
                    }
                },
                error : function(){
                    element.prop('checked', elementValue);
                    errorToast('ارتباط برقرار نشد')
                }
            });

            function successToast(message){

                var successToastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-success text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';

                $('.toast-wrapper').append(successToastTag);
                $('.toast').toast('show').delay(5500).queue(function() {
                    $(this).remove();
                })
            }

            function errorToast(message){

                var errorToastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-danger text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';

                $('.toast-wrapper').append(errorToastTag);
                $('.toast').toast('show').delay(5500).queue(function() {
                    $(this).remove();
                })
            }
        }
    </script>


    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])


@endsection
