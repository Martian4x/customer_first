@extends('layouts.main')

@section('content')
    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">Dashboard</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="/manage">Dashboard</a></li>
                <li class="active">Users</li>
            </ul>
        </div>
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->

    <!--=== Content Part ===-->
    <div class="container content">
        <div class="row">
            <!-- Begin Sidebar Menu -->
            @include('layouts.sidebar_nav')
            <!-- End Sidebar Menu -->

            <!-- Begin Content -->
            <div class="col-md-9">
                <!--Basic Table-->
                <div class="panel panel-default">
                    <div class="panel-heading" style="margin-bottom: 20px">
                        <h5 class="panel-title"><i class="fa fa-users"></i>{{ $vars['title'] }} | {{ $vars['sub_title'] }}</h5>
                    </div>
                    <div class="panel-body">
                     <div class="tab-v1">
                        <ul class="nav nav-tabs">
                           <li class="active"><a href="#home" data-toggle="tab" aria-expanded="true">SMS</a></li>
                           <li class=""><a href="#bulk_sms" data-toggle="tab" aria-expanded="false">Send SMS</a></li>
                           <li class=""><a href="#messages" data-toggle="tab" aria-expanded="false">Messages</a></li>
                           <li class=""><a href="#settings" data-toggle="tab" aria-expanded="false">Settings</a></li>
                        </ul>
                        <div class="tab-content">
                              <div class="tab-pane fade active in" id="home">
                                 <div class="row">
                                       <div class="counters col-md-3 col-sm-3">
                                             <span class="counter-icon"><i class="fa fa-fax rounded"></i></span>
                                             <span class="counter">0</span>
                                             <h4>Balance</h4>
                                       </div>
                                       <div class="counters col-md-3 col-sm-3">
                                             <span class="counter-icon"><i class="fa  fa-envelope-o rounded"></i></span>
                                             <span class="counter">0</span>
                                             <h4>Sent</h4>
                                       </div>
                                       <div class="counters col-md-3 col-sm-3">
                                             <span class="counter-icon"><i class="fa fa-envelope-square rounded"></i></span>
                                             <span class="counter">0</span>
                                             <h4>Scheduled</h4>
                                       </div>
                                       <div class="counters col-md-3 col-sm-3">
                                             <span class="counter-icon"><i class="fa fa-envelope rounded"></i></span>
                                             <span class="counter">0</span>
                                             <h4>Failed</h4>
                                       </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="bulk_sms">
                                    <h4>Create and Send SMS</h4>
                                    
                                 <form action="#" class="sky-form  margin-bottom-10" >
                                    <fieldset>
                                       <section>
                                          <label class="label">Send To</label>
                                          <div class="inline-group">
                                              <label class="radio"><input type="radio" name="sms_recepients" class="sms_recepients_radio" value="customers" checked><i class="rounded-x"></i>Customers</label>
                                              <label class="radio"><input type="radio" name="sms_recepients" class="sms_recepients_radio" value="couries"><i class="rounded-x"></i>Couries</label>
                                              <label class="radio"><input type="radio" name="sms_recepients" class="sms_recepients_radio" value="partiners"><i class="rounded-x"></i>Partiners</label>
                                              <label class="radio"><input type="radio" name="sms_recepients" class="sms_recepients_radio" value="all_contacts"><i class="rounded-x"></i>All Contacts</label>
                                          </div>
                                      </section>
                                      
                                       <section class="sms_recepient_select_div">
                                          <label class="label">Recepients:</label>
                                          {!! Form::select('customers_recepient_select', ['All'=>'All']+$vars['supplier']->customers()->pluck('fname','id')->toArray(),null, ['class'=>'select2 form-control', 'multiple', 'id'=>'sms_recepient_select', 'style'=>'width:100%']) !!} 
                                       </section>
                                       <section>
                                          <label for="message_body"></label>
                                          {!! Form::textarea('description', null,['placeholder'=>'Message Body', 'style'=>'overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;', 'class'=>'form-control autogrow']) !!}
                                       </section>
                                    </fieldset>
                                 </form>
                              </div>
                              <div class="tab-pane fade" id="messages">
                                    <h4>Heading Sample 3</h4>
                                    <p><img alt="" class="pull-right rgt-img-margin img-width-200" src="assets/img/main/img18.jpg"> <strong>Vivamus imperdiet condimentum diam, eget placerat felis consectetur id.</strong> Donec eget orci metus, Vivamus imperdiet condimentum diam, eget placerat felis consectetur id. Donec eget orci metus, ac adipiscing nunc. Pellentesque fermentum, ante ac interdum ullamcorper. Donec eget orci metus, ac adipiscing nunc. Pellentesque fermentum, consectetur id. Donec eget orci metus, ac adipiscing nunc. <strong>Pellentesque fermentum</strong>, ante ac interdum ullamcorper. Donec eget orci metus, ac adipiscing nunc. Pellentesque fermentum, ante ac interdum ullamcorper.</p>
                              </div>
                              <div class="tab-pane fade" id="settings">
                                    <h4>Heading Sample 4</h4>
                                    <p><img alt="" class="pull-right rgt-img-margin img-width-200" src="assets/img/main/img24.jpg"> Vivamus imperdiet condimentum diam, eget placerat felis consectetur id. Donec eget orci metus, Vivamus imperdiet condimentum diam, eget placerat felis consectetur id. Donec eget orci metus, ac adipiscing nunc. Pellentesque fermentum, ante ac interdum ullamcorper. Donec eget orci metus, ac adipiscing nunc. Pellentesque fermentum, consectetur id. Donec eget orci metus, ac adipiscing nunc. <strong>Pellentesque fermentum</strong>, ante ac interdum ullamcorper. Donec eget orci metus, ac adipiscing nunc. Pellentesque fermentum, ante ac interdum ullamcorper.</p>
                              </div>
                        </div>
                  </div>
                    </div>
                    
                </div>
                <!--End Basic Table-->
            </div>
            <!-- End Content -->

        </div>
    </div><!--/container-->
    <!--=== End Content Part ===-->

@endsection