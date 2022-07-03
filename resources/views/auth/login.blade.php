@extends('layouts.forms')

@section('content')
<div class="items-center justify-center w-screen h-screen flex bg-[url('https://images.unsplash.com/photo-1486520299386-6d106b22014b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&q=80')] bg-no-repeat bg-center bg-cover">
  <form method="POST" action="{{ route('login') }}"  class="flex flex-col items-center justify-between gap-10 px-8 py-14 bg-primary rounded-xl h-1/2 w-1/3 md:w-1/4">
    @csrf
    <h1 class="text-3xl font-k2d font-black text-white uppercase">Admin Login</h1>
    <div class="flex flex-col gap-4 w-full">
        <label for="email" class="sr-only">Email</label>
        <div class="w-full">
            @error('email')
                <div class="bg-red-600 rounded-lg p-2 text-white w-full mb-2" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
            <input id="email" name="email" type="email" required placeholder="Email..." class="w-full py-1 px-2 rounded-full" />
        </div>
        <label for="password" class="sr-only">Password</label>
        <div class="w-full">
            @error('password')
                <div class="bg-red-600 rounded-lg p-2 text-white w-full mb-2" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
            <input id="password" name="password" type="password" required placeholder="Password..." class="w-full py-1 px-2 rounded-full" />
        </div>
    </div>
    <button type="submit" class="bg-white py-1 px-5 rounded-full font-k2d font-black text-[#8153d4]">Login <i class="fa-solid fa-arrow-right font-black text-[#8153d4]"></i></button>
  </form>
</div>
@endsection