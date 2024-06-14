@extends('admin.master')

@section('title')
    <span class="text-danger">{{trans('product.edit_product')}}</span>
  @endsection

 @section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="card-body">
        @if(session('error_catch'))
        <div class="bg-danger">{{session('error_catch')}}</div>
        @endif
         <form action="{{route('products.update',$product->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- <div class="row">
                <div class="col">

                <select name="category_id" id="default" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  <option class="text-center" selected>{{__('product.category')}}</option>
                  @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach


                </select>
                </div>
                @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div> --}}
            <div class="row">
                <div class="col">

                <select name="category_id" id="default" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  <option class="text-center" selected>{{__('product.category')}}</option>
                  @foreach($categories as $category)
                  <option value="{{$category->id}}" {{($product->category_id == $category->id)?'selected' : ''}}>{{$category->name}}</option>
                  @endforeach


                </select>
                </div>
                @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="row">
                <div class="col">
                    <label for="name_ar">{{trans('product.name_ar')}}</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control @error('name_ar') is-invalid @enderror" name="name_ar" value="{{$product->getTranslation('name','ar')}}">
                    </div>
                    @error('name_ar')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="name_en">{{trans('product.name_en')}}</label>
                    <div class="input-group mb-3 col">
                        <input type="text" class="form-control @error('name_en') is-invalid @enderror" name="name_en" value="{{$product->getTranslation('name','en')}}">

                    </div>
                    @error('name_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="slug">{{trans('product.slug')}}</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control  @error('slug') is-invalid @enderror" name="slug" value="{{$product->slug}}">
                    </div>
                    @error('slug')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="image">{{trans('product.chooseimage')}}</label>
                    <div class="input-group mb-3 col">
                        <img class="rounded-full w-10 h-10" src="{{Storage::url($product->image)}}" alt="">

                        <input type="file" class="form-control  @error('image') is-invalid @enderror" name="image">
                    </div>
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="row">
                <div class="col">
                    <label for="short_description_ar">{{trans('product.short_description_ar')}}</label>
                    <div class="input-group mb-3">
                        <textarea name="short_description_ar" rows="3" cols="3"
                                  class="form-control @error('short_description_ar') is-invalid @enderror">{{$product->getTranslation('short_description','ar')}}</textarea>
                    </div>
                    @error('short_description_ar')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
            </div>
                <div class="col">
                    <label for="short_description_en">{{trans('product.short_description_en')}}</label>
                    <div class="input-group mb-3">
                        <textarea name="short_description_en" rows="3" cols="3"
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
                        <input type="checkbox" {{($product->status == 1) ? "checked" :" "}} class="" id="is_showing" name="status" >
                    </div>

                </div>
                <div class="col">
                    <label class="ml-3 " for="is_popular">{{trans('product.trend')}}</label>
                    <div class="input-group mb-3 col">
                        <input type="checkbox" class="" id="is_popular" name="trend" {{($product->trend == 1) ? "checked" :" " }}>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="price">{{trans('product.price')}}</label>
                    <div class="input-group mb-3">
                        <input type="number" name="price" value="{{$product->price}}"
                               class="form-control @error('price') is-invalid @enderror">
                    </div>
                    @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="selling_price">{{trans('product.selling_price')}}</label>
                    <div class="input-group mb-3">
                        <input type="number" name="selling_price" value="{{$product->selling_price}}"
                               class="form-control @error('selling_price') is-invalid @enderror">
                    </div>
                    @error('selling_price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="qty">{{trans('product.qty')}}</label>
                    <div class="input-group mb-3">
                        <input type="number" name="qty" value="{{$product->qty}}"
                               class="form-control @error('qty') is-invalid @enderror">
                    </div>
                    @error('qty')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="tax">{{trans('product.tax')}}</label>
                    <div class="input-group mb-3">
                        <input type="number" name="tax" value="{{$product->tax}}"
                               class="form-control @error('tax') is-invalid @enderror">
                    </div>
                    @error('tax')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- <div class="row">
                <div class="col">
                    <label for="meta_title_ar">{{trans('product.meta_title_ar')}}</label>
                    <div class="input-group mb-3">
                        <input type="text" name="meta_title_ar"
                               class="form-control @error('meta_title_ar') is-invalid @enderror">
                    </div>
                    @error('meta_title_ar')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="meta_title_en">{{trans('product.meta_title_en')}}</label>
                    <div class="input-group mb-3">
                        <input type="text" name="meta_title_en"
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
                    <textarea name="meta_title" rows="3" cols="3"
                              class="form-control @error('meta_title') is-invalid @enderror">{{$product->meta_title}}</textarea>
                    </div>
                    @error('meta_title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row ml-2">
                <div class="col">
                    <label for="description_ar">{{trans('product.description_ar')}}</label>
                    <div class="input-group mb-3">
                    <textarea name="description_ar" rows="3" cols="3"
                              class="form-control @error('description_ar') is-invalid @enderror">{{$product->getTranslation('description','ar')}}</textarea>
                    </div>
                    @error('description_ar')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="description_en">{{trans('product.description_en')}}</label>
                    <div class="input-group mb-3">
                    <textarea name="description_en" rows="3" cols="3"
                              class="form-control @error('description_en') is-invalid @enderror">
                              {{$product->getTranslation('description','en')}}</textarea>                    </div>
                    @error('description_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row ml-2">
                <div class="col">
                    <label for="meta_keywords">{{trans('product.meta_keyword_note')}}. " , "</label><span
                        class="text-danger">{{trans('product.meta_keyword_note')}}</span>
                    <div class="input-group mb-3">
                    <textarea name="meta_keywords" rows="3" cols="3"
                              class="form-control @error('meta_keywords') is-invalid @enderror">
                              {{$product->meta_keywords}}</textarea>
                    </div>
                    @error('meta_keywords')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
           <div class="flex flex-col items-center mb-2"> <button  type="submit" class="btn btn-outline-primary">{{trans('product.update')}}</button></div>
        </form>
    </div>


@endsection
