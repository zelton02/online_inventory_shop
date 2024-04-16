@extends('layouts.app')
@section('content')
<div class="flex flex-col items-center">
  <form action="/user/create" method="POST" class="w-50">
  @csrf
    <div class="shadow sm:rounded-md sm:overflow-hidden">
      <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
        <div>
          <div class="col-span-3 sm:col-span-2">
            <label for="user name" class="block text-lg font-medium text-gray-700"> User Name </label>
            <div class="mt-1 flex flex-col rounded-md">
              <input required type="text" name="name" id="name" class="shadow-sm @error('name') is-invalid @enderror p-1 border focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-lg border-gray-300" placeholder="John Doe">
              @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
        </div>

        <div>
            <div class="col-span-3 sm:col-span-2">
              <label for="email" class="block text-lg font-medium text-gray-700"> Email </label>
              <div class="mt-1 flex flex-col rounded-md">
                <input required type="text" name="name" id="name" class="shadow-sm @error('name') is-invalid @enderror p-1 border focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-lg border-gray-300" placeholder="John Doe">
                @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
          </div>

        {{-- Email --}}
