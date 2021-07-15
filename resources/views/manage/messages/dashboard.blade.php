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
                           <li class=""><a href="#settings" data-toggle="tab" aria-expanded="false">History</a></li>
                        </ul>
                        <div class="tab-content">
                              <div class="tab-pane fade active in" id="home">
                                 <div class="row">
                                       <div class="counters col-md-3 col-sm-3">
                                             <span class="counter-icon"><i class="fa fa-fax rounded"></i></span>
                                             <span class="counter sms_balance_badge ">0</span>
                                             <h4>Balance <a href="javascript:;" onclick="checkBalance()" title="Update Balance" class="sms_balance_check_btn"><i class="fa fa-spinner"></i></a></h4>

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
                                    
                                 <form action="#" class="sky-form"  style="margin-bottom: 30px">
                                    <fieldset>
                                       <p class="send_sms_msg" style="display: none"></p>
                                       <section>
                                          <label class="label">Send To</label>
                                          <div class="inline-group">
                                              <label class="radio"><input type="radio" name="sms_recepients" class="sms_recepients_radio" value="customers"><i class="rounded-x"></i>Customers</label>
                                              <label class="radio"><input type="radio" name="sms_recepients" class="sms_recepients_radio" value="couriers"><i class="rounded-x"></i>Couriers</label>
                                              <label class="radio"><input type="radio" name="sms_recepients" class="sms_recepients_radio" value="partners"><i class="rounded-x"></i>Partners</label>
                                              <label class="radio"><input type="radio" name="sms_recepients" class="sms_recepients_radio" value="all_contacts"><i class="rounded-x"></i>All Contacts</label>
                                          </div>
                                      </section>
                                      
                                       <section class="sms_recepient_select_div">
                                          <label class="label">Recepients: <small>You can select more that one contact</small> <a href="javascript:;" onclick="clearRecepients()" class="pull-right"><i class="fa fa-trash"></i> Clear All</a></label>
                                          {!! Form::select('customers_recepient_select', [],null, ['class'=>'select2 form-control', 'multiple', 'id'=>'sms_recepient_select', 'style'=>'width:100%']) !!} 
                                       </section>
                                       <section>
                                          <label for="message_body"></label>
                                          {!! Form::textarea('description', null,['placeholder'=>'Message Body', 'id'=>'message_body', 'style'=>'overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;', 'class'=>'form-control autogrow']) !!}
                                       </section>
                                       <p class="send_sms_feedback"></p>
                                    </fieldset>
                                    <a href="javascript:;" onclick="saveSMSComposer()" class="btn-u btn-u-blue"> <i class="fa fa-save"></i> Draft</a>
                                    <a href="javascript:;" onclick="sendSMSComposer()" class="btn-u pull-right"> <i class="fa fa-send-o"></i> Send</a>
                                    {{-- <button type="submit" class="btn-u pull-right"> <i class="fa fa-send-o"></i> Send</button> --}}
                                 </form>
                              </div>
                              <div class="tab-pane fade" id="messages">
                                    <h4>Conversations</h4>
                                    <h5>The receiving number is: <strong>15320</strong>, Must have a preceding keyword <strong>BEEM/CUSTOMER</strong></h5>
                                    <em><small>No Messages</small></em>
                              </div>
                              <div class="tab-pane fade" id="settings">
                                    <h4>SMS History</h4>
                                    <em><small>No sms</small></em>
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