@extends('admin.master')

@section('title')
    {{trans('category.show_category')}}
  @endsection

 @section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="card-body">
        @if(session('error_catch'))
        <div class="bg-danger">{{session('error_catch')}}</div>
        @endif
        <form>

            <div class="row">
                <div class="col">
                    <label for="name_ar">{{trans('category.name_ar')}}</label>
                    <div class="input-group mb-3">
                        <input type="text" value="{{$category->getTranslation('name','ar')}}" class="form-control" name="name_ar" readonly>
                    </div>

                </div>
                <div class="col">
                    <label for="name_en">{{trans('category.name_en')}}</label>
                    <div class="input-group mb-3 col">
                        <input type="text" value="{{$category->getTranslation('name','en')}}"  class="form-control" name="name_en" readonly>

                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="slug">{{trans('category.slug')}}</label>
                    <div class="input-group mb-3">
                        <input type="text" value="{{$category->slug}}"  class="form-control" name="slug" readonly>
                    </div>

                </div>
                <div class="col">
                    <label for="image">{{trans('category.chooseimage')}}</label>
                    <div class="input-group mb-3 col">
                        <img class="rounded-full w-30 h-20" src="{{Storage::url($category->image)}}" alt="">
                    </div>

                </div>

            </div>

            <div class="row">
                <div class="col">
                    <label for="description_ar">{{trans('category.description_ar')}}</label>
                    <div class="input-group mb-3">
                        <textarea name="description_ar"   rows="3" cols="3"
                                  class="form-control" readonly>
                                  {{$category->getTranslation('description','ar')}}</textarea>
                    </div>

                </div>
                <div class="col">
                    <label for="description_en">{{trans('category.description_en')}}</label>
                    <div class="input-group mb-3">
                        <textarea name="description_en" rows="3" cols="3"
                                  class="form-control" readonly>
                                  {{$category->getTranslation('description','en')}}</textarea>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="is_showing">{{trans('category.is_showing')}}</label>
                    <div class="input-group mb-3">
                        @if ($category->is_showing == 1)
                        <span class="mt-2 bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{__('category.showing')}}</span>
                        @else
                        <span class="mt-2 bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">{{__('category.hidden')}}</span>

                        @endif                    </div>
                </div>

                <div class="col">
                    <label class="ml-3 " for="is_popular">{{trans('category.is_popular')}}</label>
                    <div class="input-group mb-3 col">
                        @if ($category->is_popular == 1)
                        <span class="mt-2 bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{__('category.populars')}}</span>
                        @else
                        <span class="mt-2 bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">{{__('category.notpopular')}}</span>

                        @endif                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="meta_title_ar">{{trans('category.meta_title_ar')}}</label>
                    <div class="input-group mb-3">
                        <input type="text" value="{{$category->getTranslation('meta_title','ar')}}" name="meta_title_ar"
                               class="form-control" readonly>
                    </div>

                </div>
                <div class="col">
                    <label for="meta_title_en">{{trans('category.meta_title_en')}}</label>
                    <div class="input-group mb-3">
                        <input type="text" value="{{$category->getTranslation('meta_title','en')}}" name="meta_title_en"
                               class="form-control" readonly>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="meta_description_ar">{{trans('category.meta_description_ar')}}</label>
                    <div class="input-group mb-3">
                    <textarea name="meta_description_ar" rows="3" cols="3"
                              class="form-control " readonly>
                              {{$category->getTranslation('meta_description','ar')}}</textarea>
                    </div>

                </div>
                <div class="col">
                    <label for="meta_description_en">{{trans('category.meta_description_en')}}</label>
                    <div class="input-group mb-3">
                    <textarea name="meta_description_en" rows="3" cols="3"
                              class="form-control" readonly>
                              {{$category->getTranslation('meta_description','en')}}</textarea>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="meta_keywords">{{trans('category.meta_keyword')}}. " , "</label><span
                        class="text-danger">{{trans('category.meta_keyword_note')}}</span>
                    <div class="input-group mb-3">
                    <textarea name="meta_keywords" rows="3" cols="3"
                              class="form-control" readonly>
                            {{$category->meta_keywords}}</textarea>
                    </div>

                </div>
            </div>
        </form>
    </div>


@endsection
