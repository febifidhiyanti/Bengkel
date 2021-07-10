@extends('layouts.user.appuser')
@section('content')

<div class="container" >
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
        
        <div class="section-title">
            <h2>Contact us</h2>
            <h3><span>Diskusi</span></h3>
        </div>

        </div>
    </section>
    <div class="row">
        <div class="col-md-12 col-md-offset-2">  
            <div class="col-md-12 col-md-offset-2">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="container">
                            <div class="card-body" ref="scrollParent">
                                <dw-messages :messages="messages" style="list-style-type: none;"></dw-messages>
                            </div>
                            <div class="card-footer">
                            <dw-form
                                    v-on:sent="addMessage"
                                    :user="{{ Auth::user() }}"
                            ></dw-form>
                            </div>
                        </div>                
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img width="94%" src="{{url('gambar_user/video.jpg')}}" style="padding: 5%;" class="img-fluid" alt="">
                        <button class="btn" style="background-color: #bbe0d8;"><a href="/video_chat">Call Us</a></button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

@endsection
