@extends('admin.master')

@section('title')
    {{ __('master.product') }}
@endsection

@section('content')
    <a class="flex justify-center" href="{{ route('products.create') }}"><button type="button"
            class= " text-green-600 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-600 dark:text-green-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">{{ __('product.create') }}</button></a>

    {{-- table  --}}
    <div class="">
        <div class="block">
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th> {{ __('product.Name') }}</th>
                            <th> {{ __('product.category_id') }}</th>
                            <th> {{ __('product.Description') }}</th>
                            <th> {{ __('product.price') }}</th>
                            <th> {{ __('product.qty') }}</th>
                            <th> {{ __('product.image') }}</th>
                            <th>{{ __('product.status') }}</th>
                            <th>{{ __('product.trend') }}</th>
                            <th class="flex justify-center">{{ __('product.Action') }}</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{Str::limit($product->description,10) }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->qty }}</td>
                                <td><img class="rounded-full w-10 h-10" src="{{ Storage::url($product->image) }}"
                                        alt=""></td>
                                <td>
                                    @if ($product->status == 1)
                                        <span
                                            class="mt-2 bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ __('product.showing') }}</span>
                                    @else
                                        <span
                                            class="mt-2 bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">{{ __('product.hidden') }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($product->trend == 1)
                                        <span
                                            class="mt-2 bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ __('product.trend') }}</span>
                                    @else
                                        <span
                                            class="mt-2 bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">{{ __('product.nottrend') }}</span>
                                    @endif
                                </td>
                                <td class="flex justify-center">
                                    <a href="{{ route('products.show', $product->id) }}"> <button type="button"
                                            class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">{{ __('product.show') }}</button></a>
                                    <a href="{{ route('products.edit', $product->id) }}"> <button type="button"
                                            class="text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">{{ __('product.edit') }}</button></a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="Post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" class="deleteProduct" value="{{ $product->id }}">
                                        <button type="submit"
                                            class="deletebutton text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">{{ __('product.delete') }}</button>

                                    </form>


                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@section('script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.deletebutton').click(function(e) {
                e.preventDefault();
                let delete_id = $(this).closest("form").find('.deleteProduct').val();


                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this product!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            let data = {
                                "_token" :  $('input[name="csrf-token"]').val(),
                                "id"  : delete_id,
                            };
                            $.ajax({
                                type: "DELETE",
                                url: '/admin/products/' + delete_id,
                                data: data,
                                success: function(response) {
                                    swal(response.status, {
                                      icon: "success",
                                    }).then((result) => {
                                        location.reload();

                                    });
;
                                }

                            });
                        }
                    });
            });
        });
    </script>
@endsection
@endsection
