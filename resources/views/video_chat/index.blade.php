@extends('layouts.app')
@section('content')

    <section id="contact" class="contact">
        <div class="section-title">
            <h2>Contact us</h2>
            <h3><span>Diskusi</span></h3>
        </div>
    </section>

    <section>
        <div class="col-lg-12">
            <div class="container">
                <video-chat :user="{{ $user }}" 
                :others="{{$others}}" 
                pusher-key="{{config('broadcasting.connections.pusher.key')
                }}" 
                pusher-cluster="{{config('broadcasting.connections.pusher.options.cluster')}}">
                </video-chat>
            </div>
        </div>
    </section>
    

@endsection
