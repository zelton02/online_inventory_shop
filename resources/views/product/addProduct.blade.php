@extends('layouts.app')
@section('content')
<div class="flex flex-col items-center">
  <form action="/product/create" method="POST" class="w-50">
  @csrf
    <div class="shadow sm:rounded-md sm:overflow-hidden">
      <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
        <div>
          <div class="col-span-3 sm:col-span-2">
            <label for="product name" class="block text-lg font-medium text-gray-700"> Product Name </label>
            <div class="mt-1 flex flex-col rounded-md">
              <input required type="text" name="name" id="name" class="shadow-sm @error('name') is-invalid @enderror p-1 border focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-lg border-gray-300" placeholder="Cheeseburger">
              @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

          </div>
        </div>

        <div>
          <label for="product description" class="block text-lg font-medium text-gray-700"> Product Description </label>
          <div class="mt-1">
            <textarea required id="description" name="description" rows="3" class="@error('description') is-invalid @enderror resize-none p-1 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-lg border border-gray-300 rounded-md" placeholder="Tasty cheeseburger with pickles"></textarea>
            @error('description')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>

        <div>
          <label for="product price" class="block text-lg font-medium text-gray-700"> Product Price </label>
          <div class="mt-1 flex flex-col rounded-md">
              <input required type="number" name="price" id="price" class="shadow-sm @error('price') is-invalid @enderror p-1 border focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-lg border-gray-300" placeholder="20.00">
              @error('price')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
          </div>
        </div>

        {{-- <div>
          <label for="product type" class="block text-lg font-medium text-gray-700">Product type</label>
          <div>
          <select name="type" id="type" class="flex justify-center mt-1 flex rounded-md shadow-sm p-1 border focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-lg border-gray-300">>
            <option value="Western">Western</option>
            <option value="Chinese">Chinese</option>
            <option value="Japanese">Japanese</option>
          </select>
        </div> --}}

        <div class="mt-3">
          <label for="product image url" class="block text-lg font-medium text-gray-700"> Product Photo Link </label>
          <div class="mt-1 flex flex-col rounded-md">
              <input required type="text" name="image_url" id="image_url" class="shadow-sm @error('image_url') is-invalid @enderror p-1 border focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-lg border-gray-300" placeholder="https://www.google.com/">
              @error('image_url')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
        </div>

        {{-- discount --}}
        <div class="mt-3">
          <label for="product price" class="block text-lg font-medium text-gray-700"> Product Discount </label>
          <div class="mt-1 flex flex-col rounded-md">
              <input required type="number" name="discount" id="discount" class="shadow-sm @error('discount') is-invalid @enderror p-1 border focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-lg border-gray-300" placeholder="0">
              @error('discount')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
      </div>

        {{-- quantity --}}
        <div class="mt-3">
          <label for="product price" class="block text-lg font-medium text-gray-700"> Product Quantity </label>
          <div class="mt-1 flex flex-col rounded-md">
              <input required type="number" name="quantity" id="quantity" class="shadow-sm @error('quantity') is-invalid @enderror p-1 border focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-lg border-gray-300" placeholder="0">
              @error('quantity')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>


      <div class="px-4 py-3 text-right sm:px-6">
        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add</button>
      </div>
    </div>
  </form>
</div>
@endsection
