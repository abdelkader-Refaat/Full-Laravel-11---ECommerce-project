@extends('admin.master')

@section('content')


  <h1 class="form-control mb-3 flex-center">Sending Email to {{env('MAIL_FROM_ADDRESS')}}</h1>


  <div class="input-group mb-3">
    <input name="greeting" type="text" class="form-control" placeholder="Email Greeting" aria-label="Username">
    <span class="input-group-text">&</span>
    <input name="first" type="text" class="form-control" placeholder="email first" aria-label="Server">
  </div>
  <div class="input-group mb-3">
    <input name="body" type="text" class="form-control" placeholder="Email body" aria-label="Username">
    <span class="input-group-text">&</span>
    <input name="button" type="text" class="form-control" placeholder="email button name" aria-label="Server">
  </div>
  <div class="input-group mb-3">
    <input name="url" type="text" class="form-control" placeholder="@ Email Url" aria-label="Username">
    <span class="input-group-text">&</span>
    <input name="lastline" type="text" class="form-control" placeholder="email Last Line" aria-label="Server">
  </div>
  <button  type="submit" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900"><i class="fa-regular fa-envelope fa-xl " style="color: #ee3d11;"></i><i>Send</i></button>

</form>



@endsection
