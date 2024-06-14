@extends('admin.master')

@section('title')
    <span class="text-danger">{{trans('product.show_product')}}</span>
  @endsection

 @section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="card-body">
        @if(session('error_catch'))
        <div class="bg-danger">{{session('error_catch')}}</div>
        @endif
         <form  enctype="multipart/form-data">


            <div class="row">
                <div class="col">

                  <input type="text" readonly class="form-control" value="{{$product->category->name}}">
                </div>
                @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col">
                    <label for="name_ar">{{trans('product.name_ar')}}</label>
                    <div class="input-group mb-3">
                        <input Readonly type="text" class="form-control @error('name_ar') is-invalid @enderror" name="name_ar" value="{{$product->getTranslation('name','ar')}}">
                    </div>

                </div>
                <div class="col">
                    <label for="name_en">{{trans('product.name_en')}}</label>
                    <div class="input-group mb-3 col">
                        <input Readonly type="text" class="form-control @error('name_en') is-invalid @enderror" name="name_en" value="{{$product->getTranslation('name','en')}}">

                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="slug">{{trans('product.slug')}}</label>
                    <div class="input-group mb-3">
                        <input Readonly type="text" class="form-control  @error('slug') is-invalid @enderror" name="slug" value="{{$product->slug}}">
                    </div>

                </div>
                <div class="col">
                    <label for="image">{{trans('product.chooseimage')}}</label>
                    <div class="input-group mb-3 col">
                        <img class="rounded-full w-10 h-10" src="{{Storage::url($product->image)}}" alt="">

                    </div>

                </div>

            </div>

            <div class="row">
                <div class="col">
                    <label for="short_description_ar">{{trans('product.short_description_ar')}}</label>
                    <div class="input-group mb-3">
                        <textarea Readonly name="short_description_ar" rows="3" cols="3"
                                  class="form-control @error('short_description_ar') is-invalid @enderror">{{$product->getTranslation('short_description','ar')}}</textarea>
                    </div>
                    @error('short_description_ar')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
            </div>
                <div class="col">
                    <label for="short_description_en">{{trans('product.short_description_en')}}</label>
                    <div class="input-group mb-3">
                        <textarea Readonly name="short_description_en" rows="3" cols="3"
                                  class="form-control @error('short_description_en') is-invalid @enderror">{{$product->getTranslation('short_description','en')}}</textarea>
                    </div>
                    @error('short_description_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="is_showing">{{trans('product.is_showing')}}</label>
                    <div class="input-group mb-3">
                        <input Readonly type="checkbox" {{($product->status == 1) ? "checked" :" "}} class="" id="is_showing" name="status" >
                    </div>

                </div>
                <div class="col">
                    <label class="ml-3 " for="is_popular">{{trans('product.trend')}}</label>
                    <div class="input-group mb-3 col">
                        <input Readonly type="checkbox" class="" id="is_popular" name="trend" {{($product->trend == 1) ? "checked" :" " }}>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="price">{{trans('product.price')}}</label>
                    <div class="input-group mb-3">
                        <input Readonly type="number" name="price" value="{{$product->price}}"
                               class="form-control @error('price') is-invalid @enderror">
                    </div>

                </div>
                <div class="col">
                    <label for="selling_price">{{trans('product.selling_price')}}</label>
                    <div class="input-group mb-3">
                        <input Readonly type="number" name="selling_price" value="{{$product->selling_price}}"
                               class="form-control @error('selling_price') is-invalid @enderror">
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="qty">{{trans('product.qty')}}</label>
                    <div class="input-group mb-3">
                        <input Readonly type="number" name="qty" value="{{$product->qty}}"
                               class="form-control @error('qty') is-invalid @enderror">
                    </div>

                </div>
                <div class="col">
                    <label for="tax">{{trans('product.tax')}}</label>
                    <div class="input-group mb-3">
                        <input Readonly type="number" name="tax" value="{{$product->tax}}"
                               class="form-control @error('tax') is-invalid @enderror">
                    </div>

                </div>
            </div>

            {{-- <div class="row">
                <div class="col">
                    <label for="meta_title_ar">{{trans('product.meta_title_ar')}}</label>
                    <div class="input-group mb-3">
                        <input Readonly type="text" name="meta_title_ar"
                               class="form-control @error('meta_title_ar') is-invalid @enderror">
                    </div>
                    @error('meta_title_ar')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="meta_title_en">{{trans('product.meta_title_en')}}</label>
                    <div class="input-group mb-3">
                        <input Readonly type="text" name="meta_title_en"
                               class="form-control @error('meta_title_en') is-invalid @enderror">
                    </div>
                    @error('meta_title_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div> --}}
            <div class="row">
                <div class="col">
                    <label for="meta_title">{{trans('product.meta_title')}}</label><span
                    <div class="input-group mb-3">
                    <textarea Readonly name="meta_title" rows="3" cols="3"
                              class="form-control @error('meta_title') is-invalid @enderror">
                              {{$product->meta_title}}</textarea>
                    </div>

                </div>
            </div>
            <div class="row ml-2">
                <div class="col">
                    <label for="description_ar">{{trans('product.description_ar')}}</label>
                    <div class="input-group mb-3">
                    <textarea Readonly name="description_ar" rows="3" cols="3"
                              class="form-control @error('description_ar') is-invalid @enderror">{{$product->getTranslation('description','ar')}}</textarea>
                    </div>

                </div>
                <div class="col">
                    <label for="description_en">{{trans('product.description_en')}}</label>
                    <div class="input-group mb-3">
                    <textarea Readonly name="description_en" rows="3" cols="3"
                              class="form-control @error('description_en') is-invalid @enderror">
                              {{$product->getTranslation('description','en')}}</textarea>                    </div>

                </div>
            </div>

            <div class="row ml-2">
                <div class="col">
                    <span
                        class="text-danger">{{trans('product.meta_keyword_note')}}</span>
                    <div class="input-group mb-3">
                    <textarea Readonly name="meta_keywords" rows="3" cols="3"
                              class="form-control @error('meta_keywords') is-invalid @enderror">
                              {{Str::of($product->meta_keywords)->explode('-')}}</textarea>
                    </div>

                </div>
            </div>
        </form>
    </div>


@endsection
