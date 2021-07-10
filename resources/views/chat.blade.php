@extends('layouts.user.appuser')
@section('content')

@section('js')
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@stop
<section>
    <div class="col-lg-12 mt-5" >
        <div class="container">
            <button><a class="btn btn-success mt-5" style="text-align: right; padding: 2%;" href="/video_chat">Video</a></button>
        </div>
    </div>
</section>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header"><div class="text-center">Chat Box</div></div>
        <div class="card-body" style="height:320px; overflow: auto;">
           <formchat :key=text v-for="text in text.pesan">@{{text}}</formchat>                   
        </div>
        <div class="card-footer">
        <div class="input-group">
          <input type="" class="form-control" v-model='input' @keyup.enter='push' placeholder="ketik di sini" name="">
          <span class="input-group-btn"></span>
          <button class="btn btn-success" @click.prevent='push'>Kirim</button>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
  
@endsection

@section('css')
<style type="text/css">
  .chatcolor{
    background-color: grey;
    padding:10px;
    border-bottom-left-radius: 24px;
    border-bottom-right-radius: 28px;
    border-top-right-radius: 28px;
    margin-top: 6px;
  }
</style>
@stop