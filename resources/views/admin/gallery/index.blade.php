@extends('admin.layout.master')

@section('head-tag')
    <title>گالری</title>
@endsection

@section('contain')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="{{route('admin.home')}}">خانه</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">گالری</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        گالری
                    </h5>
                </section>

                @include('admin.alerts.alert-section.success')

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.gallery.create') }}" class="btn btn-info btn-sm">ایجاد تصاویر گالری</a>
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
                            <th>تصویر</th>
                            <th>نمایش در سایت</th>
                            <th class="max-width-16-rem text-left pl-5"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($galleries as $key=> $gallery)

                            <tr>
                                <th>{{$key +=1}}</th>
                                <td>{{ $gallery->name }}</td>
                                <td>
{{--                                    //=================> baray namayesh size hay dg faghat kafie bezjay [$gallery->image['currentImage']]  az ['small']  stefade konim--}}
                                    <img src="{{ asset($gallery->image['indexArray']['small'] ) }}" alt="" width="100" height="70">
{{--                                    <img src="{{ asset($gallery->image['indexArray'][$gallery->image['currentImage']] ) }}" alt="" width="100" height="50">--}}
                                </td>
                                <td>
                                    <label>
                                        <input id="{{ $gallery->id }}" onchange="changeStatus({{ $gallery->id }})" data-url="{{ route('admin.gallery.status', $gallery->id) }}" type="checkbox" @if ($gallery->status === 1)
                                        checked
                                            @endif>
                                    </label>
                                </td>
                                <td class="width-16-rem text-left">
                                    <a href="{{ route('admin.gallery.edit', $gallery->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                    <form class="d-inline" action="{{ route('admin.gallery.destroy', $gallery->id) }}" method="post">
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
{{--    {{ $galleries->appends(Request::except('page'))->links() }}--}}
    {{ $galleries->appends(Request::except('page'))->links('vendor.pagination.custom') }}
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
                            successToast('نمایش تصویر با موفقیت فعال شد')
                        }
                        else{
                            element.prop('checked', false);
                            successToast('نمایش تصویر با موفقیت غیر فعال شد')
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
